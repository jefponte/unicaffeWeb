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
	 * Faremos da mesma forma que a tela de listagem, sendo que apenas mostraremos a máquina selecionada.
	 *
	 * Logo, precisamos que um nome de maquina seja enviado via GET.
	 * Caso contrario não mostraremos nenhuma.
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
		 * Em todos os casos o usuário verá todas as máquinas, o status de cada uma e
		 * também saberá se está ou não cadastrada.
		 * Verá dados de acesso e formulário para pesquisar por nome de máquina.
		 */
		
		/*
		 * Se o usuário for administrador.
		 * terá dados de usuário que está logado.
		 * Poderá passar comandos para máquina de seu laboratório.
		 *
		 * Obs: o comando desativar não estará disponível para usuário administrador.
		 */
		
		/*
		 * Se for usuário super
		 * Além de poder ver dados de usuário poderá enviar comando de cadastro
		 * Poderá também enviar comandos quaisquer para qualquer máquina.
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
	 * Essa tela é visível por qualquer tipo de usuário.
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
	 * Nessa é possível cadastrar a máquina ou atualizar.
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
	 * Em todos os casos o usuário verá todas as máquinas, o status de cada uma e
	 * também saberá se está ou não cadastrada.
	 * Verá dados de acesso e formulário para pesquisar por nome de máquina.
	 */
	public function telaMaquinasAdmin() {
	}
}