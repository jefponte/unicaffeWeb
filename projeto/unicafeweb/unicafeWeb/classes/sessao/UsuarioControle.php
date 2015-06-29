<?php


class UsuarioControle{
	
	
	
	
	public function telaLogin(){
		
		$sessao = new Sessao();
		$usuarioVisao = new UsuarioVisao();
		if($sessao->getNivelAcesso() == Sessao::NIVEL_DESLOGADO){
			if(isset($_POST['formlogin']))
			{
				$usuario = new Usuario();
				$usuario->setLogin($_POST['login']);
				$usuario->setSenha(md5($_POST['senha']));
				$usaurioDAO = new UsuarioDAO();
				
				if($usaurioDAO->autentica($usuario))
					$sessao->criaSessao($usuario->getId(), $usuario->getNivel(), $usuario->getLogin());
				
			}	
			$usuarioVisao->mostraFormLogin();
			
		}
		else 
			$usuarioVisao->mostraSaldacao($sessao->getLoginUsuario());
		
		
		
		
		
	}
	
	
}


?>