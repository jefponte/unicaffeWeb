<?php


class DAO{
	protected $conexao;
	private $tipoDeConexao;
	const TIPO_UNICAFE = 0;
	const TIPO_PG_TESTE = 1;
	const TIPO_SQLITE = 2;
	const TIPO_PG_CAMILA = 3;
	
	public function DAO($conexao = null, $tipo = self::TIPO_PG_TESTE){
		$this->tipoDeConexao = $tipo;
		if($conexao != null){
			$this->conexao = $conexao;
		}else
		{
			
			switch ($this->tipoDeConexao)
			{
				case self::TIPO_PG_TESTE:

					$this->conexao = new PDO("pgsql:host=10.5.1.8 dbname=unicafe user=unicafe password=unicafe@unilab");
					break;
				case self::TIPO_UNICAFE:
					$this->conexao = new UniCafe();
					break;
				case self::TIPO_SQLITE:
					$this->conexao = new PDO('sqlite:dados/banco.bd');
					break;
				case self::TIPO_PG_CAMILA:
					$this->conexao = new PDO("pgsql:host=localhost dbname=unicafe_definitivo user=postgres password=99557722");
					break;
					default:
						$this->conexao = new PDO("pgsql:host=10.5.1.8 dbname=unicafe user=unicafe password=unicafe@unilab");
						break;
			}
			

                        
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