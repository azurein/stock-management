 <div class="grid_12">
 	<div id="information">
		<?php echo $this->session->flashdata('info'); ?>
 	</div>  
    <div class="box round first fullpage">
        <h2>Inspeksi</h2>
        <div id="kiri2">
        	<?php echo form_open("index.php/gudang_site/insertInspeksi"); ?>
            <div class="block ">
                <form>
                <!--Mobil Detail Mulai!-->
                    <div class="formMenu">
                        <table width="800">
                        	<tr>
                                <td>
                                    <label id="label_idInspeksi">No. Inspeksi</label>
                                </td>
                                <td>
		                            <input type="text" id="idInspeksi" name="idInspeksi" placeholder="Masukkan no Inspeksi" size="50" value="" />
	                                <p class="line_error" id="error_noInspeksi"></p>
	                                <div class="line_error"><?php echo form_error('idInspeksi'); ?></div>
                                </td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                            <tr>
                                <td>
                                    <label id="label_noRangka">No. Rangka</label>
                                </td>
                                <td>
		                            <input type="text" id="noRangka" name="noRangka" placeholder="Masukkan no Rangka" size="50" value="" />
	                                <p class="line_error" id="error_noRangka"></p>
	                                <div class="line_error"><?php echo form_error('noRangka'); ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label id="label_noMesin">No. Mesin</label>
                                </td>
                                <td>
                                	<input type="text" id="noMesin" name="noMesin" placeholder="Masukan no Mesin" size="50" value="" />
	                                <p class="line_error" id="error_noMesin"></p> 
	                                <div class="line_error"><?php echo form_error('noMesin'); ?></div>
                                </td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                            <tr>
                                <td>
                                    <label>Status Inspeksi</label>
                                </td>
                                <td>
                                    <input type="radio" name="inspeksi" value="normal" checked="checked" style="vertical-align: middle;"/><label  style="vertical-align: middle;">Normal&nbsp; &nbsp;</label>  
                                    <input type="radio" name="inspeksi" value="defect"  style="vertical-align: middle;"/><label  style="vertical-align: middle;">Defect</label>
                                </td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                            <tr id="showhideKet" style="display: none">
                                <td style="vertical-align: top;">
                                    <label>Keterangan</label>
                                </td>
                                <td>
                                    <textarea rows="4" id="keterangan" name="keterangan" cols="38" style="resize: none;" placeholder="Masukan Keterangan hasil Inspeksi jika status Inspeksi DEFECT"></textarea>
                                </td>
                            </tr>
                            
                        </table>
                    </div>
            <!--Mobil Detail Selesai!-->
                    <div class="formButton">
                        <button class="btn btn-blue" type="submit" value="Submit">Submit Hasil Inspeksi</button>&nbsp;&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-blue" type="reset" value="Reset">Kosongkan seluruh field</button>
                    </div>
                </form>
            </div>
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

	    $("input#noRangka").autocomplete({
	    	source: availableNoRangka,
	    	minLength: 5
		});
		
		$("input#noMesin").autocomplete({
	    	source: availableNoMesin,
	    	minLength: 5
		});
		
		$('input[name=inspeksi]:radio').change(function() {
			if($("input[name=inspeksi]:checked").val() == "normal") {
				document.getElementById("showhideKet").style.display = "none";
			}
			else {
				document.getElementById("showhideKet").style.display = "table-row";
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
            document.getElementById(idError2).innerHTML = b+" Harus 5 digit!";
        }
    }
	
	function ceknoRangka(label2,idInput2, idError2 )
    {
        document.getElementById(idError2).innerHTML = "";
        var a = document.getElementById(idInput2).value;
        var b = document.getElementById(label2).innerHTML;
        if(a.length<11||a.length>11){
            document.getElementById(idError2).innerHTML = b+" Harus 11 digit!";
        }
    }
 
</script>