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




if(isset($_POST['comando'])){
	$unicafe = new UniCafe();
	echo $_POST['comando'].'<br>';
	echo $unicafe->dialoga($_POST['comando']);
	$unicafe->close();
	
}



?>

</body>
</html>