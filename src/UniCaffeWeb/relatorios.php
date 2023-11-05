<?php 

$sessao = new Sessao ();

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

$laboratorioDao = new LaboratorioDAO();
$listaDeLaboratorios = $laboratorioDao->retornaLaboratorios();
if (isset ( $_GET ["sair"] )) {

	$sessao->mataSessao ();
	header ( "Location: index.php" );
}
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Unicaffé Web</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<!-- meta tag para responsividade em Windows e Linux -->
<link rel="stylesheet"
	href="http://spa.dsi.unilab.edu.br/spa/css/spa.css" />
<link rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>


</head>
<body>
	<div class="pagina doze colunas">
		<div class="topo doze linha fundo-branco">
			<div class="conteudo">
				<div id="logo-unicaffe">
					<a href="#"> <img alt="logotipo do Unicaffé"
						src="img/logo_unicaffe.png" title="Ir para Unicaffé">
					</a>
				</div>
				<div id="logo-universidade">
					<a href="#"> <img alt="logotipo da Unilab"
						src="img/logo_unilab.png" title="Ir para Unilab">
					</a>
				</div>
			</div>
		</div>
		<div class="unicaffe-menu">
			<ol>
				<li><a href="?pagina=inicio">Inicío</a></li>
				<li><a href="?pagina=laboratorios">Laboratório</a>
					<ul class="seta-pra-cima">
						<li><a href="?pagina=laboratorios" class="ativo">Visualização</a></li>
						<li><a href="?pagina=laboratorios_cadastro">Cadastro</a></li>
					</ul></li>
				<li><a href="?pagina=maquinas">Máquinas</a>
					<ul class="seta-pra-cima">
						<li><a href="?pagina=maquinas" class="ativo">Listagem</a>
							<ul>
								<li><a href="?pagina=maquinas&laboratorio=BIBLIBERDADE">BIBLIBERDADE</a></li>
								<li><a href="?pagina=maquinas&laboratorio=BIBPALMARES">BIBPALMARES</a></li>
								<li><a href="?pagina=maquinas&laboratorio=LABTI01">LABTI01</a></li>
								<li><a href="?pagina=maquinas&laboratorio=LABTI02">LABTI02</a></li>
								<li><a href="?pagina=maquinas&laboratorio=LABTI03">LABTI03</a></li>
								<li><a href="?pagina=maquinas&laboratorio=LABTI04">LABTI04</a></li>
							</ul></li>
					</ul></li>

				<li><a href="?pagina=gerenciamento_relatorios">Gerenciamento</a>
					<ul class="seta-pra-cima">
						<li><a href="?pagina=gerenciamento_relatorios">Relatorios </a></li>
						<li><a href="?pagina=gerenciamento_administrador">Administrador</a></li>
						<li><a href="?pagina=maquinas&comando=10&maquina=LABTI08">Teste Oi
								Ligador</a></li>
					</ul></li>
				<li class="a-direita"><a href="?sair=daqui" class="ativo">Sair</a></li>
			</ol>
		</div>
