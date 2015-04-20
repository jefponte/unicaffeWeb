package br.edu.unilab.unicafe.desktop;

import java.io.IOException;

public class Teste {

	
	public static void main(String[] args) {
		String caminho = "C:\\arquivos";
		String usuario = "jefponte";
		Desktop d = new Desktop(caminho, usuario);
		d.alterarRegistro();
//		d.desfazer();
		

		try {
			Runtime.getRuntime().exec(" taskkill /f /im explorer.exe");
			Thread.sleep(3000);
			Runtime.getRuntime().exec("explorer.exe");

		} catch (InterruptedException | IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		

		
	}
}
