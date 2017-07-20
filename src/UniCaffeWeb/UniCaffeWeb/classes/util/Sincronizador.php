<?php

/**
 * 
 * @author Jefferson Uchôa Ponte
 * 
 *
 */
class Sincronizador {
	private $conexaoOrigem;
	private $conexaoDestino;
	private $entidadeOrigem;
	private $entidadeDestino;
	private $campos;
	public function __construct(PDO $conexaoOrigem, PDO $conexaoDestino, $entidadeOrigem, $entidadeDestino) {
		$this->conexaoOrigem = $conexaoOrigem;
		$this->conexaoDestino = $conexaoDestino;
		$this->entidadeOrigem = $entidadeOrigem;
		$this->entidadeDestino = $entidadeDestino;
		$campos = array ();
	}
	public function addCampo($campoOrigem, $campoDestino) {
		$this->campos [$campoOrigem] = $campoDestino;
	}
	
	public function sincronizar() {
		$this->conexaoDestino->beginTransaction ();
		$sqlDelete = "DELETE FROM " . $this->entidadeDestino;
		$b = $this->conexaoDestino->exec ( $sqlDelete );
		echo "Deletei " . $b . " linhas da entidade de destino<br>";
		$sql = "SELECT * FROM " . $this->entidadeOrigem;
		$result = $this->conexaoOrigem->query ( $sql );
		foreach ( $result as $linha ) {
			$sql = "INSERT INTO " . $this->entidadeDestino . " (";
			$i = 0;
			foreach ( $this->campos as $chave => $valor ) {
				$i ++;
				if ($i != count ( $this->campos )) {
					$sql .= $valor . ", ";
				}
			}
			$sql .= $valor . ") VALUES(";
			$i = 0;
			foreach ( $this->campos as $chave => $valor ) {
				$i ++;
				if ($linha [$chave] == null || $linha [$chave] == '') {
					$sql .= "null";
				} else {
					$sql .= ":" . $valor;
				}
				
				if ($i != count ( $this->campos )) {
					$sql .= ", ";
				}
			}
			$sql .= "); ";
			
			try {
				$stmt = $this->conexaoDestino->prepare ( $sql );
				$h = 0;
				foreach ( $this->campos as $chave => $valor ) {
					$$valor = $linha [$chave];
					$conteudo = $linha [$chave];
					if (is_string ( $conteudo )) {
						
						$$valor = preg_replace ( '/[^a-zA-Z0-9\s]/', '', $$valor );
						$stmt->bindParam ( $valor, $$valor, PDO::PARAM_STR );
					} else if (is_int ( $conteudo )) {
						$stmt->bindParam ( $valor, $$valor, PDO::PARAM_INT );
					}
				}
				
				if (! $stmt->execute ()) {
					$this->conexaoDestino->rollBack ();
					echo "Errei aqui: " . $sql;
					print_r ( $linha );
					return;
				}
			} catch ( PDOException $e ) {
				echo '{"error":{"text":' . $e->getMessage () . '}}';
			}
		}
		$this->conexaoDestino->commit ();
	}
	
	
	public function setCampos($campos) {
		$this->campos = $campos;
	}
	public static function main() {
		if (self::jaFoiAtualizado ()) {
			return;
		}
		$dao = new DAO (null, DAO::TIPO_PG_SIGAA);
		$entidadeOrigem = "usuarios_unicafe";
		$conexaoOrigem = $dao->getConexao ();
		$dao = new DAO (null, DAO::TIPO_PG_PRODUCAO_BAHIA);
		$conexaoDestino = $dao->getConexao ();
		$entidadeDestino = "usuarios_unicafe";
		$sincronizador = new Sincronizador ( $conexaoOrigem, $conexaoDestino, $entidadeOrigem, $entidadeDestino );
		$campos = [
				"id_usuario" => "id_usuario",
				"nome" => "nome",
				"email" => "email",
				"login" => "login",
				"senha" => "senha" 
		];
		$sincronizador->setCampos ( $campos );
		$sincronizador->sincronizar ();
	}
	public static function jaFoiAtualizado() {
		if (! file_exists ( self::ARQUIVO )) {
			$fp = fopen ( self::ARQUIVO, "a" );
			fwrite ( $fp, "ultima_atualizacao = 2017-04-25 11:35:00" );
			fclose ( $fp );
		}
		$config = parse_ini_file ( self::ARQUIVO );
		$dataDaUltimaAtualizacao = $config ['ultima_atualizacao'];
		$hoje = date ( "Y-m-d G:i:s" );
		if ($dataDaUltimaAtualizacao == $hoje) {
			return true;
		}
		if (! is_writable ( self::ARQUIVO )) {
			return true;
		}
		$escrever = fopen ( self::ARQUIVO, "w" );
		$hoje = date ( "Y-m-d G:i:s" );
		if (! fwrite ( $escrever, "ultima_atualizacao = " . $hoje )) {
			return true;
		}
		fclose ( $escrever );
		return false;
	}
	const ARQUIVO = "ultima_sincronizacao.ini";
}
?>