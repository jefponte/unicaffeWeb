package br.edu.unilab.unicaffe.main;

import java.io.File;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.io.RandomAccessFile;
import java.nio.channels.FileLock;

import br.edu.unilab.unicaffe.controller.ClienteController;

/**
 * 
 * @author Jefferson Uchôa Ponte Classe responsável pelo inicialização do
 *         Unicaffé Cliente
 */

public class MainClient {

	private static RandomAccessFile randomAccessFile;

	/**
	 * Método que inicia o processo.
	 * 
	 * @param args
	 */
	public static void main(String[] args) {

		File f = new File(".lock");
		FileLock lock = null;
		try {
			f.createNewFile();
			randomAccessFile = new RandomAccessFile(f, "rw");
			lock = randomAccessFile.getChannel().tryLock();
		} catch (FileNotFoundException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		}
		if (lock != null) {
			ClienteController controle = new ClienteController();
			controle.iniciaCliente();
		}
	}

}
