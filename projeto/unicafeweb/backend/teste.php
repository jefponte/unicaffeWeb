<?php
include_once 'classes/controller/LaboratorioController.php';
include_once 'classes/controller/MaquinaController.php';
include_once 'classes/model/Laboratorio.php';
include_once 'classes/model/Maquina.php';
include_once 'classes/model/Usuario.php';
include_once 'classes/model/Acesso.php';
include_once 'classes/dao/DAO.php';
include_once 'classes/dao/LaboratorioDAO.php';
include_once 'classes/dao/MaquinaDAO.php';
include_once 'classes/dao/UniCafe.php';
include_once 'classes/view/LaboratorioView.php';
include_once 'classes/util/Sessao.php';



$maquinaDao = new MaquinaDAO();
$maquinaDao->listaCompleta();


// $dao = new DAO(null, DAO::TIPO_PG_PRODUCAO);
// $result  = $dao->getConexao()->query("SELECT * FROM acesso INNER JOIN usuario ON acesso.id_usuario = usuario.id_usuario where usuario.login like '%carena%' ORDER BY acesso.id_acesso DESC");
// foreach($result as $elemento){
// 	echo 'Hora Inicial: '.$elemento['hora_inicial'].'Nome: '.$elemento['nome'].' Tempo Usado :'.$elemento['tempo_usado'].'<br>';
	
// }

?>