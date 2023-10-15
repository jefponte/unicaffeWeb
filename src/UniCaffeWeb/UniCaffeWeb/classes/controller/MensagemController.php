<?php

/**
 * Esta tela controla envio de mensagens para os Clientes. 
 * @author Jefferson Uchôa Ponte
 *
 */
class MensagemController{
    
    /**
     * Verifica o nível de acesso e inicia a tela. 
     * @param integer $nivelDeAcesso
     */
    public static function main($nivelDeAcesso){
        if($nivelDeAcesso == Sessao::NIVEL_SUPER || $nivelDeAcesso == Sessao::NIVEL_ADMIN){
            $controller = new MensagemController();
            $controller->telaMensagem();
        }else{
            echo "Acesso negado";
        }        
    }
    /**
     * Formulário de envio de mensagens aos clientes de um laboratório. 
     */
    public function telaMensagem(){
        
        
        
        echo '<div class="borda">';
        
        echo '<h1>Enviar mensagem a um laboratório</h1>
				<form action="" method="get">
					<input type="hidden" name="pagina" value="mensagens" />
				<select name="laboratorio">';
        
        
        $laboratorioDao = new LaboratorioDAO();
        $lista = $laboratorioDao->retornaLaboratorios();
        foreach ($lista as $laboratorio){
            echo "<option value=".$laboratorio->getNome().">".$laboratorio->getNome()."</option>";
            
        }
        echo '</select>
			<br>
<script type="text/javascript">
function teste(valor){
    if(valor > 900) {
        alert("Você estourou o limite de caracteres, pare agora!");
    }   
}
</script><textarea name="mensagem" cols="50" rows="10" maxlength="200" required onkeyup="teste(this.value.length)"></textarea>
			<br><input type="submit" name="enviar" />
			</form>
				';
        
        if(isset($_GET['mensagem'])){
            $mensagem = str_replace("\n", "", $_GET['mensagem']);
            $nomeLaboratorio = $_GET['laboratorio'];
            $strComando = "mensagemLaboatorio(".$nomeLaboratorio.", ".$mensagem.")";
            if(strlen($strComando) > 1000){
                echo "Mensagem muito grande. Máximo 1000 caracteres. ";
            }else
            {
                $unicafe = new UniCaffe();
                $resposta = $unicafe->dialoga($strComando);
                echo $resposta;
                
            }
            
        }
        
        echo '</div>';
        
    }
    
}

?>