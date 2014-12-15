package br.edu.unilab.unicafe.model;

import java.awt.Color;
import java.awt.event.ActionEvent;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.math.BigInteger;
import java.net.Socket;
import java.net.UnknownHostException;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;

import javax.swing.AbstractAction;

import br.edu.unilab.unicafe.view.FrameClientBloqueado;
import br.edu.unilab.unicafe.view.FrameClientDesbloqueio;

/**
 * 
 * @author Jefferson
 *
 */

public class Cliente {

	private Maquina maquina;
	private Socket conexao;
	private Servidor servidor;
	private ObjectOutputStream saida;
	private ObjectInputStream entrada;
	private FrameClientBloqueado frameBloqueado;
	private FrameClientDesbloqueio frameDesbloqueado;

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

	public void iniciaCilente() {
		this.maquina.preencheComMaquinaLocal();
		this.frameDesbloqueado = new FrameClientDesbloqueio();
		this.frameBloqueado = new FrameClientBloqueado();
		this.frameBloqueado.getTextLogin().setEditable(false);
		this.frameBloqueado.getJPasswordSenha().setEditable(false);
		this.frameBloqueado.getLabelMensagem().setText("");

		this.frameBloqueado.setVisible(true);

		this.servidor.setIp("localhost");

		Thread tentandoConexao = new Thread(new Runnable() {

			@Override
			public void run() {
				int i = 0;
				while (true) {
					i++;
					frameBloqueado.getLabelStatus().setText("Tentativa " + i);

					System.out.println("Tentarei infinitamente uma conexão, esperando 30 segundos a cada tentativa.. ");

					try {
						conexao = new Socket(servidor.getIp(), 12345);
						processaConexao(conexao);

						frameBloqueado.getLabelStatus().setText("Conexão Feita!");
						
						// processa conexao
						frameBloqueado.getTextLogin().setEditable(true);
						frameBloqueado.getJPasswordSenha().setEditable(true);
						frameBloqueado.getLabelStatus().setForeground(
								Color.GREEN);
						frameBloqueado.getBtnLogar().addActionListener(
								new TentativaDeLogin(frameBloqueado));
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
							String mensagem = (String) getEntrada().readObject();
							System.out.println("Servidor >> " + mensagem);
							String comando = mensagem.substring(0, mensagem.indexOf('('));
							String parametros = mensagem.substring(mensagem.indexOf('(') + 1, mensagem.indexOf(')'));
							
							
							if(comando.equals("bloqueia")){
								Thread bloqueando = new Thread(new Runnable() {

									@Override
									public void run() {
										frameDesbloqueado.setVisible(false);
										frameBloqueado.setVisible(true);

									}
								});
								bloqueando.start();
							}
							else if(comando.equals("desbloqueia")){
								final String pa = parametros;
								Thread sessao = new Thread(new Runnable() {

									@Override
									public void run() {
										String login = pa.substring(0, pa.indexOf(','));
										frameDesbloqueado.getFieldUsuario().setText(login);
										String tempo = pa.substring(pa.indexOf(',') + 1);
										System.out.println("Tempo: " + tempo);
										for (int i = 30; i >= 0; i--) {
											try {
												Thread.sleep(1000);

												frameDesbloqueado
														.getFieldTempo()
														.setText("00:" + i);
											} catch (InterruptedException e) {
												// TODO Auto-generated catch
												// block
												e.printStackTrace();
											}
										}
										frameDesbloqueado.setVisible(false);
										frameBloqueado.setVisible(true);

									}
								});
								frameBloqueado.setVisible(false);
								frameDesbloqueado.setVisible(true);
								sessao.start();
								
								
							}
							else if(comando.equals("printc")){
								
								frameBloqueado.getLabelMensagem().setText(
										"" + parametros);
							}
							else{}
							
						} catch (ClassNotFoundException e) {
							frameBloqueado.setVisible(true);
							frameBloqueado.getLabelStatus().setForeground(Color.red);
							frameBloqueado.getLabelStatus().setText("Erro no servidor.");
							e.printStackTrace();
							break;
						} catch (IOException e) {
							frameBloqueado.setVisible(true);
							frameBloqueado.getLabelStatus().setForeground(Color.red);
							frameBloqueado.getLabelStatus().setText("Erro no servidor.");
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
		FrameClientBloqueado frame;

		public TentativaDeLogin(FrameClientBloqueado frame) {
			this.frame = frame;
		}

		@Override
		public void actionPerformed(ActionEvent arg0) {
			// ObjectOutputStream saida;
			String senha = "";
			try {

				MessageDigest m;
				try {
					m = MessageDigest.getInstance("MD5");
					m.update(
							String.copyValueOf(frame.getJPasswordSenha().getPassword()).getBytes(), 0,
							String.copyValueOf(frame.getJPasswordSenha().getPassword()).length());
					senha = new BigInteger(1, m.digest()).toString(16);
					saida.writeObject("autentica("+ frame.getTextLogin().getText() + "," + senha+ ")");

				} catch (NoSuchAlgorithmException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
				if (frame.getTextLogin().getText().equals("sair"))
					System.exit(0);

			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			frame.getTextLogin().setText("");
			frame.getJPasswordSenha().setText("");

		}

	}
}
