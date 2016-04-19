<?php
class MaquinaController {
	public static function mainHistorico($tipoDeTela) {
		switch ($tipoDeTela) {
			case Sessao::NIVEL_SUPER :
				$maquinaController = new MaquinaController ();
				$maquinaController->telaHistoricoSuper ();
				break;
			case Sessao::NIVEL_ADMIN :
				$maquinaController = new MaquinaController ();
				$maquinaController->telaHistoricoSuper ();
				break;
			default :
				$maquinaController = new MaquinaController ();
				$maquinaController->telaHistoricoDefault ();
				break;
		}
	}
	public static function mainDetalhe($tipoDeTela) {
		switch ($tipoDeTela) {
			case Sessao::NIVEL_SUPER :
				$maquinaController = new MaquinaController ();
				$maquinaController->telaDetalhe ();
				break;
			case Sessao::NIVEL_ADMIN :
				$maquinaController = new MaquinaController ();
				$maquinaController->telaDetalhe ();
				break;
			default :
				break;
		}
	}
	/**
	 * Faremos da mesma forma que a tela de listagem, sendo que apenas mostraremos a m�quina selecionada.
	 *
	 * Logo, precisamos que um nome de maquina seja enviado via GET.
	 * Caso contrario n�o mostraremos nenhuma.
	 */
	public function telaDetalhe() {

		if(!isset($_GET['maquina']))
			return;
		$maquinaView = new MaquinaView ();
		$maquinaDao = new MaquinaDAO ();
		$lista = $maquinaDao->listaCompleta ();
		foreach ( $lista as $elemento ) {
				if (! strcmp ( strtolower ( $_GET ['maquina'] ), strtolower ( $elemento->getNome() ) )){
					$maquina = $elemento;
					break;
				}
		}
		
		$maquinaView->mostraMaquinaDetalhe($maquina);
		

		
	}
	public function telaHistoricoSuper() {
		$maquinaView = new MaquinaView ();
		$maquinaView->formPesquisaHistorico ();
		if (isset ( $_GET ['usuario'] )) {
			
			$maquinaDao = new MaquinaDAO ();
			$usuario = new Usuario ();
			$usuario->setLogin ( $_GET ['usuario'] );
			$maquinaDao->pesquisaHistoricoDeUsuario ( $usuario );
		}
	}
	public function telaHistoricoDefault() {
		echo 'Indisponivel no momento';
	}
	public static function main($tipoDeTela) {
		$maquinaController = new MaquinaController ();
		
		/*
		 * Em todos os casos o usu�rio ver� todas as m�quinas, o status de cada uma e
		 * tamb�m saber� se est� ou n�o cadastrada.
		 * Ver� dados de acesso e formul�rio para pesquisar por nome de m�quina.
		 */
		
		/*
		 * Se o usu�rio for administrador.
		 * ter� dados de usu�rio que est� logado.
		 * Poder� passar comandos para m�quina de seu laborat�rio.
		 *
		 * Obs: o comando desativar n�o estar� dispon�vel para usu�rio administrador.
		 */
		
		/*
		 * Se for usu�rio super
		 * Al�m de poder ver dados de usu�rio poder� enviar comando de cadastro
		 * Poder� tamb�m enviar comandos quaisquer para qualquer m�quina.
		 */
		
		switch ($tipoDeTela) {
			
			case Sessao::NIVEL_ADMIN :
				$maquinaController->telaMaquinasSuper ();
				break;
			case Sessao::NIVEL_SUPER :
				$maquinaController->telaMaquinasSuper ();
				break;
			
			default :
				$maquinaController->telaMaquinas ();
				break;
		}
	}
	/**
	 * Essa tela � vis�vel por qualquer tipo de usu�rio.
	 */
	public function telaMaquinas() {
		$maquinaView = new MaquinaView ();
		
		$maquinaDao = new MaquinaDAO ();
		$lista = $maquinaDao->listaCompleta ();
		foreach ( $lista as $elemento ) {
			if (isset ( $_GET ['laboratorio'] )) {
				if (! strcmp ( strtolower ( $_GET ['laboratorio'] ), strtolower ( $elemento->getLaboratorio ()->getNome () ) ))
					$maquinaView->mostraMaquina ( $elemento, false );
			} else
				$maquinaView->mostraMaquina ( $elemento, false );
		}
	}
	
	/**
	 * Nessa � poss�vel cadastrar a m�quina ou atualizar.
	 */
	public function telaMaquinasSuper() {
		$maquinaView = new MaquinaView ();
		$maquinaDao = new MaquinaDAO ();
		$lista = $maquinaDao->listaCompleta ();
		foreach ( $lista as $elemento ) {
			if (isset ( $_GET ['laboratorio'] )) {
				if (! strcmp ( strtolower ( $_GET ['laboratorio'] ), strtolower ( $elemento->getLaboratorio ()->getNome () ) ))
					$maquinaView->mostraMaquina ( $elemento );
				if ($_GET ['laboratorio'] == 'nao_listada' && ! $elemento->getLaboratorio ()->getId ())
					$maquinaView->mostraMaquina ( $elemento );
			} else
				$maquinaView->mostraMaquina ( $elemento );
		}
	}
	/**
	 * Em todos os casos o usu�rio ver� todas as m�quinas, o status de cada uma e
	 * tamb�m saber� se est� ou n�o cadastrada.
	 * Ver� dados de acesso e formul�rio para pesquisar por nome de m�quina.
	 */
	public function telaMaquinasAdmin() {
	}
}