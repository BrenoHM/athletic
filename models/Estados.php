<?php

class Estados extends model {
    
    public $tabela = "R000EST";
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getEstados(){
        
        $dados = array();
            
        $sql = "SELECT * FROM {$this->tabela}";
        $sql = $this->db->query($sql);

        if( $sql->rowCount() > 0 ) {
            $dados = $sql->fetchAll();

        }

        return $dados;
        
    }
    
}
