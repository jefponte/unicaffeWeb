<?php

/*********
  * Copyright (c) 12/07/2017 {INITIAL COPYRIGHT UNILAB} {OTHER COPYRIGHT LABPATI/DISUP/DTI}.
  * All rights reserved. This program and the accompanying materials
  * are made available under the terms of the Eclipse Public License v1.0
  * which accompanies this distribution, and is available at
  * http://www.eclipse.org/legal/epl-v10.html
  *
  * Contributors:
  *    Jefferson Uchôa Ponte - initial API and implementation and/or initial documentation
  *********/
class DAO {
	const ARQUIVO_CONFIGURACAO = "/dados/unicaffe/config.ini";
	const TIPO_UNICAFFE = 0;
	const TIPO_DEFAULT = 1;
	const TIPO_USUARIOS = 2;
	const TIPO_AUTENTICACAO = 3;
	
	
	protected $conexao;
	private $tipoDeConexao;
	private $sgbb;
	private $entidade;
	
	public function getEntidade(){
		return $this->entidade;
	}
	/**
	 * @param unknown $conexao // Pode ser PDO ou UniCaffe. 
	 * @param unknown $tipo
	 */
	public function __construct($conexao = null, $tipo = self::TIPO_DEFAULT) {
		$this->tipoDeConexao = $tipo;
		if ($conexao != null) {
			$this->conexao = $conexao;
		} else {
			$this->fazerConexao ();
		}
	}
	public function fazerConexao() {
		$config = parse_ini_file ( self::ARQUIVO_CONFIGURACAO );
		
		switch ($this->tipoDeConexao) {
			case self::TIPO_UNICAFFE:
				$bd ['sgdb'] = "unicaffe";
				break;
			case self::TIPO_USUARIOS :
				$bd ['sgdb'] = $config ['usuarios_sgdb'];
				$bd ['nome'] = $config ['usuarios_bd_nome'];
				$bd ['host'] = $config ['usuarios_host'];
				$bd ['porta'] = $config ['usuarios_porta'];
				$bd ['usuario'] = $config ['usuarios_usuario'];
				$bd ['senha'] = $config ['usuarios_senha'];
				$this->entidade = $config['usuarios_entidade_nome'];
				break;
			case self::TIPO_AUTENTICACAO:
				$bd ['sgdb'] = $config ['autenticacao_sgdb'];
				$bd ['nome'] = $config ['autenticacao_bd_nome'];
				$bd ['host'] = $config ['autenticacao_host'];
				$bd ['porta'] = $config ['autenticacao_porta'];
				$bd ['usuario'] = $config ['autenticacao_usuario'];
				$bd ['senha'] = $config ['autenticacao_senha'];
				$this->entidade = $config['autenticacao_entidade_nome'];
				break;
			default :
				$bd ['sgdb'] = $config ['default_sgdb'];
				$bd ['nome'] = $config ['default_bd_nome'];
				$bd ['host'] = $config ['default_host'];
				$bd ['porta'] = $config ['default_porta'];
				$bd ['usuario'] = $config ['default_usuario'];
				$bd ['senha'] = $config ['default_senha'];
		}
	

		if ($bd ['sgdb'] == "postgres") {
			
			$this->conexao = new PDO ( 'pgsql:host=' . $bd ['host'] . ' dbname=' . $bd ['nome'] . ' user=' . $bd ['usuario'] . ' password=' . $bd ['senha'] );
		} else if ($bd ['sgdb'] == "mssql") {
			$this->conexao = new PDO ( 'dblib:host=' . $bd ['host'] . ';dbname=' . $bd ['nome'], $bd ['usuario'], $bd ['senha'] );
		} else if ($bd ['sgdb'] == "sqlite") {
			$this->conexao = new PDO ( 'sqlite:' . $bd ['nome'] );
			
		}else if($bd['sgdb'] == "unicaffe"){
			$this->conexao = new UniCaffe($config ['unicaffe_host'], $config ['unicaffe_porta']);
		}
		$this->sgdb = $bd ['sgdb'];
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
	public function getTipoDeConexao() {
		return $this->tipoDeConexao;
	}
	public function setTipoDeConexao($tipo) {
		$this->tipoDeConexao = $tipo;
	}
	public static function criarBanco() {
		$dao = new DAO ();
		$sql[] = "CREATE TABLE usuarios_unicafe( id_usuario serial NOT NULL, nome character varying(200), email character varying(200), login character varying(200), senha character varying(200), CONSTRAINT usuarios_unicafe_pkey PRIMARY KEY (id_usuario))";
		$sql[] = "CREATE TABLE maquina( id_maquina serial NOT NULL, nome_pc character varying(100), mac character varying(200), CONSTRAINT maquina_pkey PRIMARY KEY (id_maquina));";
		$sql[] = "CREATE TABLE usuario( nome character varying(200), email character varying(200), login character varying(200), senha character varying(200), nivel_acesso integer, id_base_externa integer, id_usuario serial NOT NULL, CONSTRAINT usuario_pkey PRIMARY KEY (id_usuario));";
		$sql[] = "CREATE TABLE laboratorio( id_laboratorio serial NOT NULL, nome_laboratorio character varying(200), CONSTRAINT laboratorio_pkey PRIMARY KEY (id_laboratorio));";
		$sql[] = "CREATE TABLE laboratorio_maquina( id_laboratorio_maquina serial NOT NULL, id_maquina integer, id_laboratorio integer, CONSTRAINT laboratorio_maquina_pkey PRIMARY KEY (id_laboratorio_maquina), CONSTRAINT laboratorio_maquina_id_laboratorio_fkey FOREIGN KEY (id_laboratorio) REFERENCES laboratorio (id_laboratorio) MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION, CONSTRAINT laboratorio_maquina_id_maquina_fkey FOREIGN KEY (id_maquina) REFERENCES maquina (id_maquina) MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION);";
		$sql[] = "CREATE TABLE administrador( id_administrador serial NOT NULL, id_usuario integer, id_laboratorio integer, CONSTRAINT administrador_pkey PRIMARY KEY (id_administrador), CONSTRAINT administrador_id_laboratorio_fkey FOREIGN KEY (id_laboratorio) REFERENCES laboratorio (id_laboratorio) MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION, CONSTRAINT administrador_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario) MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION);";
		$sql[] = "CREATE TABLE acesso( id_acesso serial NOT NULL, hora_inicial timestamp without time zone, tempo_oferecido integer, tempo_usado integer, ip character varying(200), id_usuario integer, id_maquina integer, CONSTRAINT acesso_pkey PRIMARY KEY (id_acesso), CONSTRAINT acesso_id_maquina_fkey FOREIGN KEY (id_maquina) REFERENCES maquina (id_maquina) MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION, CONSTRAINT acesso_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario) MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION);";
		foreach ( $sql as $strSql ) {
			$dao->getConexao ()->query ( $strSql );
		}
	}
}

?>