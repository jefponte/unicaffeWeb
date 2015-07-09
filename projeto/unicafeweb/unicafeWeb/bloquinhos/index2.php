<?php
echo "Teste";
$con = new PDO("pgsql:host=localhost dbname=sistemas_comum user=unicafe password=unicafe");
$lista = $con->query("SELECT * FROM usuarios_unicafe");
print_r($lista);


?>