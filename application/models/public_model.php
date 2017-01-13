<?php  
class Public_model extends CI_Model 
{
	function getCatalog() {
		$query = $this->db->query("SELECT * FROM katalog");
        return $query->result(); 
	}
	
	function getCatalogOn($id) {
		$query = $this->db->query("SELECT * FROM katalog where id_katalog = '$id'");
        return $query->result(); 
	}
	
	function getColorOn($nama) {
		$query = $this->db->query("SELECT * FROM warna where nama_mobil = '$nama'");
        return $query->result(); 
	}
	
	function getDimensionOn($id) {
		$query = $this->db->query("SELECT * FROM tiga_d where id_katalog = '$id'");
        return $query->result(); 
	}
}
?>  