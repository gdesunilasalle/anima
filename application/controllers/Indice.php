<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indice extends CI_Controller {

public function __construct() {
        parent::__construct();

    }
        public function index()
        { ob_start();
                if(!$this->session->userdata('logado')){
               
                $this->load->view('index/topo');
                $this->load->view('index/inicio');
                $this->load->view('index/oquee');
                $this->load->view('index/comofunciona');
                $this->load->view('index/cadastro');
                $this->load->view('index/desenvolvedores');
                $this->load->view('index/contato');
                $this->load->view('index/rodape');
        }else{
                redirect(base_url('busca'));
        }
          
        }
}