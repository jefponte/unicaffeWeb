package br.edu.unilab.unicafe.update;

import java.awt.Frame;
import java.io.BufferedReader;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.FileWriter;
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
import javax.swing.JOptionPane;

public class Update {

	
	
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
		
		
		

		FileOutputStream fos = null;
		InputStream is = null;

		try {
			Properties config = new Properties();
			FileInputStream fileInputStream = new FileInputStream("config.ini");
			config.load(fileInputStream);
			String ipDoServidor = config.getProperty("host_unicafeserver");
			fileInputStream.close();
			Socket conexao = new Socket(ipDoServidor, 12345);
			ObjectOutputStream saida = new ObjectOutputStream(conexao.getOutputStream());
			InputStream in = conexao.getInputStream();
			InputStreamReader isr = new InputStreamReader(in);
			BufferedReader reader = new BufferedReader(isr);
			
			
			
			
			saida.writeObject("setStatus(4)");
			saida.flush();
			ObjectInputStream entrada = new ObjectInputStream(conexao.getInputStream());
			File f1 = new File("C:\\Program Files (x86)\\UniCafe\\UniCafeClient.exe");
			FileOutputStream out = new FileOutputStream(f1);
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
					String linha = leitor.nextLine();
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
}
