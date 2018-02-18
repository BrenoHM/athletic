<?php

class usuariosController extends controller {
    
    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        
        $dados = array();
        $u = new Usuario();
        $dados['usuarios'] = $u->getUsuarios();
           
        $this->loadTemplate("usuarios", $dados);
        
    }
    
    public function recuperar() {
        
        $dados = array();
        
        if( isset($_POST['emaUsu']) && !empty($_POST['emaUsu']) ) {
            
            $email = addslashes($_POST['emaUsu']);
            
            $u = new usuario();
            
            if( $u->isExiste($email) ) {
                $dados['aviso'] = $this->mensagemSucesso("Um Email foi enviado com instruções para recuperação da senha!");
                unset($_POST['emaUsu']);
            }else{
                $dados['aviso'] = $this->mensagemErro("Email não encontrado!");
            }
            
        }else{
            $dados['aviso'] = $this->mensagemErro("Email é obrigatório!");
        }
        
        $this->loadView("recuperar-senha", $dados);
        
    }
    
    public function redefinir() {
        
        $dados = array();
        
        $this->loadView("redefinir-senha", $dados);
        
    }
    
//    public function dashboard() {
//        if( Sessao::getSessionId() != "" ){
//            $dados = array();
//            $this->loadTemplate("dashboard-usuario", $dados, "template-area-usuario");
//        }else{
//            header("Location: " . BASE_URL . "/login");
//        }
//    }
    
    public function registrar() { 
        
        $dados = array();
        $usuario = new Usuario();
        
        if( isset($_POST['frmRegistrarUsuario']) ) {
            $nome        = addslashes($_POST['nomUsu']);
            $email       = addslashes($_POST['emaUsu']);
            $senha       = addslashes($_POST['senUsu']);
            $repet_senha = addslashes($_POST['repetir_senha']);
            
            if( !empty($nome) && !empty($email) && !empty($senha) && !empty($repet_senha) ) {
                if( $senha == $repet_senha ) {
                    if( !$usuario->isExiste($email) ) {
                        if( $usuario->criar($nome, $email, $senha) > 0 ) {
                            $dados['aviso'] = $this->mensagemSucesso("Usuário criado com sucesso!");
                            echo "<META http-equiv='refresh' content='2;URL=".BASE_URL."/login'>";
                        }else{
                            $dados['aviso'] = $this->mensagemErro("Erro na criação de usuário!");
                        }
                    }else{
                        $dados['aviso'] = $this->mensagemErro("Email existente!");
                    }
                }else{
                    $dados['aviso'] = $this->mensagemErro("Campos de senha não estão iguais!");
                }
            }else{
                $dados['aviso'] = $this->mensagemErro("Todos os campos são obrigatórios!");
            }
        }
        
        $this->loadView("registrar-usuario", $dados);
        
    }
    
    public function perfil($idUsuario = "") {
        
        if(Sessao::getSessionId() != ""){
            
            $dados = array();
            $usuario = new Usuario();
            
            $idUsu = !empty($idUsuario) ? $idUsuario : Sessao::getSessionId();
            
            if(isset($_POST['formAtualizarDados'])) {
                
                $nome           = addslashes($_POST['nomUsu']);
                $telefone       = addslashes($_POST['telUsu']);
                $senha          = addslashes($_POST['senUsu']);
                $repetir_senha  = addslashes($_POST['repetir_senha']);
                
                if( !empty($nome) ) {
                    if( $senha == $repetir_senha ) {
                        if( $usuario->atualizar($idUsu, $nome, $telefone, $senha) ) {
                            $dados['aviso'] = $this->mensagemSucesso("Dados atualizados com sucesso!");
                        }else{
                            $dados['aviso'] = $this->mensagemErro("Erro na atualização dos dados!");
                        }
                    }else{
                        $dados['aviso'] = $this->mensagemErro("Senhas devem ser iguais!");
                    }
                }else{
                    $dados['aviso'] = $this->mensagemErro("Nome é obrigatório!");
                }
            }
            
            $dados['usuario'] = $usuario->getId($idUsu);
            $this->loadTemplate("perfil-usuario", $dados);
            
        }else{
            header("Location: " . BASE_URL . "/login");
        }
        
    }
    
    public function novo() {
        
        if(Sessao::getSessionId() != ""){
            
            $dados = array();
            $usuario = new Usuario();

            if(isset($_POST['frmUsuario'])) {
                $nome        = addslashes($_POST['nomUsu']);
                $email       = addslashes($_POST['emaUsu']);
                $senha       = addslashes($_POST['senUsu']);
                $repet_senha = addslashes($_POST['repetir_senha']);

                if( !empty($nome) && !empty($email) && !empty($senha) && !empty($repet_senha) ) {
                    if($senha == $repet_senha) {
                        if(!$usuario->isExiste($email)) {
                            if( $usuario->criar($nome, $email, $senha) > 0 ) {
                                $dados['aviso'] = $this->mensagemSucesso("Usuário criado com sucesso!");
                            }else{
                                $dados['aviso'] = $this->mensagemErro("Erro na criação de usuário!");
                            }
                        }else{
                            $dados['aviso'] = $this->mensagemErro("Email existente!");
                        }
                    }else{
                        $dados['aviso'] = $this->mensagemErro("Campos de senha não estão iguais!");
                    }
                }else{
                    $dados['aviso'] = $this->mensagemErro("Todos os campos são obrigatórios!");
                }
            }
        
            $this->loadTemplate("novo-usuario", $dados);
        
        }else{
            header("Location: " . BASE_URL . "/login");
        }
        
    }
    
    public function deletar($id) {
        
        $dados = array();
        $usuario = new Usuario();
        
        if( !empty($id) ) {
            if($id != Sessao::getSessionId()){
                $id = addslashes($id);
                if( $usuario->deletar($id) ){
                    $dados['aviso'] = $this->mensagemSucesso("Usuário excluído com êxito!");
                }else{
                    $dados['aviso'] = $this->mensagemErro("Erro ao deletar usuário!");
                }
            }else{
                $dados['aviso'] = $this->mensagemErro("Usuário logado não pode ser excluído!");
            }
        }
        
        $dados['usuarios'] = $usuario->getUsuarios();
        $this->loadTemplate("usuarios", $dados);
        
    }

}
