<?php

class Recuperacao extends model {
    
    private $tabela = "recuperacao";

    public function __construct() {
        parent::__construct();
    }
    
    public function isExiste($email, $senha = "") {
        
        if( !empty($senha) ){
            $sql = "SELECT * FROM {$this->tabela} WHERE email = '$email' AND senha = '$senha'";
        }else{
            $sql = "SELECT * FROM {$this->tabela} WHERE email = '$email'";
        }
        
        try {
            
            $sql = $this->db->query($sql);

            if( $sql->rowCount() > 0 ){
                return true;
            }        

            return false;
        
        }  catch (PDOException $e) {
            
            echo $e->getMessage();
            
        }        
        
    }
    
    public function criar($codigo, $email, $tipoUsuatio) {
        
        $sql = "INSERT INTO {$this->tabela} SET codigo = '$codigo', email = '$email', tipoUsuario = '$tipoUsuatio'";
        $sql = $this->db->query($sql);
        return $sql->rowCount() > 0 ? true : false;
        
    }
    
    public function getId($id) {
        
        $usuario = array();
        
        $sql = "SELECT * FROM {$this->tabela} WHERE codUsu = $id";
        
        $sql = $this->db->query($sql);
        
        if($sql->rowCount() > 0){
            $usuario = $sql->fetch();
        }
        
        return $usuario;
        
    }
    
    public function getByEmail($email) {
        
        $usuario = array();
        
        $sql = "SELECT * FROM {$this->tabela} WHERE email = '$email'";
        
        $sql = $this->db->query($sql);
        
        if($sql->rowCount() > 0){
            $usuario = $sql->fetch();
        }
        
        return $usuario;
        
    }
    
    public function getUsuarios() {
        
        $usuario = array();
        
        $sql = "SELECT * FROM {$this->tabela} WHERE codUsu <> 1";
        
        $sql = $this->db->query($sql);
        
        if($sql->rowCount() > 0){
            $usuario = $sql->fetchAll();
        }
        
        return $usuario;
        
    }
    
    public function deletar($id) {
        
        $sql = "DELETE FROM {$this->tabela} WHERE codUsu = $id;";
                
        $sql = $this->db->query($sql);
        
        if($sql->rowCount() > 0){
            return true;
        }
        
        return false;
    }
        
}
