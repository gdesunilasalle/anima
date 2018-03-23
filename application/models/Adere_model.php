<?php
class Adere_model extends CI_Model{

function __construct() {
parent::__construct();
}
function criacarona($data){    
    $result = $this->db->query("INSERT INTO `$data[proponente]` (`usuario`, `origem`, `destino`, `horario`, `meiotransporte`) 
              VALUES ('$data[usuario]', 0, 0, 0, 0) 
              "); }

                }
