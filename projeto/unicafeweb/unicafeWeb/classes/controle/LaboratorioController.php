<?php
class LaboratorioController {
	const BIBLIOTECA = 11;
	const CADASTRO = 1;
	const LISTAGEM = 2;
	
	public static function main($tipoDeTela) {
		$controller = new LaboratorioController ();
		switch ($tipoDeTela) 

		{
			case self::BIBLIOTECA :
				$controller->aplicacaoBiblioteca ();
				break;
			case self::CADASTRO :
				$controller->aplicacaoCadastro ();
				break;
			case self::LISTAGEM :
				$controller->aplicacaoListagem ();
				break;
			default :
				
				break;
		}
	}
	public function aplicacaoListagem() {
		$erro = FALSE;
		$msg_erro = "";
		$tabela = "";
		$sucesso = false;
		$msg_sucesso = "";
		$condicao = array ();
		
		$laboratorioDAO = new LaboratorioDAO();
		$lista = $laboratorioDAO->retornaLista();
		$laboratorioView = new LaboratorioView();		
		$laboratorioView->mostraTabela2($lista);
		if (isset($_GET["editar"])) {
			
		}
		if (isset($_GET["vermaquina"])) {
			
		}
		
		
	}
	public function aplicacaoCadastro() {
		// Temos que chamar a visao pra mostrar a tela do formulario.
		$laboratorioView = new LaboratorioView ();
		
		$erro = false;
		$msg_erro = "";
		$sucesso = false;
		if (isset ( $_POST ["formulario_cadastro"] )) {
			if (isset ( $_POST ['nome'] ) && $_POST ["nome"] != "") {
				$valida = new Validacoes ();
				if (! $erro) {
					// ECHO 'ENTROU';
					$laboratorio = new Laboratorio ();
					$laboratorio->setNome ( $_POST ['nome'] );
					$labDao = new LabDao ();
					if ($labDao->cadastroLab ( $laboratorio )) {
						$sucesso = TRUE;
						$msg_sucesso = "Inserido com sucesso";
					}
				}
			}
		}
		$laboratorioView->mostraFormCadastro ( $erro, $sucesso, $msg_erro );
	}
	public function aplicacaoBiblioteca() {
		// Vou mostrar uma lista das bibliotecas.
		$laboratorioDAO = new LaboratorioDAO ();
		$lista = $laboratorioDAO->retornaListaEspecial ();
		$visao = new LaboratorioView ();
		$visao->mostraTabela ( $lista );
		
		if (isset ( $_GET ['laboratorio'] )) {
			$laboratorio = new Laboratorio ();
			$laboratorio->setId ( $_GET ['laboratorio'] );
			$maquinas = $laboratorioDAO->retornaMaquinasDe ( $laboratorio );
			$visao->mostraMaquinas ( $maquinas );
		}
		if (isset ( $_GET ['desligar'] )) {
			// Só podemos desligar máquinas da biblioteca.
			$laboratorio = new Laboratorio ();
			$laboratorio->setId ( $_GET ['desligar'] );
			$laboratorioDAO->preencheLaboratorioPorID ( $laboratorio );
			if ($laboratorio->getNome () == "BIBPALMARES" || $laboratorio->getNome () == "BIBLIBERDADE") {
				
				$maquinas = $laboratorioDAO->retornaMaquinasDe ( $laboratorio );
				$mensagem = " ";
				foreach ( $maquinas as $maquina ) {
					// $unicafe = new UniCafe();
					// $mensagem .= $unicafe->dialoga('desliga('.$maquina->getNome().')');
					$mensagem = "Desliguei uma porrada";
				}
				$visao->mostraModal ( $mensagem );
			} else {
				$visao->mostraModal ( "Permissão negada" );
			}
		}
	}
}

?>