<?php

date_default_timezone_set ( 'America/Araguaina' );

ini_set ( 'display_errors', 1 );
ini_set ( 'display_startup_erros', 1 );
error_reporting ( E_ALL );


$pdo = new PDO ('mysql:host=10.5.5.100;dbname=owncloud', 'root', 'rootroot');
$result = $pdo->query("select * from oc_users;");

foreach($result as $linha){
	print_r($linha);
	echo '<hr><br>';
	
}


?>



