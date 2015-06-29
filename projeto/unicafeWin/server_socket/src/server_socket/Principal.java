package server_socket;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintStream;
import java.net.ServerSocket;
import java.net.Socket;

public class Principal {

	public static void main(String[] args) {

		//Cria um servidor na porta 12345, para 100 conexões. 
		try {
			ServerSocket servidor = new ServerSocket(12345, 100);
			while(true){
				//Com o acept no server temos uma conexão de socket. 
				Socket conexao = servidor.accept();
				//Através dos métodos getInputStream() e getOutputStream() vc pode escrever ou ler do servidor. 
				//Então vc instancia PrintStream pra escrever e BuffereReader para ler. 
				PrintStream saida = new PrintStream(conexao.getOutputStream());
				BufferedReader in = new BufferedReader(new InputStreamReader(conexao.getInputStream()));
				//println no saida e readLine no in para escrever e ler respectivamente. 
				saida.println("Ola! Eu sou um server Java!");
				String resposta = in.readLine();
				//Mostrando mensagem vinda do PHP
				System.out.println(resposta);
				conexao.close();
			}
		} catch (IOException e) {
			e.printStackTrace();
		}
	}

}
