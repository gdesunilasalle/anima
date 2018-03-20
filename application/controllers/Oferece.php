<?php
class Oferece extends CI_Controller {
function __construct() {
parent::__construct();
$this->load->model('oferece_model');
}
public function index() {
//Setting values for tabel columns
ob_start();


	$data['local'] = $this->oferece_model->buscaLogradouro();

    $this->load->view('anima/oferece/topo');
    $this->load->view('anima/oferece/main',$data);

}

public function grava() {
ob_start();

$data = array(
'meiotransporte' => $this->input->post('dmeiotransporte'),
'origem'         => $this->input->post('dorigem'),
'destino'        => $this->input->post('ddestino'),
'horario'        => $this->input->post('dhorario'),
'usuario'        => $this->input->post('dusuario'),
);

//Transfering data to Model
$this->oferece_model->form_insert($data);
//$this->user_registration_model->insert_record($this->data);
echo '<script>alert("Proposta de carona realizada com sucesso!");</script>';
redirect(base_url('busca'));


}
}