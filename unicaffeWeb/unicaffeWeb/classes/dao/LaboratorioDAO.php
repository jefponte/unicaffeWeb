<?php




class LaboratorioDAO extends DAO{
	
	
	public function LaboratorioDAO($conexao = null, $tipo = self::TIPO_DEFAULT) {
		parent::DAO($conexao, $tipo);
	}
	
	public function retornaLaboratorios(){
		$lista = array();
		$sql = "SELECT * FROM laboratorio ORDER BY nome_laboratorio LIMIT 10";
		foreach($this->getConexao()->query($sql) as $elemento){
			$laboratorio = new Laboratorio();
			$laboratorio->setNome($elemento['nome_laboratorio']);
			$laboratorio->setId($elemento['id_laboratorio']);
			$lista[] = $laboratorio;
		}
		return $lista;
	}
	
	public function inserir(Laboratorio $laboratorio){
		
		$nome= $laboratorio->getNome();
		return $this->getConexao()->query("INSERT INTO laboratorio(nome_laboratorio) VALUES('$nome')");
		
		
	}
	
}