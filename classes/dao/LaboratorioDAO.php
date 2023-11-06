<?php

/**
 * @author Jefferson Uchôa Ponte
 * Gerencia persistência de objetos laboratórios no banco de dados. 
 */
class LaboratorioDAO extends DAO{
	
	
    /**
     * @param PDO|UniCaffe $conexao
     * @param int $tipo
     */
	public function __construct($conexao = null, $tipo = self::TIPO_DEFAULT) {
		parent::__construct($conexao, $tipo);
	}
	/**
	 * Retorna uma lista de laboratórios do banco de dados. 
	 * @return Laboratorio[]
	 */
	public function retornaLaboratorios(){
		$lista = array();
		$sql = "SELECT * FROM laboratorio ORDER BY nome_laboratorio LIMIT 40";
		foreach($this->getConexao()->query($sql) as $elemento){
			$laboratorio = new Laboratorio();
			$laboratorio->setNome($elemento['nome_laboratorio']);
			$laboratorio->setId($elemento['id_laboratorio']);
			$lista[] = $laboratorio;
		}
		return $lista;
	}
	/**
	 * @param Laboratorio $laboratorio
	 * @return PDOStatement
	 * Insere um laboratório no banco de dados. 
	 */
	public function inserir(Laboratorio $laboratorio){
		$nome= $laboratorio->getNome();
		return $this->getConexao()->query("INSERT INTO laboratorio(nome_laboratorio) VALUES('$nome')");
	}
	
	public function deletar(Laboratorio $laboratorio){
	    $id = intval($laboratorio->getId());
	    $this->getConexao()->exec("DELETE FROM perfil_laboratorio WHere id_laboratorio = $id");
	    $this->getConexao()->exec("DELETE FROM administrador WHere id_laboratorio = $id");
	    $this->getConexao()->exec("DELETE FROM laboratorio_maquina WHere id_laboratorio = $id");
	    return $this->getConexao()->exec("DELETE FROM laboratorio WHere id_laboratorio = $id");
	}
	
}