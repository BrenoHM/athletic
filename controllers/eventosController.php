<?php

class eventosController extends controller {
    
    function __construct() {
        parent::__construct();
    }
    
    public function index() 

    {
        
        if(Sessao::getSessionNivel() == "atletica"){

            $dados                   = array();
            $e                       = new Eventos();
            $dados['eventos']        = $e->getEventos();
            $idAtletica              = Sessao::getSessionIdAtletica();
            $dados['limiteLiberado'] = true;
            if ( $e->qtdEventosCadastrados($idAtletica) >= $e->limiteEventosCadastrados ){
                $dados['limiteLiberado'] = false;
            }

            $this->loadTemplate("eventos/index", $dados);
        }else{
            header("Location: " . BASE_URL);
        }

    }
    
    public function novo() {
        
        if(Sessao::getSessionId() != "" && Sessao::getSessionNivel() == "atletica"){
            
            $dados = array();
            $e = new Eventos();

            $idAtletica = Sessao::getSessionIdAtletica();
            if( $e->qtdEventosCadastrados($idAtletica) >= $e->limiteEventosCadastrados ) {
                //die('ok');
                header('Location:' . BASE_URL . '/eventos');
            }
            
            if(isset($_POST['frmEvento'])) {
                
                $nome        = addslashes($_POST['nome']);
                $mes         = addslashes($_POST['mes']);
                $frequencia  = addslashes($_POST['frequencia']);
                $fotos       = $_FILES['url'];

                $sizeImages = 3 * 1024 * 1024; //3MB

                if( !empty($nome) ) {
                    
                    //INSERE EVENTO
                    $idAtletica = Sessao::getSessionIdAtletica();
                    $idUsuarioAtletica = Sessao::getSessionId();
                    $idEventoInserido = $e->criar($nome, $mes, $frequencia, $idAtletica, $idUsuarioAtletica);
                    if( $idEventoInserido > 0 ){
                        
                        if( !empty($fotos['name'][0]) ) {
                            $caminho = "uploads/galeria/";
                            for($i = 0; $i < count($fotos['name']); $i++) {
                                if( in_array($fotos['type'][$i], array('image/jpeg', 'image/jpg', 'image/png')) && $fotos['size'][$i] <= $sizeImages ) {

                                    $ext = strtolower(substr($fotos['name'][$i],-4));
                                    $nomeImagem = md5(time().rand(0, 9999)) . $ext;

                                    if ( $e->qtdImagensGaleria($idEventoInserido) < $e->limiteImagensCadastradas ){
                                        if( move_uploaded_file($fotos['tmp_name'][$i], $caminho . $nomeImagem) ){
                                            $e->criarGaleria($nomeImagem, $idEventoInserido, $idUsuarioAtletica);
                                        }
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
                    $dados['aviso'] = $this->mensagemErro("Campo nome é obrigatório!");
                }
            }
        
            $this->loadTemplate("eventos/criar", $dados);
        
        }else{
            header("Location: " . BASE_URL);
        }
        
    }
    
    public function editar($idEvento) {
        
        $e = new Eventos();
        $evento = $e->getEventos($idEvento);

        if( Sessao::getSessionNivel() == "atletica" && $evento['idAtletica'] == Sessao::getSessionIdAtletica() ){

            $dados = array();
            
            if(isset($_POST['frmEvento'])) {
                
                $nome        = addslashes($_POST['nome']);
                $mes         = addslashes($_POST['mes']);
                $frequencia  = addslashes($_POST['frequencia']);
                $fotos       = $_FILES['url'];

                if( !empty($nome) ) {
                    
                    //EDITAR EVENTO
                    $idUsuarioAtletica = Sessao::getSessionId();
                    if( $e->atualizar($idEvento, $nome, $mes, $frequencia) ) {
                        
                        if( !empty($fotos['name'][0]) ) {
                            $caminho = "uploads/galeria/";
                            for($i = 0; $i < count($fotos['name']); $i++) {
                                if( in_array($fotos['type'][$i], array('image/jpeg', 'image/jpg', 'image/png')) ) {

                                    $ext = strtolower(substr($fotos['name'][$i],-4));
                                    $nomeImagem = md5(time().rand(0, 9999)) . $ext;

                                    if ( $e->qtdImagensGaleria($idEvento) < $e->limiteImagensCadastradas ){
                                        if( move_uploaded_file($fotos['tmp_name'][$i], $caminho . $nomeImagem) ){
                                            $e->criarGaleria($nomeImagem, $idEvento, $idUsuarioAtletica);
                                        }
                                    }

                                }else{
                                    $dados['extensoesInvalidas'][] = $fotos['name'][$i];
                                }
                            }                            
                        }
                        
                        $dados['aviso'] = $this->mensagemSucesso("Evento atualizado com sucesso!");
                        echo "<META http-equiv='refresh' content='2;URL=".BASE_URL."/eventos'>";
                    }
                    
                }else{
                    $dados['aviso'] = $this->mensagemErro("Campo nome é obrigatório!");
                }
            }
            
            if(isset($_POST['frmGaleria'])) {
                if( isset($_POST['url']) ){
                    $urls = $_POST['url'];
                    $caminho = "uploads/galeria/";
                    if( !empty( $urls ) ) {
                        foreach ( $urls as $url ) {
                            if( $e->deletarGaleria($url) ) {
                                if(file_exists($caminho . $url) ){
                                    unlink($caminho . $url);
                                }
                            }
                        }
                    }
                }else{
                    $dados['aviso'] = $this->mensagemErro("Nenhuma foto foi selecionada!");
                }
            }
            
            $dados['evento'] = $e->getEventos($idEvento);
            $dados['fotos']  = $e->getGaleria($idEvento);

            $dados['limiteImagemLiberado'] = true;
            if ( $e->qtdImagensGaleria($idEvento) >= $e->limiteImagensCadastradas ){
                $dados['limiteImagemLiberado'] = false;
            }
        
            $this->loadTemplate("eventos/editar", $dados);
        
        }else{
            header("Location: " . BASE_URL);
        }
        
    }
    
    public function deletar($idEvento) {
        
        $dados = array();
        $e = new Eventos();
        $evento = $e->getEventos($idEvento);
        if( Sessao::getSessionId() != "" && $evento['idAtletica'] == Sessao::getSessionIdAtletica() ) {
            $urls = $e->getGaleria($idEvento);
            if( $e->deletar($idEvento) ){
                if( !empty($urls) ){
                    $caminho = "uploads/galeria/";
                    if( !empty( $urls ) ) {
                        foreach ( $urls as $url ) {
                            if(file_exists($caminho . $url['url']) ){
                                unlink($caminho . $url['url']);
                            }
                        }
                    }
                }
                $dados['aviso'] = $this->mensagemSucesso("Evento excluído com êxito!");
            }else{
                $dados['aviso'] = $this->mensagemErro("Erro ao deletar evento!");
            }
            
            $dados['eventos'] = $e->getEventos();
            $idAtletica = Sessao::getSessionIdAtletica();
            $dados['limiteLiberado'] = true;
            if ( $e->qtdEventosCadastrados($idAtletica) >= $e->limiteEventosCadastrados ){
                $dados['limiteLiberado'] = false;
            }
            $this->loadTemplate("eventos/index", $dados);
            
        }else{
            header("Location: " . BASE_URL);
        }
        
    }

}
