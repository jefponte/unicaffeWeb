<?php

date_default_timezone_set ( 'America/Araguaina' );

ini_set ( 'display_errors', 1 );
ini_set ( 'display_startup_erros', 1 );
error_reporting ( E_ALL );

$sessao = new Sessao ();

function __autoload($classe) {
	if (file_exists ( 'classes/dao/' . $classe . '.php' ))
		include_once 'classes/dao/' . $classe . '.php';
		if (file_exists ( 'classes/model/' . $classe . '.php' ))
			include_once 'classes/model/' . $classe . '.php';
			if (file_exists ( 'classes/controller/' . $classe . '.php' ))
				include_once 'classes/controller/' . $classe . '.php';
				if (file_exists ( 'classes/util/' . $classe . '.php' ))
					include_once 'classes/util/' . $classe . '.php';
					if (file_exists ( 'classes/view/' . $classe . '.php' ))
						include_once 'classes/view/' . $classe . '.php';


}


$dao = new DAO(NULL, DAO::TIPO_PG_PRODUCAO);

// $sql[] = "CREATE TABLE usuarios_unicafe(  id_usuario serial NOT NULL,  nome character varying(200),  email character varying(200),  login character varying(200),  senha character varying(200),  CONSTRAINT usuarios_unicafe_pkey PRIMARY KEY (id_usuario))";
// $sql[] = "CREATE TABLE maquina(  id_maquina serial NOT NULL,  nome_pc character varying(100),  mac character varying(200),  CONSTRAINT maquina_pkey PRIMARY KEY (id_maquina));";
// $sql[] = "CREATE TABLE usuario(  nome character varying(200),  email character varying(200),  login character varying(200),  senha character varying(200),  nivel_acesso integer,  id_base_externa integer,  id_usuario serial NOT NULL,  CONSTRAINT usuario_pkey PRIMARY KEY (id_usuario));";
// $sql[] = "CREATE TABLE laboratorio(  id_laboratorio serial NOT NULL,  nome_laboratorio character varying(200),  CONSTRAINT laboratorio_pkey PRIMARY KEY (id_laboratorio));";
// $sql[] = "CREATE TABLE laboratorio_maquina(  id_laboratorio_maquina serial NOT NULL,  id_maquina integer,  id_laboratorio integer,  CONSTRAINT laboratorio_maquina_pkey PRIMARY KEY (id_laboratorio_maquina),  CONSTRAINT laboratorio_maquina_id_laboratorio_fkey FOREIGN KEY (id_laboratorio)      REFERENCES laboratorio (id_laboratorio) MATCH SIMPLE      ON UPDATE NO ACTION ON DELETE NO ACTION,  CONSTRAINT laboratorio_maquina_id_maquina_fkey FOREIGN KEY (id_maquina)      REFERENCES maquina (id_maquina) MATCH SIMPLE      ON UPDATE NO ACTION ON DELETE NO ACTION);";
// $sql[] = "CREATE TABLE administrador(  id_administrador serial NOT NULL,  id_usuario integer,  id_laboratorio integer,  CONSTRAINT administrador_pkey PRIMARY KEY (id_administrador),  CONSTRAINT administrador_id_laboratorio_fkey FOREIGN KEY (id_laboratorio)      REFERENCES laboratorio (id_laboratorio) MATCH SIMPLE      ON UPDATE NO ACTION ON DELETE NO ACTION,  CONSTRAINT administrador_id_usuario_fkey FOREIGN KEY (id_usuario)      REFERENCES usuario (id_usuario) MATCH SIMPLE      ON UPDATE NO ACTION ON DELETE NO ACTION);";
$sql[] = "CREATE TABLE acesso(  id_acesso serial NOT NULL,  hora_inicial timestamp without time zone,  tempo_oferecido integer,  tempo_usado integer,  ip character varying(200),  id_usuario integer,  id_maquina integer,  CONSTRAINT acesso_pkey PRIMARY KEY (id_acesso),  CONSTRAINT acesso_id_maquina_fkey FOREIGN KEY (id_maquina)      REFERENCES maquina (id_maquina) MATCH SIMPLE      ON UPDATE NO ACTION ON DELETE NO ACTION,  CONSTRAINT acesso_id_usuario_fkey FOREIGN KEY (id_usuario)      REFERENCES usuario (id_usuario) MATCH SIMPLE      ON UPDATE NO ACTION ON DELETE NO ACTION);";

foreach($sql as $strSql){

	$dao->getConexao()->query($strSql);	
}

