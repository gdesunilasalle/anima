<?php
class Cadastro extends CI_Controller {

function __construct() {
parent::__construct();
$this->load->model('insert_model');
}
public function index() {
//Including validation library
$this->load->library('form_validation');
$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
//VALIDAÇÃO DO NOME
$this->form_validation->set_rules('dnomecompleto', 'Nome completo', 'required|min_length[5]|max_length[40]');
//VALIDAÇÃO DO EMAIL
$this->form_validation->set_rules('demail', 'E-mail', 'required|valid_email');
//VALIDAÇÃO DA MATRÍCULA
$this->form_validation->set_rules('dmatricula', 'Matrícula La Salle', 'required|regex_match[/^[0-9]{10}$/]', 'required|exact_length[10]');
//VALIDAÇÃO DO LOGRADOURO
$this->form_validation->set_rules('dlogradouro', 'Logradouro', 'required|min_length[5]|max_length[100]');
//VALIDAÇÃO DO NUMERO
$this->form_validation->set_rules('dnumero', 'Número', 'required|min_length[1]|max_length[10]');
//VALIDAÇÃO DO COMPLEMENTO
$this->form_validation->set_rules('dcomplemento', 'Complemento', 'required|min_length[5]|max_length[100]');
//VALIDAÇÃO DO CEP
$this->form_validation->set_rules('dcep', 'CEP', 'required|exact_length[8]');
//VALIDAÇÃO DO APELIDO
$this->form_validation->set_rules('dapelido', 'Apelido (username)', 'required|min_length[5]|max_length[15]');
//VALIDAÇÃO DA SENHA
$this->form_validation->set_rules('dsenha', 'Senha', 'required|min_length[5]|max_length[100]');
//VALIDAÇÃO DA CONFIRMAÇÃO DE SENHA
$this->form_validation->set_rules('dconfirmasenha', 'Password Confirmation', 'required|matches[dsenha]|min_length[5]|max_length[12]');

if ($this->form_validation->run() == FALSE) {

                $this->load->view('index/topo');
                $this->load->view('index/inicio');
                $this->load->view('index/oquee');
                $this->load->view('index/comofunciona');
                $this->load->view('index/cadastro');
                $this->load->view('index/contato');
                $this->load->view('index/rodape');                

} else {
//Setting values for tabel columns

$criptografado = password_hash($this->input->post('dsenha'), PASSWORD_DEFAULT);
$data = array(
'nomecompleto' => $this->input->post('dnomecompleto'),
'email' => $this->input->post('demail'),
'matricula' => $this->input->post('dmatricula'),
'logradouro' => $this->input->post('dlogradouro'),
'numero' => $this->input->post('dnumero'),
'complemento' => $this->input->post('dcomplemento'),
'cep' => $this->input->post('dcep'),
'apelido' => $this->input->post('dapelido'),
'senha' => $criptografado,
);
//Transfering data to Model
$this->insert_model->form_insert($data);

redirect(base_url('sucesso'));

}
}
}
