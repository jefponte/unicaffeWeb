<?php

class Conexao{
	private $recursoDeConexao;
	private $tipoDeConexao;
	private $ultimoIdInserido; 
	
	
	public function Conexao($tipoDeConexao, $host, $porta, $usuario , $senha, $banco = null){
		
		$this->tipoDeConexao = $tipoDeConexao;
		if ($tipoDeConexao == self::$TIPO_POSTGRES){
                    $conn = "host=$host port=$porta dbname=$banco user=$usuario password=$senha";
                    $this->recursoDeConexao =  pg_connect($conn);
                }
	}
	
    public function fechar(){
            $this->recursoDeConexao = null;
    }
	public function query($sql){
      
	}
	public function rowCount(){
		
		
	}
	public function lastInsertId(){ 
		$sql = "SELECT SCOPE_IDENTITY()";
		$result = mssql_query($sql, $this->recursoDeConexao);
		$vetor = $this->query($sql);
		return $vetor[0][0];
	}
	
	
        
        public static $TIPO_POSTGRES = 0;
        public static $TIPO_UNICAFE = 1;
        public static $TIPO_SQLITE = 2;
        
         
}



?>