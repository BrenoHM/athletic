<?php

class Atleticas extends model {
    
    public $tabela = "formulario";

    private $idFormulario;
    private $registroCartorio;
    private $cnpj;
    private $qtdeCampos;
    private $campus;
    private $qtdeAlunosCurso;
    private $qtdeAlunosFaculdade;
    private $salaPropria;
    private $repasseFinanceiro;
    private $passoFormulario;
    private $cursos;

    private $possuiCamisa;
    private $possuiSambaCancao;
    private $possuiBone;
    private $possuiGorro;
    private $possuiOculos;
    private $possuiCaneca;
    private $possuiTirante;
    private $possuiJaqueta;
    private $possuiEquipEsportivo;

    private $possuiUniforme;
    private $possuiBandeirao;
    private $possuiMascote;
    private $possuiBateria;
    private $meiosComunicacaoAluno;
    private $meiosComunicacaoPatrocinadora;
    private $patrocinio;
    private $patrocinioCervejaria;
    private $patrocinioEnergetico;
    private $patrocinioCerimonial;
    private $observacao;
    private $autorizacaoContrato;
    private $autorizacaoContribuicao;
    private $autorizacaoTermo;
    private $urlEstatuto;
    private $urlAta;
    private $urlLogo;
    private $urlLogoExibicaoTemp;
    private $urlLogoExibicao;    
    private $dataCad;
    private $idUsuarioAtletica;
    private $idAtletica;
    private $idUniversidade;
    private $status;

    function getIdFormulario() {
        return $this->idFormulario;
    }

    function getRegistroCartorio() {
        return $this->registroCartorio;
    }

    function getCnpj() {
        return $this->cnpj;
    }

    function getQtdeCampos() {
        return $this->qtdeCampos;
    }

    function getCampus() {
        return $this->campus;
    }

    function getQtdeAlunosCurso() {
        return $this->qtdeAlunosCurso;
    }

    function getQtdeAlunosFaculdade() {
        return $this->qtdeAlunosFaculdade;
    }

    function getSalaPropria() {
        return $this->salaPropria;
    }

    function getRepasseFinanceiro() {
        return $this->repasseFinanceiro;
    }

    function getPassoFormulario() {
        return $this->passoFormulario;
    }

    function getCursos() {
        return $this->cursos;
    }

    function getPossuiCamisa() {
        return $this->possuiCamisa;
    }

    function getPossuiSambaCancao() {
        return $this->possuiSambaCancao;
    }

    function getPossuiBone() {
        return $this->possuiBone;
    }

    function getPossuiGorro() {
        return $this->possuiGorro;
    }

    function getPossuiOculos() {
        return $this->possuiOculos;
    }

    function getPossuiCaneca() {
        return $this->possuiCaneca;
    }

    function getPossuiTirante() {
        return $this->possuiTirante;
    }

    function getPossuiJaqueta() {
        return $this->possuiJaqueta;
    }

    function getPossuiEquipEsportivo() {
        return $this->possuiEquipEsportivo;
    }

    function getPossuiUniforme() {
        return $this->possuiUniforme;
    }

    function getPossuiBandeirao() {
        return $this->possuiBandeirao;
    }

    function getPossuiMascote() {
        return $this->possuiMascote;
    }

    function getPossuiBateria() {
        return $this->possuiBateria;
    }

    function getMeiosComunicacaoAluno() {
        return $this->meiosComunicacaoAluno;
    }

    function getMeiosComunicacaoPatrocinadora() {
        return $this->meiosComunicacaoPatrocinadora;
    }

    function getPatrocinio() {
        return $this->patrocinio;
    }

    function getPatrocinioCervejaria() {
        return $this->patrocinioCervejaria;
    }

    function getPatrocinioEnergetico() {
        return $this->patrocinioEnergetico;
    }

    function getPatrocinioCerimonial() {
        return $this->patrocinioCerimonial;
    }

    function getObservacao() {
        return $this->observacao;
    }

    function getAutorizacaoContrato() {
        return $this->autorizacaoContrato;
    }

    function getAutorizacaoContribuicao() {
        return $this->autorizacaoContribuicao;
    }

    function getAutorizacaoTermo() {
        return $this->autorizacaoTermo;
    }

    function getUrlEstatuto() {
        return $this->urlEstatuto;
    }

    function getUrlAta() {
        return $this->urlAta;
    }

    function getUrlLogo() {
        return $this->urlLogo;
    }
    
