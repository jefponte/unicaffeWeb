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
$i = 0;
foreach ($lista as $maquina){
	$i++;
	echo $maquina->getId().' | '.$maquina->getNome().'| '.$maquina->getEnderecoMac().'<br>';
}
if($i == 0){
	echo "Lista vazia";
}



?>