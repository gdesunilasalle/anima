<?php  

class Apagacarona extends CI_Controller {
function __construct() {
parent::__construct();
$this->load->model('apagar_model');
}
public function index()
    {
    	ob_start();
        $this->apagar_model->apagaCarona();
        $this->session->set_flashdata('message', '
<div class="alert alert-success" role="alert"><strong>Você removeu sua oferta de carona! </strong>Deseja Oferecer outra?</div>');
        redirect(base_url('oferece'));

    }
 public function sairdacarona()
    {
    	ob_start();
        $this->apagar_model->sairCarona($data);
        $this->session->set_flashdata('message', '
<div class="alert alert-success" role="alert"><strong>Você saiu da carona! </strong>Deseja escolher outra?</div>');
        redirect(base_url('busca'));

    }    
}