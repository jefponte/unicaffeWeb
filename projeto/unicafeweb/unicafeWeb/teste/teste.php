<html>
<body>
<?php
echo "<p>Testa conexão de socket!</p>";

$host = "localhost";
$port = 12345;
$message = "Ola, servidor Java. Eu sou o PHP. \n";

$res = socket_create ( AF_INET, SOCK_STREAM, 0 );
$result = socket_connect ( $res, $host, $port );

socket_write ( $res, $message."\n", strlen ( $message."\n" ) ) or die ( "Could not send data to server\n" );
$resposta = "";
while ( $result = socket_read ( $res, 1024 ) ) {
	$resposta .= $result;
}


echo "Resposta do servidor";

echo $resposta;
socket_close($res);
?>


</body>

</html>

