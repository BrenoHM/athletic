<?php

class atleticasController extends controller {
    
    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        
        $dados = array();
        $a = new Atleticas();
        $a->tabela = "atletica";
        $dados['atleticas'] = $a->getAtleticas();
        
        $this->loadTemplate('atleticas/index', $dados);
        
    }
    
    public function novo() {
        
        $dados = array();
        $c = new Clientes();
        
        if(isset($_POST['frmCliente'])) {
            
            $c->setNomCli(addslashes($_POST['nomCli']));
            $c->setUrlCli(addslashes($_POST['urlCli']));
            $imgCli = $_FILES['imgCli'];
            
            if( !empty($c->getNomCli()) && !empty($imgCli['name']) ){
                
                //ENVIO DA IMAGEM
                $nomeImagem = "";
                if( in_array($imgCli['type'], array('image/jpeg', 'image/jpg', 'image/png')) ) {
                    $caminho = "images/clientes/";
                    $ext = "jpg";
                    if($imgCli['type'] == 'image/png'){
                        $ext = "png";
                    }
                    $nomeImagem = md5(time().rand(0, 9999)) . '.' . $ext;
                    $c->setImgCli($nomeImagem);
                    move_uploaded_file($imgCli['tmp_name'], $caminho . $nomeImagem);
                }
                
                if( $c->inserir() ){
                    $dados['aviso'] = $this->mensagemSucesso("Cliente criado com êxito!");
                    echo "<META http-equiv='refresh' content='1;URL=".BASE_URL."/clientes'>";
                }else{
                    $dados['aviso'] = $this->mensagemErro("Erro ao criar cliente!");
                }
            }else{
                $dados['aviso'] = $this->mensagemErro("Campos nome e logomarca são de preenchimento obrigatório!");
            }
        }
        
        $this->loadTemplate('clientes/criar', $dados);
        
    }
    
    public function editar($idAtletica) {
        
        $dados = array();
        
        if( (Sessao::getSessionNivel() == 'atletica' && Sessao::getSessionIdAtletica() == $idAtletica) || Sessao::getSessionNivel() == 'admin' ) {
            
            $obrigatorios = array();
            $formValidado = TRUE;
            $dados['error'] = array();

            $a = new Atleticas();
            $dados['atletica'] = $a->getAtleticas($idAtletica);

            $u = new Universidades();
            $dados['universidades'] = $u->getUniversidades();
            $dados['meiosComunicacao'] = $this->meiosComunicacao();

            if( isset($_POST['frmAtletica']) ) {

                $passo = $dados['atletica']['passoFormulario'];
                
                switch ($passo){
                    case 1:
                        $obrigatorios = array('registroCartorio', 'cnpj', 'idUniversidade', 'qtdeCampos', 'campus', 'qtdeAlunosCurso', 'qtdeAlunosFaculdade', 'salaPropria', 'repasseFinanceiro');
                        break;
                    case 2:
                        $obrigatorios = array('registroCartorio', 'cnpj', 'idUniversidade', 'qtdeCampos', 'campus', 'qtdeAlunosCurso', 'qtdeAlunosFaculdade', 'salaPropria', 'repasseFinanceiro', 'cursos');
                        break;
                    case 3:
                        $obrigatorios = array('registroCartorio', 'cnpj', 'idUniversidade', 'qtdeCampos', 'campus', 'qtdeAlunosCurso', 'qtdeAlunosFaculdade', 'salaPropria', 'repasseFinanceiro', 'cursos', 'possuiUniforme', 'possuiBandeirao', 'possuiMascote', 'possuiBateria', 'principaisEventos');
                        break;
                    case 4:
                        $obrigatorios = array('registroCartorio', 'cnpj', 'idUniversidade', 'qtdeCampos', 'campus', 'qtdeAlunosCurso', 'qtdeAlunosFaculdade', 'salaPropria', 'repasseFinanceiro', 'cursos', 'possuiUniforme', 'possuiBandeirao', 'possuiMascote', 'possuiBateria', 'principaisEventos', 'meiosComunicacaoAluno', 'meiosComunicacaoPatrocinadora');
                        break;
                    case 5:
                        $obrigatorios = array('registroCartorio', 'cnpj', 'idUniversidade', 'qtdeCampos', 'campus', 'qtdeAlunosCurso', 'qtdeAlunosFaculdade', 'salaPropria', 'repasseFinanceiro', 'cursos', 'possuiUniforme', 'possuiBandeirao', 'possuiMascote', 'possuiBateria', 'principaisEventos', 'meiosComunicacaoAluno', 'meiosComunicacaoPatrocinadora', 'patrocinio', 'patrocinioCervejaria', 'patrocinioEnergetico', 'patrocinioCerimonial', 'autorizacaoTermo');
                        break;
                }

                $this->persistirCampos();

                foreach ( $obrigatorios as $obrigatorio ) {
                    if( isset($_POST[$obrigatorio]) && empty($_POST[$obrigatorio]) ) {
                        $formValidado = FALSE;
                        $dados['error'][] = $obrigatorio; //GUARDA CAMPO QUE NAO FOI PREENCHIDO
                    }
                }

                //VALIDACAO DOS UPLOAD'S
                //ESTATUTO
                if( $passo == 5 && empty($dados['atletica']['urlEstatuto']) ){
                    if( empty( $_FILES['urlEstatuto']['name'] ) ){
                        $formValidado = FALSE;
                        $dados['error'][] = 'urlEstatuto';
                    }
                }
                //ATA
                if( $passo == 5 && empty($dados['atletica']['urlAta']) ){
                    if( empty( $_FILES['urlAta']['name'] ) ){
                        $formValidado = FALSE;
                        $dados['error'][] = 'urlAta';
                    }
                }
                //LOGO
                if( $passo == 5 && empty($dados['atletica']['urlLogo']) ){
                    if( empty( $_FILES['urlLogo']['name'] ) ){
                        $formValidado = FALSE;
                        $dados['error'][] = 'urlLogo';
                    }
                }

                if( $formValidado ) {
                    if( $passo <= 4 ){
                        $passo = $passo + 1;
                    }
                    $a->populaObjeto($_POST);
                    $a->setPassoFormulario($passo);
                    $a->setIdAtletica($idAtletica);

                    //UPLOAD DOS DOCUMENTOS
                    //ESTATUTO
                    $nomeArquivo = "";
                    $arquivo = $_FILES['urlEstatuto'];
                    if( !empty($arquivo['name']) ){
                        if( in_array($arquivo['type'], array('application/msword', 'application/pdf')) ) {
                            $caminho = "uploads/estatuto/";
                            $ext = "doc";
                            if($arquivo['type'] == 'application/pdf'){
                                $ext = "pdf";
                            }
                            $nomeArquivo = md5(time().rand(0, 9999)) . '.' . $ext;
                            move_uploaded_file($arquivo['tmp_name'], $caminho . $nomeArquivo);
                            $a->setUrlEstatuto($nomeArquivo);
                        }
                    }

                    //ATA
                    $arquivo = $_FILES['urlAta'];
                    if( !empty($arquivo['name']) ){
                        if( in_array($arquivo['type'], array('application/msword', 'application/pdf')) ) {
                            $caminho = "uploads/ata/";
                            $ext = "doc";
                            if($arquivo['type'] == 'application/pdf'){
                                $ext = "pdf";
                            }
                            $nomeArquivo = md5(time().rand(0, 9999)) . '.' . $ext;
                            move_uploaded_file($arquivo['tmp_name'], $caminho . $nomeArquivo);
                            $a->setUrlAta($nomeArquivo);
                        }
                    }

                    //LOGO
                    $arquivo = $_FILES['urlLogo'];
                    if( !empty($arquivo['name']) ){
                        if( in_array($arquivo['type'], array('application/msword', 'application/pdf')) ) {
                            $caminho = "uploads/logo/";
                            $ext = "doc";
                            if($arquivo['type'] == 'application/pdf'){
                                $ext = "pdf";
                            }
                            $nomeArquivo = md5(time().rand(0, 9999)) . '.' . $ext;
                            move_uploaded_file($arquivo['tmp_name'], $caminho . $nomeArquivo);
                            $a->setUrlLogo($nomeArquivo);
                        }
                    }
                    if( $a->atualizar() ){
                        if( $dados['atletica']['passoFormulario'] == 5 ){
                            header("Location: " . BASE_URL . "/cadastro/confirmado");
                        }
                        $dados['aviso'] = $this->mensagemSucesso("Dados atualizados com sucesso!");
                        $dados['atletica'] = $a->getAtleticas($idAtletica);
                    }else{
                        $dados['aviso'] = $this->mensagemErro("Erro na atualização dos dados!");
                    }
                }else{
                    $dados['aviso'] = $this->mensagemErro("Todos os campos são de preenchimento obrigatório!");
                }
            }

            $dados['post'] = array();
            if( isset($_POST) ){
                $dados['post'] = $_POST; //CASO DE ERRO NA VALIDACAO, OS DADOS POSSAM SER RETORNADOS PARA A VIEW.
            }
            $this->loadTemplate("atleticas/editar", $dados);
        }else{
            $dados['aviso'] = $this->mensagemErro("Acesso não permitido!");
            $this->loadTemplate("atleticas/not-found", $dados);
        }
        
    }
    
    public function detalhe($idAtletica) {
        
        $dados = array();
        $a = new Atleticas();
        $dados['atletica'] = $a->getAtleticaDetalhe($idAtletica);
        $this->loadTemplate('atleticas/detalhe', $dados);
        
    }
    
    public function persistirCampos(){
        if( !isset($_POST['registroCartorio']) ){
            $_POST['registroCartorio'] = "";
        }
        if( !isset($_POST['salaPropria']) ){
            $_POST['salaPropria'] = "";
        }
        if( !isset($_POST['cursos']) ){
            $_POST['cursos'] = array();
        }
        if( !isset($_POST['possuiBateria']) ){
            $_POST['possuiBateria'] = "";
        }
        if( !isset($_POST['meiosComunicacaoAluno']) ){
            $_POST['meiosComunicacaoAluno'] = array();
        }
        if( !isset($_POST['meiosComunicacaoPatrocinadora']) ){
            $_POST['meiosComunicacaoPatrocinadora'] = array();
        }
        if( !isset($_POST['autorizacaoTermo']) ){
            $_POST['autorizacaoTermo'] = "";
        }
    }
    
    public function meiosComunicacao(){
        $meios = array(
            'Facebook Perfil',
            'Facebook Fanpage',
            'Grupos de Whatsapp',
            'Instagram',
            'Snapchat',
            'Twitter',
            'Mailling (Lista de email dos Associados)',
            'Através do site da Instituição',
            'Quadro de Aviso próprio (Mural de Recados)',
            'Passagem em sala de aula',
            'Ação de ativação de marketing dentro da instituição'
        );
        return $meios;
    }
    
    public function deletar($id) {
        
        $tabela = new Clientes();
        $this->deletaImg("../images/clientes/", $tabela->tabela, $id);
        
        $dados = array();
        $c = new Clientes();
        
        if( !empty($id) ) {
            $id = addslashes($id);
            if( $c->deletar($id) ){
                $dados['aviso'] = $this->mensagemSucesso("Cliente excluído com êxito!");
            }else{
                $dados['aviso'] = $this->mensagemErro("Erro ao deletar cliente!");
            }
        }
        
        $dados['clientes'] = $c->getClientes();
        $this->loadTemplate("clientes/index", $dados);
        
    }

}