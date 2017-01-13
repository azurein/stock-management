<?php
class Gudang_site extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this -> load -> model("staff_model");
    }

	function index() {
		if($this->session->userdata('logged_in'))
	   	{
	    	$session_data = $this->session->userdata('logged_in');
	     	$data['username'] = $session_data['username'];
		 	$this -> job_desc();
	   	}
	   	else
	   	{
	     	//If no session, redirect to login page
	     	redirect('index.php', 'refresh');
	   	}
	}

	function logout() {
		$this->session->unset_userdata('logged_in');
		session_start();
	   	session_destroy();
	   	redirect('index.php/login', 'refresh');
	}

	function job_desc() {
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isGudang($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['nav1'] = "";
			$data['nav2'] = "inspeksi";
			$data['conf_link'] = "config";
			$data['title'] = "Gudang Toyota - Deskripsi Pekerjaan";
			$data['posisi'] = $session_data['posisi'];
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('gudang-nav', $data);
			$this -> load -> view('gudang-content-job_desc', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function inspeksi() {
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isGudang($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['nomor'] = $this -> staff_model -> getNomor_2();
			$data['nav1'] = "job_desc";
			$data['nav2'] = "";
			$data['conf_link'] = "config";
			$data['title'] = "Gudang Toyota - Deskripsi Pekerjaan";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('gudang-nav', $data);
			$this -> load -> view('gudang-content-inspeksi', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function config() {
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isGudang($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['nav1'] = "job_desc";
			$data['nav2'] = "";
			$data['conf_link'] = "";
			$data['title'] = "Sales Toyota - Pengaturan akun";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('gudang-nav', $data);
			$this -> load -> view('staff-content-config', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function changeProfile() {
	  	$this->load->library('form_validation');
	  	// field name, error message, validation rules
		$this->form_validation->set_rules('email', 'Email baru', 'required|valid_email|xss_clean');
	  	$this->form_validation->set_rules('reemail', 'Ulang email baru', 'required|matches[email]|xss_clean');
		$this->form_validation->set_rules('oldpass', 'Password lama', 'required|min_length[6]|max_length[25]|xss_clean');
	  	$this->form_validation->set_rules('pass', 'Password baru', 'required|min_length[6]|max_length[25]|xss_clean');
	  	$this->form_validation->set_rules('repass', 'Ulang password baru', 'required|min_length[6]|max_length[25]|matches[pass]|xss_clean');

	  	if($this->form_validation->run() == FALSE)
	  	{
	   		$this->config();
	  	}
	  	else
	  	{
	  		$val_oldPass = $this->staff_model->valOldPass();
			if(!$val_oldPass)
			{
				$this->session->set_flashdata('error',"Password lama yang anda masukkan salah.");
				redirect("index.php/sales_site/config");
			}
			else
			{
				$this->staff_model->updateProfile();
				$this->session->set_flashdata('info','<div class="message info"><h5>Success!</h5>Profil anda telah diubah.</div>');
				redirect("index.php/sales_site/config");
			}
		}
	}

	/*
	function getRangka() {
		$num = $this -> input -> post('nomesin');
		$result = $this -> staff_model -> getRangka($num);
		foreach($result as $row) { echo '<input type="text" id="noMesin" name="noMesin" placeholder="Masukan no Rangka" size="50" value="'.$row->no_rangka.'" />'; }
	}

	function getMesin() {
		$num = $this -> input -> post('norangka');
		$result = $this -> staff_model -> getMesin($num);
		foreach($result as $row) { echo '<input type="text" id="noRangka" name="noRangka" placeholder="Masukkan no Mesin" size="50" value="'.$row->no_mesin.'" />'; }
	}
	 *
	 */

	function insertInspeksi() {
		$session_data = $this->session->userdata('logged_in');

      	$this->load->library('form_validation');
	  	// field name, error message, validation rules
	  	$this->form_validation->set_rules('idInspeksi', 'Nomor Inspeksi', 'trim|required|xss_clean');
		$this->form_validation->set_rules('noMesin', 'Nomor Mesin', 'trim|required|xss_clean');
		$this->form_validation->set_rules('noRangka', 'Nomor Rangka', 'trim|required|xss_clean');

	  	if($this->form_validation->run() == FALSE)
	  	{
	   		$this->inspeksi();
	  	}
	  	else
	  	{
	   		$this->staff_model->insertInspeksi($session_data['username']);
	  	}
	}
}
?>
