<?php


class UsuarioDAO extends DAO{
	
	
	public function autentica(Usuario $usuario){
		$login = $usuario->getLogin();
		$senha = $usuario->getSenha();
		$sql = "SELECT * FROM usaurio WHERE login ='$login' AND senha = '$senha'";
		foreach ($this->getConexao()->query($sql) as $linha){
			$usuario->setNivel($linha['nivel_acesso']);
			$usuario->setId($linha['usuario_id']);
			$usuario->setNivel($linha['nivel_acesso']);
			return true;
		}
		return false;
	}
	
}

?>