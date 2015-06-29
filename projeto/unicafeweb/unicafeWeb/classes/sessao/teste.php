<?php


function __autoload($class){
	if(file_exists($class.'.php'))
		include_once $class.'.php';
	if(file_exists('../dao/'.$class.'.php'))
		include_once '../dao/'.$class.'.php';
}



$usuarioControl = new UsuarioControle();
$usuarioControl->telaLogin();
