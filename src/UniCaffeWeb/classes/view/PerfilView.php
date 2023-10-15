<?php



class PerfilView{
  
    public function formCadastro(){
        echo '
            <div class="borda" >
            
                <form method="get" action="" class="formulario sequencial">
                    <fieldset>
                    
                    <input type="hidden" name="pagina" value="perfil" />
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" />
                    <br>
                    <label for="cota">Cota</label>
                    <input type="time" id="cota" name="cota" value="01:00" />
                    <br>
                    <label for="visitante">Visitante Habilitado</label>
                    <input type="checkbox" id="visitante" name="visitante" checked/>
                    <br>
                    <label for="bonus">Bônus Habilitado</label>
                    <input type="checkbox" id="bonus" name="bonus" />
                    <br>
                    <label for="lotacao">Lotação</label>
                    <input type="number" id="lotacao" name="lotacao" value="3"   min="0" max="200"/>
                    <br>
                    <label for="tempo_turno">Duração do Turno</label>
                    <input type="number" id="tempo_turno" name="tempo_turno"   value="6" />
                    <br>
                    <input type="submit" name="cadastro_perfil" value="Enviar" />
                    </fieldset>
                    </form>

                    <a class="link_ajuda" href="?pagina=perfil&ajuda=1">Ajuda</a>


                </div>';
    }
    
    
    public function formConfirmacao(){
        echo ' <div class="confirmacao">';
        echo '<p>Tem certeza que deseja cadastrar este perfil? </p>';
        echo '<form method="post" action="">
                <input type="submit" class="botao b-primario" name="certeza" value="Confirmar" />
                <a href="?pagina=perfil" class="botao b-erro" > Cancelar </a>
                </form>';
        echo '</div>';
        
    }
    public function mensagemSucesso(){
        echo '
            <div class="borda" >
                <p>Cadastro realizado com sucesso!</p>
            </div>';
        
        
    }
    public function mensagemFracasso(){
        echo '
            <div class="borda" >
                <p>Cadastro realizado com fracasso!</p>
            </div>';
        
        
    }
    
    public function mensagemAjuda(){
        echo '
            <div class="borda" >
                <ul>
                    <li>Nome: Refere-se ao nome do perfil</li>
                    <li>Cota: Tempo disponibilizado ao usuário ao autenticar-se. </li>
                    <li>Visitante Habilitado: Caso este item esteja ativado o perfil permitirá utilização da senha de visitante. </li>
                    <li>Bonus Habilitado: Caso este item esteja ativado o perfil permitirá o incremento automático de tempo para os usuários em caso de não lotação do laboratório. </li>
                    <li>Lotação: refere-se ao número mínimo de máquinas livres para que o laboratório seja considerado lotado. Vale lembrar que quando o laboratório está lotado a senha de visitante e o bonus ficam desabilitados.  </li>
                    <li>Duração do Turno: Tempo de duração, em horas, de cada turno. Onde o tempo de acesso é renovado em cada turno.  Por exemplo: Caso este valor seja definido como 5, o primeiro turno será 00:00 até às 05:00, o segundo de 05:00 às 10:00, durando cada turno 5 horas. 
                    Considerando que um dia tem apenas 24 horas, não faz sentido adicionar um valor acima de 24. </li>
                </ul>
            </div>';
        
        
    }
  
    public function exibirLista($lista){
        echo '
            <div class="borda" >
                <table border="1">';
        if(!count($lista)){
            echo "Lista Vazia";
        }else{
            echo '<tr><th>ID</th><th>Nome</th><th>Cota</th><th>Visitante</th><th>Bonus</th><th>Lotacao</th><th>Tempo de Turno</th><th>Deletar</th></tr>';
            foreach($lista as $perfil){
                $visitante = "Não";
                if($perfil->isVisitanteHabilitado()){
                    $visitante = "Sim";
                }
                $bonus = "Não";
                if($perfil->isBonusHabilitado()){
                    $bonus = "Sim";
                }
                echo '<tr><td>'.$perfil->getId().'</td><td>'.$perfil->getNome().'</td><td>'.MaquinaView::segundosParaHora($perfil->getCota()).'</td><td>'.$visitante.'</td><td>'.$bonus.'</td><td>'.$perfil->getLotacao().'</td><td>'.$perfil->getTempoTurno().'</td><td><a class="botao" href="?pagina=perfil&deletar_id='.$perfil->getId().'">Deletar</a></td></tr>';
                
            }
        }
        

        echo '</table>
            
            </div>';
        
    }
    
    public function formConfirmacaoDeletar(){
        echo ' <div class="confirmacao">';
        echo '<p>Tem certeza que Deletar este perfil? </p>';
        echo '<form method="post" action="">
                <input type="submit" class="botao b-primario" name="certeza_deletar" value="Confirmar" />
                <a href="?pagina=perfil" class="botao b-erro" > Cancelar </a>
                </form>';
        echo '</div>';
        
    }
    public function mensagemSucessoDeletar(){
        echo '
            <div class="borda" >
                <p>Cadastro Deletado com sucesso!</p>
            </div>';
        
        
    }
    public function mensagemFracassoDeletar(){
        echo '
            <div class="borda" >
                <p>Cadastro Deletado com Fracasso!</p>
            </div>';
        
        
    }
    public function mensagem($str){
        echo '
            <div class="borda" >
                <p>'.$str.'</p>
            </div>';
        
        
    }
}



?>