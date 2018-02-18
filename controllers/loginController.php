<?php

class loginController extends controller {
    
    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        
        $dados = array();
        
        //FORMULARIO DE LOGAR
        if( isset($_POST['formLogar']) && isset($_POST['emaUsu']) && !empty($_POST['emaUsu']) && isset($_POST['senUsu']) && !empty($_POST['senUsu']) ) {
            
            $email = addslashes($_POST['emaUsu']);
            $senha = addslashes($_POST['senUsu']);
            
            $u = new Usuario();
            
            if($u->isExiste($email, sha1($senha))) {
                
                $usuario = $u->getByEmail($email);
                $this->criaSessaoUsuario($usuario);
                
                header("Location: " . BASE_URL);
                
                
            }else{
                $dados['aviso'] = $this->mensagemErro("Usuário ou senha inválidos!");
            }
            
        }
        
        //FORMULARIO DE CRIAR USUÁRIO
        if( isset($_POST['formCriarConta'])){
            
            if( isset($_POST['nomUsuario']) && !empty($_POST['nomUsuario']) && isset($_POST['emaUsuario']) && !empty($_POST['emaUsuario']) && isset($_POST['senUsuario']) && !empty($_POST['senUsuario']) && isset($_POST['repetSenha']) && !empty($_POST['repetSenha']) ) {
                
                $nome        = addslashes($_POST['nomUsuario']);
                $email       = addslashes($_POST['emaUsuario']);
                $senha       = addslashes($_POST['senUsuario']);
                $confirmacao = addslashes($_POST['repetSenha']);
                $foto = "";
                
                $u = new Usuario();
                //$pattern = "[a-zA-Z]+[0-9]+[a-zA-Z0-9]*|[0-9]+[a-zA-Z][a-zA-Z0-9]*";
                if( strlen($senha) >= 6 && $senha == $confirmacao ){
                    
                    if( !$u->isExiste($email) ) {
                        
                        $idUsuarioCriado = 0;
                        $idUsuarioCriado = $u->criar($nome, $email, sha1($senha), $foto);
                        
                        if( $idUsuarioCriado > 0 ){
                            
                            $usuario = $u->getByEmail($email);
                            $this->criaSessaoUsuario($usuario);
                            header("Location: " . BASE_URL);
                            
                        }else{
                            $dados['aviso_criacao'] = $this->mensagemErro("Erro na criação do usuário!");
                        }
                        
                    }else{
                        
                        $dados['aviso_criacao'] = $this->mensagemErro("Este usuário já existe em nosso sistema!");
                        
                    }
                    
                }else{
                    
                    $dados['aviso_criacao'] = $this->mensagemErro("Dados inválidos!");
                }
                
            }else{
                $dados['aviso_criacao'] = $this->mensagemErro("Todos os campos são obrigatórios!");
            }
        }
        
        //$fb = $this->returnInstanciaFace();
        
        //URL DE LOGIN
        //$helper = $fb->getRedirectLoginHelper();
        //$permissions = array('email');
        
        //URL APOS A AUTORIZAÇÃO DE ACESSO
        //$loginUrl = $helper->getLoginUrl(BASE_URL . '/login/face', $permissions);
        
        //$dados['urlFacebook'] = $loginUrl;
           
        $this->loadView("login", $dados);
        
    }
    
    
    
    public function criaSessaoUsuario($usuario) {
        
        $_SESSION['sessionUser'] = array(
            'idUser' => $usuario['codUsu'],
            'nameUser' => $usuario['nomUsu'],
            'emailUser' => $usuario['emaUsu']
        );
        
    }

}
