package br.edu.unilab.unicaffe.bloqueio.model;

/**
 * Esta classe mapea processos do sistema operacional.
 * 
 * @author Jefferson Uchôa Ponte
 *
 */
public class Processo {

	/**
	 * Nome do processo. Por exemplo: chrome.exe Está associado ao nome do arquivo
	 * que executou esse processo.
	 */
	private String imagem;
	/**
	 * Caminho do diretório onde o processo é executado.
	 */
	private String executablePath;
	/**
	 * Id do processo no sistema operacional.
	 */
	private String processId;

	/**
	 * Constrói um objeto processo utilizando imagem, path e ID
	 * 
	 * @param imagem
	 */

	public Processo(String imagem, String executablePath, String processId) {
		setImagem(imagem);
		setExecutablePath(executablePath);
		setProcessId(processId);

	}

	/**
	 * Constrói um objeto processo utilizando imagem
	 * 
	 * @param imagem
	 * @param executablePath
	 */
	public Processo(String imagem, String executablePath) {
		setImagem(imagem);
		setExecutablePath(executablePath);
		setProcessId("0");

	}

	/**
	 * 
	 * @return imagem do processo.
	 */
	public String getImagem() {
		return imagem;
	}

	/**
	 * Atribui a imagem ao processo.
	 * 
	 * @param imagem
	 */
	public void setImagem(String imagem) {
		this.imagem = imagem;
	}

	@Override
	public String toString() {
		return this.executablePath + "," + this.imagem + "," + this.processId;
	}

	/**
	 * 
	 * @return path do processo.
	 */
	public String getExecutablePath() {
		return executablePath;
	}

	/**
	 * 
	 * @param executablePath
	 */

	public void setExecutablePath(String executablePath) {
		this.executablePath = executablePath;
	}

	/**
	 * 
	 * @return id do processo
	 */
	public String getProcessId() {
		return processId;
	}

	/**
	 * 
	 * @param processId
	 */
	public void setProcessId(String processId) {
		this.processId = processId;
	}

	@Override
	public boolean equals(Object obj) {
		Processo processo = (Processo) obj;
		if ((processo.getImagem().toLowerCase().equals(this.getImagem().toLowerCase()))
				&& (processo.getExecutablePath().toLowerCase().equals(this.executablePath.toLowerCase()))) {
			return true;
		}
		return false;
	}
}
