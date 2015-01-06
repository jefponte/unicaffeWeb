package br.edu.unilab.unicafe.model;

import java.awt.AWTException;
import java.awt.Color;
import java.awt.Robot;
import java.awt.event.ActionEvent;
import java.awt.event.KeyEvent;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.math.BigInteger;
import java.net.Socket;
import java.net.UnknownHostException;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import java.util.Scanner;

import javax.swing.AbstractAction;

import br.edu.unilab.unicafe.dao.UsuarioDAO;
import br.edu.unilab.unicafe.view.FrameClientBloqueado;
import br.edu.unilab.unicafe.view.FrameClientDesbloqueio;

/**
 * 
 * @author Jefferson
 *
 */

public class Cliente {

	public boolean bloqueado;
	private Maquina maquina;
	//teste
	private Socket conexao;
	private Servidor servidor;
	private ObjectOutputStream saida;
	private ObjectInputStream entrada;
	private FrameClientBloqueado frameBloqueado;
	private FrameClientDesbloqueio frameDesbloqueado;
	private Thread escInfinito;
	private Usuario usuarioLogado;

	public ObjectOutputStream getSaida() {
		return this.saida;
	}

	public void setSaida(ObjectOutputStream saida) {
		this.saida = saida;
	}

	public Cliente() {
		this.maquina = new Maquina();
		this.servidor = new Servidor();

	}

	public Maquina getMaquina() {
		return maquina;
	}

	public void setMaquina(Maquina maquina) {
		this.maquina = maquina;
	}

	public Socket getConexao() {
		return conexao;
	}

	public void setConexao(Socket conexao) {
		this.conexao = conexao;
	}

	public Servidor getServidor() {
		return servidor;
	}

	public void setServidor(Servidor servidor) {
		this.servidor = servidor;
	}


	public Usuario getUsuarioLogado() {
		return usuarioLogado;
	}

	public void setUsuarioLogado(Usuario usuarioLogado) {
		this.usuarioLogado = usuarioLogado;
	}



	public void desBloqueandoServicos() {

		try {

			// Começar por retirar opção de muar de usuário.
			/*
			 * HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows\CurrentVersion\Policies
			 * \System Na pasta System, altere o valor do campo
			 * "HideFastUserSwitching" para "0".
			 */
			// BLoqueio de opcao pra mudar de usuario.
			Process process = Runtime
					.getRuntime()
					.exec("REG add HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\System /v HideFastUserSwitching /t REG_DWORD /d 0 /f");
			Scanner leitor = new Scanner(process.getInputStream());
			while (leitor.hasNextLine()) {
				System.out.println(leitor.nextLine());
			}
			// Bloqueio de opcao do Gerenciador de tarefas, Current User.
			process = Runtime
					.getRuntime()
					.exec("REG add HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\System /v DisableTaskMgr /t REG_DWORD /d 0 /f");
			leitor = new Scanner(process.getInputStream());

			while (leitor.hasNextLine()) {
				System.out.println(leitor.nextLine());
			}

			process = Runtime
					.getRuntime()
					.exec("REG add HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer /v NoLogOff /t REG_DWORD /d 0 /f");
			leitor = new Scanner(process.getInputStream());

			while (leitor.hasNextLine()) {
				System.out.println(leitor.nextLine());
			}

		} catch (IOException e) {
			e.printStackTrace();
		}

	}
	public void iniciaEscInfinito(){
		
		this.escInfinito = new Thread(new Runnable() {
			
			@Override
			public void run() {
				while(bloqueado){
					Robot robo;
					try {
						Thread.sleep(250);
						robo = new Robot();
						robo.keyPress(KeyEvent.VK_ESCAPE);
						
					} catch (AWTException | InterruptedException e) {
						// TODO Auto-generated catch block
						e.printStackTrace();
					}
					
					
				}
			}
		});
		
		escInfinito.start();
	}


