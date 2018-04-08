<?php class Card_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                $CI = &get_instance();
                //$this->db2 = $CI->load->database('Anima', TRUE);
        }
        function exibecarona($data)
        {
            $query = $this->db->query("SELECT origem as origemusuario, destino as destinousuario, horario as horariousuario, meiotransporte as meio, usuario as emailusuario FROM transportesemcurso WHERE usuario = '$data'");
            return $query->result();
// FAZER CONDIÇÃO PARA TESTE
        }
        function exibeconfirmados($data, $id)
        {   
            
            $query = $this->db->query("SELECT origem as origemusuario, destino as destinousuario, horario as horariousuario, meiotransporte as meio, usuario as emailusuario FROM transportesemcurso WHERE usuario != '$data' AND passageiro = '$id' ");
            return $query->result();
        }
        function consultaid($data)
        {
            $passageiro = $this->db->query("SELECT ID FROM transportesemcurso WHERE usuario = '$data' ");
            $result = $passageiro->row();
            return $result->ID;
            return $passageiro->result(); //peguei o 6

        }
        function usuarioativo($data)
        {   
            $query = $this->db->query("SELECT origem as origemusuario, destino as destinousuario, horario as horariousuario, meiotransporte as meio, usuario as emailusuario FROM transportesemcurso WHERE usuario = '$data'");
            return $query->result();
        }
        function le_chat($id)
        {   $email = ($this->session->userdata('email'));
            $query = $this->db->query("SELECT hora as horachat, host as hostchat, passageiro as passageirochat, mensagem as mensagemchat FROM chat WHERE host = '$email' OR passageiro = '$email' ");
            return $query->result();
        }

}