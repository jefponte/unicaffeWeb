<?php
class LaboratorioVisao{
    
  
    
    public function mostraFormCadastro(){
        echo '<p>Formulário de Cadastro de Laboratorio</p><form action=" method="post" name="cadastro"><label for="nome">Nome: </label><input type="text" name="nome" id="nome" /><input type="submit" value="enviar" /></form>';
    }
    public function mostraSucesso(){
        echo 'Sucesso';
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