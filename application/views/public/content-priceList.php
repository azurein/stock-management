<!DOCTYPE html>
<html lang="en">
<head>
    <title>Setiajaya Mobilindo - Daftar Harga</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>marketing_files/images/setiaJaya_icon.png" >
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>marketing_files/css/reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>marketing_files/css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300' rel='stylesheet' type='text/css'>
    <script src="<?php echo base_url(); ?>marketing_files/js/jquery-1.7.min.js"></script>
    <script src="<?php echo base_url(); ?>marketing_files/js/jquery.easing.1.3.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $("#cbu").click(function() {
            $("#hideShowCBU").show();
            $("#hideShowCKD").hide();
        });
        $("#ckd").click(function() {
            $("#hideShowCKD").show();
            $("#hideShowCBU").hide();
        });
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
              <li><a href="<?php echo $home?>" class="home"><img src="<?php echo base_url(); ?>marketing_files/images/home.jpg" alt=""></a></li>
              <li><a href="<?php echo $product?>">Produk</a></li>
              <li><a href="<?php echo $showroom?>">Showroom</a></li>
              <li class="current"><a href="<?php echo $priceList?>">Daftar Harga</a></li>
              <li><a href="<?php echo $about?>">Tentang Kami</a></li>
              <li><a href="<?php echo $location?>">Kontak &amp; Lokasi</a></li>
          </ul>
          <div class="clear"></div>
        </nav>
   </header>
   <!--==============================content================================-->
   <section id="content"><div class="ic"></div>
      <div class="sub-page">
      	<div class="sub-page-left box-9">
        	<h2 class="p4">Daftar Harga</h2>

            <table>
            <tr>
                <td class="price-hover" id="cbu"><h2>CBU</h2></td>
            </tr>
         	</table><br />

            <div id="hideShowCBU"><center>
                <iframe id="showCbu" style="background-color: white;" src="cbu" width="600" height="400"></iframe>
            </center></div><br /><br />

            <table>
            <tr>
                <td class="price-hover" id="cbu"><h2>CKD</h2></td>
            </tr>
         	</table><br />

            <div id="hideShowCKD"><center>
                <iframe id="Showckd" style="background-color: white;" src="ckd" width="600" height="400"></iframe>
            </center></div>
            <br />

        </div>
        <div class="sub-page-right" style="height: 1050px">
                <h2 class="p2">Promo</h2>
                <p class="text-3 p2">Kijang innova</p>
                <p class="upper">Kijang Innova dilengkapi berbagai fitur praktis dan serbaguna untuk kenyamanan Anda sekeluarga selama bepergian.</p>
                <br/><iframe width="200" height="200" src="http://www.youtube.com/embed/Y1g7sPDkpOE" frameborder="0" allowfullscreen></iframe><br /><br />
                <br />


                <h2 class="p2">Garda Oto</h2>
                <p class="text-3 p2">Asuransi Resmi Astra</p>
                <a href="http://www.asuransi.astra.co.id/index.php" target="__blank"><img src="<?php echo base_url(); ?>marketing_files/images/gardaOto.png" width="200px" /></a>
                <p class="upper">Asuransi yang memberikan jaminan ganti rugi atas kerusakan/ kerugian yang dialami kendaraan bermotor akibat tabrakan, perbuatan jahat, kebakaran, sambaran petir atau tanggung jawab pihak III.</p>

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
