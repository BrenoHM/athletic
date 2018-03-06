<?php

class eventosController extends controller {
    
    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        
        $dados = array();
        $e = new Eventos();
        $dados['eventos'] = $e->getEventos();
           
        $this->loadTemplate("eventos/index", $dados);
        
    }
    
    public function novo() {
        
        if(Sessao::getSessionId() != ""){
            
            $dados = array();
            $e = new Eventos();
            
            if(isset($_POST['frmEvento'])) {
                
                $nome        = addslashes($_POST['nome']);
                $fotos       = $_FILES['url'];

                if( !empty($nome) ) {
                    
                    //INSERE EVENTO
                    $idAtletica = Sessao::getSessionIdAtletica();
                    $idUsuarioAtletica = Sessao::getSessionId();
                    $idEventoInserido = $e->criar($nome, $idAtletica, $idUsuarioAtletica);
                    if( $idEventoInserido > 0 ){
                        
                        if( !empty($fotos['name'][0]) ) {
                            $caminho = "uploads/galeria/";
                            for($i = 0; $i < count($fotos['name']); $i++) {
                                if( in_array($fotos['type'][$i], array('image/jpeg', 'image/jpg', 'image/png')) ) {
                                    $ext = strtolower(substr($fotos['name'][$i],-4));
                                    $nomeImagem = md5(time().rand(0, 9999)) . $ext;
                                    if( move_uploaded_file($fotos['tmp_name'][$i], $caminho . $nomeImagem) ){
                                        $e->criarGaleria($nomeImagem, $idEventoInserido, $idUsuarioAtletica);
                                    }
                                }else{
                                    $dados['extensoesInvalidas'][] = $fotos['name'][$i];
                                }
                            }                            
                        }
                        
                        $dados['aviso'] = $this->mensagemSucesso("Evento criado com sucesso!");
                        echo "<META http-equiv='refresh' content='2;URL=".BASE_URL."/eventos'>";
                    }
                    
                }else{
                    $dados['aviso'] = $this->mensagemErro("Campo nom é obrigatório!");
                }
            }
        
            $this->loadTemplate("eventos/criar", $dados);
        
        }else{
            header("Location: " . BASE_URL . "/login");
        }
        
    }
    
    public function editar($idEvento) {
        
        if(Sessao::getSessionId() != ""){
            
            $dados = array();
            $e = new Eventos();
            
            if(isset($_POST['frmEvento'])) {
                
                $nome        = addslashes($_POST['nome']);
                $fotos       = $_FILES['url'];

                if( !empty($nome) ) {
                    
                    //INSERE EVENTO
                    $idAtletica = Sessao::getSessionIdAtletica();
                    $idUsuarioAtletica = Sessao::getSessionId();
                    $idEventoInserido = $e->criar($nome, $idAtletica, $idUsuarioAtletica);
                    if( $idEventoInserido > 0 ){
                        
                        if( !empty($fotos['name'][0]) ) {
                            $caminho = "uploads/galeria/";
                            for($i = 0; $i < count($fotos['name']); $i++) {
                                if( in_array($fotos['type'][$i], array('image/jpeg', 'image/jpg', 'image/png')) ) {
                                    $ext = strtolower(substr($fotos['name'][$i],-4));
                                    $nomeImagem = md5(time().rand(0, 9999)) . $ext;
                                    if( move_uploaded_file($fotos['tmp_name'][$i], $caminho . $nomeImagem) ){
                                        $e->criarGaleria($nomeImagem, $idEventoInserido, $idUsuarioAtletica);
                                    }
                                }else{
                                    $dados['extensoesInvalidas'][] = $fotos['name'][$i];
                                }
                            }                            
                        }
                        
                        $dados['aviso'] = $this->mensagemSucesso("Evento criado com sucesso!");
                        echo "<META http-equiv='refresh' content='2;URL=".BASE_URL."/eventos'>";
                    }
                    
                }else{
                    $dados['aviso'] = $this->mensagemErro("Campo nom é obrigatório!");
                }
            }
            
            $dados['evento'] = $e->getEventos($idEvento);
            $dados['fotos']  = $e->getGaleria($idEvento);
        
            $this->loadTemplate("eventos/editar", $dados);
        
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
