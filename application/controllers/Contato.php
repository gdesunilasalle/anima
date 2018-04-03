<?php  
class Contato extends CI_Controller {
function __construct() {
parent::__construct();
$this->load->model('contato_model');
}
public function index(){
      ob_start();
    
    if($this->session->userdata('logado')){

    $this->load->view('anima/contato/topo');
    $this->load->view('anima/contato/main');
    $this->load->view('index/rodape');
        }else{
                redirect(base_url());
        }
    }
public function grava(){
      $data = array(
      'nome' => $this->input->post('nome'),
      'email'         => $this->input->post('email'),
      'telefone'        => $this->input->post('telefone'),
      'mensagem'        => $this->input->post('mensagem'),
);
$this->contato_model->enviacontato($data);
$this->session->set_flashdata('message', '
<div class="alert alert-success" role="alert"><strong>Mensagem enviada com sucesso! </strong>Obrigado por entrar em contato, responderemos em breve!</div>');
if($this->session->userdata('logado')){

        redirect(base_url('contato'));}else{
                
                redirect(base_url());
        }
}
}


