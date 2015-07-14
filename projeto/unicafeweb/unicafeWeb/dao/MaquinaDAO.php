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
        
        public function editaMaquinas(Maquina $maq){
        $nome= $maq->getNome();
        $id=$maq->getId();
        $mac=$maq->getEnderecoMac();
        $geraSql=new GeraSQL();
        $dados="nome_pc='$nome',mac='$mac'";
        $add = "WHERE id_maquina = $id";
        $retornaSql= $geraSql->setUpdade("maquina", $dados,$add);
        echo $retornaSql;
        if($this->getConexao()->query($retornaSql)){
           
       }
        
	}
	
}