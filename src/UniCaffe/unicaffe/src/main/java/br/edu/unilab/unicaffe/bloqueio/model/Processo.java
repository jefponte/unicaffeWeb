package br.edu.unilab.unicaffe.bloqueio.model;

public class Processo {

	/**
	 * Nome do processo.
	 * Por exemplo: chrome.exe
	 * Está associado ao nome do arquivo que executou esse processo. 
	 */
	
	private String imagem;
	private String executablePath;
	private String processId;
	
	
	public Processo(String imagem) {
		this.imagem = imagem;
		// TODO Auto-generated constructor stub
	}
	
	public Processo(String imagem, String executablePath, String processId){
		setImagem(imagem);
		setExecutablePath(executablePath);
		setProcessId(processId);
		
	}
	
	public String getImagem() {
		return imagem;
	}

	public void setImagem(String imagem) {
		this.imagem = imagem;
	}
	
	@Override
	public String toString() {
		return this.executablePath+","+this.imagem+","+this.processId;
	}

	public String getExecutablePath() {
		return executablePath;
	}

	public void setExecutablePath(String executablePath) {
		this.executablePath = executablePath;
	}

	public String getProcessId() {
		return processId;
	}

	public void setProcessId(String processId) {
		this.processId = processId;
	}
	@Override
	public boolean equals(Object obj) {
		Processo processo = (Processo)obj;
		if((processo.getImagem().toLowerCase().equals(this.getImagem().toLowerCase())) && (processo.getExecutablePath().toLowerCase().equals(this.executablePath.toLowerCase()))){
			return true;
		}else{
			return false;
		}
	}
	
}
