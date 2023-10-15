package br.edu.unilab.unicaffe.controller;

import java.awt.EventQueue;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.KeyAdapter;
import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileWriter;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintStream;
import java.io.UnsupportedEncodingException;
import java.net.Socket;
import java.net.UnknownHostException;
import java.util.ArrayList;
import java.util.Collection;
import java.util.Date;
import java.util.Properties;
import java.util.concurrent.Semaphore;

import javax.swing.JFrame;

import br.edu.unilab.unicaffe.bloqueio.model.PerfilBloqueio;
import br.edu.unilab.unicaffe.bloqueio.model.Processo;
import br.edu.unilab.unicaffe.desktop.Desktop;
import br.edu.unilab.unicaffe.model.Cliente;
import br.edu.unilab.unicaffe.model.Maquina;
import br.edu.unilab.unicaffe.registro.model.Perfil;
import br.edu.unilab.unicaffe.update.Update;
import br.edu.unilab.unicaffe.util.Ligador;
import br.edu.unilab.unicaffe.util.Log;
import br.edu.unilab.unicaffe.util.Token;
import br.edu.unilab.unicaffe.view.FrameAviso;
import br.edu.unilab.unicaffe.view.FrameMensagem;
import br.edu.unilab.unicaffe.view.FrameTelaAcesso;
import br.edu.unilab.unicaffe.view.FrameTelaBloqueio;

/**
 * Classe que se ocupa com o núcleo do sistema do lado do cliente.
 * 
 * @author Jefferson Uchôa Ponte
 *
 */
public class ClienteController {
		
	/**
	 * Barra visualizada durante o acesso.
	 */
	private FrameTelaAcesso frameTelaAcesso;

	/**
	 * Tela que bloqueia o acesso e permite tentativa de autenticação.
	 */
	private FrameTelaBloqueio frameTelaBloqueio;
	/**
	 * Tela que exibe um aviso do administrador.
	 */
	private FrameAviso frameAviso;
	/**
	 * Definida como true se o acesso estiver bloqueado.
	 */
	private boolean bloqueado;

	/**
	 * Definida com true se o UniCaffé estiver bloqueando aplicações.
	 */
	private boolean bloqueandoAplicacoes;
	/**
	 * Evita que um conflito entre processos aconteça.
	 */
	private Semaphore semaforo;
	/**
	 * bloqueios do Unicaffe
	 */
	private PerfilBloqueio pb;

	/**
	 * Atributo que possui conexões com o servidor.
	 */
	private Cliente cliente;
	
	/**
	 * Retorna o semáforo.
	 * 
	 * @return
	 */
	
	public Semaphore getSemaforo() {
		return this.semaforo;
	}
	/**
	 * flag para saber se o servidor responde ou não.
	 */
	private String toVivo;

	/**
	 * Constroi objeto ClienteController.
	 * 
	 */

	public ClienteController() {
		this.semaforo = new Semaphore(1);
		this.cliente = new Cliente();
		this.getCliente().getMaquina().preencheComMaquinaLocal();
		this.getCliente().getMaquina().setVersao(VERSAO);
		this.frameTelaAcesso = new FrameTelaAcesso();
		this.frameAviso = new FrameAviso();
		this.frameTelaBloqueio = new FrameTelaBloqueio();
		this.frameTelaBloqueio.getLaBelVersao().setText(VERSAO);
		this.getFrameTelaBloqueio().getLabelNomePC().setText(this.getCliente().getMaquina().getNome());
	}

