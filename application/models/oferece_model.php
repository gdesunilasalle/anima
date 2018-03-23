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
        { 	$result = $this->db->query("SHOW TABLES LIKE '".$data['usuario']."'");
    		if($result->num_rows >= 1) {
        	 $query = $this->db->query("CREATE TABLE `$data[usuario]`(
                `ID` int(11) NOT NULL,
                `origem` varchar(200) NOT NULL,
                `destino` varchar(200) NOT NULL,
                `horario` varchar(200) NOT NULL,
                `meiotransporte` varchar(11) NOT NULL,
                `usuario` varchar(240) NOT NULL);");
          $query = $this->db->query("ALTER TABLE `$data[usuario]` ADD PRIMARY KEY (`ID`)");
    		} else {
        // NADA ATRIBUIDO POR ENQUANTO PARA O ELSE//       
        }
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
}