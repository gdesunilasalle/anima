<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Busca extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('logado')){
                redirect(base_url());
        }
    }

	public function index(){

        parent::Controller();
        $this->load->model('anima_model');
        $query = $this->anima->getCaronas();
        $data['CARONAS'] = null;
        if($query){
            $data['CARONAS'] =  $query;
        }

                $this->load->view('anima/busca/topo');
                $this->load->view('anima/busca/main', $data);
                $this->load->view('index/rodape');
	}
}
