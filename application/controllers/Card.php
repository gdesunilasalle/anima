<?php
class Card extends CI_Controller {
function __construct() {
parent::__construct();
$this->load->model('card_model');
}
public function index()
    {ob_start();
$data = $this->input->post('dusuario');
$id = $this->card_model->consultaid($data);
$detalhes['caronas'] = $this->card_model->exibecarona($data);
$detalhes['confirmados'] = $this->card_model->exibeconfirmados($data, $id);
		$this->load->view('anima/card/topo');
        $this->load->view('anima/card/main',$detalhes);
    }
}




