<?php

function viewauction()
{
    $query = $this->db->select('*')->from('origem')->get();
    return $query->result();
}