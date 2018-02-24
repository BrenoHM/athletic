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
                $usuario['idAtletica'] = null; //ADMIN NAO PERTENCE A NENHUMA ATLETICA
                $usuario['nivel'] = "admin";
                $this->criaSessaoUsuario($usuario);
                
                header("Location: " . BASE_URL);
                
            }else{
                $dados['aviso'] = $this->mensagemErro("Usuário ou senha inválidos!");
            }
            
        }
        
        //FORMULARIO DE CRIAR USUÁRIO
//        if( isset($_POST['formCriarConta'])){
//            
//            if( isset($_POST['nomUsuario']) && !empty($_POST['nomUsuario']) && isset($_POST['emaUsuario']) && !empty($_POST['emaUsuario']) && isset($_POST['senUsuario']) && !empty($_POST['senUsuario']) && isset($_POST['repetSenha']) && !empty($_POST['repetSenha']) ) {
//                
//                $nome        = addslashes($_POST['nomUsuario']);
//                $email       = addslashes($_POST['emaUsuario']);
//                $senha       = addslashes($_POST['senUsuario']);
//                $confirmacao = addslashes($_POST['repetSenha']);
//                $foto = "";
//                
//                $u = new Usuario();
//                //$pattern = "[a-zA-Z]+[0-9]+[a-zA-Z0-9]*|[0-9]+[a-zA-Z][a-zA-Z0-9]*";
//                if( strlen($senha) >= 6 && $senha == $confirmacao ){
//                    
//                    if( !$u->isExiste($email) ) {
//                        
//                        $idUsuarioCriado = 0;
//                        $idUsuarioCriado = $u->criar($nome, $email, sha1($senha), $foto);
//                        
//                        if( $idUsuarioCriado > 0 ){
//                            
//                            $usuario = $u->getByEmail($email);
//                            $this->criaSessaoUsuario($usuario);
//                            header("Location: " . BASE_URL);
//                            
//                        }else{
//                            $dados['aviso_criacao'] = $this->mensagemErro("Erro na criação do usuário!");
//                        }
//                        
//                    }else{
//                        
//                        $dados['aviso_criacao'] = $this->mensagemErro("Este usuário já existe em nosso sistema!");
//                        
//                    }
//                    
//                }else{
//                    
//                    $dados['aviso_criacao'] = $this->mensagemErro("Dados inválidos!");
//                }
//                
//            }else{
//                $dados['aviso_criacao'] = $this->mensagemErro("Todos os campos são obrigatórios!");
//            }
//        }
        
        //$fb = $this->returnInstanciaFace();
        
        //URL DE LOGIN
        //$helper = $fb->getRedirectLoginHelper();
        //$permissions = array('email');
        
        //URL APOS A AUTORIZAÇÃO DE ACESSO
        //$loginUrl = $helper->getLoginUrl(BASE_URL . '/login/face', $permissions);
        
        //$dados['urlFacebook'] = $loginUrl;
           
        $this->loadView("login", $dados);
        
    }
    
    //LOGIN DAS ATLETICAS
    public function atletica(){
        
        $dados = array();
        
        //FORMULARIO DE LOGAR
        if( isset($_POST['formLogar']) && isset($_POST['emaUsu']) && !empty($_POST['emaUsu']) && isset($_POST['senUsu']) && !empty($_POST['senUsu']) ) {
            
            $email = addslashes($_POST['emaUsu']);
            $senha = addslashes($_POST['senUsu']);
            
            $u = new UsuarioAtletica();
            
            if($u->isExiste($email, sha1($senha))) {
                
                $usuario = $u->getByEmail($email);
                $usuario['codUsu'] = $usuario['idUsuarioAtletica'];
                $usuario['nomUsu'] = $usuario['nome'];
                $usuario['emaUsu'] = $usuario['email'];
                $usuario['nivel']  = "atletica";
                $this->criaSessaoUsuario($usuario);
                
                //ENCAMINHA A ATLETICA PARA COMPLETAR A INSCRIÇÃO.
                header("Location: " . BASE_URL . "/atleticas/editar/" . $usuario['idAtletica']);
                
            }else{
                $dados['aviso'] = $this->mensagemErro("Usuário ou senha inválidos!");
            }
            
        }
        
        $this->loadView("login-atletica", $dados);
    }
    
    public function esqueceu($tipoUsuario = ""){
        
        $dados = array();
        
        if( isset($_POST['formLogar']) && isset($_POST['emaUsu']) && !empty($_POST['emaUsu']) ) {
            
            $email = addslashes($_POST['emaUsu']);
            
            $u = $tipoUsuario == 'atletica' ? new UsuarioAtletica() : new Usuario();
            
            if($u->isExiste($email)) {
                
                $usuario = $u->getByEmail($email);
                $nome = $tipoUsuario == 'atletica' ? $usuario['nome'] : $usuario['nomUsu'];
                $key = sha1(time().rand(0, 9999));
                $url = BASE_URL . "/login/redefinir/" . $key;
                $tipoUsuario = $tipoUsuario == 'atletica' ? 'atletica' : 'admin';
                
                //INSERE NA TABELA DE REDEFINIÇÃO DE SENHA
                $r = new Recuperacao();
                if( $r->criar($key, $email, $tipoUsuario) ) {
                    //TEMPLATE DE EMAIL
                    $mensagem = file_get_contents("templates/tpl_redefinir_senha.html");
                    $mensagem = str_replace("{{NOME}}", $nome, $mensagem);
                    $mensagem = str_replace("{{URL}}", $url, $mensagem);

                    //ENVIA O EMAIL PARA REDEFINIÇÃO DE SENHA
                    $e = new Email();
                    $e->para = $email;
                    $e->paraNome = $nome;
                    $e->assunto = "Esqueceu sua senha?";
                    $e->mensagems = $mensagem;
                    if($e->enviaEmail()){
                        $dados['aviso'] = $this->mensagemSucesso("Foi enviada uma mensagem em seu email com as instruções para redefinir sua senha!");
                    }else{ 
                        $dados['aviso'] = $this->mensagemErro("Erro no envio do email!");
                    }
                }else{
                    $dados['aviso'] = $this->mensagemErro("Erro na criação do código de redefinição!");
                }
                
            }else{
                $dados['aviso'] = $this->mensagemErro("Email não encontrado!");
            }
            
        }
        
        $this->loadView("esqueceu-senha", $dados);
    }
    
    public function redefinir($codigo) {
        $dados = array();
        $dados['codigoValido'] = FALSE;
        $r = new Recuperacao();
        $dadosRecuperacao = $r->getDadosRecuperacao($codigo);
        if( !empty($dadosRecuperacao) ){
            $dados['codigoValido'] = TRUE;
            $dados['tipoUsuario'] = $dadosRecuperacao['tipoUsuario'];
            if( isset($_POST['formRedefinir']) ) {
                $senha  = addslashes($_POST['senUsu']);
                $senha2 = addslashes($_POST['senha2']);
                if( !empty($senha) && $senha == $senha2 ){
                    $u = $dadosRecuperacao['tipoUsuario'] == 'atletica' ? new UsuarioAtletica() : new Usuario();
                    $dadosUsuario = $u->getByEmail($dadosRecuperacao['email']);
                    if( !empty($dadosUsuario) ){
                        $idUsuario   = $dadosRecuperacao['tipoUsuario'] == 'atletica' ? $dadosUsuario['idUsuarioAtletica'] : $dadosUsuario['codUsu'];
                        $nomeUsuario = $dadosRecuperacao['tipoUsuario'] == 'atletica' ? $dadosUsuario['nome'] : $dadosUsuario['nomUsu'];
                        $telUsuario  = $dadosRecuperacao['tipoUsuario'] == 'atletica' ? $dadosUsuario['telefone'] : $dadosUsuario['telUsu'];
                        if( $u->atualizar($idUsuario, $nomeUsuario, $telUsuario, $senha) ){
                            //DELETA O CODIGO DE VERIFICACAO
                            $r->deletar($codigo);
                            $dados['aviso'] = $this->mensagemSucesso("Senha redefinida com sucesso!");
                        }else{
                            $dados['aviso'] = $this->mensagemErro("Não foi possível redefinir a senha!");
                        }
                    }else{
                        $dados['aviso'] = $this->mensagemErro("Usuário inexistemte!");
                    }
                }else{
                    $dados['aviso'] = $this->mensagemErro("Senhas não conferem!");
                }
            }
        }else{
            $dados['aviso'] = $this->mensagemErro("Código de redefinição inválido ou expirado!");
        }
        $this->loadView("redefinir-senha", $dados);
    }
    
    public function criaSessaoUsuario($usuario) {
        
        $_SESSION['sessionUser'] = array(
            'idUser'     => $usuario['codUsu'],
            'nameUser'   => $usuario['nomUsu'],
            'emailUser'  => $usuario['emaUsu'],
            'nivelUser'  => $usuario['nivel'],
            'idAtletica' => $usuario['idAtletica']
        );
        
    }

}
