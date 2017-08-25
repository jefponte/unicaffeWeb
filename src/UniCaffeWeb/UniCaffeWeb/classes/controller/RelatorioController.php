<?php

/**
 * 
 * @author Jefferson Uchôa Ponte
 *
 */
class RelatorioController{
	
	
	const TIPO_HISTOGRAMA_TURNO = 1;
	
	private $dao;
	public static function main() {
		$relatorio = new RelatorioController();
		$relatorio->gerarHistogramas();
		
	}
	
	
	public function gerarHistogramas(){
		
		
		$this->dao = new DAO();
		
		$this->formularioDuasDatas();
		
		$data1 = date("Y-m-d")."T08:00:00";
		$data2 = date("Y-m-d")."T23:59:59";
		if(isset($_GET['visualizar'])){
			$data1 = $_GET['data1'];
			$data2 = $_GET['data2'];
				
		}
		$laboratorioDao = new LaboratorioDAO($this->dao->getConexao());
		$listaDeLaboratorios = $laboratorioDao->retornaLaboratorios();
		
		echo '<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/data.js"></script>
		<script src="https://code.highcharts.com/modules/drilldown.js"></script>';
		
		echo '<div class="doze colunas conteudo">';
		$this->histogramaTurno($data1, $data2);

		foreach ($listaDeLaboratorios as $laboratorio){
			
			$this->histogramaTurno($data1, $data2, $laboratorio);
		}
		
		
		
		$matriz['utilizadores']['total'] = 0;
		//Laboratórios de Liberdade
		$matriz['utilizadores']['LABTI01'] = 0;
		
		$matriz['utilizadores']['LABTI02'] = 0;
		$matriz['utilizadores']['LABTI03'] = 0;
		$matriz['utilizadores']['LABTI04'] = 0;
		
		
		
		$resultado = $this->dao->getConexao()->query("SELECT id_usuario FROM acesso
				
				INNER JOIN maquina ON acesso.id_maquina = maquina.id_maquina
				INNER JOIN laboratorio_maquina ON laboratorio_maquina.id_maquina = maquina.id_maquina
				INNER JOIN laboratorio ON laboratorio_maquina.id_laboratorio = laboratorio.id_laboratorio
				WHERE (hora_inicial BETWEEN '$data1' AND '$data2') AND laboratorio.id_laboratorio = 1
				GROUP BY id_usuario
				");
		
		foreach ($resultado as $linha){
			$matriz['utilizadores']['LABTI01']++;
		}
		$resultado = $this->dao->getConexao()->query("SELECT id_usuario FROM acesso
		
				INNER JOIN maquina ON acesso.id_maquina = maquina.id_maquina
				INNER JOIN laboratorio_maquina ON laboratorio_maquina.id_maquina = maquina.id_maquina
				INNER JOIN laboratorio ON laboratorio_maquina.id_laboratorio = laboratorio.id_laboratorio
				WHERE (hora_inicial BETWEEN '$data1' AND '$data2') AND laboratorio.id_laboratorio = 2
				GROUP BY id_usuario
				");
		
		foreach ($resultado as $linha){
			$matriz['utilizadores']['LABTI02']++;
		}
		$resultado = $this->dao->getConexao()->query("SELECT id_usuario FROM acesso
		
				INNER JOIN maquina ON acesso.id_maquina = maquina.id_maquina
				INNER JOIN laboratorio_maquina ON laboratorio_maquina.id_maquina = maquina.id_maquina
				INNER JOIN laboratorio ON laboratorio_maquina.id_laboratorio = laboratorio.id_laboratorio
				WHERE (hora_inicial BETWEEN '$data1' AND '$data2') AND laboratorio.id_laboratorio = 3
				GROUP BY id_usuario
				");
		
		foreach ($resultado as $linha){
			$matriz['utilizadores']['LABTI03']++;
		}
		$resultado = $this->dao->getConexao()->query("SELECT id_usuario FROM acesso
		
				INNER JOIN maquina ON acesso.id_maquina = maquina.id_maquina
				INNER JOIN laboratorio_maquina ON laboratorio_maquina.id_maquina = maquina.id_maquina
				INNER JOIN laboratorio ON laboratorio_maquina.id_laboratorio = laboratorio.id_laboratorio
				WHERE (hora_inicial BETWEEN '$data1' AND '$data2') AND laboratorio.id_laboratorio = 9
				GROUP BY id_usuario
				");
		
		foreach ($resultado as $linha){
			$matriz['utilizadores']['LABTI04']++;
		}
		
		$matriz['utilizadores']['total'] = $matriz['utilizadores']['LABTI01']+$matriz['utilizadores']['LABTI02']+$matriz['utilizadores']['LABTI03']+$matriz['utilizadores']['LABTI04'];
		
		
		$matriz['tempo_utilizacao']['total'] = 0;
		$matriz['tempo_utilizacao']['LABTI01'] = 0;
		$matriz['tempo_utilizacao']['LABTI02'] = 0;
		$matriz['tempo_utilizacao']['LABTI03'] = 0;
		$matriz['tempo_utilizacao']['LABTI04'] = 0;
		
		$resultado = $this->dao->getConexao()->query("SELECT  tempo_usado
				FROM acesso
				INNER JOIN maquina ON acesso.id_maquina = maquina.id_maquina
				INNER JOIN laboratorio_maquina ON laboratorio_maquina.id_maquina = maquina.id_maquina
				INNER JOIN laboratorio ON laboratorio_maquina.id_laboratorio = laboratorio.id_laboratorio
				WHERE (hora_inicial BETWEEN '$data1' AND '$data2') AND 
				laboratorio.id_laboratorio = 1
				");
		
		foreach ($resultado as $linha){
			$matriz['tempo_utilizacao']['LABTI01'] += $linha['tempo_usado'];
		}
		$resultado = $this->dao->getConexao()->query("SELECT  tempo_usado
				FROM acesso
				INNER JOIN maquina ON acesso.id_maquina = maquina.id_maquina
				INNER JOIN laboratorio_maquina ON laboratorio_maquina.id_maquina = maquina.id_maquina
				INNER JOIN laboratorio ON laboratorio_maquina.id_laboratorio = laboratorio.id_laboratorio
				WHERE (hora_inicial BETWEEN '$data1' AND '$data2') AND
				laboratorio.id_laboratorio = 2
				");
		
		foreach ($resultado as $linha){
			$matriz['tempo_utilizacao']['LABTI02'] += $linha['tempo_usado'];
		}
		$resultado = $this->dao->getConexao()->query("SELECT  tempo_usado
				FROM acesso
				INNER JOIN maquina ON acesso.id_maquina = maquina.id_maquina
				INNER JOIN laboratorio_maquina ON laboratorio_maquina.id_maquina = maquina.id_maquina
				INNER JOIN laboratorio ON laboratorio_maquina.id_laboratorio = laboratorio.id_laboratorio
				WHERE (hora_inicial BETWEEN '$data1' AND '$data2') AND
				laboratorio.id_laboratorio = 3
				");
		
		foreach ($resultado as $linha){
			$matriz['tempo_utilizacao']['LABTI03'] += $linha['tempo_usado'];
		}
		$resultado = $this->dao->getConexao()->query("SELECT  tempo_usado
				FROM acesso
				INNER JOIN maquina ON acesso.id_maquina = maquina.id_maquina
				INNER JOIN laboratorio_maquina ON laboratorio_maquina.id_maquina = maquina.id_maquina
				INNER JOIN laboratorio ON laboratorio_maquina.id_laboratorio = laboratorio.id_laboratorio
				WHERE (hora_inicial BETWEEN '$data1' AND '$data2') AND
				laboratorio.id_laboratorio = 9
				");
		
		foreach ($resultado as $linha){
			$matriz['tempo_utilizacao']['LABTI04'] += $linha['tempo_usado'];
		}
		$matriz['tempo_utilizacao']['total'] = $matriz['tempo_utilizacao']['LABTI01']+$matriz['tempo_utilizacao']['LABTI02']+$matriz['tempo_utilizacao']['LABTI03']+$matriz['tempo_utilizacao']['LABTI04'];
		
		
		
		
		
		echo '</div>';
		
		echo '<hr><br><br>';
		
		
		
		
	}
	
	public function formularioDuasDatas(){
		$data1 = date("Y-m-d")."T08:00:00";
		$data2 = date("Y-m-d")."T23:59:59";
		echo '<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>';
		
		echo '<form action="">
		
				<label for="data1">Entre:</label>
				<input value="'.$data1.'" type="datetime-local" name="data1" id="data1" /><br>
				<label for="data2">E:</label>
				<input value="'.$data2.'" type="datetime-local" name="data2" id="data2" />
				<input type="hidden" name="pagina" value="relatorios" /><br>
				<input type="submit" name="visualizar" value="Ver" />
				</form>';
	}
	/**
	 * 
	 * @param unknown $data1
	 * @param unknown $data2
	 * O parametro laboratório aceita nulo. Se for nulo não adicionamos filtro de laboratório. 
	 * @param Laboratorio $laboratorio
	 */
	public function histogramaTurno($data1, $data2, Laboratorio $laboratorio = null){
		$strIdContainer = uniqid('container_');
		
		if($laboratorio != null){
			$idLaboratorio = $laboratorio->getId();
			
			$sql = "SELECT * FROM acesso
			INNER JOIN maquina ON acesso.id_maquina = maquina.id_maquina
			INNER JOIN laboratorio_maquina ON laboratorio_maquina.id_maquina = maquina.id_maquina
			INNER JOIN laboratorio ON laboratorio_maquina.id_laboratorio = laboratorio.id_laboratorio
			WHERE (hora_inicial BETWEEN '$data1' AND '$data2')
			AND laboratorio.id_laboratorio = $idLaboratorio;";
		}else{
			$sql = "SELECT * FROM acesso
			INNER JOIN maquina ON acesso.id_maquina = maquina.id_maquina
			INNER JOIN laboratorio_maquina ON laboratorio_maquina.id_maquina = maquina.id_maquina
			INNER JOIN laboratorio ON laboratorio_maquina.id_laboratorio = laboratorio.id_laboratorio
			WHERE hora_inicial BETWEEN '$data1' AND '$data2';";
			$laboratorio = new Laboratorio();
			$laboratorio->setNome("Todos os Laboratorios");
		}
		$result = $this->dao->getConexao()->query($sql);
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
		
		
		
		
		$percentualManha = 0;
		$percentualTarde = 0;
		$percentualNoite = 0;
		if($total){
			$percentualManha = ($tempoDeManha/$total)*100;
			$percentualTarde = ($tempoAtarde/$total)*100;
			$percentualNoite = ($tempoDeNoite/$total)*100;
		}
		
		
		echo '	<script type="text/javascript">
					$(function () {
					    // Create the chart
					    $(\'#'.$strIdContainer .'\').highcharts({
					        chart: {
					            type: \'column\'
					        },
					        title: {
					            text: \'Percentual de acessos por turno em relação ao total de acessos em '.$laboratorio->getNome().' entre a data '.date("H:i:s d/m/Y",strtotime($data1)).' e '.date("H:i:s d/m/Y",strtotime($data2)).'\'
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
							
					        }]
					    });
					});
		</script>';

		
		$horasManha = 0;
		$segundosManha = 0;
		$minutosManha = 0;
		
		$horasManha = intval($tempoDeManha/3600);
		$segundosManha = $tempoDeManha%3600;
		$minutosManha = intval($segundosManha/60);
		$segundosManha = $segundosManha%60;
		
		
		$tabela = '<table class="tabela quadro doze">
				
						<caption>
							Histograma Baseado nas horas de Uso Por Turno em '.$laboratorio->getNome().'<br /> entre '.date("H:i:s d/m/Y",strtotime($data1)).' e '.date("H:i:s d/m/Y",strtotime($data2)).'
						</caption>
						<thead>
							<tr>
								<th>#</th>
								<th>Manhã</th>
								<th>Tarde</th>
								<th>Noite</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>%</td>
								<td>'.number_format($percentualManha, 2, '.', '').'%</td>
								<td>'.number_format($percentualTarde, 2, '.', '').'%</td>
								<td>'.number_format($percentualNoite, 2, '.', '').'%</td>
								<td>100.00%</td>
							</tr>
							<tr>
								<td>Horas</td>
								<td>'.self::segundosParaHoras($tempoDeManha).'</td>
								<td>'.self::segundosParaHoras($tempoAtarde).'</td>
								<td>'.self::segundosParaHoras($tempoDeNoite).'</td>
								<td>'.self::segundosParaHoras($total).'</td>
							</tr>

						</tbody>
					</table>';
		
		
		
		echo '<div class="seis colunas relatorio">';
		
		echo '<div class="doze colunas">';
		echo '<div class="seis colunas">';
		echo '<div id="'.$strIdContainer.'" style="min-width: 310px; height: 400px; margin: 0 auto"></div>';
		echo '</div>';
		echo '<div class="seis colunas">';
		echo $tabela;
		echo '</div>';
		echo '</div>';
		
		
		echo '</div>';
			
// 		echo '<div class="seis colunas relatorio">
// 							
// 						</div>
// 						<div class="seis colunas relatorio">
// 							'..'
// 						</div>
					
				
				
				
				
// 		';		
		
		
		
		
		
	}
	
	public static function segundosParaHoras($segundos){
		$segundos = intval($segundos);
		
		$horasManha = 0;
		$segundosManha = 0;
		$minutosManha = 0;
		
		$horasManha = intval($segundos/3600);
		$segundosManha = $segundos%3600;
		$minutosManha = intval($segundosManha/60);
		$segundosManha = $segundosManha%60;
		return $horasManha.':'.$minutosManha.':'.$segundosManha;
		
	}
	
	
	
}