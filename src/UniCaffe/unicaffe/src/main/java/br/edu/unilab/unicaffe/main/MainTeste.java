package br.edu.unilab.unicaffe.main;

import java.io.File;
import java.io.FileInputStream;
import java.io.IOException;
import java.util.Properties;


public class MainTeste {

	public static void main(String[] args) {

		File arquivo = new File("config.ini");
		if(arquivo.exists()){
			Properties config = new Properties();
			FileInputStream file;
			try {
				file = new FileInputStream(arquivo);
				config.load(file);
				System.out.println(config.getProperty("porta"));
				
				
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			

		}
				

	}

}
