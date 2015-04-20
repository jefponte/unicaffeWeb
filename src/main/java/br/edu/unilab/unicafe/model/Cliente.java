package br.edu.unilab.unicafe.model;

import java.awt.AWTException;
import java.awt.Color;
import java.awt.Robot;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.KeyAdapter;
import java.awt.event.KeyEvent;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.math.BigInteger;
import java.net.Socket;
import java.net.SocketException;
import java.net.UnknownHostException;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import java.util.Properties;
import java.util.Scanner;

import javax.swing.AbstractAction;
import javax.swing.JFrame;

import br.edu.unilab.unicafe.bloqueio.model.PerfilBloqueio;
import br.edu.unilab.unicafe.dao.UsuarioDAO;
import br.edu.unilab.unicafe.desktop.Desktop;
import br.edu.unilab.unicafe.registro.model.Perfil;
import br.edu.unilab.unicafe.view.FrameAviso;
import br.edu.unilab.unicafe.view.FrameClientBloqueado;
import br.edu.unilab.unicafe.view.FrameClientDesbloqueado;
import br.edu.unilab.unicafe.view.UtilFrames;

/**
 * 
 * @author Jefferson
 *
 */

public class Cliente {

	public boolean bloqueado;
	protected Maquina maquina;
	private Socket conexao;
	private Servidor servidor;
	private ObjectOutputStream saida;
	private ObjectInputStream entrada;
	protected FrameClientBloqueado frameBloqueado;
	private FrameClientDesbloqueado frameDesbloqueado;
	private Thread escInfinito;
	/**
	 * Essa frame possui duas JLabels a serem alteradas. 
	 * Por padrão vem com informação de que o tempo está acabando. 
	 */
	private FrameAviso frameAviso;
	
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
	 * Este m�todo serve pra bloquear alguns servi�os do windows. Ele mexe no
	 * Registro. Esse m�todo n�o produz efeito se o programa n�o for executado
	 * como administrador.
	 */
	public void bloqueiaServicos() {

		Thread bloqueandoServicos = new Thread(new Runnable() {

			@Override
			public void run() {
				Perfil perfilBloqueio = new Perfil();
				perfilBloqueio.setListaDeRegistros(Perfil.listaParaBloqueio());
				perfilBloqueio.executar();

			}
		});
		bloqueandoServicos.start();

	}

	private int contagemParaOcultar;
	private boolean ocultada;

	public void mostraBarra() {
		// valor em segundos.
		contagemParaOcultar = 5;
		if (ocultada) {
			ocultada = false;
			// A� a gente faz a contagem pra mostrar.
			// Nova trede e estar essa trede.

			Thread mostrando = new Thread(new Runnable() {

				@Override
				public void run() {

					for (int i = (10 - (frameDesbloqueado.getWidth())); i < 0; i = i + 30) {
						try {
							Thread.sleep(1);
							frameDesbloqueado.setBounds(i, 0,
									frameDesbloqueado.getWidth(),
									frameDesbloqueado.getHeight());
						} catch (InterruptedException e) {
							// TODO Auto-generated catch block
							e.printStackTrace();
						}

					}

					frameDesbloqueado.setBounds(0, 0,
							frameDesbloqueado.getWidth(),
							frameDesbloqueado.getHeight());
					frameDesbloqueado.getLblLogoBarra().setVisible(false);

				}
			});

			mostrando.start();

		}
		// Caso ela j� esteja a amostra o que acontece � que ela continua a
		// amostra e renova o tempo para oculta��o para 10 segundos.

	}

