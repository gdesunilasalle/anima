<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller
{
    public function index()
    {
      // Libs Recaptcha
require_once('vendor/google/recaptcha/src/ReCaptcha/ReCaptcha.php');
require_once('vendor/google/recaptcha/src/ReCaptcha/RequestMethod.php');
require_once('vendor/google/recaptcha/src/ReCaptcha/RequestParameters.php');
require_once('vendor/google/recaptcha/src/ReCaptcha/Response.php');
require_once('vendor/google/recaptcha/src/ReCaptcha/RequestMethod/Curl.php');
require_once('vendor/google/recaptcha/src/ReCaptcha/RequestMethod/CurlPost.php');
require_once('vendor/google/recaptcha/src/ReCaptcha/RequestMethod/Post.php');
require_once('vendor/google/recaptcha/src/ReCaptcha/RequestMethod/Socket.php');
require_once('vendor/google/recaptcha/src/ReCaptcha/RequestMethod/SocketPost.php');
// end
$dados['siteKey'] = '6Ld0pkwUAAAAAPoc-WBI4SQmUu6dKz6eJIeUtJn8';
$dados['secretKey'] = '6Ld0pkwUAAAAALvbTxJS0pMHy5b8iyZps6UU0Ddm';

// Verifica se o campo com o código do reCaptcha foi enviado para o servidor

if ($this->input->post('g-recaptcha-response')) {
    // Faz a instanciação e verificação do reCaptcha
$recaptcha = new \ReCaptcha\ReCaptcha($dados['secretKey']);
$resp = $recaptcha->verify($this->input->post('g-recaptcha-response'), $_SERVER['REMOTE_ADDR']);

if ($resp->isSuccess()) { // Se Recaptcha foi digitado certo executa os procedimentos de validação login e senha
        try {
            $this->load->library("form_validation");

            $this->form_validation->set_rules('txt-user', 'Apelido', 'required|min_length[6]');
            $this->form_validation->set_rules('txt-senha', 'Senha', 'required|min_length[6]');

            if (!$this->form_validation->run())
                throw new UnexpectedValueException(validation_errors()); // Erros adversos de validaÃ§Ã£o

            $user     = $this->input->post('txt-user');
            $password = $this->input->post('txt-senha');
            $query    = $this->db->select("*")->from("cadastrousuario")->where("apelido", $user)->get();
            if ($query->num_rows() != 1)
                throw new UnexpectedValueException('Usuario Incorreto'); // User Incorreto
            $row = $query->row();
            if (!password_verify($password, $row->senha)) {
                // Senha Incorreta
                throw new UnexpectedValueException('Senha Incorreta'); // Exception Senha incorreta
                $dadosSessao['userlogado'] = NULL;
                $dadosSessao['logado']     = FALSE;
                $this->session->set_userdata($dadosSessao);
                redirect(base_url('indice'));
            } else {
                // Logado com sucesso
                $dadosSessao['userlogado'] = $userlogado[0];
                $dadosSessao['logado']     = TRUE;
                $this->session->set_userdata($dadosSessao);
                redirect(base_url());
            }
        }
        catch (Exception $e) {
            // Pega a mensagem da excessÃ£o e printa
                $data = array('e' => $e);
                $this->load->view('index/topo');
                $this->load->view('index/inicio',$data);
                $this->load->view('index/oquee');
                $this->load->view('index/comofunciona');
                $this->load->view('index/cadastro');
                $this->load->view('index/desenvolvedores');
                $this->load->view('index/contato');
                $this->load->view('index/rodape');
        }
        catch (\Error $e) {
            echo $e->getMessage(); // Pega a mensagem de erro e printa
        }


      } else {
      echo "Problemas ao validar o reCaptcha: ". implode(', ', $resp->getErrorCodes());
      }
      } else {
        $data = "Captcha inválido";
        $this->load->view('index/topo');
        $this->load->view('index/inicio',$data);
        $this->load->view('index/oquee');
        $this->load->view('index/comofunciona');
        $this->load->view('index/cadastro');
        $this->load->view('index/desenvolvedores');
        $this->load->view('index/contato');
        $this->load->view('index/rodape');

      }

    }
}
