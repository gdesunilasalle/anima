<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anima extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('logado')){
                redirect(base_url());
        }
    }
	public function index()
	{
  
                $this->load->view('anima/main');
	}
}