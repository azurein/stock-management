 <div class="grid_12">
    <div class="box round first fullpage">
        <h2>Masukkan Warna Baru</h2>
        <div class="block">
        <?php echo form_open_multipart("index.php/sales_site/insertWarna");?>
	        <fieldset class="formGroupBox">
                    <legend class="formTitleMenu">Masukkan Warna untuk model : <?php foreach($mobil as $row){ echo str_replace("-", " ", $row->nama_mobil); } ?></legend>
                    <input type="hidden" name="modelname" value="<?php foreach($mobil as $row){ echo $row->nama_mobil; } ?>" />
                    <div class="formMenu">
                        <table width="800">
                        	<tr>
                                <td><label id="label_idInspeksi">Nama warna</label></td>
                                <td>
		                            <input type="text" id="nama_warna" name="nama_warna" placeholder="Masukkan nama warna" size="50" value="" />
	                                <p class="line_error" id="error_warna"></p>
	                                <div class="line_error"><?php echo form_error('nama_warna'); ?></div>
                                </td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                            <tr>
                                <td><label id="label_idInspeksi">Kode warna</label></td>
                                <td>
		                            <input type="text" id="kode_warna" name="kode_warna" placeholder="Masukkan kode warna" size="50" value="" />
	                                <p class="line_error" id="kode_warna"></p>
	                                <div class="line_error"><?php echo form_error('kode_warna'); ?></div><br />
                                	<input type="hidden" id="rowCount" name="rowCount" value="" />
                                </td>
                            </tr>
                            <tr>
                                <td><label id="label_idInspeksi">Unggah foto mobil</label></td>
                            	<td>
					                <div class="textfield-unggah">
					                    <input type="file" id="image" name="image" size="20" >
					                	<input type="text" id="tempImage" name="tempImage" />
					                </div>
					                <div id="preview-bagasi"></div>
                            	</td>
                            </tr>
                            <tr>
                                <td></td>
                            	<td>
                                    <div class="formButton">
                                        <button class="btn btn-blue" type="submit" value="Submit">Save</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button class="btn btn-blue" type="reset" value="Reset">Reset</button>
                                    </div>
                            	</td>
                            </tr>
                        </table>
                    </div>
           		</fieldset>
		</div>
    </div>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
	$(document).ready(function()
	{
	    $('#image').live('change', function(){ $('#tempImage').val($('#image').val()); });
       
		var count = 0;
        
		$('#addColor').live('click',function(){
		    $(this).val('Delete');
		    $(this).attr('class','del');
		 	count++;
		 	var tempWarna = $('#nama_warna').val();
		 	var tempKode = $('#kode_warna').val();
		    var append = "<tr><td>"+tempWarna+"<input type='hidden' id='warna[]' name='warna[]' value="+tempWarna.replace(/\s+/g, '-').toLowerCase()+" /></td><td>"+tempKode+"<input type='hidden' id='kode[]' name='kode[]' value="+tempKode.replace(/\s+/g, '-').toLowerCase()+" /></td><td class='removeColor'>Hapus warna</td></tr>";
		    $("tr:last").after(append);
		    $("#rowCount").val(count);
		});
		
	    $('.removeColor').live('click',function(){
		    $(this).parent().remove();
		    count--;
		    $("#rowCount").val(count);
		});
	});

</script>