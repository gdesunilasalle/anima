<?php
class Adere extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('adere_model');
    }
    public function index()
    {
        ob_start();

        if ($this->session->userdata('logado')) {

            $data       = ($this->session->userdata('email'));
            $proponente = $this->input->post('dproponente');

            $aderente = array(
            'proponente' => $this->input->post('dproponente'),
            'cursousuario' => $this->input->post('dcursousuario'),
            'especificacursousuario' => $this->input->post('despecificacursousuario'));

            $id         = $this->adere_model->consultaid($proponente);
            $meio       = $this->adere_model->consultameio($id, $proponente);
            $status     = $this->adere_model->criacarona($id, $data, $meio, $proponente, $aderente);

            //ENVIA EMAIL
            $this->email->from('anima.uni@soulasalle.com.br', 'Anima?!'); //EMAIL DE ORIGEM
            $subject="Aderiram a sua carona!";  //TITULO EMAIL
            $body = $this->load->view('email/informa_host.php', $data, TRUE);
            $this->email->to($aderente['proponente']);
            $this->email->subject($subject);
            $this->email->set_mailtype("html");
            $this->email->message($body);
            $this->email->send();






                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><strong>Adesão à carona realizada com sucesso! </strong>Acesse os detalhes da carona para interagir com os demais usuários!</div>');
                redirect(base_url('minha'));
            }else{
            redirect(base_url());
        }
    }
}