<?php 
echo date("d/m/Y H:i:s").'<br>';
$dao = new DAO();
$result = $dao->getConexao()->query("SELECT * FROM acesso
		INNER JOIN maquina ON acesso.id_maquina = maquina.id_maquina
		INNER JOIN laboratorio_maquina ON laboratorio_maquina.id_maquina = maquina.id_maquina
		INNER JOIN laboratorio ON laboratorio_maquina.id_laboratorio = laboratorio.id_laboratorio
		 WHERE (hora_inicial BETWEEN '2015-10-01 01:00:00' AND '2015-12-31 23:59:59')
		AND laboratorio.id_laboratorio = 1
		;");
$i = 0;
$total = 0;

$tempoDeManha = 0;
$tempoAtarde = 0;
$tempoDeNoite = 0;


foreach($result as $linha){
		
	$timeInicioManha = strtotime("05:00:00");
	$timeInicioTarde = strtotime("13:00:00");
	$timeInicioNoite = strtotime("19:00:00");
// 	$tempoDoRegistro = strtotime(date("H:i:s",strtotime(strtotime($linha['hora_inicial']))));
	
	$tempoDoRegistro = date("H:i:s", strtotime($linha['hora_inicial']));
	$tempoDoRegistro = strtotime($tempoDoRegistro);
	
	
	
	if($tempoDoRegistro < $timeInicioTarde)
	{	
		$tempoDeManha += $linha['tempo_usado'];
// 		echo "<br>manhã<br>";
	}else if($tempoDoRegistro >= $timeInicioTarde && $tempoDoRegistro < $timeInicioNoite)
	{
		$tempoAtarde += $linha['tempo_usado'];
// 		echo "<br>Tarde<br>";
	}else if($tempoDoRegistro >= $timeInicioNoite)
	{
		$tempoDeNoite += $linha['tempo_usado'];
// 		echo "<br>NOite<br>";
	}
	
	
	
// 	echo date("d/m/Y H:i:s", strtotime($linha['hora_inicial'])).' - <br>';
	$i++;
	$total += $linha['tempo_usado'];
	
}



echo "Tempo total usado ".$total." .<br>";
echo "Tempo De manhã ".$tempoDeManha." .<br>";
echo "Tempo De tarde ".$tempoAtarde." .<br>";
echo "Tempo De NOite ".$tempoDeNoite." .<br>";





$percentualManha = ($tempoDeManha/$total)*100;
$percentualTarde = ($tempoAtarde/$total)*100;
$percentualNoite = ($tempoDeNoite/$total)*100;
echo '<br>'.number_format($percentualManha, 2, '.', '')."% de manhã<br>";
echo number_format($percentualTarde, 2, '.', '')."% de Tarde<br>";
echo  number_format($percentualNoite, 2, '.', '')."% de NOite<br>";


echo '	<script type="text/javascript">
$(function () {
    // Create the chart
    $(\'#container\').highcharts({
        chart: {
            type: \'column\'
        },
        title: {
            text: \'Percentual de acessos por turno em relação ao total de acessos em liberdade entre a data 01/01/2016 e 30/01/2016\'
        },
        xAxis: {
            type: \'category\'
        },
        yAxis: {
            title: {
                text: \'Percentual em relação ao somatório de horas de utilização\'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: \'{point.y:.1f}%\'
                }
            }
        },

        tooltip: {
            headerFormat: \'<span style="font-size:11px">{series.name}</span><br>\',
            pointFormat: \'<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>\'
        },

        series: [{
            name: \'Utilização\',
            colorByPoint: true,
            data: [{
                name: \'Manhã\',
                y: '.$percentualManha.',
                drilldown: \'Manhã\'
            }, {
                name: \'Tarde\',
                y: '.$percentualTarde.',
                drilldown: \'Tarde\'
            }, {
                name: \'Noite\',
                y: '.$percentualNoite.',
                drilldown: \'Noite\'
            }]
        
        }],
        drilldown: {
            series: [{
                name: \'Microsoft Internet Explorer\',
                id: \'Microsoft Internet Explorer\',
                data: [
                    [
                        \'v11.0\',
                        24.13
                    ],
                    [
                        \'v8.0\',
                        17.2
                    ],
                    [
                        \'v9.0\',
                        8.11
                    ],
                    [
                        \'v10.0\',
                        5.33
                    ],
                    [
                        \'v6.0\',
                        1.06
                    ],
                    [
                        \'v7.0\',
                        0.5
                    ]
                ]
            },{
                name: \'Opera\',
                id: \'Opera\',
                data: [
                    [
                        \'v12.x\',
                        0.34
                    ],
                    [
                        \'v28\',
                        0.24
                    ],
                    [
                        \'v27\',
                        0.17
                    ],
                    [
                        \'v29\',
                        0.16
                    ]
                ]
            }]
        }
    });
});
		</script>';


?>

		<br />
	
	
		
	
	
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/data.js"></script>
		<script src="https://code.highcharts.com/modules/drilldown.js"></script>
		
		<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
		
		
		
		
		
		

	</div>
	
	<div class="linha doze colunas fundo-marrom">
		<div class="conteudo">
			<p class="medio centralizado conteudo texto-branco">Desenvolvido pela Divisão de Suporte (DISUP) © 2015 - DTI / Unilab</p>
		</div>
	</div>


</body>
</html>