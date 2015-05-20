package br.edu.unilab.unicafe.bloqueio.model;


public class TesteBloqueio {

	public static void main(String[] args) {


		PerfilBloqueio pb = new PerfilBloqueio();
		pb.buscaAceitos();
		//ProcessoDAO dao = new ProcessoDAO();
		//dao.cadastraLista(pb.getListaDeAceitos());
		while(true){
			try {
				pb.buscaAtivos();
				pb.comparaEMata();	
				Thread.sleep(500);
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
		
		
				
		
	}
}
