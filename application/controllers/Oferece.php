<?php
class Oferece extends CI_Controller {
function __construct() {
parent::__construct();
$this->load->model('oferece_model');
$this->load->model('confirma_model');
}
public function index() {
//Setting values for tabel columns
ob_start();
if($this->session->userdata('logado')){

$data['local'] = $this->oferece_model->buscaLogradouro();
$data['curso'] = $this->oferece_model->buscacurso();


/* INICIO DAS FUNÇOES DE CONFERE CARONAS ATIVAS COMO HOST OU PASSAGEIRO */
$data['host'] = $this->confirma_model->confirma_host(); 
$data['passageiro'] = $this->confirma_model->confirma_passageiro(); 
/* FIM DAS FUNÇOES DE CONFERE CARONAS ATIVAS COMO HOST OU PASSAGEIRO */

    $this->load->view('anima/oferece/topo');
    $this->load->view('anima/oferece/main',$data);
    $this->load->view('index/rodape');
        }else{
                redirect(base_url());
        }
}
public function grava() {
ob_start();
$data = array(
'meiotransporte'    => $this->input->post('dmeiotransporte'),
'origem'            => $this->input->post('dorigem'),
'destino'           => $this->input->post('ddestino'),
'horario'           => $this->input->post('dhorario'),
'usuario'           => $this->input->post('dusuario'),
'curso'        		=> $this->input->post('dcurso'),
'especificacurso'   => $this->input->post('despecificacurso'),
'host'       		=> $this->input->post('dhost'),
);
$this->oferece_model->gravacarona($data);
$this->session->set_flashdata('message', '
<div class="alert alert-success" role="alert"><strong>Carona cadastrada com sucesso! </strong>Entre para ver detalhes!</div>');
redirect(base_url('minha'));
}
}