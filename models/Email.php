<?php
/* EXEMPLO DE COMO UTILIZAR
 * 
 *  $e = new Email();
    $emails[] = array(
        'email' => 'emaildobrenomol@gmail.com',
        'nome' => 'BRENO GMAIL',
    );
    $emails[] = array(
        'email' => 'breno.mol@pbh.gov.br',
        'nome' => 'BRENO PBH',
    );
    $e->para = "emaildobrenomol@gmail.com";
    $e->paraNome = "BRENO MOL";
    $e->assunto = "assunto";
    $e->mensagems = "mensagem";
    $e->anexo = "uploads/ata/17d0033f7f12a781f5b80226249e76a5.pdf";
    $e->anexoNome = "file";
    if($e->enviaEmail()){
        echo 'ok';
    }else{ echo 'nok'; }
 */
class Email extends model {
    
    private $host     = 'srv210.prodns.com.br';
    private $usuario  = 'naoresponda@ligauniversitariabr.com.br';
    private $senha    = 'liga2018me';
    public $de        = 'naoresponda@ligauniversitariabr.com.br';
    public $deNome    = 'Liga Universitária';
    public $para;
    public $paraNome;
    public $assunto;
    public $mensagems;
    public $anexo;
    public $anexoNome = "";
    
    public function __construct() {
        parent::__construct();
    }
    
    public function enviaEmail(){
        
        require_once("libraries/PHPMailer-master/PHPMailerAutoload.php");
        
        // Inicia a classe PHPMailer
        $mail = new PHPMailer(true);
        $mail->IsSMTP(); // enable SMTP
        //$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        //$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = $this->host;
        $mail->Port = 587; // or 465
        $mail->IsHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Username  = $this->usuario;// SMTP username
        $mail->Password  = $this->senha;// SMTP password
        $mail->setFrom($this->de, $this->deNome);
        if( is_array($this->para) ){
            foreach ( $this->para as $value ){
                $mail->addAddress($value['email'], $value['nome']);// Add a recipient
            }
        }else{
            $mail->addAddress($this->para, $this->paraNome);// Add a recipient
        }
        $mail->Subject = $this->assunto;
        if( !empty($this->anexo) ){
            $mail->AddAttachment($this->anexo, $this->anexoNome);// Adicionar um anexo
        }

        $mail->MsgHTML($this->mensagems); 
        $mail->AltBody = "Para conseguir essa e-mail corretamente, use um visualizador de e-mail com suporte a HTML"; 
        $mail->WordWrap = 50;
        
        return $mail->Send() ? true : false;
    }
    
}
