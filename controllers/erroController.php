<?php

class erroController extends controller {
    
    function __construct() {
        parent::__construct();
        if( Sessao::getSessionId() == "" ){
            header("Location: " . BASE_URL);
        }
    }

    public function index() {
        
        $this->loadTemplate("404", array());
        
    }
    
}
