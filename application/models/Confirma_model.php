<?php
class Confirma_model extends CI_Model{

function __construct() {
parent::__construct();
}
function confirma_host()
        {   
            $email = ($this->session->userdata('email'));
            $host = $this->db->query("SELECT host FROM transportesemcurso WHERE usuario = '$email' ");
            return $host->result();
        }
function confirma_passageiro()
        {   
            $email = ($this->session->userdata('email'));
            $passageiro = $this->db->query("SELECT passageiro FROM transportesemcurso WHERE usuario = '$email' ");
            return $passageiro->result();
        }
function confirma_oferta($confirma)
        {   
            $email = ($this->session->userdata('email'));            
            $ID = $this->db->query("SELECT * FROM transportesemcurso WHERE usuario = '$email' AND  ");
            $result = $ID->row();
            if($result){
            return $result->ID;
            return $ID->result();} else {return 0;}
        }
}