<?php
class DAO {
	protected $conexao;
	private $tipoDeConexao;
	
	public function DAO($conexao = null, $tipo = self::TIPO_DEFAULT) {
		$this->tipoDeConexao = $tipo;
		if ($conexao != null) {
			$this->conexao = $conexao;
		} else {
			
			$this->fazerConexao();
		}
	}
	public function fazerConexao(){
		switch ($this->tipoDeConexao) {
			case self::TIPO_PG_TESTE :
				$this->conexao = new PDO ( "pgsql:host=10.5.1.8 dbname=unicafe user=unicafe password=unicafe@unilab" );
				break;
			case self::TIPO_UNICAFE :
				$this->conexao = new UniCafe ();
				break;
			case self::TIPO_SQLITE :
				$this->conexao = new PDO ( 'sqlite:dados/banco.bd' );
				break;
			case self::TIPO_PG_PRODUCAO :
				$this->conexao = new PDO ( "pgsql:host=localhost dbname=unicafe user=unicafe password=unicafe" );
				break;
			case self::TIPO_PG_PRODUCAO_BAHIA :
				$this->conexao = new PDO ( "pgsql:host=200.128.19.10 dbname=unicafe user=unicafe password=unicafe" );
				break;
			case self::TIPO_PG_PRODUCAO_CEARA :
				$this->conexao = new PDO ( "pgsql:host=200.129.19.40 dbname=unicafe user=unicafe password=unicafe" );
				break;
			case self::TIPO_PG_SIGAA :
				$this->conexao = new PDO ( "pgsql:host=200.129.19.80 dbname=sistemas_comum user=unicafe password=unicafe" );
				break;
			case self::TIPO_PG_SIGAA2 :
				$this->conexao = new PDO ( "pgsql:host=200.129.19.80 dbname=sigaa user=unicafe password=unicafe" );
				break;
			default :
				$this->conexao = new PDO ( "pgsql:host=localhost dbname=unicafe user=unicafe password=unicafe" );
				break;
		}
	}
	public function setConexao($conexao) {
		$this->conexao = $conexao;
	}
	public function getConexao() {
		return $this->conexao;
	}
	public function fechaConexao() {
		$this->conexao = null;
	}
	public function getTipoDeConexao(){
		return $this->tipoDeConexao;
	}
	public function setTipoDeConexao($tipo){
		$this->tipoDeConexao = $tipo;
	}
	const TIPO_UNICAFE = 0;
	const TIPO_PG_TESTE = 1;
	const TIPO_DEFAULT = self::TIPO_PG_PRODUCAO;
	const TIPO_SQLITE = 2;
	const TIPO_PG_CAMILA = 3;
	const TIPO_PG_PRODUCAO = 4;
	const TIPO_PG_SIGAA = 5;
	const TIPO_PG_PRODUCAO_BAHIA = 8;
	const TIPO_PG_PRODUCAO_CEARA = 9;
	const TIPO_PG_SIGAA2 = 7;
	const TIPO_PG_SIMULACAO_SIGAA = 6;
	
	
	public static function criarBanco(){
		
		$dao = new DAO(NULL, DAO::TIPO_PG_PRODUCAO);
		
		// $sql[] = "CREATE TABLE usuarios_unicafe(  id_usuario serial NOT NULL,  nome character varying(200),  email character varying(200),  login character varying(200),  senha character varying(200),  CONSTRAINT usuarios_unicafe_pkey PRIMARY KEY (id_usuario))";
		// $sql[] = "CREATE TABLE maquina(  id_maquina serial NOT NULL,  nome_pc character varying(100),  mac character varying(200),  CONSTRAINT maquina_pkey PRIMARY KEY (id_maquina));";
		// $sql[] = "CREATE TABLE usuario(  nome character varying(200),  email character varying(200),  login character varying(200),  senha character varying(200),  nivel_acesso integer,  id_base_externa integer,  id_usuario serial NOT NULL,  CONSTRAINT usuario_pkey PRIMARY KEY (id_usuario));";
		// $sql[] = "CREATE TABLE laboratorio(  id_laboratorio serial NOT NULL,  nome_laboratorio character varying(200),  CONSTRAINT laboratorio_pkey PRIMARY KEY (id_laboratorio));";
		// $sql[] = "CREATE TABLE laboratorio_maquina(  id_laboratorio_maquina serial NOT NULL,  id_maquina integer,  id_laboratorio integer,  CONSTRAINT laboratorio_maquina_pkey PRIMARY KEY (id_laboratorio_maquina),  CONSTRAINT laboratorio_maquina_id_laboratorio_fkey FOREIGN KEY (id_laboratorio)      REFERENCES laboratorio (id_laboratorio) MATCH SIMPLE      ON UPDATE NO ACTION ON DELETE NO ACTION,  CONSTRAINT laboratorio_maquina_id_maquina_fkey FOREIGN KEY (id_maquina)      REFERENCES maquina (id_maquina) MATCH SIMPLE      ON UPDATE NO ACTION ON DELETE NO ACTION);";
		// $sql[] = "CREATE TABLE administrador(  id_administrador serial NOT NULL,  id_usuario integer,  id_laboratorio integer,  CONSTRAINT administrador_pkey PRIMARY KEY (id_administrador),  CONSTRAINT administrador_id_laboratorio_fkey FOREIGN KEY (id_laboratorio)      REFERENCES laboratorio (id_laboratorio) MATCH SIMPLE      ON UPDATE NO ACTION ON DELETE NO ACTION,  CONSTRAINT administrador_id_usuario_fkey FOREIGN KEY (id_usuario)      REFERENCES usuario (id_usuario) MATCH SIMPLE      ON UPDATE NO ACTION ON DELETE NO ACTION);";
		// $sql[] = "CREATE TABLE acesso(  id_acesso serial NOT NULL,  hora_inicial timestamp without time zone,  tempo_oferecido integer,  tempo_usado integer,  ip character varying(200),  id_usuario integer,  id_maquina integer,  CONSTRAINT acesso_pkey PRIMARY KEY (id_acesso),  CONSTRAINT acesso_id_maquina_fkey FOREIGN KEY (id_maquina)      REFERENCES maquina (id_maquina) MATCH SIMPLE      ON UPDATE NO ACTION ON DELETE NO ACTION,  CONSTRAINT acesso_id_usuario_fkey FOREIGN KEY (id_usuario)      REFERENCES usuario (id_usuario) MATCH SIMPLE      ON UPDATE NO ACTION ON DELETE NO ACTION);";
		
		foreach($sql as $strSql){
		
			$dao->getConexao()->query($strSql);
		}
		
		
	}
	
}

?>