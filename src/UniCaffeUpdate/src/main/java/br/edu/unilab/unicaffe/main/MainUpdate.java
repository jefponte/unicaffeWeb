package br.edu.unilab.unicaffe.main;

import br.edu.unilab.unicaffe.update.Update;

/**
 * 
 * @author Jefferson Uchôa Ponte Inicia o aplicativo de atualização do Unicaffé
 *         Cliente
 *
 */

public class MainUpdate {
	/**
	 * Método que inicia o processo. 
	 * @param args
	 */
	public static void main(String[] args) {
		Update update = new Update();
		update.iniciaUpdate();
	}

}