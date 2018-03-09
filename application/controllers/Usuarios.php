<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index(){

                $this->load->view('index/topo');
                $this->load->view('index/inicio');
                $this->load->view('index/oquee');
                $this->load->view('index/comofunciona');
                $this->load->view('index/cadastro');
                $this->load->view('index/desenvolvedores');
                $this->load->view('index/contato');
                $this->load->view('index/rodape');
    }

  public function login()
{
    $this->load->library("form_validation");


    $this->form_validation->set_rules('txt-user','Apelido','required|min_length[6]');
    $this->form_validation->set_rules('txt-senha','Senha','required|min_length[6]');


        if (!$this->form_validation->run()) throw new UnexpectedValueException(validation_errors());

        $user = $this->input->post('txt-user');
        $password = $this->input->post('txt-senha');
        $query = $this->db
            ->select("*")
            ->from("cadastrousuario")
            ->where("apelido", $user)
            ->get();
        if ($query->num_rows() != 1)    echo"Usuário Incorreta!"; // User Incorreto
        $row = $query->row();
        if (!password_verify($password, $row->senha))
{
 // Senha Incorreta
 $dadosSessao['userlogado'] = NULL;
 $dadosSessao['logado'] = FALSE;
 $this->session->set_userdata($dadosSessao);
 redirect(base_url('indice'));
}
else{
          // Logado com sucesso
          $dadosSessao['userlogado'] = $userlogado[0];
          $dadosSessao['logado'] = TRUE;
          $this->session->set_userdata($dadosSessao);
          redirect(base_url('anima'));
}
    }
}
