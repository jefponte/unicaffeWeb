package br.edu.unilab.unicafe.main;

import br.edu.unilab.unicafe.bloqueio.model.PerfilBloqueio;
import br.edu.unilab.unicafe.bloqueio.model.Processo;

public class MainTeste {

	public static void main(String[] args) {
	
		PerfilBloqueio perfil = new PerfilBloqueio();
//		perfil.buscaAceitos();

		perfil.buscaAtivos();
		
		for(Processo p : perfil.getProcessosAtivos()){
			System.out.println(p);
		}
		
	}

}
