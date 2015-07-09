<?php


class UsuarioDAO extends DAO{
	
	public function autentica(Usuario $usuario){
		$login = $usuario->getLogin();
		$senha = md5($usuario->getSenha());
		$sql = "SELECT * FROM usuario WHERE login ='$login' AND senha = '$senha'";
                
		foreach ($this->getConexao()->query($sql) as $linha){
			$usuario->setLogin($linha['login']);
			$usuario->setId($linha['id_usuario']);
                       
			$usuario->setNivelAcesso($linha['nivel_acesso']);
			return true;
		}
		return false;
	}
	
}

?>