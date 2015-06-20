<?php


function __autoload($class){
	
	if(file_exists('classes/modelo/'.$class.'.php'))
		include_once 'classes/modelo/'.$class.'.php';
	if(file_exists('classes/visao/'.$class.'.php'))
		include_once 'classes/visao/'.$class.'.php';
	if(file_exists('classes/controle/'.$class.'.php'))
		include_once 'classes/controle/'.$class.'.php';
	if(file_exists('classes/dao/'.$class.'.php'))
		include_once 'classes/dao/'.$class.'.php';
}



?>