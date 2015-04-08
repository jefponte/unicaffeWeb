package br.edu.unilab.unicafe.model;

import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
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
				frameServidor.getDisplay().append("\n" + mensagem);

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

		try {

			this.serverSocket = new ServerSocket(12345, 100);
			esperaConexoes();
		} catch (IOException e) {
			printd("Não consegui criar o serviço na porta 12345.");

		}

	}

	public void esperaConexoes() {
		Thread recebendoConexao = new Thread(new Runnable() {

			@Override
			public void run() {
				while (true) {
					printd("Aguardando conexoes...");
					Socket conexao;
					try {
						conexao = serverSocket.accept();
						printd("Nova conexão! "	+ conexao.getInetAddress().toString());
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
				cliente.getMaquina().setIp(cliente.getConexao().getInetAddress().toString().substring(1));
				listaDeClientes.add(cliente);
				
				try {
					cliente.setEntrada(new ObjectInputStream(conexao.getInputStream()));
					cliente.setSaida(new ObjectOutputStream(conexao.getOutputStream()));
					while (!conexao.isClosed()) {
						try{
							String mensagem = (String) cliente.getEntrada().readObject();
							processaMensagem(cliente, mensagem);
						} catch (ClassNotFoundException e) {
							printd("Cliente enviou algo estranho.");
						}
					}
				} catch (IOException e) {
					printd("Não foi possível capturar saída e entrada dessa conexão. Tente fazer outra conexão.");
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
				listaDeClientes.remove(cliente);

			}
		});

		processando.start();

	}
	public boolean jaEstaLogado(Usuario usuario) {
		for (Cliente cliente : listaDeClientes) 
			if ((cliente.getMaquina().getAcesso().getStatus() == Acesso.STATUS_EM_UTILIZACAO) && (cliente.getMaquina().getAcesso().getUsuario().getLogin().equals(usuario.getLogin()))) 
					return true;
		return false;
	}
	public synchronized void processaMensagem(Cliente cliente, String mensagem) {
		//System.out.println(mensagem);
		
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
					try {
						cliente.getSaida().flush();
						cliente.getSaida().writeObject("printc(Já está logado!)");
						return;
					} catch (IOException e) {
						
					}
				}
				AcessoDAO acessoDao = new AcessoDAO(dao.getConexao());
				int tempo = acessoDao.retornaTempoUsadoHoje(usuario);
				printd("Usou: " + tempo);
				if (tempo <= AcessoDAO.COTA) {
					printd("Pode acessar durante "+ ((AcessoDAO.COTA) - (tempo)) + " segundos");
					try {
						cliente.getSaida().writeObject("desbloqueia(" + login + ", "+ ((AcessoDAO.COTA) - (tempo)) + ")");
						
						cliente.getMaquina().getAcesso().setUsuario(usuario);
						cliente.getMaquina().getAcesso().setTempoDisponibilizado(((AcessoDAO.COTA) - (tempo)));
						cliente.getMaquina().getAcesso().setTempoUsado(0);
						cliente.getMaquina().setIp(cliente.getConexao().getInetAddress().toString().substring(1));
						cliente.getMaquina().getAcesso().contar();
						cliente.getMaquina().getAcesso().setHoraInicial(System.currentTimeMillis());
					} catch (IOException e) {
						e.printStackTrace();
					}
				} else {
					try {
						cliente.getSaida().flush();
						cliente.getSaida().writeObject("printc(Seu tempo acabou)");
					} catch (IOException e) {
						// TODO Auto-generated catch block
						e.printStackTrace();
					}
				}

			} else {
				printd(cliente.getMaquina().getNome()+ ">> Errou login ou senha.");
				try {
					cliente.getSaida().flush();
					cliente.getSaida().writeObject("printc(Login e senha não conferem)");
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
			if (status == Maquina.STATUS_DISPONIVEL){
				
				if(cliente.getMaquina().getAcesso().getStatus() == Acesso.STATUS_EM_UTILIZACAO){
					cliente.getMaquina().getAcesso().pararDeContar();
					cliente.getMaquina().setStatus(status);
					AcessoDAO acessodao = new AcessoDAO();
					if(acessodao.cadastra(cliente.getMaquina())){
						System.out.println("Sucesso no cadastro de acesso");
					}else{
						System.out.println("Fracaço no cadastro de acesso");
					}
					
					try {
						acessodao.getConexao().close();
					} catch (SQLException e) {
						e.printStackTrace();
					}
					
				}
				
				
			} 
			
			printd(cliente.getMaquina().getNome() + ">> Mudou o Status para "+ Maquina.statusString(status));
		} else {
			printd(cliente.getMaquina().getNome() + ">>"+ " Comando não encontrado. "+mensagem);
		}
		/*
		for(Cliente c : this.listaDeClientes){
			Gson geson = new Gson();
			String json = geson.toJson(c.getMaquina());
			printd(json);
		}
		*/
		

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
