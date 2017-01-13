 <div class="grid_12">
    <div class="box round first fullpage">
        <h2>Masukkan Detil Harga <?php foreach ($car as $row) { echo $row->nama_mobil; } ?> <?php echo $tipe; ?></h2>
        <div class="block">
        <?php echo form_open("index.php/manager_site/insertDetilHarga/".$id."/".$tipe);?>
	        <fieldset class="formGroupBox">
                <legend class="formTitleMenu">Tunai</legend>
                <div class="formMenu">
                    <table width="800">
                   		<input type="hidden" name="tipemobil" id="tipemobil" value="<?php echo $tipe; ?>" />
                   		<?php foreach ($tunai as $row) {
							echo '
							<tr>
                                <td><label id="label_idInspeksi">Harga tunai</label></td>
                                <td>
		                            <input type="text" id="hargaTunai" name="hargaTunai" placeholder="Masukkan harga tunai" size="50" value="'.$row->harga_tunai.'" />
	                                <p class="line_error" id="error_warna"></p>
	                                <div class="line_error">'.form_error("hargaTunai").'</div>
                                </td>
                            </tr>
                            <tr>
                                <td><label id="label_idInspeksi">Persentase DP</label></td>
                                <td>
		                            <input type="text" id="perdp" name="perdp" placeholder="Masukkan persentase DP" size="50" value="'.$row->persentase_dp.'" />
	                                <p class="line_error" id="error_warna"></p>
	                                <div class="line_error">'.form_error("perdp").'</div>
                                </td>
                            </tr>
                            <tr>
                                <td><label id="label_idInspeksi">Harga asuransi pertahun</label></td>
                                <td>
		                            <input type="text" id="hap" name="hap" placeholder="Masukkan harga angsuran pertahun" size="50" value="'.$row->harga_asuransi_pertahun.'" />
	                                <p class="line_error" id="kode_warna"></p>
	                                <div class="line_error">'.form_error("hap").'</div>
                                </td>
                            </tr>
							';
						}?>
                    </table>
                </div>
           	</fieldset>
           	<fieldset class="formGroupBox">
                <legend class="formTitleMenu">Kredit</legend>
                <div class="formMenu">
                    <table width="800">
                    	<tr>
                            <td><label id="label_idLeasing">ID Leasing</label></td>
                            <td>
	                            <select id="leasing" name="leasing" style="width:200px;">
									<?php foreach ($leasing as $row2) echo '<option value="'.$row2->id_leasing.'">'.$row2->nama_leasing.'</option>';?>
								</select>
								<button class="btn btn-blue" type="button" id="loadKredit">Cari</button>
							</td>
						</tr>
                    </table>
                    <table class="form" cellspacing="0">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
		                <tr>                                                                                                                                                                                                                                                                                                          
		                    <td style="width: 600px;">  
				            	<table class="table-css" width="65%" >                                                                                                                                                                                                                                       
									<thead>                                                                                                                                                                                                                                                                                   
										<tr>
											<th><center>Lama Angsuran</center></th>
											<th><center>Harga Kredit</center></th>                                                                                                                                                                                                                                        
										</tr>                                                                                                                                                                                                                                                                                  
									</thead>                                                                                                                                                                                                                                                                                  
									<tbody>
										<tr>
											<td>11 Bulan</td>
											<td>
												<input size="40" type="text" name="kredit_11" id="kredit_11" />
											</td>
										</tr>
										<tr>
											<td>23 Bulan</td>
											<td>
												<input size="40" type="text" name="kredit_23" id="kredit_23" />
											</td>
										</tr>
										<tr>
											<td>35 Bulan</td>
											<td>
												<input size="40" type="text" name="kredit_35" id="kredit_35" />
											</td>
										</tr>
										<tr>
											<td>47 Bulan</td>
											<td>
												<input size="40" type="text" name="kredit_47" id="kredit_47" />
											</td>
										</tr>
										<tr>
											<td colspan="2"><button type="button" id="saveKredit" class="btn btn-blue" value="Save">Simpan rate leasing</button></td>
										</tr>
									</tbody>                                                                                                                                                                                                                                                                                  
								</table>
				           </td>
			           </tr>
		           </table>
                </div>
           	</fieldset>
           	<table>
           	<tr>
	            <td></td>
	        	<td>
	                <div class="formButton">
	                    <button class="btn btn-blue" type="submit" value="Submit">Finalisasi</button>&nbsp;&nbsp;&nbsp;&nbsp;
	                    <button class="btn btn-blue" type="reset" value="Reset">Kosongkan seluruh field</button>
	                </div>
	        	</td>
	        </tr> 	
	        </table>
		</div>
    </div>
</div>
<?php echo form_close(); ?>

<script>
	$('#loadKredit').click(function(){
		$.ajax({
			type:"POST",
			url:"<?php echo site_url('index.php/manager_site/getKredit_11');?>",
			data: { tipe: $("#tipemobil").val(), id: $("#leasing").val() },
			cache:false,
			success:function(html){
				$('#kredit_11').val(html)
			}
		});	
		$.ajax({
			type:"POST",
			url:"<?php echo site_url('index.php/manager_site/getKredit_23');?>",
			data: { tipe: $("#tipemobil").val(), id: $("#leasing").val() },
			cache:false,
			success:function(html){
				$("#kredit_23").val(html)
			}
		});
		$.ajax({
			type:"POST",
			url:"<?php echo site_url('index.php/manager_site/getKredit_35');?>",
			data: { tipe: $("#tipemobil").val(), id: $("#leasing").val() },
			cache:false,
			success:function(html){
				$("#kredit_35").val(html)
			}
		});
		$.ajax({
			type:"POST",
			url:"<?php echo site_url('index.php/manager_site/getKredit_47');?>",
			data: { tipe: $("#tipemobil").val(), id: $("#leasing").val() },
			cache:false,
			success:function(html){
				$("#kredit_47").val(html)
			}
		});
	});
	
	$('#saveKredit').click(function(){
		$.ajax({
			type:"POST",
			url:"<?php echo site_url('index.php/manager_site/saveKredit');?>",
			data: { 
				id: $("#leasing").val(),
				tipe: $("#tipemobil").val(),  
				kredit_11: $.trim($("#kredit_11").val()),
				kredit_23: $.trim($("#kredit_23").val()),
				kredit_35: $.trim($("#kredit_35").val()),
				kredit_47: $.trim($("#kredit_47").val()) 
			},
			cache:false,
			success:function(html){
				alert("Rate kredit untuk leasing ini telah diubah.");
			}
		});	
	});
</script>