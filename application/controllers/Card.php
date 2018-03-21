<?php  

class Card extends CI_Controller {
function __construct() {
parent::__construct();
$this->load->model('card_model');
}
public function index()
    {ob_start();

        
        $data['cards'] = $this->card_model->userInformation('usuario');

		$this->load->view('anima/card/topo');
        $this->load->view('anima/card/main',$data);
    }
}