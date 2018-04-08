<?php class Apagar_model extends CI_Model {
        public function __construct()
        {
                parent::__construct();
                $CI = &get_instance();
        }
        function apagaCarona()
        {
            $email = ($this->session->userdata('email'));
            $this->db->query("DELETE FROM transportesemcurso WHERE usuario = '$email'");
            $this->db->query("DELETE FROM chat WHERE host = '$email'");            
        }
        function sairCarona($data)
        {
            $email = ($this->session->userdata('email'));
            $this->db->query("DELETE FROM transportesemcurso WHERE usuario = '$email' AND host = 0");
            $this->db->query("DELETE FROM chat WHERE host = '$email'"); 
        }
}