    function getUrlLogoExibicaoTemp() {
        return $this->urlLogoExibicaoTemp;
    }
    
    function getUrlLogoExibicao() {
        return $this->urlLogoExibicao;
    }    

    function getDataCad() {
        return $this->dataCad;
    }

    function getIdUsuarioAtletica() {
        return $this->idUsuarioAtletica;
    }

    function getIdAtletica() {
        return $this->idAtletica;
    }

    function getIdUniversidade() {
        return $this->idUniversidade;
    }

    function setIdFormulario($idFormulario) {
        $this->idFormulario = $idFormulario;
    }

    function setRegistroCartorio($registroCartorio) {
        $this->registroCartorio = $registroCartorio;
    }

    function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    function setQtdeCampos($qtdeCampos) {
        $this->qtdeCampos = $qtdeCampos;
    }

    function setCampus($campus) {
        $this->campus = $campus;
    }

    function setQtdeAlunosCurso($qtdeAlunosCurso) {
        $this->qtdeAlunosCurso = $qtdeAlunosCurso;
    }

    function setQtdeAlunosFaculdade($qtdeAlunosFaculdade) {
        $this->qtdeAlunosFaculdade = $qtdeAlunosFaculdade;
    }

    function setSalaPropria($salaPropria) {
        $this->salaPropria = $salaPropria;
    }

    function setRepasseFinanceiro($repasseFinanceiro) {
        $this->repasseFinanceiro = $repasseFinanceiro;
    }

    function setPassoFormulario($passoFormulario) {
        $this->passoFormulario = $passoFormulario;
    }

    function setCursos($cursos) {
        $this->cursos = !empty($cursos) ? implode(",", $cursos) : null;
    }

    function setPossuiCamisa($possuiCamisa) {
        $this->possuiCamisa = $possuiCamisa;
    }

    function setPossuiSambaCancao($possuiSambaCancao) {
        $this->possuiSambaCancao = $possuiSambaCancao;
    }

    function setPossuiBone($possuiBone) {
        $this->possuiBone = $possuiBone;
    }

    function setPossuiGorro($possuiGorro) {
        $this->possuiGorro = $possuiGorro;
    }

    function setPossuiOculos($possuiOculos) {
        $this->possuiOculos = $possuiOculos;
    }

    function setPossuiCaneca($possuiCaneca) {
        $this->possuiCaneca = $possuiCaneca;
    }

    function setPossuiTirante($possuiTirante) {
        $this->possuiTirante = $possuiTirante;
    }

    function setPossuiJaqueta($possuiJaqueta) {
        $this->possuiJaqueta = $possuiJaqueta;
    }

    function setPossuiEquipEsportivo($possuiEquipEsportivo) {
        $this->possuiEquipEsportivo = $possuiEquipEsportivo;
    }

    function setPossuiUniforme($possuiUniforme) {
        $this->possuiUniforme = $possuiUniforme;
    }

    function setPossuiBandeirao($possuiBandeirao) {
        $this->possuiBandeirao = $possuiBandeirao;
    }

    function setPossuiMascote($possuiMascote) {
        $this->possuiMascote = $possuiMascote;
    }

    function setPossuiBateria($possuiBateria) {
        $this->possuiBateria = $possuiBateria;
    }

    function setMeiosComunicacaoAluno($meiosComunicacaoAluno) {
        $this->meiosComunicacaoAluno = !empty($meiosComunicacaoAluno) ? implode(",", $meiosComunicacaoAluno) : null;
    }

    function setMeiosComunicacaoPatrocinadora($meiosComunicacaoPatrocinadora) {
        $this->meiosComunicacaoPatrocinadora = !empty($meiosComunicacaoPatrocinadora) ? implode(",", $meiosComunicacaoPatrocinadora) : null;
    }

    function setPatrocinio($patrocinio) {
        $this->patrocinio = $patrocinio;
    }

    function setPatrocinioCervejaria($patrocinioCervejaria) {
        $this->patrocinioCervejaria = $patrocinioCervejaria;
    }

    function setPatrocinioEnergetico($patrocinioEnergetico) {
        $this->patrocinioEnergetico = $patrocinioEnergetico;
    }

    function setPatrocinioCerimonial($patrocinioCerimonial) {
        $this->patrocinioCerimonial = $patrocinioCerimonial;
    }

    function setObservacao($observacao) {
        $this->observacao = $observacao;
    }

    function setAutorizacaoContrato($autorizacaoContrato) {
        $this->autorizacaoContrato = $autorizacaoContrato;
    }

