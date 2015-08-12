<?php


class UsuarioController{
	
	public static function main($tela){
		switch ($tela){
			case Sessao::NIVEL_SUPER:
				echo 	'<meta http-equiv="refresh" content=1;url="index.php">';
				break;
			case Sessao::NIVEL_DESLOGADO:
				$usuarioController = new UsuarioController();
				$usuarioController->telaLogin();
				break;
			default:
				echo 	'<meta http-equiv="refresh" content=1;url="index.php">';
				break;
		}

		
	}
	
	public static function gerenciamentoSuperAdmin($nivelDeAcesso){
		switch ($nivelDeAcesso)
		{
			case Sessao::NIVEL_SUPER:
				
				break;
			default:
				break;
		}
	}
	public function telaLogin(){
		$usuarioView = new UsuarioView();
		$erro=FALSE;
		if(isset($_POST['formlogin']))
		
		{
			$usuarioDAO = new UsuarioDAO();
			$usuario = new Usuario();
			$usuario->setLogin($_POST['login']);
			$usuario->setSenha($_POST['senha']);
			if($usuarioDAO->autentica($usuario)){
		
				$sessao2 = new Sessao();
				$sessao2->criaSessao($usuario->getId(), $usuario->getNivelAcesso(), $usuario->getLogin());
				echo '<meta http-equiv="refresh" content=1;url="index.php">';
			}else{
				$msg_erro= "Senha ou usuário Inválido";
				$erro=true;
				
				$usuarioView->mostraFormularioLogin($erro, $msg_erro);
				return;
		
			}
		}
		$usuarioView->mostraFormularioLogin();
	}
}
?>