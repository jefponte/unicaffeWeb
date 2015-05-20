package br.edu.unilab.unicafe.model;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileInputStream;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.io.PrintStream;
import java.net.ServerSocket;
import java.net.Socket;
import java.sql.SQLException;
import java.util.ArrayList;

import com.google.gson.Gson;

import br.edu.unilab.unicafe.dao.AcessoDAO;
import br.edu.unilab.unicafe.dao.DAO;
import br.edu.unilab.unicafe.dao.MaquinaDAO;
import br.edu.unilab.unicafe.dao.UsuarioDAO;

/**
 * 
 * @author Jefferson
 *
 */

public class Servidor {

	private String ip;
	private ServerSocket serverSocket;
	private ArrayList<Cliente> listaDeClientes;



	public Servidor() {

		
		this.listaDeClientes = new ArrayList<Cliente>();
		this.ip = "localhost";

	}

	

	public void iniciaServico() {
	
		
		int porta = 27289;
		try {


			this.serverSocket = new ServerSocket(porta, 100);
			esperaConexoes();
		} catch (IOException e) {
			System.out.println("Não consegui criar o serviço na porta "+porta+".");
			
		}
		
	}
	public void atualizaTodos(){
		for(Cliente cliente : listaDeClientes){
			new PrintStream(cliente.getSaida()).println("atualizar()");
		}
	}
	public void desligarTodos(){
		for(Cliente cliente : listaDeClientes){
			new PrintStream(cliente.getSaida()).println("desligar()");
		}
		
	}
	
	public String anotaJson(){
		
		String json = "";
		int h = 0;
		for(Cliente c : this.listaDeClientes){
			Gson geson = new Gson();
			if(h == 0){
				json = json+geson.toJson(c.getMaquina());
				h++;
				
			}else{
				json = json+"|"+geson.toJson(c.getMaquina());
			}
			//printd(json);
		}
		return json;
		
	}

	public void esperaConexoes() {
		Thread recebendoConexao = new Thread(new Runnable() {

			@Override
			public void run() {
				System.out.println("Servidor iniciado...");
				while (true) {
					
					Socket conexao;
					try {
						conexao = serverSocket.accept();
						//printd("Nova conexão! "	+ conexao.getInetAddress().toString());
						processaConexao(conexao);
					} catch (IOException e) {
						System.out.println("Tentativa de conexão frustrada! ");
					}

				}
			}
		});
		recebendoConexao.start();

	}

