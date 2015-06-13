<html>
    <head>
        
        
    </head>
    <body>
        
        
        
        <?php
            include_once 'dao/DAO.php';
        include_once './modelo/LaboratorioMaquina.php';
        include_once './dao/MaquinaLabDao.php';
        include_once './visao/LaboratorioVisao.php';
        include_once './controle/LaboratorioControl.php';
        include_once 'dao/Conexao.php';
        include_once './modelo/Laboratorio.php';
    
        include_once './dao/LabDao.php';
        include_once './dao/GeraSQL.php';
        
       // $LaboratorioControl =new LaboratorioControl();
        
        include_once 'dao/Conexao.php';
        include_once 'dao/DAO.php';
      
	echo " 
		        <li><a href='#'>1-Op&ccedil;&ouml;es administrativas<!--[if IE 7]><!--></a><!--<![endif]-->
		        <!--[if lte IE 6]><table><tr><td><![endif]-->
		        	<ul>
			            
			            <li><a href='index.php?cadastroLab' title=>Cadastrar Laboratorio</a></li>
			            <li><a href='index.php?cadastroLabMaquina' >cadastroLabMaquina</a></li>
			            
		            </ul>
                           
		                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
		        </li>
                        <li><a href='#'>2-Relat&oacute;rios<!--[if IE 7]><!--></a><!--<![endif]-->
		        <!--[if lte IE 6]><table><tr><td><![endif]-->
		        	<ul>
			            
			            <li><a href='index.php?listarmaq' title=>Listar m&aacute;quinas </a></li>
			            <li><a href='index.php?listarlab' >Listar Laborat&oacute;rios</a></li>
			           
		            </ul>
                           
		                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
		        </li>
	";
		         
				       
        
        if(isset($_GET["cadastroLab"]))
            LaboratorioControl::main(LaboratorioControl::$TELA_CADASTRO=1);
        else if  (isset($_GET["cadastroLabMaquina"])){
             LaboratorioControl::main(LaboratorioControl::$TELA_CADASTRO=2);

               
            }
           
        else if  (isset($_GET["listarmaq"])){
             LaboratorioControl::main(LaboratorioControl::$TELA_CADASTRO=3);

               
            }
        ?>
        
        
    </body>
    
    
</html>