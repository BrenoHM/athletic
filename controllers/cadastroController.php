<?php

class cadastroController extends controller {
    
    function __construct() {
        parent::__construct();
    }
    
    public function index() {}
    
    public function confirmado() {
        $dados = array();
        $this->loadTemplate('atleticas/cadastro-confirmado', $dados);
    }
    
}