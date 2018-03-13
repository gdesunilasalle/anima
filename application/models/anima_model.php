<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class anima_model extends CI_Model {
function __construct() {
parent::__construct();
}
 function getCaronas(){
  $this->db->select("origem,destino,horario");
  $this->db->from('transportesemcurso');
  $query = $this->db->get();
  return $query->result();
 }
}