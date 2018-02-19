<?php

class model {
    
    protected $db;
    
    function __construct() {
        
        global $config;
        $options = array();
	//$options = array(PDO::ATTR_PERSISTENT => true);
        $this->db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass'], $options);
        
    }
    
}