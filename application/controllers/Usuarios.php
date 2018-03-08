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
        
        public function login(){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('txt-user','Apelido','required|min_length[6]');
            $this->form_validation->set_rules('txt-senha','Senha','required|min_length[6]');
            if($this->form_validation->run() == FALSE){
                $this->index();
            }else{
                $usuario=$this->input->post('txt-user');
                $senha=$this->input->post('txt-senha');
                $this->db->where('apelido',$usuario);
                $this->db->where('senha',$senha); 
                $userlogado = $this->db->get('cadastrousuario')->result();
                if(count($userlogado)==1){
                    $dadosSessao['userlogado'] = $userlogado[0];
                    $dadosSessao['logado'] = TRUE;
                    $this->session->set_userdata($dadosSessao);
                    redirect(base_url('anima'));
                }else{
                    $dadosSessao['userlogado'] = NULL;
                    $dadosSessao['logado'] = FALSE;
                    $this->session->set_userdata($dadosSessao);
                    redirect(base_url('indice'));

                }
            }
        }
}