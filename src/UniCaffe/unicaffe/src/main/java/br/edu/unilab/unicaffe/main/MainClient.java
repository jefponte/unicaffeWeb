package br.edu.unilab.unicaffe.main;



import java.io.File;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.io.RandomAccessFile;
import java.nio.channels.FileLock;

import br.edu.unilab.unicaffe.controller.ClienteController;



/**
 * 
 * @author Jefferson
 *
 */

public class MainClient {

	private static RandomAccessFile randomAccessFile;

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
			try {
				Thread.sleep(10000);
			} catch (InterruptedException e) {
				e.printStackTrace();
			}
		}
		
			
	}

}
