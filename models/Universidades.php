<?php

class Universidades extends model {
    
    public $tabela = "universidade";
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getUniversidades(){
        
        $dados = array();
            
        $sql = "SELECT * FROM {$this->tabela}";
        $sql = $this->db->query($sql);

        if( $sql->rowCount() > 0 ) {
            $dados = $sql->fetchAll();
        }
        
        return $dados;
        
    }
    
}
