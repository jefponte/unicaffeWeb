<?php 


$sessao = new Sessao ();
ini_set ( "display_errors", 1 );
function __autoload($classe) {
	if (file_exists ( 'classes/dao/' . $classe . '.php' ))
		include_once 'classes/dao/' . $classe . '.php';
	if (file_exists ( 'classes/model/' . $classe . '.php' ))
		include_once 'classes/model/' . $classe . '.php';
	if (file_exists ( 'classes/controller/' . $classe . '.php' ))
		include_once 'classes/controller/' . $classe . '.php';
	if (file_exists ( 'classes/util/' . $classe . '.php' ))
		include_once 'classes/util/' . $classe . '.php';
	if (file_exists ( 'classes/view/' . $classe . '.php' ))
		include_once 'classes/view/' . $classe . '.php';
}
if (isset ( $_GET ["sair"] )) {

	$sessao->mataSessao ();
	header ( "Location: index.php" );
}


require_once('header.php');
?>
            
            <div class="linha doze colunas fundo-azul1" >
                <div class="conteudo">
                    <div class="linha doze">
                        <h1 class="titulo texto-branco maiusculas a-esquerda seis grande">Visualização de acessos</h1>
                        <div class="a-direita seis alinhado-a-direita">
                            <form method="post" action="#" class="formulario doze">
                                <label class="dez" style="display: inline;">
                                    <span class="texto-branco negrito">Visualizar laboratório: </span>
                                    <select>
                                        <option>LABTI01</option>
                                        <option>LABTI02</option>
                                        <option>LABTI03</option>
                                    </select>
                                </label>
                                <button class="botao b-aviso duas" type="submit">Alterar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="doze colunas fundo-branco">
            
            
            
            
           
            <?php 
           	LaboratorioController::main(LaboratorioController::TELA_DEFAULT);
		// MaquinaController::main(MaquinaController::TELA_SUPER);
            
            
            ?>




<!--            <div class="linha fundo-marrom1" > -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <h>Tela 01</h> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--             </div> -->
<!--             <div class="linha fundo-branco" > -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <h>Tela 02</h> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--             </div> -->
<!--             <div class="linha fundo-marrom1" > -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <h>Tela 03</h> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--                 <br/> -->
<!--             </div> -->
        </div>
    </body>
</html>