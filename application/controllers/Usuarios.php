<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function index()
	{
                $this->load->view('index');
                $this->load->helper('url');   
	}
        
        public function pag_login(){
            $this->load->view('indice');
        }
                
                
        public function login(){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('txt-user','Usuário'.'required|min_length[6]');
            $this->form_validation->set_rules('txt-user','Senha'.'required|min_length[6]');
            if($this->form_validation->run() == FALSE){
                $this->pag_login();
            }else{
                $usuario=$this->input->post('txt-user');
                $senha=$this->input->post('txt senha');
                $this->db->where('apelido',$usuario);
                $this->db->where('senha',$senha); 
                $userlogado = $this->db->get('apelido')->result();
                if(count($userlogado)==1){
                    $dadossessao['userlogado'] = $userlogado[0];
                    $dadossessao['logado'] = TRUE;
                    $this->session->set_userdata($dadossessao);
                    redirect(base_url('anima'));
                }else{
                    $dadossessao['userlogado'] = NULL;
                    $dadossessao['logado'] = FALSE;
                    $this->session->set_userdata($dadossessao);
                    redirect(base_url('VOLTAR PARA INICIAL AJEITAR AQUI'));
                }
            }
        }
}