<?php

class Editausuario extends CI_Controller {
function __construct() {
parent::__construct();
$this->load->model('edita_model');
}
public function index()
    {ob_start();

        $data['dados'] = $this->edita_model->dadosUsuario();
		    $this->load->view('anima/edita/topo');
        $this->load->view('anima/edita/main',$data);
        $this->load->view('index/rodape');

    }
}
