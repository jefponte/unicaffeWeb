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
$result = $dao->getConexao()->query("SELECT * FROM maquina ORDER BY nome_pc ASC");
foreach ($result as $row){
	echo $row['id_maquina'].' Nome: '.$row['nome_pc'].'<br>';
}

// $dao->getConexao()->query("DELETE FROM laboratorio_maquina WHERE id_maquina = 101");
// $dao->getConexao()->query("DELETE FROM acesso WHERE id_maquina = 101");
// $dao->getConexao()->query("DELETE FROM maquina WHERE id_maquina = 101");