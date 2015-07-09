<?php
$erro=FALSE;
$msg_erro="";
$sucesso=false;
if(isset($_POST["formulario_cadastro"])){
    if(isset($_POST['nome']) && $_POST["nome"]!="")
            { 
        $valida=new validacoes();
    /*    if(!$valida->validaCampos(3, $_POST["nome"])){
                $msg_erro.="Nome invalido";
                $erro=TRUE;
                
         }*/
         
         
         if($erro==FALSE){
             //ECHO 'ENTROU';
            $laboratorio = new Laboratorio();
            $laboratorio->setNome($_POST['nome']);
            $labDao= new LabDao();
            if($labDao->cadastroLab($laboratorio)){
                $sucesso=TRUE;
                $msg_sucesso="Inserido com sucesso";
            }
         }
        }  

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
                      <label for="lab">
                      <object class="">Nome Laboratório: </object> 

                      <input type="text" name="nome" id="nome" />
                      </label>
                        <input type="submit" value="enviar" name="formulario_cadastro" />

                    </form></div>
            </div>

        </div>
    </div>

