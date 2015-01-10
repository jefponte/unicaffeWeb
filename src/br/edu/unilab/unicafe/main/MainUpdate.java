package br.edu.unilab.unicafe.main;

import java.awt.Color;
import java.io.BufferedReader;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.nio.channels.FileChannel;

import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;

/**
 * O objetivo dessa classe é aplicar atualização no lado do cliente.
 * 
 * @author jefponte
 *
 */
public class MainUpdate {

	public static void main(String[] args) {
		Thread aplica = new Thread(new Runnable() {

			@Override
			public void run() {
				JFrame janelaDeAtualizacao = new JFrame();
				janelaDeAtualizacao.setSize(300, 300);
				JPanel painel = new JPanel();
				painel.setBackground(Color.red);
				painel.add(new JLabel("Atualizado com sucesso!"));
				janelaDeAtualizacao.add(painel);

				janelaDeAtualizacao
						.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);

				janelaDeAtualizacao.setVisible(true);
				try {
					Thread.sleep(3000);
				} catch (InterruptedException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
				
				
				// Cria channel na origem
				FileChannel oriChannel;
				try {
					oriChannel = new FileInputStream("update\\cliente.jar").getChannel();
					// Cria channel no destino
					FileChannel destChannel = new FileOutputStream(".\\cliente.jar").getChannel();
					// Copia conteúdo da origem no destino
					destChannel.transferFrom(oriChannel, 0, oriChannel.size());

					// Fecha channels
					oriChannel.close();
					destChannel.close();
				} catch (IOException e1) {
					// TODO Auto-generated catch block
					e1.printStackTrace();
				}
				

				try {
					try {
						Thread.sleep(3000);
						Runtime.getRuntime().exec("java -jar cliente.jar");
						System.exit(0);
					} catch (InterruptedException e) {
						// TODO Auto-generated catch block
						e.printStackTrace();
					}
					
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}

				// System.exit(0);
			}
		});
		aplica.start();

	}

}
