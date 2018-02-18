<?php

class contatoController extends controller {
    
    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        
        $dados = array();
        $c = new Contato();
        
        if(isset($_POST['frmContato'])) {
            $email = addslashes($_POST['emaEco']);
            if($c->atualizaConteudo($email)){
                $dados['aviso'] = $this->mensagemSucesso("Conteúdo atualizado com êxito!");
            }else{
                $dados['aviso'] = $this->mensagemErro("Conteúdo não atualizado!");
            }
        }
        
        $dados['conteudo'] = $c->getConteudo();
        
        $this->loadTemplate('contato', $dados);
        
    }
    
}