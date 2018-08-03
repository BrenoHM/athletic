<?php

class Cursos extends model {
    
    public $tabela = "curso";
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getCursos()

    {
        
        $dados = array();
            
        $sql = "SELECT * FROM {$this->tabela} ORDER BY curso";
        $sql = $this->db->query($sql);

        if( $sql->rowCount() > 0 ) {
            $dados = $sql->fetchAll();
        }
        
        return $dados;
        
    }
    
}
