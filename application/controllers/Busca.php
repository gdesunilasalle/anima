<?php


function index()
{
    $query = $this->db->select('*')->from('origem')->get();
    return $query->result();
    $this->load->model('consulta_model');
    $data['query'] = $this->consulta_model->viewauction();   
    $this->load->view('busca/main', $data);
}

