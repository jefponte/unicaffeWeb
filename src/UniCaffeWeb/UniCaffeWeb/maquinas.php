<?php
include_once 'classes/controller/LaboratorioController.php';
include_once 'classes/controller/MaquinaController.php';
include_once 'classes/view/MaquinaView.php';
include_once 'classes/model/Laboratorio.php';
include_once 'classes/model/Maquina.php';
include_once 'classes/model/Usuario.php';
include_once 'classes/model/Acesso.php';
include_once 'classes/dao/DAO.php';
include_once 'classes/dao/LaboratorioDAO.php';
include_once 'classes/dao/MaquinaDAO.php';
include_once 'classes/dao/UniCaffe.php';
include_once 'classes/view/LaboratorioView.php';
include_once 'classes/util/Sessao.php';


$sessao = new Sessao ();
MaquinaController::main($sessao->getNivelAcesso());

?>