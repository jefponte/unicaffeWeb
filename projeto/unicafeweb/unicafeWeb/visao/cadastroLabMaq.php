<?php
$erro=FALSE;
$msg_erro="";
$sucesso=false;
if(isset($_POST["formulario_cadastro"])){
    echo "entrou";
    /*if(isset($_POST['lab']) && $_POST["lab"]!="")
            { 
        $valida=new validacoes();
        if(!$valida->validaCampos(3, $_POST["nome"])){
                $msg_erro.="Nome invalido";
                $erro=TRUE;}
          */      
         
         
         
         if($erro==FALSE){
             //ECHO 'ENTROU';
            $laboratorio = new LaboratorioMaquina();
            $laboratorio->setIdMaquina($_POST['maq']);

            $laboratorio->setIdLaboratorio($_POST['maq']);
            $labDao= new MaqLabDao();
            if($labDao->cadastraMaquinalab($laboratorio)){
                $sucesso=TRUE;
                $msg_sucesso="Inserido com sucesso";
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
                      <label for="" class="linha uma coluna">
                      <object class="rotulo um alinhado-a-direita">
                          M&aacute;quina
                      </object>
                      <select name="maq" onclick=" return marca_check('op3');"  >
                      <?php 
                         
                     $listar=new LaboratorioControl();
       
                      while ($linha = $listar->listarDados("maquina","nome_pc,id_maquina",$grupo_cond) ){
                      ?>
                      <option value="<?php print  $linha['id_maquina'] ?>" id="" name="descricao"><?php echo $linha["nome_pc"];  ?> </option>
       
                      <?php
                      }
                      ?>
                </select>
                      <object class="rotulo um alinhado-a-direita">
                          Laborat&oacute;rio
                      </object>
                      <select name="lab" onclick=" return marca_check('op3');"  >
                        <?php 

                       $listar=new LaboratorioControl();

                       //$linhas= $listar->listarDados("laboratorio","nome_laboratorio",$grupo_cond);




                        while ($linha = $listar->listarDados("laboratorio","nome_laboratorio,id_laboratorio",$grupo_cond) ){
                        ?>
                        <option value="<?php print  $linha['id_laboratorio'] ?>" id="" name="descricao"><?php echo $linha["nome_laboratorio"];  ?> </option>

                        <?php
                        }
                        ?>
                    </select>
                      
                      
                      
                        <input type="submit" value="enviar" name="formulario_cadastro" />

                    </form></div>
            </div>

        </div>
    </div>

