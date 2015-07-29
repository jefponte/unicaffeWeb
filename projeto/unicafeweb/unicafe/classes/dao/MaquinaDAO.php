<?php
class MaquinaDAO extends DAO {
	
	public function MaquinaDAO($conexao = null, $tipo = self::TIPO_DEFAULT) {
		parent::DAO($conexao, $tipo);
	}

	public function retornaLista() {
		$lista = array ();
		$sql = "SELECT * FROM maquina";
		$result = $this->getConexao ()->query ( $sql );
		foreach ( $result as $linha ) {
			$maquina = new Maquina();
			$maquina->setNome($linha['nome_pc']);
			$maquina->setId($linha['id_maquina']);

			if($this->getTipoDeConexao() == self::TIPO_UNICAFE)
			{
				$maquina->setEnderecoMac($linha['mac']);
				$maquina->setStatus($linha['status_maquina']);
				$maquina->getAcesso()->setHoraInicial($linha['hora_inicial']);
				
			}
			$lista [] = $maquina;
		}
		
		return $lista;
	}
	
	public function listaCompleta(){
		
		
		$daoUniCafe = new MaquinaDAO(null, 0);
		$listaDeMaquinasUniCafe = $daoUniCafe->retornaLista();
		
		$listaDeMaquinas = $this->retornaLista();
		
		
		
		$listaCompleta = array();
// 		echo 'Maquinas do Banco: '.count($listaDeMaquinas);
// 		echo 'Maquinas do UniCafe: '.count($listaDeMaquinasUniCafe);
// 		echo 'Maquinas do Completa: '.count($listaCompleta);
		
		
		/*
		 * Primeiro vou percorrer a lista do UniCaffe, verifico se existe na outra
		 * Caso exista,
		 * 		Significa que ela é cadastrada. Setamos o atributo cadastrada para true 
		 * 		e eliminamos da lista de maquinas do banco. 
		 * 
		 * Caso não exista, 
		 * 		Significa que não é cadastrada, então nós colocamos cadastrada para false. 
		 * 
		 * No final podemos ter alguns elementos na lista de máquinas do banco. 
		 * Pegamos esses e adicionamos na lista completa. E setamos o atributo status para desconectada. 
		 * 
		 */
		
		foreach($listaDeMaquinasUniCafe as $maquinaUniCafe){
			//Vamos verificar se essa maquina do UniCafe Existe na outra. 
			//Eliminando da lista caso exista. 
			$existe = false;
			foreach($listaDeMaquinas as $maquinaBanco){
				if($maquinaUniCafe->getNome() == $maquinaBanco->getNome())
				{
					$existe = true;
					$maquinaUniCafe->setCadastrada(true);
					unset($maquinaBanco);
					break;
				}
			}

			
		}
		$listaCompleta = $listaDeMaquinasUniCafe;
		
		foreach($listaDeMaquinas as $desconectada){
			$desconectada->setCadastrada(true);
			$desconectada->setStatus(Maquina::STATUS_DESCONECTADA);
			$listaCompleta[] = $desconectada;
		}
		
		return $listaCompleta;
		
	}
	
	
	
}

?>