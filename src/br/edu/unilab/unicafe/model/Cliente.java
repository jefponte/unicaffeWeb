package br.edu.unilab.unicafe.model;

import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.net.Socket;
import java.net.UnknownHostException;

import javax.swing.JFrame;

import br.edu.unilab.unicafe.view.JanelaClienteBloqueado;
import br.edu.unilab.unicafe.view.JanelaClienteConfig;
import br.edu.unilab.unicafe.view.JanelaClienteDesbloqueio;

public class Cliente {
	private Maquina maquina;
	private Socket conexao;
	private Servidor servidor;
	private ObjectOutputStream output;
	private ObjectInputStream input;
	
	//Janelas
	private JanelaClienteConfig janelaConfig;
	private JanelaClienteBloqueado janelaBloqueado;
	private JanelaClienteDesbloqueio janelaDesbloqueado;
	
	public Cliente(){
		this.servidor = new Servidor();
	}
	public void iniciaCliente(){
		this.maquina = new Maquina();
		this.maquina.preencheComMaquinaLocal();
		this.janelaConfig = new JanelaClienteConfig();
		this.janelaConfig.setDefaultCloseOperation(JFrame.DO_NOTHING_ON_CLOSE);
		this.janelaConfig.setVisible(true);
		this.janelaConfig.setCliente(this);
		janelaBloqueado = new JanelaClienteBloqueado();
		janelaBloqueado.setCliente(this);
		//Pra conectar tem que ter uma string que é o IP do servidor. 
		//Logo o servidor tem que ter IP, o que está na máquina do servidor.

	}
	
	public void conectToServer(){
		Thread conecta = new Thread(new Runnable() {
			
			@Override
			public void run() {
				try {

					conexao = new Socket(servidor.getIp(), 12346);

					janelaBloqueado.setDefaultCloseOperation(JFrame.DO_NOTHING_ON_CLOSE);
					janelaBloqueado.setVisible(true);
					output = new ObjectOutputStream(conexao.getOutputStream());
					//output.flush();
					output.writeObject(maquina.getNome());
					output.flush();
					output.writeObject("Estou conectado e Bloqueado! ");
					output.flush();
					output.writeObject("Meus dados:  "+maquina.toString());
					output.flush();
					Thread frescando = new Thread(new Runnable() {
						
						@Override
						public void run() {
							for(int i = 0; i < 15; i++){
								try {
									Thread.sleep(3000);
									ObjectOutputStream output2 = getOutput();
									try {
										output2.flush();
										output2.writeObject(i+" - Só lembrando que estou conectado!");
										
									} catch (IOException e) {
										e.printStackTrace();
									}
								} catch (InterruptedException e) {
									// TODO Auto-generated catch block
									e.printStackTrace();
								}
								
								//a cada tres segundos vou mandar uma besteira. 
								
							}
							
						}
					});
					frescando.start();
					
					
				} catch (UnknownHostException e) {
					e.printStackTrace();
				} catch (IOException e) {
					e.printStackTrace();
				}	
			}
		});
		conecta.start();


	}
	public void sendStringToServer(String mensagem){
		ObjectOutputStream output2 = getOutput();
		try {
			output2.flush();
			output2.writeObject(mensagem);
			output2.flush();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
	
	public Maquina getMaquina() {
		return maquina;
	}
	public void setMaquina(Maquina maquina) {
		this.maquina = maquina;
	}
	public Socket getConexao() {
		return conexao;
	}
	public void setConexao(Socket conexao) {
		this.conexao = conexao;
	}
	public Servidor getServidor() {
		return servidor;
	}
	public void setServidor(Servidor servidor) {
		this.servidor = servidor;
	}
	public ObjectOutputStream getOutput() {
		return output;
	}
	public void setOutput(ObjectOutputStream output) {
		this.output = output;
	}
	public ObjectInputStream getInput() {
		return input;
	}
	public void setInput(ObjectInputStream input) {
		this.input = input;
	}

	
	

}
