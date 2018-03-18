<?php class Apagar_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                $CI = &get_instance();
                //$this->db2 = $CI->load->database('Anima', TRUE);
        }
                function apagaCarona()
        {
            $email = ($this->session->userdata('email'));
            $query = $this->db->query("DELETE FROM transportesemcurso WHERE usuario = '$email'");            
        }
}