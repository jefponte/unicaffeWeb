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


$dao = new DAO();
$result = $dao->getConexao()->query("SELECT * FROM usuario INNER JOIN acesso ON acesso.id_usuario = usuario.id_usuario WHERE login like '%barnabe%' ORDER BY id_acesso DESC");
foreach($result as $elemento){
	echo 'Hora: '.$elemento['hora_inicial'].' Nome: '.$elemento['nome'].' Tempo Usado :'.$elemento['tempo_usado'].'<br>';
}
?>