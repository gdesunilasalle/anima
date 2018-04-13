<?php class Busca_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                $CI = &get_instance();
                //$this->db2 = $CI->load->database('Anima', TRUE);
        }
        function userInformation()
        {   
            $email = ($this->session->userdata('email'));
            $query = $this->db->query("SELECT origem as origemusuario, destino as destinousuario, horario as horariousuario, meiotransporte as meio, usuario as emailusuario, curso as cursousuario, especifica_curso as especificacursousuario FROM transportesemcurso WHERE host = 1 AND usuario != '$email' ORDER BY horario");
            return $query->result();
        }
        function apagaCarona()
        {
            $query = $this->db->query("DELETE origem as origemusuario, destino as destinousuario, horario as horariousuario, meiotransporte as meio, usuario as emailusuario FROM transportesemcurso WHERE usuario = ($this->session->userdata('email')");
            return $query->result();
        }
}