	/**
	 * Faz com que a aplicação do UniCaffé Cliente tenha início de execução.
	 * 
	 */
	public void iniciaCliente() {
		verificaConexao(10);
		desabilitaModoSuspender();
		configurarHostPorta();
		getFrameAviso().setVisible(false);
		getFrameTelaBloqueio().setStatusConexao(false);
		getFrameTelaBloqueio().setVisible(true);
		tentaConexoes();

		getFrameTelaAcesso().getBtnFinalizar().addActionListener(new ActionListener() {
			@Override
			public void actionPerformed(ActionEvent e) {
				bloqueia();
			}
		});
		getFrameTelaBloqueio().getPasswordFieldSenha().addKeyListener(new KeyAdapter() {
			public void keyPressed(java.awt.event.KeyEvent e) {
				if (e.getKeyCode() == java.awt.event.KeyEvent.VK_ENTER) {
					tentarLogar();
				}

			}

		});
		getFrameTelaBloqueio().getBtnEntrar().addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				tentarLogar();
			}
		});
		bloqueia();

	}

	/**
	 * configura a suspensão para nunca
	 */
	public void desabilitaModoSuspender() {
		try {
			Runtime.getRuntime().exec("powercfg -x -standby-timeout-ac 0");
		} catch (IOException e) {
			e.printStackTrace();
		}
	}

	/**
	 * Configura host e porta.
	 */
	public void configurarHostPorta() {
		File arquivo = new File("config.ini");
		if (arquivo.exists()) {
			Properties config = new Properties();
			FileInputStream file;
			try {
				file = new FileInputStream(arquivo);
				config.load(file);
				servidorPrimario = config.getProperty("host_servidor_primario");
				servidorSecundario = config.getProperty("host_servidor_secundario");
				portaServidorPrimario = Integer.parseInt(config.getProperty("porta_servidor_primario"));
				portaServidorSecundario = Integer.parseInt(config.getProperty("porta_servidor_secundario"));

			} catch (IOException e) {
				e.printStackTrace();
			}
		} else {
			try {

				FileWriter fw = new FileWriter(arquivo, true);
				BufferedWriter bw = new BufferedWriter(fw);
				bw.write(";Configurações do UniCafféClient\r\n" + "\r\n" + "host_servidor_primario = 200.129.19.40\r\n"
						+ "host_servidor_secundario = 200.128.19.10\r\n" + "porta_servidor_primario = 27289\r\n"
						+ "porta_servidor_secundario = 27289");
				bw.newLine();
				bw.close();
				fw.close();

			} catch (IOException e) {
				e.printStackTrace();
			}

		}
	}

	/**
	 * Envia mensagem de tentativa de autenticação com os dados do formulário da
	 * tela de bloqueio para o servidor.
	 */
	public void tentarLogar() {
		// Saida de emergência
		if (getFrameTelaBloqueio().getTextFieldLogin().getText().equals("emergencia")
				&& getFrameTelaBloqueio().getPasswordFieldSenha().getText().equals("cafe@eh@liberdade")) {

			getFrameTelaBloqueio().setVisible(false);
			desBloqueandoServicos();
			
			
			try {
				Runtime.getRuntime()
						.exec(" attrib " + System.getProperty("user.home") + "\\Links\\RecentPlaces.lnk -h");
				Process p = Runtime.getRuntime().exec(" taskkill /f /im explorer.exe");
				p.waitFor();
				Runtime.getRuntime().exec("explorer.exe");
			} catch (IOException | InterruptedException e) {
				e.printStackTrace();
			}
			
			System.exit(0);
		}

		String token = Token.geraToken();

		if (getFrameTelaBloqueio().getTextFieldLogin().getText().equals("token")
				&& getFrameTelaBloqueio().getPasswordFieldSenha().getText().equals(token)) {
			desbloqueia(3600, "Token");
			return;
		}

		String senha = Token.getMD5(getFrameTelaBloqueio().getPasswordFieldSenha().getText());
		String login = getFrameTelaBloqueio().getTextFieldLogin().getText();

		if (socketResponde()) {
			PrintStream ps;
			try {
				ps = new PrintStream(cliente.getSaida(), true, "UTF-8");
				ps.println("autentica(" + login + "," + senha + ")");
			} catch (UnsupportedEncodingException e) {
				e.printStackTrace();
			}
		} else {
			logoff();
		}

		getFrameTelaBloqueio().resetCampos();
	}

	/**
	 * Torna os bloqueios do UniCaffé efetivos.
	 */
	public void bloqueia() {
		getFrameTelaAcesso().setVisible(false);
		setBloqueado(true);
		getCliente().getMaquina().getAcesso().getUsuario().setLogin("livre");
		getCliente().getMaquina().getAcesso().pararDeContar();
		String caminho = "c:\\arquivos";
		Desktop d = new Desktop(caminho, "jefponte");
		d.desfazer();
		if (getCliente().getSaida() != null) {
			new PrintStream(getCliente().getSaida()).println("setStatus(" + Maquina.STATUS_DISPONIVEL + ")");
		}

		EventQueue.invokeLater(new Runnable() {

			@Override
			public void run() {
				getFrameTelaBloqueio().setVisible(true);
				getFrameTelaBloqueio().resetCampos();
			}
		});

		bloqueiaServicos();
		bloqueandoAplicacoes();

		Collection<String> processos = new ArrayList<String>();

		processos.add("attrib " + System.getProperty("user.home") + "\\Links\\RecentPlaces.lnk +h");
		processos.add("taskkill /f /im firefox.exe");
		processos.add("taskkill /f /im iexplore.exe");
		processos.add("taskkill /f /im chrome.exe");
		processos.add("taskkill /f /im explorer.exe");

		processaProcessos(processos);
	}

	/**
	 * Este método serve pra bloquear alguns serviços do windows. Ele altera
	 * Registros.
	 */
	public void bloqueiaServicos() {

		Perfil perfilBloqueio = new Perfil();
		perfilBloqueio.setListaDeRegistros(Perfil.listaParaBloqueio());
		perfilBloqueio.executar();

		Perfil perfilTemporarioExecucao = new Perfil();
		perfilTemporarioExecucao.setListaDeRegistros(Perfil.perfilTemporarioExecucao());
		perfilTemporarioExecucao.executar();

		Perfil perfilTemporarioDesativado = new Perfil();
		perfilTemporarioDesativado.setListaDeRegistros(Perfil.perfilTemporarioDesativado());
		perfilTemporarioDesativado.deletar();

	}

	/**
	 * Verifica se servidor Unicaffé está respondendo
	 */
	public boolean socketResponde() {
		setToVivo("perguntei");
		new PrintStream(getCliente().getSaida()).println("taVivo()");
		for (int i = 0; i < 50; i++) {
			if (getToVivo().equals("vivo")) {
				return true;
			} else {
				try {
					Thread.sleep(100);
				} catch (InterruptedException e1) {
					e1.printStackTrace();
				}
			}
		}
		return false;
	}

	/**
	 * Cria uma Thread que fica bloqueando processos que não foram autorizados.
	 */
	public void bloqueandoAplicacoes() {

		Thread t = new Thread(new Runnable() {

			@Override
			public void run() {
				try {
					setBloqueandoAplicacoes(false);
					Thread.sleep(3000);
					setBloqueandoAplicacoes(true);

				} catch (InterruptedException e) {
					e.printStackTrace();
				}

				pb = new PerfilBloqueio();
				pb.buscaAceitos();

				while (isBloqueandoAplicacoes()) {

					pb.buscaAtivos();
					pb.comparaEMata();
					try {
						Thread.sleep(2000);
					} catch (InterruptedException e) {
						e.printStackTrace();
					}
				}
			}
		});
		t.start();
	}

	/**
	 * Desativa os bloqueios gerados através de registros do Windows.
	 */

	public void desBloqueandoServicos() {

		Perfil perfilBloqueio = new Perfil();
		perfilBloqueio.setListaDeRegistros(Perfil.listaParaBloqueio());
		perfilBloqueio.desfazer();

		Perfil perfilTemporario = new Perfil();
		perfilTemporario.setListaDeRegistros(Perfil.perfilTemporarioExecucao());
		perfilTemporario.deletar();

		Perfil perfilTemporarioDesativado = new Perfil();
		perfilTemporarioDesativado.setListaDeRegistros(Perfil.perfilTemporarioDesativado());
		perfilTemporarioDesativado.executar();
	}

	/**
	 * Inicia tentativas de conexões com o servidor a partir de arquivos de
	 * configuração. Ao conectar chama o método que vai processar a conexão.
	 */
	public void tentaConexoes() {

		Thread tentandoConexoes = new Thread(new Runnable() {
			@Override
			public void run() {

				int j = 0;
				for (int i = 0; true; i++) {

					try {
						try {
							j++;
							if (j > 10) {

								j = 0;
							}

							if (i == 30) {
								getFrameTelaBloqueio().getLabelStatus().setText("Refazendo Conexão de Rede...");
								resetaRede();
								Thread.sleep(5000);
								continue;
							}

							Socket socket;
							if (j <= 5) {
								socket = new Socket(servidorPrimario, portaServidorPrimario);
							} else {
								socket = new Socket(servidorSecundario, portaServidorSecundario);
							}

							getCliente().setConexao(socket);
							getCliente().setEntrada(socket.getInputStream());
							getCliente().setSaida(socket.getOutputStream());
							getCliente().getSaida().flush();
							getFrameTelaBloqueio().setStatusConexao(true);

							processaCliente();

							break;
						} catch (UnknownHostException e) {

							getFrameTelaBloqueio().getLabelStatus().setText("Servidor não encontrado. Tentativa: " + i);
						} catch (IOException e) {
							getFrameTelaBloqueio().getLabelStatus().setText("Erro no Servidor. Tentativa: " + i);
						} catch (NullPointerException e) {
							new Log(e.getMessage(), "log.log");
						} finally {
							
						}

						Thread.sleep(100);
					} catch (InterruptedException e) {
						e.printStackTrace();
					}
					try {
						Thread.sleep(2000);
					} catch (InterruptedException e1) {
						e1.printStackTrace();
					}
				}
			}
		});
		tentandoConexoes.start();
	}

	/**
	 * Refaz as conexões de rede
	 */
	public void resetaRede() {
		Collection<String> processos = new ArrayList<>();
		processos.add("netsh winsock reset");
		processos.add("netsh int ip reset ");
		processos.add("ipconfig /release");
		processos.add("ipconfig /renew");
		processos.add("ipconfig /flushdns");

		processaProcessos(processos);
	}

	/**
	 * Executa um lista de processos baseado em uma lista de String
	 */
	public void processaProcessos(Collection<String> processos) {
		for (String proc : processos) {
			try {
				Runtime.getRuntime().exec(proc);
				Thread.sleep(100);
			} catch (IOException | InterruptedException e) {
				e.printStackTrace();
			}
		}
	}

	/**
	 * 
	 * @param bloqueia
	 *            ou libera internet
	 */

	public void bloqueiaInternet(boolean bloqueia) {
		Collection<String> processos = new ArrayList<>();
		
		if (bloqueia) {
			processos.add("netsh advfirewall set  allprofiles state on");
			processos.add(
					"netsh advfirewall firewall add rule name=\"LIBCE\" enable=yes remoteip=200.129.19.0/24 action=allow protocol=TCP dir=out");
			processos.add(
					"netsh advfirewall firewall add rule name=\"LIBSFC\" enable=yes remoteip=200.128.19.0/24 action=allow protocol=TCP dir=out");
			processos.add(
					"netsh advfirewall firewall add rule name=\"LIBINT\" enable=yes remoteip=10.0.0.0/8 action=allow protocol=TCP dir=out");
			processos.add("netsh advfirewall set currentprofile firewallpolicy blockinbound,blockoutbound");
			processaProcessos(processos);
		} else {
			try {
				Runtime.getRuntime().exec("netsh advfirewall reset").waitFor();				
				Runtime.getRuntime().exec("netsh firewall reset").waitFor();
			} catch (InterruptedException | IOException e) {
				e.printStackTrace();
			}
			
		}
		
	}

	/**
	 * Processa a conexão com o servidor.
	 */

	public void processaCliente() {
		Thread processando = new Thread(new Runnable() {

			@Override
			public void run() {
				getCliente().getMaquina().setStatus(Maquina.STATUS_DISPONIVEL);
				PrintStream printStream = new PrintStream(getCliente().getSaida());
				BufferedReader buffereReader = null;
				try {
					buffereReader = new BufferedReader(new InputStreamReader(getCliente().getEntrada(), "UTF-8"));
				} catch (UnsupportedEncodingException e1) {
					e1.printStackTrace();
				}

				printStream.println("setStatus(" + getCliente().getMaquina().getStatus() + ")");
				printStream.println("setNome(" + getCliente().getMaquina().getNome() + ")");
				printStream.println("setVersao(" + getCliente().getMaquina().getVersao() + ")");
				printStream.println("setMac(" + getCliente().getMaquina().getEnderecoMac() + ")");
				
				while (getCliente().getConexao().isConnected()) {
					String mensagem;
					try {
						mensagem = buffereReader.readLine();
						new Log(mensagem, "log.log");
						processaMensagem(mensagem);
					} catch (IOException e) {
						e.printStackTrace();
						bloqueia();
						getFrameTelaBloqueio().setStatusConexao(false);
						break;

					} catch (NullPointerException ne) {
						System.out.println("null pointer exception");
						ne.printStackTrace();
						bloqueia();
						getFrameTelaBloqueio().setStatusConexao(false);
						break;
					}
				}

				getFrameTelaBloqueio().setStatusConexao(false);
				bloqueia();
				tentaConexoes();
				return;

			}
		});
		processando.start();
	}
	
	/**
	 * verifica se o servidor está respondendo caso não encerra a conexão
	 * @param tempoEsperaMinutos
	 * 
	 */
	private void verificaConexao(final long tempoEsperaMinutos) {

		new Thread(new Runnable() {
			@Override
			public void run() {
				System.out.println("entrando na tread do limpar Inativos");
				while (true) {
					System.out.println("dentro do limparInativos");
					
					long umMinuto = 60000;
					long tempoEspera = umMinuto * tempoEsperaMinutos;

					try {
						Thread.sleep(tempoEspera / 2);
					} catch (InterruptedException e) {
						e.printStackTrace();
					}
					
					long dataAtual = new Date().getTime();
					long tempoOcio = dataAtual - cliente.getUltimaInteracao();

					if (tempoOcio > tempoEspera && cliente.getMaquina().getStatus() == Maquina.STATUS_DISPONIVEL) {
						if (socketResponde()) continue;
						logoff();
					}
				}
			}
		}).start();
	}

		
	/**
	 * 
	 * Verifica uma mensagem enviada pelo servidor e executa uma operação como
	 * resposta.
	 * 
	 * @param mensagem
	 */
	public synchronized void processaMensagem(String mensagem) {

		System.out.println(mensagem);
		cliente.setUltimaInteracao(new Date().getTime());

		
		if (mensagem == null) {
			System.out.println("mensagem nula");
			return;
		}
		
		if (mensagem.indexOf('(') == -1 || mensagem.indexOf(')') == -1) {
			return;
		}
		
		String comando = mensagem.substring(0, mensagem.indexOf('('));
		final String parametros = mensagem.substring(mensagem.indexOf('(') + 1, mensagem.lastIndexOf(')'));
		if (comando.equals("bloqueia")) {
			bloqueia();
			return;
		} else if (comando.equals("liberaProcessosBloqueados"))

		{
			String aLiberar = parametros;

			System.out.println(aLiberar);

			String[] linha = aLiberar.split("[;]");

			for (String liberar : linha) {
				boolean jaTem = false;
				String[] vDados = liberar.split("[,]");

				// testa se já existe o mesmo processo

				for (Processo processoAceito : pb.getListaDeAceitos()) {

					if (processoAceito.getExecutablePath().equals(vDados[0])
							&& processoAceito.getImagem().equals(vDados[1])) {
						jaTem = true;
						break;
					}
				}
				if (jaTem) {
					System.out.println("já tem" + vDados[0]);
					continue;
				}

				try {
					// pb.getListaDeAceitos().add(new Processo(vDados[1], vDados[0]));
					new Log("\n" + vDados[0] + "," + vDados[1], "permitidos.txt");
					new PrintStream(getCliente().getSaida())
							.println("libereiEsseProcesso(" + vDados[0] + "," + vDados[1] + ")");
					System.out.println("Adicionando " + vDados[0] + vDados[1]);
				} catch (ArrayIndexOutOfBoundsException fora) {
					System.out.println("fora");
				}
			}
			logoff();
			return;
		} else if (comando.equals("meDeProcessosBloqueados")) {
			String listaBloqueados = "";

			for (Processo p : pb.getListaDeBloqueados()) {
				listaBloqueados += p.getExecutablePath() + "," + p.getImagem() + "<br/>";
			}
			if (listaBloqueados.isEmpty()) {
				listaBloqueados = "nenhum processo bloqueado no momento";
			}

			new PrintStream(getCliente().getSaida()).println("tomaBloqueados(" + listaBloqueados + ")");

			return;
		} else if (comando.equals("toVivoSim")) {
			setToVivo("vivo");
			new PrintStream(getCliente().getSaida()).println("tbmToVivo()");
			return;
		} else if (comando.equals("desbloqueia")) {
			String login = parametros.substring(0, parametros.indexOf(','));
			String tempo = parametros.substring(parametros.indexOf(',') + 2);
			int time = Integer.parseInt(tempo);
			desbloqueia(time, login);
			return;
		} else if (comando.equals("desativar")) {
			desBloqueandoServicos();
			getFrameTelaBloqueio().setVisible(false);
			getFrameTelaAcesso().setVisible(false);
			setBloqueandoAplicacoes(false);
			Process processo;
			try {
				processo = Runtime.getRuntime().exec(" taskkill /f /im explorer.exe");
				processo.waitFor();
				Runtime.getRuntime().exec("explorer.exe");
			} catch (IOException | InterruptedException e) {
				e.printStackTrace();
			}
			if (getCliente().getSaida() != null) {
				new PrintStream(getCliente().getSaida()).println("setStatus(" + Maquina.STATUS_OCUPADA + ")");
			}
			return;
		} else if (comando.equals("bonus")) {
			int bonus = 600;
			try {
				getSemaforo().acquire();
				getCliente().getMaquina().getAcesso().setTempoDisponibilizado(
						getCliente().getMaquina().getAcesso().getTempoDisponibilizado() + bonus);

			} catch (InterruptedException e) {
				e.printStackTrace();
			} finally {
				semaforo.release();
			}
			return;
		} else if (comando.equals("exec")) {
			try {
				Runtime.getRuntime().exec(parametros);
			} catch (IOException e) {
				e.printStackTrace();
			}
			return;
		}

		else if (comando.equals("desligar")) {

			bloqueia();
			try {
				Runtime.getRuntime().exec(" shutdown /s -t 00");
				getFrameTelaBloqueio().setVisible(true);
				System.exit(0);
				return;
			} catch (IOException e) {
				e.printStackTrace();
			}
			return;
		} else if (comando.equals("sirene") || comando.equals("ligador")) {
			Ligador.ligador(parametros);
			return;
		}

		else if (comando.equals("logoff")) {
			logoff();

			return;
		} else if (comando.equals("mudarServidor")) {
			String servidor1 = parametros.substring(0, parametros.indexOf(';'));
			String servidor2 = parametros.substring(parametros.indexOf(';') + 1);
			mudarServidor(servidor1, servidor2);
			return;
		}

		else if (comando.equals("semInternet")) {
			bloqueiaInternet(true);
			return;
		}

		else if (comando.equals("comInternet")) {
			bloqueiaInternet(false);
			return;
		} else if (comando.equals("limparDados")) {
			FrameMensagem frameMensagem = new FrameMensagem();
			frameMensagem.setMensagem("Iniciando a limpeza, essa tarefa costuma demorar.");
			frameMensagem.setVisible(true);
			String caminho = System.getProperty("user.home") + "\\localunicafe";
			apagarDados(new File(caminho));
			if (verificaSeApagou(new File(caminho))) {
				frameMensagem.setMensagem("A limpeza foi realizada com sucesso!!!! ");
				frameMensagem.setVisible(true);
				try {
					Thread.sleep(10000);
				} catch (InterruptedException e) {
					e.printStackTrace();
				}
				frameMensagem.setVisible(false);
			}
			return;
		} else if (comando.equals("printc")) {
			Thread t = new Thread(new Runnable() {
				@Override
				public void run() {
					getFrameTelaBloqueio().getLabelMensagem().setText("" + parametros);
					getFrameTelaBloqueio().getLabelMensagem().requestFocus();// acessibilidade para o leitor de tela
					try {
						Thread.sleep(10000);
					} catch (InterruptedException e) {
						e.printStackTrace();
					}
					getFrameTelaBloqueio().getLabelMensagem().setText("");
				}
			});
			t.start();
			return;
		} else if (comando.equals("printa")) {
			FrameMensagem frameMensagem = new FrameMensagem();
			frameMensagem.setMensagem(parametros);
			frameMensagem.setVisible(true);
			try {
				Thread.sleep(60000);
			} catch (InterruptedException e) {
				e.printStackTrace();
			}
			frameMensagem.setVisible(false);
			return;
		} else if (comando.equals("atualizar")) {
			atualizar();
		} else if (comando.equals("atualizaatualizador")) {
			Update atualizador = new Update();
			atualizador.iniciaUpdateAtualizador();
		}
	}

	private void atualizar() {
		bloqueia();
		desBloqueandoServicos();
		try {
			Process processo = Runtime.getRuntime().exec(" taskkill /f /im explorer.exe");
			processo.waitFor();
			Runtime.getRuntime().exec(" java -jar \".\\unicafe-update.jar\"");
			System.exit(0);	
			
		} catch (IOException | InterruptedException e) {
			e.printStackTrace();
		}
	}

	/**
	 * usado para fazer logoff no windows como o registro de autologon em caso de
	 * logoff está ativado, então funciona para reiniciar o unicaffe
	 */
	private void logoff() {
		bloqueia();
		try {
			Runtime.getRuntime().exec("logoff");			
			getFrameTelaBloqueio().setVisible(true);
			return;
		} catch (IOException e) {
			e.printStackTrace();
		}
	}

	/**
	 * usado pra mudar o cliente de um servidor pro outro
	 * 
	 * @param servidor
	 * @param servidor2
	 */
	private void mudarServidor(String servidor, String servidor2) {
		File arquivo = new File("config.ini");
		if (arquivo.exists()) {

			try {
				arquivo.delete();
				FileWriter fw = new FileWriter(arquivo, true);
				BufferedWriter bw = new BufferedWriter(fw);
				bw.write(";Configurações do UniCafféClient\r\n" + "\r\n" + "host_servidor_primario =" + servidor
						+ "\r\n" + "host_servidor_secundario = " + servidor2 + "\r\n"
						+ "porta_servidor_primario = 27289\r\n" + "porta_servidor_secundario = 27289");
				bw.newLine();
				bw.close();
				fw.close();
			} catch (Exception e) {
				e.printStackTrace();
			}
		}
	}

	/**
	 * Mata o software explorer.exe do windows e o executa novamente.
	 */
	public void restartNoExplorer() {
		try {
			String comando = " attrib " + System.getProperty("user.home") + "\\Links\\RecentPlaces.lnk +h";
			Runtime.getRuntime().exec(comando);
			Runtime.getRuntime().exec(" taskkill /f /im firefox.exe");
			Runtime.getRuntime().exec(" taskkill /f /im iexplore.exe");
			Runtime.getRuntime().exec(" taskkill /f /im chrome.exe");
			Process processo = Runtime.getRuntime().exec(" taskkill /f /im explorer.exe");
			processo.waitFor();
			Runtime.getRuntime().exec("explorer.exe");
		} catch (IOException | InterruptedException e) {
			e.printStackTrace();
		}
	}

	/**
	 * Faz o desbloqueio do UniCaffé por tempo determinado para um login de usuário.
	 * 
	 * @param segundos
	 * @param login
	 */
	public void desbloqueia(final int segundos, final String login) {
		setBloqueado(true);
		EventQueue.invokeLater(new Runnable() {
			@Override
			public void run() {				
				getFrameTelaAcesso().getLabelLogin().setText(login);
				getFrameTelaAcesso().getLabelTempo().setText("calculando");
				getFrameAviso().setVisible(false);
				getFrameTelaBloqueio().setVisible(false);
				setBloqueado(false);
				getFrameTelaAcesso().setVisible(true);
			}
		});
		restartNoExplorer();
		if (getCliente().getSaida() != null) {
			new PrintStream(getCliente().getSaida()).println("setStatus(" + Maquina.STATUS_OCUPADA + ")");
		}
		String caminho = System.getProperty("user.home") + "\\localunicafe";
		Desktop d = new Desktop(caminho, login);
		d.alterarRegistro();

		getCliente().getMaquina().getAcesso().getUsuario().setLogin(login);
		getCliente().getMaquina().getAcesso().setTempoDisponibilizado(segundos);
		getCliente().getMaquina().getAcesso().setTempoUsado(0);

		setBloqueado(false);

		Thread sessao = new Thread(new Runnable() {
			@Override
			public void run() {

				while (true) {
					boolean saiDolaco = false;
					try {

						// Região crítica.
						getSemaforo().acquire();
						if (!(getCliente().getMaquina().getAcesso().getTempoUsado() <= getCliente().getMaquina()
								.getAcesso().getTempoDisponibilizado() && (!isBloqueado())))
							saiDolaco = true;
					} catch (InterruptedException e) {
						e.printStackTrace();
					} finally {
						semaforo.release();
					}
					if (saiDolaco == true)
						break;
					try {
						Thread.sleep(1000);
						int tempo = 600;
						try {
							
							// Região crítica.
							getSemaforo().acquire();
							tempo = (getCliente().getMaquina().getAcesso().getTempoDisponibilizado()
									- getCliente().getMaquina().getAcesso().getTempoUsado());
						} catch (InterruptedException e) {
							e.printStackTrace();
						} finally {
							semaforo.release();
						}

						if (tempo == 300) {

							if (getCliente().getSaida() != null) {
								new PrintStream(getCliente().getSaida()).println("meDaBonus()");
							}
						}
						if (tempo == 120 || tempo == 20) {
							getFrameAviso().setVisible(true);
							getFrameTelaAcesso().setVisible(true);
							getFrameTelaAcesso().setState(JFrame.NORMAL);
							getFrameAviso().setState(JFrame.NORMAL);
							if (getCliente().getSaida() != null) {
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
						getFrameTelaAcesso().getLabelTempo().setText(String.format("%02d", hora) + ":"
								+ String.format("%02d", minuto) + ":" + String.format("%02d", tempo));
						getCliente().getMaquina().getAcesso()
								.setTempoUsado(getCliente().getMaquina().getAcesso().getTempoUsado() + 1);

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

	/**
	 * envia msg tanto para um log local como para o servidor
	 * @param String msg
	 * @param String arquivo
	 */
	private void logLocalRemoto(String msg, String arquivo) {
		new PrintStream(cliente.getSaida()).println(msg);
		new Log(msg, arquivo);
	}

	/**
	 * Apaga dados de usuário da máquina.
	 * 
	 * @param arquivo
	 */
	public void apagarDados(File arquivo) {
		String login = getCliente().getMaquina().getAcesso().getUsuario().getLogin();

		if (arquivo.isDirectory()) {

			File[] listaDeArquivos = arquivo.listFiles();
			for (File outroArquivo : listaDeArquivos) {
				if (!((outroArquivo.getName().toLowerCase().trim().equals(login.toLowerCase().trim()))
						|| outroArquivo.getName().toLowerCase().trim().equals("public"))) {
					apagarDados(outroArquivo);
				}

			}
		}

		arquivo.delete();
	}

	/**
	 * Verifica se apagou.
	 * 
	 * @param arquivo
	 */
	public boolean verificaSeApagou(File arquivo) {
		if (arquivo.listFiles().length <= 2) return true;
		return false;
	}

	/**
	 * 
	 * @return Tela de acesso
	 */
	public FrameTelaAcesso getFrameTelaAcesso() {
		return frameTelaAcesso;
	}

	/**
	 * 
	 * @return tela de aviso do administrador.
	 */
	public FrameAviso getFrameAviso() {
		return frameAviso;
	}

	/**
	 * 
	 * @return conexões do cliente com o servidor.
	 */
	public Cliente getCliente() {
		return cliente;
	}

	/**
	 * 
	 * @return tela de bloqueio.
	 */
	public FrameTelaBloqueio getFrameTelaBloqueio() {
		return frameTelaBloqueio;
	}

	/**
	 * 
	 * @return estado do UniCaffé, bloqueado ou não.
	 */
	public boolean isBloqueado() {
		return bloqueado;
	}

	/**
	 * 
	 * @param bloqueado
	 */
	public void setBloqueado(boolean bloqueado) {
		this.bloqueado = bloqueado;
	}

	/**
	 * 
	 * @return
	 */
	public boolean isBloqueandoAplicacoes() {
		return bloqueandoAplicacoes;
	}

	/**
	 * 
	 * @param bloqueandoAplicacoes
	 */
	public void setBloqueandoAplicacoes(boolean bloqueandoAplicacoes) {
		this.bloqueandoAplicacoes = bloqueandoAplicacoes;
	}

	/**
	 * @return the pb
	 */
	public PerfilBloqueio getPb() {
		return pb;
	}

	/**
	 * @param pb
	 *            the pb to set
	 */
	public void setPb(PerfilBloqueio pb) {
		this.pb = pb;
	}

	/**
	 * @return the toVivo
	 */
	public String getToVivo() {
		return toVivo;
	}

	/**
	 * @param toVivo
	 *            the toVivo to set
	 */
	public void setToVivo(String toVivo) {
		this.toVivo = toVivo;
	}


	/**
	 * Host do servidor primário. É o primeiro que o cliente tenta conexões.
	 */

	public static String servidorPrimario = "200.129.19.40";

	/**
	 * Host do servidor secundário. É o segundo que o cliente tenta conexões.
	 */

	public static String servidorSecundario = "200.128.19.10";
	/**
	 * Porta do servidor primário.
	 */
	public static int portaServidorPrimario = 27289;
	/**
	 * Porta do servidor secundário.
	 */
	public static int portaServidorSecundario = 27289;
	
	/**
	 * Indica a versão do UniCaffé Cliente.
	 */
	public static final String VERSAO = "45";
}
