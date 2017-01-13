<?php
class Public_site extends CI_Controller {
	
	function __construct(){
        parent::__construct();
		$this -> load -> model("public_model");	
    } 
	
	function index() {
		redirect('index.php/public_site/home');
	}
	
	function home() {
		$data['home'] = "";
		$data['product'] = "product";
		$data['showroom'] = "showroom";
		$data['priceList'] = "price_list";
		$data['about'] = "about_us";
		$data['location'] = "location";
		$data['title'] = "Setiajaya Mobilindo - Home";
		$this -> load -> view('public/content-home', $data);
	}
	
	function product() {		
		$data['home'] = "home";
		$data['product'] = "product";
		$data['showroom'] = "showroom";
		$data['priceList'] = "price_list";
		$data['about'] = "about_us";
		$data['location'] = "location";
		$data['title'] = "Setiajaya Mobilindo - Product";
		$this -> load -> view('public/content-product', $data);
	}
	
	function showroom() {
		$data['katalog'] = $this->public_model->getCatalog();
		
		$data['home'] = "home";
		$data['product'] = "product";
		$data['showroom'] = "";
		$data['priceList'] = "price_list";
		$data['about'] = "about_us";
		$data['location'] = "location";
		$data['title'] = "Setiajaya Mobilindo - Showroom";
		$this -> load -> view('public/content-showroom', $data);
	}
	
	function fitur_spec() {
		$id = $this->uri->segment(3);
		$data['katalog'] = $this->public_model->getCatalogOn($id);
		$data['dimensi'] = $this->public_model->getDimensionOn($id);
		
		$data['home'] = base_url()."index.php/public_site/home";
		$data['product'] = base_url()."index.php/public_site/product";
		$data['showroom'] = base_url()."index.php/public_site/showroom";
		$data['priceList'] = base_url()."index.php/public_site/price_list";
		$data['about'] = base_url()."index.php/public_site/about_us";
		$data['location'] = base_url()."index.php/public_site/location";
		$data['title'] = "Setiajaya Mobilindo - Fitur dan Spesifikasi";
		$this -> load -> view('public/content-showroom-spec', $data);
	}

	function gallery() {
		$id = $this->uri->segment(3);
		$name = $this->uri->segment(4);
		$data['katalog'] = $this->public_model->getCatalogOn($id);
		$data['warna'] = $this->public_model->getColorOn($name);
		
		$data['katalog'] = $this->public_model->getCatalog();
		$data['home'] = base_url()."index.php/public_site/home";
		$data['product'] = base_url()."index.php/public_site/product";
		$data['showroom'] = base_url()."index.php/public_site/showroom";
		$data['priceList'] = base_url()."index.php/public_site/price_list";
		$data['about'] = base_url()."index.php/public_site/about_us";
		$data['location'] = base_url()."index.php/public_site/location";
		$data['title'] = "Setiajaya Mobilindo - Gallery";
		$this -> load -> view('public/content-showroom-gallery', $data);
	}

	function price_list() {
		$data['home'] = "home";
		$data['product'] = "product";
		$data['showroom'] = "showroom";
		$data['priceList'] = "";
		$data['about'] = "about_us";
		$data['location'] = "location";
		$data['title'] = "Setiajaya Mobilindo - Price List";
		$this -> load -> view('public/content-priceList', $data);
	}

	function cbu() {
		$this->load->view('public/cbupricelist');
	}

	function ckd() {
		$this->load->view('public/ckdpricelist');
	}
	
	function about_us() {
		$data['home'] = "home";
		$data['product'] = "product";
		$data['showroom'] = "showroom";
		$data['priceList'] = "price_list";
		$data['about'] = "";
		$data['location'] = "location";
		$data['title'] = "Setiajaya Mobilindo - About Us";
		$this -> load -> view('public/content-about', $data);
	}

	function location() {
		$data['home'] = "home";
		$data['product'] = "product";
		$data['showroom'] = "showroom";
		$data['priceList'] = "price_list";
		$data['about'] = "about_us";
		$data['location'] = "";
		$data['title'] = "Setiajaya Mobilindo - Location";
		$this -> load -> view('public/content-location', $data);
	}
}
?>