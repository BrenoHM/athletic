<?php

class Contato extends model {
    
    public $tabela = "c006eco";
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getConteudo() {
        $dados = array();
            
        $sql = "SELECT * FROM {$this->tabela} WHERE codEco = 1";
        $sql = $this->db->query($sql);

        if( $sql->rowCount() > 0 ) {
            $dados = $sql->fetch();
        }

        return $dados;
    }
    
    public function atualizaConteudo($email){
        
        $sql = "UPDATE {$this->tabela} SET datAtu = NOW(), emaEco = '$email' WHERE codEco = 1";
        $sql = $this->db->query($sql);

        if( $sql->rowCount() > 0 ) {
            return true;
        }

        return false;
        
    }
    
}
