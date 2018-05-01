<?php class Edita_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }

        function dadosUsuario()
        {
            $emailcadastrado = $this->session->userdata('email');
            $query = $this->db->query("SELECT nomecompleto as edita_nomecompleto, curso as cursousuario, foto as fotousuario, especifica_curso as especificacursousuario, matricula as edita_matricula, email as edita_email, logradouro as edita_logradouro, bairro as edita_bairro, cidade as edita_cidade, complemento as edita_complemento, cep as edita_cep FROM cadastrousuario WHERE email = '$emailcadastrado'" );
            return $query->result();
        }
}
