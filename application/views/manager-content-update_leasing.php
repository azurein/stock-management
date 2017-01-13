 <div class="grid_12">
 	<div id="information">
		<?php echo $this->session->flashdata('info'); ?>
 	</div>	
    <div class="box round first fullpage">
        <h2>Input Leasing</h2>
        <?php echo form_open("index.php/manager_site/updateLeasing"); ?>
        <div class="block ">            
            <!--pertama2 klik table dulu pilih leasing yg mau di update, abis itu baru yg dibawah muncul-->
                <fieldset class="formGroupBox">
                    <legend class="formTitleMenu">Daftar Leasing</legend>
                        <div class="block" style="padding: 20px 20px 0px 20px;">                                                                                                                                                                                                                                      
                            <table id="tableKhusus" class="data display datatable" id="example">                                                                                                                                                                                                                                       
                			<thead>                                                                                                                                                                                                                                                                                   
                				<tr>
                					<th style="font-size:0.01px">ID Leasing</th>                     
                					<th>No. Siup</th> 
                					<th>Nama Leasing</th>
                					<th>Alamat Leasing</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
                					<th>Kontak Leasing</th>                                                                                                                                                                                                                                                                
                                    <th>Kode Pos</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
                				</tr>                                                                                                                                                                                                                                                                                 
                			</thead>                                                                                                                                                                                                                                                                                  
                			<tbody>
                				<?php
                					foreach ($leasing as $row) {
										echo '  
										<tr>
										<td class="idz" style="font-size:0.01px">'.$row->id_leasing.'</td>
										<td class="siupz">'.$row->no_siup.'</td>
										<td class="namaz">'.$row->nama_leasing.'</td>
										<td class="alamatz">'.$row->alamat_leasing.'</td>
										<td class="telpz">'.$row->kontak_leasing.'</td>
										<td class="zipz">'.$row->kode_pos.'</td>
										</tr>';
									}
                				?>                                                                                                                                                                                                                                                                           
                			</tbody>                                                                                                                                                                                                                                                                              
                		</table>                                                                                                                                                                                                                                                                                      
                    </div>                
                </fieldset>
            <!--Customer Detail Mulai!-->
            <fieldset class="formGroupBox">
            <legend class="formTitleMenu">Leasing</legend>
                <div class="formMenu">
                    <table width="800">
                        <input type="hidden" id="id_leasing" name="id_leasing" size="50"/>
                        <tr>
                            <td>
                                <label>No. SIUP</label>
                            </td>
                            <td>
                                <input readonly="readonly" type="text" id="siup" name="siup" placeholder="Masukan No. SIUP" size="50"/>
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                        <tr>
                            <td>
                                <label>Nama Leasing</label>
                            </td>
                            <td>
                                <input readonly="readonly" type="text" id="nama_leasing" name="nama_leasing" placeholder="Masukan Nama Leasing" size="50"/>
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                        <tr>
                            <td>
                                <label>Nomor Telepon Leasing</label>
                            </td>
                            <td>
                                <input type="text" id="leasing_telp" name="leasing_telp" placeholder="Masukkan Nomor Telepon" size="50"/>
                            	<div class="line_error" id="error_telp"><?php echo form_error('leasing_telp'); ?></div>
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                        <tr>
                            <td style="vertical-align: top;">
                                <label>Alamat Leasing</label>
                            </td>
                            <td>
                                <textarea rows="4" cols="38" id="leasing_alamat" name="leasing_alamat" style="resize: none;" placeholder="Masukan Alamat Leasing"></textarea>
                            	<div class="line_error" id="error_address"><?php echo form_error('leasing_alamat'); ?></div>
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                        <tr>
                            <td>
                                <label>Kode Pos</label>
                            </td>
                            <td>
                                <input type="text" id="leasing_zipcode" name="leasing_zipcode" placeholder="Masukan Kode Pos" size="50"/>
                                <div class="line_error" id="error_zip"><?php echo form_error('leasing_zipcode'); ?></div>
                            </td>
                        </tr>
                    </table>
                </div>
            </fieldset>
            <!--Custoner Detail Selesai!-->
            
           
        
            <div class="formButton">
                <button class="btn btn-blue" type="submit" id="submit_btn" value="Submit">Submit Leasing</button>&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn btn-blue" type="reset" value="Reset">Kosongkan seluruh field</button>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>

<script>
	$('#tableKhusus tr').click("live", function(){
		var id = $(this).find('.idz').html();
		var siup = $(this).find('.siupz').html();
		var nama = $(this).find('.namaz').html();
		var telp = $(this).find('.telpz').html();
		var alamat = $(this).find('.alamatz').html();
		var zip = $(this).find('.zipz').html();

		$("#id_leasing").val(id);
		$("#siup").val(siup);
		$("#nama_leasing").val(nama);
		$("#leasing_telp").val(telp);
		$("#leasing_alamat").val(alamat);
		$("#leasing_zipcode").val(zip);
    });
	
	// highlight
	var message = $('#message');
    var tr = $('#tableKhusus').find('tr');
    tr.bind('click', function(event) {
        var values = '';
        tr.removeClass('row-highlight');
        var tds = $(this).addClass('row-highlight').find('td');
        message.html(values);
    });
    
</script>