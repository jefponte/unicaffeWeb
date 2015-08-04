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
		$laboratorioView = new LaboratorioView();
		
		$maquinaDao = new MaquinaDAO();
		$lista =$maquinaDao->listaCompleta();
		foreach ($lista as $elemento){
			
			$laboratorioView->mostraMaquina($elemento);
		}
		
		
	}
	

}


?>
