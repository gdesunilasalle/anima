<?php
function verify() {
         $result = $this->user_registration_model->get_hash_value($_GET['apelido']); //get the hash value which belongs to given email from database
         if($result){ 
            if($result['hash']==$_GET['hash']){  //check whether the input hash value matches the hash value retrieved from the database
                $this->user_registration_model->verify_user($_GET['apelido']); //update the status of the user as verified
                /*---Now you can redirect the user to whatever page you want---*/
            }
         }
    }