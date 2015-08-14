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

$dao = new DAO();
$result = $dao->getConexao()->query("SELECT * FROM usuario WHERE login like '%jefponte%'");
foreach($result as $elemento){
	echo ' Nome: '.$elemento['nome'].'-'.$elemento['login'].'--'.$elemento['nivel_acesso'].'<br>';
}
// $dao->getConexao()->query("UPDATE usuario set nivel_acesso = 3 WHERE login like 'jefponte'");
?>