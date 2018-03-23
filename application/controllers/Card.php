<?php
class Card extends CI_Controller {
function __construct() {
parent::__construct();
$this->load->model('card_model');
}
public function index()
    {ob_start();
$data = $this->input->post('dusuario');
$detalhes['caronas'] = $this->card_model->exibecarona($data);
		$this->load->view('anima/card/topo');
        $this->load->view('anima/card/main',$detalhes);
    }
}




