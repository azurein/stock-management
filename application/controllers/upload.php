<?php
class Upload extends CI_Controller {
 
   function __construct()
   {
      parent::__construct();
      $this->load->helper(array('form', 'url'));
   }
 
   function index()
   {
      $this->load->view('upload_form', array('error' => ' ' ));
   }
 
	function do_upload()
	{	
		if(isset($_FILES['upload']) === true) {
			$files = $_FILES['upload'];
			for ($i=0 ; $i<count($files['name']) ; $i++) { 
				$name = $files['name'][$i];
				$tmp_name = $files['tmp_name'][$i];
				move_uploaded_file($tmp_name, 'staff_site_files/'.$name);
			}
		}
		
		if(isset($_FILES['upload2']) === true) {
			$files = $_FILES['upload2'];
			for ($i=0 ; $i<count($files['name']) ; $i++) { 
				$name = $files['name'][$i];
				$tmp_name = $files['tmp_name'][$i];
				move_uploaded_file($tmp_name, 'staff_site_files/'.$name);
			}
		}
	} 
	
}
?>