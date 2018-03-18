<?php  

class Logout extends CI_Controller {
function __construct() {
parent::__construct();
}
public function index(){

	ob_start();
    $this->session->sess_destroy();
    
    }
}



