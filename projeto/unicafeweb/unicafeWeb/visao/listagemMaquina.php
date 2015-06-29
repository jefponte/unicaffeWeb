<?php
$erro=FALSE;
$msg_erro="";
$tabela="";
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
       
      while($linha = $listar->listarDados("maquina","nome_pc,mac",$grupo_cond)){
          $tabela=$tabela."<tr><td>".$linha['nome_pc']."</td></tr>"."<tr><td>".$linha['mac']."</td></tr>";
      }
      
       /*foreach ($linhas as $linha => $cont) {
           //$tabela=$tabela."<tr><td>".$linha['nome_laboratorio']."</td></tr>";
           
           print "$linha => $cont <br>";
        }*/
         
           
           // echo "Nome: {$linha['nome_pc']} - Usuário: {$linha['mac']}<br />";

       

          




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

