package br.edu.unilab.unicafe.main;

import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.util.Properties;

import br.edu.unilab.unicafe.controller.ClienteController;

public class MainTeste {

	public static void main(String[] args) {

		Properties props = new Properties();
		FileInputStream file;
		try {
			file = new FileInputStream("C:\\teste.ini");
			props.load(file);
			System.out.println(props.getProperty("aa"));
			
			
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
	}

}
