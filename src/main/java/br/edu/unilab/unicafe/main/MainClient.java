package br.edu.unilab.unicafe.main;

import java.awt.EventQueue;

import br.edu.unilab.unicafe.model.Cliente;
import br.edu.unilab.unicafe.view.FrameClientBloqueado;

/**
 * 
 * @author Jefferson
 *
 */

public class MainClient {

	public static void main(String[] args) {
		
		EventQueue.invokeLater(new Runnable() {

			@Override
			public void run() {
				Cliente cliente = new Cliente();
				FrameClientBloqueado bloqueado = new FrameClientBloqueado();
				bloqueado.setAlwaysOnTop(true);
				bloqueado.setVisible(true);
				bloqueado.getLabelMensagem().setText("");
				bloqueado.setVisible(true);
				bloqueado.setVisible(true);
				
				cliente.setFrameClienteBloqueado(bloqueado);
				cliente.iniciaCilente();
				
			}
		});

		
		
	}

}
