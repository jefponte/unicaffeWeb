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

	/**
	 * Passe uma mensagem a ser gravada no arquivo bloqueados.
	 * @param mensagem
	 */
	public Log(String mensagem, String nomeArquivo) {
		this.nomeDoArquivo = nomeArquivo;
		
		this.mensagem = mensagem;

		
		File arquivo = new File(this.nomeDoArquivo);
		if (!arquivo.exists()) {
			try {
				arquivo.createNewFile();
				FileWriter fw = new FileWriter(arquivo, true);
				BufferedWriter bw = new BufferedWriter(fw);
				bw.write(this.mensagem);
				bw.newLine();
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

				FileWriter fw = new FileWriter(arquivo, true);
				BufferedWriter bw = new BufferedWriter(fw);
				bw.write(this.mensagem);
				bw.newLine();
				bw.close();
				fw.close();

			} catch (IOException e) {
				e.printStackTrace();
			}

		}

	}
}
