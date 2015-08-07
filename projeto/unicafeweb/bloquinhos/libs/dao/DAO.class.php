<?php


class DAO{
	
	private $conexao;
	
	public function setConexao(PDO $conexao){
		$this->conexao = $conexao;
	}
	public function getConexao(){
		return $this->conexao;
	}
	

	
}