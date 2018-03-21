<?php
class Oferece_model extends CI_Model{

function __construct() {
parent::__construct();
}
function form_insert($data){
// Inserting in Table(transportesemcurso) of Database(anima)
$this->db->insert('transportesemcurso', $data);
}
function buscaLogradouro()
        {
        	$email = ($this->session->userdata('email'));
            $query = $this->db->query("SELECT logradouro as logradourousuario FROM cadastrousuario WHERE email = '$email'");
            return $query->result();
        }
function criacarona($data)
        { 	if ($result = $this->db->query("SHOW TABLES LIKE '".$table."'")) {
    		if($result->num_rows >= 1) {
        	// NÃO CRIA TABELA... ELSE...
    	}
			} else {
   							$query = $this->db->query("CREATE TABLE `$data[usuario]`(
  							`ID` int(11) NOT NULL,
  							`origem` varchar(200) NOT NULL,
  							`destino` varchar(200) NOT NULL,
  							`horario` varchar(200) NOT NULL,
  							`meiotransporte` varchar(11) NOT NULL,
  							`usuario` varchar(240) NOT NULL)");
					}

        }
function gravacarona($data)
        {
        	$this->db->query("INSERT INTO `$data[usuario]` (
            	`origem`, `destino`, `horario`, `meiotransporte`, `usuario`) VALUES 
            	('$data[origem]', '$data[destino]', '$data[horario]', '$data[meiotransporte]', '$data[usuario]');");
        }
}



