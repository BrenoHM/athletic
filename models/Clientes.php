<?php

class Clientes extends model {
    
    public $tabela = "c018cli";

    private $codCli;
    private $nomCli;
    private $urlCli;
    private $imgCli;
    private $status;

    public function setCodCli($codCli){
        $this->codCli = $codCli;
    }

    public function getCodCli(){
        return $this->codCli;
    }

    public function setNomCli($nomCli){
        $this->nomCli = $nomCli;
    }

    public function getNomCli(){
        return $this->nomCli;
    }

    public function setUrlCli($urlCli){
        $this->urlCli = $urlCli;
    }

    public function getUrlCli(){
        return $this->urlCli;
    }

    public function setImgCli($imgCli){
        $this->imgCli = $imgCli;
    }

    public function getImgCli(){
        return $this->imgCli;
    }

    public function setStatus($status){
        $this->status = $status;
    }

    public function getStatus(){
        return $this->status;
    }
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getClientes($idCliente = "") {

        $dados = array();

        $where = ($idCliente != "") ? "WHERE codCli = :codCli" : "";
            
        $sql = "SELECT * FROM {$this->tabela} $where";
        $sql = $this->db->prepare($sql);

        if( $idCliente != "" ){
            $sql->bindValue(":codCli", $idCliente);
        }

        $sql->execute();

        if( $sql->rowCount() > 0 ) {
            $dados = ( $idCliente != "" ) ? $sql->fetch() : $sql->fetchAll();
        }

        return $dados;
    }
    
    public function inserir() {
        
        $sql = "INSERT INTO {$this->tabela} (nomCli, urlCli, imgCli) VALUES (:nomCli, :urlCli, :imgCli)";
        $sql = $this->db->prepare($sql);

        $sql->bindValue(":nomCli", $this->getNomCli());
        $sql->bindValue(":urlCli", $this->getUrlCli());
        $sql->bindValue(":imgCli", $this->getImgCli());

        $sql->execute();

        return ( $sql->rowCount() > 0 ) ? true : false;
        
    }
    
    public function atualizar() {
        
        $imgCli = "";
        if( !empty($this->getImgCli()) ){
            $imgCli = "imgCli = :imgCli, ";
        }
        
        $sql = "UPDATE {$this->tabela} SET "
            . "datAtu = NOW(), "
            . "nomCli = :nomCli, "
            . "$imgCli urlCli = :urlCli "
            . "WHERE codCli = :codCli";
        
        $sql = $this->db->prepare($sql);

        $sql->bindValue(":nomCli", $this->getNomCli());
        $sql->bindValue(":urlCli", $this->getUrlCli());
        $sql->bindValue(":codCli", $this->getCodCli());

        if( !empty($this->getImgCli()) ){
            $sql->bindValue(":imgCli", $this->getImgCli());
        }

        $sql->execute();

        return ( $sql->rowCount() > 0 ) ? true : false;
        
    }
    
    public function deletar($id) {
        
        $sql = "DELETE FROM {$this->tabela} WHERE codCli = :codCli;";
                
        $sql = $this->db->prepare($sql);

        $sql->bindValue(":codCli", $id);

        $sql->execute();
        
        return ( $sql->rowCount() > 0 ) ? true : false;

    }
    
}
