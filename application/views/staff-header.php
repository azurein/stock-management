<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title><?php echo $title ?></title>

    <!-- BEGIN: load stylesheet -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>staff_site_files/css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>staff_site_files/css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>staff_site_files/css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>staff_site_files/css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>staff_site_files/css/nav.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>staff_site_files/css/style.css" />
    <link href="<?php echo base_url(); ?>staff_site_files/css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->

    <!-- BEGIN: load jquery
    <script src="<?php echo base_url(); ?>staff_site_files/js/newjs/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>staff_site_files/js/newjs/jquery.min.js" type="text/javascript"></script>
    -->
    <script src="<?php echo base_url(); ?>staff_site_files/js/jquery.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo base_url(); ?>staff_site_files/js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>staff_site_files/js/jquery-ui/jquery.ui.core.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>staff_site_files/js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>staff_site_files/js/jquery-ui/jquery.ui.datepicker.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>staff_site_files/js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>staff_site_files/js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>staff_site_files/js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>staff_site_files/js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>staff_site_files/js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>staff_site_files/js/setup.js" type="text/javascript"></script>
    <!-- END: load jquery -->

    <!-- BEGIN: load jqplot -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>staff_site_files/css/jquery.jqplot.min.css" />
    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="js/jqPlot/excanvas.min.js"></script><![endif]-->
    <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>staff_site_files/js/jqPlot/jquery.jqplot.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>staff_site_files/js/jqPlot/plugins/jqplot.canvasTextRenderer.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>staff_site_files/js/jqPlot/plugins/jqplot.canvasAxisLabelRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>staff_site_files/js/jqPlot/plugins/jqplot.barRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>staff_site_files/js/jqPlot/plugins/jqplot.pieRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>staff_site_files/js/jqPlot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>staff_site_files/js/jqPlot/plugins/jqplot.highlighter.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>staff_site_files/js/jqPlot/plugins/jqplot.pointLabels.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>staff_site_files/js/jqPlot/plugins/jqplot.donutRenderer.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>staff_site_files/js/jqPlot/plugins/jqplot.bubbleRenderer.min.js"></script>
    <!-- END: load jqplot -->

    <!-- Start table js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>staff_site_files/js/table/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();

			$(function() {
		        $( ".datepicker" ).datepicker();
		    });
        });
    </script>
    <!-- End table js -->

    <!-- MCEditor-->
    <script type="text/javascript" src="<?php echo base_url(); ?>staff_site_files/js/tiny_mce/tiny_mce.js" ></script>

	<!-- JQUERY AUTOCOMPLETE -->
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>-->
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

	<!-- Start Preview gambar -->
	<script type="text/javascript">
    function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#'+id).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
	<!-- End Preview gambar -->

	<!-- Start Sidebar?? -->
  	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
          		setSidebarHeight();
        });
    </script>
	<!-- End Sidebar?? -->

    <!--<script type="text/javascript" src="<?php echo base_url(); ?>staff_site_files/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>staff_site_files/js/jquery.form.js"></script>
    <script type="text/javascript" >
    // preview - upload gambar
    $(document).ready(function() {
        var browser;
        if($.browser.msie){
            $('#file').live('click', function()   {
                document.getElementById('imagePreview').innerHTML ='<img src="<?php echo base_url(); ?>staff_site_files/images/loading.gif">';
                $("#imageform").ajaxForm({
                    target: '#imagePreview'
                }).submit();

                document.getElementById('ImageStatus').value='browse';
            });
        }
        else{
            $('#file').live('change', function()   {
                document.getElementById('imagePreview').innerHTML ='<img src="<?php echo base_url(); ?>staff_site_files/images/loading.gif">';
                $("#imageform").ajaxForm({
                    target: '#imagePreview'
                }).submit();

                document.getElementById('ImageStatus').value='browse';
            });
        }
    });
	</script>-->

   	<!--
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
	<script>
	// smooth scroller
		function scrollToAnchor(id){
			$('html,body').animate({scrollTop: $("#"+id).offset().top}, 'slow');
		}
	</script>-->

	<!--<script type="text/javascript">
	// tabs
	$(document).ready(function(){
	$("#flip_about_history").click(function(){
	$("#panel_about_history").slideToggle("slow");
	});
	$("#step2").hide();
		$("#step3").hide();
	});

	$(function(){
		$("#step1link").click(function(){
			$("#step1").show();
			$("#step2").hide();
			$("#step3").hide();
		});
		$("#step2link").click(function(){
			$("#step1").hide();
			$("#step2").show();
			$("#step3").hide();
		});
		$("#step3link").click(function(){
			$("#step1").hide();
			$("#step2").hide();
			$("#step3").show();
		});
	});
 	</script>-->

</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft">
                    <img src="<?php echo base_url(); ?>staff_site_files/images/toyota.png" alt="Logo" height="60px" /></div>
                <div class="floatleft" style="padding-left: 230px;">
                    <iframe src="http://free.timeanddate.com/clock/i3f0ues8/n108/fn6/fs16/fcfff/tct/pct/ftb/pa8/tt0/tw1/th1/ta1/tb4" frameborder="0" width="213" height="58" allowTransparency="true"></iframe>
                </div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="<?php echo base_url(); ?>staff_site_files/img/img-profile.jpg" alt="Profile Pic" /></div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li><font style="text-transform: uppercase">selamat datang! <?php foreach($results as $row) { echo $row->namaEmp; } ?> (<?php foreach($results as $row) { echo $row->posisiEmp; } ?>)</font></li>
                            <li><a href="<?php echo $conf_link; ?>">Pengaturan Akun</a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/logout">Keluar</a></li>
                        </ul>
                        <br />
                        <span class="small grey">Last Login: 3 hours ago</span>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
