<?php

class GeraSQL{

    

    public function setInsert ($tabela,$dados){

            $strSql = "INSERT INTO $tabela ";
            $campos = "";
            $values = "";

            foreach ($dados as $key => $value) {
                    $campos .= $key .",";

                    if($key == "senha"){
                            $values .= "'".md5($value)."',";

                    }else{
                            $values .= "'".$value."',";
                    }		
            }

           $strSql .= "(".substr($campos,0,-1).") VALUES (".substr($values,0,-1).")";

           return $strSql;
    }

    public function setLoad ($tabela,$campos = "*",$add = ""){

        if(strlen($add)>0) $add = " ".$add;
        $sql = "SELECT $campos FROM $tabela $add";
        
        return $sql;

    }
    
    public function setUpdade($tabela,$campos,$add) {
        
        if(strlen($add)>0) $add = " ".$add;
        $sql = "UPDATE $tabela SET $campos $add";       
       
        return $sql;
        
    }
    
    public function setDelete($tabela,$add) {
        
        if(strlen($add)>0) $add = " ".$add;
        $sql = "DELETE FROM ". $tabela.$add;       
        
        return $sql;
        
    }
    
    public function CriarSessao($dadosSessao){
        if(session_start()){
            foreach ($dadosSessao as $nomeSessao => $value) {
              $_SESSION[$nomeSessao] = $value;
            }
            return TRUE;            
        }
        return FALSE;
        
    }
}