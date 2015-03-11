package br.edu.unilab.unicafe.bloqueio.model;

import java.io.BufferedReader;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.Scanner;

import javax.swing.JOptionPane;

public class PerfilBloqueio {
	private ArrayList<Processo> listaDeProcessosAceitos;

	public ArrayList<Processo> getListaDeAceitos() {
		return this.listaDeProcessosAceitos;
	}

	private ArrayList<Processo> processosAtivos;

	public PerfilBloqueio() {
		this.processosAtivos = new ArrayList<Processo>();
		this.listaDeProcessosAceitos = new ArrayList<Processo>();
	}

	public void addProcesso(Processo processo) {
		this.listaDeProcessosAceitos.add(processo);

	}

	public void setListaDeProcessosAceitos(ArrayList<Processo> processos) {
		this.listaDeProcessosAceitos = processos;
	}

	public void buscaAceitos() {

		this.listaDeProcessosAceitos = new ArrayList<Processo>();
		FileInputStream arquivo;
		try {
			arquivo = new FileInputStream("liberados.txt");
			BufferedReader linhaArquivo = new BufferedReader(
					new InputStreamReader(arquivo));

			while (linhaArquivo.ready()) {
				String linha = linhaArquivo.readLine();
				String[] vDados = linha.split("[,]");
				this.listaDeProcessosAceitos.add(new Processo(vDados[0].replace("\"", "")));
			}
			linhaArquivo.close();

		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}


	}

	public void buscaAtivos() {
		this.processosAtivos = new ArrayList<Processo>();
		Process process;
		Scanner leitor;

		try {

			process = Runtime.getRuntime().exec(" tasklist /v /FO csv");
			leitor = new Scanner(process.getInputStream());

			int i = 0;
			while (leitor.hasNext()) {

				String linha = leitor.nextLine();
				if (i == 0) {
					i++;
					continue;
				}
				String[] vDados = linha.split("[,]");
				this.processosAtivos.add(new Processo(vDados[0].replace("\"",
						"").toString()));

			}

		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

	}

	public void comparaEMata() {

		boolean existeNaLista = false;
		for (Processo processoAtivo : this.processosAtivos) {
			existeNaLista = false;
			for (Processo processoAceito : this.listaDeProcessosAceitos) {
				if (processoAtivo.getImagem()
						.equals(processoAceito.getImagem())) {
					existeNaLista = true;
					//System.out.println(processoAtivo
					//		+ " Existe na lista. Beleza. ");
					break;

				}

			}
			if (!existeNaLista) {
				Process process;
				Scanner leitor;

				try {

					//System.out.println(processoAtivo.getImagem()
					//		+ " N�o existe na lista. Deletaaar.");
					process = Runtime.getRuntime().exec(
							" taskkill /f /im \"" + processoAtivo.getImagem()+"\"");
					
					/*
					Thread janelinha = new Thread(new Runnable() {
						
						@Override
						public void run() {
							JOptionPane.showMessageDialog(
									null,
									);
						}
					});
					
					janelinha.start();
					*/
				//	System.out.println(proc);
					System.out.println("Meu Amor, não pode executar "+ processoAtivo.getImagem());
					leitor = new Scanner(process.getInputStream());

					while (leitor.hasNext()) {
						System.out.println(leitor.nextLine());
					}

				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
			}

		}

	}

	public void mostraProcessos() {
		for (Processo p : this.processosAtivos) {
			System.out.println(p);
		}
	}
}
