<?php
class Staff_model extends CI_Model
{
	// Start authorization
	function isAdmin($id)
	{
		$position = "";
		$result = $this->getUser($id);
		foreach($result as $row) { $position = $row->posisiEmp; }
		if($position == "administrasi") { return true; }
		else { return false; }
	}

	function isSales($id)
	{
		$position = "";
		$result = $this->getUser($id);
		foreach($result as $row) { $position = $row->posisiEmp; }
		if($position == "sales") { return true; }
		else { return false; }
	}

	function isGudang($id)
	{
		$position = "";
		$result = $this->getUser($id);
		foreach($result as $row) { $position = $row->posisiEmp; }
		if($position == "staff gudang") { return true; }
		else { return false; }
	}

	function isKasir($id)
	{
		$position = "";
		$result = $this->getUser($id);
		foreach($result as $row) { $position = $row->posisiEmp; }
		if($position == "kasir") { return true; }
		else { return false; }
	}

	function isManager($id)
	{
		$position = "";
		$result = $this->getUser($id);
		foreach($result as $row) { $position = $row->posisiEmp; }
		if($position == "manager") { return true; }
		else { return false; }
	}
	// End authorization

//SALES
	// Start SPK function
	function getSpkNum()
    {
	    //Query the data table for every record and row
	    $query = $this->db->query("SELECT no_spk FROM surat_pesanan_kendaraan");
        return $query->result();
	}

	function getCust()
    {
	    //Query the data table for every record and row
	    $query = $this->db->query("SELECT * FROM mscustomer");
        return $query->result();
	}

	function getTele($id)
    {
	    //Query the data table for every record and row
	    $query = $this->db->query("SELECT kontak_customer FROM mscustomer where no_KTP = '$id'");
        return $query->result();
	}

	function getAdrs($id)
    {
	    //Query the data table for every record and row
	    $query = $this->db->query("SELECT alamat_customer FROM mscustomer where no_KTP = '$id'");
        return $query->result();
	}

	function getZip($id)
    {
	    //Query the data table for every record and row
	    $query = $this->db->query("SELECT kode_pos FROM mscustomer where no_KTP = '$id'");
        return $query->result();
	}

	function getCarName($noSPK)
    {
	    //Query the data table for every record and row
	    $query = "SELECT nama_mobil FROM katalog WHERE
		    id_katalog =
		    (
		    	SELECT id_katalog FROM detil_katalog WHERE
		    	tipe_mobil =
		    	(
		    		SELECT tipe_mobil FROM surat_pesanan_kendaraan WHERE no_spk = '$noSPK'
		    	)
		    )
	    ";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result) or die(mysql_error());
		return $row['nama_mobil'];
	}

