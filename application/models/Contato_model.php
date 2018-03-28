<?php
class Contato_model extends CI_Model{

function __construct() {
parent::__construct();
}
 function enviacontato($data){

$this->email->from($data['email'], $data['nome']); //EMAIL DE ORIGEM
      $address = 'leonardo.martelotte@soulasalle.com.br'; //EMAIL DE DESTINO
      $subject="Contato Usuário Anima";  //TITULO EMAIL
      $message= /*-----------INICIO DO CORPO DO EMAIL-----------*/
        $data['email'].'
        '
        .$data['nome'].'
        '
       . $data['telefone'].'
       '
        .$data['mensagem'] ;

    /*-----------FIM DO CORPO DO EMAIL-----------*/         
      $this->email->to($address);
      $this->email->subject($subject);
      $this->email->message($message);
      $this->email->send();
  }
}

