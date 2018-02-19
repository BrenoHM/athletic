<?php

class atleticasController extends controller {
    
    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        
        $dados = array();
        $a = new Atleticas();
        
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
        
        /*if(isset($_POST['frmAtletica'])) {
            echo '<pre>';
            print_r($_POST);
            echo '</pre>';
        }
         * 
         */
        
        $dados        = array();
        $obrigatorios = array();
        $formValidado = TRUE;
        
        $a = new Atleticas();
        $dados['atletica'] = $a->getAtleticas($idAtletica);
        $passo = $dados['atletica']['passoFormulario'];
        
        if( isset($_POST['frmAtletica']) ) {
            switch ($passo){
                case 1:
                    $obrigatorios = array('registroCartorio', 'cnpj', 'idUniversidade', 'qtdeCampos', 'campus', 'qtdeAlunosCurso', 'qtdeAlunosFaculdade', 'salaPropria', 'repasseFinanceiro');
                    break;
                case 2:
                    $obrigatorios = array('registroCartorio', 'cnpj', 'idUniversidade', 'qtdeCampos', 'campus', 'qtdeAlunosCurso', 'qtdeAlunosFaculdade', 'salaPropria', 'repasseFinanceiro');
                    break;
                case 3:
                    $obrigatorios = array('registroCartorio', 'cnpj', 'idUniversidade', 'qtdeCampos', 'campus', 'qtdeAlunosCurso', 'qtdeAlunosFaculdade', 'salaPropria', 'repasseFinanceiro');
                    break;
                case 4:
                    $obrigatorios = array('registroCartorio', 'cnpj', 'idUniversidade', 'qtdeCampos', 'campus', 'qtdeAlunosCurso', 'qtdeAlunosFaculdade', 'salaPropria', 'repasseFinanceiro');
                    break;
                case 5:
                    $obrigatorios = array('registroCartorio', 'cnpj', 'idUniversidade', 'qtdeCampos', 'campus', 'qtdeAlunosCurso', 'qtdeAlunosFaculdade', 'salaPropria', 'repasseFinanceiro');
                    break;
            }
            
            foreach ( $obrigatorios as $obrigatorio ) {
                if( isset($_POST[$obrigatorio]) && empty($_POST[$obrigatorio]) ) {
                    $formValidado = FALSE;
                }
            }
            
            if( $formValidado ) {
                $dados['atletica']['passoFormulario'] = ++$passo;
                $dados['aviso'] = $this->mensagemSucesso("Dados atualizados com sucesso!");
            }else{
                $dados['aviso'] = $this->mensagemErro("Todos os campos são de preenchimento obrigatório!");
            }
        }
        
        /*if(Sessao::getSessionId() != ""){
            
            $dados = array();
            $c = new Clientes();
            
            if(isset($_POST['frmCliente'])) {
                
                $c->setCodCli($idCliente);
                $c->setNomCli(addslashes($_POST['nomCli']));
                $c->setUrlCli(addslashes($_POST['urlCli']));
                $imgCli = $_FILES['imgCli'];
                
                if( !empty($c->getNomCli()) ){
                
                    //ENVIO DA IMAGEM
                    $nomeImagem = "";
                    if(in_array($imgCli['type'], array('image/jpeg', 'image/jpg', 'image/png'))) {
                        $tabela = new Clientes();
                        $this->deletaImg("images/clientes/", $tabela->tabela, $idCliente);
                        $caminho = "images/clientes/";
                        $ext = "jpg";
                        if($imgCli['type'] == 'image/png'){
                            $ext = "png";
                        }
                        $nomeImagem = md5(time().rand(0, 9999)) . '.' . $ext;
                        $c->setImgCli($nomeImagem);
                        move_uploaded_file($imgCli['tmp_name'], $caminho . $nomeImagem);
                    }

                    if( $c->atualizar() ){
                        $dados['aviso'] = $this->mensagemSucesso("Cliente atualizado com êxito!");
                        echo "<META http-equiv='refresh' content='1;URL=".BASE_URL."/clientes'>";
                    }else{
                        $dados['aviso'] = $this->mensagemErro("Erro ao atualizar cliente!");
                    }
                }else{
                    $dados['aviso'] = $this->mensagemErro("Campos são de preenchimento obrigatório!");
                }
            }
            
            $dados['cliente'] = $c->getClientes($idCliente);
            $this->loadTemplate("clientes/editar", $dados);
            
        }else{
            header("Location: " . BASE_URL . "/login");
        }
         * 
         */
        
        
        
        $dados['post'] = $_POST; //CASO DE ERRO NA VALIDACAO, OS DADOS POSSAM SER RETORNADOS PARA A VIEW.
        
