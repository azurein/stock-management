 <div class="grid_12">
 	<div id="information">
		<?php echo $this->session->flashdata('info'); ?>
 	</div>	
    <div class="box round first fullpage">
        <h2>Penerimaan Pembayaran</h2>
        <div id="kiri2">
            <div class="block ">
                <?php echo form_open("index.php/kasir_site/insertPembayaran"); ?>
                <table class="form" cellspacing="0">
                	<tr>
                        <td>
                        	<table>
                        		<tr>
                        			<td><label style="padding-right: 58px">No. SPK</label></td>
                        			<td>
                        				<input type="text" size="50" name="noSPK" id="noSPK" placeholder="Masukkan kode Surat Pesanan Kendaraan" value="" />
										<button type="button" id="searchSPK">Cari SPK</button>	
                        			</td>
                        		</tr>
                        		<tr>
                        			<td></td>
                        			<td>
                        				<div id="errorSPK" name="errorSPK" class="line_error" style="color:red"></div>
                        				<div class="line_error" id="error_spk2" style="color:red"><?php echo form_error('noSPK'); ?></div>
                        			</td>
                        		</tr>
                        		<tr>
                        			<td><label style="padding-right: 58px">No. Kwitansi</label></td>
                        			<td>
                        				<input type="text" size="50" name="noKwi" id="noKwi" placeholder="Masukkan kode Surat Pesanan Kendaraan" value="" />
                        				<div class="line_error" id="error_spk2" style="color:red"><?php echo form_error('noKwi'); ?></div>
                        			</td>
                        		</tr>
                        		<tr>
                        			<td><label style="padding-right: 58px">Nilai Uang</label></td>
                        			<td>
                        				<input type="text" size="50" name="nilaiUang" id="nilaiUang" placeholder="Masukkan kode Surat Pesanan Kendaraan" value="" />
                        				<div class="line_error" id="error_spk2" style="color:red"><?php echo form_error('nilaiUang'); ?></div>
                        			</td>
                        		</tr>
                        	</table>
                        </td>
                    </tr>
                    <div id="totalHarga"></div>
                    <!--
                    <tr id="showTahap1">
                        <td>
                        	<table>
                        		<tr>
                        			<td><label style="padding-right: 58px">Nama Mobil</label></td>
                        			<td><label style="padding-right: 58px">Tipe Mobil</label></td>
                        			<td><label style="padding-right: 58px">Warna Mobil</label></td>
                        		</tr>
                        		<tr>
                        			<td><select size="8" name="namaMobil" id="namaMobil">
                        				<?php foreach($namaMobil as $row) {
                        				?> <option><?= $row->nama_mobil ?></option> 
                        				<?php
										;} ?>
									</select></td>
                        			<td><select size="8" name="tipeMobil" id="tipeMobil"></select></td>
                        			<td><select size="8" name="warnaMobil" id="warnaMobil"></select></td>
                        		</tr>
                        	</table>
                        	
                        </td>
                    </tr>-->
                    <tr><td></td></tr><tr><td></td></tr>
                    <tr>
                        <td style="width: 600px;padding-left: 20px;">
                            <button class="btn btn-blue" type="submit" id="submit_btn" value="Submit">Submit Pembayaran</button>&nbsp;&nbsp;&nbsp;&nbsp;
                            <button class="btn btn-blue" type="reset" value="Reset">Kosongkan seluruh field</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
<script>

	$('#searchSPK').click(function(){
		$.ajax({
			type:"POST",
			url:"<?php echo site_url('index.php/kasir_site/cekSPK');?>",
			data:'num='+$("#noSPK").val(),
			cache:false,
			success:function(html){
				$('#errorSPK').html(html);
				if($.trim(html) == "Nomor SPK tidak dapat diproses." || $.trim(html) == "Nomor SPK tidak terdaftar.") {
					document.getElementById("submit_btn").type = "button";
				}
				else {
					document.getElementById("submit_btn").type = "submit";
				}
			}
		});
		
		$.ajax({
			type:"POST",
			url:"<?php echo site_url('index.php/kasir_site/getTotalHarga');?>",
			data:'num='+$("#noSPK").val(),
			cache:false,
			success:function(html){
				$('#totalHarga').html(html);
			}
		});
		
	});	
	
	$('#namaMobil').change(function(){
		$.ajax({
			type:"POST",
			url:"<?php echo site_url('index.php/kasir_site/getType');?>",
			data:'nama='+$("#namaMobil").val(),
			cache:false,
			success:function(html){
				$('#tipeMobil').html(html);
			}
		});
		
		$.ajax({
			type:"POST",
			url:"<?php echo site_url('index.php/kasir_site/getColor');?>",
			data:'nama='+$("#namaMobil").val(),
			cache:false,
			success:function(html){
				$('#warnaMobil').html(html);
			}
		});
		
		$.ajax({
			type:"POST",
			url:"<?php echo site_url('index.php/kasir_site/getFee');?>",
			data:'nama='+$("#namaMobil").val(),
			cache:false,
			success:function(html){
				$('#fee').html(html);
			}
		});
	});	
</script>