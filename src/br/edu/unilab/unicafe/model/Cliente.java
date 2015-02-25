package br.edu.unilab.unicafe.model;

import java.awt.AWTException;
import java.awt.Color;
import java.awt.Robot;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.KeyEvent;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.math.BigInteger;
import java.net.Socket;
import java.net.UnknownHostException;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import java.util.Properties;

import javax.swing.AbstractAction;
import javax.swing.JFrame;

import br.edu.unilab.unicafe.registro.model.Perfil;
import br.edu.unilab.unicafe.view.FrameClientBloqueado;
import br.edu.unilab.unicafe.view.FrameClientDesbloqueado;

/**
 * 
 * @author Jefferson
 *
 */

public class Cliente {

	public boolean bloqueado;
	private Maquina maquina;
	private Socket conexao;
	private Servidor servidor;
	private ObjectOutputStream saida;
	private ObjectInputStream entrada;
	private FrameClientBloqueado frameBloqueado;
	private FrameClientDesbloqueado frameDesbloqueado;
	private Thread escInfinito;

	private Acesso acesso;
	
	public ObjectOutputStream getSaida() {
		return this.saida;
	}

	public void setSaida(ObjectOutputStream saida) {
		this.saida = saida;
	}

	public Cliente() {
		this.maquina = new Maquina();
		this.servidor = new Servidor();
		this.setAcesso(null);

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

	public void desBloqueandoServicos() {

		Thread desBloqueandoServicos = new Thread(new Runnable() {

			@Override
			public void run() {
				Perfil perfilBloqueio = new Perfil();
				perfilBloqueio.setListaDeRegistros(Perfil.listaParaBloqueio());
				perfilBloqueio.desfazer();

			}
		});
		desBloqueandoServicos.start();

	}

	
	
	public void alteraRegistro(String comando){
		
		
		
	}
	
	public void iniciaEscInfinito() {

		this.escInfinito = new Thread(new Runnable() {

			@Override
			public void run() {
				while (bloqueado) {
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
				Perfil perfilBloqueio = new Perfil();
				perfilBloqueio.setListaDeRegistros(Perfil.listaParaBloqueio());
				perfilBloqueio.executar();
				/*
				try {
					Runtime.getRuntime().exec(" taskkill /f /im explorer.exe");
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
				*/
				

			}
		});
		bloqueandoServicos.start();

	}

	public static final String IP_DO_SERVIDOR= "DTI43";
	public void iniciaCilente() {
		System.out.println("Teste");
		this.frameBloqueado = new FrameClientBloqueado();
		this.frameBloqueado.setAlwaysOnTop(true);
		this.frameBloqueado.setVisible(true);
		this.bloqueado = true;
		this.maquina.preencheComMaquinaLocal();
		this.frameDesbloqueado = new FrameClientDesbloqueado();
		frameBloqueado.getBtnEntrar().addActionListener(new TentativaDeLogin(frameBloqueado));
		this.frameBloqueado.getLabelMensagem().setText("");
		



		this.frameBloqueado.setVisible(true);
		
		
		
		//this.iniciaEscInfinito();
		
		
		
		

		
		/*
		 * O IP do servidor é definido pelo INI. 
		 * Caso o valor no INI não seja existente iremos criar um INI com 
		 * a variável para o IP de valor padrão igual ao nome da máquina do JEFPONTE. 
		 */

		Properties config = new Properties();
		String ipDoServidor = IP_DO_SERVIDOR;
		try {
			FileInputStream fileInputStream= new FileInputStream("config.ini");
			config.load(fileInputStream);
			ipDoServidor = config.getProperty("host_unicafeserver");
			fileInputStream.close();
		} catch (FileNotFoundException e2) {
			//Se o arquivo não existir agente cria e adiciona valor. 
			
			try {

				FileOutputStream fileOutputStream = new FileOutputStream("config.ini");
				config.setProperty("host_unicafeserver", IP_DO_SERVIDOR);
				config.store(fileOutputStream, "Arquivo de Configuração do uniCafeClient");
				fileOutputStream.flush();
				fileOutputStream.close();
			} catch (FileNotFoundException e) {
				e.printStackTrace();
			} catch (IOException e) {
				e.printStackTrace();
			}
		} catch (IOException e) {

		}
		
		this.servidor.setIp(config.getProperty("host_unicafeserver"));
		System.out.println("IP DO SERVIDOR: "+this.servidor.getIp());
		this.bloqueia();

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

					} catch (IOException e1) {

					}
					try {
						Thread.sleep(5000);
					} catch (InterruptedException e) {
						System.out.println("Tentativa fracassada");
						
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
		bloqueado = false;
		Thread sessao = new Thread(new Runnable() {

			@Override
			public void run() {
				
				frameDesbloqueado.getLblUsuario().setText(login);
				System.out.println("Tempo: " + segundos);
				frameBloqueado.setVisible(false);
				frameDesbloqueado.setVisible(true);
				frameDesbloqueado.getBtnFinalizar().addActionListener(new ActionListener() {
					
					@Override
					public void actionPerformed(ActionEvent e) {
						
						bloqueia();
					}
				});
				
				for (int i = segundos; ((i >= 0)&& (!bloqueado)); i--) {
					try {
						Thread.sleep(1000);
					
						int tempo = i;
						int hora = 0;
						int minuto = 0;
						while(tempo >= 60){
							tempo -= 60;
							minuto++;
						}
						while(minuto >= 60){
							minuto -= 60;
							hora++;
						}
						
						frameDesbloqueado.getLblTempo().setText(String.format("%02d", hora)+":"+String.format("%02d", minuto)+":"+String.format("%02d", tempo));
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
		
		try {
			if(this.saida != null)
				this.saida.writeObject("setStatus(" + maquina.STATUS_DISPONIVEL+ ")");
		} catch (IOException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
		}
		
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
					saida.writeObject("setMac(" + maquina.getEnderecoMac()
							+ ")");
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
								
								String login = parametros.substring(0,
										parametros.indexOf(','));
								String tempo = parametros.substring(parametros.indexOf(',')+2);
								System.out.println("Tempo foi de : "+tempo);
								int time = Integer.parseInt(tempo);
								desbloqueia(time, login);
							} else if (comando.equals("printc")) {

								frameBloqueado.getLabelMensagem().setText(
										"" + parametros);

							}
							 else {
								
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

	public Acesso getAcesso() {
		return acesso;
	}

	public void setAcesso(Acesso acesso) {
		this.acesso = acesso;
	}

	class TentativaDeLogin extends AbstractAction {

		private static final long serialVersionUID = 1L;
		FrameClientBloqueado frame;

		public TentativaDeLogin(FrameClientBloqueado frame) {
			System.out.println("Construtor da classe interna do cliente: FrameTentativaDeLogin");
			this.frame = frame;
		}

		@Override
		public void actionPerformed(ActionEvent arg0) {
			System.out.println("Disparou evento");
			// ObjectOutputStream saida;
			if (frame.getTextFieldUsuario().getText().equals("senhasecreta")) {
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
									frame.getPasswordFieldSenha().getPassword())
									.getBytes(),
							0,
							String.copyValueOf(
									frame.getPasswordFieldSenha().getPassword())
									.length());
					senha = new BigInteger(1, m.digest()).toString(16);
					saida.writeObject("autentica("
							+ frame.getTextFieldUsuario().getText() + "," + senha
							+ ")");


					frame.getTextFieldUsuario().setText("");
					frame.getPasswordFieldSenha().setText("");
				} catch (NoSuchAlgorithmException e) {
					frame.getLabelMensagem()
							.setText(
									frame.getLabelMensagem().getText()
											+ ". Tentativa falha. Erro de Não achou o algoritimo.");
					// e.printStackTrace();

					frame.getTextFieldUsuario().setText("");
					frame.getPasswordFieldSenha().setText("");
				}

				frame.getTextFieldUsuario().setText("");
				frame.getPasswordFieldSenha().setText("");
			} catch (IOException e) {
				frame.getLabelMensagem()
						.setText(
								frame.getLabelMensagem().getText()
										+ ". Tentativa falha. Erro de Não achou o algoritimo.");

				frame.getTextFieldUsuario().setText("");
				frame.getPasswordFieldSenha().setText("");
				// e.printStackTrace();
			}
			frame.getTextFieldUsuario().setText("");
			frame.getPasswordFieldSenha().setText("");

		}

	}
}
