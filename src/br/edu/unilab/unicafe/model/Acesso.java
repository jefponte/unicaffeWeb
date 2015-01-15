package br.edu.unilab.unicafe.model;

public class Acesso {
	private int id;
	private Usuario usuario;
	private Cliente cliente;
	/**
	 * Tempo que o usuário usou desse acesso. 
	 */
	private int tempoUsado;
	/**
	 * Hora que o acesso se iniciou. 
	 */
	private int horaInicial;
	/**
	 * Esse é o tempo que foi oferecido no início do acesso. 
	 */
	
	private int tempoDisponibilizado;
	private int statusDaConexao;
	public int getId() {
		return id;
	}
	public void setId(int id) {
		this.id = id;
	}
	public Usuario getUsuario() {
		return usuario;
	}
	public void setUsuario(Usuario usuario) {
		this.usuario = usuario;
	}
	public Cliente getCliente() {
		return cliente;
	}
	public void setCliente(Cliente cliente) {
		this.cliente = cliente;
	}
	public int getTempoUsado() {
		return tempoUsado;
	}
	public void setTempoUsado(int tempoUsado) {
		this.tempoUsado = tempoUsado;
	}
	public int getHoraInicial() {
		return horaInicial;
	}
	public void setHoraInicial(int horaInicial) {
		this.horaInicial = horaInicial;
	}
	public int getTempoDisponibilizado() {
		return tempoDisponibilizado;
	}
	public void setTempoDisponibilizado(int tempoDisponibilizado) {
		this.tempoDisponibilizado = tempoDisponibilizado;
	}
	public int getStatusDaConexao() {
		return statusDaConexao;
	}
	public void setStatusDaConexao(int statusDaConexao) {
		this.statusDaConexao = statusDaConexao;
	}
	
	
}
