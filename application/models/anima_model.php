<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Anima extends CI_Model {

 function anima(){
  parent::Model();
 }

 function getCaronas(){
  $this->db->select("origem,destino,horario");
  $this->db->from('transportesemcurso');
  $query = $this->db->get();
  return $query->result();
 }
}