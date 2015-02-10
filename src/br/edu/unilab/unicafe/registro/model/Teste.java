package br.edu.unilab.unicafe.registro.model;

import java.io.IOException;
import java.util.ArrayList;
import java.util.Scanner;

public class Teste {

	
	public static void main(String[] args) {
		
		Perfil perfilBloqueio = new Perfil();
		perfilBloqueio.setListaDeRegistros(Perfil.listaParaBloqueio());
		perfilBloqueio.desfazer();	

	}
}
