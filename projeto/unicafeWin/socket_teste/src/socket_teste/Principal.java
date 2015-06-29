package socket_teste;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintStream;
import java.net.ServerSocket;
import java.net.Socket;

public class Principal {

	
	
	public static void main(String[] args) {
		try {
			ServerSocket serverSocket = new ServerSocket(27289, 100);
			while(true){
				Socket cliente = serverSocket.accept();
				PrintStream ps = new PrintStream(cliente.getOutputStream());
				BufferedReader in = new BufferedReader(new InputStreamReader(cliente.getInputStream()));

				ps.println("<html>"
						+ "<header><style>"
						+ "body{background-color:#FF9999;}"
						+ ""
						+ ""
						+ "</style></header>"
						+ ""
						+ "<h1>Servidor Funcionando!</h1>"
						+ "<form action=\"\" method=\"post\">"
						+ "<input type=\"text\" name=\"nome\" />"
						+ "<input type=\"submit\" />" 
						+"</form>"
						+ "</html>");
				
				String mensagem = "";
				String completo = "";
				while((mensagem = in.readLine()) != null){
					completo += mensagem;
					System.out.println("Pedaço: "+mensagem);
						if(mensagem.equals(""))
							break;
				}
				cliente.close();
				System.out.println("Completo: "+completo);
				
			}
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
}
