package br.edu.unilab.unicaffe.util;

import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;

/**
 * 
 * Classe que serve para guardar LOG, adiciona uma linha de texto em um aruqivo
 * de texto.
 * 
 * @author Jefferson Uchôa Ponte
 *
 */
public class Log {
	/**
	 * Mensagem a ser guardada no arquivo de LOG.
	 */
	private String mensagem;
	/**
	 * Caminho do arquivo de log.
	 */
	private String nomeDoArquivo;

	/**
	 * Passe uma mensagem a ser gravada no arquivo de log.
	 * 
	 * @param String mensagem
	 * @param String nomeArquivo
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
				e.printStackTrace();
			}
		} else {
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