	/**
	 * Esse m�todo vai criar uma Thread que vai ser executada infinitamente. Ela
	 * vai observar de segundo em segundo o tempo para oculta��o. Se o tempo
	 * chegar a ser zero ela vai esconder a barra e colocar o ocultada como
	 * true.
	 * 
	 * 
	 * 
	 * 
	 * 
	 */
	public void escondeBarra() {

		Thread escondeQuandoTempoTiverEmZero = new Thread(new Runnable() {

			@Override
			public void run() {
				while (true) {
					try {
						Thread.sleep(1000);
						if (contagemParaOcultar > 0) {
							contagemParaOcultar--;

						} else {
							if (!ocultada) {
								ocultada = true;

								// frameDesbloqueado.

								// Ocultaremos aqui.
								Thread ocultando = new Thread(new Runnable() {

									@Override
									public void run() {
										for (int i = 0; i > (35 - (frameDesbloqueado
												.getWidth())); i--) {
											try {
												if (!ocultada) {
													break;
												}
												Thread.sleep(1);
												frameDesbloqueado.setBounds(i,
														0, frameDesbloqueado
																.getWidth(),
														frameDesbloqueado
																.getHeight());
											} catch (InterruptedException e) {

											}

										}

										frameDesbloqueado.getLblLogoBarra()
												.setVisible(true);

									}

								});
								ocultando.start();

							}

						}

					} catch (InterruptedException e) {
						// TODO Auto-generated catch block
						e.printStackTrace();
					}

				}
			}
		});
		escondeQuandoTempoTiverEmZero.start();

	}

	public static final String IP_DO_SERVIDOR = "10.11.0.20";
	protected String ipDoServidor;

	public void iniciaCilente() {

		this.frameAviso = new FrameAviso();
		this.frameDesbloqueado = new FrameClientDesbloqueado();
		

		escondeBarra();

		Thread t = new Thread(new Runnable() {

			@Override
			public void run() {
				PerfilBloqueio pb = new PerfilBloqueio();
				pb.buscaAceitos();

				while (true) {

					pb.buscaAtivos();
					pb.comparaEMata();
					try {
						Thread.sleep(2000);
					} catch (InterruptedException e) {
						// TODO Auto-generated catch block
						e.printStackTrace();
					}
				}
			}
		});
		t.start();
		/*
		 * Regras da vers�o emergencial.
		 * 
		 * 
		 * O que � a vers�o emergencial? � uma vers�o que funcionar� sem a
		 * estrutura robusta.
		 * 
		 * Por que criar esta vers�o? Estamos aguardando uma posi��o quanto ao
		 * acesso � bancos de dados em servidor virtualizado e acesso ao banco
		 * do sig. Isso n�o depende de n�s. Temos que pedir l� no setor em
		 * Auroras.
		 * 
		 * Definindo regras:
		 * 
		 * 1 - O acesso ser� de 3 horas por dia no estado padr�o dos
		 * laborat�rios. Como executar a renova��o? A sql que ser� passada pelo
		 * banco ir� pesquisar apenas no dia corrente.
		 * 
		 * 
		 * 2 - Estado Tempo Livre e Identificado.
		 */

		
		this.bloqueado = true;
		this.maquina.preencheComMaquinaLocal();

		// Adicionar evento de mostrar.

		
		this.iniciaEscInfinito();

		this.atualizaIP();
		

		this.conexaoComServidor();

		adicionaEventos();
		this.bloqueia();
		
	}