	function getCarType($noSPK)
    {
	    //Query the data table for every record and row
	    $query = "SELECT tipe FROM detil_katalog WHERE
	    	kode_mobil =
		    (
		    	SELECT kode_mobil FROM surat_pesanan_kendaraan WHERE no_spk = '$noSPK'
		    )
	    ";
        $result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result) or die(mysql_error());
		return $row['tipe'];
	}

	function getCarColor($noSPK)
    {
	    //Query the data table for every record and row
	    $query = "SELECT warna_kendaraan_pesanan FROM surat_pesanan_kendaraan where no_spk like '$noSPK'";
        $result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result) or die(mysql_error());
		return $row['warna_kendaraan_pesanan'];
	}

	function getKodeMobil($nama, $tipe)
	{
		$query = "SELECT kode_mobil FROM detil_katalog where tipe = '$tipe' AND
	    	id_katalog =
		    (
		    	SELECT id_katalog FROM katalog WHERE nama_mobil like '$nama'
		    )
	    ";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result) or die(mysql_error());
		return $row['kode_mobil'];
	}

	function getDetilHarga($tipe) {
	    $query = $this->db->query("SELECT * FROM detil_harga");
        return $query->result();
	}

	function getDetilHarga_1($tipe) {
	    $query = $this->db->query("SELECT * FROM detil_harga where tipe_mobil = '$tipe' LIMIT 1");
        return $query->result();
	}

	function getDetilHarga_2($tipe) {
	    $query = $this->db->query("SELECT lama_angsuran, harga_kredit FROM detil_harga where tipe_mobil = '$tipe'");
        return $query->result();
	}

	function getPpOn($id) {
	    $query = $this->db->query("SELECT * FROM penerimaan_pembayaran where no_spk = '$id'");
        return $query->result();
	}

	function calculatePpOn($id) {
	    $query = $this->db->query("SELECT SUM( nilai_uang ) AS jumlah FROM penerimaan_pembayaran WHERE no_spk = '$id'");
        $result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result) or die(mysql_error());
		return $row['jumlah'];
	}

	function getDetilHargaOn($tipe, $bulan) {
		$query = $this->db->query("SELECT * FROM detil_harga where tipe_mobil = '$tipe' AND lama_angsuran = '$bulan'");
        return $query->result();
	}


	function insertSPK($id)
	{
		// insert customer or update if there's changes
		if($this->cekCust($this->input->post('customer_noKTP')) == false) {
			$data = array(
				'no_KTP'=> $this->input->post('customer_noKTP'),
			    'nama_customer'=> $this->input->post('customer_nama'),
				'kontak_customer'=> $this->input->post('customer_telp'),
				'alamat_customer'=> $this->input->post('customer_alamat'),
				'kode_pos'=> $this->input->post('customer_zipcode'),
				'NPWP'=> $this->input->post('customer_noNPWP'),
			);
			$this->db->insert("mscustomer", $data);
		}
		else if($this->cekCust($this->input->post('customer_noKTP')) == true) {
			$this->db->where('no_KTP', $this->input->post('customer_noKTP'));
			$data = array(
				'no_KTP'=> $this->input->post('customer_noKTP'),
			    'nama_customer'=> $this->input->post('customer_nama'),
				'kontak_customer'=> $this->input->post('customer_telp'),
				'alamat_customer'=> $this->input->post('customer_alamat'),
				'kode_pos'=> $this->input->post('customer_zipcode'),
				'NPWP'=> $this->input->post('customer_noNPWP'),
			);
			$this->db->update("mscustomer", $data);
		}

		// insert SPK
		$this->db->where('no_spk', $this->input->post('noSPK'));
		$data = array(
			'warna_mobil_pesanan'=> $this->input->post('warnaMobil'),//
			'tipe_mobil'=> $this->input->post('tipeMobil'),//
		    'no_ktp'=> $this->input->post('customer_noKTP'),//
			'jenis_pembayaran'=> $this->input->post('jenis'),//
			'jumlah_dp'=> $this->input->post('jumlahDP'),//
			'asuransi'=> $this->input->post('tempAsuransi'),//
			'tgl_entry_spk'=> gmdate("Y-m-d H:i:s", time()+60*60*7),//
			'idEmp'=> $id,//
		);
		$this->db->update("surat_pesanan_kendaraan", $data);

		if($this->input->post('booking_fee') == '5') {
			$this->db->where('no_spk', $this->input->post('noSPK'));
			$data = array(
				'booking_fee'=> '5000000'
			);
			$this->db->update("surat_pesanan_kendaraan", $data);
		}
		else if($this->input->post('booking_fee') == '10') {
			$this->db->where('no_spk', $this->input->post('noSPK'));
			$data = array(
				'booking_fee'=> '10000000'
			);
			$this->db->update("surat_pesanan_kendaraan", $data);
		}

		if($this->input->post('jenis') == 'tunai') {
			$this->db->where('no_spk', $this->input->post('noSPK'));
			$data = array(
				'harga_kendaraan_tunai'=>$this->input->post('harga'),//
			);
			$this->db->update("surat_pesanan_kendaraan", $data);
		}
		else if($this->input->post('jenis') == 'kredit') {
			$this->db->where('no_spk', $this->input->post('noSPK'));
			$data = array(
				'lama_angsuran'=> $this->input->post('lama_cicilan'),//
				'harga_kendaraan_kredit'=>$this->input->post('harga'),//
				'id_leasing'=> $this->input->post('leasing'),//
			);
			$this->db->update("surat_pesanan_kendaraan", $data);
		}

		$this->db->where('no_spk', $this->input->post('noSPK'));
		$data = array(
			'tahap' => '1',//
		);
		$this->db->update('surat_pesanan_kendaraan', $data);

		$tempSPK = $this->input->post('noSPK');
		$this->session->set_flashdata('info','<div class="message info"><h5>Success!</h5>Surat Pesanan Kendaraan '.$tempSPK.' telah di tambahkan.</div>');
		redirect("index.php/sales_site/insert_spk");
	}
	// End SPK function

	function updateSPK($id)
	{
		// auto unplot
		//Query the data table for every record and row
	    $this->db->where('no_spk', $this->input->post('noSPK'));
		$data1 = array(
			'status_mobil'=> 'ready',//
		);
		$this->db->update("mobil", $data1);

		/*
		$data2 = array(
			'tgl_history_spk'=> gmdate("Y-m-d H:i:s", time()+60*60*7),//
			'no_spk_lama'=> $this->input->post('noSPK'),
			'tgl_entri_spk_lama'=> $this->input->post('noSPK'),
			'tipe_mobil_pesanan_lama'=> $this->input->post('tipeMobil'),//
			'warna_mobil_pesanan_lama'=> $this->input->post('warnaMobil'),//
			'asuransi_lama'=> $this->input->post('premiAsuransi'),//
			'harga_kendaraan_tunai_lama'=>$this->input->post('hargaTunai'),//
			'harga_kendaraan_kredit_lama'=>$this->input->post('angsuranPerBulan'),//
			'jumlah_dp_lama'=> $this->input->post('jumlahDP'),//
			'lama_angsuran_lama'=> $this->input->post('lama_cicilan'),//
			'jenis_pembayaran_lama'=> $this->input->post('jenis'),//
			'booking_fee_lama'=> $this->input->post('booking_fee'),//
			'lama_angsuran_lama'=> $this->input->post('lama_cicilan'),//
		);
		$this->db->insert("history_spk", $data2);
		 */

		$tempSPK = $this->input->post('noSPK');
		// update SPK new spk
		$this->db->where('no_spk', $this->input->post('noSPK'));
		$data3 = array(
			'warna_mobil_pesanan'=> $this->input->post('warnaMobil'),//
			'tipe_mobil'=> $this->input->post('tipeMobil'),//
			'jenis_pembayaran'=> $this->input->post('jenis'),//
			'booking_fee'=> $this->input->post('booking_fee'),//
			'harga_kendaraan_tunai'=>$this->input->post('hargaTunai'),//
			'harga_kendaraan_kredit'=>$this->input->post('angsuranPerBulan'),//
			'jumlah_dp'=> $this->input->post('jumlahDP'),//
			'lama_angsuran'=> $this->input->post('lama_cicilan'),//
			'asuransi'=> $this->input->post('premiAsuransi'),//
			'tgl_entry_spk'=> gmdate("Y-m-d H:i:s", time()+60*60*7),//
		);
		$this->db->update("surat_pesanan_kendaraan", $data3);

		$tempSPK = $this->input->post('noSPK');
		$this->session->set_flashdata('info','<div class="message info"><h5>Success!</h5>Surat Pesanan Kendaraan '.$tempSPK.' telah di diubah.</div>');
		redirect("index.php/sales_site/job_desc");
	}

	// Start catalog function
	function getCatalog()
	{
		$query = $this->db->query("SELECT * FROM katalog");
		return $query->result();
	}

	function getCatalogOnName($app_attr)
	{
		$query = $this->db->query("SELECT * FROM katalog where nama_mobil = '$app_attr'");
		return $query->result();
	}

	function getCatalogOnId($app_attr)
	{
		$query = $this->db->query("SELECT * FROM katalog where id_katalog = '$app_attr'");
		return $query->result();
	}

	function getWarnaOnName($car_name)
	{
		$query = $this->db->query("SELECT * FROM warna where nama_mobil = '$car_name'");
		return $query->result();
	}
	// End catalog function

	// Start insert car function
	function getDetailCatalogOnId($app_attr)
	{
		$query = $this->db->query("SELECT * FROM detil_katalog where id_katalog = '$app_attr'");
		return $query->result();
	}

	function getCatalogDetail()
	{
		$query = $this->db->query("SELECT * FROM detil_katalog");
		return $query->result();
	}

	function getCatalogDetailOn($tipe)
	{
		$query = "	SELECT DISTINCT detil_katalog.*, harga_tunai, persentase_dp, harga_asuransi_pertahun, lama_angsuran
					FROM detil_katalog
					JOIN detil_harga
					ON detil_katalog.tipe_mobil = detil_harga.tipe_mobil
					WHERE detil_katalog.tipe_mobil = '$tipe' LIMIT 1";
		$query = $this->db->query($query);
		return $query->result();
	}

	/*
	function getCatalogDetailOn($id, $tipe)
	{
		$query = $this->db->query("SELECT * FROM detil_katalog where id_katalog = '$id' AND tipe_mobil = '$tipe'");
		return $query->result();
	}
	*/

	//$id, $tipe
	//where id_katalog = '$id' AND tipe_mobil = '$tipe'
	// End insert car function

	// Start insert car function
	/*
	function do_upload_car()
	{
		$path = 'staff_site_files/images/cars/';

		if(isset($_FILES['image1']) === true) {
			$files = $_FILES['image1'];
			for ($i=0 ; $i<count($files['name']) ; $i++) {
				$name = $files['name'][$i];
				$tmp_name = $files['tmp_name'][$i];
				move_uploaded_file($tmp_name, $path.$name);
			}
		}

		if(isset($_FILES['image2']) === true) {
			$files = $_FILES['image2'];
			for ($i=0 ; $i<count($files['name']) ; $i++) {
				$name = $files['name'][$i];
				$tmp_name = $files['tmp_name'][$i];
				move_uploaded_file($tmp_name, $path.$name);
			}
		}

		if(isset($_FILES['image3']) === true) {
			$files = $_FILES['image3'];
			for ($i=0 ; $i<count($files['name']) ; $i++) {
				$name = $files['name'][$i];
				$tmp_name = $files['tmp_name'][$i];
				move_uploaded_file($tmp_name, $path.$name);
			}
		}

		if(isset($_FILES['image4']) === true) {
			$files = $_FILES['image4'];
			for ($i=0 ; $i<count($files['name']) ; $i++) {
				$name = $files['name'][$i];
				$tmp_name = $files['tmp_name'][$i];
				move_uploaded_file($tmp_name, $path.$name);
			}
		}

		if(isset($_FILES['image5']) === true) {
			$files = $_FILES['image5'];
			for ($i=0 ; $i<count($files['name']) ; $i++) {
				$name = $files['name'][$i];
				$tmp_name = $files['tmp_name'][$i];
				move_uploaded_file($tmp_name, $path.$name);
			}
		}
	}
	 *
	 */

	function addWarna()
	{
		$data = array(
		    'kode_warna'=> $this->input->post('modelname'),
		    'nama_warna'=> 'staff_site_files/images/cars/'.$this->input->post('tempImage1'),
			'id_mobil'=> 'staff_site_files/images/cars/'.$this->input->post('tempImage2'),
		);
		$this->db->insert("katalog", $data);
	}

	function insertCatalog()
	{
		$idkatalog = $this->lastCatalog();
		$nama = str_replace(" ", "-", $this->input->post('modelname'));
		$nama2 = $this->input->post('modelname');
		$data = array(
			'id_katalog'=> $idkatalog,
		    'nama_mobil'=> $nama,
            'periode'=> $this->input->post('periode'),
            'gambar_logo'=> 'staff_site_files/images/cars/'.$this->input->post('tempImage0'),
		    'gambar_depan'=> 'staff_site_files/images/cars/'.$this->input->post('tempImage1'),
			'gambar_dasbor'=> 'staff_site_files/images/cars/'.$this->input->post('tempImage3'),
			'gambar_kursi'=> 'staff_site_files/images/cars/'.$this->input->post('tempImage4'),
			'gambar_bagasi'=> 'staff_site_files/images/cars/'.$this->input->post('tempImage5'),
			'gambar_spidometer'=> 'staff_site_files/images/cars/'.$this->input->post('tempImage2'),
			'status'=> 'ditampilkan',
		);
		$this->db->insert("katalog", $data);

        $this->session->set_flashdata('info','<div class="message info"><h5>Success!</h5>Catalog Mobil dengan model '.$nama2.' telah di tambahkan.</div>');
		redirect("index.php/sales_site/catalog");
	}

	function lastIndexOf($string, $item){
	    $index=strpos(strrev($string),strrev($item));
	    if ($index){
	        $index=strlen($string)-strlen($item)-$index;
	        return $index;
	    }
	        else
	        return -1;
	}

	function lastCatalog(){
	    $query = "SELECT COUNT( id_katalog ) +1 as id_katalog FROM katalog";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result) or die(mysql_error());
		return $row['id_katalog'];
	}

	function getIdKatalog($name)
	{
		$query = "SELECT id_katalog FROM katalog where nama_mobil = '$name'";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result) or die(mysql_error());
		return $row['id_katalog'];
	}


	function insert3d()
	{
		$id_katalog = $this->lastCatalog();
		for($i=1 ; $i<=50 ; $i++) {
			$nama = str_replace(" ", "-", $this->input->post('modelname'));
			$periode = $this->input->post('periode');
			$finalNama = substr($nama, $this->lastIndexOf($nama, "-")+1);
			$data = array(
				'id_katalog'=> $id_katalog,
	            'gambar'=> 'staff_site_files/images/3d/Toyota_'.$finalNama.'_US_SE_'.$periode.'_360_720_50-'.$i.'.jpg',
				'nama_mobil'=> $nama,
			);
			$this->db->insert("tiga_d", $data);
		}
	}

	function insertType()
	{
		$id_katalog = $this->lastCatalog();
		$tipe = $_POST['tipe'];
		$transmisi = $_POST['transmisi'];
		foreach( $tipe as $key => $n ) {
			$data = array(
				'id_katalog'=> $id_katalog,
				'tipe_mobil'=> $n.$transmisi,
			);
			$this->db->insert("detil_katalog", $data);
		}
	}
	// End insert car function

	// Update car and color function
	function updateCatalog()
	{
		$this->db->where('id_katalog', $this->input->post('id_katalog'));
		$data = array(
			'nama_mobil' => $this->input->post('modelname'),
			'periode' => '2',
			'gambar_logo' => 'staff_site_files/images/cars/'.$this->input->post('tempImage0'),
			'gambar_depan' => 'staff_site_files/images/cars/'.$this->input->post('tempImage1'),
			'gambar_dasbor' => 'staff_site_files/images/cars/'.$this->input->post('tempImage2'),
			'gambar_kursi' => 'staff_site_files/images/cars/'.$this->input->post('tempImage3'),
			'gambar_bagasi' => 'staff_site_files/images/cars/'.$this->input->post('tempImage4'),
			'gambar_spidometer' => 'staff_site_files/images/cars/'.$this->input->post('tempImage5'),
			'status' => '2',
		);
		$this->db->update('katalog', $data);

		$tempName = $this->input->post('modelname');
		$this->session->set_flashdata('info','<div class="message info"><h5>Success!</h5>Catalog Mobil '.$tempName.' telah diubah datanya.</div>');
		redirect("index.php/sales_site/catalog");
	}

    function deleteWarna($model, $warna)
	{
        $warna2 = str_replace("-", " ", $warna);
		$this->db->where('nama_mobil', $model);
		$this->db->where('nama_warna', $warna);
		$this->db->delete('warna');

        $this->session->set_flashdata('info','<div class="message info"><h5>Success!</h5>Warna '.$warna2.' telah dihapus.</div>');
		redirect("index.php/sales_site/warna/$model");
	}

	function showCatalog($id)
	{
		$this->load->database();
		$data = array(
          'status'=> 'ditampilkan',
        );
		$this->db->where('id_katalog',$id);
		$this->db->update('katalog',$data);

        $this->session->set_flashdata('info','<div class="message info"><h5>Success!</h5>Catalog Mobil dengan '.$id.' telah ditampilkan.</div>');
		redirect("index.php/sales_site/catalog");
	}

	function hideCatalog($id)
	{
		$this->load->database();
		$data = array(
          'status'=> 'disembunyikan',
        );
		$this->db->where('id_katalog',$id);
		$this->db->update('katalog',$data);

        $this->session->set_flashdata('info','<div class="message info"><h5>Success!</h5>Catalog Mobil dengan '.$id.' telah disembunyikan.</div>');
		redirect("index.php/sales_site/catalog");
	}

	function updateColor()
	{
		$tempModelName = $this->input->post('modelname');
		$this->db->query("DELETE FROM warna WHERE nama_mobil = '$tempModelName'");
		$tempCount = $this->input->post('modelname');
		$kode = $_POST['kode'];
		$warna = $_POST['warna'];
		foreach( $kode as $key => $n ) {
			$data = array(
				'kode_warna'=> $n,
				'nama_warna'=> $warna[$key],
				'nama_mobil'=> $this->input->post('modelname'),
			);
			$this->db->insert("warna", $data);
		}
	}
	// end update car and color function

	// update type
	function do_upload_brochure()
	{
		$path = 'staff_site_files/brosur/';

		if(isset($_FILES['upload[]']) === true) {
			$files = $_FILES['upload[]'];
			for ($i=0 ; $i<count($files['name']) ; $i++) {
				$name = $files['name'][$i];
				$tmp_name = $files['tmp_name'][$i];
				move_uploaded_file($tmp_name, $path.$name);
			}
		}
	}

	function updateDetailCatalog()
	{
		$this->do_upload_brochure();
		$tempIdKatalog = $this->input->post('id_katalog');
		$this->db->query("DELETE FROM detil_katalog WHERE id_katalog = '$tempIdKatalog'");
		$tipe = $_POST['tipe_mobil'];
		foreach( $tipe as $key => $n ) {
			$data = array(
				'id_katalog' => $this->input->post('id_katalog'),
				'tipe_mobil'=> $n,
			);
			$this->db->insert("detil_katalog", $data);
		}
		for ($i=1; $i <= $this->post->input('row_count') ; $i++) {
			$this->db->where('id_katalog', $this->input->post('id_katalog'));
			$data = array(
				'brosur'=> 'staff_site_files/brosur/'.$upload.$i,
			);
			$this->db->update("detil_katalog", $data);
		}
	}
	// end update type

