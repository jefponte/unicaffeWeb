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


// if($_SESSION['USUARIO_NIVEL'] != 3){
// 	echo 'Nao autorizado';
// 	exit(0);
// }

?>


<html>
<body>

<?php 


?>
<h1>Enviar comando diretamente para o UniCafe</h1>
<form action="" method="post">
<select name="laboratorio">

<?php 
$laboratorioDao = new LaboratorioDAO();
$lista = $laboratorioDao->retornaLaboratorios();
foreach ($lista as $laboratorio){
    echo "<option value=".$laboratorio->getNome().">".$laboratorio->getNome()."</option>";
    
}
?>


</select>
<br>
<textarea name="mensagem"></textarea>
<br>
<input type="submit" name="enviar" />

</form>


<?php



if(isset($_POST['mensagem'])){
    
    $mensagem = $_POST['mensagem'];
    
    $nomeLaboratorio = $_POST['laboratorio'];
    $strComando = "mensagemLaboatorio(".$nomeLaboratorio.", ".$mensagem.")";
    
    $unicafe = new UniCaffe();
    $resposta = $unicafe->dialoga($strComando);
    echo $resposta;
    
}



// if(isset($_POST['comando'])){
// 	$config = parse_ini_file ( DAO::ARQUIVO_CONFIGURACAO );
// 	echo $config ['unicaffe_host'];
	
// 	$unicaffe = new UniCaffe($config ['unicaffe_host'], $config ['unicaffe_porta']);
// 	echo $_POST['comando'].'<br>';
// 	echo $unicaffe->dialoga($_POST['comando']);
// 	$unicaffe->close();
	
// }



?>

</body>
</html>