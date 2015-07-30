<?php

 $acesso=new AcessoDAO();
       $lista=$acesso->retornaAcesso();
       $div="";
        foreach ($lista as $linha){
            
            
            $div.= "<div> Máquina: ".$linha->getMaquina()->getNome()."\t"."Usuário: ".$linha->getUsuario()->getNome()."\t".
             "Hora Inicial: ".   $linha->getHoraInicial()."\t"."Usuário: ".$linha->getUsuario()->getNome().' Lab: '.$linha->getMaquina()->getLaboratorio()->getNome()."\t</div>"; 
          
           
           
        }
        echo $div;
?>