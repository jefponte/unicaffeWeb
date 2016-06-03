<?php
class CatracaController {
	private $view;
	public static function main($nivelDeAcesso) {
		switch ($nivelDeAcesso) {
			case Sessao::NIVEL_SUPER :
				
				$controller = new CatracaController ();
				$controller->controlar ();
				break;
			default :
				UsuarioController::main ( $nivelDeAcesso );
				break;
		}
	}
	public function CatracaController() {
		$this->view = new CatracaView ();
	}
	public function controlar() {
		$unidadeDao = new UnidadeDAO ( null, DAO::TIPO_PG_LOCAL );
		if(!isset($_GET['unidade']) && !isset($_GET['completo']) && !isset($_GET['detalhe'])){
			$lista = $unidadeDao->retornaLista ();
			$this->view->listaDeUnidadesAcademicas ( $lista );
		}
		if(isset($_GET['unidade'])){
			$unidade = new Unidade();
			$unidade->setId(intval($_GET['unidade']));
			$listaDeCatracas = $unidadeDao->retornaCatracasPorUnidade($unidade);
			$this->view->listaDeCatracas($listaDeCatracas);
			
		}else if(isset($_GET['completo'])){
			//Script do Ajax pra atualizar a lista de catracas.
			$listaDeCatracas = $unidadeDao->retornaCatracasPorUnidade();
			echo '
			
				<div class="doze colunas"  id="olinda">
					<div id="titulo" class="doze colunas fundo-azul2 centralizado ">
						<h1 class="texto-branco">Selecione uma Catraca</h1>
					</div>
			
					<div class="doze colunas catraca">';


			
			foreach ($listaDeCatracas as $catraca){
				$valor = $unidadeDao->totalDeGirosDaCatraca($catraca);
				
				$this->view->mostraCatraca($catraca, 0, $valor);
				
			}
			
			echo '</div>
				</div>';
		}
		else if(isset($_GET['detalhe'])){
			
			$catraca = new Catraca();
			$catraca->setId(intval($_GET['detalhe']));
			$unidadeDao->preencheCatracaPorId($catraca);
			$this->view->detalheCatraca($catraca);
			
			
		}
		
		
		
	}
	
}

?>