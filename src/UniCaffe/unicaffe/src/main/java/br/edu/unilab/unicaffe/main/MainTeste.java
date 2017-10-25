package br.edu.unilab.unicaffe.main;

import java.io.File;
import java.io.IOException;

import br.edu.unilab.unicaffe.controller.ClienteController;
import br.edu.unilab.unicaffe.desktop.Desktop;
import br.edu.unilab.unicaffe.view.FrameMensagem;

public class MainTeste {

	public static void main(String[] args) {
		
		FrameMensagem frame = new FrameMensagem();
		frame.setVisible(true);

		
		ClienteController controller = new ClienteController();
		
		controller.desBloqueandoServicos();
		String caminho = "c:\\arquivos";
		Desktop d = new Desktop(caminho, "jefponte");
		d.desfazer();
		try {
			Runtime.getRuntime().exec(" taskkill /f /im explorer.exe");
			Thread.sleep(3000);
			// System.out.println("Abrindo Explorer. ");
			Runtime.getRuntime().exec("explorer.exe");
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (InterruptedException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		System.exit(0);

		
		
		
		
	}

}
