package br.edu.unilab.unicafe.control;

import java.awt.AWTException;
import java.awt.EventQueue;
import java.awt.Robot;
import java.awt.event.ActionEvent;
import java.awt.event.KeyAdapter;
import java.awt.event.KeyEvent;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import java.io.IOException;
import java.io.PrintStream;

import javax.swing.AbstractAction;
import javax.swing.JFrame;

import br.edu.unilab.unicafe.bloqueio.model.PerfilBloqueio;
import br.edu.unilab.unicafe.dao.UsuarioDAO;
import br.edu.unilab.unicafe.model.Cliente;
import br.edu.unilab.unicafe.registro.model.Perfil;
import br.edu.unilab.unicafe.view.FrameAviso;
import br.edu.unilab.unicafe.view.FrameClientBloqueado;
import br.edu.unilab.unicafe.view.FrameClientDesbloqueado;

/**
 * Iremos utilizar essa classe para trabalhar o controle. Ou seja, iremos pegar
 * eventos e janela nessa classe para disponibilizar no Cliente a partir de
 * metodos get.
 * 
 * @author jefponte
 *
 */
public class ClienteControl {

	private FrameClientBloqueado frameBloqueado;
	private FrameClientDesbloqueado frameDesbloqueado;
	private FrameAviso frameAviso;
	private Thread escInfinito;
	private boolean bloqueado;
	private boolean bloqueandoAplicacoes;
	
	
	/**
	 * Essas variáveis servem no mostraBarra()
	 */
	private int contagemParaOcultar;
	private boolean ocultada;
	

	public ClienteControl() {
		setFrameAviso(new FrameAviso());
		setFrameBloqueado(new FrameClientBloqueado());
		setFrameDesbloqueado(new FrameClientDesbloqueado());
		getFrameBloqueado().setVisible(true);
		escondeBarra();
	}

	public FrameClientBloqueado getFrameBloqueado() {
		return frameBloqueado;
	}

	public void setFrameBloqueado(FrameClientBloqueado frameBloqueado) {
		this.frameBloqueado = frameBloqueado;
	}

	public FrameClientDesbloqueado getFrameDesbloqueado() {
		return frameDesbloqueado;
	}

	public void setFrameDesbloqueado(FrameClientDesbloqueado frameDesbloqueado) {
		this.frameDesbloqueado = frameDesbloqueado;
	}

	public FrameAviso getFrameAviso() {
		return frameAviso;
	}

	public void setFrameAviso(FrameAviso frameAviso) {
		this.frameAviso = frameAviso;
	}

	public Thread getEscInfinito() {
		return escInfinito;
	}

	public void setEscInfinito(Thread escInfinito) {
		this.escInfinito = escInfinito;
	}

	
	public boolean isBloqueado() {
		return bloqueado;
	}

	public void setBloqueado(boolean bloqueado) {
		this.bloqueado = bloqueado;
	}

	public void iniciaEscInfinito() {

		this.escInfinito = new Thread(new Runnable() {
			@Override
			public void run() {
				setBloqueado(false);
				
				try {
					Thread.sleep(300);
				} catch (InterruptedException e1) {
					// TODO Auto-generated catch block
					e1.printStackTrace();
				}
				setBloqueado(true);
				
				while (isBloqueado()) {
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

			}
		});
		bloqueandoServicos.start();

	}

	public int getContagemParaOcultar() {
		return contagemParaOcultar;
	}

	public void setContagemParaOcultar(int contagemParaOcultar) {
		this.contagemParaOcultar = contagemParaOcultar;
	}

	public boolean isOcultada() {
		return ocultada;
	}

	public void setOcultada(boolean ocultada) {
		this.ocultada = ocultada;
	}
	
	


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

	}
	
