package br.edu.unilab.unicafe.registro.model;

import java.util.ArrayList;
import java.util.Scanner;

public class Teste {

	
	public static void main(String[] args) {
		
		Perfil perfilBloqueio = new Perfil();
		perfilBloqueio.setListaDeRegistros(Perfil.listaParaTeste());
		perfilBloqueio.desfazer();		

	}
}
