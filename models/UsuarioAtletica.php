<?php

class UsuarioAtletica extends model {
    
    private $tabela = "usuarioAtletica";

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
    
    public function criar($nome, $email, $senha) {
        
        //$urlFoto = "";
        //if(!empty($foto)){
        //    $urlFoto = "imgUsu = '$foto',";
        //}
        $idUsu = 0;
        $senha = sha1($senha);
        
        $sql = "INSERT INTO {$this->tabela} SET nomUsu = '$nome', emaUsu = '$email', senUsu = '$senha', telUsu = '123', useCad = 1";
        $sql = $this->db->query($sql);
        $idUsu = $this->db->lastInsertId();
        return $idUsu;
        
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
    
    public function atualizar($idUsu, $nome, $telefone, $senha) {
        
        $updSenha = "";
        if( !empty($senha) ){
            $senha = sha1($senha);
            $updSenha = "senUsu = '$senha', ";
        }
        
//        $updImagem = "";
//        if( !empty($this->getImgUsu()) ){
//            $updImagem = "imgUsu = '{$this->getImgUsu()}',";
//        }
        
        $sql = "UPDATE {$this->tabela} SET
                nomUsu = '$nome',
                $updSenha
                telUsu = '$telefone'
                WHERE codUsu = $idUsu;";
        
        try{
                
            $sql = $this->db->query($sql);
            return true;
            
        } catch (PDOException $e){
            return false;
        }
        
    }
    
    public function deletar($id) {
        
        $sql = "DELETE FROM {$this->tabela} WHERE codUsu = $id;";
                
        $sql = $this->db->query($sql);
        
        if($sql->rowCount() > 0){
            return true;
        }
        
        return false;
    }
    
    public function getGravata($email, $width) {
        
        $userMail = $email;

        $imageWidth = $width; //The image size

        return $imgUrl = 'https://secure.gravatar.com/avatar/'.md5($userMail).'?size='.$imageWidth;
        
    }
        
}
