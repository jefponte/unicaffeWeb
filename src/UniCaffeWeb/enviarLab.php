<?php
$sessao = new Sessao();

function after($this, $inthat)
{
    if (! is_bool(strpos($inthat, $this)))
        return substr($inthat, strpos($inthat, $this) + strlen($this));
}
;

function after_last($this, $inthat)
{
    if (! is_bool(strrevpos($inthat, $this)))
        return substr($inthat, strrevpos($inthat, $this) + strlen($this));
}
;

function before($this, $inthat)
{
    return substr($inthat, 0, strpos($inthat, $this));
}
;

function before_last($this, $inthat)
{
    return substr($inthat, 0, strrevpos($inthat, $this));
}
;

function between($this, $that, $inthat)
{
    return before($that, after($this, $inthat));
}
;

function between_last($this, $that, $inthat)
{
    return after_last($this, before_last($that, $inthat));
}
;

// use strrevpos function in case your php version does not include it
function strrevpos($instr, $needle)
{
    $rev_pos = strpos(strrev($instr), strrev($needle));
    if ($rev_pos === false)
        return false;
    else
        return strlen($instr) - $rev_pos - strlen($needle);
}
;

function __autoload($classe)
{
    if (file_exists('classes/dao/' . $classe . '.php'))
        include_once 'classes/dao/' . $classe . '.php';
    if (file_exists('classes/model/' . $classe . '.php'))
        include_once 'classes/model/' . $classe . '.php';
    if (file_exists('classes/controller/' . $classe . '.php'))
        include_once 'classes/controller/' . $classe . '.php';
    if (file_exists('classes/util/' . $classe . '.php'))
        include_once 'classes/util/' . $classe . '.php';
    if (file_exists('classes/view/' . $classe . '.php'))
        include_once 'classes/view/' . $classe . '.php';
}

if ($_SESSION['USUARIO_NIVEL'] != 3) {
    echo 'Nao autorizado';
    exit(0);
}

?>


<html>
<body>
	<p>Enviar comando para um laboratório inteiro</p>
	<form action="" method="get">
		<input type="text" name="comando" placeholder="Comando" /> <input
			type="submit" name="enviar" value="Enviar" />

	</form>
<?php

if (isset($_GET['comando'])) {
    
        
    if($_GET['comando'] == "select"){
        $unicaffe = new UniCaffe();
        $str = $unicaffe->dialoga($_GET['comando']);
        
        $lista = explode("|", $str);
        foreach ($lista as $linha){
            echo $linha;
            echo "<br><hr>";
        }
    }
    if (strpos($_GET['comando'], "()")) {
        $unicaffe = new UniCaffe();
        $str = $unicaffe->dialoga($_GET['comando']);
        echo  $str;
    }
    
    
    if (strpos($_GET['comando'], ",")) {
        $Laboratorio = between('(', ',', $_GET['comando']);
        $novaMaquina = new MaquinaDAO();
        $daoUniCafe = new MaquinaDAO(null, DAO::TIPO_UNICAFFE);
        $lista = $daoUniCafe->retornaLista();
        
        echo "enviando comando para o laboratório " . $Laboratorio;
        echo "<br>";
        
        foreach ($lista as $linha) {
            if ($linha->getLaboratorio()->getNome() == $Laboratorio) {
                $unicaffe = new UniCaffe();
                $todoComando = str_replace($Laboratorio, $linha->getNome(), $_GET['comando']);
                echo $todoComando;
                echo "<br>";
                $str = $unicaffe->dialoga($todoComando);
                echo $str;
                $unicaffe->close();
            }
        }
        
    } else {
        $Laboratorio = between('(', ')', $_GET['comando']);
        $novaMaquina = new MaquinaDAO();
        $daoUniCafe = new MaquinaDAO(null, DAO::TIPO_UNICAFFE);
        $lista = $daoUniCafe->retornaLista();
        
        echo "enviando comando para o laboratório " . $Laboratorio;
        echo "<br>";
        
        foreach ($lista as $linha) {
            if ($linha->getLaboratorio()->getNome() == $Laboratorio) {
                $unicaffe = new UniCaffe();
                $todoComando = str_replace($Laboratorio, $linha->getNome(), $_GET['comando']);
                echo $todoComando;
                echo "<br>";
                $str = $unicaffe->dialoga($todoComando);
                echo $str;
                $unicaffe->close();
            }
        }
        
    }
}
?>


</body>
</html>