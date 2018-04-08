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
        function criacarona($id, $data, $meio, $proponente){
            $result  = $this->db->query("SELECT * FROM transportesemcurso WHERE usuario = '$data' ")->num_rows();
            $result2 = $this->db->query("SELECT passageiro FROM transportesemcurso WHERE passageiro = '$id' ")->num_rows();
                if( $result > 0) {
                    $this->db->query("UPDATE transportesemcurso SET passageiro = '$id', host = 0 WHERE usuario = '$data'");
                    return 2;
                }else if ($meio == 'Uber' && $result2 < 3) {
                    $this->db->query("INSERT INTO transportesemcurso (`usuario`, `passageiro`) VALUES ('$data', '$id')");
                    $this->db->query("INSERT INTO chat (`host`, `passageiro`, `mensagem`) VALUES ('$data', '$proponente', 'Entrou na carona...')");
                    return 2;
                }else if ($meio == 'Uber' && $result2 >= 3){
                    return 3;
                }else if ($meio == 'Carro' && $result2 < 4 ) {
                    $this->db->query("INSERT INTO transportesemcurso (`usuario`, `passageiro`) VALUES ('$data', '$id')");
                    $this->db->query("INSERT INTO chat (`host`, `passageiro`, `mensagem`) VALUES ('$data', '$proponente', 'Entrou na carona...')");
                    return 2;
                }else if ($meio == 'Carro' && $result2 >= 4){
                    return 4;
                }else if ($meio != 'Carro' && $meio != 'Uber') {
                    $this->db->query("INSERT INTO transportesemcurso (`usuario`, `passageiro`) VALUES ('$data', '$id')");
                    $this->db->query("INSERT INTO chat (`host`, `passageiro`, `mensagem`) VALUES ('$data', '$proponente', 'Entrou na carona...')");
                    return 2;
                }  
        }        
}