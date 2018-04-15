<?php
class Insert_model extends CI_Model{
function __construct() {
parent::__construct();
}
function form_insert($data){
$this->db->insert('cadastrousuario', $data);
}
function form_update($data){
$email = ($this->session->userdata('email'));
$this->db->query("UPDATE cadastrousuario SET nomecompleto = '$data[nomecompleto]', senha = '$data[senha]', matricula = '$data[matricula]', curso = '$data[curso]', especifica_curso = '$data[especifica_curso]', email = '$data[email]', logradouro = '$data[logradouro]', numero = '$data[numero]', complemento = '$data[complemento]', cep = '$data[cep]', is_verified = '$data[is_verified]' WHERE email = '$email'");
}
}
