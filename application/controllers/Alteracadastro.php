<?php
class Alteracadastro extends CI_Controller {
function __construct() {
parent::__construct();
$this->load->model('insert_model');
}
public function index() {
//Including validation library
$this->load->library('form_validation');
$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
//VALIDAÇÃO DO NOME
$this->form_validation->set_rules('dnomecompleto', 'Nome completo');
//VALIDAÇÃO DO EMAIL
$this->form_validation->set_rules('demail', 'E-mail');
//VALIDAÇÃO DA MATRÍCULA
$this->form_validation->set_rules('dmatricula', 'Matrícula La Salle');
//VALIDAÇÃO DO LOGRADOURO
$this->form_validation->set_rules('dlogradouro', 'Logradouro', 'required');
//VALIDAÇÃO DO COMPLEMENTO
$this->form_validation->set_rules('dcomplemento', 'Complemento');
//VALIDAÇÃO CIDADE
$this->form_validation->set_rules('dcidade', 'Cidade');
//VALIDAÇÃO BAIRRO
$this->form_validation->set_rules('dbairro', 'Bairro');
//VALIDAÇÃO DO CEP
$this->form_validation->set_rules('dcep', 'CEP', 'required|max_length[10]');
//VALIDAÇÃO DA SENHA
$this->form_validation->set_rules('dsenha', 'Senha', 'required|min_length[8]|max_length[30]');
//VALIDAÇÃO DA CONFIRMAÇÃO DE SENHA
$this->form_validation->set_rules('dconfirmasenha', 'Confirmação de senha', 'required|matches[dsenha]|min_length[8]|max_length[30]');

if ($this->form_validation->run() == FALSE) {
$data = array('nomecompleto','email', 'matricula','logradouro' ,'bairro', 'cidade', 'complemento', 'cep');
$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><strong>Erro! </strong>Os dados inseridos são inválidos.<br>Preencha corretamente os dados cadastrais.</a><br></div>');
                redirect(base_url('editausuario'));
} else {
//Setting values for tabel columns
$criptografado = password_hash($this->input->post('dsenha'), PASSWORD_DEFAULT);
$data = array(
'nomecompleto' => $this->input->post('dnomecompleto'),
'senha' => $criptografado,
'matricula' => $this->input->post('dmatricula'),
'curso' => $this->input->post('dcurso'),
'especifica_curso' => $this->input->post('despecifica'),
'email' => $this->input->post('demail'),
'logradouro' => $this->input->post('dlogradouro'),
'complemento' => $this->input->post('dcomplemento'),
'cep' => $this->input->post('dcep'),
'bairro' => $this->input->post('dbairro'),
'cidade' => $this->input->post('dcidade'),
'is_verified' => '1',
'hash' => md5(rand(0, 1000)),
);
//ENVIA EMAIL
      $this->email->from('anima@soulasalle.com.br', 'Anima?!'); //EMAIL DE ORIGEM
      $address = $_POST['demail']; //EMAIL DE DESTINO
      $subject="Dados cadastrais alterados com sucesso!";  //TITULO EMAIL
      $body = $this->load->view('email/confirma.php',$address,TRUE);
      $this->email->to($address);
      $this->email->subject($subject);
      $this->email->set_mailtype("html");
      $this->email->message($body);
      $this->email->send();

//Transfering data to Model
$this->insert_model->form_update($data);
//$this->user_registration_model->insert_record($this->data);
$this->session->set_flashdata('message', '
<div class="alert alert-success" role="alert"><strong>Dados cadastrais alterados com sucesso! </strong>Um email de confirmação foi enviado para você!</div>');
redirect(base_url('editausuario'));
}
}
}
