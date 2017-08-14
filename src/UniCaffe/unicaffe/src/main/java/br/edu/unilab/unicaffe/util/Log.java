package br.edu.unilab.unicaffe.util;

import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Date;

public class Log {

	private String mensagem;
	private String nomeDoArquivo;
	private String path;

	public Log(String mensagem) {
		this.mensagem = mensagem;
		this.path = "log\\";
		DateFormat dateFormat = new SimpleDateFormat("dd-MM-yyyy_HH-mm-ss");
		Date date = new Date();
		this.nomeDoArquivo = "log_logado.txt";
		File arquivo = new File(this.nomeDoArquivo);
		if (!arquivo.exists()) {
			try {
				arquivo.createNewFile();

				// construtor que recebe o objeto do tipo arquivo
				// FileWriter fw = new FileWriter( arquivo );

				// construtor que recebe também como argumento se o conteúdo
				// será acrescentado
				// ao invés de ser substituído (append)
				FileWriter fw = new FileWriter(arquivo, true);
				// construtor recebe como argumento o objeto do tipo FileWriter
				BufferedWriter bw = new BufferedWriter(fw);
				// escreve o conteúdo no arquivo
				bw.write(this.mensagem);

				// quebra de linha
				bw.newLine();
				// fecha os recursos
				bw.close();
				fw.close();

			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
		
		
		else
		
		{
			try {

				// construtor que recebe o objeto do tipo arquivo
				// FileWriter fw = new FileWriter( arquivo );

				// construtor que recebe também como argumento se o conteúdo
				// será acrescentado
				// ao invés de ser substituído (append)
				FileWriter fw = new FileWriter(arquivo, true);
				// construtor recebe como argumento o objeto do tipo FileWriter
				BufferedWriter bw = new BufferedWriter(fw);
				// escreve o conteúdo no arquivo
				bw.write(this.mensagem);

				// quebra de linha
				bw.newLine();
				// fecha os recursos
				bw.close();
				fw.close();

			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			
			
			
		}

	}
}
