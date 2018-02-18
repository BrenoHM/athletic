<?php

class model {
    
    protected $db;
    
    function __construct() {
        
        global $config;
        
        $this->db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass'], array(PDO::ATTR_PERSISTENT => true));
        
    }
    
}