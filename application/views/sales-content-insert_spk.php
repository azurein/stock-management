 <div class="grid_12">
 	<div id="information">
		<?php echo $this->session->flashdata('info'); ?>
 	</div>	
    <div class="box round first fullpage">
        <h2>Surat Pesanan Kendaraan</h2>
        <?php echo form_open("index.php/sales_site/insertSPK"); ?>
        <div class="block ">
            <!--SPK Mulai!-->
	            <div class="formMenu">
	                <table width="800">
	                    <tr>
	                        <td>
	                            <label>No. SPK</label>
	                        </td>
	                        <td>
	                        	<table>
	                        		<tr>
	                        			<td>
	                        				<input type="text" name="noSPK" id="noSPK" placeholder="Nomor SPK" size="50"/>
	                        				<div class="line_error"><?php echo form_error('noSPK'); ?></div>
	                        				<div class="line_error" id="errorSPK"></div>
	                        			</td>
	                        			<td><button type="button" id="searchSPK">Cari SPK</button></td>
	                        		</tr>
	                        	</table>
	                        </td>
	                    </tr>
	                </table> 
	            </div>
            <!--SPK Selesai!-->            
             
            <!--Table Pembayaran Mulai!-->
            <table class="form" cellspacing="0">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
                <tr>                                                                                                                                                                                                                                                                                                          
                    <td colspan="2" style="width: 600px;">  
			            <fieldset class="formGroupBox">
				            <legend class="formTitleMenu">Pembayaran</legend>
				            	<div class="block" style="padding: 20px 20px 0px 20px;">   
					            	<table id="tableKhusus" class="table-css" width="100%" >                                                                                                                                                                                                                                       
										<thead>                                                                                                                                                                                                                                                                                   
											<tr>
												<th><center>No. Kwitansi</center></th>
												<th><center>Nilai Uang</center></th>
												<th><center>Tanggal Penerimaan Pembayaran</center></th>	                                                                                                                                                                                                                                          
											</tr>                                                                                                                                                                                                                                                                                  
										</thead>                                                                                                                                                                                                                                                                                  
										<tbody id="loadPembayaran"></tbody>                                                                                                                                                                                                                                                                                  
									</table>
				           		</div>
			            </fieldset>
		           </td>
	           </tr>
           </table>
	         	
            
            <!--Table Pembayaran Selesai!-->
            
            
            
            <!--Customer Detail Mulai!-->
                 <fieldset class="formGroupBox">
                    <legend class="formTitleMenu">Customer</legend>
                    <div class="formMenu">
                        <table width="800">
                            <tr>
                                <td>
                                    <label>No. KTP</label>
                                </td>
                                <td>
                                    <input type="text" id="cust_autoktp" name="customer_noKTP" placeholder="Masukan No. KTP" size="50"/>
                                	<div class="line_error"><?php echo form_error('customer_noKTP'); ?></div>
                                </td>
                            </tr>
                            <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                            <tr>
                                <td>
                                    <label>Nama Lengkap</label>
                                </td>
                                <td>
                                    <input type="text" id="cust_autoname" name="customer_nama" placeholder="Masukan Nama sesuai KTP" size="50"/>
                                	<div class="line_error" id="error_custname"><?php echo form_error('customer_nama'); ?></div>
                                </td>
                            </tr>
                            <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                            <tr>
                                <td>
                                    <label>Nomor Telepon</label>
                                </td>
                                <td id="cust_autotele">
                                    <input type="text" name="customer_telp" placeholder="Masukkan Nomor Telepon" size="50"/>
                                	<div class="line_error" id="error_telp"><?php echo form_error('customer_telp'); ?></div>
                                </td>
                            </tr>
                            <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                            <tr>
                                <td style="vertical-align: top;">
                                    <label>Alamat</label>
                                </td>
                                <td id="cust_autoadrs">
                                    <textarea rows="4" cols="38" name="customer_alamat" style="resize: none;" placeholder="Masukan Alamat"></textarea>
                                	<div class="line_error" id="error_address"><?php echo form_error('customer_alamat'); ?></div>
                                </td>
                            </tr>
                            <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                            <tr>
                                <td>
                                    <label>Kode Pos</label>
                                </td>
                                <td id="cust_autozip">
                                    <input type="text" name="customer_zipcode" placeholder="Masukan Kode Pos" size="50"/>
                                    <div class="line_error" id="error_zip"><?php echo form_error('customer_zipcode'); ?></div>
                                </td>
                            </tr>
                            <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                            <tr>
                                <td>
                                    <label>No. NPWP</label>
                                </td>
                                <td>
                                    <input type="text" name="customer_noNPWP" placeholder="Masukan No. NPWP" size="50"/>
                                </td>
                            </tr>
                        </table>
                    </div>
                 </fieldset>
            <!--Custoner Detail Selesai!-->
            
            <!--pilih mobil Mulai!-->
            
                 <fieldset class="formGroupBox">
                    <legend class="formTitleMenu">Pilih Mobil</legend>
                    <div class="formMenu">
			            <table>
				    		<tr>
				    			<td><label style="padding-right: 58px">Nama Mobil</label></td>
				    			<td><label style="padding-right: 58px">Tipe Mobil</label></td>
				    			<td><label style="padding-right: 58px">Warna Mobil</label></td>
				    		</tr>
				    		<tr>
				    			<td><select size="8" name="namaMobil" id="namaMobil">
				    				<?php foreach($mobil as $row) {
				    				?> <option selected="selected" "><?= $row->nama_mobil ?></option> 
				    				<?php
									;} ?>
								</select></td>
				    			<td><select size="8" name="tipeMobil" id="tipeMobil"></select></td>
				    			<td><select size="8" name="warnaMobil" id="warnaMobil"></select></td>
				    		</tr>
				    	</table>
				    	<button type="button" id="searchFromKatalog">Cari Harga</button>
                    </div><br />
                 </fieldset>
            <!--pilih mobil Selesai!-->
           
            <!--Pembayaran Mulai!-->
                 <fieldset class="formGroupBox" id="input_pembayaran">
                    <legend class="formTitleMenu">Pembayaran</legend>
                    <div class="formMenu">
                        <table width="800">
                            <tr>
                                <td>
                                    <label>Jenis Pembayaran</label>
                                </td>
                                <td>
                                    <select onchange="hitungAngsuran(),showKredit(),hitungTotal();" id="jenis" name="jenis" style="width: 150px;">
                                        <option value="tunai">Tunai</option>
                                        <option value="kredit">Kredit</option>
                                    </select>
                                </td>
                            </tr>
                            <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                            <tr>
                                <td>
                                    <label>Booking Fee</label>
                                </td>
                                <td>
                                    <select id="booking_fee" name="booking_fee" style="width: 150px;">
                                        <option value="5">5000000</option>
                                        <option value="10">10000000</option>
                                    </select>
                                </td>
                            </tr>
                            <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                            <tr>
                                <td>
                                    <label>Harga Kendaraan</label>
                                </td>
                                <td>
                                    <input readonly="readonly" type="text" id="harga" name="harga" size="50" />
                                    <div class="line_error" id="error_carprice"><?php echo form_error('hargaKendaraan'); ?></div>
                                    <p class="line_error" id="error_harga_kend"></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Jumlah DP</label>
                                </td>
                                <td>
                                	<input id="tempDP" readonly="readonly" type="text" name="jumlahDP" id="jumlahDP" placeholder="30% dari harga kendaraan" size="50" />
					            	<div id="lamaAngsuranz"></div>
					            	<div id="hapz"></div>
                                </td>
                            </tr>
                        </table>   
                    </div>
                 </fieldset>
            <!--Pembayaran Selesai!-->
            	<input type="hidden" id="tempAsuransi" name="tempAsuransi" values="" />
            	<div id="hargaKreditz11"><input type="hidden" id="kredit11" name="kredit11" values="" /></div>
            	<div id="hargaKreditz23"><input type="hidden" id="kredit23" name="kredit23" values="" /></div>
            	<div id="hargaKreditz35"><input type="hidden" id="kredit35" name="kredit35" values="" /></div>
            	<div id="hargaKreditz47"><input type="hidden" id="kredit47" name="kredit47" values="" /></div>
            <!--Pembayaran Kredit Detail Mulai!-->
                 <fieldset class="formGroupBox" id="kredit_showhide">
                    <legend class="formTitleMenu">Detail Pembayaran Kredit</legend>
                    <div class="formMenu">
                        <table width="800">
                        	<tr>
                                <td>
                                    <label>Pilih Leasing</label>
                                </td>
                                <td>
                                    <select id="leasing" name="leasing" style="width:200px;">
										<?php foreach ($leasing as $row2) echo '<option value="'.$row2->id_leasing.'">'.$row2->nama_leasing.'</option>';?>
									</select>
                                </td>
                            </tr>
                            <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                            <tr>
                                <td>
                                    <label>Lama Cicilan</label>
                                </td>
                                <td>
                                    <select id="lama_cicilan" name="lama_cicilan" style="width: 150px;">
                                        <option value="11">11 Bulan</option>	
                                        <option value="23">23 Bulan</option>
                                        <option value="35">35 Bulan</option>
                                        <option value="47">47 Bulan</option>
                                    </select>
                                </td>
                            </tr>
                            <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                            <tr>
                                <td>
                                    <label>Angsuran per bulan</label>
                                </td>
                                <td>
                                	<input readonly="readonly"type="text" name="angsuranPerBulan" id="angsuranPerBulan" placeholder="Hitung otomatis berdasarkan lama cicilan" size="50" />
                                </td>
                            </tr>
                        </table>
                    </div>
                 </fieldset>         
            <!--Pembayaran Kredit Detail Selesai!-->
            
            <!--Asuransi Mulai!-->
                 <fieldset class="formGroupBox">
                    <legend class="formTitleMenu">Asuransi</legend>
                    <div class="formMenu">
                        <table width="800">
                            <tr id="input_asuransi">
                                <td>
                                    <label><input onchange="hitungAsuransi(),hitungTotal();" type="checkbox" id="pilihAsuransi" name="pilihAsuransi" style="vertical-align: middle;"/>&nbsp;Tambah Asuransi</label>
                                </td>
                                <td></td>
                            </tr>
                            <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                            <tr id="asuransi_showhide" style="display: none">
                                <td>
                                    <label>Jumlah Premi Asuransi</label>
                                </td>
                                <td>
                                	<input readonly="readonly" type="text" name="premiAsuransi" id="premiAsuransi" placeholder="Hitung otomatis berdasarkan harga kendaraan" size="50" />
                                </td>
                            </tr>
                            <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                             <tr>
                                <td>
                                    <label>Total Pembayaran</label>
                                </td>
                                <td>
                                	<input readonly="readonly" type="text" name="totalPembayaran" id="totalPembayaran" size="50" value="0" />
                                </td>
                            </tr>
                        </table>
                    </div>
                 </fieldset>
            <!--Asuransi Selesai!-->
        
            <div class="formButton">
                <button class="btn btn-blue" type="submit" id="submit_btn" value="Submit">Submit SPK</button>&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn btn-blue" type="reset" value="Reset">Kosongkan seluruh field</button>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>

