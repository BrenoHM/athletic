<?php

class acessoController extends controller {
    
    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $dados = array();
        $a= new Acessos();
        $acessos = $a->getAcessos();
    }
    
}