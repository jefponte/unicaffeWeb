<?php


class UsuarioController{
	
	public static function main(){
		$usuarioController = new UsuarioController();
		$usuarioController->telaLogin();
		
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
				header("Location: index.php");
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