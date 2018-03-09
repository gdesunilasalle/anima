<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anima extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('logado')){
                redirect(base_url());
        }
    }
	
    public function index(){

                $this->load->view('anima/topo');
                $this->load->view('anima/main');
                $this->load->view('anima/rodape');
                
	}
    
    public function exibetransporte(){

    $query = $this->db->select('*')->from('transportesemcurso')->get();
    return $query->result();

    }
}