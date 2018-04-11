<?php class Chuta_model extends CI_Model {
        public function __construct()
        {
                parent::__construct();
                $CI = &get_instance();
                //$this->db2 = $CI->load->database('Anima', TRUE);
        }
        function chutausuario($data)
        {
            $this->db->query("DELETE FROM transportesemcurso WHERE usuario = '$data'");
            $this->db->query("DELETE FROM chat WHERE passageiro = '$data'");
        }
        
}