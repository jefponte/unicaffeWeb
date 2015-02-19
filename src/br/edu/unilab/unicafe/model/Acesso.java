package br.edu.unilab.unicafe.model;

public class Acesso {
	private int id;
	private Usuario usuario;
	private Thread contando;

	public static final int STATUS_RODANDO = 0;
	public static final int STATUS_ENCERRADO = 1;
	
	/**
	 * Tempo que o usuário usou desse acesso. 
	 */
	private int tempoUsado;
	/**
	 * Hora que o acesso se iniciou. 
	 */
	private long horaInicial;
	private Maquina maquina;
	private Cliente cliente;
	
	public Cliente getCliente() {
		return cliente;
	}
	public void setCliente(Cliente cliente) {
		this.cliente = cliente;
	}
	/**
	 * Esse é o tempo que foi oferecido no início do acesso. 
	 */
	public Acesso() {
		this.setTempoUsado(0);
	}
	public void contar(){
		this.contando = new Thread(new Runnable() {
			
			@Override
			public void run() {
				while(statusDaConexao == STATUS_RODANDO){
					try {
						Thread.sleep(1000);
						tempoUsado++;
					} catch (InterruptedException e) {
						// TODO Auto-generated catch block
						//e.printStackTrace();
					}
				}
			}
		});
		contando.start();
	}
	public void pararDeContar(){
		this.statusDaConexao = STATUS_ENCERRADO;
		
	}
	
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
	public int getTempoUsado() {
		return tempoUsado;
	}
	public void setTempoUsado(int tempoUsado) {
		this.tempoUsado = tempoUsado;
	}
	public long getHoraInicial() {
		return horaInicial;
	}
	public void setHoraInicial(long l) {
		this.horaInicial = l;
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
	public Maquina getMaquina() {
		return maquina;
	}
	public void setMaquina(Maquina maquina) {
		this.maquina = maquina;
	}
	
	
	@Override
	public String toString() {
		String acesso = "usuario: "+this.usuario.getId()+", Maquina  - "+this.maquina.getId()+", hora Acesso Long: "+this.horaInicial+", Tempo Usado: "+this.tempoUsado+", "+this.tempoDisponibilizado+"BLZ\n";
		return acesso;
	}

	
}
