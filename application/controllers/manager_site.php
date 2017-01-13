<?php
class Manager_site extends CI_Controller {

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
		if($this->staff_model->isManager($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['nav1'] = "";
			$data['nav2'] = "detil_harga";
			$data['nav3'] = "laporan_penjualan";
			$data['nav4'] = "laporan_adm_gudang";
            $data['nav51'] = "input_leasing";
            $data['nav52'] = "update_leasing";
			$data['conf_link'] = "config";
			$data['title'] = "Manager Toyota - Deskripsi Pekerjaan";
			$data['posisi'] = $session_data['posisi'];
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('manager-nav', $data);
			$this -> load -> view('manager-content-job_desc', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function detil_harga() {
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isManager($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['catalog'] = $this -> staff_model -> getCatalogDetail();
			$data['nav1'] = "job_desc";
			$data['nav2'] = "";
			$data['nav3'] = "laporan_penjualan";
			$data['nav4'] = "laporan_adm_gudang";
            $data['nav51'] = "input_leasing";
            $data['nav52'] = "update_leasing";
			$data['conf_link'] = "config";
			$data['title'] = "Manager Toyota - Katalog Mobil";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('manager-nav', $data);
			$this -> load -> view('manager-content-detil_harga', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function detilHarga() {
      	$id = $this->uri->segment(3);
      	$tipe = $this->uri->segment(4);

		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isManager($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['tunai'] = $this -> staff_model -> getTunai($tipe, $id);
			$data['car'] = $this -> staff_model -> getCarOnId($id);
			$data['leasing'] = $this -> staff_model -> getLeasing();
			$data['id'] = $id;
			$data['tipe'] = $tipe;

			$data['nav1'] = "/toyota/index.php/manager_site/job_desc";
			$data['nav2'] = "/toyota/index.php/manager_site/detil_harga";
			$data['nav3'] = "/toyota/index.php/manager_site/laporan_penjualan";
			$data['nav4'] = "/toyota/index.php/manager_site/laporan_adm_gudang";
            $data['nav51'] = "/toyota/index.php/manager_site/input_leasing";
            $data['nav52'] = "/toyota/index.php/manager_site/update_leasing";
			$data['conf_link'] = "/toyota/index.php/manager_site/config";
			$data['title'] = "Manager Toyota - Tambah Warna";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('manager-nav', $data);
			$this -> load -> view('manager-content-insert_detil_harga', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function getKredit_11() {
		$tipe = $this->input->post('tipe');
		$id = $this->input->post('id');
		$result = $this->staff_model->getKreditOn($tipe, $id, '11');
		foreach ($result as $row) {
			echo $row->harga_kredit;
		}
	}

	function getKredit_23() {
		$tipe = $this->input->post('tipe');
		$id = $this->input->post('id');
		$result = $this->staff_model->getKreditOn($tipe, $id, '23');
		foreach ($result as $row) {
			echo $row->harga_kredit;
		}
	}

	function getKredit_35() {
		$tipe = $this->input->post('tipe');
		$id = $this->input->post('id');
		$result = $this->staff_model->getKreditOn($tipe, $id, '35');
		foreach ($result as $row) {
			echo $row->harga_kredit;
		}
	}

	function getKredit_47() {
		$tipe = $this->input->post('tipe');
		$id = $this->input->post('id');
		$result = $this->staff_model->getKreditOn($tipe, $id, '47');
		foreach ($result as $row) {
			echo $row->harga_kredit;
		}
	}

	function saveKredit() {
		$id = $this->input->post('id');
		$tipe = $this->input->post('tipe');
		$kredit_11 = $this->input->post('kredit_11');
		$kredit_23 = $this->input->post('kredit_23');
		$kredit_35 = $this->input->post('kredit_35');
		$kredit_47 = $this->input->post('kredit_47');
		$this->staff_model->saveKredit($id, $tipe, $kredit_11, $kredit_23, $kredit_35, $kredit_47);
	}

	function insertDetilHarga() {
      	$this->load->library('form_validation');
	  	// field name, error message, validation rules
	  	$this->form_validation->set_rules('perdp', 'Persentase DP', 'trim|required|xss_clean');
		$this->form_validation->set_rules('hargaTunai', 'Harga tunai', 'trim|required|xss_clean');
		$this->form_validation->set_rules('hap', 'Harga asuransi per tahun', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('hkredit1', 'Harga kredit 11x angsuran', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('hkredit2', 'Harga kredit 23x angsuran', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('hkredit3', 'Harga kredit 35x angsuran', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('hkredit4', 'Harga kredit 47x angsuran', 'trim|required|xss_clean');


	  	if($this->form_validation->run() == FALSE)
	  	{
			$this->detilHarga();
	  	}
	  	else
	  	{
	   		$this->staff_model->insertDetilHarga();
	  	}
	}

	function laporan_penjualan() {
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isManager($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['model'] = $this->staff_model->getAvalailableModel();
			$data['nav1'] = "job_desc";
			$data['nav2'] = "detil_harga";
			$data['nav3'] = "";
			$data['nav4'] = "laporan_adm_gudang";
            $data['nav51'] = "input_leasing";
            $data['nav52'] = "update_leasing";
			$data['conf_link'] = "config";
			$data['title'] = "Manager Toyota - Deskripsi Pekerjaan";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('manager-nav', $data);
			$this -> load -> view('manager-content-laporan_penjualan', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}


	function loadSalesReport_Tunai() {
		$awal = $this->input->post('tglAwal');
		$akhir = $this->input->post('tglAkhir');
		$model = $this->input->post('namaModel');
		$result = "";
		$totalHarga = 0;
		if($model == "all")
		{
			$result = $this->staff_model->loadSalesReport_Tunai($awal, $akhir);
		}
		else {
			$result = $this->staff_model->loadSalesReport_Tunai_2($awal, $akhir, $model);
		}
		foreach ($result as $row) {
			echo '
			<tr>
				<td>'.$row->nama_mobil.'</td>
		        <td>'.$row->tipe_mobil.'</td>
		        <td>'.$row->warna_mobil_pesanan.'</td>
		        <td>'.$row->tgl_bukti_serah_terima_barang.'</td>
		        <td>'.$row->harga_transaksi.'</td>
			</tr>
			';
			$totalHarga += $row->harga_transaksi;
		}
		echo '
			<tr>
				<td colspan="4">Total Harga</td>
		        <td>'.$totalHarga.'</td>
			</tr>
			';
	}

	function loadSalesReport_Kredit() {
		$awal = $this->input->post('tglAwal');
		$akhir = $this->input->post('tglAkhir');
		$model = $this->input->post('namaModel');
		$result = "";
		$totalHarga = 0;
		if($model == "all")
		{
			$result = $this->staff_model->loadSalesReport_Kredit($awal, $akhir);
		}
		else {
			$result = $this->staff_model->loadSalesReport_Kredit_2($awal, $akhir, $model);
		}
		foreach ($result as $row) {
			echo '
			<tr>
				<td>'.$row->nama_mobil.'</td>
		        <td>'.$row->tipe_mobil.'</td>
		        <td>'.$row->warna_mobil_pesanan.'</td>
		        <td>'.$row->tgl_bukti_serah_terima_barang.'</td>
		        <td>'.$row->lama_angsuran.'</td>
		        <td>'.$row->nama_leasing.'</td>
		        <td>'.$row->harga_transaksi.'</td>
			</tr>
			';
			$totalHarga += $row->harga_transaksi;
		}
		echo '
			<tr>
				<td colspan="6">Total Harga</td>
		        <td>'.$totalHarga.'</td>
			</tr>
			';
	}

    function input_leasing() {
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isManager($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['catalog'] = $this -> staff_model -> getCatalogDetail();
			$data['nav1'] = "job_desc";
			$data['nav2'] = "detil_harga";
			$data['nav3'] = "laporan_penjualan";
			$data['nav4'] = "laporan_adm_gudang";
            $data['nav51'] = "";
            $data['nav52'] = "update_leasing";
			$data['conf_link'] = "config";
			$data['title'] = "Manager Toyota - Katalog Mobil";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('manager-nav', $data);
			$this -> load -> view('manager-content-input_leasing', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function insertLeasing(){
      	$this->load->library('form_validation');
	  	// field name, error message, validation rules
	  	$this->form_validation->set_rules('siup', 'Siup', 'trim|required|xss_clean');
		$this->form_validation->set_rules('nama_leasing', 'Nama Leasing', 'trim|required|xss_clean');
		$this->form_validation->set_rules('leasing_telp', 'Telepon Leasing', 'trim|required|xss_clean');
		$this->form_validation->set_rules('leasing_alamat', 'Alamat Leasing', 'trim|required|xss_clean');
		$this->form_validation->set_rules('leasing_zipcode', 'Kode Pos Leasing', 'trim|required|xss_clean');

	  	if($this->form_validation->run() == FALSE)
	  	{
			$this->input_leasing();
	  	}
	  	else
	  	{
	   		$this->staff_model->insertLeasing();
	  	}
	}

	function update_leasing() {
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isManager($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['leasing'] = $this -> staff_model -> getLeasing();
			$data['nav1'] = "job_desc";
			$data['nav2'] = "detil_harga";
			$data['nav3'] = "laporan_penjualan";
			$data['nav4'] = "laporan_adm_gudang";
            $data['nav51'] = "input_leasing";
            $data['nav52'] = "";
			$data['conf_link'] = "config";
			$data['title'] = "Manager Toyota - Update Leasing";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('manager-nav', $data);
			$this -> load -> view('manager-content-update_leasing', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function updateLeasing(){
      	$this->load->library('form_validation');
	  	// field name, error message, validation rules
		$this->form_validation->set_rules('leasing_telp', 'Telepon Leasing', 'trim|required|xss_clean');
		$this->form_validation->set_rules('leasing_alamat', 'Alamat Leasing', 'trim|required|xss_clean');
		$this->form_validation->set_rules('leasing_zipcode', 'Kode Pos Leasing', 'trim|required|xss_clean');

	  	if($this->form_validation->run() == FALSE)
	  	{
			$this->update_leasing();
	  	}
	  	else
	  	{
	   		$this->staff_model->updateLeasing();
	  	}
	}

	function config() {
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isManager($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['nav1'] = "job_desc";
			$data['nav2'] = "detil_harga";
			$data['nav3'] = "laporan_penjualan";
			$data['nav4'] = "laporan_adm_gudang";
            $data['nav51'] = "input_leasing";
            $data['nav52'] = "update_leasing";
			$data['conf_link'] = "";
			$data['title'] = "Manager Toyota - Pengaturan akun";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('manager-nav', $data);
			$this -> load -> view('staff-content-config', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}
}
?>
