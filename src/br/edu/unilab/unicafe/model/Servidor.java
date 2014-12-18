package br.edu.unilab.unicafe.model;

import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.ArrayList;

import javax.swing.SwingUtilities;

import br.edu.unilab.unicafe.dao.UsuarioDAO;
import br.edu.unilab.unicafe.view.FrameApresentacao;
import br.edu.unilab.unicafe.view.FrameServidor;




/**
 * 	
 * @author Jefferson
 *
 */

public class Servidor {
	private Maquina maquina;
	private String ip;
	private ServerSocket serverSocket;
	private ArrayList<Cliente> listaDeClientes;
	public FrameApresentacao frameApresentacao;
	private FrameServidor frameServidor;

	public Servidor() {
		this.maquina = new Maquina();
		this.ip = "";
		this.listaDeClientes = new ArrayList<Cliente>();

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
		this.maquina.preencheComMaquinaLocal();
		this.ip = this.maquina.getIp();
		frameServidor.setVisible(true);
		printd("Iniciando servidor...");
		try {
			this.serverSocket = new ServerSocket(12345, 100);
			printd("Servidor iniciado. ");
			printd("Dados do Servidor: Ip-> " + this.ip + " - MAC-> " + this.maquina.getEnderecoMac());
			esperaConexoes();

		} catch (IOException e) {
			printd("Erro de IO.");
			// e.printStackTrace();
		}

	}

	public void esperaConexoes() {
		Thread recebendoConexao = new Thread(new Runnable() {

			@Override
			public void run() {
				try {
					while (true) {
						printd("Aguardando conexoes...");
						Socket conexao = serverSocket.accept();
						printd("Nova conexão! " + conexao.getInetAddress().toString());
						processaConexao(conexao);

					}
				} catch (IOException e) {
					System.out.println("???");
					e.printStackTrace();
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
				listaDeClientes.add(cliente);
				try {
					cliente.setEntrada(new ObjectInputStream(conexao.getInputStream()));
					cliente.setSaida(new ObjectOutputStream(conexao.getOutputStream()));
				} catch (IOException e) {
					printd("Errinho de IO.");
					// e.printStackTrace();
				}

				cliente.getMaquina().setNome("NAO LISTADO");
				while (!conexao.isClosed()) {

					try {
						String mensagem = (String) cliente.getEntrada().readObject();
						String comando = mensagem.substring(0, mensagem.indexOf('('));
						String parametros = mensagem.substring(mensagem.indexOf('(') + 1, mensagem.indexOf(')'));

						printd(cliente.getMaquina().getNome() + ">> " + mensagem);

						
						
						if(comando.equals("autentica")){
							String login = parametros.substring(0, parametros.indexOf(','));
							String senha = parametros.substring(parametros.indexOf(',') + 1);
							printd(cliente.getMaquina().getNome() + ">> Tentativa de Autenticação.");
							printd(cliente.getMaquina().getNome() + ">> Login : " + login);
							printd(cliente.getMaquina().getNome() + ">> Senha : " + senha);
							UsuarioDAO dao = new UsuarioDAO();
							Usuario usuario = new Usuario();
							usuario.setLogin(login);
							usuario.setSenha(senha);

							if (dao.autentica(usuario)) {
								printd(cliente.getMaquina().getNome() + ">> Autenticação bem sucedida.");
								cliente.getSaida().flush();
								cliente.getSaida().writeObject("desbloqueia(" + login + ", 30)");
							} else {
								printd(cliente.getMaquina().getNome() + ">> Errou login ou senha.");
								cliente.getSaida().flush();
								cliente.getSaida().writeObject("printc(Beleza, Fera! Mas e a senha correta, vc sabe?)");
							}
							
							
						}
						else if (comando.equals("setNome")) {
											
							String nome = parametros;
							printd(cliente.getMaquina().getNome() + ">> Tentou mudar o nome para : " + nome);
							cliente.getMaquina().setNome(nome);
							
						}
						else if (comando.equals("setMac")) {
							
							cliente.getMaquina().setEnderecoMac(parametros);
							printd(cliente.getMaquina().getNome() + ">> Mudou endereço MAC para: " + parametros);
							
						}
						else if (comando.equals("setStatus")) {
							
							int status = Integer.parseInt(parametros);
							cliente.getMaquina().setStatus(status);
							printd(cliente.getMaquina().getNome() + ">> Mudou o Status para " + Maquina.statusString(status));
						}
						else{
							
							printd(cliente.getMaquina().getNome() + ">>" + " Comando não encontrado.");
						}
						

					} catch (ClassNotFoundException e) {

						// e.printStackTrace();
						break;
					} catch (IOException e) {

						// e.printStackTrace();
						break;
					}
				}
				printd(cliente.getMaquina().getNome() + ">> Conexão fechada. ");

			}
		});

		processando.start();

		// Iremos ouvir String. Processar essa string.
		// Ouvir direto até a conexão acabar.
		// A fala vai ter que ser impulsionada por algum evento.
		// Logo não precismos nos procupar com ela agora.

	}

	public Maquina getMaquina() {
		return maquina;
	}

	public void setMaquina(Maquina maquina) {
		this.maquina = maquina;
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
