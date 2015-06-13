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
	
	/**
	 * *  pode vir um insert, select, update ou delete, 
	 * 
	 * Se vier um selecte ele retorna o array com os elementos indexados pela coluna. 
	 * Se vier um update, delete ou insert é algo meio booleano. Vai retornar algo no array ou nulo.
	 * 
	 * @param String $sql
	 * @return multitype:
	 */ 
	public function query($sql){
		$listaDeLinhas = array();
                if($this->tipoDeConexao == self::$TIPO_POSTGRES){
                     $insertSql = pg_query($sql);
                     if(!$insertSql){
                          
                            return FALSE;
                    }else{
                            
                            return TRUE;
                    }
                    
                }else{
                    if(substr_count($sql, "SELECT") || substr_count($sql, "select") ){
			$result = mssql_query($sql, $this->recursoDeConexao);
			while($row = mssql_fetch_array($result)){
				$listaDeLinhas[] = $row;
			}	
		}else{
			$result = mssql_query($sql, $this->recursoDeConexao);
			$listaDeLinhas = $result;
			
			
                    }
                    
                }
		
		
		return $listaDeLinhas;
		
		
	}
	public function rowCount(){
	//contando as linhas afetadas pelo ultimo recurso. 
		
		
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