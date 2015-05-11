package br.edu.unilab.unicafe.model;

import java.awt.Color;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.BufferedReader;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.PrintStream;
import java.net.Socket;
import java.net.SocketException;
import java.net.UnknownHostException;
import java.util.Properties;
import java.util.Scanner;

import br.edu.unilab.unicafe.control.ClienteControl;
import br.edu.unilab.unicafe.desktop.Desktop;

public class Cliente {
	private Socket conexao;
	private Maquina maquina;
	private ClienteControl controle;
	private OutputStream saida;
	private InputStream entrada;
	
	public Cliente(){
		this.maquina = new Maquina();
		
	}
	
	public Socket getConexao() {
		return conexao;
	}
	public void setConexao(Socket conexao) {
		this.conexao = conexao;
	}
	public Maquina getMaquina() {
		return maquina;
	}
	public void setMaquina(Maquina maquina) {
		this.maquina = maquina;
	}
	public ClienteControl getControle() {
		return controle;
	}
	public void setControle(ClienteControl controle) {
		this.controle = controle;
	}
	public OutputStream getSaida() {
		return saida;
	}
	public void setSaida(OutputStream saida) {
		this.saida = saida;
	}
	public InputStream getEntrada() {
		return entrada;
	}
	public void setEntrada(InputStream inputStream) {
		this.entrada = inputStream;
	}
	
	
	public void iniciaCliente(){
		
		this.controle = new ClienteControl();
		this.maquina.preencheComMaquinaLocal();
		bloqueia();
		this.controle.adicionarEventos(this);

		conexaoComServidor();
	}
	

	
	private static String ipDoServidor = "DTI43";
	
