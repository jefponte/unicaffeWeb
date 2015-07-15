<?php 

include_once 'dao/UniCafe.php';
include_once 'dao/DAO.php';
include_once 'dao/MaquinaDAO.php';
include_once 'modelo/Maquina.class.php';
include_once 'modelo/Acesso.class.php';
include_once 'modelo/Usuario.class.php';
include_once 'modelo/Laboratorio.php';


$dao = new MaquinaDAO(null, DAO::TIPO_UNICAFE);
$lista = $dao->retornaMaquinas();
foreach ($lista as $maquina){
	echo $maquina->getNome().'<br>';
}

?>