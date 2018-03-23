<?php
class Adere_model extends CI_Model{

function __construct() {
parent::__construct();
}
function criacarona($data){

        $email = ($this->session->userdata('email'));
        $result = $this->db->query("SELECT * FROM `$data[proponente]` WHERE usuario = '$email' ")->num_rows();
        if( $result > 0) {
        //  A CARONA JA EXISTE
        } else {
        $this->db->query("INSERT INTO `$data[proponente]` (`usuario`, `origem`, `destino`, `horario`, `meiotransporte`) 
              VALUES ('$data[usuario]', 0, 0, 0, 0) 
              ");

                }
            }
        }