	/**
	 * 
	 * @param conexao
	 */
	public void processaConexao(final Socket conexao) {
		
		Thread processando = new Thread(new Runnable() {

			@Override
			public void run() {
				Cliente cliente = new Cliente();
				cliente.setConexao(conexao);
				try {

					cliente.setSaida(conexao.getOutputStream());
					cliente.setEntrada(conexao.getInputStream());

					cliente.getMaquina().setIp(cliente.getConexao().getInetAddress().toString().substring(1));
					PrintStream ps = new PrintStream(cliente.getSaida());
					BufferedReader in = new BufferedReader(new InputStreamReader(cliente.getEntrada()));

					String mensagem = in.readLine();
					System.out.println("Primeira Mensagem: "+mensagem);
					if(mensagem == null){
						System.out.println("Comando recusado.");
						System.out.println(mensagem);
						System.out.println("Uma conexao recusada. ");
						ps.println("Eu sou o Servidor, meu chapa!");
						conexao.close();
						return;
					}
						
					

					if(mensagem.indexOf("GET / HTTP/1.1") != -1){
						ps.println("<html>"
								+ "<header><style>"
								+ "body{background-color:#FF9999;}"
								+ ""
								+ ""
								+ "</style></header>"
								+ ""
								+ "<h1>Servidor Funcionando!</h1>"
								+ ""
								+ ""
								+ ""
								+ "</html>");
						cliente.getConexao().close();
						
					}else if (mensagem.indexOf('(') != -1 && mensagem.indexOf(')') != -1) {
						String comando = mensagem.substring(0, mensagem.indexOf('('));
						String parametros = mensagem.substring((mensagem.indexOf('(') + 1),mensagem.indexOf(')'));
						int status = Integer.parseInt(parametros);
						if(comando.equals("setStatus") && status == Maquina.STATUS_DISPONIVEL){
							cliente.getMaquina().setStatus(status);
							
							listaDeClientes.add(cliente);
							while (!conexao.isClosed()) {
								
								mensagem = in.readLine();
								processaMensagem(cliente, mensagem);
							}
							
						}else if(comando.equals("setStatus") && status == Maquina.STATUS_ADMIN){
							
							mensagem = in.readLine();
							processaMensagemAdmin(cliente, mensagem);
							cliente.getConexao().close();
							return;
						}else if(comando.equals("setStatus") && status == Maquina.STATUS_UPDATE){
							
							
							System.out.println("Vamos Atualizar esse cara.");
							cliente.getMaquina().setStatus(status);
							try {
								File f = new File("C:\\UniCafe\\UniCafeClient.exe");
								@SuppressWarnings("resource")
								FileInputStream in1 = new FileInputStream(f);
								OutputStream out = cliente.getConexao().getOutputStream(); 
								OutputStreamWriter osw = new OutputStreamWriter(out);
								BufferedWriter writer = new BufferedWriter(osw);
								writer.flush();
								int tamanho = 4096;
								byte[] buffer = new byte[tamanho]; 
								int lidos = -1;
								while ((lidos = in1.read(buffer, 0, tamanho)) != -1) { 
									 out.write(buffer, 0, lidos); 
									 System.out.println("buffo: "+buffer+" tamanho"+tamanho+" lidos:"+lidos);
								}
								System.out.println("Aweeee");
								cliente.getConexao().close();
							} catch (IOException e) {
								// TODO Auto-generated catch block
								e.printStackTrace();
							}
							
						
						}else{
							System.out.println("Comando recusado.");
							System.out.println(mensagem);
							System.out.println("Uma conexao recusada. ");
							ps.println("Eu sou o Servidor, meu chapa!");
							conexao.close();
							return;
						}
						
					}
					
					
					
					
				} catch (IOException e) {
					if (cliente.getMaquina().getAcesso().getStatus() ==  Acesso.STATUS_EM_UTILIZACAO) {
						cliente.getMaquina().getAcesso().pararDeContar();
						AcessoDAO acessodao = new AcessoDAO();
						acessodao.cadastra(cliente.getMaquina());
						
						try {
							acessodao.getConexao().close();
						} catch (SQLException e1) {
							System.out.println("Erro de SQLEXception.");
						}
					}
					listaDeClientes.remove(cliente);
					System.out.println("Uma maquina desconectou.");
					
					
				}

				if (cliente.getMaquina().getAcesso().getStatus() ==  Acesso.STATUS_EM_UTILIZACAO) {
					cliente.getMaquina().getAcesso().pararDeContar();
					AcessoDAO acessodao = new AcessoDAO();
					acessodao.cadastra(cliente.getMaquina());
					
					try {
						
						acessodao.getConexao().close();
						
					} catch (SQLException e) {
						System.out.println("Erro de SQLEXception.");
					}
				}

				System.out.println(cliente.getMaquina().getNome() + ">> Conexão fechada. ");
				

			}
		});

		processando.start();

	}
	public boolean jaEstaLogado(Usuario usuario) {
		for (Cliente cliente : listaDeClientes) {
			if ((cliente.getMaquina().getAcesso().getStatus() == Acesso.STATUS_EM_UTILIZACAO) && (cliente.getMaquina().getAcesso().getUsuario().getLogin().equals(usuario.getLogin()))){ 
				cliente.getMaquina().getAcesso().pararDeContar();
				AcessoDAO dao = new AcessoDAO();
				dao.cadastra(cliente.getMaquina());
				new PrintStream(cliente.getSaida()).println("bloqueia()");
				return false;
			}
		}
		return false;
	}
	public synchronized void processaMensagemAdmin(final Cliente cliente, String mensagem) {
		@SuppressWarnings("unused")
		String parametros = "";
		System.out.println("Segunda mensagem: "+mensagem);
		String comando = mensagem.substring(0, mensagem.indexOf('('));
		parametros = mensagem.substring((mensagem.indexOf('(') + 1),mensagem.indexOf(')'));
		if(comando.equals("getMaquinas")){
			String json = anotaJson();
			new PrintStream(cliente.getSaida()).println(json);	
			System.out.println("Resposta: "+json);
		}else if(comando.equals("desliga")){
			System.out.println("VOu desligar, calma.");
			new PrintStream(cliente.getSaida()).println("deu certo\n");
		}else if (comando.equals("teste")) {
			new PrintStream(cliente.getSaida()).println("deu certo\n");
			System.out.println("Deu certo");
			
		}else{
			new PrintStream(cliente.getSaida()).println("Deu certo");	
			System.out.println(anotaJson());
			System.out.println("Deu certo");
			
		}
		
	}
	
