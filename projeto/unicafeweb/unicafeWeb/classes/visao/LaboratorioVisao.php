<?php
class LaboratorioVisao{
    
  
    
    public function mostraFormCadastro($tipo){
        echo $tipo;
        if($tipo==1)
            echo '<p>Formulário de Cadastro de Laboratorio</p><form action="#" method="post" name="formulario_cadastro" id="formulario_cadastro"><label for="nome">Nome: </label><input type="text" name="nome" id="nome" /><input type="submit" value="enviar" name="formulario_cadastro" /></form>';
    
       if($tipo==2) {
            echo '<p>Inserir máquinas no Laboratório</p>'
           . ''
               . '<form action="#" method="post" name="formulario_cadastro_maquina_lab" id="formulario_cadastro">'
               . '<label for="id_maquina">Id Maquina: </label><input type="text" name="id_maquina" id="id_maquina" />'
                 . '<label for="idlab">Id Lab: </label><input type="text" name="id_lab" id="id_lab" />'
               . '<input type="submit" value="enviar" name="formulario_cadastro_maquina_lab" /></form>';

        
        
         }   
        if($tipo==3){
 ?>
              <form action="#" name="form_pesq_campus" method="POST" class="formulario-organizado">
              
                  
                <label for="">
                    <object class="rotulo uma alinhado-a-esquerda">
                        <input type="checkbox"   value="op_nome" name="op1" id="op1" />   Nome :
                    </object>
                    <input type="text" list="aa" name="nome_maq"  onKeyUp=" return carrega_lab(this.value,'2')" onclick=" return marca_check('op1');"/> 

                    <datalist id="aa" onKeyUp="carrega_lab(this.value,'1')" />
                    </datalist>  
                </label>
                <label for="">
                    <object class="rotulo uma alinhado-a-esquerda">
                        <input type="checkbox" value="mac" name="op2" id="op2" />MAC :
                    </object>
                    <input type="text" name="desc_mac"  onkeypress="return valida_texto_num(event,'msg');"   onclick=" return marca_check('op2');"   />
                </label>
                    <input type="submit" name="listar_maq" class="botao" value="Filtrar" />
            
        </form>
  

<?php
            
        }
    
    }
    public function mostraSucesso($sucesso=""){
        echo $sucesso;
    }
    public function mostraFracasso(){
        echo 'Fracasso';
    }
    public function mensagemDeErro($strMensagem)
    {
        echo $strMensagem;
        
    }
    public function mostraLista($lista){
        
    }
    

    
    
}

?>