<?php
class insert_model extends CI_Model{
function __construct() {
parent::__construct();
}
function form_insert($data){
// Inserting in Table(cadastrousuario) of Database(anima)
$this->db->insert('cadastrousuario', $data);
}

function verify_user($email) {
        $data = array('is_verified' => 1);
        $this->db->where('email', $apelido);
        $this->db->update('apelido', $data);
    }


}