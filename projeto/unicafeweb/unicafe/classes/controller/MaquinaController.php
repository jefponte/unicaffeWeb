<?php
class MaquinaController {
	const TELA_ADMINISTRADOR = 1;
	const TELA_SUPER = 2;
	
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
			
			case self::TELA_ADMINISTRADOR :
				$maquinaController->telaMaquinasAdmin ();
				break;
			case self::TELA_SUPER :
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
		$lista = $maquinaDAO->ordenaPorNome($lista);
		
		if(isset($_GET['detalhe'])){
			foreach ( $lista as $maquina ) {
				echo '<a href="?detalhe='.$maquina->getNome().'">'.$maquina->getNome().'</a>';
				if($_GET['detalhe']== $maquina->getNome()){
					echo $maquina;
					if($maquina->getStatus() == Maquina::STATUS_OCUPADA){
						echo $maquina->getAcesso();
					}
				}
				echo '<br><br><hr>';
				
			}
			return;
		}
		
		foreach ( $lista as $maquina ) {
			echo '<a href="?detalhe='.$maquina->getNome().'">'.$maquina->getNome().'</a>';
			if(!$maquina->isCadastrada())
				echo 'Nao Cadastrada';
			echo '<br><br><hr>';
		
		}
		
		
	}
	
	/**
	 * Nessa é possível cadastrar a máquina ou atualizar.
	 */
	public function telaMaquinasSuper() {
		$maquinaDAO = new MaquinaDAO ();
		$lista = $maquinaDAO->listaCompleta ();
		$lista = $maquinaDAO->ordenaPorNome($lista);
		if(isset($_GET['cadastrar'])){
			
			echo "Vamos tentar: ";
			$unicafe= new UniCafe();
			echo $unicafe->dialoga('cadastraMaquina('.$_GET['cadastrar'].')');

 			
			
		}
		
		
		if(isset($_GET['detalhe'])){
			
			foreach ( $lista as $maquina ) {
				echo '<a href="?detalhe='.$maquina->getNome().'">'.$maquina->getNome().'</a>';
				if($_GET['detalhe']== $maquina->getNome()){
					echo $maquina;
					if(!$maquina->isCadastrada())
						echo '<br><a href="?cadastrar='.$maquina->getNome().'">Nao Cadastrada</a><br>';
					if($maquina->getStatus() == Maquina::STATUS_OCUPADA){
						echo $maquina->getAcesso();
						echo '<br>'.$maquina->getAcesso()->getUsuario();
						echo 'Laboratorio: '.$maquina->getLaboratorio()->getNome();
					}
				}
				echo '<br><br><hr>';
				
			}
			return;
		}
		
		
		foreach ( $lista as $maquina ) {
			echo '<a href="?detalhe='.$maquina->getNome().'">'.$maquina->getNome().'</a>';
			if(!$maquina->isCadastrada())
				echo '<br><a href="?cadastrar='.$maquina->getNome().'">Nao Cadastrada</a>';

			echo '<br><br><hr>';
		
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
		$lista = $maquinaDAO->ordenaPorNome($lista);
		
		if(isset($_GET['detalhe'])){
			foreach ( $lista as $maquina ) {
				echo '<a href="?detalhe='.$maquina->getNome().'">'.$maquina->getNome().'</a>';
				if($_GET['detalhe']== $maquina->getNome()){
					echo $maquina;
					if($maquina->getStatus() == Maquina::STATUS_OCUPADA){
						echo $maquina->getAcesso();
						echo '<br>'.$maquina->getAcesso()->getUsuario();
						
					}
				}
				echo '<br><br><hr>';
				
			}
			return;
		}
		
		foreach ( $lista as $maquina ) {
			echo '<a href="?detalhe='.$maquina->getNome().'">'.$maquina->getNome().'</a>';
			if(!$maquina->isCadastrada())
				echo 'Nao Cadastrada';
			echo '<br><br><hr>';
		
		}
		
		
	}
}