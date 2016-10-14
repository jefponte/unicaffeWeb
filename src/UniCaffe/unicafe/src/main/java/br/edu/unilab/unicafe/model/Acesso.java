package br.edu.unilab.unicafe.model;

public class Acesso {
	
	
	private int id;
	private int tempoUsado;
	private long horaInicial;
	private Usuario usuario;
	private int tempoDisponibilizado;
	private int status;
	private int idMaquina;
	private String ip;
	public static final int STATUS_EM_UTILIZACAO = 0;
	public static final int STATUS_DISPONIVEL = 1;

	
	public Acesso() {
		this.status = STATUS_DISPONIVEL;
		this.usuario = new Usuario();
		this.setTempoUsado(0);
	}
	public void contar(){
		this.status = STATUS_EM_UTILIZACAO;
		Thread contando = new Thread(new Runnable() {
			@Override
			public void run() {
				while(status == STATUS_EM_UTILIZACAO){
					try {
						Thread.sleep(1000);
						tempoUsado++;
					} catch (InterruptedException e) {
						
					}
				}
			}
		});
		contando.start();
	}
	public void pararDeContar(){
		this.status = STATUS_DISPONIVEL;
	}
	
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
	public int getStatus() {
		return status;
	}
	public void setStatus(int statusDaConexao) {
		this.status = statusDaConexao;
	}
	
	
	@Override
	public String toString() {
		String acesso = "usuario: "+this.usuario.getId()+", hora Acesso Long: "+this.horaInicial+", Tempo Usado: "+this.tempoUsado+", "+this.tempoDisponibilizado+"BLZ\n";
		return acesso;
	}
	public int getIdMaquina() {
		return idMaquina;
	}
	public void setIdMaquina(int idMaquina) {
		this.idMaquina = idMaquina;
	}
	public String getIp() {
		return ip;
	}
	public void setIp(String ip) {
		this.ip = ip;
	}

	
}
