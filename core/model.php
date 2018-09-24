<?php

class model {
    
    protected $db;
    
    function __construct() {
        
        global $config;
        $options = array();
	//$options = array(PDO::ATTR_PERSISTENT => true);
        $this->db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'].";charset=utf8", $config['dbuser'], $config['dbpass'], $options);
        
    }
    
}