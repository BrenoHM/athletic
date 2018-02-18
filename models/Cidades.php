<?php

class Cidades extends model {
    
    public $tabela = "R000CID";
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getCidades($uf){
        
        $dados = array();
        $retorno = array();
            
        $sql = "SELECT * FROM {$this->tabela} WHERE id_uf = $uf";
        $sql = $this->db->query($sql);

        if( $sql->rowCount() > 0 ) {
            $dados = $sql->fetchAll();
        }
        foreach ($dados as $dado){
            $retorno[] = array(
                "id" => $dado["id"],
                "descricao" => utf8_encode($dado["descricao"])
            );
        }
        
        return $retorno;
        
    }
    
}
