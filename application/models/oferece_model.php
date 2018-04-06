<?php
class Oferece_model extends CI_Model{

function __construct() {
parent::__construct();
}
function buscaLogradouro()
        {
        	$email = ($this->session->userdata('email'));
            $query = $this->db->query("SELECT logradouro as logradourousuario FROM cadastrousuario WHERE email = '$email'");
            return $query->result();
        }
function gravacarona($data)
        {   
            $email = ($this->session->userdata('email'));
            $result = $this->db->query("SELECT * FROM transportesemcurso WHERE usuario = '$email' ")->num_rows();
        if( $result > 0) {
        $this->db->query("UPDATE transportesemcurso SET origem = '$data[origem]', destino = '$data[destino]', horario = '$data[horario]', meiotransporte = '$data[meiotransporte]', usuario = '$data[usuario]', host = '$data[host]', passageiro = 0 WHERE usuario = '$email'");
} else {
        $this->db->query("INSERT INTO transportesemcurso (`origem`, `destino`, `horario`, `meiotransporte`, `usuario`, `host`) 
              VALUES ('$data[origem]', '$data[destino]', '$data[horario]', '$data[meiotransporte]', '$data[usuario]', '$data[host]') 
              "); }  
                }

            }
