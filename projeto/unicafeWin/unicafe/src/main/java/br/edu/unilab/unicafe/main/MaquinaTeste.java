package br.edu.unilab.unicafe.main;

import br.edu.unilab.unicafe.model.Maquina;

public class MaquinaTeste {

	public static void main(String[] args) {
		Maquina m = new Maquina();
		m.preencheComMaquinaLocal();
		System.out.println(m.getEnderecoMac());

	}

}
