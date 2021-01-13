<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indice extends CI_Controller {

public function __construct() {
        parent::__construct();
        $this->load->model('minha_model');
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
          $result  = $this->minha_model->consultahost(); //o usuário é passageiro
          $result2 = $this->minha_model->minhacarona(); //o usuário é host
          if($result || $result2){
            redirect(base_url('minha'));
          }else{redirect(base_url('busca'));}
        }
}
}
