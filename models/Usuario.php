<?php

class Usuario extends model {
    
    private $tabela = "usuario";
    private $nomUsu;
    private $emaUsu;
    private $senUsu;
    private $imgUsu;
    private $telUsu;
    private $celUsu;
    private $cpfUsu;
    private $rgUsu;
    private $facUsu;
    private $twiUsu;
    private $insUsu;
    private $skyUsu;
    
    function getNomUsu() {
        return $this->nomUsu;
    }

    function getEmaUsu() {
        return $this->emaUsu;
    }

    function getSenUsu() {
        return $this->senUsu;
    }

    function getImgUsu() {
        return $this->imgUsu;
    }

    function getTelUsu() {
        return $this->telUsu;
    }

    function getCelUsu() {
        return $this->celUsu;
    }

    function getCpfUsu() {
        return $this->cpfUsu;
    }

    function getRgUsu() {
        return $this->rgUsu;
    }

    function getFacUsu() {
        return $this->facUsu;
    }

    function getTwiUsu() {
        return $this->twiUsu;
    }

    function getInsUsu() {
        return $this->insUsu;
    }

    function getSkyUsu() {
        return $this->skyUsu;
    }

    function setNomUsu($nomUsu) {
        $this->nomUsu = addslashes($nomUsu);
    }

    function setEmaUsu($emaUsu) {
        $this->emaUsu = addslashes($emaUsu);
    }

    function setSenUsu($senUsu) {
        if(!empty($senUsu)) {
            $this->senUsu = sha1(addslashes($senUsu));
        }
    }

    function setImgUsu($imgUsu) {
        $this->imgUsu = $imgUsu;
    }

    function setTelUsu($telUsu) {
        $this->telUsu = !empty($telUsu) ? addslashes($telUsu) : null;
    }

    function setCelUsu($celUsu) {
        $this->celUsu = !empty($celUsu) ? addslashes($celUsu) : null;
    }

    function setCpfUsu($cpfUsu) {
        $this->cpfUsu = !empty($cpfUsu) ? addslashes($cpfUsu) : null;
    }

    function setRgUsu($rgUsu) {
        $this->rgUsu = !empty($rgUsu) ? addslashes($rgUsu) : null;
    }

    function setFacUsu($facUsu) {
        $this->facUsu = !empty($facUsu) ? addslashes($facUsu) : null;
    }

    function setTwiUsu($twiUsu) {
        $this->twiUsu = !empty($twiUsu) ? addslashes($twiUsu) : null;
    }

    function setInsUsu($insUsu) {
        $this->insUsu = !empty($insUsu) ? addslashes($insUsu) : null;
    }

    function setSkyUsu($skyUsu) {
        $this->skyUsu = !empty($skyUsu) ? addslashes($skyUsu) : null;
    }

    public function __construct() {
        parent::__construct();
    }
    
    public function isExiste($email, $senha = "") {
        
        if( !empty($senha) ){
            $sql = "SELECT * FROM {$this->tabela} WHERE emaUsu = '$email' AND senUsu = '$senha'";
        }else{
            $sql = "SELECT * FROM {$this->tabela} WHERE emaUsu = '$email'";
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
        
        $sql = "SELECT * FROM {$this->tabela} WHERE emaUsu = '$email'";
        
        $sql = $this->db->query($sql);
        
        if($sql->rowCount() > 0){
            $usuario = $sql->fetch();
        }
        
        return $usuario;
        
    }
    
    public function getUsuarios() {
        
        $usuario = array();
        $id = Sessao::getSessionId();
        
        $sql = "SELECT * FROM {$this->tabela} WHERE codUsu <> $id";
        
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
