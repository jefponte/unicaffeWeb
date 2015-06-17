<?php

class MaquinaDAO extends DAO{
	
	public function retornaMaquinas(){
		$sql = "SELECT * FROM maquina";
		$stmt = $this->getConexao()->query($sql);

		$listaDeMaquinas = array();
		foreach($stmt as $elemento){

			$maquina = new Maquina();
			$maquina->setNome($elemento['nome_pc']);
			$maquina->setId($elemento['id_maquina']);
			$maquina->setEnderecoMac($elemento['mac']);
			
			$listaDeMaquinas[] = $maquina;
			
		}
		return $listaDeMaquinas;
	}
	
}