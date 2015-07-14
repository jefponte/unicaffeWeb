
<?php
$erro=false;
$msg_erro="";
$sucesso=FALSE;
$msg_sucesso="";
$unicafe = new UniCafe();
$ajuda="";
$comando="";
if(isset($_GET['comando1'])){
     $comando = $unicafe->dialoga("$_GET[comando1]");
    
    
}
if(isset($_GET["comando"])){
     if($_GET["comando"]=="desligar"){
          
          $comando =  $unicafe->dialoga("desliga($_GET[maquina])");

          
     }
    else if($_GET["comando"]=="aula"){
          $comando = $unicafe->dialoga("aula($_GET[maquina])");

          
     }
    else if($_GET["comando"]=="bloqueia"){
          $comando = $unicafe->dialoga("bloqueia($_GET[maquina])");

          
     }
      else if($_GET["comando"]=="desativar"){
          $comando = $unicafe->dialoga("desativar($_GET[maquina])");

          
     }
      else if($_GET["comando"]=="ajuda"){
          $comando = $unicafe->dialoga("ajuda");

          
     }
} 
$acesso=new ConectadosDAO();
       $lista=$acesso->retornaConectados();
       $div="";
       
        foreach ($lista as $linha){
            $hora=  explode(" ", $linha->getHoraInicial());
            
           
           $div.="<div class='tres colunas centralizado '>"
            ."<div class='conteudo medio fundo-azul2 texto-branco'>"
                ."<div class='seis colunas a-esquerda'>"
                    ."<div class='doze colunas fundo-azul1  linha'>"
                        ."<div class='conteudo'>"
                           ."<span class='icone-display centralizado'>&nbsp;&nbsp;&nbsp;&nbsp;</span>".$linha->getMaquina()->getNome()."</div>"
                   ." </div>"
                    ."<div class='doze colunas fundo-azul1 texto-branco linha'>"
                      . " <div class='conteudo'>"

                           ." <span class='icone-clock centralizado'>&nbsp;&nbsp;&nbsp;&nbsp;</span>".   $hora[1]."</div>"
                    ."</div>"
                    . "<a href='?comando=desligar&maquina=".$linha->getMaquina()->getNome()."' style='color:#FFFFFF'>desligar</a></br>"
                    . "<a href='?comando=aula&maquina=".$linha->getMaquina()->getNome()."' style='color:#FFFFFF'>Aula</a></br>"
                   . "<a href='?comando=bloqueia&maquina=".$linha->getMaquina()->getNome()."' style='color:#FFFFFF'>Bloquear</a></br>"
                ."<a href='?comando=desativar&maquina=".$linha->getMaquina()->getNome()."' style='color:#FFFFFF'>Desativar</a></br>"
                   ." </div>"
               ." <div class='seis colunas a-direita fundo-azul2'>"
                  ."  <div class='doze a-esquerda colunas fundo-vazul2 texto-branco '>"
                       ." <div class='conteudo'>"
                          ."  <h1 class='icone-user centralizado'></h1>".$linha->getUsuario()->getNome()."</div>"
                   ." </div>"
              ."  </div>"
         ."   </div>"
      .  "</div>";
                  
          
           
           
        }
     
          
        
?>



<div class="resolucao"> <!-- Opcional -->
            <div class="titulo">
                Controle do Laborat&oacute;rio
            </div>
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
                      <div>
                      <object class="rotulo um alinhado-a-direita">
                           Enviar comando:
                      </object>
                          
                          
                           <input type='text' name='comando1'/>
                           

                      <input  type="submit">
                      
                      </div>
                      
                      <div>
                          <a href="?comando=ajuda" class="tooltip-dica">
                             Click aqui para obter ajuda 
                              <span class="caixa-tooltip">
                                  <span class="titulo-tooltip"><span class="icone-info"></span>&nbsp; Ajuda Unicaf&eacute; &nbsp;</span>
                                  <span class="conteudo-tooltip justificado">
                                    Mostra a lista de comandos do Unicaf&eacute;                               
                                  </span>
                              </span>
                          </a>
                          
                      </div>
                 
                          <?php
                          echo $div;
                          
                          ?>
                 </form>
                </div>
            </div>

        </div>         
   
  <?php
        if(isset($_GET["comando"]) || isset($_GET["comando1"])){
            
    
    ?>
       
            
            <div id="modal">
              <div class="box-modal">
                       <div style="text-align: center;padding-top: 50px">
                          
            
                               
                        
                                <form >
                                        
                       <?php
                       
                       echo $comando;
                       ?>
                                    
                                </form>
                          
              </div>
              <div class=""><a class="fechar botao b-erro" href="index.php?comandos">Fechar</a></div>

    
        </div>

            </div>
        <?php }?>    
                     
                      
                      

                
