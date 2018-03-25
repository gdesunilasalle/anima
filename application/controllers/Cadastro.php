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
$this->form_validation->set_rules('dlogradouro', 'Logradouro', 'required|min_length[3]|max_length[100]');
//VALIDAÇÃO DO NUMERO
$this->form_validation->set_rules('dnumero', 'Número', 'required|min_length[1]|max_length[10]');
//VALIDAÇÃO DO COMPLEMENTO
$this->form_validation->set_rules('dcomplemento', 'Complemento', 'required|min_length[2]|max_length[100]');
//VALIDAÇÃO DO CEP
$this->form_validation->set_rules('dcep', 'CEP', 'required|exact_length[8]');
//VALIDAÇÃO DA SENHA
$this->form_validation->set_rules('dsenha', 'Senha', 'required|min_length[8]|max_length[30]');
//VALIDAÇÃO DA CONFIRMAÇÃO DE SENHA
$this->form_validation->set_rules('dconfirmasenha', 'Confirmação de senha', 'required|matches[dsenha]|min_length[8]|max_length[30]');

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
'logradouro' => $this->input->post('dlogradouro'),
'numero' => $this->input->post('dnumero'),
'complemento' => $this->input->post('dcomplemento'),
'cep' => $this->input->post('dcep'),
'senha' => $criptografado,
'hash' => md5(rand(0, 1000)),
);
 
//ENVIA EMAIL
      $this->email->from('anima@soulasalle.com.br', 'Anima?!'); //EMAIL DE ORIGEM
      $address = $_POST['demail']; //EMAIL DE DESTINO
      $subject="Bem vindo ao Anima?!";  //TITULO EMAIL
      $message= /*-----------INICIO DO CORPO DO EMAIL-----------*/
        'Olá, '.$_POST['dnomecompleto'].'! 

        Obrigado por fazer parte do Anima!
      
        Sua conta foi criada com sucesso! 
        
        Clique no link de confirmação abaixo para validar o seu cadastro:
            
        ' . base_url() . 'index.php/user_registration?' . 
        'email=' . $_POST['demail'] . '&hash=' . $data['hash'] ;


    /*-----------FIM DO CORPO DO EMAIL-----------*/         
      $this->email->to($address);
      $this->email->subject($subject);
      $this->email->message($message);
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