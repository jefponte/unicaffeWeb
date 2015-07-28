<?php
class LaboratorioController {
	const BIBLIOTECA = 11;
	public static function main($tipoDeTela) {
		switch ($tipoDeTela) 

		{
			case self::BIBLIOTECA :
				$controller = new LaboratorioController ();
				$controller->aplicacaoBiblioteca ();
				break;
			default :
				
				break;
		}
	}
	public function aplicacaoBiblioteca() {
		// Vou mostrar uma lista das bibliotecas.
		$laboratorioDAO = new LaboratorioDAO();
		$lista = $laboratorioDAO->retornaListaEspecial();
		$visao = new LaboratorioView();
		$visao->mostraTabela($lista);
		
		if(isset($_GET['laboratorio'])){
			$laboratorio = new Laboratorio();
			$laboratorio->setId($_GET['laboratorio']);
			$maquinas = $laboratorioDAO->retornaMaquinasDe($laboratorio);
			$visao->mostraMaquinas($maquinas);
		}
		if(isset($_GET['desligar'])){
			//Só podemos desligar máquinas da biblioteca. 
			$laboratorio = new Laboratorio();
			$laboratorio->setId($_GET['desligar']);
			$laboratorioDAO->preencheLaboratorioPorID($laboratorio);
			if($laboratorio->getNome() == "BIBPALMARES" || $laboratorio->getNome() == "BIBLIBERDADE")
			{

				$maquinas = $laboratorioDAO->retornaMaquinasDe($laboratorio);
				$mensagem = " ";
				foreach ($maquinas as $maquina){
					//$unicafe = new UniCafe();
					//$mensagem .= $unicafe->dialoga('desliga('.$maquina->getNome().')');
					$mensagem = "Desliguei uma porrada";
				}
				$visao->mostraModal($mensagem);
				
			}
			else
			{
				$visao->mostraModal("Permissão negada");
			}
			
		}
		
	}
}

?>