<?php
function verify_user($email) {
        $data = array('is_verified' => 1);
        $this->db->where('email', $apelido);
        $this->db->update('apelido', $data);
    }


}


