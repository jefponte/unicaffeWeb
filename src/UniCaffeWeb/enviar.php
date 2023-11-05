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



<form action="" method="get">

<input type="text" name="comando" placeholder="Comando"/>
<input type="submit" name="enviar" value="Enviar" />

</form>
<?php 

if(isset($_GET['comando'])){
    
    $unicaffe = new UniCaffe();
    $str = $unicaffe->dialoga($_GET['comando']);
    
    if($_GET['comando'] == "select"){
        $lista = explode("|", $str);
        foreach ($lista as $linha){
            echo $linha;
            echo "<br><hr>";
        }
        
    }else{
        echo $str;
    }
    
}
?>


</body>
</html>