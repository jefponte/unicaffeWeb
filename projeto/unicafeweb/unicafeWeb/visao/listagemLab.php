<?php
$erro=FALSE;
$msg_erro="";
$tabela="";
$sucesso=false;
$msg_sucesso="";
            $condicao = array();        
        if(!empty($op1)){
            $condicao[] =  "nome_maq = '{$nome_maq}'";
        }  else {}
        if(!empty($op2)){
            $condicao[] =  "mac"
                    . " = '{$desc_mac}'";
        }
        $grupo_cond = join(" AND ", $condicao);
        
        $listar=new LaboratorioControl();
       
     // $linhas= $listar->listarDados("laboratorio","nome_laboratorio",$grupo_cond);
       
      while($linha = $listar->listarDados("laboratorio","nome_laboratorio,id_laboratorio",$grupo_cond)){
          $tabela=$tabela."<tr><td>".$linha['nome_laboratorio']."</td><td><a href='?editar&nome=$linha[nome_laboratorio]&id=$linha[id_laboratorio]' style='position:relative;
		left:17px;'><img  src=img/editar.png> </a>"."</td>"
                  ."<td><a href='?vermaquina&id=$linha[id_laboratorio]&nome=$linha[nome_laboratorio]' style='position:relative;
		left:40px;'><img  src=img/pc1.png> </a>"."</td>".
                   "</tr>";
      }
      
       /*foreach ($linhas as $linha => $cont) {
           //$tabela=$tabela."<tr><td>".$linha['nome_laboratorio']."</td></tr>";
           
           print "$linha => $cont <br>";
        }*/
         
           
           // echo "Nome: {$linha['nome_pc']} - Usuário: {$linha['mac']}<br />";

       
if(isset($_POST['alterar_lab'])){

      $laboratorio = new Laboratorio();
            $laboratorio->setNome($_POST['nome']);
            $laboratorio->setId($_POST['id']);

            $labDao= new LabDao();
            if(!$labDao->editarLab($laboratorio)){
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
                        Listagem de Laborat&oacute;rio  
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
                                    <th>Nome do Laborat&oacute;rio</th>
                                    <th>Editar</th>
                                    <th>Ver m&aacute;quinas</th>

                                    
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
        if(isset($_GET["editar"])){
    
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
               
                  <form action="index.php?listar&editar" method="post" name="editar_lab" id="formulario_cadastro" class="formulario-organizado">
                    <?php
                    $global = array();
                    if(COUNT($_POST) > 0){
                        $global = $_POST;
                    }
                    else{
                        $global = $_GET;
                    }
                   // $nome = "";
                    //$id = "";
                    foreach($global as $chave => $valor){
                        $$chave = $valor;
                        //$nome
                    }
                    ?>
                      <label>
                          <object class="dois alinhado a-esquerda"> Descrição: </object>
                             <input type="text" onkeypress="return valida_texto(event,'msg2');" onkeyup="letras_maiusculas(this);" name="nome" placeholder="" required value="<?php print $nome; ?>" />
                     </label>

                        <div class="a-direta">
                            
                            <input type="submit"  value="Enviar" name="alterar_lab" value="Alterar" /> 
                        </div>            

                    </form>
            </div>

        </div>
    </div> 
                    <div class=""><a class="fechar botao b-erro" href="index.php?listarlab">Fechar</a></div>
                          
                          
                      
    
                    </div>
              </div>
    
</div>
         <?php }?>    


    
    
  <?php
        if(isset($_GET["vermaquina"])){
    
    ?>
       
            
            <div id="modal" >
              <div class="box-modal"  style="width: 300px" >
                  <div class="box-modal-load" style="width: 10px">
                          
                          
                          
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
                        
                        Máquinas por labor&aacute;torio
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
               
                  <form action="index.php?listar&editar" method="post" name="editar_lab" id="formulario_cadastro" class="formulario-organizado">
                    <?php
                   $listar=new LaboratorioControl();
                   $table="";
                   $id=$_GET["id"];
                   $inner="inner join laboratorio_maquina as lm on lm.id_maquina=maquina.id_maquina where lm.id_laboratorio=$id";
                   while ($linha=$listar->listarDados("maquina", "nome_pc",$inner)){
                       $table.="<tr><td>$linha[nome_pc]</td></tr>";
                   }
                    
                    ?>
                      <div style="overflow: auto; width: 200px; height: 600px;">   

                      <table class="tabela borda-vertical zebrada" style="width:200px">
                          <tr>
                              <th><?php echo $_GET["nome"] ?></th>
                              <?php
                              echo $table;
                              ?>
                          </tr>
                          
                          
                      </table>      

                    </form>
            </div>

        </div>
    </div> 
                    <div class=""><a class="fechar botao b-erro" href="index.php?listarlab">Fechar</a></div>
                          
                          
                      
    
                    </div>
              </div>
    
</div>
         <?php }?>             