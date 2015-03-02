package br.edu.unilab.unicafe.log;

import java.io.IOException;
import java.util.logging.FileHandler;
import java.util.logging.Level;
import java.util.logging.Logger;
import java.util.logging.SimpleFormatter;

/**
 * Objetivo do log � escrever algo em um arquivo e fechar o arquivo. Ent�o, n�o
 * vamos complicar. S� instancia-se para registrar.
 * 
 * @author dtiusr
 *
 */
public class Log {

	

	
	public Log(String mensagem) {

		Logger logger = Logger.getLogger("MyLog");
		FileHandler fh;

		try {

			// This block configure the logger with handler and formatter
			fh = new FileHandler("log.log", true);
			// fh = new FileHandler("MyLogFile.log", 10000, 5); 10000 bytes cada
			// arquivo em 5 arquivos
			logger.addHandler(fh);
			logger.setLevel(Level.ALL);
			SimpleFormatter formatter = new SimpleFormatter();
			fh.setFormatter(formatter);

			// the following statement is used to log any messages
			logger.log(Level.FINEST, mensagem);
			// os n�veis s�o:

		} catch (SecurityException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		}

	}

}
