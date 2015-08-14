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
$result = $dao->getConexao()->query("SELECT * FROM pg_catalog.pg_tables
WHERE schemaname NOT IN ('pg_catalog', 'information_schema', 'pg_toast')
ORDER BY schemaname, tablename");

foreach($result as $linha){

	$nomeDaTabela = $linha['tablename'];
	echo $nomeDaTabela.'<br>';
	$result2 = $dao->getConexao()->query("SELECT * FROM $nomeDaTabela LIMIT 1");
	foreach($result2 as $linha2){
		foreach($linha2 as $chave => $valor){
			if(!is_numeric($chave))
				echo '|'.$chave.'|';
			
			
		}
		echo '<br><br>';
	}
	
	
}
