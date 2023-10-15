package br.edu.unilab.unicaffe.update;

import java.io.File;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.PrintStream;
import java.net.Socket;
import java.net.UnknownHostException;
import java.util.Properties;

import br.edu.unilab.unicaffe.view.FrameTelaBloqueio;

/**
 * 
 * Classe responsável por atualizar o UniCaffé Cliente.
 * 
 * @author Jefferson Uchôa Ponte
 *
 */
public class Update {
	/**
	 * Host do servidor.
	 */
	private String host;
	/**
	 * Porta para conexão.
	 */
	private int porta;

	/**
	 * Constroi objeto Update
	 */
	public Update() {
		this.host = "200.129.19.40";
		this.porta = 27289;
		this.configura();
	}

	public static final int STATUS_UPDATE = 4;

	/**
	 * Inicia processo de atualização do UniCaffé nesta máquina. Baixando nova
	 * versão do servidor e substituindo no diretório padrão do UniCafféCliente.
	 */
	public void iniciaUpdate() {
		Socket conexao;
		FileOutputStream out;

		FrameTelaBloqueio janela = new FrameTelaBloqueio();
		janela.statusUpdate();
		janela.setVisible(true);

		try {
			Thread.sleep(5000);

		} catch (InterruptedException e) {
			e.printStackTrace();
		}
		try {
			conexao = new Socket(this.host, this.porta);
			PrintStream saida = new PrintStream(conexao.getOutputStream());
			InputStream in = conexao.getInputStream();
			saida.println("setStatus(" + STATUS_UPDATE + ")");
			saida.flush();
			File f1 = new File("./UniCafeClient.exe");
			out = new FileOutputStream(f1);
			int tamanho = 4096;
			byte[] buffer = new byte[tamanho];
			int lidos = -1;
			while ((lidos = in.read(buffer, 0, tamanho)) != -1) {
				out.write(buffer, 0, lidos);
			}
			out.flush();
			out.close();

			janela.setVisible(false);


		} catch (UnknownHostException e1) {
			e1.printStackTrace();
		} catch (IOException e1) {
			e1.printStackTrace();
		}

		try {
			Runtime.getRuntime().exec("./UniCafeClient.exe");
		} catch (IOException e) {
			e.printStackTrace();

		}
		
	}

	/**
	 * Atribui ao host e à porta os valores contidos no arquivo de configuração.
	 */
	public void configura() {
		File arquivo = new File("config.ini");
		if (arquivo.exists()) {
			Properties config = new Properties();
			FileInputStream file;
			try {
				file = new FileInputStream(arquivo);
				config.load(file);
				host = config.getProperty("host_servidor_primario");
				porta = Integer.parseInt(config.getProperty("porta_servidor_primario"));
			} catch (IOException e) {
				e.printStackTrace();
			}
		}
	}
}
