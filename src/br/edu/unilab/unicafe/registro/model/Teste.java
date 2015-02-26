package br.edu.unilab.unicafe.registro.model;


public class Teste {

	
	public static void main(String[] args) {
		
		Perfil perfilBloqueio = new Perfil();
		perfilBloqueio.setListaDeRegistros(Perfil.listaParaBloqueio());
		perfilBloqueio.desfazer();	

	}
}
