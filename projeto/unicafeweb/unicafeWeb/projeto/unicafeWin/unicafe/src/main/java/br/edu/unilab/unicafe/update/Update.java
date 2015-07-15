package br.edu.unilab.unicafe.update;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.net.Socket;
import java.net.UnknownHostException;
import java.util.Properties;
import java.util.Scanner;

import javax.swing.JLabel;

public class Update {

	
	
	private Socket conexao;
	private BufferedReader reader;
	private ObjectInputStream entrada;
	private FileOutputStream out;
	private String linha;

	public void iniciaUpdate() {
		// O objetivo aqui � conectar ao servidor e pedir atualiza��o do
		// unicafe.
		// VOu pegar esse arquivo e substituir no UniCafeClient.exe
		FrameUpdate janela = new FrameUpdate();
		janela.setVisible(true);
		
		try {
			Thread.sleep(10000);
			
		} catch (InterruptedException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		
		

		try {
//			Properties config = new Properties();
//			FileInputStream fileInputStream = new FileInputStream("config.ini");
//			config.load(fileInputStream);
//			String ipDoServidor = config.getProperty("host_unicafeserver");
//			fileInputStream.close();
			conexao = new Socket("200.129.19.40", 27289);
			ObjectOutputStream saida = new ObjectOutputStream(conexao.getOutputStream());
			InputStream in = conexao.getInputStream();
			InputStreamReader isr = new InputStreamReader(in);
			setReader(new BufferedReader(isr));
			
			
			
			
			saida.writeObject("setStatus(4)");
			saida.flush();
			setEntrada(new ObjectInputStream(conexao.getInputStream()));
			File f1 = new File("C:\\Program Files (x86)\\UniCafe\\UniCafeClient.exe");
			out = new FileOutputStream(f1);
			int tamanho = 4096;
			
			byte[] buffer = new byte[tamanho];    
			int lidos = -1;  
			while((lidos = in.read(buffer, 0, tamanho)) != -1){
				out.write(buffer, 0, lidos);
			}
			out.flush();

			janela.add(new JLabel("Reiniciando Computador"));
			Process process;
			Scanner leitor;
			try {
				process = Runtime.getRuntime().exec(" shutdown -r");
				leitor = new Scanner(process.getInputStream());
				while (leitor.hasNext()) {
					setLinha(leitor.nextLine());
				}
				
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			
			System.exit(0);
			
			
		} catch (UnknownHostException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
		} catch (IOException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
		}


		

	}

	public String getLinha() {
		return linha;
	}

	public void setLinha(String linha) {
		this.linha = linha;
	}

	public ObjectInputStream getEntrada() {
		return entrada;
	}

	public void setEntrada(ObjectInputStream entrada) {
		this.entrada = entrada;
	}

	public BufferedReader getReader() {
		return reader;
	}

	public void setReader(BufferedReader reader) {
		this.reader = reader;
	}
}
