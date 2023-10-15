<?php

/**
 * 
 * Gerenciamento de telas voltadas para laboratório. 
 * @author Jefferson Uchôa Ponte
 *
 */
class LaboratorioController{

	/**
	 * Verifica nível de acesso e inicia a tela de visualização. 
	 * @param integer $nivelDeAcesso
	 */
	
	public static function main($nivelDeAcesso) {
	    switch ($nivelDeAcesso) {
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
	/**
	 * Mostra o relatório geral de acesso de laboratórios. 
	 */
	public static function mainRelatorioGeral(){
		$control = new LaboratorioController();
		$control->geraRelatorioGeral();
	}
	/**
	 * Exibe relatório geral de utilização de laboratórios. 
	 */
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
	
	/**
	 * 
	 * @param integer $tipoDeTela
	 * Tela de cadastro de laboratório. 
	 */
	
	public static function mainCadastro($tipoDeTela){
	    if($tipoDeTela == Sessao::NIVEL_SUPER){
	        $controller = new LaboratorioController();
	        $controller->telaCadastro();
	        
	    }else{
            echo "nao encontrada";
	    }
		
	}

	public function telaCadastro(){
	    $this->dao = new LaboratorioDAO();
	    $this->cadastro();
	    $this->deletar();
	    if(isset($_GET['deletar_id'])){
	        return;
	    }
	    $this->listar();
	    
	}

	public function cadastro(){
	    $this->view = new LaboratorioView();
	    $this->view->formCadastro();
	    
	    if(!isset($_POST["formulario_cadastro"])){
	        return;
	    }
	    if(!isset($_POST['nome'])){
	        return;
	    }
	    if($_POST["nome"] ==""){
	        return;
	    }
        
	    $laboratorio = new Laboratorio();
        $laboratorio->setNome($_POST['nome']);
       
        if($this->dao->inserir($laboratorio)){
        
            $this->view->mensagem("Inserido com sucesso");
        }
        else{
            $this->view->mensagem("Erro ao tentar inserir");

        }
        
        
        echo '<meta http-equiv="refresh" content="2; url=.\?pagina=laboratorios_cadastro">';
    
	    
	}
	private $dao;
	private $view;
	public function listar(){
	    $lista = $this->dao->retornaLaboratorios();
	    $this->view->exibirLista($lista);
	    
	}
	public function deletar(){
	    if(!isset($_GET['deletar_id'])){
	        return;
	    }
	    $this->view->formConfirmacaoDeletar();
	    if(!isset($_POST['certeza_deletar'])){
	        return;
	    }
	    
	    $laboratorio = new Laboratorio();
	    $laboratorio->setId($_GET['deletar_id']);
	    
	    if($this->dao->deletar($laboratorio)){
	        $this->view->mensagem("Sucesso ao tentar Deletar Laboratorio.");
	    }else{
	        $this->view->mensagem("Erro ao tentar deletar Laboratorio");
	    }
	    
	    echo '<meta http-equiv="refresh" content="2; url=.\?pagina=laboratorios_cadastro">';
	}
	/**
	 * Tela de visualização de laboratórios. 
	 */
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
	/**
	 * Visualização de laboratórios como administrador. 
	 */
	public function telaVisualizacaoAdm()
	{
		$maquinaDao = new MaquinaDAO();
		$listaCompleta = $maquinaDao->listaCompleta();
		
		$dao = new LaboratorioDAO();
		$perfilDao = new PerfilDAO($dao->getConexao());
		$lista = $dao->retornaLaboratorios();
		foreach($lista as $laboratorio){
		    $perfilDao->carregarPerfil($laboratorio);
		}
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
