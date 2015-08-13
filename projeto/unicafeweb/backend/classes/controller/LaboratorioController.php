<?php


class LaboratorioController{

	
	
	public static function main($tipoDeTela) {
		$laboratorioController = new LaboratorioController();
		$laboratorioController->telaVisualizacao();
	}
	
	public static function mainCadastro($tipoDeTela){
		if($tipoDeTela != Sessao::NIVEL_SUPER)
			return;
		$mensagem = "";
		$sucesso = false;
		$erro = false;
		if(isset($_POST["formulario_cadastro"])){
			if(isset($_POST['nome']) && $_POST["nome"]!="")
			{
				$valida=new Validacoes();
				$laboratorio = new Laboratorio();
				$laboratorio->setNome($_POST['nome']);
				$labDao= new LaboratorioDAO();
				if($labDao->inserir($laboratorio)){
					$sucesso = TRUE;
					$mensagem ="Inserido com sucesso";
				}
				else{
					$erro = true;
					$mensagem ="Erro ao tentar inserir";
				}
			}else{
				$erro = true;
				$mensagem ="Preencha o Formulario";
			}
		
		}
		$laboratorioView = new LaboratorioView();
		$laboratorioView->formCadastro($mensagem, $erro, $sucesso);
		
		
		
		
		
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
