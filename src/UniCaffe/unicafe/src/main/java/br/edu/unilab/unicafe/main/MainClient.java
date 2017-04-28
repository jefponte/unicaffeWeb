package br.edu.unilab.unicafe.main;



import java.io.File;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.io.RandomAccessFile;
import java.nio.channels.FileLock;
import br.edu.unilab.unicafe.controller.ClienteController;



/**
 * 
 * @author Jefferson
 *
 */

public class MainClient {

	public static void main(String[] args) {
		
		File f = new File(".lock");
		FileLock lock = null;
		try {
			f.createNewFile();
			lock = new RandomAccessFile(f, "rw").getChannel().tryLock();
		} catch (FileNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

		if (lock != null) {
			ClienteController controle = new ClienteController();
			controle.iniciaCliente();
			try {
				Thread.sleep(10000);
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		} else {
			System.out.println("Ja ha uma instancia rodando");
		}
		
		
		

//		Perfil perfilBloqueio = new Perfil();
//		perfilBloqueio.setListaDeRegistros(Perfil.listaParaBloqueio());
//		perfilBloqueio.desfazer();
//
//		
//		
	}

}
