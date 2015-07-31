<?php


class LaboratorioController{

	const TELA_DEFAULT = 1;

	const SUPER_USUARIO = 2;
	
	
	public static function main($tipoDeTela) {
		$laboratorioController = new LaboratorioController();
		switch ($tipoDeTela) {
			
			case self::SUPER_USUARIO:
				
				break;
			
			default :

				/*
				 * Nessa tela vemos a lista de máquinas sem laboratório. 
				 * Poderemos listar máquinas de laboratório específico. 
				 * 
				 *
				 * Neste caso o usuário não é super nem administrador, logo seu acesso não 
				 * mostra dados de usuário nem permite envio de comandos. 
				 * 
				 */
				$laboratorioController->telaDefault();
				break;
		}
	}
	public function telaDefault(){
		
		if(!isset($_GET['laboratorio'])){
			///MOstrarei todas as máquinas sem laboratório. 
			
			$maquinaDao = new MaquinaDAO();
			$lista = $maquinaDao->ordenaPorNome($maquinaDao->listaCompleta());
			foreach($lista as $maquina){
				if(!$maquina->getLaboratorio()->getId()){
					echo $maquina;
					echo "<br>".$maquina->getLaboratorio()->getNome();
				}
			}
			
			return;	
		}
		
		$maquinaDao = new MaquinaDAO();
		$lista = $maquinaDao->ordenaPorNome($maquinaDao->listaCompleta());
		foreach($lista as $maquina){
			if($maquina->getLaboratorio()->getNome() == $_GET['laboratorio']){
				echo $maquina.'<br><hr>';

			}
		}
		
		
	}
	

}


?>
