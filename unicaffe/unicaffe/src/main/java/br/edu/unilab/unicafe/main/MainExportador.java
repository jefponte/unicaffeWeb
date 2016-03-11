package br.edu.unilab.unicafe.main;

import java.util.Scanner;

public class MainExportador {
	public static final int COMANDO_EXPORTAR = 1;
	public static final int COMANDO_IMPORTAR = 2;
	
	
	public static void main(String[] args) {
			
		Scanner scanner = new Scanner(System.in);
		int comando;
		System.out.println("Digite "+COMANDO_EXPORTAR+" para exportar e "+COMANDO_IMPORTAR+" exportar. Após a operação o programa será encerrado:");
		comando = scanner.nextInt();
		switch (comando) {
		case COMANDO_EXPORTAR:
			System.out.println("Iniciando exportacao.");
			
			break;
		case COMANDO_IMPORTAR:
			System.out.println("Iniciando Importacao.");
			
			break;
		default:
			System.out.println("Comando nao localizado");
			break;
		}
		
	}

}
