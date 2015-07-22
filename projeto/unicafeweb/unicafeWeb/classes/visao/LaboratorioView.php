<?php


class LaboratorioView{
	
	/**
	 * 
	 * @param Array de Laboratórios 
	 */
	
	public function mostraTabela($lista, $erro = false, $msg_erro = ""){
		
		echo '<div class="resolucao"> 
    <div class="doze colunas">
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
             echo '<tr>
             		<td>'.$laboratorio->getNome().'</td>
             		<td>
             				<a href=\'?listarlab&desligar='.$laboratorio->getId().'\' style=\'position:relative;left:17px;\'><img  src=img/editar.png></a>
             		</td>
             		<td>
             			<a href=\'?listarlab&laboratorio='.$laboratorio->getId().'\' style=\'position:relative;left:40px;\'><img  src=img/pc1.png> </a>
             		</td></tr>';
		}
		echo '</tbody>    
                </table>
</div>
    </div>
				
</div>';
		
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
                                        <tr>
                                            <th>Maquinas</th>
                                            <th>Status</th>';
				foreach($maquinas as $maquina){
					echo '<tr><td>'.$maquina->getNome().'</td><td>OK</td></tr>   ';
				}
											
										                                        
			echo '

                                    </table>      

                        </div>

                    </div>
                </div> 
                <div class=""><a class="fechar botao b-erro" href="index.php?listarlab">Fechar</a></div>




            </div>
        </div>










    </div>';
		
		
	}
	
}

?>