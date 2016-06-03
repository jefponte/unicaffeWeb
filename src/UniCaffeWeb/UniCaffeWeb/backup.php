<?php
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
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

// $dao = new DAO();
// $result = $dao->getConexao()->query("SELECT tablename FROM pg_tables
// WHERE schemaname = 'public'  
// ORDER BY tablename;");
// foreach($result as $linha){
// 	echo '<br><br><a href="">'.$linha['tablename'].'</a><br><br>';
// 	$nome = $linha['tablename'];
// 	$result2 = $dao->getConexao()->query("SELECT column_name FROM information_schema.columns WHERE table_name ='$nome'");
// 	foreach ($result2 as $linha3){
// 		echo '<br>'.$linha3['column_name'].'|';
// 	}
	
	
// }



$dao = new DAO(null, DAO::TIPO_PG_SIGAA);
$daoTeste = new DAO(null, DAO::TIPO_PG_SIMULACAO_SIGAA);

$result = $dao->getConexao()->query("SELECT * FROM usuarios_unicafe");
foreach($result as $linha){
	$id = $linha['id_usuario'];
	$nome = $linha['nome'];
	$email = $linha['email'];
	$senha = $linha['senha'];
	$login = $linha['login'];
	$sql = "INSERT INTO usuarios_unicafe(id_usuario, nome, email, login, senha) VALUES($id, '$nome', '$email', '$login', '$senha')";
	//echo $sql;
	if($daoTeste->getConexao()->query($sql)){
		echo $nome.' inserido com sucesso'.'<br>';
	}else{
		echo 'Erro ao tentar inserir'.$nome.'<br>';
	}
		

}


// $dao->getConexao()->query("UPDATE usuario set nivel_acesso = 3 WHERE login like '%abel%'");
?>