<style>
	.icon
	{
		width:25px;
		vertical-align:middle;
	}
</style>

<div class="grid_12">
    <ul class="nav main">
        <li><a href="javascript:"><span><img class="icon" src="<?php echo base_url(); ?>staff_site_files/img/icon_surat.png" />&nbsp;Surat Pesanan Kendaraan</span></a>
        	<ul>
        		<li><a href="<?php echo $nav21; ?>"><span style="color: white;">Buat SPK Baru</span></a></li>
        		<li><a href="<?php echo $nav22; ?>"><span style="color: white;">Mengubah Data SPK</span></a></li>
        	</ul>
        </li>
        <li><a href="<?php echo $nav3; ?>"><span><img class="icon" src="<?php echo base_url(); ?>staff_site_files/img/icon_katalog.png" />&nbsp;Katalog Mobil</span></a></li>
        <?php echo form_open("index.php/sales_site/printSPK","id = 'form1'"); ?>
        	<li><a onclick="document.forms['form1'].submit();"><span><img class="icon" src="<?php echo base_url(); ?>staff_site_files/img/icon_pdf.png" />&nbsp;Print SPK</span></a></li>
        <?php echo form_close(); ?>
    </ul>
</div>
<div class="clear">
</div>
