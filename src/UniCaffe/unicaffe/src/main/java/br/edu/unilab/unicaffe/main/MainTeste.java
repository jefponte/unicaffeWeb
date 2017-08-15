package br.edu.unilab.unicaffe.main;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.Socket;
import java.net.UnknownHostException;
import java.util.ArrayList;
import java.util.Properties;

import br.edu.unilab.unicaffe.bloqueio.model.Processo;
import br.edu.unilab.unicaffe.controller.ClienteController;

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
