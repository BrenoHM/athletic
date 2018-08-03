<?php

require_once 'environment.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

global $config;
$config = array();

if( ENVIRONMENT == "development" ) {
    
    $config['dbname'] = 'admligau_ligauniversitaria';
    $config['host'] = 'ligauniversitariabr.com.br';
    $config['dbuser'] = 'admligau_adm';
    $config['dbpass'] = 'liga2018me';
    
    define("BASE_URL", "http://localhost/atleticas");
    define("BASE_URL_SITE", "http://localhost/atleticas");
    
} else {
    
    $config['dbname'] = 'admligau_ligauniversitaria';
    $config['host'] = 'ligauniversitariabr.com.br';
    $config['dbuser'] = 'admligau_adm';
    $config['dbpass'] = 'liga2018me';
    
    define("BASE_URL", "http://ligauniversitariasite.meeweb.com.br/admin");
    define("BASE_URL_SITE", "http://ligauniversitariasite.meeweb.com.br");
    
}