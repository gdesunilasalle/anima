<?php class Minha_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                $CI = &get_instance();
                //$this->db2 = $CI->load->database('Anima', TRUE);
        }
        function minhacarona()
        {   
            $email = ($this->session->userdata('email'));
            $query = $this->db->query("SELECT origem as origemusuario, destino as destinousuario, curso as cursousuario, especificacurso as especificacursousuario, horario as horariousuario, meiotransporte as meio, usuario as emailusuario FROM transportesemcurso WHERE host = 1 AND usuario = '$email' ORDER BY horario");
            return $query->result();
        }
        function consultahost()
        {          
            $email = ($this->session->userdata('email'));
            $passageiro = $this->db->query("SELECT passageiro FROM transportesemcurso WHERE usuario = '$email' ");
            $result = $passageiro->row();
            if($result){
            return $result->passageiro;
            return $passageiro->result();}
        }
        function passageiro($host)
        {   
            $email = ($this->session->userdata('email'));
            $query = $this->db->query("SELECT origem as origemusuario, curso as cursousuario, especificacurso as especificacursousuario, destino as destinousuario, horario as horariousuario, meiotransporte as meio, usuario as emailusuario FROM transportesemcurso WHERE ID = '$host' ");
            return $query->result();
        }

        function apagaCarona()
        {
            $query = $this->db->query("DELETE origem as origemusuario, destino as destinousuario, horario as horariousuario, meiotransporte as meio, usuario as emailusuario FROM transportesemcurso WHERE usuario = ($this->session->userdata('email')");
            return $query->result();
        }
}