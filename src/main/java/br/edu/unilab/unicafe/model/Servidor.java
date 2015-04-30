package br.edu.unilab.unicafe.model;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.FileWriter;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.io.PrintStream;
import java.io.PrintWriter;
import java.net.ServerSocket;
import java.net.Socket;
import java.sql.SQLException;
import java.util.ArrayList;

import javax.swing.SwingUtilities;

import com.google.gson.Gson;

import br.edu.unilab.unicafe.dao.AcessoDAO;
import br.edu.unilab.unicafe.dao.MaquinaDAO;
import br.edu.unilab.unicafe.dao.UsuarioDAO;
import br.edu.unilab.unicafe.view.FrameApresentacao;
import br.edu.unilab.unicafe.view.FrameAviso;
import br.edu.unilab.unicafe.view.FrameServidor;

/**
 * 
 * @author Jefferson
 *
 */

public class Servidor {

	private String ip;
	private ServerSocket serverSocket;
	private ArrayList<Cliente> listaDeClientes;
	private FrameApresentacao frameApresentacao;
	private FrameServidor frameServidor;

	

	public Servidor() {


		this.listaDeClientes = new ArrayList<Cliente>();
		this.ip = "localhost";

	}

	public void printd(final String mensagem) {

		SwingUtilities.invokeLater(new Runnable() {

			@Override
			public void run() {
				String valor;
				if(frameServidor.getDisplay().getText().length() > 2000){
					valor = frameServidor.getDisplay().getText().substring(frameServidor.getDisplay().getText().length() - 2000, frameServidor.getDisplay().getText().length());
					System.out.println(valor);
					frameServidor.getDisplay().setText(valor+"\n" + mensagem);
				}else{

					frameServidor.getDisplay().append("\n" + mensagem);
					
				}
				
					

			}
		});

	}
	public void iniciaSplash() {
		Thread iniciando = new Thread(new Runnable() {

			@Override
			public void run() {
				frameApresentacao = new FrameApresentacao();
				frameApresentacao.setLocationRelativeTo(null);
				frameApresentacao.setVisible(true);
				try {
					Thread.sleep(3000);
					frameApresentacao.setVisible(false);
				} catch (InterruptedException e) {
					e.printStackTrace();
				}
				iniciaServico();
			}
		});
		iniciando.start();
	}
	public void iniciaServico() {
		
		
	
		frameServidor = new FrameServidor();
		frameServidor.setVisible(true);
		
		frameServidor.getMenuDesligar().addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				desligarTodos();
			}
		});
		frameServidor.getItemUpdate().addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				atualizaTodos();
			}
		});
		try {

			this.serverSocket = new ServerSocket(12346, 100);
			esperaConexoes();
		} catch (IOException e) {
			printd("Não consegui criar o serviço na porta 12345.");
			
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
				json = json+"\n"+geson.toJson(c.getMaquina());
			}
			//printd(json);
		}
		return json;
		
	}

	public void esperaConexoes() {
		Thread recebendoConexao = new Thread(new Runnable() {

			@Override
			public void run() {
				printd("Servidor iniciado...");
				while (true) {
					
					Socket conexao;
					try {
						conexao = serverSocket.accept();
						//printd("Nova conexão! "	+ conexao.getInetAddress().toString());
						processaConexao(conexao);
					} catch (IOException e) {
						printd("Tentativa de conexão frustrada! ");
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
					//printd(mensagem);
					
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
						
						
						printd("Vamos Atualizar esse cara.");
						cliente.getMaquina().setStatus(status);
						try {
							File f = new File("C:\\UniCafe\\UniCafeClient.exe");
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
								 printd("buffo: "+buffer+" tamanho"+tamanho+" lidos:"+lidos);
							}
							printd("Aweeee");
							cliente.getConexao().close();
						} catch (IOException e) {
							// TODO Auto-generated catch block
							e.printStackTrace();
						}
						
					
					}else{
						printd("Comando recusado.");
						printd(mensagem);
						printd("Uma conexao recusada. ");
						ps.println("Eu sou o Servidor, meu chapa!");
						conexao.close();
						return;
					}
					
					
				} catch (IOException e) {
					if (cliente.getMaquina().getAcesso().getStatus() ==  Acesso.STATUS_EM_UTILIZACAO) {
						cliente.getMaquina().getAcesso().pararDeContar();
						AcessoDAO acessodao = new AcessoDAO();
						acessodao.cadastra(cliente.getMaquina());
						
						try {
							acessodao.getConexao().close();
						} catch (SQLException e1) {
							printd("Erro de SQLEXception.");
						}
					}
					listaDeClientes.remove(cliente);
					printd("Uma maquina desconectou.");
					
					
				}

				if (cliente.getMaquina().getAcesso().getStatus() ==  Acesso.STATUS_EM_UTILIZACAO) {
					cliente.getMaquina().getAcesso().pararDeContar();
					AcessoDAO acessodao = new AcessoDAO();
					acessodao.cadastra(cliente.getMaquina());
					
					try {
						
						acessodao.getConexao().close();
						
					} catch (SQLException e) {
						printd("Erro de SQLEXception.");
					}
				}

				printd(cliente.getMaquina().getNome() + ">> Conexão fechada. ");
				

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
	
		new PrintStream(cliente.getSaida()).println(anotaJson());
		
	}
	
	public synchronized void processaMensagem(final Cliente cliente, String mensagem) {

		
		String comando = mensagem.substring(0, mensagem.indexOf('('));
		String parametros = mensagem.substring((mensagem.indexOf('(') + 1),mensagem.indexOf(')'));
		printd(mensagem);
		if (comando.equals("autentica")) {
			String login = parametros.substring(0, parametros.indexOf(','));
			String senha = parametros.substring(parametros.indexOf(',') + 1);
			
			UsuarioDAO dao = new UsuarioDAO();
			Usuario usuario = new Usuario();
			usuario.setLogin(login);
			usuario.setSenha(senha);
			if (dao.autentica(usuario)) {
				printd(cliente.getMaquina().getNome()+ ">> Autenticão bem sucedida.");
				if (this.jaEstaLogado(usuario)) {
					new PrintStream(cliente.getSaida()).println("printc(Já está logado!)");
					return;
				}
				AcessoDAO acessoDao = new AcessoDAO(dao.getConexao());
				int tempo = acessoDao.retornaTempoUsadoHoje(usuario);
				printd("Usou: " + tempo);
				if (tempo <= AcessoDAO.COTA) {
					printd("Pode acessar durante "+ ((AcessoDAO.COTA) - (tempo)) + " segundos");
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
				printd(cliente.getMaquina().getNome()+ ">> Errou login ou senha.");
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
			printd("Quer bonus? Vou pensar...");
			int disponiveis = 0;
			for(Cliente umCliente : listaDeClientes){
				if(umCliente.getMaquina().getStatus() == Maquina.STATUS_DISPONIVEL){
					disponiveis++;
				}		
			}
			if(disponiveis >= 7){
				new PrintStream(cliente.getSaida()).println("bonus()");
				printd("Bonus oferecido para >>"+cliente.getMaquina().getNome());
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
					printd("Vamos Atualizar esse cara.");
					cliente.getMaquina().setStatus(status);
					
					
					
					 
				try {
					
					File f = new File("C:\\UniCafe\\UniCafeClient.exe");
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
						 printd("buffo: "+buffer+" tamanho"+tamanho+" lidos:"+lidos);
					}
					printd("Aweeee");
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
			
			
			
			
			printd(cliente.getMaquina().getNome() + ">> Mudou o Status para "+ Maquina.statusString(status));
		} else {
			printd(cliente.getMaquina().getNome() + ">>"+ " Comando não encontrado. "+mensagem);
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

	public FrameServidor getFrameServidor() {
		return frameServidor;
	}

	public void setFrameServidor(FrameServidor frameServidor) {
		this.frameServidor = frameServidor;
	}

}
