<?php


class LaboratorioController{

	
	
	public static function main($tipoDeTela) {
		$laboratorioController = new LaboratorioController();
		$laboratorioController->telaDefault();
	}
	public function telaDefault()
	{
		$dao = new LaboratorioDAO();
		$lista = $dao->retornaLaboratorios();
		$laboratorioView = new LaboratorioView();
		foreach($lista as $elemento){
			$laboratorioView->mostraLaboratorio($elemento);
		}
		
		
	}
	

}


?>
