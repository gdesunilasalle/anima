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
function criacarona($data)
        {   
$query = $this->db->query("CREATE TABLE IF NOT EXISTS `$data[usuario]`(
                `ID` int(11) NOT NULL,
                `origem` varchar(200) NOT NULL,
                `destino` varchar(200) NOT NULL,
                `horario` varchar(200) NOT NULL,
                `meiotransporte` varchar(11) NOT NULL,
                `usuario` varchar(240) NOT NULL);");
            $query = $this->db->query("ALTER TABLE `$data[usuario]`");
            }
function gravacarona($data)
        {    $result = $this->db->query("SELECT * FROM `$data[usuario]` WHERE ID = 0 ")->num_rows();
        if( $result > 0) {
        $this->db->query("UPDATE `$data[usuario]` SET origem = '$data[origem]', destino = '$data[destino]', horario = '$data[horario]', meiotransporte = '$data[meiotransporte]', usuario = '$data[usuario]' WHERE ID = 0 ");
} else {
        $this->db->query("INSERT INTO `$data[usuario]` (`ID`,`origem`, `destino`, `horario`, `meiotransporte`, `usuario`) 
              VALUES (0,'$data[origem]', '$data[destino]', '$data[horario]', '$data[meiotransporte]', '$data[usuario]') 
              "); }  
                }
function gravaindice($data)
        {    
        $email = ($this->session->userdata('email'));
        $result = $this->db->query("SELECT * FROM transportesemcurso WHERE usuario = '$email' ")->num_rows();
        if( $result > 0) {
            $this->db->where('usuario', $email);
            $this->db->update('transportesemcurso', $data);

        } else {   
            $this->db->insert('transportesemcurso', $data);
                }
        }
}