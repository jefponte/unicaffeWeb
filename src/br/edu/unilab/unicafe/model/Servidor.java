package br.edu.unilab.unicafe.model;

import java.io.EOFException;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.ArrayList;

import javax.swing.JFrame;
import javax.swing.SwingUtilities;

import br.edu.unilab.unicafe.view.JanelaServidor;

public class Servidor {

	private Maquina maquina;
	private String ip;
	private ServerSocket serverSocket;
	private ArrayList<Cliente> listaDeClientes;
	private JanelaServidor janelaServidor;

	public Servidor(){
		this.listaDeClientes = new ArrayList<Cliente>();
	}
	
	public void iniciaServidor() {
		this.janelaServidor = new JanelaServidor();
		this.janelaServidor.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		this.janelaServidor.setVisible(true);
		this.janelaServidor.print("Iniciar Servidor.");
		this.iniciarServico();
	}

	public void iniciarServico() {
		this.maquina = new Maquina();
		this.maquina.preencheComMaquinaLocal();
		
		Thread esperandoConexao = new Thread(new Runnable() {
			@Override
			public void run() {
				try {
					serverSocket = new ServerSocket(12346, 100);
					while(true){
						try{
							//Espera conexoes
							janelaServidor.println("Servidor iniciado, esperando Conexões. ");
							janelaServidor.println("Dados da Máquina do Servidor:  "+maquina);
							
							Socket conexao = serverSocket.accept();
							//pra cadaa conexão que chegar 
							//vou abrir uma trhead pra que fique
							janelaServidor.println("Nova Conexão feita. ");
							Cliente cliente = new Cliente();
							cliente.setConexao(conexao);
							Maquina maquinaDoCliente = new Maquina();
							maquinaDoCliente.setIp(conexao.getInetAddress().toString());

							//ObjectInputStream input = new ObjectInputStream(conexao.getInputStream());
							
							cliente.setMaquina(maquinaDoCliente);
							listaDeClientes.add(cliente);
							
							processandoConexao(cliente);
							
							
							//Sempre escutando o cliente. 
							//nessa versão a conexão estará disponível 
							//pra qualquer máquina. 
							
						}
						catch(EOFException eofException){
							
						}
					}
				} catch (IOException e) {
					e.printStackTrace();
				}
				

			}
		});
		esperandoConexao.start();

	}

	public void processandoConexao(final Cliente cliente){
		final Socket conexao = cliente.getConexao();
		
		
		try {
			cliente.setInput(new ObjectInputStream(conexao.getInputStream()));
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		janelaServidor.println("Vou escrever tudo que esse cliente mandar.");
		Thread processando = new Thread(new Runnable() {
			
			@Override
			public void run() {
				boolean flag = true;
				while(true){
					
					try{
						ObjectInputStream input = cliente.getInput();
						String mensagem = (String)  input.readObject();
						
						if(flag){
							//vamos as apresentações. 
							//primeiro contato vc diz o seu nome. 
							flag = false;
							cliente.getMaquina().setNome(mensagem);
							
						}
						
						janelaServidor.println("Cliente "+cliente.getMaquina().getNome()+">> "+mensagem);
						
					}catch(ClassNotFoundException | IOException classNotFoundException){
						janelaServidor.println(cliente.getMaquina().getNome()+">> "+"Conexão terminou");
						break;
					}
					
				}
			}
		});
		processando.start();
	}
	public Maquina getMaquina() {
		return maquina;
	}

	public void setMaquina(Maquina maquina) {
		this.maquina = maquina;
	}

	public ServerSocket getServerSocket() {
		return serverSocket;
	}

	public void setServerSocket(ServerSocket serverSocket) {
		this.serverSocket = serverSocket;
	}

	public ArrayList<Cliente> getListaDeClientes() {
		return listaDeClientes;
	}

	public void setListaDeClientes(ArrayList<Cliente> listaDeClientes) {
		this.listaDeClientes = listaDeClientes;
	}

	public String getIp() {
		return ip;
	}

	public void setIp(String ip) {
		this.ip = ip;
	}

}
