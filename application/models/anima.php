<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class anima extends CI_Model {
       
    
 function HomeModel(){
  parent::Model();
 }

 function getEmployees(){
  $this->db->select("EMPLOYEE_ID,FIRST_NAME,LAST_NAME,EMAIL");
  $this->db->from('trn_employee');
  $query = $this->db->get();
  return $query->result();
 }
}

