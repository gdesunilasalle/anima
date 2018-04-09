<?php
class Chat_mensagem extends CI_Controller {
function __construct() {
parent::__construct();
$this->load->model('card_model');
}
public function index() {

$data = array(
'mensagem' => $this->input->post('dmensagem'),
'autor' => $this->input->post('dproponente'),

);


$this->card_model->grava_chat($data);

$this->session->set_flashdata('message', '
<div class="alert alert-success" role="alert"><strong>Mensagem enviada com sucesso! </strong></div>');
redirect(base_url('minha'));
}
}