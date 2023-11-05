<?php



class AdministradorView{
    
  
    public function mostraFormulario(){
        echo '<div class="borda">
            
                <div class="conteudo fundo-branco">';
        echo '<form action="#" method="get" name="form_gerencia_adm" id="pesquisa" class="formulario-organizado">
                      <label for="usuario">
                      <object class="">Login do Usuario: </object>
            
                      <input type="text" name="usuario" id="usuario" />
                      </label>
					<label for="laboratorio">
                      <object class="">Laboratorio: </object>
            
                      <input type="text" name="laboratorio" id="laboratorio" />
                      </label>
						<input type="hidden" name="pagina" value="gerenciamento_administrador" />
                        <input type="submit" value="enviar" name="form_gerencia_adm" />
                    </form>
                </div>
            
        </div>';
        
    }
    
    public function formConfirmarTornarPadrao(){
        echo ' <div class="confirmacao">';
        echo '<p>Tem certeza que deseja tornar este usuário padrão? </p>';
        echo '<form method="post" action="">
                <input type="submit" class="botao b-primario" name="confirmar_padrao" value="Confirmar" />
                <a href="?pagina=gerenciamento_administrador" class="botao b-erro" > Cancelar </a>
                </form>';
        echo '</div>';
    }
    public function formConfirmarTornarSuper(){
        echo ' <div class="confirmacao">';
        echo '<p>Tem certeza que deseja tornar este usuário padrão? </p>';
        echo '<form method="post" action="">
                <input type="submit" class="botao b-primario" name="confirmar_super" value="Confirmar" />
                <a href="?pagina=gerenciamento_administrador" class="botao b-erro" > Cancelar </a>
                </form>';
        echo '</div>';
    }
    public function sucessoTornarPadrao(){
        echo '
            <div class="borda" >
                <p>Tornado Padrão Com Sucesso!</p>
            </div>';
        
    }
    public function sucessoTornarSuper(){
        echo '
            <div class="borda" >
                <p>Tornado Super Com Sucesso!</p>
            </div>';
        
    }
    public function sucessoAddAdm(){
        echo '
            <div class="borda" >
                <p>Tornado Adm Com Sucesso!</p>
            </div>';
        
    }
    public function erroTornarPadrao(){
        echo '
            <div class="borda" >
                <p>Erro ao tentar tornar Padrão!</p>
            </div>';
        
    }
    
    public function erroTornarSuper(){
        echo '
            <div class="borda" >
                <p>Erro ao tentar tornar Super!</p>
            </div>';
        
    }
    public function printMensagem($str){
        echo '
            <div class="borda" >
                <p>'.$str.'</p>
            </div>';
        
    }
}


?>