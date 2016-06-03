<?php



$pdo = new PDO('pgsql:dbname=unicafe;user=unicafe;password=unicafe;host=localhost');

$lista = $pdo->query("SELECT * FROM maquina");


foreach ($lista as $elemento){
	echo $elemento['nome_pc'].'<br>';
	
	
}
?>