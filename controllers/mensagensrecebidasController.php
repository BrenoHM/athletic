<?php

class mensagensrecebidasController extends controller {
    
    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        
        $dados = array();
        $m = new Mensagens();
        
        if( isset($_POST['excluiMsg']) ){
            
            if( isset($_POST['idMensagem']) && count($_POST['idMensagem']) > 0 ){
                if($m->deleteMensagens($_POST['idMensagem'])){
                    $dados['aviso'] = $this->mensagemSucesso("Mesagens excluídas com sucesso!");
                }else{
                    $dados['aviso'] = $this->mensagemErro("Erro ao excluir mensagens!");
                }
            }
            
        }
                
        $dados['mensagens'] = $m->getMensagens();
        
        $this->loadTemplate('mensagens-recebidas', $dados);
        
    }
    
    public function detalhe($idMensagem) {
        
        $dados = array();
        $m = new Mensagens();
                
        $dados['mensagem'] = $m->getMensagens($idMensagem);
        
        $this->loadTemplate('mensagens-detalhe', $dados);
        
    }
    
}