package br.edu.unilab.unicafe.bloqueio.model;

public class Processo {

	public Processo(String imagem) {
		this.imagem = imagem;
		// TODO Auto-generated constructor stub
	}
	private String imagem;

	public String getImagem() {
		return imagem;
	}

	public void setImagem(String imagem) {
		this.imagem = imagem;
	}
	
	@Override
	public String toString() {
		
		return this.imagem;
	}
	
	
}
