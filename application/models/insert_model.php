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
$this->db->query("UPDATE cadastrousuario SET nomecompleto = '$data[nomecompleto]', senha = '$data[senha]', matricula = '$data[matricula]', curso = '$data[curso]', especifica_curso = '$data[especifica_curso]', logradouro = '$data[logradouro]', complemento = '$data[complemento]', bairro = '$data[bairro]', cidade = '$data[cidade]', cep = '$data[cep]' WHERE email = '$email'");
}
}
