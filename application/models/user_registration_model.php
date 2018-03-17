<?php
class User_registration_model extends CI_Model{

function __construct() {
parent::__construct();
}

function verify_user($email) {
        $data = array('is_verified' => 1);
        $this->db->where('email', $email);
        $this->db->update('cadastrousuario', $data);
    }
}