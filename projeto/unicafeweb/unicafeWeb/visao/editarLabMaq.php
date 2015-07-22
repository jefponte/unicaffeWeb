<?php
$erro=FALSE;
$msg_erro="";
$sucesso=false;
if(isset($_POST["formulario_cadastro"])){
    /*if(isset($_POST['lab']) && $_POST["lab"]!="")
            { 
        $valida=new validacoes();
        if(!$valida->validaCampos(3, $_POST["nome"])){
                $msg_erro.="Nome invalido";
                $erro=TRUE;}
          */      
         
         
         
         if($erro==FALSE){
             $laboratorio = new LaboratorioMaquina();
            $laboratorio->setIdMaquina($_POST['id_maquina']);

            $laboratorio->setIdLaboratorio($_POST['id_lab']);
            $labDao= new MaquinaLabDao();
            //echo "dd".$laboratorio;
            if($labDao->editarMaquinalab($laboratorio)){
                $sucesso=TRUE;
                $msg_sucesso="Inserido com sucesso";
            }
            else{
                $erro=TRUE;
                $msg_erro="Não foi possível editar";
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
                            <div class="icone icone-clock2 ix16"></div>
                            <div class="titulo-alerta"><?php print $msg_sucesso;?></div>
                            <div class="subtitulo-alerta"><?php print $msg_sucesso ?></div>
                        </div> 
                    <?php
                    }
                    ?>
                  <form action="#" method="post" name="formulario_cadastro" id="formulario_cadastro" class="formulario-organizado">
                      <label for="" class="linha uma coluna">
                      <object class="rotulo um alinhado-a-direita">
                          M&aacute;quina
                      </object>
                      <select name="id_maquina" onclick=" return marca_check('op3');"  >
                      <?php 
                         
                     $listar=new LaboratorioControl();
                      $grupo_cond1="inner join laboratorio_maquina on laboratorio_maquina.id_maquina=maquina.id_maquina";
                      while ($linha = $listar->listarDados("maquina","nome_pc,laboratorio_maquina.id_maquina",$grupo_cond1) ){
                      ?>
                      <option value="<?php print  $linha['id_maquina'] ?>" id="" name="id_maquina"><?php echo $linha["nome_pc"];  ?> </option>
       
                      <?php
                      }
                      ?>
                </select>
                      <object class="rotulo um alinhado-a-direita">
                          Laborat&oacute;rio
                      </object>
                      <select name="id_lab" onclick=" return marca_check('op3');"  >
                        <?php 

                       $listar=new LaboratorioControl();

                       //$linhas= $listar->listarDados("laboratorio","nome_laboratorio",$grupo_cond);



                        $grupo_cond="";

                        while ($linha = $listar->listarDados("laboratorio","nome_laboratorio,id_laboratorio") ){
                        ?>
                        <option value="<?php print  $linha['id_laboratorio'] ?>" id="" name="id_lab"><?php echo $linha["nome_laboratorio"];  ?> </option>

                        <?php
                        }
                        ?>
                    </select>
                      
                      
                      
                        <input type="submit" value="enviar" name="formulario_cadastro" />

                    </form></div>
            </div>

        </div>
    </div>

