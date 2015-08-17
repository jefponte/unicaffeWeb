package br.edu.unilab.unicafe.model;

import java.net.InetAddress;
import java.net.NetworkInterface;
import java.net.SocketException;
import java.net.UnknownHostException;

public class Maquina {
	private int id;
	private String nome;
	private String ip;//Isso aqui é pra ser comentado. Não deve ter IP no objeto Maquina. 
	private String enderecoMac;
	private int status;
	private Acesso acesso;
	private Laboratorio laboratorio;
	private boolean cadastrada;
	private String versao;
	
	
	
	
	//kantu tempu ki bu misti.
	
	public Acesso getAcesso(){
		return this.acesso;
	}
	public void setAcesso(Acesso acesso){
		this.acesso = acesso;
	}


	public Maquina(){
		this.laboratorio = new Laboratorio();
		this.laboratorio.setId(0);
		this.laboratorio.setNome("Sem Laboratorio");
		this.acesso = new Acesso();
		this.setVersao("1.0");
		this.setNome("Não Listado");
		this.getAcesso().setStatus(Acesso.STATUS_DISPONIVEL);
	}
	public void preencheComMaquinaLocal() 
	{
		InetAddress ia = null;
		try {
			ia = InetAddress.getLocalHost();
			this.ip = ia.getHostAddress().toString();
			this.nome = ia.getHostName().toString();

			NetworkInterface ni = NetworkInterface.getByInetAddress(ia);
			byte[] mac = ni.getHardwareAddress();
			if(mac == null)
			{
				this.enderecoMac = "Não Informado";
				return;
				
			}
			String macAddress = "";
			for (int i = 0; i < mac.length; i++) {
				macAddress += (String.format("%02X-", mac[i]));
			}
			
			if(macAddress != null && macAddress.length() > 1){
				this.enderecoMac = macAddress.substring(0, macAddress.length() - 1);
			}
			this.enderecoMac = "Não Informado";
		} catch (UnknownHostException e) {
			e.printStackTrace();
		} catch (SocketException e) {
			e.printStackTrace();
		}

	}

	public String getNome() {
		return nome;
	}

	public void setNome(String nome) {
		this.nome = nome;
	}

	public String getIp() {
		return ip;
	}

	public void setIp(String ip) {
		this.ip = ip;
	}

	public String getEnderecoMac() {
		return enderecoMac;
	}

	public void setEnderecoMac(String enderecoMac) {
		this.enderecoMac = enderecoMac;
	}

	public int getStatus() {
		return status;
	}

	public void setStatus(int status) {
		this.status = status;
	}

	@Override
	public String toString() {

		return "Nome: " + this.nome + " | ip: " + this.ip + " | MAC: "
				+ this.enderecoMac + " | Status: " + this.status;

	}
	public static final int STATUS_DISPONIVEL = 0;
	public static final int STATUS_OCUPADA = 1;
	public static final int STATUS_DESCONECTADA = 2;
	public static final int STATUS_ADMIN = 3;
	public static final int STATUS_UPDATE = 4;

	public static String statusString(int status){
		String strStatus = "";

		switch (status) {
		case STATUS_DESCONECTADA:
			strStatus = "Desconectada";
			break;

		case STATUS_OCUPADA:
			strStatus = "Ocupada";
			break;
		case STATUS_DISPONIVEL:
			strStatus = "Disponível";
			break;
		case STATUS_ADMIN:
			strStatus = "Administrador";
			break;
		case STATUS_UPDATE:
			strStatus = "Atualizando";
			break;
		default:
			break;
		}
		return strStatus;
	}


	public int getId() {
		return id;
	}
	public void setId(int id) {
		this.id = id;
	}
	public Laboratorio getLaboratorio() {
		return laboratorio;
	}
	public void setLaboratorio(Laboratorio laboratorio) {
		this.laboratorio = laboratorio;
	}
	public boolean isCadastrada() {
		return cadastrada;
	}
	public void setCadastrada(boolean cadastrada) {
		this.cadastrada = cadastrada;
	}
	public String getVersao() {
		return versao;
	}
	public void setVersao(String versao) {
		this.versao = versao;
	}
}