	public void adicionaEventos() {

		frameDesbloqueado.addMouseListener(new MouseAdapter() {
			@Override
			public void mousePressed(MouseEvent e) {
				contagemParaOcultar = 0;
			}
		});

		this.frameDesbloqueado.addMouseListener(new MouseAdapter() {

			@Override
			public void mouseEntered(MouseEvent arg0) {
				mostraBarra();
			}
		});

		frameBloqueado.getBtnEntrar().addActionListener(
				new TentativaDeLogin(frameBloqueado));
		frameBloqueado.getPasswordFieldSenha().addKeyListener(new KeyAdapter() {

			public void keyPressed(java.awt.event.KeyEvent e) {
				if (e.getKeyCode() == java.awt.event.KeyEvent.VK_ENTER) {

					if (frameBloqueado.getTextFieldUsuario().getText()
							.equals("senhasecreta")
							&& frameBloqueado.getPasswordFieldSenha().getText()
									.equals("123456")) {

						desBloqueandoServicos();

						Thread t = new Thread(new Runnable() {

							@Override
							public void run() {

								try {
									JFrame frameLocal = frameBloqueado;
									frameLocal.setVisible(false);
									// System.out.println("Fechando Explorer. ");
									Runtime.getRuntime().exec(
											" taskkill /f /im explorer.exe");
									
									Thread.sleep(1000);
									// System.out.println("Abrindo Explorer. ");
									Runtime.getRuntime().exec("explorer.exe");
									System.exit(0);

								} catch (InterruptedException | IOException e) {
									// TODO Auto-generated catch block
									e.printStackTrace();
								}

							}
						});
						t.start();
						return;

					}
					@SuppressWarnings("deprecation")
					String senha = UsuarioDAO.getMD5(frameBloqueado
							.getPasswordFieldSenha().getText());

					try {
						getSaida().writeObject(
								"autentica("
										+ frameBloqueado.getTextFieldUsuario()
												.getText() + "," + senha + ")");

					} catch (IOException e2) {
						// TODO Auto-generated catch block
						e2.printStackTrace();
						frameBloqueado.getTextFieldUsuario().setText("");
						frameBloqueado.getPasswordFieldSenha().setText("");

					}

					frameBloqueado.getTextFieldUsuario().setText("");
					frameBloqueado.getPasswordFieldSenha().setText("");

				}

			};
		});

	}

