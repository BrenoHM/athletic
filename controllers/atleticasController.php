<?php



class atleticasController extends controller {

    

    function __construct() {

        parent::__construct();

    }

    

    public function index() {

        $dados = array();

        $a = new Atleticas();

        $a->tabela = "atletica";

        if( isset($_POST['filtro']) && !empty($_POST['filtro']) ){

            if( $_POST['filtro'] == 'TODOS' ){
                $dados['atleticas'] = $a->getAtleticas("", "");
            }else{
                $dados['atleticas'] = $a->getAtleticas("", $_POST['filtro']);
            }

            $dados['post'] = $_POST;

        }else{

            $dados['atleticas'] = $a->getAtleticas("", "REPROVADO");

            $dados['post']['filtro'] = "REPROVADO";

        }

        $this->loadTemplate('atleticas/index', $dados);

    }

    

    public function editar($idAtletica) {


        $dados = array();
        

        if( (Sessao::getSessionNivel() == 'atletica' && Sessao::getSessionIdAtletica() == $idAtletica) || Sessao::getSessionNivel() == 'admin' ) {


            $obrigatorios = array();

            $formValidado = TRUE;

            $dados['error'] = array();


            $a                 = new Atleticas();

            $dados['atletica'] = $a->getAtleticas($idAtletica);


            $u                         = new Universidades();

            $dados['universidades']    = $u->getUniversidades();

            $dados['meiosComunicacao'] = $this->meiosComunicacao();


            $e                   = new Eventos();

            $dados['eventos']    = $e->getEventosAtleticaParticipa($idAtletica);



            $c               = new Cursos();

            $dados['cursos'] = $c->getCursos();



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

                        $obrigatorios = array('registroCartorio', 'cnpj', 'idUniversidade', 'qtdeCampos', 'campus', 'qtdeAlunosCurso', 'qtdeAlunosFaculdade', 'salaPropria', 'repasseFinanceiro', 'cursos', 'possuiCamisa', 'possuiSambaCancao', 'possuiBone', 'possuiGorro', 'possuiOculos', 'possuiCaneca', 'possuiTirante', 'possuiJaqueta', 'possuiEquipEsportivo', 'possuiUniforme', 'possuiBandeirao', 'possuiMascote', 'possuiBateria');

                        break;

                    case 4:

                        $obrigatorios = array('registroCartorio', 'cnpj', 'idUniversidade', 'qtdeCampos', 'campus', 'qtdeAlunosCurso', 'qtdeAlunosFaculdade', 'salaPropria', 'repasseFinanceiro', 'cursos', 'possuiCamisa', 'possuiSambaCancao', 'possuiBone', 'possuiGorro', 'possuiOculos', 'possuiCaneca', 'possuiTirante', 'possuiJaqueta', 'possuiEquipEsportivo', 'possuiUniforme', 'possuiBandeirao', 'possuiMascote', 'possuiBateria', 'meiosComunicacaoAluno', 'meiosComunicacaoPatrocinadora');

                        break;

                    case 5:

                        $obrigatorios = array('registroCartorio', 'cnpj', 'idUniversidade', 'qtdeCampos', 'campus', 'qtdeAlunosCurso', 'qtdeAlunosFaculdade', 'salaPropria', 'repasseFinanceiro', 'cursos', 'possuiCamisa', 'possuiSambaCancao', 'possuiBone', 'possuiGorro', 'possuiOculos', 'possuiCaneca', 'possuiTirante', 'possuiJaqueta', 'possuiEquipEsportivo', 'possuiUniforme', 'possuiBandeirao', 'possuiMascote', 'possuiBateria', 'meiosComunicacaoAluno', 'meiosComunicacaoPatrocinadora', 'autorizacaoContrato', 'autorizacaoTermo');

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

                //LOGO EXIBIÇÃO

                if( $passo == 5 && empty($dados['atletica']['urlLogoExibicao']) ){

                    $formValidado = FALSE;

                    $dados['error'][] = 'urlLogoExibicao';

                }



                

                

                if( $formValidado ) {

                    if( $passo <= 4 ){

                        $passo = $passo + 1;

                    }

                    $a->populaObjeto($_POST);

                    $a->setPassoFormulario($passo);

                    $a->setIdAtletica($idAtletica);



                    $sizeImages = 3 * 1024 * 1024; //3MB



                    //UPLOAD DOS DOCUMENTOS

                    //ESTATUTO

                    $nomeArquivo = "";

                    $arquivo = $_FILES['urlEstatuto'];

                    if( !empty($arquivo['name']) ){

                        if( in_array($arquivo['type'], array('application/msword', 'application/pdf')) && $arquivo['size'] <= $sizeImages ) {

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

                        if( in_array($arquivo['type'], array('application/msword', 'application/pdf')) && $arquivo['size'] <= $sizeImages ) {

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

                        if( in_array($arquivo['type'], array('application/octet-stream', 'image/png', 'application/postscript', 'application/pdf')) && $arquivo['size'] <= $sizeImages ) {

                            $caminho = "uploads/logo/";

                            $ext = "";

                            if($arquivo['type'] == 'image/png'){

                                $ext = "png";

                            }else if($arquivo['type'] == 'application/octet-stream'){

                                if(substr($arquivo['name'], -3) == 'psd'){

                                    $ext = "psd";    

                                }elseif (substr($arquivo['name'], -3) == 'cdr') {

                                    $ext = "cdr";

                                }

                            }else if($arquivo['type'] == 'application/postscript'){

                                $ext = "ai";

                            }else if($arquivo['type'] == 'application/pdf'){

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

        $e                   = new Eventos();

        $dados['eventos']    = $e->getEventosAtleticaParticipa($idAtletica);

        $this->loadTemplate('atleticas/detalhe', $dados);

        

    }

    

    public function persistirCampos(){

        if( isset($_POST['repasseFinanceiro']) && $_POST['repasseFinanceiro'] == 'Outro' ){

            $_POST['repasseFinanceiro'] = $_POST['outroRepasseFinanceiro'];

        }

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

        if( !isset($_POST['autorizacaoContrato']) ){

            $_POST['autorizacaoContrato'] = "";

        }

        if( !isset($_POST['autorizacaoContribuicao']) ){

            $_POST['autorizacaoContribuicao'] = "";

        }

        if( !isset($_POST['autorizacaoTermo']) ){

            $_POST['autorizacaoTermo'] = "";

        }

    }

    

    public function meiosComunicacao()



    {

        

        $meios = array(

            'Facebook Perfil',

            'Facebook Fanpage',

            'Grupos de Whatsapp',

            'Instagram',

            'Site',

            'Mailling',

            'Através do site da Instituição',

            'Quadro de Avisos',

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

    

    public function mudaStatus() {

        $idAtletica = $_POST['idAtletica'];

        $email      = $_POST['email'];

        $nome       = $_POST['nome'];

        $status     = $_POST['status'];

        $a = new Atleticas();

        $a->setStatus($status);

        $a->setIdAtletica($idAtletica);

        if( $a->mudaStatus() ){

            

            //TEMPLATE DE EMAIL

            $mensagem = file_get_contents("templates/tpl_mudanca_status_atletica.html");

            $mensagem = str_replace("{{NOME}}", $nome, $mensagem);

            $mensagem = str_replace("{{STATUS}}", $status, $mensagem);

            

            //MANDA EMAIL NOTIFICANDO

            $e = new Email();

            $e->para = $email;

            $e->paraNome = $nome;

            $e->assunto = "Mudança de status na atlética!";

            $e->mensagems = $mensagem;

            if($e->enviaEmail()){

                echo 'ok';

            }else{ 

                echo 'nok'; 

            }

        }

        

    }



}