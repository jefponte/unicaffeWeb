package br.edu.unilab.unicafe.registro.model;

public class TestRegistro {

	public static void main(String[] args) {

		Perfil p = new Perfil();
		p.setListaDeRegistros(Perfil.listaParaBloqueio());
		p.desfazer();
		
		
	}

}
