<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Animas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('anima_model');
        if(!$this->session->userdata('logado')){
                redirect(base_url());
        }
    }

	public function index(){

        parent::Controller();
        $this->load->model('anima');
        $query = $this->anima->getCaronas();
        $data['CARONAS'] = null;
        if($query){
            $data['CARONAS'] =  $query;
        }

                $this->load->view('anima/topo');
                $this->load->view('anima/main', $data);
                $this->load->view('anima/rodape');
	}
}