	public synchronized void processaMensagem(final Cliente cliente, String mensagem) {

		
		String comando = mensagem.substring(0, mensagem.indexOf('('));
		String parametros = mensagem.substring((mensagem.indexOf('(') + 1),mensagem.indexOf(')'));
		System.out.println(mensagem);
		if (comando.equals("autentica")) {
			String login = parametros.substring(0, parametros.indexOf(','));
			String senha = parametros.substring(parametros.indexOf(',') + 1);
			
			UsuarioDAO dao = new UsuarioDAO(DAO.TIPO_CONEXAO_AUTENTICACAO);
			Usuario usuario = new Usuario();
			usuario.setLogin(login);
			usuario.setSenha(senha);
			if (dao.autentica(usuario)) {
				try {
					dao.getConexao().close();
				} catch (SQLException e1) {
					
					e1.printStackTrace();
				}
				
				try {
					dao.getConexao().close();
					dao.setTipoDeConexao(DAO.TIPO_CONEXAO_DEFAULT);
					dao.novaConexao();
				} catch (SQLException e1) {
					// TODO Auto-generated catch block
					e1.printStackTrace();
				}
				
				dao.cadastra(usuario);
				
				System.out.println(cliente.getMaquina().getNome()+ ">> Autenticão bem sucedida.");
				if (this.jaEstaLogado(usuario)) {
					new PrintStream(cliente.getSaida()).println("printc(Já está logado!)");
					return;
				}
				AcessoDAO acessoDao = new AcessoDAO();
				int tempo = acessoDao.retornaTempoUsadoHoje(usuario);
				System.out.println("Usou: " + tempo);
				if (tempo <= AcessoDAO.COTA) {
					System.out.println("Pode acessar durante "+ ((AcessoDAO.COTA) - (tempo)) + " segundos");
					new PrintStream(cliente.getSaida()).println("desbloqueia(" + login + ", "+ ((AcessoDAO.COTA) - (tempo)) + ")");
					cliente.getMaquina().getAcesso().setUsuario(usuario);
					cliente.getMaquina().getAcesso().setTempoDisponibilizado(((AcessoDAO.COTA) - (tempo)));
					cliente.getMaquina().getAcesso().setTempoUsado(0);
					cliente.getMaquina().setIp(cliente.getConexao().getInetAddress().toString().substring(1));
					cliente.getMaquina().getAcesso().contar();
					cliente.getMaquina().getAcesso().setHoraInicial(System.currentTimeMillis());
				} else {
					try {
						cliente.getSaida().flush();
						new PrintStream(cliente.getSaida()).println("printc(Seu tempo acabou)");
					} catch (IOException e) {
						// TODO Auto-generated catch block
						e.printStackTrace();
					}
				}

			} else {
				System.out.println(cliente.getMaquina().getNome()+ ">> Errou login ou senha.");
				try {
					cliente.getSaida().flush();
					new PrintStream(cliente.getSaida()).println("printc(Login e senha não conferem)");
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
			}

			try {
				dao.getConexao().close();
			} catch (SQLException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			
		}else if (comando.equals("meDaBonus")) {
			System.out.println("Quer bonus? Vou pensar...");
			int disponiveis = 0;
			for(Cliente umCliente : listaDeClientes){
				if(umCliente.getMaquina().getStatus() == Maquina.STATUS_DISPONIVEL){
					disponiveis++;
				}		
			}
			if(disponiveis >= 7){
				new PrintStream(cliente.getSaida()).println("bonus()");
				System.out.println("Bonus oferecido para >>"+cliente.getMaquina().getNome());
			}
		
		} else if (comando.equals("setNome")) {

			String nome = parametros;
			cliente.getMaquina().setNome(nome);
			MaquinaDAO maquinaDao = new MaquinaDAO();
			if (!maquinaDao.existe(cliente.getMaquina())) {
				maquinaDao.cadastra(cliente.getMaquina());

			}
			try {
				maquinaDao.getConexao().close();
			} catch (SQLException e) {
				e.printStackTrace();
			}

		} else if (comando.equals("setMac")) {
			cliente.getMaquina().setEnderecoMac(parametros);

		} else if (comando.equals("setStatus")) {
			int status = Integer.parseInt(parametros);
			cliente.getMaquina().setStatus(status);
			switch(status){
				case Maquina.STATUS_DISPONIVEL:
					if(cliente.getMaquina().getAcesso().getStatus() == Acesso.STATUS_EM_UTILIZACAO){
						cliente.getMaquina().getAcesso().pararDeContar();
						cliente.getMaquina().getAcesso().getUsuario().setLogin("livre");
						cliente.getMaquina().setStatus(status);
						AcessoDAO acessodao = new AcessoDAO();
						
						acessodao.cadastra(cliente.getMaquina());
						
						try {
							
							acessodao.getConexao().close();
						} catch (SQLException e) {
							e.printStackTrace();
						}
						
					}
					break;
				case Maquina.STATUS_DESCONECTADA:
					listaDeClientes.remove(cliente);
					break;
				case Maquina.STATUS_UPDATE:
					System.out.println("Vamos Atualizar esse cara.");
					cliente.getMaquina().setStatus(status);
					
					
					
					 
				try {
					
					File f = new File("C:\\UniCafe\\UniCafeClient.exe");
					@SuppressWarnings("resource")
					FileInputStream in = new FileInputStream(f);
					OutputStream out = cliente.getConexao().getOutputStream(); 
					OutputStreamWriter osw = new OutputStreamWriter(out);
					BufferedWriter writer = new BufferedWriter(osw);
					writer.flush();
					int tamanho = 4096;
					byte[] buffer = new byte[tamanho]; 
					int lidos = -1;
					while ((lidos = in.read(buffer, 0, tamanho)) != -1) { 
						 out.write(buffer, 0, lidos); 
						 System.out.println("buffo: "+buffer+" tamanho"+tamanho+" lidos:"+lidos);
					}
					System.out.println("Aweeee");
					cliente.getConexao().close();
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
				
					 

				
				
					break;
				default: 
					cliente.getMaquina().setStatus(status);
					break;
			}
			
			
			
			
			System.out.println(cliente.getMaquina().getNome() + ">> Mudou o Status para "+ Maquina.statusString(status));
		} else {
			System.out.println(cliente.getMaquina().getNome() + ">>"+ " Comando não encontrado. "+mensagem);
		}


	}

	public String getIp() {
		return ip;
	}

	public void setIp(String ip) {
		this.ip = ip;
	}

	public ServerSocket getServerSocket() {
		return serverSocket;
	}

	public void setServerSocket(ServerSocket serverSocket) {
		this.serverSocket = serverSocket;
	}

	public ArrayList<Cliente> getListaDeClientes() {
		return listaDeClientes;
	}

	public void setListaDeClientes(ArrayList<Cliente> listaDeClientes) {
		this.listaDeClientes = listaDeClientes;
	}


}
