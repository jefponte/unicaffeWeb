package br.edu.unilab.unicaffe.model;
import java.io.InputStream;
import java.io.OutputStream;
import java.net.Socket;


public class Cliente {
	private Socket conexao;
	private Maquina maquina;
	private OutputStream saida;
	private InputStream entrada;
	
	public Cliente(){
		setMaquina(new Maquina());
		
	}
	
	public Socket getConexao() {
		return conexao;
	}
	public void setConexao(Socket conexao) {

		this.conexao = conexao;
	}
	public Maquina getMaquina() {
		return maquina;
	}
	public void setMaquina(Maquina maquina) {
		this.maquina = maquina;
	}
	public OutputStream getSaida() {
		return saida;
	}
	public void setSaida(OutputStream saida) {
		this.saida = saida;
	}
	public InputStream getEntrada() {
		return entrada;
	}
	public void setEntrada(InputStream entrada) {
		this.entrada = entrada;
	}
	
	
}
