<?php


function __autoload($class){
	if(file_exists($class.'.php'))
		include_once $class.'.php';

		

}
$sessao = new Sessao();
$sessao->mataSessao();

?>