    function setAutorizacaoContribuicao($autorizacaoContribuicao) {
        $this->autorizacaoContribuicao = $autorizacaoContribuicao;
    }

    function setAutorizacaoTermo($autorizacaoTermo) {
        $this->autorizacaoTermo = $autorizacaoTermo;
    }

    function setUrlEstatuto($urlEstatuto) {
        $this->urlEstatuto = $urlEstatuto;
    }

    function setUrlAta($urlAta) {
        $this->urlAta = $urlAta;
    }

    function setUrlLogo($urlLogo) {
        $this->urlLogo = $urlLogo;
    }

    function setUrlLogoExibicaoTemp($urlLogoExibicaoTemp) {
        $this->urlLogoExibicaoTemp = $urlLogoExibicaoTemp;
    }
    
    function setUrlLogoExibicao($urlLogoExibicao) {
        $this->urlLogoExibicao = $urlLogoExibicao;
    }

    function setDataCad($dataCad) {
        $this->dataCad = $dataCad;
    }

    function setIdUsuarioAtletica($idUsuarioAtletica) {
        $this->idUsuarioAtletica = $idUsuarioAtletica;
    }

    function setIdAtletica($idAtletica) {
        $this->idAtletica = $idAtletica;
    }

    function setIdUniversidade($idUniversidade) {
        $this->idUniversidade = $idUniversidade;
    }
    
    function getStatus() {
        return $this->status;
    }

    function setStatus($status) {
        $this->status = $status;
    }
        
    public function __construct() {
        parent::__construct();
    }
    
