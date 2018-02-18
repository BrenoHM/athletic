<?php

class homeController extends controller {
    
    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        
        if( Sessao::getSessionId() != "" ){
            
            $dados = array();
            $d = new Dashboard();

            $dados['acessos'] = $d->listaAcesso();
            
            $this->loadTemplate('dashboard/dashboard', $dados);
            
        }else{
            header("Location: " . BASE_URL . "/login");
        }
        
    }
    
}