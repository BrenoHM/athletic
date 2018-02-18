<?php

class dashboardController extends controller {
    
    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        
        $dados = array();
        $d = new Dashboard();
        
        $dados['acessos'] = $d->listaAcesso();
        
        $this->loadTemplate('dashboard/dashboard', $dados);
        
    }
    
}