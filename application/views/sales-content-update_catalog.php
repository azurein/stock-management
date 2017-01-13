 <div class="grid_12">
    <div class="box round first fullpage">
        <h2>Ubah data mobil <?php foreach($mobil as $row){ echo str_replace("-", " ", $row->nama_mobil); } ?></h2>
        <div id="kiri2">
        	<?php echo form_open_multipart("index.php/sales_site/updateCatalog");?>
        	<input type="hidden" name="id_katalog" value="<?php foreach($mobil as $row){ echo $row->id_katalog; } ?>" />
            <div class="block ">
               	<fieldset class="formGroupBox">
                    <legend class="formTitleMenu">Data Dasar</legend>
                    <div class="formMenu">
                        <table width="800">
                        	<tr>
                                <td><label id="label_idInspeksi">Nama model mobil</label></td>
                                <td>
		                            <input type="text" id="modelname" name="modelname" placeholder="Masukkan nama model" size="50" value="<?php foreach($mobil as $row){ echo str_replace("-", " ", $row->nama_mobil); } ?>" />
	                                <p class="line_error" id="error_model"></p>
	                                <div class="line_error"><?php echo form_error('modelname'); ?></div>
                                </td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                            <tr>
                                <td><label id="label_idInspeksi">Periode</label></td>
                                <td>
		                            <input type="text" id="periode" name="periode" placeholder="Masukkan tahun dari versi mobil" size="50" value="<?php foreach($mobil as $row){ echo $row->periode; } ?>" />
	                                <p class="line_error" id="error_periode"></p>
	                                <div class="line_error"><?php echo form_error('periode'); ?></div>
                                </td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                            <tr>
                                <td><label id="label_idInspeksi">Unggah logo mobil</label></td>
                                <td>
		                            <div class="textfield-unggah">
					                    <input type="file" id="image0" name="image0" size="20" >
					                	<input type="" id="tempImage0" name="tempImage0" />
					                </div>
                                </td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                            <tr>
                                <td><label id="label_idInspeksi">Unggah foto utama</label></td>
                                <td>
		                            <div class="textfield-unggah">
					                    <input type="file" id="image1" name="image1" size="20" >
					                	<input type="" id="tempImage1" name="tempImage1" />
					                </div>
                                </td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                        </table>
                    </div>
           		</fieldset>
           		<fieldset class="formGroupBox">
                    <legend class="formTitleMenu">Foto Interior</legend>
                    <div class="formMenu">
                        <table width="800">
                        	<tr>
                        		<td>
	                        		<div class="label">Unggah Foto Speedometer</div>
					                <br />
					                <div class="textfield-unggah">
					                	<input type="file" id="image2" name="image2" size="20" >
					                	<input type="" id="tempImage2" name="tempImage2" />
					                </div>
					                <div id="preview-speed"></div>
                        		</td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                        	<tr>
                        		<td>
                        			<div class="label">Unggah Foto Dasbor</div>
					                <br />
					                <div class="textfield-unggah">
					                    <input type="file" id="image3" name="image3" size="20" >  
					                	<input type="" id="tempImage3" name="tempImage3" />
					                </div>
					                <div id="preview-dasbor"></div>
                        		</td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                            <tr>
                            	<td>
                            		<div class="label">Unggah Foto Bangku</div>
					                <br />
					                <div class="textfield-unggah">
					                    <input type="file" id="image4" name="image4" size="20" >
					                	<input type="" id="tempImage4" name="tempImage4" />
					                </div>
					                <div id="preview-bangku"></div>
                            	</td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                            <tr>
                            	<form id="insert_pic_bagasi" method="post" enctype="multipart/form-data" action='index.php/sales_site/insert_bagasi'>
                            	<td>
                            		<div class="label">Unggah Foto Bagasi</div>
					                <br />
					                <div class="textfield-unggah">
					                    <input type="file" id="image5" name="image5" size="20" >
					                	<input type="" id="tempImage5" name="tempImage5" />
					                </div>
					                <div id="preview-bagasi"></div>
                            	</td>
                            	</form>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                        </table>
                    </div>
           		</fieldset>
           		<fieldset class="formGroupBox">
                    <legend class="formTitleMenu">Data Warna</legend>
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
	                                <button class="btn btn-blue" type="button" name="addColor" id="addColor" value="">Add</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                	<input type="hidden" id="rowCount" name="rowCount" value="" />
                                </td>
                            </tr>
                            <!--
                            <tr><td>&nbsp;</td></tr>
                            <tr>
                            	<form action="" method="post" enctype="multipart/form-data">
                            		<input class="browsetext" type="file" name="upload[]" size="20" multiple accept="image/*" />
							   		<input class="btn btn-blue" type="submit" value="Upload">
							   </form>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                            -->
                        </table>
                    </div>
                    
                    <table class="form" cellspacing="0">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
                        <tr>                                                                                                                                                                                                                                                                                                          
                            <td colspan="2" style="width: 600px;">  
                            	<div class="block" style="padding: 20px 20px 0px 20px;">   
                                	<table class="table-css" width="100%">
                                        <tr>
                                        	<th><center>Kode Warna</center></th>
                                        	<th><center>Nama Warna</center></th>
                                        	<th><center>Klik untuk hapus</center></th>
                                        </tr>
            							<?php foreach($warna as $row)
            							{
            								 echo "<tr> 
            									 	   <td><center>".$row->nama_warna."<input type='hidden' id='warna[]' name='warna[]' value='".$row->nama_warna."' /></center></td>
            									 	   <td><center>".$row->kode_warna."<input type='hidden' id='warna[]' name='warna[]' value='".$row->kode_warna."' /></center></td>
            									 	   <td class='removeColor'><center>Hapus warna</center></td>
            								 	   </tr>";
            							} ?>                                        
              						</table>  
                           		</div>
                            </td>
                        </tr>
                    </table>
                    
                    
                      
           		</fieldset>
           		<div class="formButton">
                    <button class="btn btn-blue" type="submit" value="Submit">Save</button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-blue" type="reset" value="Reset">Kosongkan seluruh field</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
	$(document).ready(function()
	{
		var count = 0;
		
        $('#image0').live('change', function(){ $('#tempImage0').val($('#image0').val()); });
        $('#image1').live('change', function(){ $('#tempImage1').val($('#image1').val()); });
        $('#image2').live('change', function(){ $('#tempImage2').val($('#image2').val()); });
        $('#image3').live('change', function(){ $('#tempImage3').val($('#image3').val()); });
        $('#image4').live('change', function(){ $('#tempImage4').val($('#image4').val()); });
        $('#image5').live('change', function(){ $('#tempImage5').val($('#image5').val()); });
        
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