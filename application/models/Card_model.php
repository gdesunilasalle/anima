<?php class Card_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                $CI = &get_instance();
                //$this->db2 = $CI->load->database('Anima', TRUE);
        }

        function userInformation($usuario)
        {


            

            $query = $this->db->query("SELECT origem as origemusuario, destino as destinousuario, horario as horariousuario, meiotransporte as meio, usuario as emailusuario FROM transportesemcurso WHERE usuario = '$usuario'");
            return $query->result();
        }

}