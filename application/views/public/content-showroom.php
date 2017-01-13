<!DOCTYPE html>
<html lang="en">
<head>
    <title>Setiajaya Mobilindo - Showroom</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>marketing_files/images/setiaJaya_icon.png" >
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>marketing_files/css/reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>marketing_files/css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300' rel='stylesheet' type='text/css'>
    <script src="<?php echo base_url(); ?>marketing_files/js/jquery-1.7.min.js"></script>
    <script src="<?php echo base_url(); ?>marketing_files/js/jquery.easing.1.3.js"></script>
	<!--[if lt IE 8]>
       <div style=' clear: both; text-align:center; position: relative;'>
         <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
           <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
      </div>
    <![endif]-->
    <!--[if lt IE 9]>
    	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
    	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700' rel='stylesheet' type='text/css'>
   		<script type="text/javascript" src="js/html5.js"></script>
    	<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
	<![endif]-->
</head>
<body>
<div class="bg">
   <header>
       <div class="main wrap">
       		<a href="<?php echo $home; ?>"><img src="<?php echo base_url(); ?>marketing_files/images/back_logo_with_toyota.png" alt="" class="logo2">
                <div class="namaPerusahaan">SETIAJAYA MOBILINDO
                <p>AUTHORIZED TOYOTA DEALER<p></div>
                <p>Jl. Raya Alternatif Cibubur <span>(021) 8459 1773</span></p></a>
       </div>
       <nav>  
          <ul class="menu">
              <li><a href="<?php echo $home?>" class="home"><img src="<?php echo base_url(); ?>marketing_files/images/home.jpg" alt=""></a></li>
              <li><a href="<?php echo $product?>">Produk</a></li>
              <li class="current"><a href="<?php echo $showroom?>">Showroom</a></li>
              <li><a href="<?php echo $priceList?>">Daftar Harga</a></li>
              <li><a href="<?php echo $about?>">Tentang Kami</a></li>
              <li><a href="<?php echo $location?>">Kontak &amp; Lokasi</a></li>
          </ul>
          <div class="clear"></div>
        </nav>
   </header>
   <!--==============================content================================-->
   <section id="content"><div class="ic"></div>
      <div class="sub-page">
      	<div class="sub-page-left">
        	<h2 class="p4">Showroom</h2>
           	<?php 
        	foreach ($katalog as $row) 
        	{
				echo 
				'
					<div class="picture-shell">
		                <div class="img-box">
							<img id="image2" class="gambarMobil" src="../../'.$row->gambar_depan.'"/>
		                        <img class="carHeader" src="../../'.$row->gambar_logo.'">
		                        <div class="mobil-info">
		                            <a class="buttonMobilInfo" href="fitur_spec/'.$row->id_katalog.'">Fitur dan Spesifikasi</a>
		                            <a class="buttonMobilInfo" href="gallery/'.$row->id_katalog.'/'.$row->nama_mobil.'">Galeri</a>
		                      </div>       			
						</div>            
		            </div>
				';
			}
        	?>    
        </div>
        
        <div class="sub-page-right" style="height:750px">
                <h2 class="p2">Promo</h2>
                <p class="text-3 p2">Toyota 86</p>
                <p class="upper">Toyota 86 merupakan salah satu produk terbaru kami. Diciptakan khusus bagi mereka yang menyukai tantangan dan kecepatan.</p>	
                <br><iframe width="200" height="200" src="http://www.youtube.com/embed/TifTTtxaROc" frameborder="0" allowfullscreen></iframe>
                <br><br><p class="upper">The Best From TOYOTA 86 :</p>
                <ul class="list-1">
                    <li>Ultra Low Center Of Gravity</li>
                    <li>6 Speed Transmission</li>
                    <li>Handling</li>
                    <li>Chassis</li>
                </ul>  
                <br><a href="http://toyota86indonesia.com/" class="button-2" target="_blank">Lebih Lanjut</a>
        </div>
      </div>  
   </section> 
  <!--==============================footer=================================-->
        <footer>
        <div class="footerStyle">
                <img src="<?php echo base_url(); ?>marketing_files/images/setiaJaya_logo.png" width="150px" alt="" style="float: left;"/>
                <div class="footerMenu">
                    <br />
                    <a href="<?php echo $home?>">Halaman Depan</a>
                    <a href="<?php echo $product?>">Produk</a>
                    <a href="<?php echo $about?>">Tentang Kami</a>
                    <a href="<?php echo $showroom?>">Showroom</a>
                    <a href="<?php echo $priceList?>">Daftar Harga</a>
                    <a href="<?php echo $location?>">Kontak & Lokasi</a>
                </div>   
                <br /><br /><h3>Copyright &copy; 2012. Setiajaya Mobilindo. All Rights Reserved.</h3>
        </div> 
    </footer>	
</div> 
</body>
</html>