<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sucesso extends CI_Controller {

        public function index()
        {
     
                $this->load->view('index/topo');
                $this->load->view('index/inicio');
                $this->load->view('index/oquee');
                $this->load->view('index/comofunciona');
                $this->load->view('index/cadastro');
                $this->load->view('index/desenvolvedores');
                $this->load->view('index/contato');
                $this->load->view('index/rodape');
                echo '<script>alert("Cadastro efetuado com sucesso!\nAcesse seu email La Salle para confirmá-lo e depois preencha Email e Senha para acessar o sistema.");</script>';
        }

}