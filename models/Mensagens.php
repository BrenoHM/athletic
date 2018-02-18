<?php

class Mensagens extends model {
    
    public $tabela = "c007fco";
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getMensagens($idMensagem = "") {
        $dados = array();
        $where = "";
        
        if($idMensagem != ""){
            $where = "WHERE codFco = $idMensagem";
        }
            
        $sql = "SELECT * FROM {$this->tabela} $where ORDER BY codFco DESC";
        $sql = $this->db->query($sql);

        if( $sql->rowCount() > 0 ) {
            if($idMensagem != ""){
                $dados = $sql->fetch();
            }else{
                $dados = $sql->fetchAll();
            }
        }

        return $dados;
    }
    
    public function deleteMensagens($mensagens) {
        
        $sql = "DELETE FROM {$this->tabela} WHERE codFco IN(".implode(",", $mensagens).")";
        $sql = $this->db->query($sql);
        if( $sql->rowCount() > 0 ) {
            return true;
        }
        return false;
    }
    
}
