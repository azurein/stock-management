<!DOCTYPE html>
<html lang="en">
<head>
    <title>Galeri - Toyota 86</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>marketing_files/images/setiaJaya_icon.png" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>marketing_files/css/basic.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>marketing_files/css/galleriffic-2.css" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url(); ?>marketing_files/js/jquery-1.3.2.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>marketing_files/js/jquery.galleriffic.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>marketing_files/js/jquery.opacityrollover.js"></script>
	
	<script type="text/javascript">
			document.write('<style>.noscript { display: none; }</style>');
	</script>

    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>marketing_files/css/reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>marketing_files/css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300' rel='stylesheet' type='text/css'>
    
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
      	
        <!--Galeri Showroom Mulai!-->
        <div class="detailShowroom">
        <h2 style="margin-bottom:10px; float:left;">Galeri Toyota 86</h2><br/><br/>
       
        
        	<!-- Detil Galeri Mulai -->
			<div id="gallery" class="content">
				<div id="controls" class="controls"></div>
				<div class="slideshow-container">
					<div id="loading" class="loader"></div>
					<div id="slideshow" class="slideshow"></div>
				</div>
				<div id="caption" class="caption-container"></div>
			</div>
			
			<div id="thumbs" class="navigation">
				<ul class="thumbs noscript">
					<?php
					foreach ($warna as $row) 
					{
						$text = $row->nama_warna;
						$find = "metallic";
						$pos = strpos($text, $find);
						if($pos) {
						echo
						'
						<li>
						<a class="thumb" href="'.base_url().$row->gambar_warna.'" title="warna_01">
							<img style="
							border: solid 1px;
							background-image: linear-gradient(bottom, '.$row->kode_warna.' 33%, rgb(214,214,214) 78%);
							background-image: -o-linear-gradient(bottom, '.$row->kode_warna.' 33%, rgb(214,214,214) 78%);
							background-image: -moz-linear-gradient(bottom, '.$row->kode_warna.' 33%, rgb(214,214,214) 78%);
							background-image: -webkit-linear-gradient(bottom, '.$row->kode_warna.' 33%, rgb(214,214,214) 78%);
							background-image: -ms-linear-gradient(bottom, '.$row->kode_warna.' 33%, rgb(214,214,214) 78%);
							
							background-image: -webkit-gradient(
								linear,
								left bottom,
								left top,
								color-stop(0.33, '.$row->kode_warna.'),
								color-stop(0.78, rgb(214,214,214))
							);" 
							alt="'.$row->nama_warna.'" width="125px" height="125px"/>
						</a>
						
						<div class="caption">
							<div class="image-desc">'.$row->nama_warna.'</div>
						</div>
						</li>';
						}
						else {
							echo 
							'<li>
							<a class="thumb" href="'.base_url().$row->gambar_warna.'" title="warna_01">
								<img style="background-color: '.$row->kode_warna.';" alt="'.$row->nama_warna.'" width="125px" height="125px"/>
							</a>
							
							<div class="caption">
								<div class="image-desc">Black Silica</div>
							</div>
							</li>';
						}
					}
					?>
					
					
				</ul>
			</div>
			<!-- Detil Galeri Selesai -->
        	              
        </div>  
        <!--Galeri Showroom Selesai!-->
        
      </div> 
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

<script type="text/javascript">
			jQuery(document).ready(function($) {
				// We only want these styles applied when javascript is enabled
				$('div.navigation').css({'width' : '300px', 'float' : 'left'});
				$('div.content').css('display', 'block');

				// Initially set opacity on thumbs and add
				// additional styling for hover effect on thumbs
				var onMouseOutOpacity = 0.67;
				$('#thumbs ul.thumbs li').opacityrollover({
					mouseOutOpacity:   onMouseOutOpacity,
					mouseOverOpacity:  1.0,
					fadeSpeed:         'fast',
					exemptionSelector: '.selected'
				});
				
				// Initialize Advanced Galleriffic Gallery
				var gallery = $('#thumbs').galleriffic({
					delay:                     2500,
					numThumbs:                 4,
					preloadAhead:              10,
					enableTopPager:            true,
					enableBottomPager:         true,
					maxPagesToShow:            7,
					imageContainerSel:         '#slideshow',
					controlsContainerSel:      '#controls',
					captionContainerSel:       '#caption',
					loadingContainerSel:       '#loading',
					renderSSControls:          true,
					renderNavControls:         true,
					playLinkText:              'Mulai Slideshow',
					pauseLinkText:             'Pause Slideshow',
					prevLinkText:              '&lsaquo; Sebelumnya',
					nextLinkText:              'Selanjutnya &rsaquo;',
					nextPageLinkText:          'Selanjutnya &rsaquo;',
					prevPageLinkText:          '&lsaquo; Sebelumnya',
					enableHistory:             false,
					autoStart:                 false,
					syncTransitions:           true,
					defaultTransitionDuration: 900,
					onSlideChange:             function(prevIndex, nextIndex) {
						// 'this' refers to the gallery, which is an extension of $('#thumbs')
						this.find('ul.thumbs').children()
							.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
							.eq(nextIndex).fadeTo('fast', 1.0);
					},
					onPageTransitionOut:       function(callback) {
						this.fadeTo('fast', 0.0, callback);
					},
					onPageTransitionIn:        function() {
						this.fadeTo('fast', 1.0);
					}
				});
			});
		</script>

 
</body>
</html>