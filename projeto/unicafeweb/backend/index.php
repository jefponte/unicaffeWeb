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


?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>	
        <meta charset="UTF-8">
        <title>Unicaffé Web</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" /><!-- meta tag para responsividade em Windows e Linux -->  
        <link rel="stylesheet" href="http://spa.dsi.unilab.edu.br/spa/css/spa.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/maquina.css" />
        <link rel="stylesheet" href="css/new_maquina.css" />
        <link rel="stylesheet" type="text/css" href="css/context.standalone.css"/>
        
    </head>
    <body>
        <div class="pagina doze colunas">
            <div class="topo doze linha fundo-branco">
                <div class="conteudo">
                    <div id="logo-unicaffe">
                        <a href="#">
                            <img alt="logotipo do Unicaffé" src="img/logo_unicaffe.png" title="Ir para Unicaffé">
                        </a>
                    </div>
                    <div id="logo-universidade">
                        <a href="#">
                            <img alt="logotipo da Unilab" src="img/logo_unilab.png" title="Ir para Unilab">
                        </a>
                    </div>
                </div>
            </div>
            <div class="unicaffe-menu">
                <ol>
                    <li><a href="#">Inicío</a></li>
                    <li><a href="#">Máquinas</a>
                        <ul class="seta-pra-cima">
                            <li><a href="#" class="ativo">Listagem</a></li>
                            <li><a href="#">Cadastro</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Laboratório</a>
                        <ul class="seta-pra-cima">
                            <li><a href="lab_visualizacao.php" class="ativo">Visualização</a></li>
                            <li><a href="#">Cadastro</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Gerenciamento</a>
                        <ul class="seta-pra-cima">
                            <li><a href="#">Subitem (1º Nível)</a>
                                <ul>
                                    <li><a href="#">Subitem (2º Nível)</a>
                                        <ul>
                                            <li><a href="#">Subitem (3º Nível) ...</a></li>
                                            <li><a href="#">Subitem com texto muito extenso</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Com ícone</a></li>
                                    <li><a href="#">Com subitens</a>
                                        <ul>
                                            <li><a href="#">Lista não ordenada</a></li>
                                            <li><a href="#">dentro de um item</a></li>
                                            <li><a href="#">cria novos níveis</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="a-direita"><a href="#" class="ativo">Login</a></li>
                </ol>
            </div>



            
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



            </div>
        </div>
        
        
    <script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/context.js"></script>
	<script type="text/javascript" src="js/unicaffe_context_menu.js" charset="UTF-8"></script>
    </body>
</html>