	/**
	 * Este método serve pra bloquear alguns serviços do windows. Ele mexe no
	 * Registro. Esse método não produz efeito se o programa não for executado
	 * como administrador.
	 */
	public void bloqueiaServicos() {

		Thread bloqueandoServicos = new Thread(new Runnable() {

			@Override
			public void run() {
				try {

					// Começar por retirar opção de muar de usuário.
					/*
					 * HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows\CurrentVersion
					 * \Policies\System Na pasta System, altere o valor do campo
					 * "HideFastUserSwitching" para "0".
					 */
					// BLoqueio de opcao pra mudar de usuario.
					Process process = Runtime
							.getRuntime()
							.exec("REG add HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\System /v HideFastUserSwitching /t REG_DWORD /d 1 /f");
					Scanner leitor = new Scanner(process.getInputStream());
					while (leitor.hasNextLine()) {
						System.out.println(leitor.nextLine());
					}
					// Bloqueio de opcao do Gerenciador de tarefas, Current
					// User.
					process = Runtime
							.getRuntime()
							.exec("REG add HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\System /v DisableTaskMgr /t REG_DWORD /d 1 /f");
					leitor = new Scanner(process.getInputStream());

					while (leitor.hasNextLine()) {
						System.out.println(leitor.nextLine());
					}

					process = Runtime
							.getRuntime()
							.exec("REG add HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer /v NoLogOff /t REG_DWORD /d 1 /f");
					leitor = new Scanner(process.getInputStream());

					while (leitor.hasNextLine()) {
						System.out.println(leitor.nextLine());
					}

				} catch (IOException e) {
					e.printStackTrace();
				}

			}
		});
		bloqueandoServicos.start();

	}

	public void iniciaCilente() {
		this.bloqueado = true;
		this.iniciaEscInfinito();
		this.maquina.preencheComMaquinaLocal();
		this.frameDesbloqueado = new FrameClientDesbloqueio();
		this.frameBloqueado = new FrameClientBloqueado();

		frameBloqueado.getBtnLogar().addActionListener(new TentativaDeLogin(frameBloqueado));

		this.frameBloqueado.setAlwaysOnTop(true);
		frameBloqueado.getBtnLogar().addActionListener(
				new TentativaDeLogin(frameBloqueado));

		this.frameBloqueado.getLabelMensagem().setText("");

		this.servidor.setIp("dti15");

		this.servidor.setIp("localhost");

		this.bloqueia();
		this.usuarioLogado = new Usuario();

		Thread tentandoConexao = new Thread(new Runnable() {

			@Override
			public void run() {
				int i = 0;
				while (true) {
					i++;
					frameBloqueado.getLabelStatus().setText("Tentativa " + i);

					System.out
							.println("Tentarei infinitamente uma conexão, esperando 30 segundos a cada tentativa.. ");

					try {
						conexao = new Socket(servidor.getIp(), 12345);
						processaConexao(conexao);

						frameBloqueado.getLabelStatus().setText(
								"Conexão Feita!");
						// processa conexao

						frameBloqueado.getLabelStatus().setForeground(
								Color.GREEN);

						break;
					} catch (UnknownHostException e1) {
						// TODO Auto-generated catch block
						e1.printStackTrace();
					} catch (IOException e1) {
						// TODO Auto-generated catch block
						e1.printStackTrace();
					}
					try {
						Thread.sleep(5000);
					} catch (InterruptedException e) {
						System.out.println("Tentativa fracassada");
						e.printStackTrace();
					}

				}

			}
		});
		tentandoConexao.start();
	}

	
	/**
	 * 
	 */
	private boolean continuaESC = true;

	public void desbloqueia(final int segundos, final String login) {
		continuaESC = false;

		Thread sessao = new Thread(new Runnable() {

			@Override
			public void run() {

				frameDesbloqueado.getFieldUsuario().setText(login);
				System.out.println("Tempo: " + segundos);
				frameBloqueado.setVisible(false);
				frameDesbloqueado.setVisible(true);
				for (int i = segundos; i >= 0; i--) {
					try {
						Thread.sleep(1000);

						frameDesbloqueado.getFieldTempo().setText("00:" + i);
					} catch (InterruptedException e) {

						e.printStackTrace();
					}
				}
				bloqueia();

			}
		});
		sessao.start();

	}

