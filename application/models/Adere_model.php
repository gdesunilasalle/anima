<?php
class Adere_model extends CI_Model{
function __construct() {
parent::__construct();
}
        function consultaid($data)
        {
            $passageiro = $this->db->query("SELECT ID FROM transportesemcurso WHERE usuario = '$data' ");
            $result = $passageiro->row();
            return $result->ID;
            return $passageiro->result(); //peguei o 6
        }
        function consultameio($id, $proponente)
        {
        $transporte = $this->db->query("SELECT meiotransporte FROM transportesemcurso WHERE usuario = '$proponente' ");
        $resultadotransoporte = $transporte->row();
        return $resultadotransoporte->meiotransporte;
        return $transporte->result();
        }
        function criacarona($id, $data, $meio, $proponente, $aderente){
            $result  = $this->db->query("SELECT * FROM transportesemcurso WHERE usuario = '$data' ")->num_rows();
            $result2 = $this->db->query("SELECT passageiro FROM transportesemcurso WHERE passageiro = '$id' ")->num_rows();
                if( $result > 0) {
                    $this->db->query("UPDATE transportesemcurso SET passageiro = '$id', host = 0, curso='$aderente[cursousuario]', especifica_curso='$aderente[especificacursousuario]' WHERE usuario = '$data'");
                    $this->db->query("DELETE FROM chat WHERE passageiro = '$data' or host = '$data'");
                    $this->db->query("INSERT INTO chat (`host`, `passageiro`, `mensagem`) VALUES ('$proponente', '$data', 'Entrou na carona...')");
                }else{
                    $this->db->query("INSERT INTO transportesemcurso (`usuario`, `passageiro`, `curso`, `especifica_curso`) VALUES ('$data', '$id', '$aderente[cursousuario]', '$aderente[especificacursousuario]')");
                    $this->db->query("INSERT INTO historicotransportes (`usuario`, `curso`, `especifica_curso`, `passageiro_de`) VALUES ('$data', '$aderente[cursousuario]', '$aderente[especificacursousuario]', '$aderente[proponente]')");
                    $this->db->query("INSERT INTO chat (`host`, `passageiro`, `mensagem`) VALUES ('$proponente', '$data', 'Entrou na carona...')");
                }
        }
}
