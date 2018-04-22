<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_registration extends CI_Controller {
function __construct() {
parent::__construct();
$this->load->model('user_registration_model');
}

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
                echo '<script>alert("E-mail confirmado com sucesso!\n\nPreencha E-mail e Senha para acessar o sistema.");</script>';

         $result = $this->user_registration_model->verify_user($_GET['email']); //PEGA O HASH REFERENTE AO EMAIL DO USUARIO
         if($result){
            if($result['hash']==$_GET['hash']){  //CHECA SE O HASH CONFERE COM O EXISTENTE NO DB
                $this->user_registration_model->verify_user($_GET['email']); //ATUALIZA O STATUS NO DB PARA 1
                /*---REDIRECIONAMENTOS PODEM SER IMPLEMENTADOS AQUI---*/
            }
         }
    }
}
