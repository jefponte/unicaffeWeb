package br.edu.unilab.unicafe.main;

import java.io.IOException;

import br.edu.unilab.unicafe.model.Cliente;

/**
 * 
 * @author Jefferson
 *
 */

public class MainClient {
	public static void main(String[] args) {
		try {
			Runtime.getRuntime().exec("calc.exe");
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

	}

}
