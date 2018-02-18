<?php

class parceirosController extends controller {
    
    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        
        $dados = array();
        $p = new Parceiros();
        
        $dados['parceiros'] = $p->getParceiros();
        
        $this->loadTemplate('parceiros', $dados);
        
    }
    
    public function novo() {
        
        $dados = array();
        $p = new Parceiros();
        
        if(isset($_POST['frmParceiro'])) {
            
            $nomPar = addslashes($_POST['nomPar']);
            $urlPar = addslashes($_POST['urlPar']);
            $imgPar = $_FILES['imgPar'];
            
            if( !empty($nomPar) && !empty($imgPar['name']) ){
                
                //ENVIO DA IMAGEM
                $nomeImagem = "";
                if(in_array($imgPar['type'], array('image/jpeg', 'image/jpg', 'image/png'))) {
                    $caminho = "../images/parceiros/";
                    $ext = "jpg";
                    if($imgPar['type'] == 'image/png'){
                        $ext = "png";
                    }
                    $nomeImagem = md5(time().rand(0, 9999)) . '.' . $ext;
                    move_uploaded_file($imgPar['tmp_name'], $caminho . $nomeImagem);
                }
                
                if( $p->inserir($nomPar, $urlPar, $nomeImagem) ){
                    $dados['aviso'] = $this->mensagemSucesso("Parceiro criado com êxito!");
                    echo "<META http-equiv='refresh' content='1;URL=".BASE_URL."/parceiros'>";
                }else{
                    $dados['aviso'] = $this->mensagemErro("Erro ao criar parceiro!");
                }
            }else{
                $dados['aviso'] = $this->mensagemErro("Campos nome e logomarca são de preenchimento obrigatório!");
            }
        }
        
        $this->loadTemplate('novo-parceiro', $dados);
        
    }
    
    public function editar($idParceiro) {
        
        if(Sessao::getSessionId() != ""){
            
            $dados = array();
            $p = new Parceiros();
            
            if(isset($_POST['frmParceiro'])) {
                
                $nomPar = addslashes($_POST['nomPar']);
                $urlPar = addslashes($_POST['urlPar']);
                $imgPar = $_FILES['imgPar'];
                
                if( !empty($nomPar) ){
                
                    //ENVIO DA IMAGEM
                    $nomeImagem = "";
                    if(in_array($imgPar['type'], array('image/jpeg', 'image/jpg', 'image/png'))) {
                        $tabela = new Parceiros();
                        $this->deletaImg("../images/parceiros/", $tabela->tabela, $idParceiro);
                        $caminho = "../images/parceiros/";
                        $ext = "jpg";
                        if($imgPar['type'] == 'image/png'){
                            $ext = "png";
                        }
                        $nomeImagem = md5(time().rand(0, 9999)) . '.' . $ext;
                        move_uploaded_file($imgPar['tmp_name'], $caminho . $nomeImagem);
                    }

                    if( $p->atualizar($idParceiro, $nomPar, $urlPar, $nomeImagem) ){
                        $dados['aviso'] = $this->mensagemSucesso("Parceiro atualizado com êxito!");
                        echo "<META http-equiv='refresh' content='1;URL=".BASE_URL."/parceiros'>";
                    }else{
                        $dados['aviso'] = $this->mensagemErro("Erro ao atualizar parceiro!");
                    }
                }else{
                    $dados['aviso'] = $this->mensagemErro("Campos são de preenchimento obrigatório!");
                }
            }
            
            $dados['parceiro'] = $p->getParceiros($idParceiro);
            $this->loadTemplate("editar-parceiro", $dados);
            
        }else{
            header("Location: " . BASE_URL . "/login");
        }
        
    }
    
    public function deletar($id) {
        
        $tabela = new Parceiros();
        $this->deletaImg("../images/parceiros/", $tabela->tabela, $id);
        
        $dados = array();
        $p = new Parceiros();
        
        if( !empty($id) ) {
            $id = addslashes($id);
            if( $p->deletar($id) ){
                $dados['aviso'] = $this->mensagemSucesso("Parceiro excluído com êxito!");
            }else{
                $dados['aviso'] = $this->mensagemErro("Erro ao deletar parceiro!");
            }
        }
        
        $dados['parceiros'] = $p->getParceiros();
        $this->loadTemplate("parceiros", $dados);
        
    }
    
}