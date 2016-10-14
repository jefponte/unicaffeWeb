<?php
class ComandoController {
	const COMANDO_DESLIGAR = 1;
	const COMANDO_AULA = 2;
	const COMANDO_VISITANTE = 3;
	const COMANDO_BLOQUEIA = 4;
	const COMANDO_ALOCAR = 5;
	const COMANDO_LIGAR  = 6;
	const COMANDO_SEM_INTERNET = 9;
	const COMANDO_COM_INTERNET = 10;
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
				$unicafe->close();
				break;
			case self::COMANDO_AULA :
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'aula(' . $nomeMaquina . ')' ) . '</p>';
				$unicafe->close();
				break;
			case self::COMANDO_VISITANTE :
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'visitante(' . $nomeMaquina . ')' ) . '</p>';
				$unicafe->close();
				break;
			case self::COMANDO_SEM_INTERNET:
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall set  allprofiles state on)' ) . '</p>';
				$unicafe->close();
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall firewall add rule name="LIBCE" enable=yes remoteip=200.129.19.0/24 action=allow protocol=TCP dir=out )' ) . '</p>';
				$unicafe->close();
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'exec(' . $nomeMaquina . ', netsh advfirewall firewall add rule name="LIBSFC" enable=yes remoteip=200.128.19.0/24 action=allow protocol=TCP dir=out)' ) . '</p>';
				$unicafe->close();
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall firewall add rule name="LIBINT" enable=yes remoteip=10.0.0.0/8 action=allow protocol=TCP dir=out )' ) . '</p>';
				$unicafe->close();
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall set currentprofile firewallpolicy blockinbound,blockoutbound)' ) . '</p>';
				$unicafe->close();
				break;
				
			case self::COMANDO_COM_INTERNET:
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall firewall delete rule name="LIBCE")' ) . '</p>';
				$unicafe->close();
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'exec(' . $nomeMaquina . ', netsh advfirewall firewall delete rule name="LIBSFC")' ) . '</p>';
				$unicafe->close();
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall firewall delete rule name="LIBINT")' ) . '</p>';
				$unicafe->close();
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall set currentprofile firewallpolicy blockinbound,allowoutbound)' ) . '</p>';
				$unicafe->close();
				break;
				
			case self::COMANDO_BLOQUEIA :
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'bloqueia(' . $nomeMaquina . ')' ) . '</p>';
				$unicafe->close();
				break;
			case self::COMANDO_ALOCAR :
				if (isset ( $_GET ['laboratorio'] )) {
					$unicafe = new UniCafe ();
					echo '<p>' . $unicafe->dialoga ( 'alocarMaquina(' .$nomeMaquina . ',' . $_GET ['laboratorio'] . ')' ) . '</p>';
				}
				$unicafe->close();
				break;
			case self::COMANDO_LIGAR :
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'ligador('.$nomeMaquina.')' ) . '</p>';
				$unicafe->close();
				break;
			case self::COMANDO_SEM_INTERNET:
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall set  allprofiles state on)' ) . '</p>';
				$unicafe->close();
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall firewall add rule name="LIBCE" enable=yes remoteip=200.129.19.0/24 action=allow protocol=TCP dir=out )' ) . '</p>';
				$unicafe->close();
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'exec(' . $nomeMaquina . ', netsh advfirewall firewall add rule name="LIBSFC" enable=yes remoteip=200.128.19.0/24 action=allow protocol=TCP dir=out)' ) . '</p>';
				$unicafe->close();
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall firewall add rule name="LIBINT" enable=yes remoteip=10.0.0.0/8 action=allow protocol=TCP dir=out )' ) . '</p>';
				$unicafe->close();
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall set currentprofile firewallpolicy blockinbound,blockoutbound)' ) . '</p>';
				$unicafe->close();
				break;
			
			case self::COMANDO_COM_INTERNET:
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall firewall delete rule name="LIBCE")' ) . '</p>';
				$unicafe->close();
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'exec(' . $nomeMaquina . ', netsh advfirewall firewall delete rule name="LIBSFC")' ) . '</p>';
				$unicafe->close();
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall firewall delete rule name="LIBINT")' ) . '</p>';
				$unicafe->close();
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall set currentprofile firewallpolicy blockinbound,allowoutbound)' ) . '</p>';
				$unicafe->close();
				break;
			case 26:
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'atualiza('.$nomeMaquina.')' ) . '</p>';
				$unicafe->close();
				break;
			case 25:
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'atualizaMac('.$nomeMaquina.')' ) . '</p>';
				$unicafe->close();
				break;
			case 300:
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'desativar('.$nomeMaquina.')' ) . '</p>';
				$unicafe->close();
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
				$unicafe->close();
				break;
			case self::COMANDO_AULA :
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'aula(' .$nomeMaquina . ')' ) . '</p>';
				$unicafe->close();
				break;
			case self::COMANDO_VISITANTE :
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'visitante(' .$nomeMaquina. ')' ) . '</p>';
				$unicafe->close();
				break;
				case self::COMANDO_SEM_INTERNET:
					$unicafe = new UniCafe ();
					echo '<p>' . $unicafe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall set  allprofiles state on)' ) . '</p>';
					$unicafe->close();
					$unicafe = new UniCafe ();
					echo '<p>' . $unicafe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall firewall add rule name="LIBCE" enable=yes remoteip=200.129.19.0/24 action=allow protocol=TCP dir=out )' ) . '</p>';
					$unicafe->close();
					$unicafe = new UniCafe ();
					echo '<p>' . $unicafe->dialoga ( 'exec(' . $nomeMaquina . ', netsh advfirewall firewall add rule name="LIBSFC" enable=yes remoteip=200.128.19.0/24 action=allow protocol=TCP dir=out)' ) . '</p>';
					$unicafe->close();
					$unicafe = new UniCafe ();
					echo '<p>' . $unicafe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall firewall add rule name="LIBINT" enable=yes remoteip=10.0.0.0/8 action=allow protocol=TCP dir=out )' ) . '</p>';
					$unicafe->close();
					$unicafe = new UniCafe ();
					echo '<p>' . $unicafe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall set currentprofile firewallpolicy blockinbound,blockoutbound)' ) . '</p>';
					$unicafe->close();
					break;
				
				case self::COMANDO_COM_INTERNET:
					$unicafe = new UniCafe ();
					echo '<p>' . $unicafe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall firewall delete rule name="LIBCE")' ) . '</p>';
					$unicafe->close();
					$unicafe = new UniCafe ();
					echo '<p>' . $unicafe->dialoga ( 'exec(' . $nomeMaquina . ', netsh advfirewall firewall delete rule name="LIBSFC")' ) . '</p>';
					$unicafe->close();
					$unicafe = new UniCafe ();
					echo '<p>' . $unicafe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall firewall delete rule name="LIBINT")' ) . '</p>';
					$unicafe->close();
					$unicafe = new UniCafe ();
					echo '<p>' . $unicafe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall set currentprofile firewallpolicy blockinbound,allowoutbound)' ) . '</p>';
					$unicafe->close();
					break;
			case self::COMANDO_BLOQUEIA :
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'bloqueia(' . $nomeMaquina . ')' ) . '</p>';
				$unicafe->close();
				break;
			case self::COMANDO_ALOCAR :
				if (isset ( $_GET ['laboratorio'] )) {
					$unicafe = new UniCafe ();
					echo '<p>' . $unicafe->dialoga ( 'alocarMaquina(' .$nomeMaquina . ',' . $_GET ['laboratorio'] . ')' ) . '</p>';
				}
				$unicafe->close();
				break;
			case 300:
				$unicafe = new UniCafe ();
				echo '<p>' . $unicafe->dialoga ( 'desativar('.$nomeMaquina.')' ) . '</p>';
				$unicafe->close();
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
		$usuarioDao = new UsuarioDAO ();
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