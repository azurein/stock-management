<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php foreach ($katalog as $row) { echo $row->nama_mobil; }?></title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>marketing_files/images/setiaJaya_icon.png" >
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>marketing_files/css/reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>marketing_files/css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="<?php echo base_url(); ?>marketing_files/js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>marketing_files/js/j360.js"></script>
    <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('#product').j360();
            });
   	</script>

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
              <li class="current"><a href="<?php echo $home?>" class="home"><img src="<?php echo base_url(); ?>marketing_files/images/home.jpg" alt=""></a></li>
              <li><a href="<?php echo $product?>">Produk</a></li>
              <li><a href="<?php echo $showroom?>">Showroom</a></li>
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
        <!--Detail Showroom Mulai!-->
        <div class="detailShowroom">
            <?php
	        	foreach ($katalog as $row) {
	        		echo '<img src="'.base_url().$row->gambar_logo.'">';
				};
	       	?>

            <!--View 360 Mulai!-->
			<center>
            <div id="product" class="product360" style="width: 640px; height: 360px;">
            	<?php
	            	foreach ($dimensi as $row) {
	            		echo '<img src="'.base_url().$row->gambar.'">';
					};
	            ?>

            </div>
            <h3>Klik dan tahan kursor mouse dari sini,<br />Lalu gerakan ke kiri atau ke kanan untuk memutar mobil</h3><br>
			</center>
            <!--View 360 Selesai!-->

            <!--Spesifikasi Mulai!-->
            	<h2>Spesifikasi</h2><br>
                <center>
                	<?php
			        	foreach ($katalog as $row) {
			        		if($row->id_katalog == 1) {
			        			echo '<iframe src="https://docs.google.com/file/d/0ByWZ248Jhrs4VmlWcmRZNmcyNTg/preview" width="100%" height="700px"></iframe>';
			        		}
							else if($row->id_katalog == 2) {
			        			echo '<iframe src="https://docs.google.com/file/d/0ByWZ248Jhrs4SGtYTzNzSFZROUE/preview" width="100%" height="700px"></iframe>';
			        		}
							else if($row->id_katalog == 4) {
			        			echo '<iframe src="https://docs.google.com/file/d/0ByWZ248Jhrs4LWZ4TnU1VGszVVk/preview" width="100%" height="700px"></iframe>';
			        		}
							else if($row->id_katalog == 8) {
			        			echo '<iframe src="https://docs.google.com/file/d/0ByWZ248Jhrs4WWdPX092X2ROUHM/preview" width="100%" height="700px"></iframe>';
			        		}
						};
			       	?>

                </center>
            <!--Spesifikasi Selesai!-->

        </div>
        <!--Detail Showroom Selesai!-->



   </section>
  <!--==============================footer=================================-->
        <footer>
        <div class="footerStyle">
                <img src="<?php echo base_url(); ?>marketing_files/images/setiaJaya_logo.png" width="150px" alt="" style="float: left;"/>
                <div class="footerMenu">
                    <br />
                    <a href="index.html">Halaman Depan</a>
                    <a href="product.html">Produk</a>
                    <a href="about.html">Tentang Kami</a>
                    <a href="showroom.html">Showroom</a>
                    <a href="price-list.html">Daftar Harga</a>
                    <a href="locations.html">Kontak dan lokasi</a>
                </div>
                <br /><br /><h3>Copyright &copy; 2012. Setiajaya Mobilindo. All Rights Reserved.</h3>
        </div>
    </footer>
</div>
</body>
</html>
