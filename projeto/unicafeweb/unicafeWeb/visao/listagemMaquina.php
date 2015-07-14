<?php
$erro=FALSE;
$msg_erro="";
$tabela="";
$sucesso=false;
$msg_sucesso="";/*
            $condicao = array();        
        if(!empty($op1)){
            $condicao[] =  "nome_maq = '{$nome_maq}'";
        }  else {}
        if(!empty($op2)){
            $condicao[] =  "mac"
                    . " = '{$desc_mac}'";
        }
        $grupo_cond = join(" AND ", $condicao);
        */
        $grupo_cond="left join laboratorio_maquina as lm on maquina.id_maquina=lm.id_maquina left join laboratorio on laboratorio.id_laboratorio=lm.id_laboratorio";
        
        $listar=new LaboratorioControl();
       
     // $linhas= $listar->listarDados("laboratorio","nome_laboratorio",$grupo_cond);
      while($linha = $listar->listarDados("maquina","nome_pc,mac,maquina.id_maquina,nome_laboratorio",$grupo_cond)){
          $tabela=$tabela."<tr><td>".$linha['nome_pc']."</td>"."<td>".$linha['mac']."</td>"
                  ."<td>".$linha['nome_laboratorio']."</td>"
                  . "<td><a href='?editarmaq&nome=$linha[nome_pc]&mac=$linha[mac]&id=$linha[id_maquina]' style='position:relative;
		left:10px;'> <img  src=img/editar.png> </a></td>"
                  . ""
                  . "</tr>";
      }
      
       /*foreach ($linhas as $linha => $cont) {
           //$tabela=$tabela."<tr><td>".$linha['nome_laboratorio']."</td></tr>";
           
           print "$linha => $cont <br>";
        }*/
         
           
           // echo "Nome: {$linha['nome_pc']} - Usuário: {$linha['mac']}<br />";

   if(isset($_POST['alterar_lab'])){
       
      $maquina = new Maquina();
            $maquina->setNome($_POST['nome']);
            $maquina->setEnderecoMac($_POST['mac']);

            $maquina->setId($_POST['id']);

            $labDao= new MaquinaDAO();
            if(!$labDao->editaMaquinas($maquina)){
                $sucesso=TRUE;
                $msg_sucesso="Atualizado com sucesso.";
            }
}
          


    

          




?>
            
          

        <div class="resolucao"> <!-- Opcional -->
           
            <!-- O layout é dividido em 12 colunas por linha. Assim, você poderá montá -->
            <!-- Ex.: Se você precisar de 12 colunas, você deverá colocar 12 DIVs com a declaração de uma coluna para cada -->
            <div class="doze colunas">
                <div class="conteudo fundo-branco">
                    <span class="titulo">
                        Listagem de M&aacute;quina 
                    </span>
                     
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
                    
                  <form action="#" method="post" name="formulario_cadastro" id="formulario_cadastro" class="formulario-organizado">
                     
                      <table class="tabela borda-vertical zebrada">
                            <thead>
                                <tr>
                                    <th>Nome da M&aacute;quina</th>
                                    <th>MAC</th>
                                    <th>Laborat&oacute;rio</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                        <tbody>
                        
                              
                             <?php
                             echo $tabela;
                             
                             ?>
                          
                                                      
                          
                      </tbody>    
                      </table>

                    </form></div>
            </div>

        </div>
    </div>

  
    
  <?php
        if(isset($_GET["editarmaq"])){
    
    ?>
       
            
            <div id="modal">
              <div class="box-modal">
                      <div class="box-modal-load">
                          
                          
                          
                          <div class="resolucao"> <!-- Opcional -->
           
            <!-- O layout é dividido em 12 colunas por linha. Assim, você poderá montá -->
            <!-- Ex.: Se você precisar de 12 colunas, você deverá colocar 12 DIVs com a declaração de uma coluna para cada -->
              <?php
                
                        if($sucesso==TRUE){
                   
                    ?>
                        <div class="alerta-ajuda quatro">
                            <div class="icone icone-enter ix16"></div>
                            <div class="titulo-alerta"><?php print $msg_sucesso;?></div>
                            <div class="subtitulo-alerta"><?php echo  $msg_sucesso ?></div>
                        </div> 
                    <?php
                    }
                    ?>
                    
            
            
            
            <div class="doze colunas">
            
                    <span class="titulo">
                        
                        Atualizar dados do laborat&oacute;rio  
                    </span>
                     
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
               
                  <form action="index.php?listarmaq&editarmaq" method="post" name="editar_lab" id="formulario_cadastro" class="formulario-organizado">
                    
                      
                      
                      
                      
                      <label>
                          <object class="dois alinhado a-esquerda"> Descrição: </object>
                             <input type="text" onkeypress="return valida_texto(event,'msg2');" onkeyup="letras_maiusculas(this);" name="nome" placeholder="" required value="<?php if(isset($_GET["nome"])) {echo $_GET["nome"];} else if(isset($_POST["nome"])){echo $_POST["nome"];} ?>" />
                     </label>
                      <label>
                          <object class="dois alinhado a-esquerda"> MAC: </object>
                             <input type="text" onkeypress="return valida_texto(event,'msg2');" onkeyup="letras_maiusculas(this);" name="mac" placeholder="" required value="<?php if(isset($_GET["mac"])) {echo $_GET["mac"];} else if(isset($_POST["mac"])){echo $_POST["mac"];} ?>" />
                     </label>

                      <input type="hidden" name="id" value="<?php if(isset($_GET["id"])) {echo $_GET["id"];} else if(isset($_POST["id"])){echo $_POST["id"];} ?>" />
                        <div class="a-direta">
                            
                            <input type="submit"  value="Enviar" name="alterar_lab" value="Alterar" /> 
                        </div>            

                    </form>
            </div>

        </div>
    </div> 
                    <div class=""><a class="fechar botao b-erro" href="index.php?listarmaq">Fechar</a></div>
                          
                          
                      
    
                    </div>
              </div>
    
         <?php }?>             