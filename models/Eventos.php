<?php

class Eventos extends model {
    
    private $tabela = "evento";
    public $limiteEventosCadastrados = 10;
    public $limiteImagensCadastradas = 20;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getEventos($idEvento = null) 

    {
        
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
    
    public function getGaleria($idEvento) 

    {
        
        $dados = array();
        
        $sql = "SELECT * FROM galeria WHERE idEvento = $idEvento";
        
        $sql = $this->db->query($sql);
        
        if($sql->rowCount() > 0){
            $dados = $sql->fetchAll();
        }
        
        return $dados;
        
    }
    
    public function criar($nome, $mes, $frequencia, $idAtletica, $idUsuarioAtletica) 

    {
        
        $idEvento = 0;
        $sql = "INSERT INTO {$this->tabela} SET nome = '$nome', mes = '$mes', frequencia = '$frequencia', idAtletica = '$idAtletica', idUsuarioAtletica = '$idUsuarioAtletica'";
        $sql = $this->db->query($sql);
        $idEvento = $this->db->lastInsertId();
        return $idEvento;
        
    }
    
    public function criarGaleria($url, $idEvento, $idUsuarioAtletica) 

    {
        $sql = "INSERT INTO galeria SET url = '$url', idEvento = '$idEvento', idUsuarioAtletica = '$idUsuarioAtletica'";
        $sql = $this->db->query($sql);
        if($sql->rowCount() > 0){
            return true;
        }
        return false;
    }
    
    public function deletarGaleria($url) 

    {
        
        $sql = "DELETE FROM galeria WHERE url = '$url';";
                
        $sql = $this->db->query($sql);
        
        if($sql->rowCount() > 0){
            return true;
        }
        
        return false;
    }
    
    public function atualizar($idEvento, $nome, $mes, $frequencia) 

    {
        
        $sql = "UPDATE {$this->tabela} SET
                nome = '$nome',
                mes = '$mes',
                frequencia = '$frequencia'
                WHERE idEvento = $idEvento;";
        
        try{
            $sql = $this->db->query($sql);
            return true;
        } catch (PDOException $e){
            return false;
        }
        
    }
    
    public function deletar($id) 

    {
        
        $sql = "DELETE FROM {$this->tabela} WHERE idEvento = $id;";
                
        $sql = $this->db->query($sql);
        
        if($sql->rowCount() > 0){
            return true;
        }
        
        return false;
    }

    public function qtdEventosCadastrados($idAtletica)

    {

        $dados = array();

        $sql = "SELECT count(*) as total FROM {$this->tabela} WHERE idAtletica = $idAtletica;";

        $sql = $this->db->query($sql);

        $dados = $sql->fetch();

        return $dados['total'];

    }

    public function qtdImagensGaleria($idEvento)

    {

        $dados = array();

        $sql = "SELECT count(*) as total FROM galeria WHERE idEvento = $idEvento;";

        $sql = $this->db->query($sql);

        $dados = $sql->fetch();

        return $dados['total'];

    }
        
}
