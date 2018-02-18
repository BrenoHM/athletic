<?php

class logoutController extends controller {
    
    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        
        unset($_SESSION['sessionUser']);
        header("Location: ".BASE_URL);
        
    }
 
}
