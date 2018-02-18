<?php

class Sessao {
    
    public static function getSessionId() {
        
        return $_SESSION['sessionUser']['idUser'];
        
    }
    
    public static function getSessionName() {
        
        return $_SESSION['sessionUser']['nameUser'];
        
    }
    
    public static function getSessionEmail() {
        
        return $_SESSION['sessionUser']['emailUser'];
        
    }
    
    public static function getSessionImage() {
        
        return $_SESSION['sessionUser']['imgUser'];
        
    }
}
