package br.edu.unilab.unicafe.registro.model;


public class Registro {
	
	
	private int id;
	private String subchave;
	private String nome;
	private String valor;
	private String descricao;
	
	private String valorPadrao;
	
	public int getId() {
		return id;
	}



	public void setId(int id) {
		this.id = id;
	}






	public String getSubchave() {
		return subchave;
	}






	public void setSubchave(String subchave) {
		this.subchave = subchave;
	}






	public String getNome() {
		return nome;
	}






	public void setNome(String nome) {
		this.nome = nome;
	}






	public String getValor() {
		return valor;
	}






	public void setValor(String valor) {
		this.valor = valor;
	}






	public String getDescricao() {
		return descricao;
	}






	public void setDescricao(String descricao) {
		this.descricao = descricao;
	}






	public String getValorPadrao() {
		return valorPadrao;
	}






	public void setValorPadrao(String valorPadrao) {
		this.valorPadrao = valorPadrao;
	}






	public int getTipo() {
		return tipo;
	}






	public void setTipo(int tipo) {
		this.tipo = tipo;
	}





	public Registro(){
		this.subchave = "";
		this.nome = "";
		this.valor = "";
		this.descricao = "";
		this.valorPadrao = "";
		
	}

	public Registro(String subchave, String nome, int tipo, String valor, String valorPadrao, String descricao){
		this.subchave = subchave;
		this.nome = nome;
		this.valor = valor;
		this.valorPadrao = valorPadrao;
		this.tipo = tipo;
		this.descricao = descricao;

	}
	
	/**
	 * Alimentar o tipo com uma constante. 
	 */
	private int tipo;
	
	public static final int REG_SZ = 0;
	public static final int REG_DWORD = 1;
	public static final int REG_EXPAND_SZ = 2;
	
	
	
	
	
	
	
	
	//REG add HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\System /v HideFastUserSwitching /t REG_DWORD /d 0 /f
	//HKLM\
	
	
	@Override
	public String toString() {
		String comando;
		
		comando = "REG add \""+this.subchave+"\" /v \""+this.nome+"\" /t "+tipoToString()+" /d "+valorToString()+" /f";
		return comando;
	}
	public String toStringDesfazer(){
		String comando;
		comando = "REG add \""+this.subchave+"\" /v \""+this.nome+"\" /t "+tipoToString()+" /d "+valorPadraoToString() +" /f";
		return comando;
	}
	public String toStringDeletar() {
		String comando;
		comando = "REG DELETE \""+this.subchave+"\" /v \""+this.nome+"\"  /f";
		return comando;
	}
	public String valorToString(){
		switch (this.tipo) {
		case REG_DWORD:
			break;

		case REG_SZ:
			this.valor = "\""+this.valor+"\"";
			break;
		case REG_EXPAND_SZ:
			this.valor = "\""+this.valor+"\"";
			break;
		default:
			break;
		}
		return this.valor;
	}
	
	
	public String valorPadraoToString(){
		switch (this.tipo) {
		case REG_DWORD:
			break;

		case REG_SZ:
			this.valorPadrao = "\""+this.valorPadrao+"\"";
			break;
		case REG_EXPAND_SZ:
			this.valorPadrao = "\""+this.valorPadrao+"\"";
			break;
		default:
			break;
		}
		return this.valorPadrao;
	}
	public String tipoToString(){

		String strTipo = "";
		switch (this.tipo) {
		case REG_DWORD:
			strTipo = "REG_DWORD";
			break;

		case REG_EXPAND_SZ:
			strTipo = "REG_EXPAND_SZ";
			break;
			
		case REG_SZ:
			strTipo = "REG_SZ";
			break;
		default:
			strTipo = "REG_DWORD";
			break;
		}
		return strTipo;
		
	}
	
	
	
	



}
