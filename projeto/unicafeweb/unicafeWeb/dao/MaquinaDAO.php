<?php

class MaquinaDAO extends DAO{
	
	public function retornaMaquinas(){
		$sql = "SELECT * FROM maquina";
		$stmt = $this->getConexao()->query($sql);
		$listaDeMaquinas = array();
		foreach($stmt as $elemento){
			$maquina = new Maquina();
			$maquina->setNome($elemento['nome_pc']);
			$listaDeMaquinas[] = $maquina;
			
		}
		return $listaDeMaquinas;
	}
	
}