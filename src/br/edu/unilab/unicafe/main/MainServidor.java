package br.edu.unilab.unicafe.main;

import br.edu.unilab.unicafe.model.Servidor;
import br.edu.unilab.unicafe.view.FrameClientDesbloqueio;
import br.edu.unilab.unicafe.view.FrameServidor;


public class MainServidor {
	public static void main(String[] args) {

		Servidor servidor = new Servidor();
		servidor.iniciaSplash();
		
	}
}
