<?php class Card_model extends CI_Model {
        public function __construct()
        {
                parent::__construct();
                $CI = &get_instance();
                //$this->db2 = $CI->load->database('Anima', TRUE);
        }
        function exibecarona($data)
        {
            $query = $this->db->query("SELECT origem as origemusuario, curso as cursousuario, especifica_curso as especificacursousuario, destino as destinousuario, horario as horariousuario, meiotransporte as meio, usuario as emailusuario FROM transportesemcurso WHERE usuario = '$data' ");
            return $query->result();
        }
        function exibeconfirmados($data, $id)
        {
            $query = $this->db->query("SELECT origem as origemusuario, curso as cursousuario, especifica_curso as especificacursousuario, destino as destinousuario, horario as horariousuario, meiotransporte as meio, usuario as emailusuario FROM transportesemcurso WHERE passageiro = '$id' ");
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
        function le_chat($data)
        {   $query = $this->db->query("SELECT DATE_FORMAT(hora, '%H:%i') as horachat, host as hostchat, passageiro as passageirochat, mensagem as mensagemchat FROM chat WHERE passageiro = '$data' OR host = '$data'");
            return $query->result();
        }
        function grava_chat($data)
        {   $email = ($this->session->userdata('email'));
            $this->db->query("INSERT INTO chat (`hora`, `host`, `passageiro`, `mensagem`) VALUES ('$data[hora]', '$data[autor]', '$email', '$data[mensagem]')");
            $this->db->query("INSERT INTO historicochat (`hora`, `host`, `passageiro`, `mensagem`) VALUES ('$data[hora]', '$data[autor]', '$email', '$data[mensagem]')");

        }
        function curso_passageiro()
        {   $email = ($this->session->userdata('email'));
            $query = $this->db->query("SELECT curso as curso_usuario, especifica_curso as especifica_curso_usuario FROM cadastrousuario WHERE email = '$email'");
            return $query->result();
        }
}
