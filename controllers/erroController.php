<?php

class erroController extends controller {
    
    function __construct() {
        parent::__construct();
    }

    //put your code here
    public function index() {
        
        $this->loadTemplate("naoencontrado", array());
        
    }
    
    public function paginaNaoEncontrada(){
        
        $this->loadTemplate("404", array());
        
    }
}
