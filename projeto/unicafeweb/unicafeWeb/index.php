
        
        
        
        <?php
        $sessao = new Sessao();
        ini_set("display_errors", 1);
       include_once "incluir_paginas/cabecalho.php";
        include_once "incluir_paginas/topo.php"; 
         //include_once "incluir_paginas/menu.php"; 
        function __autoload($classe){
            
            
            if(file_exists('dao/'.$classe.'.php'))
                include_once 'dao/'.$classe.'.php';
            if(file_exists('modelo/'.$classe.'.php'))
                include_once 'modelo/'.$classe.'.php';
           if(file_exists('controle/'.$classe.'.php'))
                include_once 'controle/'.$classe.'.php';
           if(file_exists('util/'.$classe.'.php'))
                include_once 'util/'.$classe.'.php';
            
        }
        




      ?>



  

<?php


if(isset($_GET["sair"])){
     
      $sessao->mataSessao();
      header("Location: index.php");
      
      
  }
            
  
else if($sessao->getNivelAcesso() != Sessao::NIVEL_SUPER){
  
    include './visao/login.php';
    return;
}
else{
      include_once "incluir_paginas/menu.php"; 
}
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
  else if  (isset($_GET["comando1"])){
    // print $_GET["maquina"];
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
 
 else if  (isset($_GET["vermaquina"])){
            include './visao/listagemLab.php';
 }
else{

?>
<div class="resolucao"> 
                <div class="conteudo fundo-branco">
                    
            <h1>Seja bem-vindo(a),</h1>
            <br />
            <p>Esse é um sistema de gerenciamneto de laborat&oacute;rio, onde será possível cadastrar máquinas e laborat&oacute;rios, bem como monitorar máquinas e enviar comandos, como por exemplo:</p>
            <br />
            <p></p>
            <br />
            
            <ol>
                <li>Desligar m&aacute;quinas</li>
                <li>Bloquear</li>
                <li>Liberar</li>
            </ol>
            <br />
            
           
            <br />
            
          

                    
                
       
    
</div>
  <?php

}

?>     
        