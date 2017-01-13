 <div class="grid_12">
    <div class="box round first fullpage">
        <h2>Surat Pesanan Kendaraan - Ganti data SPK</h2>
        <?php echo form_open("index.php/sales_site/updateSPK"); ?>
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
         	<!--Table Pembayaran Mulai!
            <fieldset class="formGroupBox">
	            <legend class="formTitleMenu">Penerimaan Pembayaran</legend>
	            <div class="formMenutable">
	            	<table>
	            		<tr>
	                        <th class="formDetailPembayran">
	                            No. Kwitansi
	                        </th>
	                        <th class="formDetailPembayran">
	                            Nilai Uang
	                        </th>
	                        <th class="formDetailPembayran">
	                            Tanggan Penerimaan Pembayaran
	                        </th>
	                    </tr>
	            	</table>
	                <table id="loadPembayaran" width="120%"></table>
	            </div>
            </fieldset>
            <!--Table Pembayaran Selesai!-->
            
            <!--Customer Detail Mulai!-->
            	<div id="loadCust"></div>
            <!--Custoner Detail Selesai!-->
            
            <!--SPK lama Mulai!-->
            	<div id="loadSPK"></div>
            <!--SPK lama Selesai!-->
            
            <!--pilih mobil Mulai!-->
                 <fieldset class="formGroupBox">
                    <legend class="formTitleMenu">Mobil</legend>
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
				    				?> <option><?= $row->nama_mobil ?></option> 
				    				<?php
									;} ?>
								</select></td>
				    			<td><select size="8" name="tipeMobil" id="tipeMobil"></select></td>
				    			<td><select size="8" name="warnaMobil" id="warnaMobil"></select></td>
				    		</tr>
				    	</table>
				    	<button type="button" id="searchFromKatalog">Cari Harga</button>
                    </div>
                 </fieldset>
            <!--pilih mobil Selesai!--> 
           
            <!--Pembayaran Mulai!-->
                 <fieldset class="formGroupBox">
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
                                        <option value="5000000">5000000</option>
                                        <option value="10000000">1000000</option>
                                    </select>
                                </td>
                            </tr>
                            <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                            <tr>
                                <td>
                                    <label>Harga Kendaraan</label>
                                </td>
                                <td>
                                    <div id="hargaTunaiz"><input readonly="readonly" type="text" onkeyup="cekAngka("hargaKendaraan","error_harga_kend"),hitungDP(),hitungAngsuran(),hitungAsuransi(),hitungTotal();" id="hargaTunai" name="hargaTunai" placeholder="Masukan Harga Mobil (IDR)" size="50"/></div>
                                    <div class="line_error" id="error_carprice"><?php echo form_error("hargaKendaraan"); ?></div>
                                    <p class="line_error" id="error_harga_kend"></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Jumlah DP</label>
                                </td>
                                <td>
                                	<div id="tempDPz"><input readonly="readonly" type="text" name="jumlahDP" id="jumlahDP" placeholder="30% dari harga kendaraan" size="50" /></div>
					            	<div id="lamaAngsuranz"></div>
					            	<div id="hapz"></div>
                                </td>
                            </tr>
                        </table>   
                    </div>
                 </fieldset>
            <!--Pembayaran Selesai!-->
            	<div id="hargaKreditz11"><input type="hidden" id="kredit11" name="kredit11" values="" /></div>
            	<div id="hargaKreditz23"><input type="hidden" id="kredit23" name="kredit23" values="" /></div>
            	<div id="hargaKreditz35"><input type="hidden" id="kredit35" name="kredit35" values="" /></div>
            	<div id="hargaKreditz47"><input type="hidden" id="kredit47" name="kredit47" values="" /></div>
            <!--Pembayaran Kredit Detail Mulai!-->
            	<div id="kredit_showhide" style="display: none;">
	                 <fieldset class="formGroupBox">
	                    <legend class="formTitleMenu">Detail Pembayaran Kredit</legend>
	                    <div class="formMenu">
	                        <table width="800">
	                            <tr>
	                                <td>
	                                    <label>Lama Cicilan</label>
	                                </td>
	                                <td>
	                                    <select onchange="hitungAngsuran();" id="lama_cicilan" name="lama_cicilan" style="width: 150px;">
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
	                                    <label>Angsuran yang harus dibayar</label>
	                                </td>
	                                <td>
	                                	<input readonly="readonly"type="text" name="angsuranPerBulan" id="angsuranPerBulan" placeholder="Hitung otomatis berdasarkan lama cicilan" size="50" />
	                                </td>
	                            </tr>
	                        </table>
	                    </div>
	                 </fieldset>        
	        	</div>     
            <!--Pembayaran Kredit Detail Selesai!-->
            
            <!--Asuransi Mulai!-->
                 <fieldset class="formGroupBox">
                    <legend class="formTitleMenu">Asuransi</legend>
                    <div class="formMenu">
                        <table width="800">
                            <tr>
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
                                <td id="totalPembayaranz">
                                	<input readonly="readonly" type="text" name="totalPembayaran" id="totalPembayaran" placeholder="Hitung otomatis berdasarkan harga kendaraan" size="50" />
                                </td>
                            </tr>
                        </table>
                    </div>
                 </fieldset>
            <!--Asuransi Selesai!-->

            <div class="formButton">
                <button class="btn btn-blue" type="submit" value="Submit">Update SPK</button>&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn btn-blue" type="reset" value="Reset">Kosongkan seluruh field</button>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