    public function getAtleticas($idAtletica = "", $filtro = "") {

        $dados = array();
        $where = array();
        $strFiltro = "";

        if( $idAtletica != "" ) {
            $where[] = "idAtletica = :idAtletica";
        }

        if( $filtro != "" ) {
            $where[] = "status = :status";
        }

        if( count($where) > 0 ){
            $strFiltro = "WHERE " . implode(" AND ", $where);
        }

        //$where = ($idAtletica != "") ? "WHERE idAtletica = :idAtletica" : "";
        //$where = ($filtro != "") ? "WHERE status = :status" : "";
            
        $sql = "SELECT * FROM {$this->tabela} $strFiltro";
        $sql = $this->db->prepare($sql);

        if( $idAtletica != "" ){
            $sql->bindValue(":idAtletica", $idAtletica);
        }

        if( $filtro != "" ){
            $sql->bindValue(":status", $filtro);
        }

        $sql->execute();

        if( $sql->rowCount() > 0 ) {
            $dados = ( $idAtletica != "" ) ? $sql->fetch(PDO::FETCH_ASSOC) : $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        return $dados;
    }
    
    public function getAtleticaDetalhe($idAtletica = "") {

        $dados = array();

        $where = ($idAtletica != "") ? "WHERE a.idAtletica = :idAtletica" : "";
            
        $sql = "SELECT * FROM atletica a
                INNER JOIN formulario f ON ( a.idAtletica = f.idAtletica ) $where";
        $sql = $this->db->prepare($sql);

        if( $idAtletica != "" ){
            $sql->bindValue(":idAtletica", $idAtletica);
        }

        $sql->execute();

        if( $sql->rowCount() > 0 ) {
            $dados = ( $idAtletica != "" ) ? $sql->fetch(PDO::FETCH_ASSOC) : $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        return $dados;
    }
    
    public function mudaStatus() {
        
        $sql = "UPDATE atletica SET "
            . "status = :status "
            . "WHERE idAtletica = :idAtletica";
        
        $sql = $this->db->prepare($sql);

        $sql->bindValue(":status", $this->getStatus());
        $sql->bindValue(":idAtletica", $this->getIdAtletica());

        $sql->execute();

        return ( $sql->rowCount() > 0 ) ? true : false;
        
    }
    
    public function atualizar() {
        
        $docEstatuto = "";
        if( !empty($this->getUrlEstatuto()) ){
            $docEstatuto = "urlEstatuto = :urlEstatuto, ";
        }
        
        $docAta = "";
        if( !empty($this->getUrlAta()) ){
            $docAta = "urlAta = :urlAta, ";
        }
        
        $docLogo = "";
        if( !empty($this->getUrlLogo()) ){
            $docLogo = "urlLogo = :urlLogo, ";
        }
        
        $sql = "UPDATE {$this->tabela} SET "
            . "registroCartorio = :registroCartorio, "
            . "cnpj = :cnpj, "
            . "qtdeCampus = :qtdeCampus, "
            . "campus = :campus, "
            . "qtdeAlunosCurso = :qtdeAlunosCurso, "
            . "qtdeAlunosFaculdade = :qtdeAlunosFaculdade, "
            . "salaPropria = :salaPropria, "
            . "repasseFinanceiro = :repasseFinanceiro, "
            . "passoFormulario = :passoFormulario, "
            . "cursos = :cursos, "
            . "possuiCamisa = :possuiCamisa, "
            . "possuiSambaCancao = :possuiSambaCancao, "
            . "possuiBone = :possuiBone, "
            . "possuiGorro = :possuiGorro, "
            . "possuiOculos = :possuiOculos, "
            . "possuiCaneca = :possuiCaneca, "
            . "possuiTirante = :possuiTirante, "
            . "possuiJaqueta = :possuiJaqueta, "
            . "possuiEquipEsportivo = :possuiEquipEsportivo, "
            . "possuiUniforme = :possuiUniforme, "
            . "possuiBandeirao = :possuiBandeirao, "
            . "possuiMascote = :possuiMascote, "
            . "possuiBateria = :possuiBateria, "
            . "meiosComunicacaoAluno = :meiosComunicacaoAluno, "
            . "meiosComunicacaoPatrocinadora = :meiosComunicacaoPatrocinadora, "
            . "patrocinio = :patrocinio, "
            . "patrocinioCervejaria = :patrocinioCervejaria, "
            . "patrocinioEnergetico = :patrocinioEnergetico, "
            . "patrocinioCerimonial = :patrocinioCerimonial, "
            . "observacao = :observacao, "
            . "idUniversidade = :idUniversidade, "
            . "$docEstatuto $docAta $docLogo autorizacaoContrato = :autorizacaoContrato, autorizacaoContribuicao = :autorizacaoContribuicao, autorizacaoTermo = :autorizacaoTermo "
            . "WHERE idAtletica = :idAtletica";
        
        try{
            
            $sql = $this->db->prepare($sql);

            $sql->bindValue(":registroCartorio", $this->getRegistroCartorio());
            $sql->bindValue(":cnpj", $this->getCnpj());
            $sql->bindValue(":qtdeCampus", $this->getQtdeCampos());
            $sql->bindValue(":campus", $this->getCampus());
            $sql->bindValue(":qtdeAlunosCurso", $this->getQtdeAlunosCurso());
            $sql->bindValue(":qtdeAlunosFaculdade", $this->getQtdeAlunosFaculdade());
            $sql->bindValue(":salaPropria", $this->getSalaPropria());
            $sql->bindValue(":repasseFinanceiro", $this->getRepasseFinanceiro());
            $sql->bindValue(":passoFormulario", $this->getPassoFormulario());
            $sql->bindValue(":cursos", $this->getCursos());
            $sql->bindValue(":possuiCamisa", $this->getPossuiCamisa());
            $sql->bindValue(":possuiSambaCancao", $this->getPossuiSambaCancao());
            $sql->bindValue(":possuiBone", $this->getPossuiBone());
            $sql->bindValue(":possuiGorro", $this->getPossuiGorro());
            $sql->bindValue(":possuiOculos", $this->getPossuiOculos());
            $sql->bindValue(":possuiCaneca", $this->getPossuiCaneca());
            $sql->bindValue(":possuiTirante", $this->getPossuiTirante());
            $sql->bindValue(":possuiJaqueta", $this->getPossuiJaqueta());
            $sql->bindValue(":possuiEquipEsportivo", $this->getPossuiEquipEsportivo());
            $sql->bindValue(":possuiUniforme", $this->getPossuiUniforme());
            $sql->bindValue(":possuiBandeirao", $this->getPossuiBandeirao());
            $sql->bindValue(":possuiMascote", $this->getPossuiMascote());
            $sql->bindValue(":possuiBateria", $this->getPossuiBateria());
            $sql->bindValue(":meiosComunicacaoAluno", $this->getMeiosComunicacaoAluno());
            $sql->bindValue(":meiosComunicacaoPatrocinadora", $this->getMeiosComunicacaoPatrocinadora());
            $sql->bindValue(":patrocinio", $this->getPatrocinio());
            $sql->bindValue(":patrocinioCervejaria", $this->getPatrocinioCervejaria());
            $sql->bindValue(":patrocinioEnergetico", $this->getPatrocinioEnergetico());
            $sql->bindValue(":patrocinioCerimonial", $this->getPatrocinioCerimonial());
            $sql->bindValue(":observacao", $this->getObservacao());
            $sql->bindValue(":idUniversidade", $this->getIdUniversidade());
            $sql->bindValue(":autorizacaoContrato", $this->getAutorizacaoContrato());
            $sql->bindValue(":autorizacaoContribuicao", $this->getAutorizacaoContribuicao());
            $sql->bindValue(":autorizacaoTermo", $this->getAutorizacaoTermo());
            $sql->bindValue(":idAtletica", $this->getIdAtletica());

            if( !empty($this->getUrlEstatuto()) ){
                $sql->bindValue(":urlEstatuto", $this->getUrlEstatuto());
            }
            
            if( !empty($this->getUrlAta()) ){
                $sql->bindValue(":urlAta", $this->getUrlAta());
            }
            
            if( !empty($this->getUrlLogo()) ){
                $sql->bindValue(":urlLogo", $this->getUrlLogo());
            }

            $sql->execute();

            return true;

        }catch( PDOException $Exception ){
            return false;
        }

        //return ( $sql->rowCount() > 0 ) ? true : false;
        
    }
    
    public function deletar($id) {
        
        $sql = "DELETE FROM {$this->tabela} WHERE codCli = :codCli;";
                
        $sql = $this->db->prepare($sql);

        $sql->bindValue(":codCli", $id);

        $sql->execute();
        
        return ( $sql->rowCount() > 0 ) ? true : false;

    }
    
    public function populaObjeto($post) {
        
        $this->setRegistroCartorio($post['registroCartorio']);
        $this->setCnpj($post['cnpj']);
        $this->setQtdeCampos($post['qtdeCampos']);
        $this->setCampus($post['campus']);
        $this->setQtdeAlunosCurso($post['qtdeAlunosCurso']);
        $this->setQtdeAlunosFaculdade($post['qtdeAlunosFaculdade']);
        $this->setSalaPropria($post['salaPropria']);
        $this->setRepasseFinanceiro($post['repasseFinanceiro']);
        $this->setCursos(isset($post['cursos']) ? $post['cursos'] : "");
        $this->setPossuiCamisa($post['possuiCamisa']);
        $this->setPossuiSambaCancao($post['possuiSambaCancao']);
        $this->setPossuiBone($post['possuiBone']);
        $this->setPossuiGorro($post['possuiGorro']);
        $this->setPossuiOculos($post['possuiOculos']);
        $this->setPossuiCaneca($post['possuiCaneca']);
        $this->setPossuiTirante($post['possuiTirante']);
        $this->setPossuiJaqueta($post['possuiJaqueta']);
        $this->setPossuiEquipEsportivo($post['possuiEquipEsportivo']);
        $this->setPossuiUniforme($post['possuiUniforme']);
        $this->setPossuiBandeirao($post['possuiBandeirao']);
        $this->setPossuiMascote($post['possuiMascote']);
        $this->setPossuiBateria(isset($post['possuiBateria']) ? $post['possuiBateria'] : "");
        $this->setMeiosComunicacaoAluno(isset($post['meiosComunicacaoAluno']) ? $post['meiosComunicacaoAluno'] : "");
        $this->setMeiosComunicacaoPatrocinadora(isset($post['meiosComunicacaoPatrocinadora']) ? $post['meiosComunicacaoPatrocinadora'] : "");
        $this->setPatrocinio($post['patrocinio']);
        $this->setPatrocinioCervejaria($post['patrocinioCervejaria']);
        $this->setPatrocinioEnergetico($post['patrocinioEnergetico']);
        $this->setPatrocinioCerimonial($post['patrocinioCerimonial']);
        $this->setObservacao($post['observacao']);
        $this->setAutorizacaoContrato($post['autorizacaoContrato']);
        $this->setAutorizacaoContribuicao($post['autorizacaoContribuicao']);
        $this->setAutorizacaoTermo($post['autorizacaoTermo']);
        $this->setIdUniversidade($post['idUniversidade']);
        
    }

    public function insereUrlLogoExibicao() {
        
        $sql = "UPDATE formulario SET 
                    urlLogoExibicao = :urlLogoExibicao 
                WHERE idAtletica = :idAtletica;";

        $sql = $this->db->prepare($sql);

        $sql->bindValue(":urlLogoExibicao", $this->getUrlLogoExibicao());
        $sql->bindValue(":idAtletica", $this->getIdAtletica());

        $sql->execute();

        return ( $sql->rowCount() > 0 ) ? true : false;
        
    }
    
    
}
