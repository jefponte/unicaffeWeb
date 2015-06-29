
<?php
$erro=false;
$msg_erro="";
$sucesso=FALSE;
$msg_sucesso="";
if(isset($_GET["comando"])){
     if($comando="desligar"){
          $unicafe = new UniCafe();
          echo $unicafe->dialoga("desliga(LABTI36)");

          
     }
} 

$acesso=new AcessoDAO();
       $lista=$acesso->retornaAcesso();
       $div="";
        foreach ($lista as $linha){
            
            print $linha->getMaquina()->getNome();
            $div.= "<div style=' background-color: activecaption;  width:150px; '> Máquina: ".$linha->getMaquina()->getNome()."\t"."Usuário: ".$linha->getUsuario()->getNome()."\t".
             "Hora Inicial: ".   $linha->getHoraInicial()."\t"."Usuário: ".$linha->getUsuario()->getNome()."\t"
                    . "<a href='?comando=desligar&maquina=".$linha->getMaquina()->getNome()."'>desligar</a></br>"
                    . "<a href='?comando=aula&maquina=".$linha->getMaquina()->getNome()."'>Aula</a></br>".
                "<a href='?comando=desligar&maquina=".$linha->getMaquina()->getNome()."'>Bloquear</a></br>".
                "<a href='?comando=desligar&maquina=".$linha->getMaquina()->getNome()."'>Desativar</a></br>".
                "<a href='?comando=desligar&maquina=".$linha->getMaquina()->getNome()."'>Ajuda</a></br></div>";

                   echo"div";
          
           
           
        }
     
          
        
?>



<div class="resolucao"> <!-- Opcional -->
            <!-- O layout é dividido em 12 colunas por linha. Assim, você poderá montá -->
            <!-- Ex.: Se você precisar de 12 colunas, você deverá colocar 12 DIVs com a declaração de uma coluna para cada -->
            <div class="doze colunas">
                <div class="conteudo fundo-branco">
                    <?php
                        if($erro==TRUE){
                   
                    ?>
                        <div class="alerta-erro">
                            <div class="icone icone-clock2 ix16"></div>
                            <div class="titulo-alerta"><?php print $msg_erro;?></div>
                            <div class="subtitulo-alerta"><?php print $msg_erro;?></div>
                        </div> 
                    <?php
                    }
                    ?>
                     <?php
                        if($sucesso==TRUE){
                   
                    ?>
                        <div class="alerta-sucesso">
                            <div class="icone icone-download ix48"></div>
                            <div class="titulo-alerta"><?php print $msg_sucesso;?></div>
                            <div class="subtitulo-alerta"><?php ?></div>
                        </div> 
                    <?php
                    }
                    ?>
                  <form action="#" method="post" name="formulario_cadastro" id="formulario_cadastro" class="formulario-organizado">
                     
                      
                          <?php
                          echo $div;
                          
                          ?>
                      
                      
                      
                      

                    </form>
                </div>
            </div>

        </div>
