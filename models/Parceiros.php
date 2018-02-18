<?php

class Parceiros extends model {
    
    public $tabela = "c017par";
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getParceiros($idParceiro = "") {
        $dados = array();
        $where = "";
        
        if($idParceiro != ""){
            $where = "WHERE codPar = $idParceiro";
        }
            
        $sql = "SELECT * FROM {$this->tabela} $where";
        $sql = $this->db->query($sql);

        if( $sql->rowCount() > 0 ) {
            if( $idParceiro != "" ){
                $dados = $sql->fetch();
            }else{
                $dados = $sql->fetchAll();
            }
        }

        return $dados;
    }
    
    public function inserir($nomPar, $urlPar, $nomeImagem) {
        
        $sql = "INSERT INTO {$this->tabela} (nomPar, urlPar, imgPar) VALUES ('$nomPar', '$urlPar', '$nomeImagem')";
        $sql = $this->db->query($sql);
        if( $sql->rowCount() > 0 ) {
            return true;
        }
        return false;
        
    }
    
    public function atualizar($idParceiro, $nomPar, $urlPar, $nomeImagem){
        
        $imgPar = "";
        if( !empty($nomeImagem) ){
            $imgPar = "imgPar = '$nomeImagem', ";
        }
        
        $sql = "UPDATE {$this->tabela} SET "
            . "datAtu = NOW(), "
            . "nomPar = '$nomPar', "
            . "$imgPar urlPar = '$urlPar' "
            . "WHERE codPar = $idParceiro";
        
        $sql = $this->db->query($sql);

        if( $sql->rowCount() > 0 ) {
            return true;
        }

        return false;
        
    }
    
    public function deletar($id) {
        
        $sql = "DELETE FROM {$this->tabela} WHERE codPar = $id;";
                
        $sql = $this->db->query($sql);
        
        if($sql->rowCount() > 0){
            return true;
        }
        
        return false;
    }
    
}
