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
$detalhes['confirmados'] = $this->card_model->exibeconfirmados($data);
$detalhes['usuarioativo'] = $this->card_model->usuarioativo($data);


		$this->load->view('anima/card/topo');
        $this->load->view('anima/card/main',$detalhes);
    }
}




