<?php

class Dashboard extends model {
    
    public $tabela = "c021ace";
    
    public function __construct() {
        parent::__construct();
    }
    
    public function listaAcesso(){
        
        $dados = array();
        
        /*$sql = "SELECT 
                (CASE DAYOFWEEK(DATE(datCad))
                WHEN 1 THEN 'Domingo'
                WHEN 2 THEN 'Segunda Feira'
                WHEN 3 THEN 'Terça Feira'
                WHEN 4 THEN 'Quarta Feira'
                WHEN 5 THEN 'Quinta Feira'
                WHEN 6 THEN 'Sexta Feira'
                WHEN 7 THEN 'Sábado'
                END) AS diaDaSemana, TRUNCATE(COUNT(*)/(SELECT COUNT(*) FROM {$this->tabela})*100, 2) AS porcentagemAcesso
                FROM {$this->tabela}
                GROUP BY 1 ORDER BY DAYOFWEEK(DATE(datCad))";
        
                
        $sql = $this->db->query($sql);
        if($sql->rowCount()>0){
            $dados = $sql->fetchAll();
        }
         * 
         */        
            return $dados;    
    }
    
}