	/**
	 * 
	 */
	public void bloqueia() {
		this.bloqueado = true;
		this.iniciaEscInfinito();
		bloqueiaServicos();
		Thread bloqueando = new Thread(new Runnable() {

			@Override
			public void run() {
				frameDesbloqueado.setVisible(false);
				frameBloqueado.setVisible(true);
				continuaESC = true;
				while (continuaESC) {
					if (!continuaESC) {
						break;
					}
					try {
						Thread.sleep(500);
						Robot android;
						try {
							android = new Robot();
							android.keyPress(KeyEvent.VK_ESCAPE);
						} catch (AWTException e) {

							e.printStackTrace();
						}

					} catch (InterruptedException e) {
						// TODO Auto-generated catch block
						e.printStackTrace();
					}
				}
			}
		});

		bloqueando.start();
	}

	public void processaConexao(final Socket conexao) {

		Thread processando = new Thread(new Runnable() {

			@Override
			public void run() {
				try {
					maquina.setStatus(Maquina.STATUS_DISPONIVEL);
					saida = new ObjectOutputStream(conexao.getOutputStream());
					saida.writeObject("setNome(" + maquina.getNome() + ")");
					saida.writeObject("setStatus(" + maquina.getStatus() + ")");
					saida.writeObject("setMac(" + maquina.getEnderecoMac() + ")");
					entrada = new ObjectInputStream(conexao.getInputStream());
					while (true) {
						try {
							String mensagem = (String) getEntrada()
									.readObject();
							System.out.println("Servidor >> " + mensagem);
							String comando = mensagem.substring(0,
									mensagem.indexOf('('));
							String parametros = mensagem.substring(
									mensagem.indexOf('(') + 1,
									mensagem.indexOf(')'));

							if (comando.equals("bloqueia")) {
								bloqueia();
							} else if (comando.equals("desbloqueia")) {
								bloqueado = false;
								String login = parametros.substring(0,
										parametros.indexOf(','));
								desbloqueia(300, login);

								// identifica o usuario logado no cliente
								UsuarioDAO dao = new UsuarioDAO();
								setUsuarioLogado(dao.logado(login));
								
								System.out.println(usuarioLogado.getLogin());
								
							} else if (comando.equals("printc")) {

								frameBloqueado.getLabelMensagem().setText(
										"" + parametros);
							} else {
							}

						} catch (ClassNotFoundException e) {
							frameBloqueado.setVisible(true);
							frameBloqueado.getLabelStatus().setForeground(
									Color.red);
							frameBloqueado.getLabelStatus().setText(
									"Erro no servidor.");
							e.printStackTrace();
							break;
						} catch (IOException e) {
							frameBloqueado.setVisible(true);
							frameBloqueado.getLabelStatus().setForeground(
									Color.red);
							frameBloqueado.getLabelStatus().setText(
									"Erro no servidor.");
							e.printStackTrace();
							break;
						}
					}
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}

			}
		});
		processando.start();
	}

	public ObjectInputStream getEntrada() {
		return entrada;
	}

	public void setEntrada(ObjectInputStream entrada) {
		this.entrada = entrada;
	}

	class TentativaDeLogin extends AbstractAction {

		private static final long serialVersionUID = 1L;
		FrameClientBloqueado frame;

		public TentativaDeLogin(FrameClientBloqueado frame) {
			this.frame = frame;
		}

		@Override
		public void actionPerformed(ActionEvent arg0) {
			// ObjectOutputStream saida;
			if (frame.getTextLogin().getText().equals("sair")) {
				desBloqueandoServicos();

				System.exit(0);
			}
			String senha = "";
			try {

				MessageDigest m;
				try {
					m = MessageDigest.getInstance("MD5");
					m.update(
							String.copyValueOf(
									frame.getJPasswordSenha().getPassword())
									.getBytes(),
							0,
							String.copyValueOf(
									frame.getJPasswordSenha().getPassword())
									.length());
					senha = new BigInteger(1, m.digest()).toString(16);
					saida.writeObject("autentica("
							+ frame.getTextLogin().getText() + "," + senha
							+ ")");

				} catch (NoSuchAlgorithmException e) {
					frame.getLabelMensagem()
							.setText(
									frame.getLabelMensagem().getText()
											+ ". Tentativa falha. Erro de Não achou o algoritimo.");
					// e.printStackTrace();
				}

			} catch (IOException e) {
				frame.getLabelMensagem()
						.setText(
								frame.getLabelMensagem().getText()
										+ ". Tentativa falha. Erro de Não achou o algoritimo.");
				// e.printStackTrace();
			}
			frame.getTextLogin().setText("");
			frame.getJPasswordSenha().setText("");

		}

	}
}
