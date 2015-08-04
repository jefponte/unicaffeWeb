<?php
class MaquinaDAO extends DAO {
	
	public function MaquinaDAO($conexao = null, $tipo = self::TIPO_DEFAULT) {
		parent::DAO($conexao, $tipo);
	}

	public function retornaLista() {
		$lista = array ();
		$sql = "SE,na.id_maquina LEFT JOIN laboratorio ON laboratorio_maquina.id_laboratorio = laboratorio.id_laboratorio;";
		$result = $this->getConexao ()->query ( $sql );
		foreach ( $result as $linha ) {
			$maquina = new Maquina();
			$maquina->setNome($linha['nome_pc']);
			$maquina->setId($linha['id_maquina']);

			$maquina->getLaboratorio()->setId($linha['id_laboratorio']);
			$maquina->getLaboratorio()->setNome($linha['nome_laboratorio']);
			
			if($this->getTipoDeConexao() == self::TIPO_UNICAFE)
			{
				$maquina->setEnderecoMac($linha['mac']);
				$maquina->setStatus($linha['status_maquina']);
				$maquina->getAcesso()->setHoraInicial($linha['hora_inicial']);
				$maquina->getAcesso()->setTempoUsado($linha['tempo_usado']);
				$maquina->getAcesso()->setTempoDisponibilizado($linha['tempo_oferecido']);
				$maquina->getAcesso()->setIp($linha['ip']);
				$maquina->getAcesso()->getUsuario()->setNome($linha['nome']);
				$maquina->getAcesso()->getUsuario()->setLogin($linha['login']);
				$maquina->getAcesso()->getUsuario()->setNivelAcesso($linha['nivel_acesso']);
				
				
			}
			$lista [] = $maquina;
		}
		
		return $lista;
	}
	/**
	 * Pega uma lista de máquinas e for ordenação pelo nome da maquina. 
	 * @param unknown $lista
	 */
	public function ordenaPorNome($lista){
		$maquinas = array();
		foreach($lista as $elemento){
			$maquinas[] = $elemento;
		}
		
		$quantidade = count($maquinas);
		$houveTroca = false;
		$dim = count($maquinas);
		do{
				
			$houveTroca = false;
			for($i = 0; $i < ($dim - 1); $i++)
			{
				if(strcmp(strtolower($maquinas[$i]), strtolower($maquinas[$i+1])) > 0)
				{
					$maquinaAux = clone $maquinas[$i];
					$maquinas[$i] = clone $maquinas[$i+1];
					$maquinas[$i+1] = clone $maquinaAux;
					$houveTroca = true;
				}
			}
		}while($houveTroca);
		return $maquinas;
		
	}
	public function listaCompleta(){
		
		
		$daoUniCafe = new MaquinaDAO(null, 0);
		$listaDeMaquinasUniCafe = $daoUniCafe->retornaLista();
		//Antes de continuar vamos remover as repeticoes na lista do UniCafe
		
		foreach($listaDeMaquinasUniCafe as $chave => $elementoRepeticao){
			$quantidade = 0;
			foreach($listaDeMaquinasUniCafe as $segundaChave => $elemento){
				if($elementoRepeticao->getNome() == $elemento->getNome())
					$quantidade++;
				if($quantidade > 1){
					$quantidade = 1;
					unset($listaDeMaquinasUniCafe[$segundaChave]);
				}
				
				
			}
			
		}
		
		$listaDeMaquinas = $this->retornaLista();
		
		
		
		$listaCompleta = array();
		
		
		/*
		 * Teste
		 * echo 'Maquinas do Banco: '.count($listaDeMaquinas);
		 * echo 'Maquinas do UniCafe: '.count($listaDeMaquinasUniCafe);
		 * echo 'Maquinas do Completa: '.count($listaCompleta);
		 * 
		 * 
		 * 
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
			foreach($listaDeMaquinas as $chave => $maquinaBanco){
				if(strcmp(strtolower($maquinaUniCafe->getNome()), strtolower($maquinaBanco->getNome())) == 0)
				{
				
					$existe = true;
					$maquinaUniCafe->setCadastrada(true);
					unset($listaDeMaquinas[$chave]);
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