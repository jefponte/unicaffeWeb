package br.edu.unilab.unicafe.registro.model;

import java.io.IOException;


public class TesteRegistro {

	public static void main(String[] args) {

		Perfil perfil = new Perfil();
		perfil.setListaDeRegistros(Perfil.listaParaTeste());
//		perfil.executar();
		perfil.desfazer();
		//perfil.deletar();
		for(Registro r : perfil.getListaDeRegistros()){
			System.out.println(r);
		}
		

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


