<?php
class Adere_model extends CI_Model{

function __construct() {
parent::__construct();
}
        function criacarona($id, $data){
            $result = $this->db->query("SELECT * FROM transportesemcurso WHERE usuario = '$data' ")->num_rows();
        if( $result > 0) {
        $this->db->query("UPDATE transportesemcurso SET passageiro = '$id' WHERE usuario = '$data'");
        } else {
        $this->db->query("INSERT INTO transportesemcurso (`usuario`, `passageiro`)
              VALUES ('$data', '$id') 
              "); }  
        }
        function consultaid($data)
        {
            $passageiro = $this->db->query("SELECT ID FROM transportesemcurso WHERE usuario = '$data' ");
            $result = $passageiro->row();
            return $result->ID;
            return $passageiro->result(); //peguei o 6

        }

}