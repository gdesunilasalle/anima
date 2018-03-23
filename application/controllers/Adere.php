<?php
class Adere extends CI_Controller {
function __construct() {
parent::__construct();
$this->load->model('adere_model');
}
public function index() {ob_start();
	$data = array('proponente' => $this->input->post('dproponente'),
				  'usuario'    => $this->session->userdata('email'),
);

	$this->adere_model->criacarona($data);

	redirect(base_url());

}
}


