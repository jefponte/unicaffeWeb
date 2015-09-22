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
	public static function mainRelatorioGeral(){
		$control = new LaboratorioController();
		$control->geraRelatorioGeral();
	}
	public function geraRelatorioGeral(){
		//Vamos fazer umas tabelas interessantes pra mostrar ao povo. 
		$dao = new DAO();
		//Vamos pegar a semana. 
		
		$i = 0;
		echo '<table class="tabela quadro doze">
    <caption>Tempo de Utilização Já Oferecido Desde O início</caption>
    </thead><tbody>';
		
	
		
		$laboratorioDao = new LaboratorioDAO($dao->getConexao());
		$laboratorios = $laboratorioDao->retornaLaboratorios();
		foreach($laboratorios as $laboratorio){
			$idDoLaboratorio = $laboratorio->getId();
			$sql = "SELECT sum(tempo_usado) as tempo_total FROM acesso INNER JOIN maquina ON acesso.id_maquina = maquina.id_maquina INNER JOIN laboratorio_maquina ON laboratorio_maquina.id_maquina = maquina.id_maquina INNER JOIN laboratorio ON laboratorio_maquina.id_laboratorio = laboratorio.id_laboratorio WHERE laboratorio.id_laboratorio = '$idDoLaboratorio'";
			
			
			foreach($dao->getConexao()->query($sql) as $linha){
				
				echo '<tr><th>'.$laboratorio->getNome().'</th><td>'.MaquinaView::segundosParaHora($linha['tempo_total']).'</td></tr>';
			}
		}
		
		$sql = "SELECT sum(tempo_usado) as tempo_total FROM acesso ";
		foreach($dao->getConexao()->query($sql) as $linha){
			echo '<tr><th>Total</th><td>'.MaquinaView::segundosParaHora($linha['tempo_total']).'</td></tr>';
		}
		
		echo '</tbody></table>';
		echo '<br><br>';
		echo '<table class="tabela quadro doze">
    <caption>Tempo de Utilização Este Mês</caption>
    </thead><tbody>';
		
		//Pega uma variavel com o primeiro dia da semana.
		$horaInicial = date("Y-m-01 00:00:00");
		$horaAtual = date("Y-m-d H:i:s");
		foreach($laboratorios as $laboratorio){
			$idDoLaboratorio = $laboratorio->getId();
			
			$sql = "SELECT sum(tempo_usado) as tempo_total FROM acesso INNER JOIN maquina ON acesso.id_maquina = maquina.id_maquina INNER JOIN laboratorio_maquina ON laboratorio_maquina.id_maquina = maquina.id_maquina INNER JOIN laboratorio ON laboratorio_maquina.id_laboratorio = laboratorio.id_laboratorio WHERE laboratorio.id_laboratorio = '$idDoLaboratorio' AND (acesso.hora_inicial BETWEEN '$horaInicial' AND '$horaAtual')";
			
				
			foreach($dao->getConexao()->query($sql) as $linha){
				echo '<tr><th>'.$laboratorio->getNome().'</th><td>'.MaquinaView::segundosParaHora($linha['tempo_total']).'</td></tr>';
			}
		}
		$sql = "SELECT sum(tempo_usado) as tempo_total FROM acesso INNER JOIN maquina ON acesso.id_maquina = maquina.id_maquina INNER JOIN laboratorio_maquina ON laboratorio_maquina.id_maquina = maquina.id_maquina INNER JOIN laboratorio ON laboratorio_maquina.id_laboratorio = laboratorio.id_laboratorio WHERE acesso.hora_inicial BETWEEN '$horaInicial' AND '$horaAtual'";
			
		
		foreach($dao->getConexao()->query($sql) as $linha){
			echo '<tr><th>Total</th><td>'.MaquinaView::segundosParaHora($linha['tempo_total']).'</td></tr>';
		}
		
		echo '</tbody></table>';
		echo '<br><br>';
		echo '<table class="tabela quadro doze">
    <caption>Tempo de Utilização Hoje</caption>
    </thead><tbody>';
		
		//Pega uma variavel com o primeiro dia da semana.
		$horaInicial = date("Y-m-d 00:00:00");
		$horaAtual = date("Y-m-d H:i:s");
		
		foreach($laboratorios as $laboratorio){
			$idDoLaboratorio = $laboratorio->getId();
			$sql = "SELECT sum(tempo_usado) as tempo_total FROM acesso INNER JOIN maquina ON acesso.id_maquina = maquina.id_maquina INNER JOIN laboratorio_maquina ON laboratorio_maquina.id_maquina = maquina.id_maquina INNER JOIN laboratorio ON laboratorio_maquina.id_laboratorio = laboratorio.id_laboratorio WHERE laboratorio.id_laboratorio = '$idDoLaboratorio' AND (acesso.hora_inicial BETWEEN '$horaInicial' AND '$horaAtual')";
				
			foreach($dao->getConexao()->query($sql) as $linha){
				echo '<tr><th>'.$laboratorio->getNome().'</th><td>'.MaquinaView::segundosParaHora($linha['tempo_total']).'</td></tr>';
			}
			
		}
		
		$sql = "SELECT sum(tempo_usado) as tempo_total FROM acesso WHERE hora_inicial BETWEEN '$horaInicial' AND '$horaAtual'";
		
		foreach($dao->getConexao()->query($sql) as $linha){
			echo '<tr><th>Total</th><td>'.MaquinaView::segundosParaHora($linha['tempo_total']).'</td></tr>';
		}
		
		

		echo '</tbody></table>';
		
		
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
			$laboratorioView->mostraLaboratorio($elemento, false,$livre, $ocupada, $desconectada, ($livre+$ocupada+$desconectada));
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
