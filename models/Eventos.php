<?php

class Eventos extends model {
    
    private $tabela = "evento";
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getEventos($idEvento = null) {
        
        $dados = array();
        $id = Sessao::getSessionIdAtletica();
        
        if( empty($idEvento) ){
            $sql = "SELECT * FROM {$this->tabela} WHERE idAtletica = $id";
        }else{
            $sql = "SELECT * FROM {$this->tabela} WHERE idEvento = $idEvento";
        }
        
        $sql = $this->db->query($sql);
        
        if($sql->rowCount() > 0){
            if( empty($idEvento) ){
                $dados = $sql->fetchAll();
            }else{
                $dados = $sql->fetch();
            }
        }
        
        return $dados;
        
    }
    
    public function getGaleria($idEvento) {
        
        $dados = array();
        
        $sql = "SELECT * FROM galeria WHERE idEvento = $idEvento";
        
        $sql = $this->db->query($sql);
        
        if($sql->rowCount() > 0){
            $dados = $sql->fetchAll();
        }
        
        return $dados;
        
    }
    
    public function criar($nome, $idAtletica, $idUsuarioAtletica) {
        
        $idEvento = 0;
        $sql = "INSERT INTO {$this->tabela} SET nome = '$nome', idAtletica = '$idAtletica', idUsuarioAtletica = '$idUsuarioAtletica'";
        $sql = $this->db->query($sql);
        $idEvento = $this->db->lastInsertId();
        return $idEvento;
        
    }
    
    public function criarGaleria($url, $idEvento, $idUsuarioAtletica) {
        $sql = "INSERT INTO galeria SET url = '$url', idEvento = '$idEvento', idUsuarioAtletica = '$idUsuarioAtletica'";
        $sql = $this->db->query($sql);
        if($sql->rowCount() > 0){
            return true;
        }
        return false;
    }
    
    public function deletarGaleria($url) {
        
        $sql = "DELETE FROM galeria WHERE url = '$url';";
                
        $sql = $this->db->query($sql);
        
        if($sql->rowCount() > 0){
            return true;
        }
        
        return false;
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
    
    public function atualizar($idEvento, $nome) {
        
        $sql = "UPDATE {$this->tabela} SET
                nome = '$nome'
                WHERE idEvento = $idEvento;";
        
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
