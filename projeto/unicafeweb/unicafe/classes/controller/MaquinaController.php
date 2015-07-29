<?php
class MaquinaController {
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
				$maquinaController->telaMaquinasAdmin ();
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
		$maquinaDAO = new MaquinaDAO ();
		$lista = $maquinaDAO->listaCompleta ();
		
		foreach ( $lista as $maquina ) {
			echo $maquina . '<br>';
		}
	}
	
	/**
	 * Nessa é possível cadastrar a máquina ou atualizar.
	 */
	public function telaMaquinasSuper() {
		$maquinaDAO = new MaquinaDAO ();
		$lista = $maquinaDAO->listaCompleta ();
		
		foreach ( $lista as $maquina ) {
			echo $maquina . '<br>';
		}
	}
	/**
	 * Em todos os casos o usuário verá todas as máquinas, o status de cada uma e
	 * também saberá se está ou não cadastrada.
	 * Verá dados de acesso e formulário para pesquisar por nome de máquina.
	 */
	
	public function telaMaquinasAdmin() {
		$maquinaDAO = new MaquinaDAO ();
		$lista = $maquinaDAO->listaCompleta ();
		
		foreach ( $lista as $maquina ) {
			echo $maquina . '<br>';
		}
	}
}