        $u = new Universidades();
        $dados['universidades'] = $u->getUniversidades();
        $this->loadTemplate("atleticas/editar", $dados);
        
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

    public function dataServer(){

        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array( 'imgCli', 'nomCli', 'codCli' );
        $input =& $_GET;

        /* Indexed column (used for fast and accurate table cardinality) */
        $sIndexColumn = "codCli";

        /* DB table to use */
        $sTable = "c018cli";

        /**
         * Paging
         */
        $sLimit = "";
        if ( isset( $input['iDisplayStart'] ) && $input['iDisplayLength'] != '-1' ) {
            $sLimit = " LIMIT ".intval( $input['iDisplayStart'] ).", ".intval( $input['iDisplayLength'] );
        }

        /**
         * Ordering
         */
        $aOrderingRules = array();
        if ( isset( $input['iSortCol_0'] ) ) {
            $iSortingCols = intval( $input['iSortingCols'] );
            for ( $i=0 ; $i<$iSortingCols ; $i++ ) {
                if ( $input[ 'bSortable_'.intval($input['iSortCol_'.$i]) ] == 'true' ) {
                    $aOrderingRules[] =
                        "`".$aColumns[ intval( $input['iSortCol_'.$i] ) ]."` "
                        .($input['sSortDir_'.$i]==='asc' ? 'asc' : 'desc');
                }
            }
        }
         
        if (!empty($aOrderingRules)) {
            $sOrder = " ORDER BY ".implode(", ", $aOrderingRules);
        } else {
            $sOrder = "";
        }

        /**
         * Filtering
         * NOTE this does not match the built-in DataTables filtering which does it
         * word by word on any field. It's possible to do here, but concerned about efficiency
         * on very large tables, and MySQL's regex functionality is very limited
         */
        $iColumnCount = count($aColumns);
         
        if ( isset($input['sSearch']) && $input['sSearch'] != "" ) {
            $aFilteringRules = array();
            for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
                if ( isset($input['bSearchable_'.$i]) && $input['bSearchable_'.$i] == 'true' ) {
                    $aFilteringRules[] = "`".$aColumns[$i]."` LIKE '%". $input['sSearch'] ."%'";
                }
            }
            if (!empty($aFilteringRules)) {
                $aFilteringRules = array('('.implode(" OR ", $aFilteringRules).')');
            }
        }
          
        // Individual column filtering
        for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
            if ( isset($input['bSearchable_'.$i]) && $input['bSearchable_'.$i] == 'true' && $input['sSearch_'.$i] != '' ) {
                $aFilteringRules[] = "`".$aColumns[$i]."` LIKE '%".$input['sSearch_'.$i]."%'";
            }
        }
         
        if (!empty($aFilteringRules)) {
            $sWhere = " WHERE ".implode(" AND ", $aFilteringRules);
        } else {
            $sWhere = "";
        }

        /**
         * SQL queries
         * Get data to display
         */
        $aQueryColumns = array();
        foreach ($aColumns as $col) {
            if ($col != ' ') {
                $aQueryColumns[] = $col;
            }
        }
         
        $sQuery = "
            SELECT SQL_CALC_FOUND_ROWS `".implode("`, `", $aQueryColumns)."`
            FROM `".$sTable."`".$sWhere.$sOrder.$sLimit;
         
        $rResult = $this->db->query( $sQuery );

        // Data set length after filtering
        $sQuery = "SELECT FOUND_ROWS()";
        $rResultFilterTotal = $this->db->query( $sQuery );
        list($iFilteredTotal) = $rResultFilterTotal->fetch();

        // Total data set length
        $sQuery = "SELECT COUNT(`".$sIndexColumn."`) FROM `".$sTable."`";
        $rResultTotal = $this->db->query( $sQuery );
        list($iTotal) = $rResultTotal->fetch();

        $output = array(
            "sEcho"                => intval($input['sEcho']),
            "iTotalRecords"        => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData"               => array(),
        );

        foreach ( $rResult->fetchAll() as $aRow ) {
            $row = array();
            for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
                if ( $aColumns[$i] == 'codCli' ) {
                    // Special output formatting for 'version' column
                    $row[] = '<a href="'.BASE_URL.'/clientes/editar/'.$aRow[ $aColumns[$i] ].'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                    <a href="'.BASE_URL.'/clientes/deletar/'.$aRow[ $aColumns[$i] ].'" onclick="return confirm(\'Deseja realmente excluir este registro!\');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>';
                } elseif ( $aColumns[$i] != ' ' ) {
                    // General output
                    $row[] = $aRow[ $aColumns[$i] ];
                }
            }
            $output['aaData'][] = $row;
        }
        
        echo json_encode($output);
    }
    
}