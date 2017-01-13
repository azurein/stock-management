<?php

class Sales_site extends CI_Controller {

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

	// view
	function job_desc() {
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isSales($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['nav1'] = "";
			$data['nav21'] = "insert_spk";
			$data['nav22'] = "update_spk";
			$data['nav3'] = "catalog";

			$data['conf_link'] = "config";
			$data['title'] = "Sales Toyota - Deskripsi Pekerjaan";
			$data['posisi'] = $session_data['posisi'];
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('sales-nav', $data);
			$this -> load -> view('sales-content-job_desc', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function spk() {
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isSales($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['cust'] = $this -> staff_model -> getCust();
			$data['leasing'] = $this -> staff_model -> getLeasing();
			$data['nav1'] = "job_desc";
			$data['nav21'] = "insert_spk";
			$data['nav22'] = "update_spk";
			$data['nav3'] = "catalog";

			$data['conf_link'] = "config";
			$data['title'] = "Sales Toyota - Surat Pesanan Kendaraan";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('sales-nav', $data);
			$this -> load -> view('sales-content-spk', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function get_DP() {
		$tempDP = 0;
		$tempHarga = 0;
		$tipe = $this->input->post("tipe");
		$result = $this->staff_model->getCatalogDetailOn($tipe);
		foreach ($result as $row) {
			$tempDP = $row->persentase_dp;
			$tempHarga = $row->harga_tunai;
		};
		$dpkalipersen = $tempHarga * $tempDP/100;
		echo $dpkalipersen;
	}

	function get_hargaTunai() {
		$tempHarga = 0;
		$tipe = $this->input->post("tipe");
		$result = $this->staff_model->getCatalogDetailOn($tipe);
		foreach ($result as $row) {
			$tempHarga = $row->harga_tunai;
		};
		//$total = 0;
		//$dp = $this->input->post('tempDP');
		//$this->$total = $dp + $tempHarga;
		echo $tempHarga;
	}

	function get_hargaKredit_11() {
		$tipe = $this->input->post("tipe");
		$id = $this->input->post("id");
		$result = $this->staff_model->getKreditOn($tipe, $id, '11');
		foreach ($result as $row) {
			echo $row->harga_kredit;
		};
	}

	function get_hargaKredit_23() {
		$tipe = $this->input->post("tipe");
		$id = $this->input->post("id");
		$result = $this->staff_model->getKreditOn($tipe, $id, '23');
		foreach ($result as $row) {
			echo $row->harga_kredit;
		};
	}

	function get_hargaKredit_35() {
		$tipe = $this->input->post("tipe");
		$id = $this->input->post("id");
		$result = $this->staff_model->getKreditOn($tipe, $id, '35');
		foreach ($result as $row) {
			echo $row->harga_kredit;
		};
	}

	function get_hargaKredit_47() {
		$tipe = $this->input->post("tipe");
		$id = $this->input->post("id");
		$result = $this->staff_model->getKreditOn($tipe, $id, '47');
		foreach ($result as $row) {
			echo $row->harga_kredit;
		};
	}

	function get_Asuransi() {
		$tempAsuransi = 0;
		$tipe = $this->input->post("tipe");
		$result = $this->staff_model->getCatalogDetailOn($tipe);
		foreach ($result as $row) {
			$tempAsuransi = $row->harga_asuransi_pertahun;
		}
		echo $tempAsuransi;
	}

	function getType() {
		$namaMobil = $this->input->post("nama");
		$result = $this->staff_model->getType($namaMobil);
		foreach ($result as $row) {
			echo "<option>$row->tipe_mobil</option>";
		};
	}

	function getColor() {
		$namaMobil = $this->input->post("nama");
		$result = $this->staff_model->getColor($namaMobil);
		foreach ($result as $row) {
			echo "<option>$row->nama_warna</option>";
		};
	}

	function insert_spk() {
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isSales($session_data['username']))
		{
			$data['mobil'] = $this->staff_model->getCars();
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['cust'] = $this -> staff_model -> getCust();
			$data['leasing'] = $this -> staff_model -> getLeasing();
			$data['nav1'] = "job_desc";
			$data['nav21'] = "";
			$data['nav22'] = "update_spk";
			$data['nav3'] = "catalog";

			$data['conf_link'] = "config";
			$data['title'] = "Sales Toyota - Tambah SPK Baru";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('sales-nav', $data);
			$this -> load -> view('sales-content-insert_spk', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function update_spk() {
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isSales($session_data['username']))
		{
			$data['mobil'] = $this->staff_model->getCars();
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['cust'] = $this -> staff_model -> getCust();
			$data['nav1'] = "job_desc";
			$data['nav21'] = "insert_spk";
			$data['nav22'] = "";
			$data['nav3'] = "catalog";

			$data['conf_link'] = "config";
			$data['title'] = "Sales Toyota - Ubah SPK Lama";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('sales-nav', $data);
			$this -> load -> view('sales-content-update_spk', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function catalog() {
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isSales($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['catalog'] = $this -> staff_model -> getCatalog();
			$data['nav1'] = "job_desc";
			$data['nav21'] = "insert_spk";
			$data['nav22'] = "update_spk";
			$data['nav3'] = "";

			$data['conf_link'] = "config";
			$data['title'] = "Sales Toyota - Katalog Mobil";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('sales-nav', $data);
			$this -> load -> view('sales-content-catalog', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function insert_catalog() {
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isSales($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['nav1'] = "job_desc";
			$data['nav21'] = "insert_spk";
			$data['nav22'] = "update_spk";
			$data['nav3'] = "catalog";

			$data['conf_link'] = "config";
			$data['title'] = "Sales Toyota - Tambah Data Mobil Tipe Baru";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('sales-nav', $data);
			$this -> load -> view('sales-content-insert_catalog', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function update_catalog() {
		$car_name = $this->uri->segment(3);
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isSales($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['mobil'] = $this -> staff_model -> getCatalogOnName($car_name);
			$data['warna'] = $this -> staff_model -> getWarnaOnName($car_name);
			$data['nav1'] = "/toyota/index.php/sales_site/job_desc";
			$data['nav21'] = "/toyota/index.php/sales_site/insert_spk";
			$data['nav22'] = "/toyota/index.php/sales_site/update_spk";
			$data['nav3'] = "/toyota/index.php/sales_site/catalog";

			$data['conf_link'] = "/toyota/index.php/sales_site/config";
			$data['title'] = "Sales Toyota - Update Data Mobil yang Sudah Ada";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('sales-nav', $data);
			$this -> load -> view('sales-content-update_catalog', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

    function insert_warna() {
        $car_name = $this->uri->segment(3);
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isSales($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
            $data['mobil'] = $this -> staff_model -> getCatalogOnName($car_name);
			$data['nav1'] = "/toyota/index.php/sales_site/job_desc";
			$data['nav21'] = "/toyota/index.php/sales_site/insert_spk";
			$data['nav22'] = "/toyota/index.php/sales_site/update_spk";
			$data['nav3'] = "/toyota/index.php/sales_site/catalog";

			$data['conf_link'] = "/toyota/index.php/sales_site/config";
			$data['title'] = "Sales Toyota - Tambah Warna";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('sales-nav', $data);
			$this -> load -> view('sales-content-insert_warna', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function update_warna() {
		$car_name = $this->uri->segment(3);
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isSales($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['mobil'] = $this -> staff_model -> getCatalogOnName($car_name);
			$data['warna'] = $this -> staff_model -> getWarnaOnName($car_name);
			$data['nav1'] = "/toyota/index.php/sales_site/job_desc";
			$data['nav21'] = "/toyota/index.php/sales_site/insert_spk";
			$data['nav22'] = "/toyota/index.php/sales_site/update_spk";
			$data['nav3'] = "/toyota/index.php/sales_site/catalog";

			$data['conf_link'] = "/toyota/index.php/sales_site/config";
			$data['title'] = "Sales Toyota - Update Data Mobil yang Sudah Ada";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('sales-nav', $data);
			$this -> load -> view('sales-content-update_warna', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function detil_katalog() {
		$catalog_id = $this->uri->segment(3);
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isSales($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['mobil'] = $this -> staff_model -> getCatalogOnId($catalog_id);
			$data['type'] = $this -> staff_model -> getDetailCatalogOnId($catalog_id);
			$data['nav1'] = "/toyota/index.php/sales_site/job_desc";
			$data['nav21'] = "/toyota/index.php/sales_site/insert_spk";
			$data['nav22'] = "/toyota/index.php/sales_site/update_spk";
			$data['nav3'] = "/toyota/index.php/sales_site/catalog";
			$data['conf_link'] = "/toyota/index.php/sales_site/config";
			$data['title'] = "Sales Toyota - Detail Katalog";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('sales-nav', $data);
			$this -> load -> view('sales-content-catalog_detail', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function detail_katalog($id) {
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isSales($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['mobil'] = $this -> staff_model -> getCatalogOnId($id);
			$data['type'] = $this -> staff_model -> getDetailCatalogOnId($id);
			$data['nav1'] = "/toyota/index.php/sales_site/job_desc";
			$data['nav21'] = "/toyota/index.php/sales_site/insert_spk";
			$data['nav22'] = "/toyota/index.php/sales_site/update_spk";
			$data['nav3'] = "/toyota/index.php/sales_site/catalog";
			$data['conf_link'] = "/toyota/index.php/sales_site/config";
			$data['title'] = "Sales Toyota - Detail Katalog";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('sales-nav', $data);
			$this -> load -> view('sales-content-catalog_detail', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function warna() {
		$car_name = $this->uri->segment(3);
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isSales($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
            $data['mobil'] = $this -> staff_model -> getCatalogOnName($car_name);
			$data['warna'] = $this -> staff_model -> getWarnaOnName($car_name);
			$data['nav1'] = "/toyota/index.php/sales_site/job_desc";
			$data['nav21'] = "/toyota/index.php/sales_site/insert_spk";
			$data['nav22'] = "/toyota/index.php/sales_site/update_spk";
			$data['nav3'] = "/toyota/index.php/sales_site/catalog";

			$data['conf_link'] = "/toyota/index.php/sales_site/config";
			$data['title'] = "Sales Toyota - Warna Mobil";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('sales-nav', $data);
			$this -> load -> view('sales-content-warna', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function tiga_d() {
		$model = $this->input->post('model');
		$warna = $this->input->post('warna');
		echo '
		   <form action="do_upload_3d" method="post" enctype="multipart/form-data">
		      <!-- INPUT FILE UPLOAD dibuat "multiple" -->
		      <input type="hidden" id="inputModel" name="inputModel" value="'.$model.'">
		      <input type="hidden" id="inputWarna" name="inputWarna" value="'.$warna.'">
		      <input type="file" name="upload" size="20" multiple><br />
		      <input type="submit" value="Upload">
		   </form>
		';
	}

	function do_upload_3d()
	{
		if(isset($_FILES['upload']) === true) {
			$files = $_FILES['upload'];
			for ($i=0 ; $i<count($files['name']) ; $i++) {
				$name = $files['name'][$i];
				$tmp_name = $files['tmp_name'][$i];
				move_uploaded_file($tmp_name, 'staff_site_files/images/3D'.$name);
				$this->do_upload_car();
			}
		}
		$data = array(
			'gambar'=> $this->input->post('staff_site_files/images/3D'.$name),
			'nama_mobil'=> $this->input->post('inputModel'),
		    'nama_warna'=> $this->input->post('inputWarna'),
		);
		$this->db->insert("tiga_d", $data);
	}

	function config() {
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isSales($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['nav1'] = "job_desc";
			$data['nav21'] = "insert_spk";
			$data['nav22'] = "update_spk";
			$data['nav3'] = "catalog";

			$data['conf_link'] = "";
			$data['title'] = "Sales Toyota - Pengaturan akun";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('sales-nav', $data);
			$this -> load -> view('staff-content-config', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}
	// end view

	// function
	function loadPembayaran() {
		$noSPK = $this->input->post('num');
		$pp = $this->staff_model->getPpOn($noSPK);
		$grandtotal = 0;

		foreach ($pp as $row) {
			echo '
			<tr>
				<td>'.$row->no_kwitansi.'</td>
				<td>'.$row->nilai_uang.'</td>
				<td>'.$row->no_kwitansi.'</td>
			</tr>
			';
			$grandtotal = $grandtotal + $row->nilai_uang;
		}
			echo '
			<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr>
 				<td>&nbsp;</td>
 				<td>GRANDTOTAL : <input type="text" id="grandTotal" name="grandTotal" value="'.$grandtotal.'" /></td>
 				<td>&nbsp;</td>
 			</tr>
		';
	}

	function loadCust() {
		$noSPK = $this->input->post('num');
		//$spk = $this->staff_model->getSPK($noSPK);
		//$mobil = $this->staff_model->getSPKCarsOn($noSPK);
		$cust = $this -> staff_model -> getSPKCustOn($noSPK);
		foreach ($cust as $row) {
			echo '
			<fieldset class="formGroupBox">
                <legend class="formTitleMenu">Customer</legend>
                <div class="formMenu">
                    <table width="800">
                        <tr>
                            <td width="200">
                                <label>No. KTP</label>
                            </td>
                            <td>
                                <label id="customer_noKTP">'.$row->no_KTP.'</label>
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                        <tr>
                            <td>
                                <label>Nama Lengkap</label>
                            </td>
                            <td>
                            	<label id="cust_autoname">'.$row->nama_customer.'</label>
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                        <tr>
                            <td>
                                <label>Nomor Telepon</label>
                            </td>
                            <td>
                            	<label id="customer_telp">'.$row->alamat_customer.'</label>
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                        <tr>
                            <td style="vertical-align: top;">
                                <label>Alamat</label>
                            </td>
                            <td id="cust_autoadrs">
                                <label id="customer_alamat">'.$row->kontak_customer.'</label>
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                        <tr>
                            <td>
                                <label>Kode Pos</label>
                            </td>
                            <td id="cust_autozip">
                                <label id="customer_zipcode">'.$row->kode_pos.'</label>
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                        <tr>
                            <td>
                                <label>No. NPWP</label>
                            </td>
                            <td>
                                <label id="customer_noNPWP">'.$row->NPWP.'</label>
                            </td>
                        </tr>
                    </table>
                </div>
             </fieldset>
			';
		}
	}

	function loadSPK() {
		$noSPK = $this->input->post('num');
		$spk = $this->staff_model->getSPK($noSPK);
		$nama_mobil = $this->staff_model->getCarName($noSPK);
		//$mobil = $this->staff_model->getSPKCarsOn($noSPK);
		//$cust = $this -> staff_model -> getSPKCustOn($noSPK);
		foreach ($spk as $row) {
			if($row->jenis_pembayaran == "tunai") {
				echo '
				<fieldset class="formGroupBox">
                <legend class="formTitleMenu">Data SPK Lama</legend>
                <div class="formMenu">
                    <table width="800">
                        <tr>
                            <td width="200">
                                <label>Tanggal entri SPK</label>
                            </td>
                            <td>
                                <label id="customer_noKTP">'.$row->tgl_entry_spk.'</label>
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                        <tr>
                            <td>
                                <label>Nama - Tipe - Warna mobil sebelumnya</label>
                            </td>
                            <td>
                            	<label id="cust_autoname">'.$nama_mobil.' - '.$row->tipe_mobil.' - '.$row->warna_mobil_pesanan.'</label>
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                        <tr>
                            <td style="vertical-align: top;">
                                <label>Harga kendaraan tunai</label>
                            </td>
                            <td id="cust_autoadrs">
                                <label id="customer_alamat">'.$row->harga_kendaraan_tunai.'</label>
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                        <tr>
                            <td style="vertical-align: top;">
                                <label>Jumlah DP</label>
                            </td>
                            <td id="cust_autoadrs">
                                <label id="customer_alamat">'.$row->jumlah_dp.'</label>
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                        <tr>
                            <td style="vertical-align: top;">
                                <label>Booking fee</label>
                            </td>
                            <td id="cust_autoadrs">
                                <label id="customer_alamat">'.$row->booking_fee.'</label>
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                        <tr>
                            <td style="vertical-align: top;">
                                <label>Asuransi</label>
                            </td>
                            <td id="cust_autoadrs">
                                <label id="customer_alamat">'.$row->asuransi.'</label>
                            </td>
                        </tr>
                    </table>
                </div>
             </fieldset>
			';
			}
			else if($row->jenis_pembayaran == "kredit") {
			echo '
				<fieldset class="formGroupBox">
                <legend class="formTitleMenu">Data SPK Lama</legend>
                <div class="formMenu">
                    <table width="800">
                        <tr>
                            <td width="200">
                                <label>Tanggal entri SPK</label>
                            </td>
                            <td>
                                <label id="customer_noKTP">'.$row->tgl_entry_spk.'</label>
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                        <tr>
                            <td>
                                <label>Nama - Tipe - Warna mobil sebelumnya</label>
                            </td>
                            <td>
                            	<label id="cust_autoname">'.$nama_mobil.' - '.$row->tipe_mobil.' - '.$row->warna_mobil_pesanan.'</label>
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                        <tr>
                            <td style="vertical-align: top;">
                                <label>Harga kendaraan kredit</label>
                            </td>
                            <td id="cust_autoadrs">
                                <label id="customer_alamat">'.$row->harga_kendaraan_kredit.'</label>
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                        <tr>
                            <td style="vertical-align: top;">
                                <label>Angsuran</label>
                            </td>
                            <td id="cust_autoadrs">
                                <label id="customer_alamat">'.floor($row->harga_kendaraan_kredit/$row->lama_angsuran).' x '.$row->lama_angsuran.'bulan</label>
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                        <tr>
                            <td style="vertical-align: top;">
                                <label>Jumlah DP</label>
                            </td>
                            <td id="cust_autoadrs">
                                <label id="customer_alamat">'.$row->jumlah_dp.'</label>
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                        <tr>
                            <td style="vertical-align: top;">
                                <label>Booking fee</label>
                            </td>
                            <td id="cust_autoadrs">
                                <label id="customer_alamat">'.$row->booking_fee.'</label>
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                        <tr>
                            <td style="vertical-align: top;">
                                <label>Asuransi</label>
                            </td>
                            <td id="cust_autoadrs">
                                <label id="customer_alamat">'.$row->asuransi.'</label>
                            </td>
                        </tr>
                    </table>
                </div>
             </fieldset>
			';
			}
		}
	}

	function cekSPK() {
		$noSPK = $this->input->post('num');
		$result = $this->staff_model->cekSPK($noSPK);
		if($result) {
			foreach($result as $row) {
				if($row->idEmp != NULL) {
					$user = $this->staff_model->getUser($row->idEmp);
					foreach ($user as $row) {
						echo "Nomor SPK ini telah didaftarkan oleh Sales bernama: ".$row->namaEmp.".";
					}
				}
				else {
					if($row->tahap == "0") {
					echo "Nomor SPK ini belum membayar booking fee.";
					}
					else if($row->tahap == "1") {
						echo "Nomor SPK ini dapat diproses.";
					}
					else if($row->tahap == "2") {
						echo "Nomor SPK ini telah diproses.";
					}
				}
			}
		}
		else {
			echo "Nomor SPK tidak terdaftar.";
		}
	}

	function cekSPK_2($noSPK) {
		$result = $this->staff_model->cekSPK($noSPK);
		if($result) {
			foreach($result as $row) {
				if($row->tahap == "0") {
					return false;
				}
				else if($row->tahap == "1") {
					return true;
				}
				else if($row->tahap == "2") {
					return false;
				}
			}
		}
		else {
			return false;
		}
	}

	function getTele() {
		$id = $this->input->post('idcust');
		$result = $this -> staff_model -> getTele($id);
		foreach($result as $row) { echo '<input type="text" name="customer_telp" value="'.$row->kontak_customer.'" placeholder="Masukkan Nomor Telepon" size="50"/>'; }
	}

	function getAddress() {
		$id = $this->input->post('idcust');
		$result = $this -> staff_model -> getAdrs($id);
		foreach($result as $row) { echo '<textarea rows="4" name="customer_alamat" id="cust_autoadrs" cols="38" style="resize: none;" placeholder="Masukan Alamat">'.$row->alamat_customer.'</textarea>'; }
	}

	function getZipCode() {
		$id = $this->input->post('idcust');
		$result = $this -> staff_model -> getZip($id);
		foreach($result as $row) { echo '<input type="text" name="customer_zipcode" value="'.$row->kode_pos.'" placeholder="Masukan Kode Pos" size="50"/>'; }
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

	function insertCatalog() {
      	$this->load->library('form_validation');
	  	// field name, error message, validation rules
	  	$this->form_validation->set_rules('modelname', 'Nama model', 'trim|required|min_length[3]|xss_clean');
        $this->form_validation->set_rules('periode', 'Periode', 'trim|required|xss_clean');

        if($this->form_validation->run() == FALSE)
	  	{
	   		$this->insert_catalog();
	  	}
	  	else
	  	{
	  		$this->staff_model->insert3D();
			$this->staff_model->insertType();
	   		$this->staff_model->insertCatalog();
		}
	}

    function insertWarna() {
      	$this->load->library('form_validation');
	  	// field name, error message, validation rules
	  	$this->form_validation->set_rules('nama_warna', 'Nama Warna', 'trim|required|min_length[3]|xss_clean');
        $this->form_validation->set_rules('kode_warna', 'Kode Warna', 'trim|required|xss_clean');

        if($this->form_validation->run() == FALSE)
	  	{
	   		$this->insert_warna();
	  	}
	  	else
	  	{
			$this->staff_model->insertColor();
	  	}
	}


	function insertDetilHarga() {
      	$this->load->library('form_validation');
	  	// field name, error message, validation rules
	  	$this->form_validation->set_rules('perdp', 'Persentase DP', 'trim|required|xss_clean');
        $this->form_validation->set_rules('hargaTunai', 'Harga Tunai', 'trim|required|xss_clean');
	  	$this->form_validation->set_rules('angsur', 'Angsuran', 'trim|required|xss_clean');
        $this->form_validation->set_rules('hkredit', 'Harga Kredit', 'trim|required|xss_clean');
        $this->form_validation->set_rules('hap', 'Harga Angsuran per Bulan', 'trim|required|xss_clean');

		if($this->form_validation->run() == FALSE)
	  	{
	   		$this->detilHarga();
	  	}
	  	else
	  	{
	  		$this->staff_model->insertDetilHarga();
	  	}
	}


    function deleteWarna() {
        $car_name = $this->uri->segment(3);
        $car_color = $this->uri->segment(4);
        $this->staff_model->deleteWarna($car_name, $car_color);
	}

	function show_catalog() {
        $id = $this->uri->segment(3);
        $this->staff_model->showCatalog($id);
	}

	function hide_catalog() {
        $id = $this->uri->segment(3);
        $this->staff_model->hideCatalog($id);
	}

	function updateCatalog() {
      	$this->load->library('form_validation');
	  	// field name, error message, validation rules
	  	$this->form_validation->set_rules('modelname', 'Nama model', 'trim|required|min_length[3]|xss_clean');
        $this->form_validation->set_rules('periode', 'Periode', 'trim|required|xss_clean');

          if($this->form_validation->run() == FALSE)
	  	{
	   		$this->update_catalog();
	  	}
	  	else
	  	{
			$this->staff_model->updateColor();
			$this->staff_model->updateCatalog();
	  	}
	}

	function updateDetailCatalog() {
      	$this->load->library('form_validation');

	  	//$this->form_validation->set_rules('tipe_mobil[]', 'Tipe Mobil', 'trim|required|min_length[3]|xss_clean');
        //$this->form_validation->set_rules('tempupload[]', 'Upload brosur', 'trim|required|xss_clean');
        //if($this->form_validation->run() == FALSE)
	  	//{
	   	//	$this->detail_katalog($this->input->post('id_katalog'));
	  	//}
	  	//else
	  	//{
	   		$this->staff_model->updateDetailCatalog();
	  	//}
	}

	function insertSPK() {
		$session_data = $this->session->userdata('logged_in');

      	$this->load->library('form_validation');
	  	// field name, error message, validation rules
	  	$this->form_validation->set_rules('noSPK', 'Nomor SPK', 'trim|required|xss_clean');
		$this->form_validation->set_rules('customer_noKTP', 'Nomor KTP', 'trim|required|xss_clean');
		$this->form_validation->set_rules('customer_nama', 'Nama customer', 'trim|required|xss_clean');
		$this->form_validation->set_rules('customer_telp', 'Nomor telepon', 'trim|required|xss_clean');
		$this->form_validation->set_rules('customer_alamat', 'Alamat', 'trim|required|xss_clean');
		$this->form_validation->set_rules('customer_zipcode', 'Kode pos', 'trim|required|xss_clean');
		$this->form_validation->set_rules('customer_noNPWP', 'Nomor NPWP', 'trim|xss_clean');
		$this->form_validation->set_rules('namaMobil', 'Nama mobil', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tipeMobil', 'Tipe mobil', 'trim|required|xss_clean');
		$this->form_validation->set_rules('warnaMobil', 'Warna mobil', 'trim|required|xss_clean');

		if($this->form_validation->run() == FALSE)
	  	{
	   		$this->insert_spk();
	  	}
	  	else
	  	{
	  		if(!$this->cekSPK_2(($this->input->post('noSPK')))) {
	  			$this->session->set_flashdata('info','<div class="message error"><h5>Error!</h5>Nomor SPK ini tidak dapat diproses.</div>');
				redirect("index.php/sales_site/insertSPK");
	  		}
			else {
				$this->staff_model->insertSPK($session_data['username']);
			}
	  	}
	}

	function updateSPK() {
		$session_data = $this->session->userdata('logged_in');

      	$this->load->library('form_validation');
	  	// field name, error message, validation rules
	  	$this->form_validation->set_rules('noSPK', 'Nomor SPK', 'trim|required|xss_clean');
		$this->form_validation->set_rules('namaMobil', 'Nama mobil', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tipeMobil', 'Tipe mobil', 'trim|required|xss_clean');
		$this->form_validation->set_rules('warnaMobil', 'Warna mobil', 'trim|required|xss_clean');

	  	if($this->form_validation->run() == FALSE)
	  	{
	   		$this->update_spk();
	  	}
	  	else
	  	{
	   		$this->staff_model->updateSPK($session_data['username']);
	  	}
	}

	function printSPK() {
      	$this->staff_model->printSPK();
	}
	// end function
}
?>
