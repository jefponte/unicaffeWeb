
        
        
        
        <?php
        ini_set("display_errors", 1);
            include_once 'dao/DAO.php';
        include_once './modelo/LaboratorioMaquina.php';
        include_once './dao/MaquinaLabDao.php';
        include_once './visao/LaboratorioVisao.php';
        include_once './controle/LaboratorioControl.php';
        include_once 'dao/Conexao.php';
        include_once './modelo/Laboratorio.php';
        include_once './controle/validacoes_php.php';
        include_once './dao/LabDao.php';
        include_once './dao/GeraSQL.php';
        include_once "incluir_paginas/cabecalho.php";
        include_once "incluir_paginas/topo.php";
        include_once 'dao/AcessoDAO.php';
        include_once './modelo/Acesso.class.php';
        include_once './modelo/Usuario.class.php';
        include_once './modelo/Maquina.class.php';
        include_once 'dao/ConectadosDAO.php';
        include_once 'dao/MaquinaDAO.php';
        include_once 'dao/Conexao.php';
        include_once 'dao/UniCafe.php';
      
      ?>



  

<?php

if(isset($_GET["cadastroLab"]))
            include './visao/cadastroLab.php';
else if  (isset($_GET["listarlab"])){
            include './visao/listagemLab.php';
 }
else if  (isset($_GET["cadastromaq"])){
            include './visao/cadastroLabMaq.php';
 }
else if  (isset($_GET["listarmaq"])){
            include './visao/listagemMaquina.php';
 }
else if  (isset($_GET["acessosmaq"])){
            include './visao/acessos.php';
 }
 else if  (isset($_GET["historico"])){
            include './visao/historicoMaq.php';
 }                
 else if  (isset($_GET["comandos"])){
            include './visao/comandos.php';
 }
 else if  (isset($_GET["comando"])){
     print $_GET["maquina"];
            include './visao/comandos.php';
 }
 else if  (isset($_GET["editar"])){
               include './visao/listagemLab.php';
 }
 else if  (isset($_GET["editarmaq"])){
               include './visao/listagemMaquina.php';
 }
 else if  (isset($_GET["editarmaqlab"])){
            include './visao/editarLabMaq.php';
 }
?>

