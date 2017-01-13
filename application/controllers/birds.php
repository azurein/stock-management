<?Php
//birds.php
class Birds extends CI_Controller{
	function index(){
		$this -> load -> view('test');
	}
	
	function ambil(){
		$this->load->model('birds_model');
		$q = $this->input->get('term');
		$this->birds_model->get_bird($q);
	}
}
