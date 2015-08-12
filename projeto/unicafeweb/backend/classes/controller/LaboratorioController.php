<?php


class LaboratorioController{

	
	
	public static function main($tipoDeTela) {
		$laboratorioController = new LaboratorioController();
		$laboratorioController->telaVisualizacao();
	}
	
	public static function mainCadastro(){
		
	}
	public function telaVisualizacao()
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
