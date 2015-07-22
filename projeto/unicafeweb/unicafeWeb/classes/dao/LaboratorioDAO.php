<?php


class LaboratorioDAO extends DAO{ 
	
	public function retornaLista(){
		$lista = array();
		$sql = "SELECT * FROM laboratorio";
		foreach($this->getConexao()->query($sql) as $elemento){
			$laboratorio = new Laboratorio();
			$laboratorio->setId($elemento['id_laboratorio']);
			$laboratorio->setNome($elemento['nome_laboratorio']);
			$lista[] = $laboratorio;
			
		}
		return $lista;
		
	}
	public function preencheLaboratorioPorID(Laboratorio $laboratorio){
		$id = $laboratorio->getId();
		$result = $this->getConexao()->query("SELECT * FROM laboratorio WHERE id_laboratorio = $id");
		foreach($result as $elemento){
			$laboratorio->setNome($elemento['nome_laboratorio']);
			break;
		}
	}
	/**
	 * Existe só enquanto esses terceirizados não possuem cadastro. 
	 * @return multitype:Laboratorio
	 */
	public function retornaListaEspecial(){
		$lista = array();
		$sql = "SELECT * FROM laboratorio";
		foreach($this->getConexao()->query($sql) as $elemento){
			if($elemento['nome_laboratorio'] == "BIBLIBERDADE" || $elemento['nome_laboratorio'] == "BIBPALMARES")
			{
				$laboratorio = new Laboratorio();
				$laboratorio->setId($elemento['id_laboratorio']);
				$laboratorio->setNome($elemento['nome_laboratorio']);
				$lista[] = $laboratorio;
			}else{
				continue;
			}
							
		}
		return $lista;
	
	}
	public function retornaMaquinasDe(Laboratorio $laboratorio){
		$idLab = $laboratorio->getId();
		$result = $this->getConexao()->query("SELECT * FROM maquina INNER JOIN laboratorio_maquina ON maquina.id_maquina = laboratorio_maquina.id_maquina INNER JOIN laboratorio ON laboratorio_maquina.id_laboratorio = laboratorio.id_laboratorio WHERE laboratorio.id_laboratorio = $idLab");
		$lista = array();
		foreach($result as $linha){
			$maquina = new Maquina();
			$maquina->setId($linha['id_maquina']);
			$maquina->setNome($linha['nome_pc']);
			$maquina->setEnderecoMac($linha['mac']);
			$lista[]  = $maquina;
				
			
		}
		return $lista;
		
	}
	
	
	
}




?>