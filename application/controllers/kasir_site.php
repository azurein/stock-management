<?php
class Kasir_site extends CI_Controller {

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
		if($this->staff_model->isKasir($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['nav1'] = "";
			$data['nav2'] = "pembayaran";

			$data['nav4'] = "penerimaan_pembayaran_tagihan";
			$data['conf_link'] = "config";
			$data['title'] = "Kasir Toyota - Deskripsi Pekerjaan";
			$data['posisi'] = $session_data['posisi'];
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('kasir-nav', $data);
			$this -> load -> view('kasir-content-job_desc', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function pembayaran() {
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isKasir($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['namaMobil'] = $this -> staff_model -> getCars();
			$data['nav1'] = "job_desc";
			$data['nav2'] = "";

			$data['nav4'] = "penerimaan_pembayaran_tagihan";
			$data['conf_link'] = "config";
			$data['title'] = "Kasir Toyota - Penerimaan Pembayaran";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('kasir-nav', $data);
			$this -> load -> view('kasir-content-pembayaran', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function penerimaan_pembayaran_tagihan() {
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isKasir($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['namaMobil'] = $this -> staff_model -> getCars();
			$data['nav1'] = "job_desc";
			$data['nav2'] = "pembayaran";

			$data['nav4'] = "";
			$data['conf_link'] = "config";
			$data['title'] = "Kasir Toyota - Penerimaan Pembayaran";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('kasir-nav', $data);
			$this -> load -> view('kasir-content-ppt', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function cekSPK() {
		$noSPK = $this->input->post('num');
		$result = $this->staff_model->cekSPK($noSPK);
		if($result) {
			foreach($result as $row) {
				if($row->tahap == "2") {
					echo "Nomor SPK telah selesai diproses.";
				}
				else {
					echo "<input type='hidden' name='tahapSPK' id='tahapSPK' value='$row->tahap' />";
					$this->getTotalHarga();
					echo "Nomor SPK dapat diproses.";
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
					return true;
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

	function cekPO() {
		$noPO = $this->input->post('num');
		$result = $this->staff_model->cekPO($noPO);
		if($result) {
			echo "Nomor PO dapat diproses";
		}
		else {
			echo "Nomor PO ini tidak tercatat di DO.";
		}
	}

	function cekTagihan() {
		$noTagihan = $this->input->post('num');
		$result = $this->staff_model->cekTagihan($noTagihan);
		if($result) {
			echo "Nomor Tagihan dapat diproses";
		}
		else {
			echo "Nomor Tagihan ini tidak terdaftar.";
		}
	}

	function showPembayaran() {
		$noSPK = $this->input->post('num');
		$result = $this->staff_model->getSPK($noSPK);
		foreach($result as $row) {
			 if($row->tahap == "0")
			 {
			 	$namaMobil = $this->input->post('nama');
			 	//$tempStatus = $this->staff_model->getCarAttr('status', $noSPK);
				//$tempBookFee = $this->staff_model->getBookFee($tempStatus);

			 	echo '
			 		<fieldset class="formGroupBox">
                    <legend class="formTitleMenu"><input size="40" name="keterangan" value="Pembayaran tahap 1 - Booking Fee"></legend>
                    <div class="formMenutable">
                        <table>
					 		<tr>
						 		<td>
							 		<label style="padding-right: 58px">Booking fee sebesar</label>
								 	<input type="text" readonly="readonly" class="mini" name="bookFee" id="bookFee" value="5000000" />
						 		</td>
					 		</tr>
                        </table>
                    </div>
                    </fieldset>
			 	';
			 }
			 else if($row->tahap == "2")
			 {
				if($row->jenis_pembayaran == "tunai")
				{
					$tempStatus = $this->staff_model->getCarAttr('status', $noSPK);
					if($tempStatus == "ready")
					{
						$tempTotal = $row->total_pembayaran;
						$tempBookFee = $this->staff_model->getBookFee($tempStatus);
						$tempSisa = $tempTotal - $tempBookFee;
						echo '
					 		<fieldset class="formGroupBox">
		                    <legend class="formTitleMenu"><input size="40" name="keterangan" value="Pembayaran tahap '.$row->tahap.' - Pelunasan"></legend>
		                    <div class="formMenutable">
		                        <table>
		                        	<tr>
								 		<td>
									 		<label style="padding-right: 58px">Jenis Pembayaran</label>
										 	<input type="text" readonly="readonly" class="mini" name="carStatus" id="carStatus" value="'.$row->jenis_pembayaran.'" />
								 		</td>
							 		</tr>
		                        	<tr>
								 		<td>
									 		<label style="padding-right: 58px">Status mobil</label>
										 	<input type="text" readonly="readonly" class="mini" name="carStatus" id="carStatus" value="'.$tempStatus.'" />
								 		</td>
							 		</tr>
							 		<tr>
								 		<td>
									 		<label style="padding-right: 58px">Pelunasan sebesar</label>
										 	<input type="text" readonly="readonly" class="mini" name="bookFee" id="bookFee" value="'.$tempSisa.'" />
								 		</td>
							 		</tr>
		                        </table>
		                    </div>
		                    </fieldset>
					 	';
					}
					else if($tempStatus == "indent")
					{
						echo '
					 		<fieldset class="formGroupBox">
		                    <legend class="formTitleMenu"><input size="40" name="keterangan" value="Pembayaran tahap 2 - Tanda Jadi"></legend>
		                    <div class="formMenutable">
		                        <table>
		                        	<tr>
								 		<td>
									 		<label style="padding-right: 58px">Status mobil</label>
										 	<input type="text" readonly="readonly" class="mini" name="carStatus" id="carStatus" value="'.$tempStatus.'" />
								 		</td>
							 		</tr>
							 		<tr>
								 		<td>
									 		<label style="padding-right: 58px">Booking fee sebesar</label>
										 	<input type="text" readonly="readonly" class="mini" name="bookFee" id="bookFee" value="'.$tempBookFee.'" />
								 		</td>
							 		</tr>
		                        </table>
		                    </div>
		                    </fieldset>
					 	';
					}
				}
				else if($row->jenis_pembayaran == "kredit")
				{

				}
			}
		}
	}

	function config() {
		$session_data = $this->session->userdata('logged_in');
		if($this->staff_model->isKasir($session_data['username']))
		{
			$data['results'] = $this -> staff_model -> getUser($session_data['username']);
			$data['nav1'] = "job_desc";
			$data['nav2'] = "";

			$data['nav4'] = "penerimaan_pembayaran_tagihan";
			$data['conf_link'] = "";
			$data['title'] = "Sales Toyota - Pengaturan Akun";
			$this -> load -> view('staff-header', $data);
			$this -> load -> view('kasir-nav', $data);
			$this -> load -> view('staff-content-config', $data);
			$this -> load -> view('staff-footer', $data);
		}
		else
		{
			echo '<font color="red"><h1>Error</h1>Anda tidak memiliki otorisasi untuk mengakses halaman ini.</font>';
		}
	}

	function getTotalHarga() {
		$id = $this->input->post('num');
		$result = $this->staff_model->getSPK($id);

		$harga = 0;
		$totalHarga = 0;

		foreach ($result as $row) {
			if($row->tahap == "0") {
				echo "<input type='hidden' name='totalHarga' id='totalHarga' value='10000000' />";
			}
			else if($row->tahap == "1") {
				$asuransi = $row->asuransi;
				$bookFee = $row->booking_fee;

				if($row->jenis_pembayaran == "tunai") {
					$harga = $row->harga_kendaraan_tunai;
					$totalHarga = $harga + $asuransi - $bookFee;
				}
				else if($row->jenis_pembayaran == "kredit") {
					$dp = $row->jumlah_dp;
					$totalHarga = $dp + $asuransi - $bookFee;
				}
				echo "<input type='hidden' name='totalHarga' id='totalHarga' value='$totalHarga' />";
			}
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

	function insertPembayaran() {
		$this->load->library('form_validation');
	  	// field name, error message, validation rules
	  	$this->form_validation->set_rules('noSPK', 'Nomor SPK', 'trim|required|xss_clean');
		$this->form_validation->set_rules('noKwi', 'Nomor Kwitansi', 'trim|required|xss_clean');
		$this->form_validation->set_rules('nilaiUang', 'Nilai Uang', 'trim|required|xss_clean');

		$tempBayar = $this->input->post('nilaiUang');
		$tempHarga = $this->input->post('totalHarga');

		if($this->form_validation->run() == FALSE)
	  	{
	  		$this->pembayaran();
	  	}
	  	else
	  	{
			if($this->input->post('nilaiUang') < 5000000) {
				$this->session->set_flashdata('info','<div class="message error"><h5>Error!</h5>Nilai uang tidak boleh dibawah 5 juta Rupiah.</div>');
				redirect("index.php/kasir_site/pembayaran");
			}
			else if(!$this->cekSPK_2(($this->input->post('noSPK')))) {
	  			$this->session->set_flashdata('info','<div class="message error"><h5>Error!</h5>Nomor SPK ini tidak dapat diproses.</div>');
				redirect("index.php/kasir_site/pembayaran");
	  		}
			else {
				if($this->input->post('tahapSPK') == "0") {
	  				$this->staff_model->insertPembayaran_1();
		  		}
				else if($this->input->post('tahapSPK') == "1") {
					if($tempBayar < $tempHarga) {
						$this->session->set_flashdata('info','<div class="message error"><h5>Error!</h5>Jumlah uang tidak memenuhi syarat.</div>');
						redirect("index.php/kasir_site/pembayaran");
			  		}
					else {
		  				$this->staff_model->insertPembayaran_2();
					}
		  		}
			}
		}

  	}

	function insertPPT() {
		$this->load->library('form_validation');
	  	// field name, error message, validation rules
	  	$this->form_validation->set_rules('no_tagihan', 'Nomor Tagihan', 'trim|required|xss_clean');
		$this->form_validation->set_rules('nilai_tagihan', 'Nilai Tagihan', 'trim|required|xss_clean');

	  	if($this->form_validation->run() == FALSE)
	  	{
	  		$this->penerimaan_pembayaran_tagihan();
	  	}
	  	else
	  	{
	  		$this->staff_model->insertPPT();
	  	}
	}
}
?>
