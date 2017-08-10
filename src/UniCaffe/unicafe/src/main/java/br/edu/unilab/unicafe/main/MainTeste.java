package br.edu.unilab.unicafe.main;


import java.io.IOException;

import br.edu.unilab.unicafe.controller.ClienteController;

public class MainTeste {

	public static void main(String[] args) {

		

		try {
			Runtime.getRuntime().exec("\"/Program Files (x86)/Google/Chrome/Application/chrome.exe\" globo.com");
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
	}

}
