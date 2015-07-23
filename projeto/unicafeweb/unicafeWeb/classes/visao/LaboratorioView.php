<?php


class LaboratorioView{
	

	public function  mostraModalFormAltera($sucesso = false, $erro = false, $msg_sucesso = "", $msg_erro = ""){
		echo '<div id="modal">
        <div class="box-modal">
            <div class="box-modal-load">
                <div class="resolucao">';
		if ($sucesso)
			echo ' <div class="alerta-ajuda quatro"><div class="icone icone-enter ix16"></div><div class="titulo-alerta">'.$msg_sucesso.'</div><div class="subtitulo-alerta"><?php echo $msg_sucesso ?></div></div>';
		echo '<div class="doze colunas"><span class="titulo">Atualizar dados do laborat&oacute;rio</span>';
		if ($erro) 
			echo '<div class="alerta-erro"><div class="icone icone-clock2 ix16"></div><div class="titulo-alerta">'. $msg_erro.'</div><div class="subtitulo-alerta">'.$msg_erro.'</div></div>';
		
		echo '<form action="index.php?listar&editar" method="post" name="editar_lab" id="formulario_cadastro" class="formulario-organizado">
                            <label>
                                <object class="dois alinhado a-esquerda"> Descrição: </object>
                                <input type="text" onkeypress="return valida_texto(event,\'msg2\');" onkeyup="letras_maiusculas(this);" name="nome" placeholder="" required value="'.$nome.'"<div class="a-direta">
                                		
                                <input type="submit"  value="Enviar" name="alterar_lab" value="Alterar" /> 
                            </div>
                          </form>';
		echo '</div></div></div>';
		
		

		
		
		
	}
	
	public function mostraTabela2($lista){
		echo '<div class="resolucao"> <div class="doze colunas"><div class="conteudo fundo-branco">
            <span class="titulo">
                Listagem de Laborat&oacute;rio  
            </span>';
		echo '<table class="tabela borda-vertical zebrada"><thead><tr><th>Nome do Laborat&oacute;rio</th><th>Editar</th><th>Ver m&aacute;quinas</th></tr></thead><tbody>';
           foreach ($lista as $lab){
           		echo  '<tr><td>' . $lab->getNome() . '</td><td><a href="?editar&nome='.$lab->getNome().'&id='.$lab->getId().' style=\'position:relative;left:17px;\'><img  src=img/editar.png> </a>" . "</td>" . "<td><a href=\'?vermaquina&id='.$lab->getId().'&nome='.$lab->getId().'\' style=\'position:relative;left:40px;\'><img  src=img/pc1.png> </a></td></tr>';
           }
		echo '</tbody></table></div></div></div>';
	}
	/**
	 * 
	 * @param Array de Laborat�rios 
	 */
	
	public function mostraTabela($lista, $erro = false, $msg_erro = ""){
		
		echo '<div class="resolucao"><div class="doze colunas">
        <div class="conteudo fundo-branco">
            <span class="titulo">
                Listagem de Laborat&oacute;rio  
            </span>';
		

            if ($erro == TRUE) 
				
                echo '<div class="alerta-erro">
                    <div class="icone icone-clock2 ix16"></div>
                    <div class="titulo-alerta">'.$msg_erro.'</div>
                    <div class="subtitulo-alerta">'.$msg_erro.'</div>
                </div>'; 


                echo '<table class="tabela borda-vertical zebrada">
                    <thead>
                        <tr>
                            <th>Nome do Laborat&oacute;rio</th>
                            <th>Desligar</th>
                            <th>Ver m&aacute;quinas</th>
                		</tr>

                    </thead>
                    <tbody>';
		foreach($lista as $laboratorio){
             echo '<tr><td>'.$laboratorio->getNome().'</td>
             		<td><a href=\'?listarlab&desligar='.$laboratorio->getId().'\' style=\'position:relative;left:17px;\'><img  src=img/editar.png></a>
             		</td><td><a href=\'?listarlab&laboratorio='.$laboratorio->getId().'\' style=\'position:relative;left:40px;\'><img  src=img/pc1.png> </a></td></tr>';
		}
		echo '</tbody></table></div></div></div>';
		
	}
	
	public function mostraModal($mensagem){
		echo '<div id="modal" >
            <div class="box-modal"  style="width: 350px" >
                <div class="box-modal-load" style="width: 20px">
                    <div class="resolucao"><div class="doze colunas">
				<span class="titulo">

                            </span>  <div style="overflow: auto; width: 235px;">   
				'.$mensagem.'</div></div></div>
						
						 <div class=""><a class="fechar botao b-erro" href="index.php?listarlab">Fechar</a></div></div>
						</div></div>

				';
	}
	public function mostraMaquinas($maquinas){
		
		echo '  <div id="modal" >
            <div class="box-modal"  style="width: 350px" >
                <div class="box-modal-load" style="width: 20px">



                    <div class="resolucao"> <!-- Opcional -->

                        <div class="doze colunas">

                            <span class="titulo">

                            </span>

    
                                   <div style="overflow: auto; width: 235px; height: 600px;">   

                                    <table class="tabela borda-vertical zebrada" style="width:235px">
                                        <tr><th>Maquinas</th>
                                            <th>Status</th>';
				foreach($maquinas as $maquina){
					echo '<tr><td>'.$maquina->getNome().'</td><td>OK</td></tr>   ';
				}
			echo '</table></div></div></div><div class=""><a class="fechar botao b-erro" href="index.php?listarlab">Fechar</a></div></div></div></div>';
		
		
	}
	
	public function mostraFormCadastro($erro = false, $sucesso = false, $msg_erro = ""){
		echo '<div class="resolucao"> <!-- Opcional -->
		<!-- O layout é dividido em 12 colunas por linha. Assim, você poderá montá -->
		<!-- Ex.: Se você precisar de 12 colunas, você deverá colocar 12 DIVs com a declaração de uma coluna para cada -->
		<div class="doze colunas">
		<div class="conteudo fundo-branco">';
		if($erro)
			echo '<div class="alerta-erro"><div class="icone icone-clock2 ix16"></div><div class="titulo-alerta">'.$msg_erro.'</div><div class="subtitulo-alerta">'.$msg_erro.'</div>';
		if($sucesso)
			echo '<div class="alerta-sucesso"><div class="icone icone-download ix48"></div><div class="titulo-alerta">'.$msg_sucesso.'</div><div class="subtitulo-alerta"></div></div>';
		echo '<form action="#" method="post" name="formulario_cadastro" id="formulario_cadastro" class="formulario-organizado"><label for="lab"><object class="">Nome Laboratório: </object>
			<input type="text" name="nome" id="nome" /></label><input type="submit" value="enviar" name="formulario_cadastro" /></form></div></div></div></div>';
	}
	
}

?>