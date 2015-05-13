package br.edu.unilab.unicafe.control;

import java.awt.EventQueue;

import br.edu.unilab.unicafe.view.FrameSplash;
import br.edu.unilab.unicafe.view.FrameTelaBloqueio;

public class ClientControl {

	private FrameSplash frameSplash;
	private FrameTelaBloqueio frameTelaBloqueio;
	
	
	public ClientControl(){
		
		EventQueue.invokeLater(new Runnable() {
			
			@Override
			public void run() {

				frameSplash = new FrameSplash();
				frameTelaBloqueio = new FrameTelaBloqueio();
				frameSplash.setVisible(true);
				
				
			}
		});
		
	}
	public static void main(String[] args) {
		ClientControl clientControl = new ClientControl();
		
	}
	
	
}
