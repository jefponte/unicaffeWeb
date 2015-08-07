<?php


class LaboratorioController{

	const TELA_DEFAULT = 1;

	const SUPER_USUARIO = 2;
	
	
	public static function main($tipoDeTela) {
		$laboratorioController = new LaboratorioController();
		switch ($tipoDeTela) {
			
			case Sessao::NIVEL_SUPER:
				$laboratorioController->telaSuperUsuario();
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
				$laboratorioController->telaSuperUsuarioDefault();
				break;
		}
	}
	public function telaSuperUsuario()
	{
		$laboratorioView = new LaboratorioView();
		
		$maquinaDao = new MaquinaDAO();
		$lista = $maquinaDao->listaCompleta();
		foreach ($lista as $elemento){
			
			$laboratorioView->mostraMaquina($elemento);
		}
		
		
		
	}
	
	public function telaSuperUsuarioDefault()
	{
		$laboratorioView = new LaboratorioView();
	
		$maquinaDao = new MaquinaDAO();
		$lista = $maquinaDao->listaCompleta();
		foreach ($lista as $elemento){
				
			$elemento->getAcesso()->getUsuario()->setNome("");
			$laboratorioView->mostraMaquina($elemento, false);
		}
	
	
	
	}
	

}


?>
