 <div class="grid_12">
	<?php echo $this->session->flashdata('info'); ?>
    <div class="box round first fullpage">
        <h2>Delivery Order</h2>
        <?php echo form_open("index.php/admin_site/insertDO"); ?>
        <div id="kiri2">
            <div class="block ">
                <form>
                <table class="form" cellspacing="0">
                    <!--Table MOBIL Mulai!-->
                    <tr>
                        <td colspan="2" style="width: 800px;">
                            <fieldset class="formGroupBox">
                                <legend>&nbsp;Mobil</legend>
                                    <div class="block" style="padding: 20px 20px 0px 20px;">                                                                                                                                                                                                                                      
                                        <table id="tableKhusus" class="data display datatable" id="example">                                                                                                                                                                                                                                       
                    					<thead>                                                                                                                                                                                                                                                                                   
                    						<tr>
                    							<th></th>                     
                    							<th>No. Mobil</th> 
                    							<th>No. Rangka</th>
                    							<th>No. Mesin</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
                    							<th>Nama Mobil</th>                                                                                                                                                                                                                                                                
                                                <th>Tipe Mobil</th>                                                                                                                                                                                                                                                               
                    							<th>Warna Mobil</th>	                                                                                                                                                                                                                                                             
                    						</tr>                                                                                                                                                                                                                                                                                 
                    					</thead>                                                                                                                                                                                                                                                                                  
                    					<tbody>
                    						<?php
											foreach ($stock as $row) 
											{
												echo
												'<tr class="odd gradeX" style="text-transform:uppercase">
													<td class="spk_num" style="vertical-align:middle; font-size:0.1px">'.$row->no_spk.'</td>
													<td class="mobil_num" style="vertical-align:middle;">'.$row->no_mobil.'</td>
													<td class="no_rangka" style="vertical-align:middle">'.$row->no_rangka.'</td>
													<td class="no_mesin" style="vertical-align:middle">'.$row->no_mesin.'</td>
													<td class="nama_mobil" style="vertical-align:middle">'.$row->nama_mobil.'</td>
													<td class="tipe_mobil" style="vertical-align:middle">'.$row->tipe_mobil.'</td>
													<td class="warna_mobil" style="vertical-align:middle">'.$row->warna_mobil.'</td>
												</tr>';
											
											}
											?>                                                                                                                                                                                                                                                                           
                    					</tbody>                                                                                                                                                                                                                                                                              
                    				</table>                                                                                                                                                                                                                                                                                      
                                </div>                
                            </fieldset>
                        </td>
                        <td></td>
                    </tr>
                    <!--Table mobil kelar!-->
                   
                    <tr>
                        <td colspan="2" style="width: 600px;padding-left: 20px;">
                            <div style="padding: 10px 0px 0px 0px;">
                            	<input type="hidden" name="tempSPK" id="tempSPK" name="tempSPK"/>
                            	<input type="hidden" name="tempNoMobil" id="tempNoMobil" name="tempSPK"/>
                                <table id="loadSPK"></table>   
                            </div>
                        </td> 
                    </tr>
                    
                    <!--Button Mulai!-->
                    <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
                    <tr>
                        <td style="width: 600px;padding-left: 20px;">
                            <button class="btn btn-blue" type="submit" value="Submit">Submit DO</button>&nbsp;&nbsp;&nbsp;&nbsp;
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
	$('#tableKhusus tr').click("live", function(){
		var tempNoSPK = $(this).find('.spk_num').html();
		var tempNoMobil = $(this).find('.mobil_num').html();
		$("#tempSPK").val(tempNoSPK);
		$("#tempNoMobil").val(tempNoMobil);
		$.ajax({
			type:"POST",
			url:"<?php echo site_url('index.php/admin_site/loadSPK');?>",
			data: 'num='+tempNoSPK,
			cache:false,
			success:function(html){
				$('#loadSPK').html(html);
			}
		});
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
            document.getElementById(idError2).innerHTML = b+" Harus 5 Digit!";
        }
    }
    
</script> 

