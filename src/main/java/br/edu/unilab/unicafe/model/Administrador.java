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
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.net.Socket;

import javax.swing.JFrame;
import javax.swing.SwingUtilities;
import javax.swing.plaf.SliderUI;

import br.edu.unilab.unicafe.dao.UsuarioDAO;
import br.edu.unilab.unicafe.desktop.Desktop;
import br.edu.unilab.unicafe.model.Cliente.TentativaDeLogin;
import br.edu.unilab.unicafe.view.FrameAdmin;
import br.edu.unilab.unicafe.view.FrameClientBloqueado;

public class Administrador extends Cliente {

	private FrameAdmin frameAdmin;

	public void iniciaAdministrador() {
		this.frameAdmin = new FrameAdmin();
		this.frameAdmin.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		this.frameAdmin.setVisible(false);
		this.frameBloqueado = new FrameClientBloqueado();
		this.frameBloqueado.setUndecorated(false);
		this.frameBloqueado.setResizable(true);
		this.frameBloqueado.setAlwaysOnTop(false);
		this.frameBloqueado.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		this.frameBloqueado.setVisible(true);
		this.atualizaIP();
		this.maquina.preencheComMaquinaLocal();
		this.conexaoComServidor();
		this.adicionaEventos();
	}

	@Override
	public void adicionaEventos() {

		frameBloqueado.getBtnEntrar().addActionListener(
				new TentativaDeLogin(frameBloqueado));
		frameBloqueado.getPasswordFieldSenha().addKeyListener(new KeyAdapter() {

			public void keyPressed(java.awt.event.KeyEvent e) {
				if (e.getKeyCode() == java.awt.event.KeyEvent.VK_ENTER) {

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

	@Override
	public void processaConexao(final Socket conexao) {

		Thread processando = new Thread(new Runnable() {

			@Override
			public void run() {

				try {
					maquina.setStatus(Maquina.STATUS_ADMIN);
					setSaida(new ObjectOutputStream(conexao.getOutputStream()));
					getSaida()
							.writeObject("setNome(" + maquina.getNome() + ")");
					getSaida().writeObject(
							"setStatus(" + maquina.getStatus() + ")");
					getSaida().writeObject(
							"setMac(" + maquina.getEnderecoMac() + ")");
					setEntrada(new ObjectInputStream(conexao.getInputStream()));
					while (true) {
						try {
							processaMensagem((String) getEntrada().readObject());
						} catch (ClassNotFoundException e) {
							System.out.println("Algo Estranho veio do servidor. Não é uma string.");
						} catch (IOException e) {
							frameBloqueado.setVisible(true);
							frameBloqueado.getLabelStatus().setForeground(
									Color.red);
							frameBloqueado.getLabelStatus().setText(
									"Erro no servidor.");
							conexaoComServidor();

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

	@Override
	public void bloqueia() {
		frameBloqueado.getTextFieldUsuario().setText("");
		frameBloqueado.getPasswordFieldSenha().setText("");
		frameAdmin.setVisible(false);
		frameBloqueado.setVisible(true);

	}
	
	public void printTextArea(final String mensagem){
		

		SwingUtilities.invokeLater(new Runnable() {

			@Override
			public void run() {
				frameAdmin.getTextArea().append("\n" + mensagem);

			}
		});

	}

	@Override
	public void processaMensagem(String mensagem) {
		printTextArea(mensagem);
		String comando = mensagem.substring(0,
				mensagem.indexOf('('));
		String parametros = mensagem.substring(
				mensagem.indexOf('(') + 1,
				mensagem.indexOf(')'));

		if (comando.equals("bloqueia")) {
			bloqueia();
		} else if (comando.equals("escutaJason")) {

			// Serve pra escutar o Jason Com informações
			// atualizadas do servidor.
			String login = parametros.substring(0,
					parametros.indexOf(','));
			String tempo = parametros.substring(parametros
					.indexOf(',') + 2);
			int time = Integer.parseInt(tempo);
			desbloqueia(time, login);
		} else if (comando.equals("desbloqueia")) {

			String login = parametros.substring(0,
					parametros.indexOf(','));
			String tempo = parametros.substring(parametros
					.indexOf(',') + 2);
			int time = Integer.parseInt(tempo);
			desbloqueia(time, login);
		} else {
			// Mensagem não encontrada
		}
	}
	@Override
	public void desbloqueia(final int segundos, final String login) {
		frameAdmin.getTextArea().addKeyListener(new KeyAdapter() {

			public void keyPressed(java.awt.event.KeyEvent e) {
				if (e.getKeyCode() == java.awt.event.KeyEvent.VK_ENTER) {
					// No caso de digitar Enter, iremos mandar o que estiver
					// após o cifrão.
					String comando = frameAdmin
							.getTextArea()
							.getText()
							.substring(
									frameAdmin.getTextArea().getText()
											.lastIndexOf('$') + 1);
					String textoCompleto = frameAdmin.getTextArea().getText();
					// textoCompleto = textoCompleto.substring(0,
					// textoCompleto.lastIndexOf('\n'));

					try {
						getSaida().writeObject(comando);
					} catch (IOException e1) {
						// TODO Auto-generated catch block
						e1.printStackTrace();
					}



							frameAdmin.getTextArea().setText(frameAdmin.getTextArea().getText() + " ");
							frameAdmin.getTextArea().setText("\n " + login + " $");
							

				

				} else if (e.getKeyCode() == java.awt.event.KeyEvent.VK_BACK_SPACE) {
					
					if(frameAdmin.getTextArea().getText().length() == (frameAdmin.getTextArea().getText().lastIndexOf('$')+1))
						frameAdmin.getTextArea().setText(frameAdmin.getTextArea().getText() + " ");
				}

			};
		});
		bloqueado = false;
		Thread sessao = new Thread(new Runnable() {

			@Override
			public void run() {

				// frameDesbloqueado.getLblUsuario().setText(login);
				frameBloqueado.setVisible(false);
				frameAdmin.setVisible(true);
				frameAdmin.getTextArea().setText(
						"Administrador Iniciado! Bem Vindo, " + login + "\n"
								+ " " + login + "$ ");

			}
		});
		sessao.start();

	}
}
