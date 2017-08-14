package br.edu.unilab.unicaffe.bloqueio.model;

import java.io.IOException;

import br.edu.unilab.unicaffe.registro.model.Perfil;

public class TesteRegistro {

	
	public static void main(String[] args) {
		Perfil perfilTemporario = new Perfil();				
		perfilTemporario.setListaDeRegistros(Perfil.perfilTemporarioExecucao());

		perfilTemporario.desfazer();
		
		try {
			Runtime.getRuntime().exec(" taskkill /f /im explorer.exe");
			Thread.sleep(1000);
			Runtime.getRuntime().exec("explorer.exe");
			
		} catch (IOException | InterruptedException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		perfilTemporario.deletar();
		
		Perfil perfilTemporarioDesativado = new Perfil();
		perfilTemporarioDesativado.setListaDeRegistros(Perfil.perfilTemporarioDesativado());
		perfilTemporarioDesativado.executar();
		
		try {
			Runtime.getRuntime().exec(" taskkill /f /im explorer.exe");
			Thread.sleep(1000);
			Runtime.getRuntime().exec("explorer.exe");
			
		} catch (IOException | InterruptedException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

		
	}
}