	public void conexaoComServidor() {
		Thread tentandoConexao = new Thread(new Runnable() {

			@Override
			public void run() {
				int i = 0;
				while (true) {
					i++;
					frameBloqueado.getLabelStatus().setText("Tentativa " + i);

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
						

					} catch (IOException e1) {

						
					}
					try {
						Thread.sleep(5000);
					} catch (InterruptedException e) {

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

	private String servidorDeArquivos;
	public void atualizaIP() {

		/*
		 * O IP do servidor � definido pelo INI. Caso o valor no INI n�o seja
		 * existente iremos criar um INI com a vari�vel para o IP de valor
		 * padr�o igual ao nome da m�quina do JEFPONTE.
		 */

		Properties config = new Properties();
		ipDoServidor = IP_DO_SERVIDOR;
		servidorDeArquivos = IP_DO_SERVIDOR;
		
		try {
			FileInputStream fileInputStream = new FileInputStream("config.ini");
			config.load(fileInputStream);
			ipDoServidor = config.getProperty("host_unicafeserver");
			servidorDeArquivos = config.getProperty("host_arquivos");
			fileInputStream.close();
		} catch (FileNotFoundException e2) {
			// Se o arquivo n�o existir agente cria e adiciona valor.

			try {

				FileOutputStream fileOutputStream = new FileOutputStream(
						"config.ini");
				config.setProperty("host_unicafeserver", IP_DO_SERVIDOR);
				config.store(fileOutputStream,
						"Arquivo de Configuração do uniCafeClient");
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

	}

	
	public void desbloqueia(final int segundos, final String login) {

		
		String caminho = "\\\\"+this.getMaquina().getNome()+"\\arquivos";
		
		
		File diretorio = new File(caminho); 
		if (!diretorio.exists()) 
			diretorio.mkdirs();   
		if (!diretorio.exists()){
			System.out.println("Servidor de arquivos Não acessível");
			this.frameBloqueado.getLabelStatus().setText("Servidor de Arquivos Desligado");
			return;
		}
		
		Desktop d = new Desktop(caminho, login);
		

		d.alterarRegistro();

		try {
			Runtime.getRuntime().exec(" taskkill /f /im explorer.exe");
			Runtime.getRuntime().exec(" taskkill /f /im chrome.exe");
			Runtime.getRuntime().exec(" taskkill /f /im firefox.exe");
			Runtime.getRuntime().exec(" taskkill /f /im iexplore.exe");
			
			Thread.sleep(500);
			Runtime.getRuntime().exec("explorer.exe");

		} catch (InterruptedException | IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		

		this.getMaquina().getAcesso().getUsuario().setLogin(login);
		this.getMaquina().getAcesso().setTempoDisponibilizado(segundos);
		maquina.getAcesso().setTempoUsado(0);
		//this.getMaquina().getAcesso().contar();
		
		
		//qualquer coisa
		
		
		mostraBarra();
		
		continuaESC = false;
		bloqueado = false;
		
		Thread sessao = new Thread(new Runnable() {

			@Override
			public void run() {

				frameDesbloqueado.getLblUsuario().setText(login);
				frameBloqueado.setVisible(false);
				frameDesbloqueado.setVisible(true);
				frameDesbloqueado.getBtnFinalizar().addActionListener(
						new ActionListener() {

							@Override
							public void actionPerformed(ActionEvent e) {

								bloqueia();
							}
						});


				while(maquina.getAcesso().getTempoUsado() <= maquina.getAcesso().getTempoDisponibilizado() && (!bloqueado)) {
					try {
						Thread.sleep(1000);

						int tempo = (maquina.getAcesso().getTempoDisponibilizado() - maquina.getAcesso().getTempoUsado());
						if(tempo == 300 || tempo == 120 || tempo == 20){
							mostraBarra();
							frameAviso.setVisible(true);
						}
							
						
						int hora = 0;
						int minuto = 0;
						while (tempo >= 60) {
							tempo -= 60;
							minuto++;
						}
						while (minuto >= 60) {
							minuto -= 60;
							hora++;
						}

						frameDesbloqueado.getLblTempo().setText(
								String.format("%02d", hora) + ":"
										+ String.format("%02d", minuto) + ":"
										+ String.format("%02d", tempo));
						
						
						maquina.getAcesso().setTempoUsado(maquina.getAcesso().getTempoUsado()+1);
						
					} catch (InterruptedException e) {

						e.printStackTrace();
					}
				}

				bloqueia();

			}
		});
		sessao.start();

	}
	

	public void bloqueia() {
		frameBloqueado.getTextFieldUsuario().setText("");
		frameBloqueado.getPasswordFieldSenha().setText("");

		String caminho = "\\\\" + this.servidorDeArquivos + "\\arquivos";
		Desktop d = new Desktop(caminho, "jefponte");
		d.desfazer();
		try {
			if (this.saida != null)
				this.saida.writeObject("setStatus(" + maquina.STATUS_DISPONIVEL
						+ ")");
		} catch (IOException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
		}

		this.bloqueado = true;
		this.iniciaEscInfinito();
		bloqueiaServicos();
		try {
			Runtime.getRuntime().exec(" taskkill /f /im explorer.exe");

			Thread.sleep(1000);
			// System.out.println("Abrindo Explorer. ");
			Runtime.getRuntime().exec("explorer.exe");
		} catch (IOException | InterruptedException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
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

	/**
	 * 
	 * Mensagem enviada pelo servidor.
	 * 
	 * @param mensagem
	 */
	public void processaMensagem(String mensagem) {
		String	comando = mensagem.substring(0, mensagem.indexOf('('));
		final String parametros = mensagem.substring(mensagem.indexOf('(') + 1, mensagem.indexOf(')'));
		if (comando.equals("bloqueia")) {
			bloqueia();
		} else if (comando.equals("desbloqueia")) {
			String login = parametros.substring(0, parametros.indexOf(','));
			String tempo = parametros.substring(parametros.indexOf(',') + 2);
			int time = Integer.parseInt(tempo);
			desbloqueia(time, login);
			
			
		}else if(comando.equals("bonus")){
			
			
			
			
		}
		else if (comando.equals("desligar")) {
			
			Process process;
			Scanner leitor;
			frameDesbloqueado.setVisible(false);
			frameBloqueado.setVisible(false);
			try {
				process = Runtime.getRuntime().exec(" shutdown /s");
				leitor = new Scanner(process.getInputStream());
				while (leitor.hasNext()) {
					String linha = leitor.nextLine();
				}
				
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			
			
		}else if (comando.equals("printc")) {

			Thread t = new Thread(new Runnable() {

				@Override
				public void run() {
					frameBloqueado.getLabelMensagem().setText("" + parametros);
					try {
						Thread.sleep(10000);
					} catch (InterruptedException e) {
						// TODO Auto-generated catch block
						e.printStackTrace();
					}
					frameBloqueado.getLabelMensagem().setText("");

				}
			});
			t.start();

		} else if (comando.equals("atualizar")) {
			frameBloqueado.setVisible(false);
			frameDesbloqueado.setVisible(false);
			Process process;
			Scanner leitor;
			try {
				process = Runtime
						.getRuntime().exec(" java -jar \"C:\\Program Files (x86)\\UniCafe\\update.exe\"");
				leitor = new Scanner(process.getInputStream());
				while (leitor.hasNext()) {
					String linha = leitor.nextLine();
				}
				
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			
			desBloqueandoServicos();

			
			Thread t = new Thread(new Runnable() {

				@Override
				public void run() {

					try {
						JFrame frameLocal = frameBloqueado;
						frameLocal.setVisible(false);
						// System.out.println("Fechando Explorer. ");
						Runtime.getRuntime().exec(
								" taskkill /f /im explorer.exe");
						
						Thread.sleep(1000);
						// System.out.println("Abrindo Explorer. ");
						Runtime.getRuntime().exec("explorer.exe");
						System.exit(0);

					} catch (InterruptedException | IOException e) {
						// TODO Auto-generated catch block
						e.printStackTrace();
					}

				}
			});
			t.start();
			return;
			
		} else {

		}

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
							processaMensagem((String) entrada.readObject());
						} catch (ClassNotFoundException e) {
							 frameBloqueado.setVisible(true);
	                            frameBloqueado.getLabelStatus().setForeground(
	                                    Color.red);
	                            frameBloqueado.getLabelStatus().setText(
	                                    "Erro no servidor.");
	                            conexaoComServidor();
	                            break;
						}catch (SocketException se) {
						    conexaoComServidor();
                            break;
						}
					}
				} catch (IOException e) {
					frameBloqueado.setVisible(true);
                    frameBloqueado.getLabelStatus().setForeground(
                            Color.red);
                    frameBloqueado.getLabelStatus().setText(
                            "Fim de conexão");
                    conexaoComServidor();
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
			
			if (frameBloqueado.getTextFieldUsuario().getText()
					.equals("senhasecreta")
					&& frameBloqueado.getPasswordFieldSenha().getText()
							.equals("123456")) {

				desBloqueandoServicos();

				Thread t = new Thread(new Runnable() {

					@Override
					public void run() {

						try {
							JFrame frameLocal = frame;
							frameLocal.setVisible(false);
							// System.out.println("Fechando Explorer. ");
							Runtime.getRuntime().exec(
									" taskkill /f /im explorer.exe");
							Thread.sleep(1000);
							// System.out.println("Abrindo Explorer. ");
							Runtime.getRuntime().exec("explorer.exe");
							System.exit(0);

						} catch (InterruptedException | IOException e) {
							// TODO Auto-generated catch block
							e.printStackTrace();
						}

					}
				});
				t.start();
				return;

			}
			if (frameBloqueado.getTextFieldUsuario().getText()
					.equals("visitante")
					&& frameBloqueado.getPasswordFieldSenha().getText()
							.equals("123456")) {
				desbloqueia(3600, "visitante");
				return;
			}
			if (frameBloqueado.getTextFieldUsuario().getText()
					.equals("aula")
					&& frameBloqueado.getPasswordFieldSenha().getText()
							.equals("123456")) {
				desbloqueia(8400, "visitante");
				return;
			}
			@SuppressWarnings("deprecation")
			String senha = UsuarioDAO.getMD5(frame.getPasswordFieldSenha()
					.getText());

			try {
				saida.writeObject("autentica("
						+ frame.getTextFieldUsuario().getText() + "," + senha
						+ ")");

			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
				frame.getTextFieldUsuario().setText("");
				frame.getPasswordFieldSenha().setText("");

			}

			frame.getTextFieldUsuario().setText("");
			frame.getPasswordFieldSenha().setText("");

		}

	}

	public void setFrameClienteBloqueado(FrameClientBloqueado bloqueado2) {
		this.frameBloqueado = bloqueado2;
		
	}
}
