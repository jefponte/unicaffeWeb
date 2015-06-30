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
			System.out.println("Não consegui utilizar a porta: "+porta+".");
			
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
								+ "<form action=\"\" method=\"post\">"
								+ "<input type=\"text\" name=\"nome\" />"
								+ "<input type=\"submit\" />" 
								+"</form>"
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
								
								//Aqui trocaremos printStrema por ObjectInputStream. 
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
	public String getAjuda(){
		String ajuda = "getMaquinas() - Mostra lista de máquinas em JSON\n";
		ajuda += "desligaTudo() - Desliga todas as máquinas conectadas ao servidor\n";
		ajuda += "exec(strNomeMaquina, strComando) - Executa um comando no CMD\n";
		return ajuda;
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

		System.out.println(cliente.getConexao().getInetAddress()+">> Mensagem admin: "+mensagem);
		if(mensagem == null)
			return;
		
		if(!cliente.getConexao().getInetAddress().toString().equals("/127.0.0.1") && !cliente.getConexao().getInetAddress().toString().equals("/10.5.6.79"))
		{
			new PrintStream(cliente.getSaida()).println(cliente.getConexao().getInetAddress().toString()+">> "+"Conexao Recusada");	
			System.out.println(cliente.getConexao().getInetAddress()+">> Comando recusado, IP estranho tentando dar uma de administrador. ");
			return;
		}
		
		//Primeiro verificamos a possibilidade de uma mensagem sem parametros. 
		
		if(mensagem.equals("ajuda")){
			new PrintStream(cliente.getSaida()).println(getAjuda());
			return;
			
		}
		
		
		//Vamos ver se veio um select. 
		if(mensagem.toLowerCase().indexOf("select") >= 0 || mensagem.toLowerCase().indexOf("insert") >= 0 || mensagem.toLowerCase().indexOf("update") >= 0){
			System.out.println("Veio um SQL");
			String json = "";
			
			int h = 0;
			
			for(Cliente daVez:this.getListaDeClientes()){
				
				String dados = "|{\"id_maquina\":"+daVez.getMaquina().getId()+",\"nome_pc\":\""+daVez.getMaquina().getNome()+"\",\"mac\":\""+daVez.getMaquina().getEnderecoMac()+"\",\"id_acesso\":"+daVez.getMaquina().getAcesso().getId()+",\"hora_inicial\":"+daVez.getMaquina().getAcesso().getHoraInicial()+",\"tempo_oferecido\":"+daVez.getMaquina().getAcesso().getTempoDisponibilizado()+",\"tempo_usado\":"+daVez.getMaquina().getAcesso().getTempoUsado()+",\"ip\":\""+daVez.getConexao().getInetAddress().toString()+"\",\"id_usuario\":"+daVez.getMaquina().getAcesso().getUsuario().getId()+",\"id_laboratorio\":"+daVez.getMaquina().getLaboratorio().getId()+",\"nome_laboratorio\":\""+daVez.getMaquina().getLaboratorio().getNome()+"\",\"nome\":\""+daVez.getMaquina().getAcesso().getUsuario().getNome()+"\",\"email\":\""+daVez.getMaquina().getAcesso().getUsuario().getEmail()+"\",\"login\":\""+daVez.getMaquina().getAcesso().getUsuario().getLogin()+"\",\"senha\":\""+daVez.getMaquina().getAcesso().getUsuario().getSenha()+"\",\"nivel_acesso\":\""+daVez.getMaquina().getAcesso().getUsuario().getNivelAcesso()+"\""+"}";
				if(h == 0){
					
					json = dados;
					h++;
					
				}else{
					
					json = json+dados;
				}
			}
			new PrintStream(cliente.getSaida()).println(json);
			return;
		}
		
		//Depois uma mensagem com parametros. 
		
		if(mensagem.indexOf('(') == -1 || mensagem.indexOf(')') == -1){
			new PrintStream(cliente.getSaida()).println("Mensagem não encontrada. Digite ajuda para obter ajuda. ");	
			return;
		} 
		
		
		String parametros = "";
		System.out.println("Segunda mensagem: "+mensagem);
		String comando = mensagem.substring(0, mensagem.indexOf('('));
		parametros = mensagem.substring((mensagem.indexOf('(') + 1),mensagem.indexOf(')'));
		
		if(comando.equals("getMaquinas")){
			String json = anotaJson();
			new PrintStream(cliente.getSaida()).println(json);	
			System.out.println("Resposta: "+json);
		}else if(comando.equals("desligaTudo")){
			System.out.println("Vou desligar, calma.");
			for(Cliente daVez : listaDeClientes){
				new PrintStream(daVez.getSaida()).println("desligar()");
			}
		}else if (comando.equals("desliga")) {
			
			System.out.println("Desligando "+parametros);
			for(Cliente desligado : listaDeClientes){
				if(desligado.getMaquina().getNome().equals(parametros)){
					new PrintStream(desligado.getSaida()).println("desligar()");
					new PrintStream(cliente.getSaida()).println("Desliguei o "+desligado.getMaquina().getNome());
				}
				
			}
			
			
		}
		else if (comando.equals("aula")) {
			
			System.out.println("Dar aula "+parametros);
			for(Cliente desligado : listaDeClientes){
				
				
				if(desligado.getMaquina().getNome().toLowerCase().equals(parametros.toLowerCase())){
					new PrintStream(desligado.getSaida()).println("desbloqueia(aula, "+18000+ ")");
					new PrintStream(cliente.getSaida()).println("Liberado pra aula o "+desligado.getMaquina().getNome());
				}
				
			}
			
			
		}else if (comando.equals("bloqueia")) {
			
			System.out.println("Bloquear "+parametros);
			for(Cliente desligado : listaDeClientes){
				if(desligado.getMaquina().getNome().toLowerCase().equals(parametros.toLowerCase())){
					new PrintStream(desligado.getSaida()).println("bloqueia()");
					new PrintStream(cliente.getSaida()).println("Bloqueando o "+desligado.getMaquina().getNome());
				}
				
			}
			
			
		}
		else if (comando.equals("desativar")) {
			
			System.out.println("Desativar "+parametros);
			for(Cliente desligado : listaDeClientes){
				if(desligado.getMaquina().getNome().toLowerCase().equals(parametros.toLowerCase())){
					new PrintStream(desligado.getSaida()).println("desativar()");
					new PrintStream(cliente.getSaida()).println("Desativando o "+desligado.getMaquina().getNome());
				}
				
			}
			
			
		}
		
		else if(comando.equals("exec")){
			String nomeDaMaquina = parametros.substring(0, parametros.indexOf(','));
			String strCmd = parametros.substring(parametros.indexOf(',') + 1);
			for(Cliente desligado : listaDeClientes){
				if(desligado.getMaquina().getNome().toLowerCase().equals(nomeDaMaquina.toLowerCase())){
					new PrintStream(desligado.getSaida()).println("exec("+strCmd+")");
					new PrintStream(cliente.getSaida()).println("Comando executado no cliente. ");
					break;
				}
				
			}
			return;
			
			
		}
		
		else if(comando.equals("atualiza")){

			for(Cliente desligado : listaDeClientes){
				if(desligado.getMaquina().getNome().toLowerCase().equals(parametros.toLowerCase())){
					new PrintStream(desligado.getSaida()).println("atualizar()");
					new PrintStream(cliente.getSaida()).println("Aguarde....");
					break;
				}
				
			}
			return;
			
			
		}
		else{
			new PrintStream(cliente.getSaida()).println("Mensagem não encontrada. Digite ajuda para obter ajuda. ");	

			
		}
		
	}
	
	public synchronized void processaMensagem(final Cliente cliente, String mensagem) {
		if(mensagem.indexOf('(') == -1 || mensagem.indexOf(')') == -1){
			return;
		} 
		
		
		
		String comando = mensagem.substring(0, mensagem.indexOf('('));
		String parametros = mensagem.substring((mensagem.indexOf('(') + 1),mensagem.indexOf(')'));
		System.out.println(mensagem);
		if (comando.equals("autentica")) {
			String login = parametros.substring(0, parametros.indexOf(','));
			String senha = parametros.substring(parametros.indexOf(',') + 1);
			Usuario usuario = new Usuario();
			usuario.setLogin(login);
			usuario.setSenha(senha);
			if(login.equals("visitante") && senha.equals(UsuarioDAO.getMD5("123456"))){
				//Contar clientes e contar visitantes. 
				int numeroDeClientes = 0;
				int numeroDeVisitantes = 0;
				int numeroDeMaquinasLivres = 0;
				for(Cliente oDaVez : listaDeClientes){
					if(oDaVez.getMaquina().getAcesso().getUsuario().getLogin().equals("visitante"))
						numeroDeVisitantes++;
					numeroDeClientes++;
					if(oDaVez.getMaquina().getAcesso().getStatus() == Acesso.STATUS_DISPONIVEL)
						numeroDeMaquinasLivres++;
				}

				//Verificar se existem 20 por centod e maquinas conectadas livres.
				if(numeroDeMaquinasLivres < numeroDeClientes*20/100){
					new PrintStream(cliente.getSaida()).println("printc(Laboratório Lotado!)");
					return;
				}
				if(numeroDeVisitantes >= numeroDeClientes*30/100){
					new PrintStream(cliente.getSaida()).println("printc(Muitos visitantes conectados!)");
					return;
				}
				cliente.getMaquina().getAcesso().setUsuario(usuario);
				cliente.getMaquina().getAcesso().setStatus(Acesso.STATUS_EM_UTILIZACAO);
				cliente.getMaquina().setStatus(Maquina.STATUS_OCUPADA);
				new PrintStream(cliente.getSaida()).println("desbloqueia(" + login + ", "+120+ ")");
				return;
			}
			if(login.equals("aula") && senha.equals(UsuarioDAO.getMD5("789456123"))){
				cliente.getMaquina().getAcesso().setUsuario(usuario);
				cliente.getMaquina().getAcesso().setStatus(Acesso.STATUS_EM_UTILIZACAO);
				cliente.getMaquina().setStatus(Maquina.STATUS_OCUPADA);
				new PrintStream(cliente.getSaida()).println("desbloqueia(" + login + ", "+18000+ ")");
				return;
			}
			UsuarioDAO dao = new UsuarioDAO(DAO.TIPO_CONEXAO_AUTENTICACAO);
			
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
				
				if (this.jaEstaLogado(usuario)) {
					new PrintStream(cliente.getSaida()).println("printc(já está logado!)");
					return;
				}
				AcessoDAO acessoDao = new AcessoDAO();
				int tempo = acessoDao.retornaTempoUsadoHoje(usuario);
//				System.out.println("Usou: " + tempo);
				if (tempo <= AcessoDAO.COTA) {
//					System.out.println("Pode acessar durante "+ ((AcessoDAO.COTA) - (tempo)) + " segundos");
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
				e.printStackTrace();
			}
			
		}else if (comando.equals("meDaBonus")) {
			int disponiveis = 0;
			for(Cliente umCliente : listaDeClientes){
				if(umCliente.getMaquina().getStatus() == Maquina.STATUS_DISPONIVEL){
					disponiveis++;
				}		
			}
			if(disponiveis >= 7){
				new PrintStream(cliente.getSaida()).println("bonus()");

			}
		
		} else if (comando.equals("setNome")) {

			String nome = parametros;
			//Antes de setar o nome temos que excluir outras que possuem o mesmo nome. 
			//Além de excluir de nossa lista iremos fechar a conexão. 
			
			
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
						cliente.getMaquina().getAcesso().setStatus(Acesso.STATUS_DISPONIVEL);
						AcessoDAO acessodao = new AcessoDAO();
						if(cliente.getMaquina().getAcesso().getUsuario().getId() != 0)
							acessodao.cadastra(cliente.getMaquina());
						
						try {
							
							acessodao.getConexao().close();
						} catch (SQLException e) {
							e.printStackTrace();
						}
						
					}
					break;
				case Maquina.STATUS_OCUPADA:
					cliente.getMaquina().setStatus(status);
					cliente.getMaquina().getAcesso().setStatus(Acesso.STATUS_EM_UTILIZACAO);
					break;
				case Maquina.STATUS_DESCONECTADA:
					listaDeClientes.remove(cliente);
					break;
				case Maquina.STATUS_UPDATE:
					System.out.println("Vamos Atualizar esse cara.");
					cliente.getMaquina().setStatus(status);
					
					
					
					 
				try {
					
					File f = new File("UniCafeClient.exe");
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
					}
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
