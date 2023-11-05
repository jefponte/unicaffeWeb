<?php
/**
 * Classe para gerenciar persistência de objetos Usuário no banco de dados. 
 * @author Jefferson Uchôa Ponte
 *
 */
class UsuarioDAO extends DAO {
    /**
     * Verifica se a senha e login correspondem a algum usuário no banco de dados. 
     * @param Usuario $usuario
     * @return boolean
     */
	public function autentica(Usuario $usuario) {
		$login = $usuario->getLogin ();
		$senha = md5 ( $usuario->getSenha () );
		$sql = "SELECT * FROM usuario WHERE login = :login AND senha = :senha";
		
		$stmt = $this->conexao->prepare($sql);
		$stmt->bindParam(":login", $login, PDO::PARAM_STR);
		$stmt->bindParam(":senha", $senha, PDO::PARAM_STR);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach ( $result as $linha ) {
		    $usuario->setLogin ( $linha ['login'] );
		    $usuario->setId ( $linha ['id_usuario'] );
		    
		    $usuario->setNivelAcesso ( $linha ['nivel_acesso'] );
		    return true;
		}
		return false;
		
	}

	/**
	 * Preenche os atributos do objeto usuário através do atributo login. 
	 * @param Usuario $usuario
	 * @return boolean
	 */
	public function preenchePorLogin(Usuario $usuario){
		$login = $usuario->getLogin();
		$sql = "SELECT * FROM usuario WHERE login = '$login'";
		$flag = false;
		foreach($this->getConexao()->query($sql) as $linha){
			$usuario->setId($linha['id_usuario']);
			$flag = true;
			return $flag;
		}
		return $flag;
	}
	/**
	 * Preenche os atributos do objeto laboratório através do atributo login.
	 * @param Laboratorio $laboratorio
	 * @return boolean
	 */
	public function preenchePorNome(Laboratorio $laboratorio){
		$nome = $laboratorio->getNome();
		$sql = "SELECT * FROM laboratorio WHERE nome_laboratorio = '$nome'";
		foreach($this->getConexao()->query($sql) as $linha){
			$laboratorio->setId($linha['id_laboratorio']);
			return true;
		}
		return false;
	}
	/**
	 * Verifica se o usuário já é administrador de um laboratório específico.  
	 * @param Usuario $usuario
	 * @param Laboratorio $laboratorio
	 * @return boolean
	 */
	public function ehAdministrador(Usuario $usuario, Laboratorio $laboratorio){
		$idUsuario = $usuario->getId();
		$idLaboratorio = $laboratorio->getId();
		if($idLaboratorio == 0){
		    return true;
		}
		$sql= "SELECT * FROM administrador WHERE id_usuario = $idUsuario AND id_laboratorio = $idLaboratorio";
		$result =$this->getConexao()->query($sql);
		foreach($result as $linha){
			return true;
		}
		return false;
	}
	/**
	 * Torna um usuário administrador de um laboratório. 
	 * @param Usuario $usuario
	 * @param Laboratorio $laboratorio
	 * @return boolean
	 */
	public function adicionaAdministrador(Usuario $usuario, Laboratorio $laboratorio){
		$novoNivel = Sessao::NIVEL_ADMIN;
		$idUsuario = $usuario->getId();
		$idLaboratorio = $laboratorio->getId();
		
		$sqlUpdate = "UPDATE usuario set nivel_acesso = $novoNivel WHERE id_usuario = $idUsuario";
		$sqlInsert = "INSERT into administrador (id_usuario, id_laboratorio) VALUES($idUsuario, $idLaboratorio)";
		$this->getConexao()->beginTransaction();
		if($this->getConexao()->query($sqlUpdate)){
			if($this->getConexao()->query($sqlInsert)){
				$this->getConexao()->commit();
				return true;
			}
		}
		$this->getConexao()->rollBack();
		return false;
		
	}
	public function tornarSuper(Usuario $usuario){
	    $novoNivel = Sessao::NIVEL_SUPER;
	    $idUsuario = $usuario->getId();
	    
	    $sqlUpdate = "UPDATE usuario set nivel_acesso = $novoNivel WHERE id_usuario = $idUsuario";
	    $sqlDelete = "DELETE FROM administrador WHERE id_usuario = $idUsuario";
	    $this->getConexao()->exec($sqlDelete);
	    return $this->getConexao()->exec($sqlUpdate);
	}
	public function tornarPadrao(Usuario $usuario){
	    $novoNivel = Sessao::NIVEL_COMUM;
	    $idUsuario = $usuario->getId();
	    
	    $sqlUpdate = "UPDATE usuario set nivel_acesso = $novoNivel WHERE id_usuario = $idUsuario";
	    $sqlDelete = "DELETE FROM administrador WHERE id_usuario = $idUsuario";
	    $this->getConexao()->exec($sqlDelete);
	    return $this->getConexao()->exec($sqlUpdate);
	}
	public function retornaAdministradores(){
	    $lista = array();
	    $nivelPadrao = Sessao::NIVEL_COMUM;
	    $sql = "SELECT * FROM usuario WHERE nivel_acesso <> $nivelPadrao";
	    
	    
	    foreach ( $this->getConexao ()->query ( $sql ) as $linha ) {
	        $usuario = new Usuario();
	        $usuario->setLogin ( $linha ['login'] );
	        $usuario->setId ( $linha ['id_usuario'] );
	        $usuario->setNome($linha['nome']);
	        $usuario->setEmail($linha['email']);
	        $usuario->setNivelAcesso($linha['nivel_acesso']);
	        $usuario->setNivelAcesso ( $linha ['nivel_acesso'] );
	        $lista[] = $usuario;
	        
	    }
	    
	    return $lista;
	}
	public function retornaLaboratoriosAdm(Usuario $usuario){
	    $id = $usuario->getId();
	    $lista = array();
	    $sql = "SELECT * FROM usuario 
            INNER JOIN administrador ON usuario.id_usuario = administrador.id_usuario
            INNER JOIN laboratorio ON administrador.id_laboratorio = laboratorio.id_laboratorio
            WHERE usuario.id_usuario = $id;";
	    
	    
	    foreach ( $this->getConexao ()->query ( $sql ) as $linha ) {

	        $laboratorio = new Laboratorio();
	        $laboratorio->setNome($linha['nome_laboratorio']);
	        $lista[] = $laboratorio;
	    }
	    
	    return $lista;
	}
}

?>