	public void conexaoComServidor() {
		/*
		 * O IP do servidor � definido pelo INI. Caso o valor no INI n�o seja
		 * existente iremos criar um INI com a vari�vel para o IP de valor
		 * padr�o igual ao nome da m�quina do JEFPONTE.
		 */

		Properties config = new Properties();
		
		try {
			FileInputStream fileInputStream = new FileInputStream("config.ini");
			config.load(fileInputStream);
			ipDoServidor = config.getProperty("host_unicafeserver");
			fileInputStream.close();
		} catch (FileNotFoundException e2) {

			try {

				FileOutputStream fileOutputStream = new FileOutputStream("config.ini");
				
				config.setProperty("host_unicafeserver", ipDoServidor);
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
		Thread tentandoConexao = new Thread(new Runnable() {

			@Override
			public void run() {
				int i = 0;
				while (true) {
					i++;
					getControle().getFrameBloqueado().getLabelStatus().setText("Tentativa " + i);

					try {
						conexao = new Socket(ipDoServidor, 12346);
						processaConexao(conexao);
						controle.getFrameBloqueado().getLabelStatus().setText("Conexão Feita!");
						controle.getFrameBloqueado().getLabelStatus().setForeground(Color.GREEN);
						break;
					} catch (UnknownHostException e1) {
						getControle().getFrameBloqueado().getLabelStatus().setText("Servidor não encontrado " + i);
					} catch (IOException e1) {
						getControle().getFrameBloqueado().getLabelStatus().setText("Erro de IO " + i);
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
	public void processaConexao(final Socket conexao) {

		Thread processando = new Thread(new Runnable() {

			@Override
			public void run() {
				try {
					maquina.setStatus(Maquina.STATUS_DISPONIVEL);
					
					setSaida(conexao.getOutputStream());
					setEntrada(conexao.getInputStream());
					
					PrintStream printStream = new PrintStream(saida);
					BufferedReader buffereReader = new BufferedReader(new InputStreamReader(entrada));
					
					
					printStream.println("setStatus(" + maquina.getStatus() + ")");
					printStream.println("setNome(" + maquina.getNome() + ")");
					printStream.println("setMac(" + maquina.getEnderecoMac()+ ")");
					
					while (true) {
						try {
							String mensagem = buffereReader.readLine();
							System.out.println(mensagem);
							processaMensagem(mensagem);
						} catch (SocketException se) {
							controle.bloqueia();
							controle.getFrameBloqueado().getLabelStatus().setText("Erro de ClassNotFoundException");
							conexaoComServidor();							
							break;
						}
					}
				} catch (IOException e) {
					controle.bloqueia();
					controle.getFrameBloqueado().getLabelStatus().setText("Erro de ClassNotFoundException");
                    conexaoComServidor();
				}
				catch(NullPointerException e2){
					controle.bloqueia();
					controle.getFrameBloqueado().getLabelStatus().setText("Erro de ClassNotFoundException");
                    conexaoComServidor();
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
			getMaquina().getAcesso().setTempoDisponibilizado(getMaquina().getAcesso().getTempoDisponibilizado()+bonus);
			controle.mostraBarra();
						
		}
		else if (comando.equals("desligar")) {
			
			Process process;
			Scanner leitor;
			controle.bloqueia();
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
					controle.getFrameBloqueado().getLabelMensagem().setText("" + parametros);
					try {
						Thread.sleep(10000);
					} catch (InterruptedException e) {
						// TODO Auto-generated catch block
						e.printStackTrace();
					}
					controle.getFrameBloqueado().getLabelMensagem().setText("");

				}
			});
			t.start();

		} else if (comando.equals("atualizar")) {
			controle.getFrameBloqueado().setVisible(false);
			controle.getFrameDesbloqueado().setVisible(false);
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
			controle.desBloqueandoServicos();			
		} else {

		}

	}
	public void bloqueia(){
		getMaquina().getAcesso().getUsuario().setLogin("livre");
		String caminho = "\\\\DTI43\\arquivos";
		Desktop d = new Desktop(caminho, "jefponte");
		d.desfazer();

		if(getSaida() != null){
			new PrintStream(getSaida()).println("setStatus("+Maquina.STATUS_DISPONIVEL+")");
		}
		
		this.controle.bloqueia();
		
	}
	public void desbloqueia(final int segundos, final String login) {
		if(getSaida() != null)
			new PrintStream(getSaida()).println("setStatus("+Maquina.STATUS_OCUPADA+")");
		
		//String caminho = "\\\\"+this.getMaquina().getNome()+"\\arquivos";
		String caminho = "C:\\arquivosunicafe";
		
		Desktop d = new Desktop(caminho, login);
		d.alterarRegistro();
		getControle().desbloqueia(segundos, login);
		getMaquina().getAcesso().getUsuario().setLogin(login);
		getMaquina().getAcesso().setTempoDisponibilizado(segundos);
		getMaquina().getAcesso().setTempoUsado(0);
		controle.setBloqueado(false);
		getControle().mostraBarra();
		Thread sessao = new Thread(new Runnable() {
			@Override
			public void run() {
				controle.getFrameDesbloqueado().getBtnFinalizar().addActionListener(
						new ActionListener() {
							@Override
							public void actionPerformed(ActionEvent e) {

								bloqueia();
							}
						});
				while(maquina.getAcesso().getTempoUsado() <= maquina.getAcesso().getTempoDisponibilizado() && (!controle.isBloqueado())) {
					try {
						Thread.sleep(1000);
						int tempo = (maquina.getAcesso().getTempoDisponibilizado() - maquina.getAcesso().getTempoUsado());
						
						if(tempo == 300 || tempo == 120 || tempo == 20){
							getControle().mostraBarra();
							getControle().getFrameAviso().setVisible(true);
							if(getSaida() != null){
								new PrintStream(getSaida()).println("meDaBonus()");
								
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
						getControle().getFrameDesbloqueado().getLblTempo().setText(
								String.format("%02d", hora) + ":"
										+ String.format("%02d", minuto) + ":"
										+ String.format("%02d", tempo));
						maquina.getAcesso().setTempoUsado(maquina.getAcesso().getTempoUsado()+1);
						
					} catch (InterruptedException e) {

						e.printStackTrace();
					}
				}
				controle.getFrameAviso().setVisible(false);
				bloqueia();

			}
		});
		sessao.start();	
	}
}
