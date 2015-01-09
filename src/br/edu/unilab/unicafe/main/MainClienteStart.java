package br.edu.unilab.unicafe.main;

import java.io.IOException;

public class MainClienteStart {
	
	public static void main(String[] args) {
		System.out.println("Teste");
		
		try {
			Runtime.getRuntime().exec("java -jar cliente.jar");
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}

}
