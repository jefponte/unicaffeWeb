<?php


class Usuario{
	
	private $id;
	private $nome;
	private $email;
	private $login;
	private $senha;
	private $nivel;
	
	public function setId($id){
		$this->id = $id;
		
	}
	public function setNome($nome){
		$this->nome = $nome;
	}
	public function setEmail($email){
		$this->email = $email;
	}
	public function setLogin($login){
		$this->login =  $login;
	}
	public function setSenha($senha){
		$this->senha = $senha;
	}
	public function setNivel($nivel){
		$this->nivel = $nivel;
	}
	
	
	public function getId(){
		return $this->id;
	}
	public function getNome(){
		return $this->nome;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getLogin(){
		return $this->login;
	}
	public function getSenha(){
		return $this->senha;
	}
	public function getNivel(){
		return $this->nivel;
	}
	
	
	
}

?>