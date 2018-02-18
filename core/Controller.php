<?php

class Controller {
    
    protected $db;
    
    function __construct() {
        global $config;
        $this->db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
    }
    
    public function loadView($viewName, $viewData = array()){
        
        extract($viewData);
        include 'views/' . $viewName . '.php';
        
    }
    
    public function loadTemplate($viewName, $viewData = array(), $template = ""){
        
        /*$sql = "SELECT * FROM categorias";
        $sql = $this->db->query($sql);
        
        $menu = array();
        if( $sql->rowCount() > 0 ){
            
            $menu = $sql->fetchAll();
            
        }
         * 
         */
        
        if($template == ""){
            $temp = "template";
        }else{
            $temp = $template;
        }
        
        include 'views/'.$temp.'.php';
        
    }
    
    public function loadViewInTemplate($viewName, $viewData = array()) {
        
        extract($viewData);
        include 'views/' . $viewName . '.php';
        
    }
    
    public function mensagemErro($mensagem) {
        
        $msg = '<div class="alert alert-danger ct-u-marginBottom10" role="alert">
                    '.$mensagem.'
                </div>';
        
        return $msg;
        
    }
    
    public function mensagemSucesso($mensagem) {
        
        $msg = '<div class="alert alert-success ct-u-marginBottom10" role="alert">
                    '.$mensagem.'
                </div>';
        
        return $msg;
        
    }
    
    public function deletaImg($nomeDir, $tabela, $id){
       
        $sqlBuscaCampo = " SELECT 
                                COLUMN_NAME AS campo
                            FROM 
                                information_schema.columns
                            WHERE 
                                table_name= '$tabela' 
                                AND COLUMN_NAME LIKE '%cod%' AND EXTRA = 'auto_increment' AND COLUMN_KEY = 'PRI'
                             UNION
                             SELECT 
                                COLUMN_NAME AS campo
                            FROM 
                                information_schema.columns
                            WHERE 
                                table_name= '$tabela' 
                                AND column_name LIKE '%img%'";
                
        $execute = $this->db->query($sqlBuscaCampo);
        
        if( $execute->rowCount() > 0 ) {
            $campo = $execute->fetchAll();
        }
            
        $campoCodigo = $campo[0]['campo'];
        $campoImagem = $campo[1]['campo'];
            
        $sqlBuscaImagem = "SELECT $campoImagem AS imagem FROM $tabela WHERE $campoCodigo = $id";
        
        $executeImagem = $this->db->query($sqlBuscaImagem);
        
        if( $executeImagem->rowCount() > 0 ) {
            $imagem = $executeImagem->fetchAll();
        }
        
        $pasta = $nomeDir;
        $diretorio = "";

        if(is_dir($pasta))
        {
            $diretorio = dir($pasta);
            if(!empty($imagem)){
                foreach ($imagem AS $value)
                {
                    @unlink($pasta.$value['imagem']);
                }
            }
            $diretorio->close();
        }
            
    }
}