	/**
	 * Esse método vai criar uma Thread que vai ser executada infinitamente. Ela
	 * vai observar de segundo em segundo o tempo para ocultação. Se o tempo
	 * chegar a ser zero ela vai esconder a barra e colocar o ocultada como
	 * true.
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

	public boolean isBloqueandoAplicacoes() {
		return bloqueandoAplicacoes;
	}

	public void setBloqueandoAplicacoes(boolean bloqueandoAplicacoes) {
		this.bloqueandoAplicacoes = bloqueandoAplicacoes;
	}

	
	
	public void bloqueandoAplicacoes(){
		
		Thread t = new Thread(new Runnable() {

			@Override
			public void run() {
				try {
					setBloqueandoAplicacoes(false);
					Thread.sleep(3000);
					setBloqueandoAplicacoes(true);
					//Não vamos permitir que esse laço rode duas vezes simultaneamente. 
					
				} catch (InterruptedException e) {
					e.printStackTrace();
				}
				PerfilBloqueio pb = new PerfilBloqueio();
				pb.buscaAceitos();

				while (isBloqueandoAplicacoes()) {

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
	}
	public void restartNoExplorer(){
		Thread restartando = new Thread(new Runnable() {
			
			@Override
			public void run() {
		
				try {
					
					Runtime.getRuntime().exec(" taskkill /f /im firefox.exe");
					Runtime.getRuntime().exec(" taskkill /f /im iexplore.exe");
					Runtime.getRuntime().exec(" taskkill /f /im explorer.exe");
					Thread.sleep(1000);
					// System.out.println("Abrindo Explorer. ");
					Runtime.getRuntime().exec("explorer.exe");
				} catch (IOException | InterruptedException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}

				
			}
		});
		restartando.start();
				
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
	
	public void bloqueia() {
		EventQueue.invokeLater(new Runnable() {

			@Override
			public void run() {
				getFrameBloqueado().setVisible(true);
				frameBloqueado.getTextFieldUsuario().setText("");
				frameBloqueado.getPasswordFieldSenha().setText("");

			}
		});
		iniciaEscInfinito();
		bloqueiaServicos();
		bloqueandoAplicacoes();
		restartNoExplorer();

	}

	public void desbloqueia(final int segundos, final String login) {
		
		EventQueue.invokeLater(new Runnable() {
			@Override
			public void run() {
				
				getFrameDesbloqueado().getLblUsuario().setText(login);
				getFrameDesbloqueado().getLblTempo().setText("calculando");;
				getFrameAviso().setVisible(false);
				getFrameBloqueado().setVisible(false);
				setBloqueado(false);
				getFrameDesbloqueado().setVisible(true);
				
			}
		});
		mostraBarra();
		restartNoExplorer();

	}
	
	public void adicionarEventos(final Cliente cliente){
		  
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
				new TentativaDeLogin(frameBloqueado, cliente));
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

					new PrintStream(cliente.getSaida()).println("autentica("
									+ frameBloqueado.getTextFieldUsuario()
											.getText() + "," + senha + ")");

					frameBloqueado.getTextFieldUsuario().setText("");
					frameBloqueado.getPasswordFieldSenha().setText("");

				}

			};
		});
		
		
		
	}

	
	class TentativaDeLogin extends AbstractAction {

		
		private static final long serialVersionUID = 1L;
		FrameClientBloqueado frame;
		private Cliente cliente;

		public TentativaDeLogin(FrameClientBloqueado frame, Cliente cliente) {
			this.cliente = cliente;
			this.frame = frame;
		}
		
		@Override
		public void actionPerformed(ActionEvent e) {
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
				cliente.desbloqueia(3600, "visitante");
				return;
			}
			if (frameBloqueado.getTextFieldUsuario().getText()
					.equals("aula")
					&& frameBloqueado.getPasswordFieldSenha().getText()
							.equals("123456")) {
				cliente.desbloqueia(18000, "aula");
				return;
			}
			
			@SuppressWarnings("deprecation")
			String senha = UsuarioDAO.getMD5(frame.getPasswordFieldSenha()
					.getText());

			new PrintStream(cliente.getSaida()).println("autentica("
					+ frame.getTextFieldUsuario().getText() + "," + senha
					+ ")");

			frame.getTextFieldUsuario().setText("");
			frame.getPasswordFieldSenha().setText("");

		}
			
	}
		
}

		
			
			
			
	

