package br.edu.unilab.unicafe.control;


import java.awt.AWTException;
import java.awt.EventQueue;
import java.awt.Robot;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.KeyAdapter;
import java.awt.event.KeyEvent;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintStream;
import java.net.Socket;
import java.net.UnknownHostException;

import br.edu.unilab.unicafe.bloqueio.model.PerfilBloqueio;
import br.edu.unilab.unicafe.dao.UsuarioDAO;
import br.edu.unilab.unicafe.desktop.Desktop;
import br.edu.unilab.unicafe.model.Cliente;
import br.edu.unilab.unicafe.model.Maquina;
import br.edu.unilab.unicafe.registro.model.Perfil;
import br.edu.unilab.unicafe.view.FrameAviso;
import br.edu.unilab.unicafe.view.FrameSplash;
import br.edu.unilab.unicafe.view.FrameTelaAcesso;
import br.edu.unilab.unicafe.view.FrameTelaBloqueio;

/**
 * Control
 * 
 * @author jefponte
 *
 */
public class ClienteControl {

	/**
	 * View
	 * 
	 */
	private FrameTelaAcesso frameTelaAcesso;
	private FrameSplash frameSplash;
	private FrameTelaBloqueio frameTelaBloqueio;
	private FrameAviso frameAviso;	
	private Thread escInfinito;
	private boolean bloqueado;
	private boolean bloqueandoAplicacoes;
	/**
	 * Model
	 */
	private Cliente cliente;

	public ClienteControl() {
		this.cliente = new Cliente();
		this.getCliente().getMaquina().preencheComMaquinaLocal();
		this.setFrameTelaAcesso(new FrameTelaAcesso());
		this.setFrameSplash(new FrameSplash());
		this.setFrameAviso(new FrameAviso());
		this.setFrameTelaBloqueio(new FrameTelaBloqueio());
	}