<script>
		
	$('#searchSPK').click(function(){
		$.ajax({
			type:"POST",
			url:"<?php echo site_url('index.php/sales_site/cekSPK');?>",
			data:'num='+$("#noSPK").val(),
			cache:false,
			success:function(html){
				$('#errorSPK').html(html);
			}
		});
		
		$.ajax({
			type:"POST",
			url:"<?php echo site_url('index.php/sales_site/loadCust');?>",
			data:'num='+$("#noSPK").val(),
			cache:false,
			success:function(html){
				$('#loadCust').html(html);
			}
		});	
		
		$.ajax({
			type:"POST",
			url:"<?php echo site_url('index.php/sales_site/loadSPK');?>",
			data:'num='+$("#noSPK").val(),
			cache:false,
			success:function(html){
				$('#loadSPK').html(html);
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
		});	
	
		$('#searchFromKatalog').click(function(){
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
					var dp = parseInt( $('#tempDP').val() / 1000);
					var harga = parseInt( $('#harga').val() / 1000);
					var bf = parseInt ( $('#booking_fee').val() / 1000);
					var total = dp + harga + bf;
					$('#totalPembayaran').val(total+"000");
				}
			});
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
						var dp = parseInt( $('#tempDP').val() / 1000);
						var harga = parseInt( $('#harga').val() / 1000);
						var bf = parseInt ( $('#booking_fee').val() / 1000);
						var total = dp + harga + bf;
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
								data:'tipe='+$("#tipeMobil").val(),
								cache:false,
								success:function(html){
									$('#harga').val($.trim(html));
									var total = 0;
									var dp = parseInt( $('#tempDP').val() / 1000);
									var harga = parseInt( $('#harga').val() / 1000);
									var bf = parseInt ( $('#booking_fee').val() / 1000);
									total = harga + dp + bf;
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
								data:'tipe='+$("#tipeMobil").val(),
								cache:false,
								success:function(html){
									$('#harga').val($.trim(html));
									var total = 0;
									var dp = parseInt( $('#tempDP').val() / 1000);
									var harga = parseInt( $('#harga').val() / 1000);
									var bf = parseInt ( $('#booking_fee').val() / 1000);
									total = harga + dp + bf;
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
								data:'tipe='+$("#tipeMobil").val(),
								cache:false,
								success:function(html){
									$('#harga').val($.trim(html));
									var total = 0;
									var dp = parseInt( $('#tempDP').val() / 1000);
									var harga = parseInt( $('#harga').val() / 1000);
									var bf = parseInt ( $('#booking_fee').val() / 1000);
									total = harga + dp + bf;
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
								data:'tipe='+$("#tipeMobil").val(),
								cache:false,
								success:function(html){
									$('#harga').val($.trim(html));
									var total = 0;
									var dp = parseInt( $('#tempDP').val() / 1000);
									var harga = parseInt( $('#harga').val() / 1000);
									var bf = parseInt ( $('#booking_fee').val() / 1000);
									total = harga + dp + bf;
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
		
		$('#lama_cicilan').change(function(){
			$('#harga').val("");
			if($('#lama_cicilan').val() == "11") {
				$.ajax({
					type:"POST",
					url:"<?php echo site_url('index.php/sales_site/get_hargaKredit_11');?>",
					data:'tipe='+$("#tipeMobil").val(),
					cache:false,
					success:function(html){
						$('#harga').val($.trim(html));
						var total = 0;
						var dp = parseInt( $('#tempDP').val() / 1000);
						var harga = parseInt( $('#harga').val() / 1000);
						var bf = parseInt ( $('#booking_fee').val() / 1000);
						total = harga + dp + bf;
						var angsuran = ( harga / 11 ) * 1000;
						$('#totalPembayaran').val(total+"000");
						$('#angsuranPerBulan').val(Math.round(angsuran));
					}
				});
			}
			else if($('#lama_cicilan').val() == "23") {
				$.ajax({
					type:"POST",
					url:"<?php echo site_url('index.php/sales_site/get_hargaKredit_23');?>",
					data:'tipe='+$("#tipeMobil").val(),
					cache:false,
					success:function(html){
						$('#harga').val($.trim(html));
						var total = 0;
						var dp = parseInt( $('#tempDP').val() / 1000);
						var harga = parseInt( $('#harga').val() / 1000);
						var bf = parseInt ( $('#booking_fee').val() / 1000);
						total = harga + dp + bf;
						var angsuran = ( harga / 23 ) * 1000;
						$('#totalPembayaran').val(total+"000");
						$('#angsuranPerBulan').val(Math.round(angsuran));
					}
				});
			}
			else if($('#lama_cicilan').val() == "35") {
				$.ajax({
					type:"POST",
					url:"<?php echo site_url('index.php/sales_site/get_hargaKredit_35');?>",
					data:'tipe='+$("#tipeMobil").val(),
					cache:false,
					success:function(html){
						$('#harga').val($.trim(html));
						var total = 0;
						var dp = parseInt( $('#tempDP').val() / 1000);
						var harga = parseInt( $('#harga').val() / 1000);
						var bf = parseInt ( $('#booking_fee').val() / 1000);
						total = harga + dp + bf;
						var angsuran = ( harga / 35 ) * 1000;
						$('#totalPembayaran').val(total+"000");
						$('#angsuranPerBulan').val(Math.round(angsuran));
					}
				});
			}
			else if($('#lama_cicilan').val() == "47") {
				$.ajax({
					type:"POST",
					url:"<?php echo site_url('index.php/sales_site/get_hargaKredit_47');?>",
					data:'tipe='+$("#tipeMobil").val(),
					cache:false,
					success:function(html){
						$('#harga').val($.trim(html));
						var total = 0;
						var dp = parseInt( $('#tempDP').val() / 1000);
						var harga = parseInt( $('#harga').val() / 1000);
						var bf = parseInt ( $('#booking_fee').val() / 1000);
						total = harga + dp + bf;
						var angsuran = ( harga / 47 ) * 1000;
						$('#totalPembayaran').val(total+"000");
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
					}
				});
			}
		});	
	
	
	// hitung jumlah DP
	function hitungDP()
	{
		var a = document.getElementById("hargaKendaraan").value;
		if(!isNaN(a)) {
			var harga_kendaraan = document.getElementById("hargaKendaraan").value;
			var jumlah_dp = Math.floor(harga_kendaraan * 30/100);
			document.getElementById("jumlahDP").value = jumlah_dp+".00 IDR";
		}
	}
	
	// cek inputan harus angka
	function cekAngka(idInput, idError)
	{
		document.getElementById(idError).innerHTML = "";
		var a = document.getElementById(idInput).value;
		if(isNaN(a)) {
			document.getElementById(idError).innerHTML = "Inputan harus angka";
		};
	}
	
	// hitung angsuran
	function hitungAngsuran()
	{				
		if(document.getElementById("jenis").value == "kredit" && document.getElementById("lama_cicilan").value != "") {
			lama_cicil = document.getElementById("lama_cicilan").value;
			var percent;
			if(lama_cicil == 11) 
			{
				$("#angsuranPerBulan").val($("#kredit11").val());
			}
			else if(lama_cicil == 23)
			{
				$("#angsuranPerBulan").val($("#kredit23").val());
			}
			else if(lama_cicil == 35)
			{
				$("#angsuranPerBulan").val($("#kredit35").val());
			}
			else
			{
				$("#angsuranPerBulan").val($("#kredit47").val());
			}
			if(document.getElementById("pilihAsuransi").checked == true) {
				$("#totalPembayaran").val( $("#hargaTunai").val() );
				$("#totalPembayaran").val( parseInt($("#angsuranPerBulan").val()) + parseInt($("#totalPembayaran").val()) );
			}
			else {
				$("#totalPembayaran").val( $("#hargaTunai").val() + $("#premiAsuransi").val() );
			}
			//var harga_kendaraan = document.getElementById("hargaKendaraan").value;
			//var total_angsuran = ((harga_kendaraan * percent) + parseInt(harga_kendaraan)) / lama_cicil;
			//document.getElementById("angsuranPerBulan").value = Math.floor(total_angsuran)+".00 IDR";
		}
		else {
			$("#totalPembayaran").val( parseInt($("#totalPembayaran").val()) - parseInt($("#angsuranPerBulan").val()) );
			document.getElementById("lama_cicilan").value = "";
			document.getElementById("angsuranPerBulan").value = null;
		}
	}
	
	// hide/show kredit
	function showKredit()
	{
		if(document.getElementById("jenis").value == "kredit") {
			document.getElementById("kredit_showhide").style.display = "table-row";
			$("#totalPembayaran").val( parseInt($("#angsuranPerBulan").val()) + parseInt($("#totalPembayaran").val()) );
		}
		else {
			document.getElementById("kredit_showhide").style.display = "none";
			$("#totalPembayaran").val( parseInt($("#totalPembayaran").val()) - parseInt($("#angsuranPerBulan").val()) );
		}
	}
	
	// hitung pembayaran asuransi
	function hitungAsuransi()
	{
		if(document.getElementById("pilihAsuransi").checked == true) {
			$("#premiAsuransi").val($("#asuranzi").val());
        	document.getElementById("asuransi_showhide").style.display = "table-row";
        	$("#totalPembayaran").val( parseInt($("#premiAsuransi").val()) + parseInt($("#totalPembayaran").val()) );
        	
        }
        else {
        	$("#totalPembayaran").val( parseInt($("#totalPembayaran").val()) - parseInt($("#premiAsuransi").val()) );
        	document.getElementById("asuransi_showhide").style.display = "none";
        	document.getElementById("premiAsuransi").value = null;
        }
	}
	
</script> 