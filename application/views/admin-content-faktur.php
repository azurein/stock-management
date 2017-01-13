 <div class="grid_12">
 	<?php echo $this->session->flashdata('info'); ?>
    <div class="box round first fullpage">
        <h2>Pengajuan Faktur</h2>
        <?php echo form_open("index.php/admin_site/insertFaktur"); ?>
        <div id="kiri2">
            <div class="block ">
                <form>
                <table class="form" cellspacing="0">
                    <!--Faktur Mulai!-->
                    <tr>
                        <td colspan="2" style="width: 600px;padding-left: 20px;">
                            <div style="padding: 10px 0px 0px 0px;">
                                <table>
                                    <tr>
                                        <td>
                                            <div class="label">
                                                <label id="label_do">No. Delivery Order</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="textf">
                                                <input type="text" onkeyup="cekKosong('label_do','do','error_do'),cekLima('label_do','do','error_do2');"  id="no_do" name="no_do" placeholder="Masukkan No DO" size="50" value="" />
                                                <button type="button" id="searchDO">Cari DO</button>
                                                <p class="line_error" id="errorDO"></p>
                                                <p class="line_error" id="error_do2"></p>
                                            </div>
                                        </td>
                                    </tr> 
                                </table>   
                            </div>
                        </td>
                    </tr>
                    <!--Faktur Selesai!-->
                    
                    <!--Detail Customer Mulai!-->
                    <tr>
                        <td colspan="2" style="width: 600px;">
                            <fieldset class="formGroupBox">
                                <legend>&nbsp;&nbsp;&nbsp;&nbsp;Customer</legend>
                                <table id="loadCust"></table>   
                            </fieldset>
                        </td>
                        <td></td>
                    </tr>
                    <!--Detail Customer Selesai!-->
                    
                    <!--Detail Mobil Mulai!-->
                    <tr>
                        <td colspan="2" style="width: 600px;">
                            <fieldset class="formGroupBox">
                                <legend>&nbsp;&nbsp;&nbsp;&nbsp;Mobil</legend>
                                <table id="loadMobil"></table>   
                            </fieldset>
                        </td>
                        <td></td>
                    </tr>
                    <!--Detail Mobil selesai!-->
                    
                    <!--Button Mulai!-->
                    <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
                    <tr>
                        <td style="width: 600px;padding-left: 20px;">
                            <button class="btn btn-blue" type="submit" value="Submit">Submit Faktur</button>&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                    <!--Button Selesai!-->
                </table>
                </form>
            </div>
        </div>
        <div id="kanan2">
        </div>
    </div>
</div>
<?php echo form_close(); ?>
<script>
	$('#searchDO').click(function(){
		$.ajax({
			type:"POST",
			url:"<?php echo site_url('index.php/admin_site/cekDO');?>",
			data:'num='+$("#no_do").val(),
			cache:false,
			success:function(html){
				$('#errorDO').html(html);
			}
		});
		
		$.ajax({
			type:"POST",
			url:"<?php echo site_url('index.php/admin_site/getCust');?>",
			data:'num='+$("#no_do").val(),
			cache:false,
			success:function(html){
				$('#loadCust').html(html);
			}
		});
		
		$.ajax({
			type:"POST",
			url:"<?php echo site_url('index.php/admin_site/getCar');?>",
			data:'num='+$("#no_do").val(),
			cache:false,
			success:function(html){
				$('#loadMobil').html(html);
			}
		});
	});

	// cek inputan harus angka
	function cekAngka(idInput, idError)
	{
		document.getElementById(idError).innerHTML = "";
		var a = document.getElementById(idInput).value;
		if(isNaN(a)) {
			document.getElementById(idError).innerHTML = "Inputan harus angka";
		};
	}
	
    function cekKosong(label, tes, error_tes)
    {
        document.getElementById(error_tes).innerHTML = "";
        var b = document.getElementById(label).innerHTML;
        var a = document.getElementById(tes).value;
        if(a == "")
        {
            document.getElementById(error_tes).innerHTML = b+" Harus Diisi!";
        }
    }
    
    function cekLima(label2,idInput2, idError2 )
    {
        document.getElementById(idError2).innerHTML = "";
        var a = document.getElementById(idInput2).value;
        var b = document.getElementById(label2).innerHTML;
        if(a.length<5||a.length>5){
            document.getElementById(idError2).innerHTML = b+" Harus 5 Digit!";
        }
    }
    
</script> 
