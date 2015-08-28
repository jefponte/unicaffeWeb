<?php
class ComandoController {
	const COMANDO_DESLIGAR = 1;
	const COMANDO_AULA = 2;
	const COMANDO_VISITANTE = 3;
	const COMANDO_BLOQUEIA = 4;
	const COMANDO_ALOCAR = 5;
	const COMANDO_LIGAR  = 6;
	public static function main($nivelDeAcesso) {
		switch ($nivelDeAcesso) {
			case Sessao::NIVEL_SUPER :
				if(isset ( $_GET ['comando']) && isset($_GET ['comando_laboratorio'] )){
					$comandoController = new ComandoController ();
					$comandoController->gerenciaComandoLaboratorio($_GET['comando'], $_GET['comando_laboratorio']);
					return;
				}
				if (isset ( $_GET ['comando'] ) && isset ( $_GET ['maquina'] )) {
					$comandoController = new ComandoController ();
					$comandoController->gerenciaComando ($_GET['comando'], $_GET['maquina']);
					return;
				}
				
				break;
			case Sessao::NIVEL_ADMIN :
				if(isset ( $_GET ['comando']) && isset($_GET ['comando_laboratorio'] )){
					$comandoController = new ComandoController ();
					$comandoController->gerenciaComandoLaboratorioAdmin($_GET['comando'], $_GET['comando_laboratorio']);
					return;
				}
				if(isset ( $_GET ['comando'] ) && isset ( $_GET ['maquina'] )){
					$comandoController = new ComandoController ();
					$comandoController->gerenciaComandoADM ($_GET ['comando'], $_GET['maquina']);
				}
				break;
			default :
				break;
		}
	}
	public function gerenciaComando($comando, $nomeMaquina) {
	
		switch ($comando) {
			case self::COMANDO_DESLIGAR :
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'desliga(' . $nomeMaquina . ')' ) . '</p>';
				
				break;
			case self::COMANDO_AULA :
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'aula(' . $nomeMaquina . ')' ) . '</p>';
				break;
			case self::COMANDO_VISITANTE :
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'visitante(' . $nomeMaquina . ')' ) . '</p>';
				break;
			case self::COMANDO_BLOQUEIA :
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'bloqueia(' . $nomeMaquina . ')' ) . '</p>';
				break;
			case self::COMANDO_ALOCAR :
				if (isset ( $_GET ['laboratorio'] )) {
					$unicafe = new UniCafe ();
					echo '<p>' . $unicafe->dialoga ( 'alocarMaquina(' .$nomeMaquina . ',' . $_GET ['laboratorio'] . ')' ) . '</p>';
				}
				break;
			case self::COMANDO_LIGAR :
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'ligador('.$nomeMaquina.')' ) . '</p>';
				break;
			case 26:
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'atualiza('.$nomeMaquina.')' ) . '</p>';
				break;
			case 25:
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'atualizaMac('.$nomeMaquina.')' ) . '</p>';
				break;
			default :
				echo '<p>Comando desconhecido</p>';
				break;
		}
	}
	public function gerenciaComandoADM($comando, $nomeMaquina) {
		$maquina = new Maquina ();
		$maquina->setNome ($nomeMaquina);
		$maquinaDao = new MaquinaDAO ();
		if (! $maquinaDao->procuraPorNome ( $maquina )) {
			echo "Maquina nao existe";
			return;
		}
		$usuarioDao = new UsuarioDAO ( $maquinaDao->getConexao () );
		$usuario = new Usuario ();
		$sessao = new Sessao ();
		$usuario->setId ( $sessao->getIdUsuario () );
		if (! $usuarioDao->ehAdministrador ( $usuario, $maquina->getLaboratorio () )) {
			echo "Voce nao tem jurisdicao sobre este laboratorio";
			return;
		}
		
		switch ($comando) {
			case self::COMANDO_DESLIGAR :
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'desliga(' . $nomeMaquina. ')' ) . '</p>';
				
				break;
			case self::COMANDO_AULA :
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'aula(' .$nomeMaquina . ')' ) . '</p>';
				break;
			case self::COMANDO_VISITANTE :
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'visitante(' .$nomeMaquina. ')' ) . '</p>';
				break;
			case self::COMANDO_BLOQUEIA :
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'bloqueia(' . $nomeMaquina . ')' ) . '</p>';
				break;
			case self::COMANDO_ALOCAR :
				if (isset ( $_GET ['laboratorio'] )) {
					$unicafe = new UniCafe ();
					echo '<p>' . $unicafe->dialoga ( 'alocarMaquina(' .$nomeMaquina . ',' . $_GET ['laboratorio'] . ')' ) . '</p>';
				}
				break;
			
			default :
				echo '<p>Comando desconhecido</p>';
				break;
		}
	}
	
	
	
	public function gerenciaComandoLaboratorio($comando, $nomeLaboratorio) {
			$maquinaDao = new MaquinaDAO ();
			$lista = $maquinaDao->listaCompleta();
			foreach ($lista as $maquina){
				if(!(strtolower ($maquina->getLaboratorio()->getNome()) == strtolower ( $nomeLaboratorio)))
					continue;
				$this->gerenciaComando($comando, $maquina->getNome());
				
			}
			
	}
	public function gerenciaComandoLaboratorioAdmin($comando, $nomeLaboratorio) {
		$usuarioDao = new UsuarioDAO ( $maquinaDao->getConexao () );
		$usuario = new Usuario ();
		$sessao = new Sessao ();
		$usuario->setId ( $sessao->getIdUsuario () );
		
		$maquinaDao = new MaquinaDAO ();
		$lista = $maquinaDao->listaCompleta();
		foreach ($lista as $maquina){
			if(!(strtolower ($maquina->getLaboratorio()->getNome()) == strtolower ( $nomeLaboratorio)))
				continue;
			if (! $usuarioDao->ehAdministrador ( $usuario, $maquina->getLaboratorio () )) {
				echo "Voce nao tem jurisdicao sobre este laboratorio";
				return;
			}
			$this->gerenciaComando($comando, $maquina->getNome());
	
		}
			
	}
}