package br.edu.unilab.unicafe.main;

import br.edu.unilab.unicafe.model.Servidor;
import br.edu.unilab.unicafe.view.JanelaServidor;

public class MainServer {
	
	public static void main(String[] args) {
		Servidor servidor = new Servidor();
		servidor.iniciaServidor();
		
	}

}
