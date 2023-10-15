package br.edu.unilab.unicaffe.registro.model;

/**
 * Classe criada para manipular registros no reg.exe do Windows.
 * 
 * @author Jefferson Uchôa Ponte
 * 
 *
 */
public class Registro {

	/**
	 * Subchave do registro.
	 */
	private String subchave;
	/**
	 * Nome do registro.
	 */
	private String nome;
	/**
	 * Valor do registro.
	 */
	private String valor;
	/**
	 * Descrição do registro, descreve a alteração que o registro faz no sistema.
	 */
	private String descricao;

	/**
	 * O valor padrão do registro.
	 * 
	 */
	private String valorPadrao;

	/**
	 * 
	 * @return subchave
	 */
	public String getSubchave() {
		return subchave;
	}

	/**
	 * 
	 * @param subchave
	 */
	public void setSubchave(String subchave) {
		this.subchave = subchave;
	}

	/**
	 * 
	 * @return nome do registro
	 */
	public String getNome() {
		return nome;
	}

	/**
	 * 
	 * @param nome
	 *            nome do registro
	 */
	public void setNome(String nome) {
		this.nome = nome;
	}

	/**
	 * 
	 * @return valor do registro
	 */
	public String getValor() {
		return valor;
	}

	/**
	 * 
	 * @param valor
	 *            valor do registro
	 */

	public void setValor(String valor) {
		this.valor = valor;
	}

	/**
	 * 
	 * @return descricao do registro
	 */
	public String getDescricao() {
		return descricao;
	}

	/**
	 * 
	 * @param descricao
	 *            descricao do registro
	 */

	public void setDescricao(String descricao) {
		this.descricao = descricao;
	}

	/**
	 * 
	 * @return valor padrão do registro
	 */

	public String getValorPadrao() {
		return valorPadrao;
	}

	/**
	 * 
	 * @param valorPadrao
	 *            valor padrão do registro
	 */
	public void setValorPadrao(String valorPadrao) {
		this.valorPadrao = valorPadrao;
	}

	/**
	 * 
	 * @return tipo de registro
	 */
	public int getTipo() {
		return tipo;
	}

	/**
	 * 
	 * @param tipo
	 *            de registro
	 */

	public void setTipo(int tipo) {
		this.tipo = tipo;
	}

	/**
	 * Preenche valores padrões do registro
	 */
	public Registro() {
		this.subchave = "";
		this.nome = "";
		this.valor = "";
		this.descricao = "";
		this.valorPadrao = "";

	}

	/**
	 * recebe os valores inseridos
	 * 
	 * @param subchave
	 * @param nome
	 * @param tipo
	 * @param valor
	 * @param valorPadrao
	 * @param descricao
	 */

	public Registro(String subchave, String nome, int tipo, String valor, String valorPadrao, String descricao) {
		this.subchave = subchave;
		this.nome = nome;
		this.valor = valor;
		this.valorPadrao = valorPadrao;
		this.tipo = tipo;
		this.descricao = descricao;

	}

	/**
	 * Alimentar o tipo de registro com uma constante desta classe. Poderá ser
	 * REG_SZ, REG_DWORD, REG_EXPAND_SZ
	 */
	private int tipo;
	/**
	 * Valor não definido
	 */
	public static final int REG_SZ = 0;
	/**
	 * Uma dword é normalmente o dobro de uma word, que por sua vez é normalmente a
	 * unidade natural de operação do processador, sobre a qual as instruções operam
	 * de uma vez só(ou pelo menos deveriam).
	 * 
	 * Utiliza 4bytes(um inteiro de 32bits)
	 * 
	 */
	public static final int REG_DWORD = 1;
	/**
	 * Valor de cadeia de caracteres expansível
	 */
	public static final int REG_EXPAND_SZ = 2;

	@Override
	public String toString() {
		String comando;

		comando = "REG add \"" + this.subchave + "\" /v \"" + this.nome + "\" /t " + tipoToString() + " /d "
				+ valorToString() + " /f";
		return comando;
	}

	/**
	 * 
	 * @return comando com valor pra desfazer as alterações no registro
	 */
	public String toStringDesfazer() {
		String comando;
		comando = "REG add \"" + this.subchave + "\" /v \"" + this.nome + "\" /t " + tipoToString() + " /d "
				+ valorPadraoToString() + " /f";
		return comando;
	}

	/**
	 * 
	 * @return comando para deletar o registro
	 */
	public String toStringDeletar() {
		String comando;
		comando = "REG DELETE \"" + this.subchave + "\" /v \"" + this.nome + "\"  /f";
		return comando;
	}

	/**
	 * 
	 * @return dependendo do tipo de registro se adiciona configurações adicionais
	 *         ou não
	 */
	public String valorToString() {
		switch (this.tipo) {
		case REG_DWORD:
			break;
		case REG_SZ:
			this.valor = "\"" + this.valor + "\"";
			break;
		case REG_EXPAND_SZ:
			this.valor = "\"" + this.valor + "\"";
			break;
		default:
			break;
		}
		return this.valor;
	}

	/**
	 * 
	 * @return configura valores padrões
	 */
	public String valorPadraoToString() {
		switch (this.tipo) {
		case REG_DWORD:
			break;
		case REG_SZ:
			this.valorPadrao = "\"" + this.valorPadrao + "\"";
			break;
		case REG_EXPAND_SZ:
			this.valorPadrao = "\"" + this.valorPadrao + "\"";
			break;
		default:
			break;
		}
		return this.valorPadrao;
	}

	/**
	 * 
	 * @return tipo de registro
	 */

	public String tipoToString() {
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