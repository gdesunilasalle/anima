<?php  

class Minha extends CI_Controller {
function __construct() {
parent::__construct();
$this->load->model('minha_model');
}
public function index()
    {ob_start();

        $data['caronas'] = $this->minha_model->minhacarona();
        $host = $this->minha_model->consultahost();
        $data['passageiro'] = $this->minha_model->passageiro($host);
		$this->load->view('anima/minha/topo');
        $this->load->view('anima/minha/main',$data);
    }
}


