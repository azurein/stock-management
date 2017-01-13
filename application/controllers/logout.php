<?php
class Logout extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this -> load -> model("staff_model");
    }

	function index() {
		$this->session->unset_userdata('logged_in');
		session_start();
	   	session_destroy();
	   	redirect('index.php/login', 'refresh');
	}

}
?>
