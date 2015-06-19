<?php 

include_once 'dao/UniCafe.php';
include_once 'dao/DAO.php';
include_once 'dao/MaquinaDAO.php';
include_once 'modelo/Maquina.class.php';
include_once 'modelo/Acesso.class.php';
include_once 'modelo/Usuario.class.php';
include_once 'modelo/Laboratorio.php';


$dao = new DAO(null, DAO::TIPO_UNICAFE);
$stmt = $dao->getConexao()->query("SELECT * FROM acesso");
foreach ($stmt as $elemento)
{
	echo $elemento['id_acesso'].' -  '.$elemento['hora_inicial'].' - '.$elemento['tempo_usado'].'<br>';
}



?>