<?php


function __autoload($class){
	
	if(file_exists('classes/controle/'.$class.'.php'))
		include_once 'classes/controle/'.$class.'.php';
	if(file_exists('classes/dao/'.$class.'.php'))
		include_once 'classes/dao/'.$class.'.php';
	if(file_exists('classes/modelo/'.$class.'.php'))
		include_once 'classes/modelo/'.$class.'.php';
	if(file_exists('classes/visao/'.$class.'.php'))
		include_once 'classes/visao/'.$class.'.php';
	if(file_exists('classes/util/'.$class.'.php'))
		include_once 'classes/util/'.$class.'.php';
	
}


ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

$dao = new DAO();


//Dropar tudo
// $dao->getConexao()->exec("DROP table acesso");
// $dao->getConexao()->exec("DROP table laboratorio_maquina");
// $dao->getConexao()->exec("DROP table laboratorio");
// $dao->getConexao()->exec("DROP table maquina");
// $dao->getConexao()->exec("DROP table usuario");


//Criar tudo
// $dao->getConexao()->exec("CREATE TABLE laboratorio(id_laboratorio serial NOT NULL, nome_laboratorio character varying(200), CONSTRAINT laboratorio_pkey PRIMARY KEY (id_laboratorio))WITH (  OIDS=FALSE);");
// $dao->getConexao()->exec("CREATE TABLE maquina (  id_maquina serial NOT NULL,  nome_pc character varying(60),  mac character varying(200),  CONSTRAINT maquina_pkey PRIMARY KEY (id_maquina))WITH (  OIDS=FALSE);");
// $dao->getConexao()->exec("CREATE TABLE laboratorio_maquina(  id_laboratorio_maquina serial NOT NULL,  id_maquina integer,  id_laboratorio integer,  CONSTRAINT laboratorio_maquina_pkey PRIMARY KEY (id_laboratorio_maquina),  CONSTRAINT laboratorio_maquina_id_laboratorio_fkey FOREIGN KEY (id_laboratorio)      REFERENCES laboratorio (id_laboratorio) MATCH SIMPLE      ON UPDATE NO ACTION ON DELETE NO ACTION,  CONSTRAINT laboratorio_maquina_id_maquina_fkey FOREIGN KEY (id_maquina)      REFERENCES maquina (id_maquina) MATCH SIMPLE      ON UPDATE NO ACTION ON DELETE NO ACTION)WITH (  OIDS=FALSE);");
// $dao->getConexao()->exec("CREATE TABLE usuario(  id_usuario serial NOT NULL,  nome character varying(300),  email character varying(300),  login character varying(300),  senha character varying(300),  nivel_acesso integer,  id_base_externa integer,  CONSTRAINT usuario_pkey PRIMARY KEY (id_usuario))WITH (  OIDS=FALSE);");
// $dao->getConexao()->exec("CREATE TABLE acesso(  id_acesso serial NOT NULL,  hora_inicial timestamp without time zone,  tempo_oferecido integer,  tempo_usado integer,  id_usuario integer,  id_maquina integer,  ip character varying(60),  CONSTRAINT acesso_pkey PRIMARY KEY (id_acesso),  CONSTRAINT acesso_id_maquina_fkey FOREIGN KEY (id_maquina)      REFERENCES maquina (id_maquina) MATCH SIMPLE      ON UPDATE NO ACTION ON DELETE NO ACTION,  CONSTRAINT acesso_id_usuario_fkey FOREIGN KEY (id_usuario)      REFERENCES usuario (id_usuario) MATCH SIMPLE      ON UPDATE NO ACTION ON DELETE NO ACTION)WITH (  OIDS=FALSE);");

//3254
$result = $dao->getConexao()->query("SELECT * FROM usuario INNER JOIN acesso ON acesso.id_usuario = usuario.id_usuario;");
foreach ($result as $linha){
	echo $linha['nome'].' - Login: '.$linha['login'].$linha['hora_entrada'].'<br>';
}
// //Vamos importar base de dados logo. 
// //Vamos agora listar usuários do SIGAA> 



//Importar usuarios do SIGAA pro nosso. 
// $daoSIGAA = new DAO(null, DAO::TIPO_PG_SIGAA);
// $resultado = $daoSIGAA->getConexao()->query("SELECT * FROM usuarios_unicafe");
// foreach ($resultado as $elemento){
	
// 	//Vamos atualizar a base de dados. 
// 	$id = $elemento['id_usuario'];
// 	$nome = $elemento['nome'];
// 	$email = $elemento['email'];
// 	$login = $elemento['login'];
// 	$senha = $elemento['senha'];
// 	$nome = ereg_replace("[']"," ",$nome);
	
// 	$sql= "INSERT into usuario(nome, email, login, senha, nivel_acesso, id_base_externa) VALUES('$nome', '$email', '$login', '$senha', 1, $id)";
	
// 	echo '<br>'.$id.'NOme:'.$nome.'EMAIL:'.$email.'LOGIN:'.$login.'SENHA:'.$senha.'<br>';
// 	if($dao->getConexao()->exec($sql)){
// 		echo "<h1>SUCESSO</h1>";
		
// 	}
// 	else{
// 		echo "Fracaço";
// 	}



//  }

?>