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
}