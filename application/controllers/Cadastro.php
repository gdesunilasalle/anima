<?php
class Cadastro extends CI_Controller {
function __construct() {
parent::__construct();
$this->load->model('insert_model');
}
public function email_check($email)
{
  return strpos($email, '@soulasalle.com.br') || strpos($email, '@lasalle.org.br') !== false;
}
public function index() {
//Including validation library
$this->load->library('form_validation');
$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
//VALIDAÇÃO DO NOME
$this->form_validation->set_rules('dnomecompleto', 'Nome completo', 'required|min_length[5]|max_length[40]');
//VALIDAÇÃO DO EMAIL
$this->form_validation->set_rules('demail', 'E-mail', 'required|valid_email|callback_email_check');
$this->form_validation->set_message('email_check', 'É obrigatório o uso de email com os domínios @soulasalle.com.br ou @lasalle.org.br');
//VALIDAÇÃO DA MATRÍCULA
$this->form_validation->set_rules('dmatricula', 'Matrícula La Salle', 'required|regex_match[/^[0-9]{10}$/]', 'required|exact_length[10]');
//VALIDAÇÃO DO LOGRADOURO
$this->form_validation->set_rules('dlogradouro', 'Logradouro', 'required');
//VALIDAÇÃO DA CIDADE
$this->form_validation->set_rules('dcidade', 'Cidade', 'required');
//VALIDAÇÃO DA BAIRRO
$this->form_validation->set_rules('dbairro', 'Bairro', 'required');
//VALIDAÇÃO DO COMPLEMENTO
$this->form_validation->set_rules('dcomplemento', 'Complemento', 'max_length[100]');
//VALIDAÇÃO DO CEP
$this->form_validation->set_rules('dcep', 'CEP', 'required|exact_length[8]');
//VALIDAÇÃO DA SENHA
$this->form_validation->set_rules('dsenha', 'Senha', 'required|min_length[8]|max_length[30]');
//VALIDAÇÃO DA CONFIRMAÇÃO DE SENHA
$this->form_validation->set_rules('dconfirmasenha', 'Confirmação de senha', 'required|matches[dsenha]|min_length[8]|max_length[30]');
//VALIDAÇÃO DOS TERMOS DE USO
$this->form_validation->set_rules('termo', 'termo', 'required');

if ($this->form_validation->run() == FALSE) {
$data = array('nomecompleto','email', 'matricula','logradouro' ,'numero', 'complemento', 'cep');
$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><strong>Erro! </strong>Os dados inseridos são inválidos.<br>Preencha corretamente os dados cadastrais clicando <a href="#cadastro" class="alert-link">aqui.</a><br></div>');
                $this->load->view('index/topo');
                $this->load->view('index/inicio');
                $this->load->view('index/oquee');
                $this->load->view('index/comofunciona');
                $this->load->view('index/cadastro',$data);
                $this->load->view('index/contato');
                $this->load->view('index/rodape');
} else {
//Setting values for tabel columns
$criptografado = password_hash($this->input->post('dsenha'), PASSWORD_DEFAULT);
$data = array(
'nomecompleto' => $this->input->post('dnomecompleto'),
'email' => $this->input->post('demail'),
'matricula' => $this->input->post('dmatricula'),
'curso' => $this->input->post('dcurso'),
'especifica_curso' => $this->input->post('despecifica'),
'logradouro' => $this->input->post('dlogradouro'),
'cidade' => $this->input->post('dcidade'),
'bairro' => $this->input->post('dbairro'),
'complemento' => $this->input->post('dcomplemento'),
'cep' => $this->input->post('dcep'),
'senha' => $criptografado,
'hash' => md5(rand(0, 1000)),
);

//ENVIA EMAIL
$this->email->from('leonardo.martelotte@soulasalle.com.br', 'Anima?!'); //EMAIL DE ORIGEM
$subject="Bem vindo ao Anima!";  //TITULO EMAIL
$body = $this->load->view('email/cadastra.php', $data, TRUE);
$this->email->to($data['email']);
$this->email->subject($subject);
$this->email->set_mailtype("html");
$this->email->message($body);
$this->email->send();

//Transfering data to Model
$this->insert_model->form_insert($data);
//$this->user_registration_model->insert_record($this->data);
$this->session->set_flashdata('message', '
<div class="alert alert-success" role="alert"><strong>Cadastro efetuado com sucesso! </strong>Verifique seu email e ative sua conta para acessar.<br>Não deixe de verificar a caixa <i>SPAM</i> de seu email!</div>');
redirect(base_url());
}
}
}