//SALES

//KASIR
	// new pembayaran
	function getTotalBayar()
	{
		$query = "SELECT $attr FROM mobil a, surat_pesanan_kendaraan b WHERE
		a.kode_mobil = b.kode_mobil AND
		warna_mobil = warna_kendaraan_pesanan AND
		b.no_spk = '$noSPK' AND
		status NOT LIKE 'defect' AND status NOT LIKE 'booked'";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result) or die(mysql_error());
		return $row[$attr];
	}

	function insertPembayaran_1()
	{
		$tempID = $this->input->post('noSPK');
		// insert ke PP
		$data = array(
		    'no_spk'=> $this->input->post('noSPK'),
		    'no_kwitansi'=> $this->input->post('noKwi'),
		    'nilai_uang'=> $this->input->post('nilaiUang'),
		    'tgl_penerimaan_pembayaran'=> gmdate("Y-m-d H:i:s", time()+60*60*7),
		);
		$this->db->insert("penerimaan_pembayaran", $data);

		// update spk status menuju tahap 1
		$this->db->where('no_spk', $this->input->post('noSPK'));
		$data = array(
			'tahap' => '1',
		);
		$this->db->update('surat_pesanan_kendaraan', $data);

		$tempBayar = $this->input->post('nilaiUang');
		$tempHarga = $this->input->post('totalHarga');
		$this->session->set_flashdata('info','<div class="message info"><h5>Success!</h5>Penerimaan Pembayaran untuk ID SPK '.$tempID.' telah ditambahkan.</div>');
		redirect("index.php/kasir_site/pembayaran/");
	}

	function insertPembayaran_2()
	{
		$tempID = $this->input->post('noSPK');
		// insert ke PP
		$data = array(
		    'no_spk'=> $this->input->post('noSPK'),
		    'no_kwitansi'=> $this->input->post('noKwi'),
		    'nilai_uang'=> $this->input->post('totalHarga'),
		    'tgl_penerimaan_pembayaran'=> gmdate("Y-m-d H:i:s", time()+60*60*7),
		);
		$this->db->insert("penerimaan_pembayaran", $data);

		// update spk status menuju tahap 2
		$this->db->where('no_spk', $this->input->post('noSPK'));
		$data = array(
			'tahap' => '2',
		);
		$this->db->update('surat_pesanan_kendaraan', $data);

		$tempBayar = $this->input->post('nilaiUang');
		$tempHarga = $this->input->post('totalHarga');
		$exchange = $tempBayar - $tempHarga;
		$this->session->set_flashdata('info','<div class="message info"><h5>Success!</h5>Penerimaan Pembayaran untuk ID SPK '.$tempID.' telah ditambahkan. Sisa Kembalian :'.$exchange.'</div>');
		redirect("index.php/kasir_site/pembayaran/");
	}
	// end new pembayaran

	//Start insert Pembayaran
	function getSPK($noSPK)
	{
		$query = $this->db->query("SELECT * FROM surat_pesanan_kendaraan where no_spk = '$noSPK'");
        return $query->result();
	}

	function cekSPK($noSPK)
	{
		$this -> db -> select('*');
		$this -> db -> from('surat_pesanan_kendaraan');
		$this -> db -> where('no_spk = ' . "'" . $noSPK . "'");
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
		{
		  return $query->result();
		}
		else
		{
		  return false;
		}
	}

	function cekCust($noKTP)
	{
		$this -> db -> select('*');
		$this -> db -> from('mscustomer');
		$this -> db -> where('no_KTP = ' . "'" . $noKTP . "'");
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() < 1)
		{
		  return false;
		}
		return true;
	}

	function cekPO($noPO)
	{
		$this -> db -> select('*');
		$this -> db -> from('delivery_order');
		$this -> db -> where('no_purchase_order = ' . "'" . $noPO . "'");
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
		{
		  return $query->result();
		}
		else
		{
		  return false;
		}
	}

	function cekTagihan($noTagihan)
	{
		$this -> db -> select('*');
		$this -> db -> from('tagihan');
		$this -> db -> where('no_tagihan = ' . "'" . $noTagihan . "'");
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
		{
		  return $query->result();
		}
		else
		{
		  return false;
		}
	}

	function getDO($no_po)
	{
		//Query the data table for every record and row
	    $query = $this->db->query("
		SELECT a.tgl_delivery_order, b.no_rangka, b.no_mesin, d.nama_mobil, b.tipe_mobil, b.warna_mobil
		FROM delivery_order a
		JOIN mobil b ON a.no_mobil = b.no_mobil
		JOIN detil_katalog c ON b.tipe_mobil = c.tipe_mobil
                JOIN katalog d ON c.id_katalog = d.id_katalog
                WHERE no_purchase_order = '$no_po'
                AND no_purchase_order not like ''
		");
        return $query->result();
	}

	function getPO($no_tagihan)
	{
		//Query the data table for every record and row
	    $query = $this->db->query("SELECT no_purchase_order FROM tagihan WHERE no_tagihan = '$no_tagihan'");
        return $query->result();
	}

	function insertTagihan()
	{
		$tempId = $this->input->post('no_po');
		$day = array('TA', gmdate("dmy-His", time()+60*60*7));
		$IdTagihan = join("-", $day);
		// insert ke PP
		$data = array(
		    'no_tagihan'=> $IdTagihan,
		    'tgl_tagihan'=> gmdate("Y-m-d H:i:s", time()+60*60*7),
		    'no_purchase_order'=> $tempId,
		);
		$this->db->insert("tagihan", $data);

		$this->session->set_flashdata('info','<div class="message info"><h5>Success!</h5>Tagihan untuk ID PO '.$tempId.' telah ditambahkan.</div>');
		redirect("index.php/admin_site/tagihan/");
	}

	function insertPPT()
	{
		$tempId = $this->input->post('no_tagihan');
		$day = array('PT', gmdate("dmy-His", time()+60*60*7));
		$IdPPT = join("-", $day);
		// insert ke PP
		$data = array(
		    'no_penerimaan_pembayaran_tagihan'=> $IdPPT,
		    'tgl_penerimaan_pembayaran_tagihan'=> gmdate("Y-m-d H:i:s", time()+60*60*7),
		    'nilai_tagihan'=> $this->input->post('nilai_tagihan'),
		    'no_tagihan'=> $tempId,
		);
		$this->db->insert("penerimaan_pembayaran_tagihan", $data);

		$this->session->set_flashdata('info','<div class="message info"><h5>Success!</h5>Penerimaan Pembayaran Tagihan untuk Tagihan '.$tempId.' telah ditambahkan.</div>');
		redirect("index.php/kasir_site/penerimaan_pembayaran_tagihan/");
	}

	function getCars()
	{
		$query = $this->db->query("SELECT * FROM katalog");
        return $query->result();
	}

	function getCarOnId($id)
	{
		$query = $this->db->query("SELECT * FROM katalog where id_katalog = '$id'");
        return $query->result();
	}

	function getType($namaMobil)
	{
		$query = $this->db->query("SELECT tipe_mobil FROM detil_katalog where
			id_katalog =
			(
				SELECT id_katalog FROM katalog where nama_mobil = '$namaMobil'
			)
		");
        return $query->result();
	}

	function getColor($namaMobil)
	{
		$query = $this->db->query("SELECT nama_warna FROM warna where nama_mobil = '$namaMobil'");
        return $query->result();
	}

	function getCarAttr($attr, $noSPK)
	{
		$query = "SELECT $attr FROM mobil a, surat_pesanan_kendaraan b WHERE
		a.kode_mobil = b.kode_mobil AND
		warna_mobil = warna_kendaraan_pesanan AND
		b.no_spk = '$noSPK' AND
		status NOT LIKE 'defect' AND status NOT LIKE 'booked'";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result) or die(mysql_error());
		return $row[$attr];
	}

	function insertColor()
	{
		$tempCount = $this->input->post('modelname');
		$nama2 = str_replace("-", " ", $this->input->post('modelname'));
		$nama = $this->input->post('modelname');
		$data = array(
			'kode_warna'=> $this->input->post('kode_warna'),
			'nama_warna'=> $this->input->post('nama_warna'),
			'nama_mobil'=> $nama,
            'gambar_warna'=> 'staff_site_files/images/cars_color/'.$this->input->post('tempImage'),
		);
		$this->db->insert("warna", $data);
		$this->session->set_flashdata('info','<div class="message info"><h5>Success!</h5>Warna '.$this->input->post('nama_warna').' untuk model '.$nama2.' telah di tambahkan.</div>');
		redirect("index.php/sales_site/warna/$nama");
	}

	function getBookFee($status)
	{
		if($status == "ready") {
			return "5000000";
		}
		else if($status == "indent"){
			return "10000000";
		}
	}
	//End insert Pembayaran
//KASIR

//GUDANG
	//Start inspeksi function
	function getNomor()
	{
		$query = $this->db->query("SELECT no_mesin,no_rangka FROM mobil");
        return $query->result();
	}

	function getNomor_2()
	{
		$query = $this->db->query("SELECT no_mesin,no_rangka FROM mobil WHERE status_mobil not like 'sold'");
        return $query->result();
	}

	function getMesin($num)
	{
		$query = $this->db->query("SELECT no_mesin FROM mobil where no_rangka = '$num'");
        return $query->result();
	}

	function getRangka($num)
	{
		$query = $this->db->query("SELECT no_rangka FROM mobil where no_mesin = '$num'");
        return $query->result();
	}

	function getNoMobil($rangka, $mesin)
	{
		$query = "SELECT no_mobil FROM mobil where no_rangka = '$rangka' AND no_mesin = '$mesin'";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result) or die(mysql_error());
		return $row['no_mobil'];
	}

	function getNoMobilOn($rangka, $mesin) {
		$query = $this->db->query("SELECT * FROM mobil WHERE no_rangka = '$rangka' AND no_mesin = '$mesin'");
		return $query->result();
	}

	function getNoMobilPengeluaran($noMobil)
	{
		$query = $this->db->query("SELECT a.no_mobil FROM mobil a, delivery_order b WHERE a.no_mobil = b.no_mobil AND a.no_mobil = '$noMobil'");
		return $query->result();
	}

	function insertInspeksi($id)
	{
		$noRangka = $this->input->post('noRangka');
		$noMesin = $this->input->post('noMesin');
		$result = $this->getNoMobilOn($noRangka, $noMesin);

		$query = $this->db->query("SELECT * FROM mobil WHERE no_rangka = '$noRangka' AND no_mesin = '$noMesin'");

		if ( $query->num_rows() ) {
			$result = $query->result();
			foreach ($result as $row) {
				if($row->status_mobil == "mdp") {
					$data = array(
					    'id_inspeksi'=> $this->input->post('idInspeksi'),
					    'no_mobil'=> $row->no_mobil,
						'status'=> $this->input->post('inspeksi'),
						'keterangan'=> $this->input->post('keterangan'),
						'tanggal_waktu'=> gmdate("Y-m-d H:i:s", time()+60*60*7),
						'idEmp'=>$id,
						);
					$this->db->insert("inspeksi", $data);

					$this->session->set_flashdata('info','<div class="message info"><h5>Success!</h5>Mobil dengan nomor '.$row->no_mobil.' telah masuk ke gudang.</div>');
					redirect("index.php/gudang_site/inspeksi");
				}
			}
		}
		else {
			$this->session->set_flashdata('info','<div class="message error"><h5>Error!</h5>Nomor rangka dan/atau nomor mesin tidak sesuai.</div>');
			redirect("index.php/gudang_site/inspeksi");
		}
	}

	/*
	function insertInspeksi($id)
	{
		$noRangka = $this->input->post('noRangka');
		$noMesin = $this->input->post('noMesin');
		$result = $this->getNoMobilOn($noRangka, $noMesin);

		$query = $this->db->query("SELECT * FROM mobil WHERE no_rangka = '$noRangka' AND no_mesin = '$noMesin'");

		if ( $query->num_rows() ) {
			$result = $query->result();
			foreach ($result as $row) {
				if($row->status_mobil == "mdp") {
					$data = array(
				    'id_inspeksi'=> $this->input->post('idInspeksi'),
				    'no_mobil'=> $row->no_mobil,
					'status'=> $this->input->post('inspeksi'),
					'keterangan'=> $this->input->post('keterangan'),
					'tanggalwaktu'=> date("d-m-y h:i:s"),
					'idEmp'=>$id,
					);
					$this->db->insert("inspeksi", $data);

					$day = array('ST', gmdate("dmy-His", time()+60*60*7));
					$IdPenerimaan = join("-", $day);
					$data = array(
				    'no_surat_terima'=> $IdPenerimaan,
				    'idEmp'=> $id,
					'tgl_penerimaan'=> gmdate("dmy-His", time()+60*60*7),
					'no_mesin'=> $this->input->post('no_mesin'),
					'no_rangka'=> $this->input->post('no_rangka'),
					'status_terima'=>$this->input->post('inspeksi'),
					'keterangan_terima'=>$this->input->post('keterangan'),
					);
					$this->db->insert("surat_terima", $data);

					// update status mobil to readystock if normal
					if( $this->input->post('inspeksi') == "normal" )
					{
						$this->db->where('no_mobil',$tempNoMobil);
						$data = array(
							'tgl_mdp' => NULL,
							'tgl_masuk_gudang' => date("d-m-y"),
							'status' => "ready",
						);
						$this->db->update('mobil', $data);
					}
					else
					{
						$this->db->where('no_mobil',$tempNoMobil);
						$data = array(
							'status' => "defect",
						);
						$this->db->update('mobil', $data);
					}

					$this->session->set_flashdata('info','<div class="message info"><h5>Success!</h5>Mobil dengan nomor '.$row->no_mobil.' telah ditambahkan.</div>');
					redirect("index.php/gudang_site/inspeksi");
				}
				else if($row->status_mobil == "booked") {
					$result2 = $this->getNoMobilPengeluaran($row->no_mobil);
					if( mysql_num_rows($result2) > 0 ) {
						$data = array(
					    'id_inspeksi'=> $this->input->post('idInspeksi'),
					    'no_mobil'=> $row->no_mobil,
						'status'=> $this->input->post('inspeksi'),
						'keterangan'=> $this->input->post('keterangan'),
						'tanggalwaktu'=> date("d-m-y h:i:s"),
						'idEmp'=>$id,
						);
						$this->db->insert("inspeksi", $data);

						$day = array('SK', gmdate("dmy-His", time()+60*60*7));
						$IdPengeluaran = join("-", $day);
						$data = array(
					    'no_surat_keluar'=> $IdPengeluaran,
					    'idEmp'=> $id,
						'tgl_keluar'=> gmdate("dmy-His", time()+60*60*7),
						'no_mesin'=> $this->input->post('no_mesin'),
						'no_rangka'=> $this->input->post('no_rangka'),
						'status_keluar'=>$this->input->post('inspeksi'),
						'keterangan_keluar'=>$this->input->post('keterangan'),
						);
						$this->db->insert("surat_keluar", $data);

						// update status mobil to readystock if normal
						if( $this->input->post('inspeksi') == "normal" )
						{
							$this->db->where('no_mobil',$tempNoMobil);
							$data = array(
								'tgl_mdp' => NULL,
								'tgl_masuk_gudang' => date("d-m-y"),
								'status' => "ready",
							);
							$this->db->update('mobil', $data);
						}
						else
						{
							$this->db->where('no_mobil',$tempNoMobil);
							$data = array(
								'status' => "defect",
							);
							$this->db->update('mobil', $data);
						}

						$this->session->set_flashdata('info','<div class="message info"><h5>Success!</h5>Mobil dengan nomor '.$row->no_mobil.' telah dikeluarkan.</div>');
						redirect("index.php/gudang_site/inspeksi");
					}
					else {
						$this->session->set_flashdata('info','<div class="message error"><h5>Error!</h5>Mobil ini belum lunas dibayar.</div>');
						redirect("index.php/gudang_site/inspeksi");
					}
				}
			}
		}
		else {
			$this->session->set_flashdata('info','<div class="message error"><h5>Error!</h5>Nomor rangka dan/atau nomor mesin tidak sesuai.</div>');
			redirect("index.php/gudang_site/inspeksi");
		}
	}
	 *
	 */
	//End inspeksi function
//GUDANG


//ADMIN
    function getAllEmployee()
    {
	    //Query the data table for every record and row
	    $query = $this->db->query("SELECT * FROM msemployee");
        return $query->result();
	}

	function getUser($id)
    {
	    $query = $this->db->query("SELECT * FROM msemployee WHERE idEmp like '$id'");
        return $query->result();
	}

	function getLastId()
    {
	    $query = $this->db->query("SELECT MAX(idEmp) as id FROM msemployee");
        return $query->result();
	}

	function insertStaff()
	{
		$data = array(
		    'namaEmp'=> $this->input->post('name'),
		    'emailEmp'=> $this->input->post('email'),
		    'passEmp'=> $this->input->post('pass'),
			'posisiEmp'=> $this->input->post('posisi'),
		);
		$this->db->insert("msemployee", $data);
	}

	function getAllCar()
    {
	    //Query the data table for every record and row
	    $query = $this->db->query("SELECT * FROM mobil");
        return $query->result();
	}

	function printSPK() {
		$query = $this->db->query("SELECT * FROM surat_pesanan_kendaraan WHERE idEmp IS NOT NULL");
		$data = $query->result();
		$rows = array();
		foreach ($data as $row) {
			$temp = '
			<tr>
				<td width="110px">'.$row->no_spk.'</td>
				<td>'.date_format(date_create($row->tgl_entry_spk), "d/m/Y").'</td>
				<td width="90px">'.$row->tipe_mobil.'</td>
				<td width="60px">'.strtoupper($row->jenis_pembayaran).'</td>
				<td>'.$row->asuransi.'</td>
				<td width="50px">'.$row->lama_angsuran.'x</td>
				<td>'.$row->jumlah_dp.'</td>
				<td>'.$row->booking_fee.'</td>
				<td>'.$row->harga_kendaraan_tunai.'</td>
				<td>'.$row->harga_kendaraan_kredit.'</td>
			</tr>';
			$rows[] = htmlentities($temp);
		}
		$rows = implode($rows,'');
		$rows = html_entity_decode($rows);

		require_once('tcpdf/tcpdf.php');
		$pdf = new TCPDF();
		$pdf->SetTitle('Surat Pesanan Kendaraan');
		$pdf->AddPage('L');
		$html = '
		<em align="right">TOYOTA - Setiajaya Mobilindo</em><br />
		<img src="staff_site_files/images/toyota.png" width="200px">
		<br />
		<h1>Surat Pesanan Kendaraan</h1>
		<table border="1" cellpadding="5">
			<thead>
				<tr>
					<th bgcolor="yellow" align="center" width="110px">No. SPK</th>
					<th bgcolor="yellow" align="center">Tanggal</th>
					<th bgcolor="yellow" align="center" width="90px">Tipe</th>
					<th bgcolor="yellow" align="center" width="60px">Jenis</th>
					<th bgcolor="yellow" align="center">Asuransi</th>
					<th bgcolor="yellow" align="center" width="50px">Angsur</th>
					<th bgcolor="yellow" align="center">DP</th>
					<th bgcolor="yellow" align="center">Booking Fee</th>
					<th bgcolor="yellow" align="center">Tunai</th>
					<th bgcolor="yellow" align="center">Kredit</th>
				</tr>
			</thead>
			<tbody>'.$rows.'</tbody>
		</table>
		';
		$pdf->writeHTML($html);
		$pdf->Output('Surat Pesanan Kendaraan.pdf');
	}

	// booking unbooking
	function getUnbookedStock($tipe, $warna) {
		//Query the data table for every record and row
	    $query = $this->db->query("
		SELECT c.no_mobil, a.nama_mobil, c.tipe_mobil, c.warna_mobil, c.tgl_perkiraan_masuk_gudang, c.tgl_masuk_gudang
		FROM katalog a
		JOIN detil_katalog b ON a.id_katalog = b.id_katalog
		JOIN mobil c ON b.tipe_mobil = c.tipe_mobil
		WHERE c.tipe_mobil = '$tipe'
		AND c.warna_mobil = '$warna'
        AND (c.status_mobil = 'ready' OR c.status_mobil = 'mdp')
		ORDER BY c.tgl_masuk_gudang ASC
		");
        return $query->result();
	}

	function getBookedStockOn($id, $tipe, $warna) {
		//Query the data table for every record and row
	    $query = $this->db->query("
		SELECT c.no_mobil, a.nama_mobil, c.tipe_mobil, c.warna_mobil, c.tgl_perkiraan_masuk_gudang, c.tgl_masuk_gudang
		FROM katalog a
		JOIN detil_katalog b ON a.id_katalog = b.id_katalog
		JOIN mobil c ON b.tipe_mobil = c.tipe_mobil
		WHERE c.tipe_mobil = '$tipe'
		AND c.warna_mobil = '$warna'
        AND c.no_spk = '$id'
        AND c.status_mobil = 'booked'
		");
        return $query->result();
	}

	function changeToBook($idMobil, $idSPK) {
		$this->db->where('no_mobil', $idMobil);
		$data = array(
			'status_mobil' => 'booked',
			'no_spk' => $idSPK
		);
		$this->db->update('mobil', $data);

		$tempNoMobil = $idMobil;
		$this->session->set_flashdata('info','<div class="message info"><h5>Success!</h5>Mobil dengan id '.$tempNoMobil.' telah di booking.</div>');
		redirect("index.php/admin_site/book");
	}

	function changeToUnBook($idMobil, $idSPK) {
		$this->db->where('no_mobil', $idMobil);
		$data = array(
			'status_mobil' => 'ready',
			'no_spk' => ''
		);
		$this->db->update('mobil', $data);

		$tempNoMobil = $idMobil;
		$this->session->set_flashdata('info','<div class="message info"><h5>Success!</h5>Mobil dengan id '.$tempNoMobil.' telah di unbook.</div>');
		redirect("index.php/admin_site/book");
	}

	function getSPK_Status1() {
		$query = $this->db->query("
			SELECT * FROM (
				SELECT distinct c.no_spk, 'TRUE' as spk_mobil, a.nama_mobil, c.tipe_mobil, c.warna_mobil_pesanan, c.tgl_entry_spk
				FROM katalog a
				JOIN detil_katalog b ON a.id_katalog = b.id_katalog
				JOIN surat_pesanan_kendaraan c ON b.tipe_mobil = c.tipe_mobil
	            WHERE c.tahap = '1'
	            AND c.no_spk NOT IN (
					SELECT distinct c.no_spk
					FROM katalog a
					JOIN detil_katalog b ON a.id_katalog = b.id_katalog
					JOIN surat_pesanan_kendaraan c ON b.tipe_mobil = c.tipe_mobil
					JOIN mobil d ON c.no_spk = d.no_spk
		            WHERE c.tahap = '1'
					ORDER BY c.tgl_entry_spk ASC
	            )
				ORDER BY c.tgl_entry_spk ASC) a

			UNION ALL

			SELECT * FROM (
				SELECT distinct c.no_spk, 'FALSE' as spk_mobil, a.nama_mobil, c.tipe_mobil, c.warna_mobil_pesanan, c.tgl_entry_spk
				FROM katalog a
				JOIN detil_katalog b ON a.id_katalog = b.id_katalog
				JOIN surat_pesanan_kendaraan c ON b.tipe_mobil = c.tipe_mobil
				JOIN mobil d ON c.no_spk = d.no_spk
	            WHERE c.tahap = '1'
				ORDER BY c.tgl_entry_spk ASC) b
		");
        return $query->result();
	}
	// end booking unbooking


	function getSPK_Status2()
	{
		$query = $this->db->query("SELECT * FROM surat_pesanan_kendaraan WHERE tahap = '2'");
        return $query->result();
	}

	// start DO
	function getBookedStock() {
		//Query the data table for every record and row
	    $query = $this->db->query("
		SELECT c.no_mobil, c.no_rangka, c.no_mesin, a.nama_mobil, c.tipe_mobil, c.warna_mobil
		FROM katalog a
		JOIN detil_katalog b ON a.id_katalog = b.id_katalog
		JOIN mobil c ON b.tipe_mobil = c.tipe_mobil
		WHERE c.status_mobil = 'booked'
		ORDER BY c.tgl_masuk_gudang ASC
		");
        return $query->result();
	}

	function getStock() {
		//Query the data table for every record and row
	    $query = $this->db->query("
	    SELECT * FROM mobil a, surat_pesanan_kendaraan b WHERE a.no_spk = b.no_spk AND a.status_mobil not like 'sold'");
        return $query->result();
	}

	function getStock2() {
		//Query the data table for every record and row
	    $query = $this->db->query("
	    SELECT * FROM mobil a, surat_pesanan_kendaraan b WHERE a.no_spk = b.no_spk AND a.status_mobil not like 'sold' AND b.tahap = '2'");
        return $query->result();
	}

	function insertDO() {
		$day = array('DO', gmdate("dmy-His", time()+60*60*7));
		$IdDO = join("-", $day);

		$tempTipe = $this->input->post('tipemobil');

		$data = array(
			'no_delivery_order'=> $IdDO,
		  	'tgl_delivery_order'=> gmdate("Y-m-d H:i:s", time()+60*60*7),//
		  	'harga_transaksi'=> $this->input->post('harga'),
		  	'no_mobil'=> $this->input->post('tempNoMobil'),
		  	'no_purchase_order'=> $this->input->post('no_po')
		);
		$this->db->insert("delivery_order", $data);

		$this->db->where('no_mobil', $this->input->post('tempNoMobil'));
				$data = array(
					'status_mobil' => 'sold',
				);
		$this->db->update('mobil', $data);

		$this->session->set_flashdata('info','<div class="message info"><h5>Success!</h5>Delivery Order dengan ID '.$IdDO.' telah di tambahkan.</div>');
		redirect("index.php/admin_site/insert_DO");
	}
	// end DO

	function cekDO($noDO)
	{
		$this -> db -> select('*');
		$this -> db -> from('delivery_order');
		$this -> db -> where('no_delivery_order = ' . "'" . $noDO . "'");
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
		{
		  return $query->result();
		}
		else
		{
		  return false;
		}
	}

	function getCustOn($id) {
		$query = $this->db->query("
		SELECT * FROM mscustomer a
		JOIN surat_pesanan_kendaraan b ON a.no_KTP = b.no_KTP
		JOIN mobil c ON b.no_spk = c.no_spk
		JOIN delivery_order d ON c.no_mobil = d.no_mobil
		WHERE d.no_delivery_order = '$id'
		");
        return $query->result();
	}

	function getCarOn($id) {
		$query = $this->db->query("
		SELECT c.no_rangka, c.no_mesin, a.nama_mobil, c.tipe_mobil, c.warna_mobil
		FROM katalog a
		JOIN detil_katalog b ON a.id_katalog = b.id_katalog
		JOIN mobil c ON b.tipe_mobil = c.tipe_mobil
		JOIN delivery_order d ON c.no_mobil = d.no_mobil
		WHERE d.no_delivery_order = '$id'
		");
        return $query->result();
	}

	function insertFaktur() {
		$day = array('PF', gmdate("dmy-His", time()+60*60*7));
		$IdFaktur = join("-", $day);

		$tempID = $this->input->post('no_do');

		$data = array(
			'no_pengajuan_faktur'=> $IdFaktur,
			'tgl_pengajuan_faktur'=> gmdate("Y-m-d H:i:s", time()+60*60*7),//
			'no_delivery_order'=> $tempID
		);
		$this->db->insert("pengajuan_faktur", $data);

		$this->session->set_flashdata('info','<div class="message info"><h5>Success!</h5>Faktur dengan ID '.$IdFaktur.' telah di tambahkan.</div>');
		redirect("index.php/admin_site/faktur");
	}

	function insertBSTB() {
		$day = array('BSTB', gmdate("dmy-His", time()+60*60*7));
		$IdBSTB = join("-", $day);

		$tempID = $this->input->post('no_do');

		$data = array(
			'no_bukti_serah_terima_barang'=> $IdBSTB,
			'tgl_bukti_serah_terima_barang'=> gmdate("Y-m-d H:i:s", time()+60*60*7),
			'no_delivery_order'=> $tempID
		);
		$this->db->insert("bukti_serah_terima_barang", $data);

		$this->session->set_flashdata('info','<div class="message info"><h5>Success!</h5>BSTB dengan ID '.$IdBSTB.' telah di tambahkan.</div>');
		redirect("index.php/admin_site/bstb");
	}

	function insertPlat($id)
	{
		$noRangka = $this->input->post('rangka');
		$noMesin = $this->input->post('mesin');
		$query = $this->db->query("SELECT * FROM mobil WHERE no_rangka = '$noRangka' AND no_mesin = '$noMesin'");

		if ( $query->num_rows() ) {
			$result = $query->result();
			foreach ($result as $row) {
				$this->db->where('no_mobil', $row->no_mobil);
				$data = array(
					'plat_mobil' => $this->input->post('plat')
				);
				$tempNoMobil = $row->no_mobil;
				$this->db->update('mobil', $data);
				$this->session->set_flashdata('info','<div class="message info"><h5>Success!</h5>Mobil dengan Nomor '.$tempNoMobil.' Telah Ditambahkan Plat Nomor.</div>');
				redirect("index.php/admin_site/plat");
			}
		}
		else {
			$this->session->set_flashdata('info','<div class="message error"><h5>Error!</h5>Nomor rangka dan/atau nomor mesin tidak sesuai.</div>');
			redirect("index.php/admin_site/plat");
		}
	}
//ADMIN

//MANAGER

	function getAvalailableModel() {
		$query = $this->db->query("SELECT nama_mobil FROM katalog where status = 'ditampilkan'");
        return $query->result();
	}

	function loadSalesReport_Tunai($awal, $akhir) {
		$query = $this->db->query("
			SELECT a.nama_mobil, b.tipe_mobil, b.warna_mobil_pesanan, e.tgl_bukti_serah_terima_barang, d.harga_transaksi
			FROM katalog a
			JOIN detil_katalog z ON a.id_katalog = z.id_katalog
			JOIN surat_pesanan_kendaraan b ON z.tipe_mobil = b.tipe_mobil
			JOIN mobil c ON b.no_spk = c.no_spk
			JOIN delivery_order d ON c.no_mobil = d.no_mobil
			JOIN bukti_serah_terima_barang e ON d.no_delivery_order = e.no_delivery_order
			WHERE e.tgl_bukti_serah_terima_barang between '$awal' and '$akhir' AND b.jenis_pembayaran = 'tunai'
		");
        return $query->result();
	}

	function loadSalesReport_Tunai_2($awal, $akhir, $model) {
		$query = $this->db->query("
			SELECT a.nama_mobil, b.tipe_mobil, b.warna_mobil_pesanan, e.tgl_bukti_serah_terima_barang, d.harga_transaksi
			FROM katalog a
			JOIN detil_katalog z ON a.id_katalog = z.id_katalog
			JOIN surat_pesanan_kendaraan b ON z.tipe_mobil = b.tipe_mobil
			JOIN mobil c ON b.no_spk = c.no_spk
			JOIN delivery_order d ON c.no_mobil = d.no_mobil
			JOIN bukti_serah_terima_barang e ON d.no_delivery_order = e.no_delivery_order
			WHERE e.tgl_bukti_serah_terima_barang between '$awal' and '$akhir' AND
			a.nama_mobil = '$model' AND b.jenis_pembayaran = 'tunai'
		");
        return $query->result();
	}

	function loadSalesReport_Kredit($awal, $akhir) {
		$query = $this->db->query("
			SELECT a.nama_mobil, b.tipe_mobil, b.warna_mobil_pesanan, e.tgl_bukti_serah_terima_barang, d.harga_transaksi, b.lama_angsuran, g.nama_leasing
			FROM katalog a
			JOIN detil_katalog z ON a.id_katalog = z.id_katalog
			JOIN detil_harga f ON z.tipe_mobil = f.tipe_mobil
			JOIN msleasing g ON f.id_leasing = g.id_leasing
			JOIN surat_pesanan_kendaraan b ON z.tipe_mobil = b.tipe_mobil
			JOIN mobil c ON b.no_spk = c.no_spk
			JOIN delivery_order d ON c.no_mobil = d.no_mobil
			JOIN bukti_serah_terima_barang e ON d.no_delivery_order = e.no_delivery_order
			WHERE b.jenis_pembayaran = 'kredit' AND b.id_leasing = g.id_leasing AND b.lama_angsuran = f.lama_angsuran AND e.tgl_bukti_serah_terima_barang between '$awal' and '$akhir'
		");
        return $query->result();
	}

	function loadSalesReport_Kredit_2($awal, $akhir, $model) {
		$query = $this->db->query("
			SELECT a.nama_mobil, b.tipe_mobil, b.warna_mobil_pesanan, e.tgl_bukti_serah_terima_barang, d.harga_transaksi, b.lama_angsuran, g.nama_leasing
			FROM katalog a
			JOIN detil_katalog z ON a.id_katalog = z.id_katalog
			JOIN detil_harga f ON z.tipe_mobil = f.tipe_mobil
			JOIN msleasing g ON f.id_leasing = g.id_leasing
			JOIN surat_pesanan_kendaraan b ON z.tipe_mobil = b.tipe_mobil
			JOIN mobil c ON b.no_spk = c.no_spk
			JOIN delivery_order d ON c.no_mobil = d.no_mobil
			JOIN bukti_serah_terima_barang e ON d.no_delivery_order = e.no_delivery_order
			WHERE b.jenis_pembayaran = 'kredit' AND b.id_leasing = g.id_leasing AND b.lama_angsuran = f.lama_angsuran AND e.tgl_bukti_serah_terima_barang between '$awal' and '$akhir' AND a.nama_mobil = '$model'
		");
        return $query->result();
	}

	function loadModelAdm() {
		$query = $this->db->query("SELECT nama_mobil FROM katalog");
        return $query->result();
	}

	function loadModelAdm_2($model) {
		$query = $this->db->query("SELECT nama_mobil FROM katalog WHERE nama_mobil = '$model'");
        return $query->result();
	}

	function loadReportAdm() {
		$query = $this->db->query("
		SELECT tipe_mobil,
		SUM(status_mobil = 'mdp') AS 'MDP',
		SUM(status_mobil = 'ready') AS 'Ready',
		SUM(status_mobil = 'booked') AS 'Booked',
		SUM(status_mobil = 'sold') AS 'Sold',
		SUM(status_mobil = 'defect') AS 'Defect'
		FROM mobil
		GROUP BY tipe_mobil ASC
		");
        return $query->result();
	}

	function loadReportAdm_2($model) {
		$query = $this->db->query("
		SELECT a.tipe_mobil,
		SUM(a.status_mobil = 'mdp') AS 'MDP',
		SUM(a.status_mobil = 'ready') AS 'Ready',
		SUM(a.status_mobil = 'booked') AS 'Booked',
		SUM(a.status_mobil = 'sold') AS 'Sold',
		SUM(a.status_mobil = 'defect') AS 'Defect'
		FROM mobil a
                JOIN detil_katalog b on a.tipe_mobil = b.tipe_mobil
                JOIN katalog c on b.id_katalog = c.id_katalog
                WHERE c.nama_mobil = '$model'
		GROUP BY a.tipe_mobil ASC
		");
        return $query->result();
	}

	function getTunai($tipe, $id)
	{
		$query = $this->db->query("SELECT * FROM detil_katalog where tipe_mobil = '$tipe' AND id_katalog = '$id'");
        return $query->result();
	}

	function getKreditOn($tipe, $id, $bulan) {
		$query = $this->db->query("SELECT * FROM detil_harga WHERE tipe_mobil = '$tipe' AND id_leasing = '$id' AND lama_angsuran = '$bulan'");
        return $query->result();
	}

	function saveKredit($id, $tipe, $k11, $k23, $k35, $k47)
	{
		$this->db->where('id_leasing', $id);
		$this->db->where('lama_angsuran', '11');
		$this->db->where('tipe_mobil', $tipe);
		$data = array(
			'harga_kredit'=> $k11,
		);
		$this->db->update("detil_harga", $data);

		$this->db->where('id_leasing', $id);
		$this->db->where('lama_angsuran', '23');
		$this->db->where('tipe_mobil', $tipe);
		$data = array(
			'harga_kredit'=> $k23,
		);
		$this->db->update("detil_harga", $data);

		$this->db->where('id_leasing', $id);
		$this->db->where('lama_angsuran', '35');
		$this->db->where('tipe_mobil', $tipe);
		$data = array(
			'harga_kredit'=> $k35,
		);
		$this->db->update("detil_harga", $data);

		$this->db->where('id_leasing', $id);
		$this->db->where('lama_angsuran', '47');
		$this->db->where('tipe_mobil', $tipe);
		$data = array(
			'harga_kredit'=> $k47,
		);
		$this->db->update("detil_harga", $data);
	}

	function insertDetilHarga()
	{
		$tempTipe = $this->input->post('tipemobil');
		$this->db->where('tipe_mobil', $tempTipe);
		$data = array(
		    'persentase_dp'=> $this->input->post('perdp'),
			'harga_tunai'=> $this->input->post('hargaTunai'),
			'harga_asuransi_pertahun'=> $this->input->post('hap'),
		);
		$this->db->update("detil_katalog", $data);

		$this->session->set_flashdata('info','<div class="message info"><h5>Success!</h5>Detil harga untuk tipe '.$tempTipe.' telah di ubah.</div>');
		redirect("index.php/manager_site/detil_harga");
	}

	function insertLeasing()
	{
		$data = array(
			'no_siup'=> $this->input->post('siup'),
		    'nama_leasing'=> $this->input->post('nama_leasing'),
			'alamat_leasing'=> $this->input->post('leasing_alamat'),
			'kontak_leasing'=> $this->input->post('leasing_telp'),
			'kode_pos'=> $this->input->post('leasing_zipcode'),
		);
		$this->db->insert("msleasing", $data);

		$tempNama = $this->input->post('nama_leasing');

		$this->session->set_flashdata('info','<div class="message info"><h5>Success!</h5>Leasing bernama '.$tempNama.' telah di tambahkan.</div>');
		redirect("index.php/manager_site/input_leasing");
	}

	function getLeasing()
	{
		$query = $this->db->query("SELECT * FROM msleasing");
        return $query->result();
	}

	function updateLeasing()
	{
		$this->db->where('id_leasing',$this->input->post('id_leasing'));
		$data = array(
			'alamat_leasing'=> $this->input->post('leasing_alamat'),
			'kontak_leasing'=> $this->input->post('leasing_telp'),
			'kode_pos'=> $this->input->post('leasing_zipcode'),
		);
		$this->db->update("msleasing", $data);

		$tempNama = $this->input->post('nama_leasing');
		$this->session->set_flashdata('info','<div class="message info"><h5>Success!</h5>Leasing bernama '.$tempNama.' telah di diubah datanya.</div>');
		redirect("index.php/manager_site/update_leasing");
	}
//MANAGER

//OTHERS
	function valOldPass()
	{
		$session_data = $this->session->userdata('logged_in');
		$this -> db -> select('passEmp');
		$this -> db -> from('msemployee');
		$this -> db -> where('idEmp',$session_data['username']);
		$this -> db -> where('passEmp',$this->input->post('oldpass'));
		$query = $this -> db -> get();

		if($query -> num_rows() == 0)
		{
			return false;
		}
		return true;
	}

	function updateProfile()
	{
		$session_data = $this->session->userdata('logged_in');
		$this->db->where('idEmp',$session_data['username']);
		$data = array(
			'emailEmp' => $this->input->post('email'),
			'passEmp' => $this->input->post('pass')
		);
		$this->db->update('msemployee', $data);
	}
//OTHERS

// Start Update SPK
function getSPKCarOn($id) {
	$query = "SELECT nama_mobil FROM katalog where
				id_katalog =
				(
					SELECT id_katalog FROM detil_katalog WHERE
					tipe_mobil =
					(
						SELECT tipe_mobil FROM surat_pesanan_kendaraan WHERE tipe_mobil = '$tipe'
					)
				)";
	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($result) or die(mysql_error());
	return $row['nama_mobil'];
}

function getSPKCustOn($id) {
	$query = $this->db->query("SELECT * FROM mscustomer where
								no_KTP =
								(
									SELECT no_KTP FROM surat_pesanan_kendaraan
									WHERE no_spk = '$id'
								)
							  ");
    return $query->result();
}
// End Update SPK


}
?>