	public void iniciaCliente() {
		iniciaSplash();
		tentaConexoes();
		
		

	}
	public void iniciaSplash(){
		Thread iniciandoSplash = new Thread(new Runnable() {
			
			@Override
			public void run() {

				
				getFrameTelaBloqueio().setVisible(false);
				getFrameTelaBloqueio().setStatusConexao(false);
				getFrameSplash().setVisible(true);
				getFrameAviso().setVisible(false);
				getFrameTelaAcesso().getBtnFinalizar().addActionListener(
						new ActionListener() {
							@Override
							public void actionPerformed(ActionEvent e) {

								bloqueia();
							}
						});
				
				getFrameTelaBloqueio().getBtnEntrar().addActionListener(new ActionListener() {
					public void actionPerformed(ActionEvent e) {
						//Saida de emergência
						if (getFrameTelaBloqueio().getTextFieldLogin().getText()
								.equals("emergencia")
								&& getFrameTelaBloqueio().getPasswordFieldSenha().getText()
										.equals("emergencia@123A")) {

							desBloqueandoServicos();

							Thread t = new Thread(new Runnable() {

								@Override
								public void run() {

									try {
										getFrameTelaBloqueio().setVisible(false);
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
						if (getFrameTelaBloqueio().getTextFieldLogin().getText()
								.equals("visitante")
								&& getFrameTelaBloqueio().getPasswordFieldSenha().getText()
										.equals("123456")) {
							desbloqueia(120, "visitante");
							return;
						}
						if (getFrameTelaBloqueio().getTextFieldLogin().getText()
								.equals("aula")
								&& getFrameTelaBloqueio().getPasswordFieldSenha().getText()
										.equals("aula@123A")) {
							desbloqueia(18000, "aula");
							return;
						}
						
						String senha = UsuarioDAO.getMD5(getFrameTelaBloqueio().getPasswordFieldSenha()
								.getText());

						new PrintStream(cliente.getSaida()).println("autentica("
								+ getFrameTelaBloqueio().getTextFieldLogin().getText() + "," + senha
								+ ")");

						getFrameTelaBloqueio().resetCampos();

					}
				});
				
				try {
					Thread.sleep(3000);
				} catch (InterruptedException e) {
					e.printStackTrace();
				}
				getFrameSplash().setVisible(false);
				bloqueia();
				
		
			}
		});
		iniciandoSplash.start();
	}
	
	public void bloqueia(){
		getCliente().getMaquina().getAcesso().getUsuario().setLogin("livre");
		String caminho = "\\\\DTI43\\arquivos";
		Desktop d = new Desktop(caminho, "jefponte");
		d.desfazer();
		if(getCliente().getSaida() != null){
			new PrintStream(getCliente().getSaida()).println("setStatus("+Maquina.STATUS_DISPONIVEL+")");
		}
		EventQueue.invokeLater(new Runnable() {

			@Override
			public void run() {
				getFrameTelaBloqueio().setVisible(true);
				getFrameTelaBloqueio().resetCampos();

			}
		});
		
		iniciaEscInfinito();
		bloqueiaServicos();
		bloqueandoAplicacoes();
		restartNoExplorer();
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
	public void tentaConexoes(){
		Thread tentandoConexoes = new Thread(new Runnable() {
			
			@Override
			public void run() {
			
				
				for(int i = 0; true; i++)
				{
				
					try {
						try {
							Socket socket = new Socket("200.129.19.40", 27289);
							getCliente().setConexao(socket);
							getCliente().setEntrada(socket.getInputStream());
							getCliente().setSaida(socket.getOutputStream());
							//Consegui conectar. 
							
							getFrameTelaBloqueio().setStatusConexao(true);
							processaCliente();
							//Vou enviar umas mensagens ao servidor. 
							
							//Agora vou esperar mensagens do servidor. 
							//Ao mesmo tempo iremos adicionar os eventos necessários pra um cliente conectado.
							
							break;
						} catch (UnknownHostException e) {
							System.out.println("Não encontrei o servidor, vou tentar de novo em 5 segundos. ");
							getFrameTelaBloqueio().getLabelStatus().setText("Servidor não encontrado. Tentativa: "+i);
							
						} catch (IOException e) {
							System.out.println("Erro de IO Exception. Deve ter desligado o Servidor.");
							getFrameTelaBloqueio().getLabelStatus().setText("Erro no Servidor. Tentativa: "+i);
						}
						Thread.sleep(5000);
					} catch (InterruptedException e) {
						System.out.println("Não consegui esperar 5 segundos. Esse erro não dá muito problema. ");
						getFrameTelaBloqueio().getLabelStatus().setText("Thread Não dormiu. Tentativa: "+i);
					}
				}
			}
		});
		tentandoConexoes.start();
	}

	
	public void processaCliente() {

		
		Thread processando = new Thread(new Runnable() {

			@Override
			public void run() {
		
					getCliente().getMaquina().setStatus(Maquina.STATUS_DISPONIVEL);
					PrintStream printStream = new PrintStream(getCliente().getSaida());
					BufferedReader buffereReader = new BufferedReader(new InputStreamReader(getCliente().getEntrada()));
					
					
					printStream.println("setStatus(" + getCliente().getMaquina().getStatus() + ")");
					printStream.println("setNome(" + getCliente().getMaquina().getNome() + ")");
					printStream.println("setMac(" + getCliente().getMaquina().getEnderecoMac()+ ")");
					
					while (true) {
						
						String mensagem;
						try {
							mensagem = buffereReader.readLine();
							System.out.println(mensagem);
							processaMensagem(mensagem);
						} catch (IOException e) {
							e.printStackTrace();
							tentaConexoes();
							getFrameTelaBloqueio().setStatusConexao(false);
							break;
							
							
						}
					}
				} 
		});
		processando.start();
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
			System.out.println("To ganhando bonus");
			int bonus = 600;
			getCliente().getMaquina().getAcesso().setTempoDisponibilizado(getCliente().getMaquina().getAcesso().getTempoDisponibilizado()+bonus);
			//controle.mostraBarra();
						
		}
		else if (comando.equals("desligar")) {
			
			bloqueia();
			try {
				Runtime.getRuntime().exec(" shutdown /s");
				getFrameTelaBloqueio().setVisible(true);
				System.exit(0);
				
			} catch (IOException e) {
				e.printStackTrace();
			}
			
			
		}else if (comando.equals("printc")) {

			Thread t = new Thread(new Runnable() {

				@Override
				public void run() {
					getFrameTelaBloqueio().getLabelMensagem().setText("" + parametros);
					try {
						Thread.sleep(10000);
					} catch (InterruptedException e) {
						// TODO Auto-generated catch block
						e.printStackTrace();
					}
					getFrameTelaBloqueio().getLabelMensagem().setText("");

				}
			});
			t.start();

		} else if (comando.equals("atualizar")) {
			getFrameTelaBloqueio().setVisible(false);
			getFrameTelaAcesso().setVisible(false);
			try {
				Runtime.getRuntime().exec(" java -jar \"C:\\Program Files (x86)\\UniCafe\\update.exe\"");
				
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}			
			desBloqueandoServicos();			
		} else {

		}

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
					Runtime.getRuntime().exec("explorer.exe");
				} catch (IOException | InterruptedException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}

				
			}
		});
		restartando.start();
				
	}
	public void desbloqueia(final int segundos, final String login) {
		
		EventQueue.invokeLater(new Runnable() {
			@Override
			public void run() {
				
				getFrameTelaAcesso().getLabelLogin().setText(login);
				getFrameTelaAcesso().getLabelTempo().setText("calculando");;
				getFrameAviso().setVisible(false);
				getFrameTelaBloqueio().setVisible(false);
				setBloqueado(false);
				getFrameTelaAcesso().setVisible(true);
				
			}
		});
		restartNoExplorer();

		if(getCliente().getSaida() != null)
			new PrintStream(getCliente().getSaida()).println("setStatus("+Maquina.STATUS_OCUPADA+")");
		String caminho = "C:\\arquivosunicafe";
		Desktop d = new Desktop(caminho, login);
		d.alterarRegistro();
		getCliente().getMaquina().getAcesso().getUsuario().setLogin(login);
		getCliente().getMaquina().getAcesso().setTempoDisponibilizado(segundos);
		getCliente().getMaquina().getAcesso().setTempoUsado(0);
		setBloqueado(false);
		Thread sessao = new Thread(new Runnable() {
			@Override
			public void run() {
				getFrameTelaAcesso().getBtnFinalizar().addActionListener(
						new ActionListener() {
							@Override
							public void actionPerformed(ActionEvent e) {

								bloqueia();
							}
						});
				while(getCliente().getMaquina().getAcesso().getTempoUsado() <= getCliente().getMaquina().getAcesso().getTempoDisponibilizado() && (!isBloqueado())) {
					try {
						Thread.sleep(1000);
						int tempo = (getCliente().getMaquina().getAcesso().getTempoDisponibilizado() - getCliente().getMaquina().getAcesso().getTempoUsado());
						
						if(tempo == 300 || tempo == 120 || tempo == 20){
							//getControle().mostraBarra();
							getFrameAviso().setVisible(true);
							if(getCliente().getSaida() != null){
								new PrintStream(getCliente().getSaida()).println("meDaBonus()");								
							}
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
						getFrameTelaAcesso().getLabelTempo().setText(
								String.format("%02d", hora) + ":"
										+ String.format("%02d", minuto) + ":"
										+ String.format("%02d", tempo));
						getCliente().getMaquina().getAcesso().setTempoUsado(getCliente().getMaquina().getAcesso().getTempoUsado()+1);
						
					} catch (InterruptedException e) {

						e.printStackTrace();
					}
				}
				getFrameAviso().setVisible(false);
				bloqueia();

			}
		});
		sessao.start();	
		
		
	}
	
	
	public FrameTelaAcesso getFrameTelaAcesso() {
		return frameTelaAcesso;
	}

	public void setFrameTelaAcesso(FrameTelaAcesso frameTelaAcesso) {
		this.frameTelaAcesso = frameTelaAcesso;
	}

	public FrameSplash getFrameSplash() {
		return frameSplash;
	}

	public void setFrameSplash(FrameSplash frameSplash) {
		this.frameSplash = frameSplash;
	}

	public FrameAviso getFrameAviso() {
		return frameAviso;
	}

	public void setFrameAviso(FrameAviso frameAviso) {
		this.frameAviso = frameAviso;
	}

	public Cliente getCliente() {
		return cliente;
	}

	public void setCliente(Cliente cliente) {
		this.cliente = cliente;
	}

	public FrameTelaBloqueio getFrameTelaBloqueio() {
		return frameTelaBloqueio;
	}

	public void setFrameTelaBloqueio(FrameTelaBloqueio frameTelaBloqueio) {
		this.frameTelaBloqueio = frameTelaBloqueio;
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

	public boolean isBloqueandoAplicacoes() {
		return bloqueandoAplicacoes;
	}

	public void setBloqueandoAplicacoes(boolean bloqueandoAplicacoes) {
		this.bloqueandoAplicacoes = bloqueandoAplicacoes;
	}

	
	
	
	
}
