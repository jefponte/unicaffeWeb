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
	const COMANDO_APAGAR = 99;
	
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
			case self::COMANDO_APAGAR:
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'limparDados(' . $nomeMaquina . ')' ) . '</p>';
				$unicaffe->close();
				break;
			case self::COMANDO_DESLIGAR :
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'desliga(' . $nomeMaquina . ')' ) . '</p>';
				$unicaffe->close();
				break;
			case self::COMANDO_AULA :
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'aula(' . $nomeMaquina . ')' ) . '</p>';
				$unicaffe->close();
				break;
			case self::COMANDO_VISITANTE :
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'visitante(' . $nomeMaquina . ')' ) . '</p>';
				$unicaffe->close();
				break;
			case self::COMANDO_SEM_INTERNET:
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall set  allprofiles state on)' ) . '</p>';
				$unicaffe->close();
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall firewall add rule name="LIBCE" enable=yes remoteip=200.129.19.0/24 action=allow protocol=TCP dir=out )' ) . '</p>';
				$unicaffe->close();
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'exec(' . $nomeMaquina . ', netsh advfirewall firewall add rule name="LIBSFC" enable=yes remoteip=200.128.19.0/24 action=allow protocol=TCP dir=out)' ) . '</p>';
				$unicaffe->close();
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall firewall add rule name="LIBINT" enable=yes remoteip=10.0.0.0/8 action=allow protocol=TCP dir=out )' ) . '</p>';
				$unicaffe->close();
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall set currentprofile firewallpolicy blockinbound,blockoutbound)' ) . '</p>';
				$unicaffe->close();
				break;
				
			case self::COMANDO_COM_INTERNET:
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall firewall delete rule name="LIBCE")' ) . '</p>';
				$unicaffe->close();
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'exec(' . $nomeMaquina . ', netsh advfirewall firewall delete rule name="LIBSFC")' ) . '</p>';
				$unicaffe->close();
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall firewall delete rule name="LIBINT")' ) . '</p>';
				$unicaffe->close();
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall set currentprofile firewallpolicy blockinbound,allowoutbound)' ) . '</p>';
				$unicaffe->close();
				break;
				
			case self::COMANDO_BLOQUEIA :
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'bloqueia(' . $nomeMaquina . ')' ) . '</p>';
				$unicaffe->close();
				break;
			case self::COMANDO_ALOCAR :
				if (isset ( $_GET ['laboratorio'] )) {
					$unicaffe = new UniCaffe ();
					echo '<p>' . $unicaffe->dialoga ( 'alocarMaquina(' .$nomeMaquina . ',' . $_GET ['laboratorio'] . ')' ) . '</p>';
				}
				$unicaffe->close();
				break;
			case self::COMANDO_LIGAR :
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'ligador('.$nomeMaquina.')' ) . '</p>';
				$unicaffe->close();
				break;
			case self::COMANDO_SEM_INTERNET:
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall set  allprofiles state on)' ) . '</p>';
				$unicaffe->close();
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall firewall add rule name="LIBCE" enable=yes remoteip=200.129.19.0/24 action=allow protocol=TCP dir=out )' ) . '</p>';
				$unicaffe->close();
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'exec(' . $nomeMaquina . ', netsh advfirewall firewall add rule name="LIBSFC" enable=yes remoteip=200.128.19.0/24 action=allow protocol=TCP dir=out)' ) . '</p>';
				$unicaffe->close();
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall firewall add rule name="LIBINT" enable=yes remoteip=10.0.0.0/8 action=allow protocol=TCP dir=out )' ) . '</p>';
				$unicaffe->close();
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall set currentprofile firewallpolicy blockinbound,blockoutbound)' ) . '</p>';
				$unicaffe->close();
				break;
			
			case self::COMANDO_COM_INTERNET:
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall firewall delete rule name="LIBCE")' ) . '</p>';
				$unicaffe->close();
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'exec(' . $nomeMaquina . ', netsh advfirewall firewall delete rule name="LIBSFC")' ) . '</p>';
				$unicaffe->close();
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall firewall delete rule name="LIBINT")' ) . '</p>';
				$unicaffe->close();
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall set currentprofile firewallpolicy blockinbound,allowoutbound)' ) . '</p>';
				$unicaffe->close();
				break;
			case 26:
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'atualiza('.$nomeMaquina.')' ) . '</p>';
				$unicaffe->close();
				break;
			case 25:
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'atualizaMac('.$nomeMaquina.')' ) . '</p>';
				$unicaffe->close();
				break;
			case 300:
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'desativar('.$nomeMaquina.')' ) . '</p>';
				$unicaffe->close();
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
			case self::COMANDO_APAGAR:
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'limparDados(' . $nomeMaquina . ')' ) . '</p>';
				$unicaffe->close();
				break;
			case self::COMANDO_DESLIGAR :
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'desliga(' . $nomeMaquina. ')' ) . '</p>';
				$unicaffe->close();
				break;
			case self::COMANDO_AULA :
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'aula(' .$nomeMaquina . ')' ) . '</p>';
				$unicaffe->close();
				break;
			case self::COMANDO_VISITANTE :
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'visitante(' .$nomeMaquina. ')' ) . '</p>';
				$unicaffe->close();
				break;
				case self::COMANDO_SEM_INTERNET:
					$unicaffe = new UniCaffe ();
					echo '<p>' . $unicaffe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall set  allprofiles state on)' ) . '</p>';
					$unicaffe->close();
					$unicaffe = new UniCaffe ();
					echo '<p>' . $unicaffe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall firewall add rule name="LIBCE" enable=yes remoteip=200.129.19.0/24 action=allow protocol=TCP dir=out )' ) . '</p>';
					$unicaffe->close();
					$unicaffe = new UniCaffe ();
					echo '<p>' . $unicaffe->dialoga ( 'exec(' . $nomeMaquina . ', netsh advfirewall firewall add rule name="LIBSFC" enable=yes remoteip=200.128.19.0/24 action=allow protocol=TCP dir=out)' ) . '</p>';
					$unicaffe->close();
					$unicaffe = new UniCaffe ();
					echo '<p>' . $unicaffe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall firewall add rule name="LIBINT" enable=yes remoteip=10.0.0.0/8 action=allow protocol=TCP dir=out )' ) . '</p>';
					$unicaffe->close();
					$unicaffe = new UniCaffe ();
					echo '<p>' . $unicaffe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall set currentprofile firewallpolicy blockinbound,blockoutbound)' ) . '</p>';
					$unicaffe->close();
					break;
				
				case self::COMANDO_COM_INTERNET:
					$unicaffe = new UniCaffe ();
					echo '<p>' . $unicaffe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall firewall delete rule name="LIBCE")' ) . '</p>';
					$unicaffe->close();
					$unicaffe = new UniCaffe ();
					echo '<p>' . $unicaffe->dialoga ( 'exec(' . $nomeMaquina . ', netsh advfirewall firewall delete rule name="LIBSFC")' ) . '</p>';
					$unicaffe->close();
					$unicaffe = new UniCaffe ();
					echo '<p>' . $unicaffe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall firewall delete rule name="LIBINT")' ) . '</p>';
					$unicaffe->close();
					$unicaffe = new UniCaffe ();
					echo '<p>' . $unicaffe->dialoga ( 'exec(' . $nomeMaquina . ',netsh advfirewall set currentprofile firewallpolicy blockinbound,allowoutbound)' ) . '</p>';
					$unicaffe->close();
					break;
			case self::COMANDO_BLOQUEIA :
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'bloqueia(' . $nomeMaquina . ')' ) . '</p>';
				$unicaffe->close();
				break;
			case self::COMANDO_ALOCAR :
				if (isset ( $_GET ['laboratorio'] )) {
					$unicaffe = new UniCaffe ();
					echo '<p>' . $unicaffe->dialoga ( 'alocarMaquina(' .$nomeMaquina . ',' . $_GET ['laboratorio'] . ')' ) . '</p>';
				}
				$unicaffe->close();
				break;
			case 26:
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'atualiza('.$nomeMaquina.')' ) . '</p>';
				$unicaffe->close();
				break;

			case 300:
				$unicaffe = new UniCaffe ();
				echo '<p>' . $unicaffe->dialoga ( 'desativar('.$nomeMaquina.')' ) . '</p>';
				$unicaffe->close();
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