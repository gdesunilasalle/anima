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
            $email = ($this->session->userdata('email'));
            $result1  = $this->db->query("SELECT * FROM transportesemcurso WHERE usuario = '$email' AND host = '1' ");
            $result2  = $this->db->query("SELECT * FROM transportesemcurso WHERE usuario = '$email' AND passageiro != '0' ");
                if( $result1 > 0) {
                    $direciona= '2';
                }
                    else if( $result2 > 0) {
                        $direciona= '3';
                    } 
                if($direciona=='2' || $direciona=='3'){
                redirect(base_url('minha'));
            }else{redirect(base_url('busca'));}
          
        }
}
}