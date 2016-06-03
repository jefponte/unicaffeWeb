<?php
if (!isset($_SESSION)) session_start();


if($_SESSION['USUARIO_NIVEL'] != 3){
	echo 'Nao autorizado';
	exit(0);
}

?>


<html>
<body>

<h1>Enviar comando diretamente para o UniCafe</h1>
<form action="" method="post">
<input type="text" name="comando" />
<input type="submit" name="enviar" />

</form>


<?php

include_once 'libs/unicafe.php';


if(isset($_POST['comando'])){
	$unicafe = new UniCafe();
	echo $_POST['comando'].'<br>';
	echo $unicafe->dialoga($_POST['comando']);
	
}



if(isset($_GET['comando'])){
	$unicafe = new UniCafe();
	echo "Comando GET: ";
	echo $unicafe->dialoga($_GET['comando']);
	
}



echo "<br><br>Vou listar as máquinas aqui: ";


include_once 'libs/dao/DAO.class.php';
include_once 'libs/dao/MaquinaDAO.class.php';
include_once 'libs/model/Usuario.class.php';
include_once 'libs/model/Maquina.class.php';
include_once 'libs/model/Cliente.class.php';
include_once 'libs/model/Acesso.class.php';




$maquinaDAO = new MaquinaDAO();
$lista = $maquinaDAO->retornaListaDoJSON();


foreach($lista as $maquina){
	echo $maquina->getNome().'<br>';
	echo '<a href="?comando=desliga('.$maquina->getNome().')">Desligar</a><br>';
	echo '<hr>';
	
	
}




?>


Escolha quais quer desligar: 
<form action="" method="get">
<?php 


$i = 0;
foreach ($lista as $maquina){
	echo ' <input type="checkbox" name="desliga('.$maquina->getNome().')" value="'.$i.'"> '.$maquina->getNome().'<br>';
	$i++;
}

?>
  <input type="submit" value="Submit">
</form>


<?php 

echo 'Maquinas selecionadas: ';

foreach ($_GET as $chave => $valor){
	$unicafe = new UniCafe();
	echo 'Comando '.$valor.': '.$chave.'Retorno: '.$unicafe->dialoga($chave).'<br>';
	
}


?>

</body>
</html>