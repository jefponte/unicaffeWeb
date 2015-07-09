
<?php
$erro=false;
$msg_erro="";
$sucesso=FALSE;
$msg_sucesso="";
$unicafe = new UniCafe();
if(isset($_GET['comando1'])){
     echo $unicafe->dialoga("$_GET[comando1]");
    
    
}
if(isset($_GET["comando"])){
     if($_GET["comando"]=="desligar"){
          
          echo $unicafe->dialoga("desliga($_GET[maquina])");

          
     }
    else if($_GET["comando"]=="aula"){
          echo $unicafe->dialoga("aula($_GET[maquina])");

          
     }
    else if($_GET["comando"]=="bloqueia"){
          echo $unicafe->dialoga("bloqueia($_GET[maquina])");

          
     }
      else if($_GET["comando"]=="desativar"){
          echo $unicafe->dialoga("desativar($_GET[maquina])");

          
     }
      else if($_GET["comando"]=="ajuda"){
          echo $unicafe->dialoga("ajuda");

          
     }
} 
echo "<a href='?comando=ajuda'>Ajuda</a></br>";
$acesso=new ConectadosDAO();
       $lista=$acesso->retornaConectados();
       $div="";
       
        foreach ($lista as $linha){
            
           // print $linha->getMaquina()->getNome();
            $div.= " <div style=' background-color: activecaption;  width:150px; '> Máquina: ".$linha->getMaquina()->getNome()."\t"."Usuário: ".$linha->getUsuario()->getNome()."\t".
             "Hora Inicial: ".   $linha->getHoraInicial()."\t"."Usuário: ".$linha->getUsuario()->getNome()."\t"
                    . "<a href='?comando=desligar&maquina=".$linha->getMaquina()->getNome()."'>desligar</a></br>"
              
                    . "<a href='?comando=aula&maquina=".$linha->getMaquina()->getNome()."'>Aula</a></br>".
                "<a href='?comando=bloqueia&maquina=".$linha->getMaquina()->getNome()."'>Bloquear</a></br>".
                "<a href='?comando=desativar&maquina=".$linha->getMaquina()->getNome()."'>Desativar</a></br>".
                    $linha->getMaquina()->getLaboratorio()->getId().
                "</div>";

                  
          
           
           
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
                  <form action="#" method="get" name="formulario_cadastro" id="formulario_cadastro" class="formulario-organizado">
                      Enviar comando: <input type='text' name='comando1'/>
                      
                      <input  type="submit">
                      
                          <?php
                          echo $div;
                          
                          ?>
                      
                      
                      
                      

                    </form>
                </div>
            </div>

        </div>
