<?php

/**
 * Gerencia persistência de objetos Maquina no banco de dados. 
 * @author Jefferson Uchôa Ponte
 */
class MaquinaDAO extends DAO
{

    /**
     * Obtém objeto MaquinaDAO.
     * Atribua uma conexão no primeiro parâmetro caso queira reaproveitá-la.
     * Caso queira abrir uma nova conexão diferente da conexão do banco de dados padrão atribua null
     * no primeiro parâmetro e no segundo atribua uma constante da classe DAO para definir o tipo
     * de conexão.
     *
     *
     * @param PDO|UniCaffe $conexao
     * @param integer $tipo
     */
    public function __construct($conexao = null, $tipo = self::TIPO_DEFAULT)
    {
        parent::__construct($conexao, $tipo);
    }

    /**
     * Retorna uma máquina a partir do seu nome.
     *
     * @param Maquina $maquina
     * @return boolean
     */
    public function procuraPorNome(Maquina $maquina)
    {
        $nomeMaquina = $maquina->getNome();
        
        $sql = "SELECT * FROM maquina 
		INNER JOIN laboratorio_maquina ON maquina.id_maquina = laboratorio_maquina.id_maquina 
		INNER JOIN laboratorio ON laboratorio_maquina.id_laboratorio = laboratorio.id_laboratorio 
		WHERE maquina.nome_pc like '$nomeMaquina' LIMIT 1;";
        $result = $this->getConexao()->query($sql);
        foreach ($result as $linha) {
            $maquina->setId($linha['id_maquina']);
            $laboratorio = new Laboratorio();
            $maquina->setLaboratorio($laboratorio);
            $maquina->getLaboratorio()->setId($linha['id_laboratorio']);
            $maquina->getLaboratorio()->setNome($linha['nome_laboratorio']);
            return true;
        }
        return false;
    }

    /**
     * Retorna uma lista com todas as máquinas da conexão utilizada. 
     *
     * @return Maquina[]
     */
    public function retornaLista()
    {
        $lista = array();
        $sql = "SELECT * FROM maquina LEFT JOIN laboratorio_maquina ON maquina.id_maquina = laboratorio_maquina.id_maquina LEFT JOIN laboratorio ON laboratorio_maquina.id_laboratorio = laboratorio.id_laboratorio;";
        $result = $this->getConexao()->query($sql);
        
        foreach ($result as $linha) {
            
            $maquina = new Maquina();
            $maquina->setNome($linha['nome_pc']);
            $maquina->setId($linha['id_maquina']);
            
            $maquina->getLaboratorio()->setId($linha['id_laboratorio']);
            $maquina->getLaboratorio()->setNome($linha['nome_laboratorio']);
            $maquina->setEnderecoMac($linha['mac']);
            if ($this->getTipoDeConexao() == self::TIPO_UNICAFFE) {
                $maquina->setEnderecoMac($linha['mac']);
                $maquina->setCota($linha['cota']);
                $maquina->setStatus($linha['status_maquina']);
                $maquina->getAcesso()->setHoraInicial($linha['hora_inicial']);
                $maquina->getAcesso()->setTempoUsado($linha['tempo_usado']);
                $maquina->getAcesso()->setTempoDisponibilizado($linha['tempo_oferecido']);
                $maquina->getAcesso()->setIp($linha['ip']);
                $maquina->getAcesso()
                    ->getUsuario()
                    ->setNome($linha['nome']);
                $maquina->getAcesso()
                    ->getUsuario()
                    ->setLogin($linha['login']);
                $maquina->getAcesso()
                    ->getUsuario()
                    ->setEmail($linha['email']);
                $maquina->getAcesso()
                    ->getUsuario()
                    ->setNivelAcesso($linha['nivel_acesso']);
                $maquina->setVersao($linha['versao']);
            }
            $lista[] = $maquina;
        }
        
        return $lista;
    }

