package br.edu.unilab.unicafe.main;

import com.mysql.fabric.FabricCommunicationException;
import com.mysql.fabric.proto.xmlrpc.XmlRpcClient;

import br.edu.unilab.unicafe.model.Maquina;

public class MaquinaTeste {

	public static void main(String[] args) {
		String hostname = System
				.getProperty("com.mysql.fabric.testsuite.hostname");
		String port = System.getProperty("com.mysql.fabric.testsuite.port");

		XmlRpcClient fabricClient;
		try {
			fabricClient = new XmlRpcClient("http://10.5.5.100:" + port,
					"root", "rootroot");
			

		} catch (FabricCommunicationException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

	}

}