<script>
	$(document).ready(function() {
		var counter = 0;
		var availableCustId = [];
		var availableCustName = [];
		var idtoname = [];
		var nametoid = [];
		
		$("#input_pembayaran").hide();
		$("#input_asuransi").hide();
		$("#kredit_showhide").hide();
		
		// error disini
		<?php foreach($cust as $row) { ?> availableCustId.push( "<?php echo $row->no_KTP ?>" ); <?php } ?>
		<?php foreach($cust as $row) { ?> availableCustName.push( "<?php echo $row->nama_customer ?>" ); <?php } ?>
		
		for (var i=0; i < availableCustId.length; i++) {
		  idtoname[i] = availableCustId[i]+" / "+availableCustName[i];
		}; 
		for (var i=0; i < availableCustName.length; i++) {
		  nametoid[i] = availableCustName[i]+" / "+availableCustId[i];
		}; 

	    $("input#cust_autoktp").autocomplete({
	    	source: idtoname,
	    	change: function( event, ui ) {
				var ktp = $("#cust_autoktp").val();
				var data = ktp.split("/");
				$("#cust_autoktp").val(data[0].trim());
				$("#cust_autoname").val(data[1].trim());
				
				$.ajax({
					type:"POST",
					url:"<?php echo site_url('index.php/sales_site/getTele');?>",
					data:'idcust='+$('#cust_autoktp').val(),
					cache:false,
					success:function(html){
						$('#cust_autotele').html(html);
					}
				});
				
				$.ajax({
					type:"POST",
					url:"<?php echo site_url('index.php/sales_site/getAddress');?>",
					data:'idcust='+$('#cust_autoktp').val(),
					cache:false,
					success:function(html){
						$('#cust_autoadrs').html(html);
					}
				});
				
				$.ajax({
					type:"POST",
					url:"<?php echo site_url('index.php/sales_site/getZipCode');?>",
					data:'idcust='+$('#cust_autoktp').val(),
					cache:false,
					success:function(html){
						$('#cust_autozip').html(html);
					}
				});
			}
		});
		
		$("input#cust_autoname").autocomplete({
	    	source: nametoid,
	    	change: function( event, ui ) {
				var name = $("#cust_autoname").val();
				var data = name.split("/");
				$("#cust_autoname").val(data[0].trim());
				$("#cust_autoktp").val(data[1].trim());
				
				$.ajax({
					type:"POST",
					url:"<?php echo site_url('index.php/sales_site/getTele');?>",
					data:'idcust='+$('#cust_autoktp').val(),
					cache:false,
					success:function(html){
						$('#cust_autotele').html(html);
					}
				});
				
				$.ajax({
					type:"POST",
					url:"<?php echo site_url('index.php/sales_site/getAddress');?>",
					data:'idcust='+$('#cust_autoktp').val(),
					cache:false,
					success:function(html){
						$('#cust_autoadrs').html(html);
					}
				});
				
				$.ajax({
					type:"POST",
					url:"<?php echo site_url('index.php/sales_site/getZipCode');?>",
					data:'idcust='+$('#cust_autoktp').val(),
					cache:false,
					success:function(html){
						$('#cust_autozip').html(html);
					}
				});
			}
		});
		
		$('#searchSPK').click(function(){
			$.ajax({
				type:"POST",
				url:"<?php echo site_url('index.php/sales_site/cekSPK');?>",
				data:'num='+$("#noSPK").val(),
				cache:false,
				success:function(html){
					$('#errorSPK').html(html);
					if($.trim(html) == "Nomor SPK ini dapat diproses.") {
						document.getElementById("submit_btn").type = "submit";
					}
					else {
						document.getElementById("submit_btn").type = "button";
					}
				}
			});
			
			$.ajax({
				type:"POST",
				url:"<?php echo site_url('index.php/sales_site/loadPembayaran');?>",
				data:'num='+$("#noSPK").val(),
				cache:false,
				success:function(html){
					$('#loadPembayaran').html(html);
				}
			});			
		});	
			
		$('#namaMobil').change(function(){
			$.ajax({
				type:"POST",
				url:"<?php echo site_url('index.php/sales_site/getType');?>",
				data:'nama='+$("#namaMobil").val(),
				cache:false,
				success:function(html){
					$('#tipeMobil').html(html);
				}
			});
			
			$.ajax({
				type:"POST",
				url:"<?php echo site_url('index.php/sales_site/getColor');?>",
				data:'nama='+$("#namaMobil").val(),
				cache:false,
				success:function(html){
					$('#warnaMobil').html(html);
				}
			});
			
			$("#input_pembayaran").hide();
			$("#input_asuransi").hide();
			$("#kredit_showhide").hide();
			$('#jenis option')[0].selected = true;
			$('#totalPembayaran').val("0");
		});	
	
		$('#tipeMobil').change(function(){
			$("#input_pembayaran").hide();
			$("#input_asuransi").hide();
			$("#kredit_showhide").hide();
			$('#jenis option')[0].selected = true;
			$('#totalPembayaran').val("0");
		});
	
		$('#searchFromKatalog').click(function(){
			if($('#namaMobil').val() != null && $('#tipeMobil').val() != null && $('#warnaMobil').val() != null)
			{
				$.ajax({
					type:"POST",
					url:"<?php echo site_url('index.php/sales_site/get_DP');?>",
					data:'tipe='+$("#tipeMobil").val(),
					cache:false,
					success:function(html){
						$('#tempDP').val($.trim(html));
					}
				});
				
				$.ajax({
					type:"POST",
					url:"<?php echo site_url('index.php/sales_site/get_hargaTunai');?>",
					data:'tipe='+$("#tipeMobil").val(),
					cache:false,
					success:function(html){
						$('#harga').val($.trim(html));
						var harga = parseInt( html / 1000);
						var bf = parseInt ( $('#booking_fee').val() * 1000);
						var total = harga + bf;
						$('#totalPembayaran').val(total+"000");
					}
				});
				
				$("#input_pembayaran").show();
				$("#input_asuransi").show();
			}
			else
			{
				alert("Silahkan pilih nama, tipe, dan warna mobil yang tersedia di list.");
			}
		});	

		$('#jenis').change(function(){
			if($('#jenis').val() == "tunai") {
				document.getElementById('kredit_showhide').style.display = "none";
				$.ajax({
					type:"POST",
					url:"<?php echo site_url('index.php/sales_site/get_DP');?>",
					data:'tipe='+$("#tipeMobil").val(),
					cache:false,
					success:function(html){
						$('#tempDP').val($.trim(html));
					}
				});
				
				$.ajax({
					type:"POST",
					url:"<?php echo site_url('index.php/sales_site/get_hargaTunai');?>",
					data:'tipe='+$("#tipeMobil").val(),
					cache:false,
					success:function(html){
						$('#harga').val($.trim(html));
						var harga = parseInt( html / 1000);
						var bf = parseInt ( $('#booking_fee').val() * 1000);
						var total = harga + bf;
						$('#totalPembayaran').val(total+"000");
					}
				});
			}
			else if($('#jenis').val() == "kredit") {
				document.getElementById('kredit_showhide').style.display = "block";
				$.ajax({
					type:"POST",
					url:"<?php echo site_url('index.php/sales_site/get_hargaKredit_11');?>",
					data:'tipe='+$("#tipeMobil").val(),
					cache:false,
					success:function(html){
						if($('#lama_cicilan').val() == "11") {
							$.ajax({
								type:"POST",
								url:"<?php echo site_url('index.php/sales_site/get_hargaKredit_11');?>",
								data:{ tipe: $("#tipeMobil").val(), id: $("#leasing").val() },
								cache:false,
								success:function(html){
									$('#harga').val($.trim(html));
									var total = 0;
									var harga = parseInt( html / 1000);
									var bf = parseInt ( $('#booking_fee').val() * 1000);
									total = harga + bf;
									$('#totalPembayaran').val(total+"000");
									var angsuran = ( harga / 11 ) * 1000;
									$('#angsuranPerBulan').val(Math.round(angsuran));
								}
							});
						}
						else if($('#lama_cicilan').val() == "23") {
							$.ajax({
								type:"POST",
								url:"<?php echo site_url('index.php/sales_site/get_hargaKredit_23');?>",
								data:{ tipe: $("#tipeMobil").val(), id: $("#leasing").val() },
								cache:false,
								success:function(html){
									$('#harga').val($.trim(html));
									var total = 0;
									var harga = parseInt( html / 1000);
									var bf = parseInt ( $('#booking_fee').val() * 1000);
									total = harga + bf;
									$('#totalPembayaran').val(total+"000");
									var angsuran = ( harga / 23 ) * 1000;
									$('#angsuranPerBulan').val(Math.round(angsuran));
								}
							});
						}
						else if($('#lama_cicilan').val() == "35") {
							$.ajax({
								type:"POST",
								url:"<?php echo site_url('index.php/sales_site/get_hargaKredit_35');?>",
								data:{ tipe: $("#tipeMobil").val(), id: $("#leasing").val() },
								cache:false,
								success:function(html){
									$('#harga').val($.trim(html));
									var total = 0;
									var harga = parseInt( html / 1000);
									var bf = parseInt ( $('#booking_fee').val() * 1000);
									total = harga + bf;
									$('#totalPembayaran').val(total+"000");
									var angsuran = ( harga / 35 ) * 1000;
									$('#angsuranPerBulan').val(Math.round(angsuran));
								}
							});
						}
						else if($('#lama_cicilan').val() == "47") {
							$.ajax({
								type:"POST",
								url:"<?php echo site_url('index.php/sales_site/get_hargaKredit_47');?>",
								data:{ tipe: $("#tipeMobil").val(), id: $("#leasing").val() },
								cache:false,
								success:function(html){
									$('#harga').val($.trim(html));
									var total = 0;
									var harga = parseInt( html / 1000);
									var bf = parseInt ( $('#booking_fee').val() * 1000);
									total = harga + bf;
									$('#totalPembayaran').val(total+"000");
									var angsuran = ( harga / 47 ) * 1000;
									$('#angsuranPerBulan').val(Math.round(angsuran));
								}
							});
						}
						var asr = parseInt( $.trim(html) ) / 1000;
						var total = parseInt( $('#totalPembayaran').val() ) / 1000;
						total += asr;
						$('#totalPembayaran').val(total+"000");
					}
				});
			}
		});	
		
		$('#leasing').change(function(){
			$('#harga').val("");
			if($('#lama_cicilan').val() == "11") {
				$.ajax({
					type:"POST",
					url:"<?php echo site_url('index.php/sales_site/get_hargaKredit_11');?>",
					data:{ tipe: $("#tipeMobil").val(), id: $("#leasing").val() },
					cache:false,
					success:function(html){
						$('#harga').val($.trim(html));
						var total = 0;
						var harga = parseInt( html / 1000);
						var bf = parseInt ( $('#booking_fee').val() * 1000);
						total = harga + bf;
						$('#totalPembayaran').val(total+"000");
						var angsuran = ( harga / 11 ) * 1000;
						$('#angsuranPerBulan').val(Math.round(angsuran));
					}
				});
			}
			else if($('#lama_cicilan').val() == "23") {
				$.ajax({
					type:"POST",
					url:"<?php echo site_url('index.php/sales_site/get_hargaKredit_23');?>",
					data:{ tipe: $("#tipeMobil").val(), id: $("#leasing").val() },
					cache:false,
					success:function(html){
						$('#harga').val($.trim(html));
						var total = 0;
						var harga = parseInt( html / 1000);
						var bf = parseInt ( $('#booking_fee').val() * 1000);
						total = harga + bf;
						$('#totalPembayaran').val(total+"000");
						var angsuran = ( harga / 23 ) * 1000;
						$('#angsuranPerBulan').val(Math.round(angsuran));
					}
				});
			}
			else if($('#lama_cicilan').val() == "35") {
				$.ajax({
					type:"POST",
					url:"<?php echo site_url('index.php/sales_site/get_hargaKredit_35');?>",
					data:{ tipe: $("#tipeMobil").val(), id: $("#leasing").val() },
					cache:false,
					success:function(html){
						$('#harga').val($.trim(html));
						var total = 0;
						var harga = parseInt( html / 1000);
						var bf = parseInt ( $('#booking_fee').val() * 1000);
						total = harga + bf;
						$('#totalPembayaran').val(total+"000");
						var angsuran = ( harga / 35 ) * 1000;
						$('#angsuranPerBulan').val(Math.round(angsuran));
					}
				});
			}
			else if($('#lama_cicilan').val() == "47") {
				$.ajax({
					type:"POST",
					url:"<?php echo site_url('index.php/sales_site/get_hargaKredit_47');?>",
					data:{ tipe: $("#tipeMobil").val(), id: $("#leasing").val() },
					cache:false,
					success:function(html){
						$('#harga').val($.trim(html));
						var total = 0;
						var harga = parseInt( html / 1000);
						var bf = parseInt ( $('#booking_fee').val() * 1000);
						total = harga + bf;
						$('#totalPembayaran').val(total+"000");
						var angsuran = ( harga / 47 ) * 1000;
						$('#angsuranPerBulan').val(Math.round(angsuran));
					}
				});
			}
		});	
		
		$('#lama_cicilan').change(function(){
			$('#harga').val("");
			if($('#lama_cicilan').val() == "11") {
				$.ajax({
					type:"POST",
					url:"<?php echo site_url('index.php/sales_site/get_hargaKredit_11');?>",
					data:{ tipe: $("#tipeMobil").val(), id: $("#leasing").val() },
					cache:false,
					success:function(html){
						$('#harga').val($.trim(html));
						var total = 0;
						var harga = parseInt( html / 1000);
						var bf = parseInt ( $('#booking_fee').val() * 1000);
						total = harga + bf;
						$('#totalPembayaran').val(total+"000");
						var angsuran = ( harga / 11 ) * 1000;
						$('#angsuranPerBulan').val(Math.round(angsuran));
					}
				});
			}
			else if($('#lama_cicilan').val() == "23") {
				$.ajax({
					type:"POST",
					url:"<?php echo site_url('index.php/sales_site/get_hargaKredit_23');?>",
					data:{ tipe: $("#tipeMobil").val(), id: $("#leasing").val() },
					cache:false,
					success:function(html){
						$('#harga').val($.trim(html));
						var total = 0;
						var harga = parseInt( html / 1000);
						var bf = parseInt ( $('#booking_fee').val() * 1000);
						total = harga + bf;
						$('#totalPembayaran').val(total+"000");
						var angsuran = ( harga / 23 ) * 1000;
						$('#angsuranPerBulan').val(Math.round(angsuran));
					}
				});
			}
			else if($('#lama_cicilan').val() == "35") {
				$.ajax({
					type:"POST",
					url:"<?php echo site_url('index.php/sales_site/get_hargaKredit_35');?>",
					data:{ tipe: $("#tipeMobil").val(), id: $("#leasing").val() },
					cache:false,
					success:function(html){
						$('#harga').val($.trim(html));
						var total = 0;
						var harga = parseInt( html / 1000);
						var bf = parseInt ( $('#booking_fee').val() * 1000);
						total = harga + bf;
						$('#totalPembayaran').val(total+"000");
						var angsuran = ( harga / 35 ) * 1000;
						$('#angsuranPerBulan').val(Math.round(angsuran));
					}
				});
			}
			else if($('#lama_cicilan').val() == "47") {
				$.ajax({
					type:"POST",
					url:"<?php echo site_url('index.php/sales_site/get_hargaKredit_47');?>",
					data:{ tipe: $("#tipeMobil").val(), id: $("#leasing").val() },
					cache:false,
					success:function(html){
						$('#harga').val($.trim(html));
						var total = 0;
						var harga = parseInt( html / 1000);
						var bf = parseInt ( $('#booking_fee').val() * 1000);
						total = harga + bf;
						$('#totalPembayaran').val(total+"000");
						var angsuran = ( harga / 47 ) * 1000;
						$('#angsuranPerBulan').val(Math.round(angsuran));
					}
				});
			}
		});	
		
		$('#booking_fee').change(function(){
			if($('#booking_fee').val() == "5") {
				var total = parseInt( $('#totalPembayaran').val() );
				total -= 10000000;
				total += 5000000;
				$('#totalPembayaran').val(total);
			}
			else if($('#booking_fee').val() == "10"){
				var total = parseInt( $('#totalPembayaran').val() );
				total -= 5000000;
				total += 10000000;
				$('#totalPembayaran').val(total);
			}
		});	
		
		$('#pilihAsuransi').change(function(){
			if( $(this).is(':checked') ) {
				$.ajax({
					type:"POST",
					url:"<?php echo site_url('index.php/sales_site/get_Asuransi');?>",
					data:'tipe='+$("#tipeMobil").val(),
					cache:false,
					success:function(html){
						var asr = parseInt( $.trim(html) ) / 1000;
						var total = parseInt( $('#totalPembayaran').val() ) / 1000;
						total += asr;
						$('#totalPembayaran').val(total+"000");
						$('#tempAsuransi').val(asr+"000");
					}
				});
			}
			else {
				$.ajax({
					type:"POST",
					url:"<?php echo site_url('index.php/sales_site/get_Asuransi');?>",
					data:'tipe='+$("#tipeMobil").val(),
					cache:false,
					success:function(html){
						var asr = parseInt( $.trim(html) ) / 1000;
						var total = parseInt( $('#totalPembayaran').val() ) / 1000;
						total -= asr;
						$('#totalPembayaran').val(total+"000");
						$('#tempAsuransi').val("0");
					}
				});
			}
		});	
	});
	
</script>