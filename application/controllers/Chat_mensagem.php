<?php
class Chat_mensagem extends CI_Controller {
function __construct() {
parent::__construct();
$this->load->model('card_model');
$this->load->model('confirma_model');
}
public function index() {
ob_start();
if($this->session->userdata('logado')){



$data = array(
'mensagem' => $this->input->post('dmensagem'),
'autor' => $this->input->post('dproponente'),
'hora' => $this->input->post('dhora'),
);
$this->card_model->grava_chat($data);

 $data = $this->input->post('dusuario');

        $id = $this->card_model->consultaid($data);
        $detalhes['caronas'] = $this->card_model->exibecarona($data);
        $detalhes['confirmados'] = $this->card_model->exibeconfirmados($data, $id);
        /* INICIO DAS FUNÇOES DE CONFERE CARONAS ATIVAS COMO HOST OU PASSAGEIRO */
        $detalhes['host'] = $this->confirma_model->confirma_host(); 
        $detalhes['passageiro'] = $this->confirma_model->confirma_passageiro(); 
        /* FIM DAS FUNÇOES DE CONFERE CARONAS ATIVAS COMO HOST OU PASSAGEIRO */
        $detalhes['chat'] = $this->card_model->le_chat($data);  
        $this->load->view('anima/card/topo');
        $this->load->view('anima/card/main',$detalhes);
        $this->load->view('index/rodape');
}else{
                redirect(base_url());
        }
}

public function refresh() {
 $data = $this->input->post('dusuario');
        $id = $this->card_model->consultaid($data);
        $detalhes['caronas'] = $this->card_model->exibecarona($data);
        $detalhes['confirmados'] = $this->card_model->exibeconfirmados($data, $id);
        /* INICIO DAS FUNÇOES DE CONFERE CARONAS ATIVAS COMO HOST OU PASSAGEIRO */
        $detalhes['host'] = $this->confirma_model->confirma_host(); 
        $detalhes['passageiro'] = $this->confirma_model->confirma_passageiro(); 
        /* FIM DAS FUNÇOES DE CONFERE CARONAS ATIVAS COMO HOST OU PASSAGEIRO */
        $detalhes['chat'] = $this->card_model->le_chat($data);  
        $this->load->view('anima/card/topo');
        $this->load->view('anima/card/main',$detalhes);
        $this->load->view('index/rodape');
}
}