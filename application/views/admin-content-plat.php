 <div class="grid_12">
 	<?php echo $this->session->flashdata('info'); ?>
    <div class="box round first fullpage">
        <h2>Input Plat Mobil</h2>
        <?php echo form_open("index.php/admin_site/insertPlat"); ?>
        <div id="kiri2">
            <div class="block ">
                <form>
                <table class="form" cellspacing="0">
                
                    <!--Input No Plat Mulai!-->
                    <tr>
                        <td colspan="2" style="width: 600px;">
                            <fieldset class="formGroupBox">
                                <div style="padding: 10px 0px 0px 0px;">
                                    <table>
                                        <tr>
                                            <td>
                                                <div class="label" style="margin-left: 25px;">
                                                    <label id="label_rangka">No. Rangka</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="textf">
                                                    <input type="text" onkeyup="cekKosong('label_rangka','rangka','error_rangka2'),cekLima('label_rangka','rangka','error_rangka'); " id="rangka" name="rangka" placeholder="Masukkan No Rangka" size="50" value="" />
                                                    <p class="line_error" id="error_rangka"><?php echo form_error('rangka'); ?></p>
                                                    <p class="line_error" id="error_rangka2"></p>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>
                                                <div class="label" style="margin-left: 25px;">
                                                    <label id="label_mesin">No. Mesin</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="textf">
                                                    <input type="text" onkeyup="cekKosong('label_mesin','mesin','error_mesin2'),cekLima('label_mesin','mesin','error_mesin'); " id="mesin" name="mesin" placeholder="Masukkan No Mesin" size="50" value="" />
                                                    <p class="line_error" id="error_mesin"><?php echo form_error('mesin'); ?></p>
                                                    <p class="line_error" id="error_mesin2"></p>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>
                                                <div class="label" style="margin-left: 25px;">
                                                    <label id="label_plat">No. Plat Mobil</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="textf">
                                                    <input type="text" onkeyup="cekKosong('label_plat','plat','error_plat2'),cekLima('label_plat','plat','error_plat'); " id="plat" name="plat" placeholder="Masukkan No Plat" size="50" value="" />                                                    <p class="line_error" id="error_spk"></p>
                                                    <p class="line_error" id="error_plat"><?php echo form_error('plat'); ?></p>
                                                    <p class="line_error" id="error_plat2"></p>
                                                </div>
                                            </td>
                                        </tr>

                                    </table>   
                                </div>
                                
                            </fieldset>
                        </td>
                        <td></td>
                    </tr>
                    <!--Input no Plat Selesai!-->
                    
                    <!--Button Mulai!-->
                    <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
                    <tr>
                        <td style="width: 600px; padding-left: 20px;">
                            <button class="btn btn-blue" type="submit" value="Submit">Submit Plat</button>&nbsp;&nbsp;&nbsp;&nbsp;
                            <button class="btn btn-blue" type="reset" value="Re set">Kosongkan seluruh field</button>
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
	$(document).ready(function() {
		var availableNoRangka = [];
		var availableNoMesin = [];
		
		<?php foreach($nomor as $row) { ?> availableNoRangka.push( "<?php echo $row->no_rangka ?>" ); <?php } ?>
		<?php foreach($nomor as $row) { ?> availableNoMesin.push( "<?php echo $row->no_mesin ?>" ); <?php } ?>

	    $("input#rangka").autocomplete({
	    	source: availableNoRangka,
	    	minLength: 5
		});
		
		$("input#mesin").autocomplete({
	    	source: availableNoMesin,
	    	minLength: 5
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
        if(a.length<5){
            document.getElementById(idError2).innerHTML = b+" Tidak Kurang Dari 5 Digit!";
        }
    }
    
</script> 

