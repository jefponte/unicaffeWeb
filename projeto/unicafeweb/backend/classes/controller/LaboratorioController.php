<?php


class LaboratorioController{

	
	
	public static function main($tipoDeTela) {
		switch ($tipoDeTela) {
			case Sessao::NIVEL_SUPER :
				$laboratorioController = new LaboratorioController();
				$laboratorioController->telaVisualizacaoAdm();
				break;
			case Sessao::NIVEL_ADMIN:
				$laboratorioController = new LaboratorioController();
				$laboratorioController->telaVisualizacaoAdm();
				break;
			default:
				$laboratorioController = new LaboratorioController();
				$laboratorioController->telaVisualizacao();
				break;
		}
		
		
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
			$laboratorioView->mostraLaboratorio($elemento, false, 10, 20, 30, 50);
		}
		
		
	}
	public function telaVisualizacaoAdm()
	{
		$maquinaDao = new MaquinaDAO();
		$listaCompleta = $maquinaDao->listaCompleta();
		
		$dao = new LaboratorioDAO();
		$lista = $dao->retornaLaboratorios();
		$laboratorioView = new LaboratorioView();
		foreach($lista as $elemento){
			$livre = 0;
			$ocupada = 0;
			$desconectada = 0;
			foreach ($listaCompleta as $maquina){
				if(strtolower($maquina->getLaboratorio()->getNome()) != strtolower($elemento->getNome()))
					continue;
				if($maquina->getStatus() == Maquina::STATUS_DISPONIVEL)
					$livre++;
				if($maquina->getStatus() == Maquina::STATUS_OCUPADA)
					$ocupada++;
				if($maquina->getStatus() == Maquina::STATUS_DESCONECTADA)
					$desconectada++;
			}
			$laboratorioView->mostraLaboratorio($elemento, true, $livre, $ocupada, $desconectada, ($livre+$ocupada+$desconectada));
		}
	
	
	}
	

}


?>
