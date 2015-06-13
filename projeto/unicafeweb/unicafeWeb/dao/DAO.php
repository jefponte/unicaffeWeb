<?php


class DAO{
	protected $conexao;
	/**
	 * @param mixed $conexao
	 * 
	 */
	public function DAO($conexao = null){
		
		if($conexao != null){
			$this->conexao = $conexao;
		}else
		{
			
			//$this->conexao = new PDO('sqlite:dados/banco.bd');
			//$this->conexao = new PDO ( 'mysql:host=localhost;port=3306;dbname=jefponte_jefponte', 'jefponte_root', 'cocacola@12' );
			//$this->conexao = new Conexao(Conexao::$TIPO_POSTGRES, "localhost", "5432", "postgres", "99557722", "unicafe_definitivo");			
			//$this->conexao = new PDO("pgsql:host=localhost dbname=unicafe_definitivo user=postgres password=99557722");
            //$this->conexao = new UniCafe();
			$this->conexao = new PDO("pgsql:host=localhost dbname=unicafe user=unicafe password=unicafe@unilab");

                        
		}		
	}
	public function setConexao($conexao){
		$this->conexao = $conexao;
	}
	public function getConexao(){
		return $this->conexao;
	}	
    public function fechaConexao(){
            $this->conexao = null;
    }
}



?>