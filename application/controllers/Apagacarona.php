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
        redirect(base_url('busca'));

    }

 public function sairdacarona()
    {
    	ob_start();
    	$data = $this->uri->segment(3);
        $this->apagar_model->sairCarona($data);
        redirect(base_url('busca'));

    }







    
}