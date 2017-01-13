<?php
class Admin_site extends CI_Controller {

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
		if($this->staff_model->isAdmin($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['nav0'] = "laporan_adm_gudang";
			$data['nav1'] = "";
			$data['nav2'] = "book";
			$data['nav3'] = "tagihan";
			$data['nav4'] = "insert_DO";
			$data['nav5'] = "faktur";
			$data['nav6'] = "bstb";
			$data['nav7'] = "plat";
			$data['nav8'] = "insert_staff";
			$data['nav9'] = "inspeksi";
			$data['conf_link'] = "config";
			$data['title'] = "Administrasi Toyota - Deskripsi Pekerjaan";
			$data['posisi'] = $session_data['posisi'];
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('admin-nav', $data);
			$this -> load -> view('admin-content-job_desc', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function book() {
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isAdmin($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['spk'] = $this -> staff_model -> getSPK_Status1();
			$data['nav0'] = "laporan_adm_gudang";
			$data['nav1'] = "job_desc";
			$data['nav2'] = "";
			$data['nav3'] = "tagihan";
			$data['nav4'] = "insert_DO";
			$data['nav5'] = "faktur";
			$data['nav6'] = "bstb";
			$data['nav7'] = "plat";
			$data['nav8'] = "insert_staff";
			$data['conf_link'] = "config";
			$data['title'] = "Administrasi Toyota - Deskripsi Pekerjaan";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('admin-nav', $data);
			$this -> load -> view('admin-content-book', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function tagihan() {
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isAdmin($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['namaMobil'] = $this -> staff_model -> getCars();
			$data['nav0'] = "laporan_adm_gudang";
			$data['nav1'] = "job_desc";
			$data['nav2'] = "book";
			$data['nav3'] = "";
			$data['nav4'] = "insert_DO";
			$data['nav5'] = "faktur";
			$data['nav6'] = "bstb";
			$data['nav7'] = "plat";
			$data['nav8'] = "insert_staff";
			$data['conf_link'] = "config";
			$data['title'] = "Kasir Toyota - Penerimaan Pembayaran";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('admin-nav', $data);
			$this -> load -> view('admin-content-tagihan', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function insert_DO() {
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isAdmin($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['stock'] = $this -> staff_model -> getStock2();
			$data['nav0'] = "laporan_adm_gudang";
			$data['nav1'] = "job_desc";
			$data['nav2'] = "book";
			$data['nav3'] = "tagihan";
			$data['nav4'] = "";
			$data['nav5'] = "faktur";
			$data['nav6'] = "bstb";
			$data['nav7'] = "plat";
			$data['nav8'] = "insert_staff";
			$data['conf_link'] = "config";
			$data['title'] = "Administrasi Toyota - Membuat Delivery Order";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('admin-nav', $data);
			$this -> load -> view('admin-content-insert_DO', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function faktur() {
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isAdmin($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['nav0'] = "laporan_adm_gudang";
			$data['nav1'] = "job_desc";
			$data['nav2'] = "book";
			$data['nav3'] = "tagihan";
			$data['nav4'] = "insert_DO";
			$data['nav5'] = "";
			$data['nav6'] = "bstb";
			$data['nav7'] = "plat";
			$data['nav8'] = "insert_staff";
			$data['conf_link'] = "config";
			$data['title'] = "Administrasi Toyota - Faktur";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('admin-nav', $data);
			$this -> load -> view('admin-content-faktur', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function bstb() {
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isAdmin($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['nav0'] = "laporan_adm_gudang";
			$data['nav1'] = "job_desc";
			$data['nav2'] = "book";
			$data['nav3'] = "tagihan";
			$data['nav4'] = "insert_DO";
			$data['nav5'] = "faktur";
			$data['nav6'] = "";
			$data['nav7'] = "plat";
			$data['nav8'] = "insert_staff";
			$data['conf_link'] = "config";
			$data['title'] = "Administrasi Toyota - BSTB";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('admin-nav', $data);
			$this -> load -> view('admin-content-bstb', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function plat() {
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isAdmin($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['nomor'] = $this -> staff_model -> getNomor_2();
			$data['nav0'] = "laporan_adm_gudang";
			$data['nav1'] = "job_desc";
			$data['nav2'] = "book";
			$data['nav3'] = "tagihan";
			$data['nav4'] = "insert_DO";
			$data['nav5'] = "faktur";
			$data['nav6'] = "bstb";
			$data['nav7'] = "";
			$data['nav8'] = "insert_staff";
			$data['conf_link'] = "config";
			$data['title'] = "Administrasi Toyota - Plat Nomor";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('admin-nav', $data);
			$this -> load -> view('admin-content-plat', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function insert_staff() {
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isAdmin($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['lastid'] = $this -> staff_model -> getLastId();
			$data['nav0'] = "laporan_adm_gudang";
			$data['nav1'] = "job_desc";
			$data['nav2'] = "book";
			$data['nav3'] = "tagihan";
			$data['nav4'] = "insert_DO";
			$data['nav5'] = "faktur";
			$data['nav6'] = "bstb";
			$data['nav7'] = "plat";
			$data['nav8'] = "";
			$data['conf_link'] = "config";
			$data['title'] = "Administrasi Toyota - Tambah Data Staff Baru";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('admin-nav', $data);
			$this -> load -> view('admin-content-insert_staff', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}
	/*
	function update_staff() {
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isAdmin($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['nav1'] = "job_desc";
			$data['nav2'] = "book";
			$data['nav3'] = "insert_DO";
			$data['nav4'] = "insert_staff";
			$data['conf_link'] = "config";
			$data['title'] = "Administrasi Toyota - Ubah Status Staff yang Sudah Ada";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('admin-nav', $data);
			$this -> load -> view('admin-content-update_staff', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}
	*/
	function config() {
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isAdmin($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['nav0'] = "laporan_adm_gudang";
			$data['nav1'] = "job_desc";
			$data['nav2'] = "book";
			$data['nav3'] = "tagihan";
			$data['nav4'] = "insert_DO";
			$data['nav5'] = "faktur";
			$data['nav6'] = "bstb";
			$data['nav7'] = "plat";
			$data['nav8'] = "insert_staff";
			$data['conf_link'] = "";
			$data['title'] = "Administrasi Toyota - Pengaturan akun";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('admin-nav', $data);
			$this -> load -> view('staff-content-config', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function getDO() {
		$id = $this->input->post('num');
		$result = $this->staff_model->getDO($id);
		foreach ($result as $row) {
			echo '
			<div class="jarak">
                <div class="label" style="margin-left: 25px;">
                    <label>Tanggal DO</label>
                </div>
                <div class="textf">
                    <input type="text" id="tglDO" name="tglDO" value="'.$row->tgl_delivery_order.'">
                </div>
            </div>
            <div class="jarak">
                <div class="label" style="margin-left: 25px;">
                    <label>No. Rangka</label>
                </div>
                <div class="textf">
                     <input type="text" id="noRangka" name="noRangka" value="'.$row->no_rangka.'">
                </div>
            </div>
            <div class="jarak">
                <div class="label" style="margin-left: 25px;">
                    <label>No. Mesin</label>
                </div>
                <div class="textf">
                    <input type="text" id="noMesin" name="noMesin" value="'.$row->no_mesin.'">
                </div>
            </div>
            <div class="jarak">
                <div class="label" style="margin-left: 25px;">
                    <label>Nama Mobil</label>
                </div>
                <div class="textf">
                    <input type="text" id="namaMobil" name="namaMobil" value="'.$row->nama_mobil.'">
                </div>
            </div>
            <div class="jarak">
                <div class="label" style="margin-left: 25px;">
                    <label>Tipe Mobil</label>
                </div>
                <div class="textf">
                    <input type="text" id="tipeMobil" name="tipeMobil" value="'.$row->tipe_mobil.'">
                </div>
            </div>
            <div class="jarak">
                <div class="label" style="margin-left: 25px;">
                    <label>Warna Mobil</label>
                </div>
                <div class="textf">
                    <input type="text" id="warnaMobil" name="warnaMobil" value="'.$row->warna_mobil.'">
                </div>
            </div>
			';
		}
	}

	function getPO() {
		$id = $this->input->post('num');
		$result = $this->staff_model->getPO($id);
		foreach ($result as $row) {
			echo '
			<input type="text" readonly="readonly" id="no_po" name="no_po" value="'.$row->no_purchase_order.'" />
			';
		}
	}

	function cekPO() {
		$noPO = $this->input->post('num');
		if($noPO != "") {
			$result = $this->staff_model->cekPO($noPO);
			if($result) {
				echo "Nomor PO dapat diproses";
			}
			else {
				echo "Nomor PO ini tidak tercatat di DO.";
			}
		}
		else {
			echo "Nomor PO harus diisi.";
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
				redirect("index.php/admin_site/config");
			}
			else
			{
				$this->staff_model->updateProfile();
				$this->session->set_flashdata('info','<div class="message info"><h5>Success!</h5>Profil anda telah diubah.</div>');
				redirect("index.php/admin_site/config");
			}
		}
	}

	function insertTagihan() {
		$this->load->library('form_validation');
	  	// field name, error message, validation rules
	  	$this->form_validation->set_rules('no_po', 'Nomor PO', 'trim|required|xss_clean');

	  	if($this->form_validation->run() == FALSE)
	  	{
	  		$this->tagihan();
	  	}
	  	else
	  	{
	  		$this->staff_model->insertTagihan();
	  	}
	}

	function loadSPK() {
		$id = $this->input->post('num');
		$result = $this->staff_model->getSPK($id);

		foreach ($result as $row) {
			$total = 0;
			$asuransi = $row->asuransi;
			if($row->jenis_pembayaran == "tunai") {
				$tunai = $row->harga_kendaraan_tunai;
				$total = $tunai + $asuransi;
				echo '
				<tr>
					<td>
	                    <div class="label">
	                        <label id="label_po">Tahap</label>
	                    </div>
	                </td>
	                <td>
	                    <div class="textf">
	                        <input type="text" readonly="readonly" id="no_spk" name="no_spk" value="'.$row->tahap.'" /
	                    </div>
	                </td>
				</tr>
				<tr>
	                <td>
	                    <div class="label">
	                        <label id="label_po">No. SPK</label>
	                    </div>
	                </td>
	                <td>
	                    <div class="textf">
	                        <input type="text" readonly="readonly" id="no_spk" name="no_spk" value="'.$row->no_spk.'" />
	                    </div>
	                </td>
	            </tr>
	            <tr>
	                <td>
	                    <div class="label">
	                        <label id="label_po">Tanggal Entri SPK</label>
	                    </div>
	                </td>
	                <td>
	                    <div class="textf">
	                        <input type="text" readonly="readonly" id="tgl_spk" name="tgl_spk" value="'.$row->tgl_entry_spk.'" />
	                    </div>
	                </td>
	            </tr>
	            <tr>
	                <td>
	                    <div class="label">
	                        <label id="label_po">Jenis Pembayaran</label>
	                    </div>
	                </td>
	                <td>
	                    <div class="textf">
	                        <input type="text" readonly="readonly" id="jenis" name="jenis" value="'.$row->jenis_pembayaran.'" />
	                    </div>
	                </td>
	            </tr>
	            <tr>
	                <td>
	                    <div class="label">
	                        <label id="label_po">Total Pembayaran</label>
	                    </div>
	                </td>
	                <td>
	                    <div class="textf">
	                        <input type="text" readonly="readonly" id="harga" name="harga" value="'.$total.'" />
	                    </div>
	                </td>
	            </tr>';
			}
			else if($row->jenis_pembayaran == "kredit") {
				$kredit = $row->harga_kendaraan_kredit;
				$total = $kredit + $asuransi;
				echo '
				<tr>
					<td>
	                    <div class="label">
	                        <label id="label_po">Tahap</label>
	                    </div>
	                </td>
	                <td>
	                    <div class="textf">
	                        <input type="text" readonly="readonly" id="no_spk" name="no_spk" value="'.$row->tahap.'" /
	                    </div>
	                </td>
				</tr>
				<tr>
	                <td>
	                    <div class="label">
	                        <label id="label_po">No. SPK</label>
	                    </div>
	                </td>
	                <td>
	                    <div class="textf">
	                        <input type="text" readonly="readonly" id="no_spk" name="no_spk" value="'.$row->no_spk.'" />
	                    </div>
	                </td>
	            </tr>
	            <tr>
	                <td>
	                    <div class="label">
	                        <label id="label_po">Tanggal Entri SPK</label>
	                    </div>
	                </td>
	                <td>
	                    <div class="textf">
	                        <input type="text" readonly="readonly" id="tgl_spk" name="tgl_spk" value="'.$row->tgl_entry_spk.'" />
	                    </div>
	                </td>
	            </tr>
	            <tr>
	                <td>
	                    <div class="label">
	                        <label id="label_po">Jenis Pembayaran</label>
	                    </div>
	                </td>
	                <td>
	                    <div class="textf">
	                        <input type="text" readonly="readonly" id="jenis" name="jenis" value="'.$row->jenis_pembayaran.'" />
	                    </div>
	                </td>
	            </tr>
	            <tr>
	                <td>
	                    <div class="label">
	                        <label id="label_po">Harga Transaksi</label>
	                    </div>
	                </td>
	                <td>
	                    <div class="textf">
	                        <input type="text" readonly="readonly" id="harga" name="harga" value="'.$total.'" />
	                    </div>
	                </td>
	            </tr>
	            <tr>
	                <td>
	                    <div class="label">
	                        <label id="label_po">No. Purchase Order</label>
	                    </div>
	                </td>
	                <td>
	                    <div class="textf">
	                        <input type="text" id="no_po" name="no_po" value="" />
	                    </div>
	                </td>
	            </tr>
	            ';
			}
		}
	}

	function loadCar() {
		$tipe = $this->input->post('tipe');
		$warna = $this->input->post('warna');
		$idSPK = $this->input->post('no_spk');
		$result = $this->staff_model->getUnbookedStock($tipe, $warna);
		foreach ($result as $row) {
			echo '
			<tr class="odd gradeX" style="text-transform:uppercase;">
				<td style="vertical-align:middle">'.$row->no_mobil.'</td>
				<td style="vertical-align:middle">'.$row->nama_mobil.'</td>
				<td style="vertical-align:middle">'.$tipe.'</td>
				<td style="vertical-align:middle">'.$warna.'</td>
				<td style="vertical-align:middle">'.$row->tgl_perkiraan_masuk_gudang.'</td>
				<td style="vertical-align:middle">'.$row->tgl_masuk_gudang.'</td>
				<td style="vertical-align:middle"><a href="changeToBook/'.$row->no_mobil.'/'.$idSPK.'"><button type="button" class="btn btn-blue">Book</button></a></td>
			</tr>
			';
		}
	}

	function loadCar2() {
		$tipe = $this->input->post('tipe');
		$warna = $this->input->post('warna');
		$idSPK = $this->input->post('no_spk');
		$result = $this->staff_model->getBookedStockOn($idSPK, $tipe, $warna);
		foreach ($result as $row) {
			echo '
			<tr class="odd gradeX" style="text-transform:uppercase;">
				<td style="vertical-align:middle">'.$row->no_mobil.'</td>
				<td style="vertical-align:middle">'.$row->nama_mobil.'</td>
				<td style="vertical-align:middle">'.$tipe.'</td>
				<td style="vertical-align:middle">'.$warna.'</td>
				<td style="vertical-align:middle">'.$row->tgl_perkiraan_masuk_gudang.'</td>
				<td style="vertical-align:middle">'.$row->tgl_masuk_gudang.'</td>
				<td style="vertical-align:middle"><a href="changeToUnbook/'.$row->no_mobil.'/'.$idSPK.'"><button type="button" class="btn btn-blue">Unbook</button></a></td>
			</tr>
			';
		}
	}

	function changeToBook() {
		$idMobil = $this->uri->segment(3);
		$idSPK = $this->uri->segment(4);
		$this->staff_model->changeToBook($idMobil, $idSPK);
	}

	function changeToUnbook() {
		$idMobil = $this->uri->segment(3);
		$idSPK = $this->uri->segment(4);
		$this->staff_model->changeToUnbook($idMobil, $idSPK);
	}

	function insertStaff() {
      	$this->load->library('form_validation');
	  	// field name, error message, validation rules
	  	$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean');
	  	$this->form_validation->set_rules('reemail', 'Re-email', 'required|matches[email]|xss_clean');
	  	$this->form_validation->set_rules('pass', 'Password', 'required|min_length[6]|max_length[25]|xss_clean');
	  	$this->form_validation->set_rules('repass', 'Re-password', 'required|min_length[6]|max_length[25]|matches[pass]|xss_clean');
	  	$this->form_validation->set_rules('posisi', 'Posisi pekerjaan', 'xss_clean');
	  	if($this->form_validation->run() == FALSE)
	  	{
	   		$this->insert_staff();
	  	}
	  	else
	  	{
	   		$this->staff_model->insertStaff();
			$this->session->set_flashdata('info','<div class="message info"><h5>Success!</h5>Staff baru berhasil didaftarkan.</div>');
			redirect("index.php/admin_site/insert_staff");
	  	}
	}

	function insertDO() {
      	$this->load->library('form_validation');
	  	$result = $this->staff_model->getSPK_Status2();
	  	$jenisBayar = "";
		foreach ($result as $row) {
			$jenisBayar = $row->jenis_pembayaran;
		}

		if($this->input->post('tempSPK') == NULL) {
			$this->session->set_flashdata('info','<div class="message error"><h5>Failed!</h5>Silahkan pilih salah satu mobil.</div>');
			redirect("index.php/admin_site/insert_DO/");
		}
		else {
			if($jenisBayar == "tunai") {
			$this->staff_model->insertDO();
			}
			else if($jenisBayar == "kredit") {
				$this->form_validation->set_rules('no_po', 'Nomor PO', 'trim|required|min_length[3]|xss_clean');
				if($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('info','<div class="message error"><h5>Failed!</h5>Nomor PO harus diisi.</div>');
					redirect("index.php/admin_site/insert_DO/");
		  		}
				else {
					$this->staff_model->insertDO();
				}
			}
		}
	}

	function insertFaktur() {
      	$this->load->library('form_validation');
	  	// field name, error message, validation rules
	  	$this->form_validation->set_rules('no_do', 'Nomor Delivery Order', 'trim|required|xss_clean');

	  	if($this->form_validation->run() == FALSE)
	  	{
	   		$this->faktur();
	  	}
	  	else
	  	{
	   		$this->staff_model->insertFaktur();
	  	}
	}

	function insertBSTB() {
      	$this->load->library('form_validation');
	  	// field name, error message, validation rules
	  	$this->form_validation->set_rules('no_do', 'Nomor Delivery Order', 'trim|required|xss_clean');

	  	if($this->form_validation->run() == FALSE)
	  	{
	   		$this->bstb();
	  	}
	  	else
	  	{
	   		$this->staff_model->insertBSTB();
	  	}
	}

	function insertPlat() {
		$session_data = $this->session->userdata('logged_in');

      	$this->load->library('form_validation');
	  	// field name, error message, validation rules
		$this->form_validation->set_rules('mesin', 'Nomor Mesin', 'trim|required|xss_clean');
		$this->form_validation->set_rules('rangka', 'Nomor Rangka', 'trim|required|xss_clean');
		$this->form_validation->set_rules('plat', 'Nomor Plat', 'trim|required|xss_clean');

	  	if($this->form_validation->run() == FALSE)
	  	{
	   		$this->plat();
	  	}
	  	else
	  	{
	   		$this->staff_model->insertPlat($session_data['username']);
	  	}
	}

	function cekDO() {
		$id = $this->input->post('num');
		$result = $this->staff_model->cekDO($id);
		if($result) {
			echo "Nomor DO tersedia";
		}
		else {
			echo "Nomor DO tidak terdaftar.";
		}
	}

	function getCust() {
		$id = $this->input->post('num');
		$result = $this->staff_model->getCustOn($id);
		foreach ($result as $row) {
		echo '
		<tr>
            <div class="jarak">
                <div class="label" style="margin-left: 25px;">
                    <label>No. KTP</label>
                </div>
                <div class="textf">
               		<input readonly="readonly" type="text" id="no_KTP" name="no_KTP" value="'.$row->no_KTP.'">
                </div>
            </div>
            </tr>
            <tr>
            <td style="width: 600px;">
                <div class="jarak">
                    <div class="label" style="margin-left: 25px;">
                        <label>Nama Customer</label>
                    </div>
                    <div class="textf">
                        <input readonly="readonly" type="text" id="nama_customer" name="no_KTP" value="'.$row->nama_customer.'">
                    </div>
                </div>

                <div class="jarak">
                    <div class="label" style="margin-left: 25px;">
                        <label>Kontak Customer</label>
                    </div>
                    <div class="textf">
                        <input readonly="readonly" type="text" id="kontak_customer" name="kontak_customer" value="'.$row->kontak_customer.'">
                    </div>
                </div>

                <div class="jarak">
                    <div class="label" style="margin-left: 25px;">
                        <label>Alamat Customer</label>
                    </div>
                    <div class="textf">
                    	<textarea readonly="readonly" rows="4" cols="38" id="alamat_customer" name="alamat_customer" style="resize: none;">'.$row->alamat_customer.'</textarea>
                    </div>
                </div>
                <div class="jarak">
                    <div class="label" style="margin-left: 25px;">
                        <label>Kode Pos</label>
                    </div>
                    <div class="textf">
                        <input readonly="readonly" type="text" id="kode_pos" name="kode_pos" value="'.$row->kode_pos.'">
                    </div>
                </div>
                <div class="jarak">
                    <div class="label" style="margin-left: 25px;">
                        <label>Kode NPWP</label>
                    </div>
                    <div class="textf">
                        <input readonly="readonly" type="text" id="NPWP" name="NPWP" value="'.$row->NPWP.'">
                    </div>
                </div>
            </td>
        </tr>
		';
		}
	}

	function getCar() {
		$id = $this->input->post('num');
		$result = $this->staff_model->getCarOn($id);
		foreach ($result as $row) {
		echo '
		<tr>
	        <td style="width: 600px;">
	            <div class="jarak">
	                <div class="label" style="margin-left: 25px;">
	                    <label>Nama Mobil</label>
	                </div>
	                <div class="textf">
	                    <input readonly="readonly" type="text" id="nama_mobil" name="nama_mobil" value="'.$row->nama_mobil.'">
	                </div>
	            </div>

	            <div class="jarak">
	                <div class="label" style="margin-left: 25px;">
	                    <label>No. Rangka</label>
	                </div>
	                <div class="textf">
	                    <input readonly="readonly" type="text" id="no_rangka" name="no_rangka" value="'.$row->no_rangka.'">
	                </div>
	            </div>

				<div class="jarak">
	                <div class="label" style="margin-left: 25px;">
	                    <label>No. Mesin</label>
	                </div>
	                <div class="textf">
	                    <input readonly="readonly" type="text" id="no_mesin" name="no_mesin" value="'.$row->no_mesin.'">
	                </div>
	            </div>

	            <div class="jarak">
	                <div class="label" style="margin-left: 25px;">
	                    <label>Tipe Mobil</label>
	                </div>
	                <div class="textf">
	                    <input readonly="readonly" type="text" id="tipe_mobil" name="tipe_mobil" value="'.$row->tipe_mobil.'">
	                </div>
	            </div>

	            <div class="jarak">
	                <div class="label" style="margin-left: 25px;">
	                    <label>Warna Mobil</label>
	                </div>
	                <div class="textf">
	                    <input readonly="readonly" type="text" id="warna_mobil" name="warna_mobil" value="'.$row->warna_mobil.'">
	                </div>
	            </div>
	        </td>
	    </tr>
		';
		}
	}

	function laporan_adm_gudang() {
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isAdmin($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['model'] = $this->staff_model->getAvalailableModel();
			$data['nav0'] = "";
			$data['nav1'] = "job_desc";
			$data['nav2'] = "book";
			$data['nav3'] = "tagihan";
			$data['nav4'] = "insert_DO";
			$data['nav5'] = "faktur";
			$data['nav6'] = "bstb";
			$data['nav7'] = "plat";
			$data['nav8'] = "insert_staff";
			$data['conf_link'] = "";
			$data['conf_link'] = "config";
			$data['title'] = "Admin Toyota - Laporan Administrasi Gudang";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('admin-nav', $data);
			$this -> load -> view('admin-content-laporan_adm_gudang', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function loadAdmReport() {
		$model = $this->input->post('namaModel');
		$totalHarga = 0;
		$result = "";

		if($model == "all")
		{
			$result = $this->staff_model->loadModelAdm();
		}
		else {
			$result = $this->staff_model->loadModelAdm_2($model);
		}
		foreach ($result as $row) {
			echo '
			<tr>
				<td colspan="6">'.$row->nama_mobil.'</td>
			</tr>
			';
			if($model == "all")
			{
				$result2 = $this->staff_model->loadReportAdm();
			}
			else {
				$result2 = $this->staff_model->loadReportAdm_2($model);

			}
			foreach ($result2 as $row) {
				echo '
				<tr>
			        <td>'.$row->tipe_mobil.'</td>
			        <td>'.$row->MDP.'</td>
			        <td>'.$row->Ready.'</td>
			        <td>'.$row->Booked.'</td>
			        <td>'.$row->Sold.'</td>
			        <td>'.$row->Defect.'</td>
				</tr>
				';
			}
		}
	}
}
?>
