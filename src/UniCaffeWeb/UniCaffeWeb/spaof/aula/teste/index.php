<?php 

function __autoload($classe) {
	if (file_exists ( '../classes/dao/' . $classe . '.php' ))
		include_once '../classes/dao/' . $classe . '.php';
	if (file_exists ( '../classes/model/' . $classe . '.php' ))
		include_once '../classes/model/' . $classe . '.php';
	if (file_exists ( '../classes/controller/' . $classe . '.php' ))
		include_once '../classes/controller/' . $classe . '.php';
	if (file_exists ( '../classes/util/' . $classe . '.php' ))
		include_once '../classes/util/' . $classe . '.php';
	if (file_exists ( '../classes/view/' . $classe . '.php' ))
		include_once '../classes/view/' . $classe . '.php';
	
	
}
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>UniCaffeWeb</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />


</head>
<body>
	<h1>teste</h1>


View usuarios
<?php

	$dao = new DAO(null, DAO::TIPO_PG_SIGAA);
	$result = $dao->getConexao()->query("SELECT * FROM usuarios_unicafe");
	
	foreach($result as $linha){
		print_r($linha);
		echo '<br><br><hr>';
	}
?>
</body>
</html>