    /**
     * Lista contendo máquinas tanto do UniCaffé Serivodr como as máquinas do banco de dados.
     *
     * @return Maquina[] Uma lista de máquinas completa.
     *         Primeiro vou percorrer a lista do UniCaffe, verifico se existe na outra.
     *         Caso exista, significa que ela � cadastrada. Setamos o atributo cadastrada para
     *         true e eliminamos da lista de maquinas do banco.
     *        
     *         Caso não exista,
     *         Significa que não é cadastrada, então nós colocamos cadastrada para false.
     *        
     *         No final podemos ter alguns elementos na lista de máquinas do banco.
     *         Pegamos esses e adicionamos na lista completa. E setamos o atributo status para desconectada.
     *        
     *        
     */
    public function listaCompleta()
    {
        $daoUniCafe = new MaquinaDAO(null, DAO::TIPO_UNICAFFE);
        
        $listaDeMaquinasUniCafe = $daoUniCafe->retornaLista();
        // Antes de continuar vamos remover as repeticoes na lista do UniCafe
        foreach ($listaDeMaquinasUniCafe as $chave => $elementoRepeticao) {
            $quantidade = 0;
            foreach ($listaDeMaquinasUniCafe as $segundaChave => $elemento) {
                if ($elementoRepeticao->getNome() == $elemento->getNome())
                    $quantidade ++;
                if ($quantidade > 1) {
                    $quantidade = 1;
                    unset($listaDeMaquinasUniCafe[$chave]);
                    break;
                }
            }
        }
        
        $listaDeMaquinas = $this->retornaLista();
        $listaCompleta = array();
        
        foreach ($listaDeMaquinasUniCafe as $maquinaUniCafe) {
            // Vamos verificar se essa maquina do UniCafe Existe na outra.
            // Eliminando da lista caso exista.
            $existe = false;
            
            foreach ($listaDeMaquinas as $chave => $maquinaBanco) {
                if (strcmp(strtolower($maquinaUniCafe->getNome()), strtolower($maquinaBanco->getNome())) == 0) {
                    
                    $maquinaUniCafe->setCadastrada(true);
                    unset($listaDeMaquinas[$chave]);
                    break;
                }
            }
            $listaCompleta[] = $maquinaUniCafe;
        }
        
        foreach ($listaDeMaquinas as $desconectada) {
            $desconectada->setCadastrada(true);
            $desconectada->setStatus(Maquina::STATUS_DESCONECTADA);
            $listaCompleta[] = $desconectada;
        }
        
        // $maquinas = array ();
        $quantidade = count($listaCompleta);
        $houveTroca = false;
        $dim = count($listaCompleta);
        
        do {
            
            $houveTroca = false;
            for ($i = 0; $i < ($dim - 2); $i ++) {
                if (strcmp(strtolower($listaCompleta[$i]), strtolower($listaCompleta[$i + 1])) > 0) {
                    $maquinaAux = clone $listaCompleta[$i];
                    $listaCompleta[$i] = clone $listaCompleta[$i + 1];
                    $listaCompleta[$i + 1] = clone $maquinaAux;
                    $houveTroca = true;
                }
            }
        } while ($houveTroca);
        return $listaCompleta;
    }

    /**
     * Retorna o ip do ultimo acesso cadastrado para uma máquina.
     *
     * @param Maquina $maquina
     * @return string
     */
    public static function retornaUltimoIP(Maquina $maquina)
    {
        $idMaquina = $maquina->getId();
        $nomeMaquina = $maquina->getNome();
        $ip = "..";
        $sql = "SELECT * FROM acesso INNER JOIN maquina ON maquina.id_maquina = acesso.id_maquina WHERE nome_pc = '$nomeMaquina' ORDER BY id_acesso DESC LIMIT 1";
        $dao = new DAO();
        $result = $dao->getConexao()->query($sql);
        foreach ($result as $elemento) {
            $ip = $elemento['ip'];
            break;
        }
        return $ip;
    }

    /**
     * Retorna 100 ultimas maquinas acessadas por um usuario.
     *
     * @param Usuario $usuario
     */
    public function pesquisaHistoricoDeUsuario(Usuario $usuario)
    {
        $login = $usuario->getLogin();
        $sql = "SELECT * FROM acesso 
				INNER JOIN maquina ON acesso.id_maquina = maquina.id_maquina
				INNER JOIN usuario ON acesso.id_usuario = usuario.id_usuario
				LEFT JOIN laboratorio_maquina ON maquina.id_maquina = laboratorio_maquina.id_maquina 
				LEFT JOIN laboratorio ON laboratorio_maquina.id_laboratorio = laboratorio.id_laboratorio WHERE usuario.nome like '%$login%' ORDER BY acesso.id_acesso DESC LIMIT 8000;";
        $result = $this->getConexao()->query($sql);
        
        echo '<table class="tabela quadro doze">
    <caption>Lista de acessos<br />Pesquisa de nome: ' . $login . '</caption>';
        echo '<thead>
        <tr>
            <th>Nome </th>
            <th>E-mail</th>
		<th>lOGIN</th>

            <th>Máquina</th>
			<th>Data</th>
            <th>Hora Inicial</th>
			<th>Hora Final</th>

			<th>Tempo Usado</th>
			<th>Endereço Mac</th>
			<th>IP do acesso</th>
					
        </tr>
    </thead><tbody>';
        $tempoTotal = 0;
        foreach ($result as $elemento) {
            $time = strtotime($elemento['hora_inicial']);
            $horaInicial = date("H:i:s", $time);
            
            $horaFinal = date("H:i:s", $time + $elemento['tempo_usado']);
            $data = date("d/m/Y", $time);
            $tempoUsado = MaquinaView::segundosParaHora($elemento['tempo_usado']);
            
            echo '<tr><td> ' . $elemento['nome'] . ' </td><td> ' . $elemento['email'] . '</td>';
            echo '<td> ' . $elemento['login'] . '</td>';
            
            echo '<td> ' . $elemento['nome_pc'] . '</td><td>' . $data . '</td><td>' . $horaInicial . '</td><td>' . $horaFinal . '</td><td>' . $tempoUsado . '</td>';
            echo '<td>' . $elemento['mac'] . '</td><td>' . $elemento['ip'] . '</td></tr>';
            $tempoTotal += $elemento['tempo_usado'];
        }
        echo '<tr><td colspan="9">TOTAL: ' . MaquinaView::segundosParaHora($tempoTotal) . ' </td></tr>';
        echo '</tbody></table>';
    }
}

?>