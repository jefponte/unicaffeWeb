<?php



class PerfilDAO extends DAO{
    
    public function inserir(Perfil $perfil){
        $nome = $perfil->getNome();
        $cota = $perfil->getCota();
        $visitante = $perfil->isVisitanteHabilitado();
        $lotacao = $perfil->getLotacao();
        $bonus = $perfil->isBonusHabilitado();
        $tempoTurno = $perfil->getTempoTurno();

        $sql = "INSERT INTO perfil
                (
                    nome_perfil,
                    cota,
                    visitante,
                    bonus,
                    lotacao,
                    tempo_turno
            
                )
                VALUES(?, ?, ?, ?, ?, ?);";
        
        
        try {
            $stmt = $this->getConexao()->prepare($sql);
            $stmt->bindParam(1, $nome);
            $stmt->bindParam(2, $cota);
            $stmt->bindValue(3, $visitante, PDO::PARAM_BOOL);
            $stmt->bindValue(4, $bonus, PDO::PARAM_BOOL);
            $stmt->bindParam(5, $lotacao);
            $stmt->bindParam(6, $tempoTurno);
            return $stmt->execute();
        } catch(PDOException $e) {
            echo '{"erro":{"text":'. $e->getMessage() .'}}';
            return false;
        }

        
    }
    
    public function retornaLista(){
        $lista = array();
        $result = $this->getConexao()->query("SELECT * FROM perfil");
        
        foreach ($result as $linha){
            $perfil = new Perfil();
            $perfil->setId($linha['id_perfil']);
            $perfil->setNome($linha['nome_perfil']);
            $perfil->setCota($linha['cota']);
            $perfil->setVisitanteHabilitado($linha['visitante']);
            $perfil->setBonusHabilitado($linha['bonus']);
            $perfil->setLotacao($linha['lotacao']);
            $perfil->setTempoTurno($linha['tempo_turno']);
            $lista[] = $perfil;
            
        }
        return $lista;
    }
   
    public function carregarPerfil(Laboratorio $laboratorio){
        $id = $laboratorio->getId();
        $sql = "SELECT * FROM perfil INNER JOIN perfil_laboratorio ON perfil_laboratorio.id_perfil = perfil.id_perfil
        WHERE id_laboratorio = $id";
        $result = $this->getConexao()->query($sql);
        foreach ($result as $linha){
            $laboratorio->getPerfil()->setNome($linha['nome_perfil']);
            $laboratorio->getPerfil()->setId($linha['id_perfil']);
        }
    }
    public function deletar(Perfil $perfil){
        $id = $perfil->getId();
        return $this->getConexao()->exec("DELETE FROM perfil WHERE id_perfil = $id");
        
    }
    
    
}