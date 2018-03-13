<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oferece extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('logado')){
                redirect(base_url());
        }
    }

	public function index(){

                $this->load->view('anima/oferece/topo');
                $this->load->view('anima/oferece/main');
                $this->load->view('index/rodape');
	}
}
