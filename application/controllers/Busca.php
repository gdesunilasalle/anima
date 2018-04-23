<?php

class Busca extends CI_Controller {
function __construct() {
parent::__construct();
$this->load->model('busca_model');
}
public function index(){
    	ob_start();
		if($this->session->userdata('logado')){
        $data['caronas'] = $this->busca_model->userInformation();
		    $this->load->view('anima/busca/topo');
        $this->load->view('anima/busca/main',$data);
        }else{
                redirect(base_url());
        }
    }
}
