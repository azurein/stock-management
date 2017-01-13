 <div class="grid_12">
 	<div id="information">
		<?php echo $this->session->flashdata('info'); ?>
 	</div>
    <div class="box round first fullpage">
        <h2>Tagihan</h2>
        <div id="kiri2">
            <div class="block ">
            	<?php echo form_open("index.php/admin_site/insertTagihan"); ?>
                <table class="form" cellspacing="0">
                    <tr>
                        <td colspan="2" style="width: 600px;padding-left: 20px;">
                            <div style="padding: 10px 0px 0px 0px;">
                                <table>
                                    <tr>
                                        <td>
                                            <div class="label">
                                                <label id="label_do">No. Purchase Order</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="textf">
                                                <input type="text" onkeyup="cekKosong('label_do','do','error_do'),cekLima('label_do','do','error_do2');"  id="no_po" name="no_po" placeholder="Masukkan No PO" size="50" value="" />
                                                <button type="button" id="searchPO">Cari PO</button>
                                                <div id="errorPO" name="errorPO" class="line_error" style="color:red"><?php echo form_error('no_po'); ?></div>
                                                <p class="line_error" id="error_do"></p>
                                                <p class="line_error" id="error_do2"></p>
                                            </div>
                                        </td>
                                    </tr> 
                                </table>   
                            </div>
                        </td>
                    </tr>   
                    <!--Detail Mobil Mulai!-->
                    <tr>
                        <td colspan="2" style="width: 600px;">
                            <fieldset class="formGroupBox">
                                <legend>&nbsp;&nbsp;&nbsp;&nbsp;Delivery Order</legend>
                                <table>
                                    <tr>
                                        <td style="width: 600px;" id="loadDO"></td>
                                    </tr>
                                </table>   
                            </fieldset>
                        </td>
                        <td></td>
                    </tr>
                    <!--Detail Mobil selesai!-->
                    
                    <!--Button Mulai!-->
                    <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
                    <tr>
                        <td style="width: 600px;padding-left: 20px;">
                            <button class="btn btn-blue" type="submit" value="Submit">Submit Tagihan</button>&nbsp;&nbsp;&nbsp;&nbsp;
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
	$('#searchPO').click(function(){
		$.ajax({
			type:"POST",
			url:"<?php echo site_url('index.php/admin_site/cekPO');?>",
			data:'num='+$("#no_po").val(),
			cache:false,
			success:function(html){
				$('#errorPO').html(html);
			}
		});
		
		$.ajax({
			type:"POST",
			url:"<?php echo site_url('index.php/admin_site/getDO');?>",
			data:'num='+$("#no_po").val(),
			cache:false,
			success:function(html){
				$('#loadDO').html(html);
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
