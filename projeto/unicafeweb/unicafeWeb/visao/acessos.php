<?php

 $acesso=new ConectadosDAO();
       $lista=$acesso->retornaConectados();
       $div="";
        foreach ($lista as $linha){
            
            
            $div.= "<div> Máquina: ".$linha->getMaquina()->getNome()."\t"."Usuário: ".$linha->getUsuario()->getNome()."\t".
             "Hora Inicial: ".   $linha->getHoraInicial()."\t"."Usuário: ".$linha->getUsuario()->getNome()."\t</div>"; 
          
           
           
        }
        echo $div;
?>