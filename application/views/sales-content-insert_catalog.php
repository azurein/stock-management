 <div class="grid_12">
    <div class="box round first fullpage">
        <h2>Tambah Katalog Mobil</h2>
        <div id="kiri2">
        	<?php echo form_open_multipart("index.php/sales_site/insertCatalog");?>
            <div class="block ">
               	<fieldset class="formGroupBox">
                    <legend class="formTitleMenu">Data Dasar</legend>
                    <div class="formMenu">
                        <table width="800">
                        	<tr>
                                <td><label id="label_idInspeksi">Nama model mobil</label></td>
                                <td>
		                            <input type="text" id="modelname" name="modelname" placeholder="Masukkan nama model" size="50" value="" />
	                                <p class="line_error" id="error_model"></p>
	                                <div class="line_error"><?php echo form_error('modelname'); ?></div>
                                </td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                            <tr>
                                <td><label id="label_idInspeksi">Periode</label></td>
                                <td>
		                            <input type="text" id="periode" name="periode" placeholder="Masukkan tahun dari versi mobil" size="50" value="" />
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
					                	<input type="hidden" id="tempImage0" name="tempImage0" />
					                </div>
                                </td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                            <tr>
                                <td><label id="label_idInspeksi">Unggah foto utama</label></td>
                                <td>
		                            <div class="textfield-unggah">
					                    <input type="file" id="image1" name="image1" size="20" >
					                	<input type="hidden" id="tempImage1" name="tempImage1" />
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
					                	<input type="hidden" id="tempImage2" name="tempImage2" />
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
					                	<input type="hidden" id="tempImage3" name="tempImage3" />
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
					                	<input type="hidden" id="tempImage4" name="tempImage4" />
					                </div>
					                <div id="preview-bangku"></div>
                            	</td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                            <tr>
                            	<td>
                            		<div class="label">Unggah Foto Bagasi</div>
					                <br />
					                <div class="textfield-unggah">
					                    <input type="file" id="image5" name="image5" size="20" >
					                	<input type="hidden" id="tempImage5" name="tempImage5" />
					                </div>
					                <div id="preview-bagasi"></div>
                            	</td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                        </table>
                    </div>
           		</fieldset>
           		<fieldset class="formGroupBox">
                    <legend class="formTitleMenu">Model Tiga Dimensi</legend>
                    <div class="formMenu">
                        <table width="800">
                        	<tr>
                        		<td>
	                        		<div class="label">Unggah foto-foto untuk 3D view</div>
					                <br />
					                <div class="textfield-unggah">
					                	<input type="file" id="image7" name="image7" size="20" multiple />
					                	<input type="hidden" id="tempImage7" name="tempImage7" />
					                </div>
                        		</td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                        </table>
                    </div>
           		</fieldset>
           		
           		<table class="form" cellspacing="0">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
                    <tr>                                                                                                                                                                                                                                                                                                          
                        <td colspan="2" style="width: 600px;">                                                                                                                                                                                                                                                                    
                            <fieldset class="formGroupBox">                                                                                                                                                                                                                                                
                                <legend class="formTitleMenu">Data Tipe</legend>   
                                
									<div class="formMenu">
				                        <table width="800">
				                        	<tr>
				                                <td><label id="label_idInspeksi">Tipe Mobil</label></td>
				                                <td>
						                            <input type="text" id="tipe_mobil" name="tipe_mobil" placeholder="Masukkan tipe_mobil" size="50" value="" />
					                                <p class="line_error" id="error_tipe"></p>
					                                <div class="line_error"><?php echo form_error('tipe_mobil'); ?></div>
				                                </td>
				                            </tr>
				                            <tr><td>&nbsp;</td></tr>
				                            <tr>
				                                <td><label id="label_idInspeksi">Transmisi</label></td>
				                                <td>
						                            <input type="radio" name="rd_trans" value="M/T" />Manual
						                            <input type="radio" name="rd_trans" value="A/T" />Automatic
					                                <p class="line_error" id="error_trans"></p>
					                                <div class="line_error"><?php echo form_error('transmisi'); ?></div>
				                                </td>
				                            </tr>
				                            <tr><td>&nbsp;</td></tr>
				                            <tr>
				                                <td></td>
				                                <td>
					                                <button type="button" name="addType" id="addType" onclick="addType()" value="">Tambah tipe</button>&nbsp;&nbsp;&nbsp;&nbsp;
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
                                                                                                                                                                                                                                                                                  
                                    <div class="block" style="padding: 20px 20px 0px 20px;">                                                                                                                                                                                                                                      
										<table id="tableKhusus" class="table-css" width="100%">                                                                                                                                                                                                                                       
											<thead>                                                                                                                                                                                                                                                                                   
												<tr>
													<th><center>Tipe Mobil</center></th>
													<th><center>Transmisi</center></th>
													<th><center>Klik untuk hapus</center></th>	                                                                                                                                                                                                                                          
												</tr>                                                                                                                                                                                                                                                                                  
											</thead>                                                                                                                                                                                                                                                                                  
											<tbody id="loadCar"></tbody>                                                                                                                                                                                                                                                                                  
										</table>
									</div>
									
							</fieldset>
						</td>
					</tr>
				</table>                                                     
           		
           		<div class="formButton">
                    <button class="btn btn-blue" type="submit" value="Submit">Save</button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-blue" type="reset" value="Reset">Reset</button>
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
        $('#image6').live('change', function(){ $('#tempImage6').val($('#image6').val()); });
        $('#image7').live('change', function(){ $('#tempImage7').val($('#image6').val()); });
        
		$('#addType').live('click',function(){
		    $(this).val('Delete');
		    $(this).attr('class','del');
		 	count++;
		 	var tempTipe = $('#tipe_mobil').val();
		 	var tempTrans = $('input:radio[name=rd_trans]:checked').val();
		    var append = "<tr><td>"+tempTipe+"<input type='hidden' id='tipe[]' name='tipe[]' value="+tempTipe.replace(/\s+/g, '-').toLowerCase()+" /></td><td>"+tempTrans+"<input type='hidden' id='transmisi[]' name='transmisi[]' value="+tempTrans.replace(/\s+/g, '-').toLowerCase()+" /></td><td class='removeType'>Hapus tipe ini</td></tr>";
		    $("tr:last").after(append);
		    $("#rowCount").val(count);
		});
		
	    $('.removeType').live('click',function(){
		    $(this).parent().remove();
		    count--;
		    $("#rowCount").val(count);
		});
	});

</script>