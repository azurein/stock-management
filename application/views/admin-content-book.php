 <div class="grid_12">               
 	<div id="information">
		<?php echo $this->session->flashdata('info'); ?>
 	</div>                                                                                                                                                                                                                                                                                             
    <div class="box round first fullpage">                                                                                                                                                                                                                                                                                        
        <h2>Booking/Unbooking</h2>                                                                                                                                                                                                                                                                                                
        <div id="kiri2">                                                                                                                                                                                                                                                                                                          
            <div class="block ">                                                                                                                                                                                                                                                                                                  
                <table class="form" cellspacing="0">                                                                                                                                                                                                                                                                              
                    <!--Detail SPK Mulai!-->                                                                                                                                                                                                                                                                                      
                    <tr>                                                                                                                                                                                                                                                                                                          
                        <td colspan="2" style="width: 600px;">                                                                                                                                                                                                                                                                    
                            <fieldset class="formGroupBox" style="width: 1100px;">                                                                                                                                                                                                                                                
                                <legend>&nbsp;&nbsp;&nbsp;&nbsp;SPK</legend>                                                                                                                                                                                                                                                      
                                    <div class="block" style="padding: 20px 20px 0px 20px;">                                                                                                                                                                                                                                      
                                        <table id="tableKhusus" class="data display datatable" id="example">                                                                                                                                                                                                                                       
                    					<thead>                                                                                                                                                                                                                                                                                   
                    						<tr>                     
                    							<th></th>                                                                                                                                                                                                                                                             
                    							<th>No. SPK</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
                    							<th>Nama Mobil</th>                                                                                                                                                                                                                                                                
                                                <th>Tipe Mobil</th>                                                                                                                                                                                                                                                               
                    							<th>Warna Mobil</th>
                    							<th>Tanggal Entri</th>                                                                                                                                                                                                                                                               
                    						</tr>                                                                                                                                                                                                                                                                                 
                    					</thead>                                                                                                                                                                                                                                                                                  
                    					<tbody>
                    						<?php
											foreach ($spk as $row) 
											{
												if($row->spk_mobil == 'TRUE') {
													echo
													'<tr class="odd gradeX" style="text-transform:uppercase;">
														<td class="status" style="vertical-align:middle; font-size:0.1px;">doBook</td>
														<td class="spk_num" style="vertical-align:middle">'.$row->no_spk.'</td>
														<td class="spk_namaMobil" style="vertical-align:middle">'.$row->nama_mobil.'</td>
														<td class="spk_tipeMobil" style="vertical-align:middle">'.$row->tipe_mobil.'</td>
														<td class="spk_warnaMobil" style="vertical-align:middle">'.$row->warna_mobil_pesanan.'</td>
														<td class="spk_entri" style="vertical-align:middle">'.$row->tgl_entry_spk.'</td>
													</tr>';
												}
												else {
													echo
													'<tr class="odd gradeX" style="text-transform:uppercase;">
														<td class="status" style="vertical-align:middle; font-size:0.1px;">doUnbook</td>
														<td class="spk_num" style="vertical-align:middle">'.$row->no_spk.'</td>
														<td class="spk_namaMobil" style="vertical-align:middle">'.$row->nama_mobil.'</td>
														<td class="spk_tipeMobil" style="vertical-align:middle">'.$row->tipe_mobil.'</td>
														<td class="spk_warnaMobil" style="vertical-align:middle">'.$row->warna_mobil_pesanan.'</td>
														<td class="spk_entri" style="vertical-align:middle">'.$row->tgl_entry_spk.'</td>
													</tr>';
												}
											}
											?>                                                                                                                                                                                                                                                                           
                    					</tbody>                                                                                                                                                                                                                                                                                  
                    				</table>                                                                                                                                                                                                                                                                                      
                                </div>                                                                                                                                                                                                                                                                                            
                            </fieldset>                                                                                                                                                                                                                                                                                           
                        </td>                                                                                                                                                                                                                                                                                                     
                        <td></td>                                                                                                                                                                                                                                                                                                 
                    </tr> 
                    <div id="message"></div>                                                                                                                                                                                                                                                                                                        
                    <tr>                                                                                                                                                                                                                                                                                                          
                        <td colspan="2" width="1200px">                                                                                                                                                                                                                                                                    
                            <fieldset class="formGroupBox" style="width: 1100px;">                                                                                                                                                                                                                                                
                                <legend>&nbsp;&nbsp;&nbsp;&nbsp;Mobil</legend>
                            	<div class="block" style="padding: 20px 20px 0px 20px;">
						        	<table id="tableKhusus" class="table-css" width="100%">                                                                                                                                                                                                                                       
										<thead>                                                                                                                                                                                                                                                                                   
											<tr>
												<th>No. Mobil</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
												<th>Nama Mobil</th>                                                                                                                                                                                                                                                                
						                        <th>Tipe Mobil</th>                                                                                                                                                                                                                                                               
												<th>Warna Mobil</th>
												<th>Tanggal Perkiraan Masuk</th>  
												<th>Tanggal Masuk Gudang</th>
												<th>Opsi</th>                                                                                                                                                                                                                                          
											</tr>                                                                                                                                                                                                                                                                                  
										</thead>                                                                                                                                                                                                                                                                                  
										<tbody id="loadCar"></tbody>                                                                                                                                                                                                                                                                                  
									</table>                                                                                                                                                                                                                                                                                      
						        </div>
                            </fieldset>                                                                                                                                                                                                                                                                                           
                        </td>                                                                                                                                                                                                                                                                                                     
                    </tr>                                                                                                                                                                                                                                                                                                         
                    <!--Detail Mobil Selesai!-->                                                                                                                                                                                                                                                                                  
                </table>
            </div>                                                                                                                                                                                                                                                                                                                
        </div>                                                                                                                                                                                                                                                                                                                    
    </div>                                                                                                                                                                                                                                                                                                                        
</div>                                                                                                                                                                                                                                                                                                                            
                                                                                                                                                                                                                                                                                                                                  
<script type="text/javascript">
	/*    
   $("td").click(function(){
	
	    var column = $(this).parent().children().index(this);
	    var row = $(this).parent().parent().children().index(this.parentNode);
	
	    alert('baris: '+row+' - kolom: '+column);
	});
	*/
	
	$('#tableKhusus tr').click(function(){
		var tempStatus = $(this).find('.status').html();
        var tempId = $(this).find('.spk_num').html();
        var tempTipe = $(this).find('.spk_tipeMobil').html();
        var tempWarna = $(this).find('.spk_warnaMobil').html();
        
        if(tempStatus == "doBook")
        {
        	$.ajax({
				type:"POST",
				url:"<?php echo site_url('index.php/admin_site/loadCar');?>",
				data: {no_spk: tempId, tipe: tempTipe, warna: tempWarna},
				cache:false,
				success:function(html){
					$('#loadCar').html(html);
				}
			});
        }
        
		else if(tempStatus == "doUnbook")
		{
			$.ajax({
				type:"POST",
				url:"<?php echo site_url('index.php/admin_site/loadCar2');?>",
				data: {no_spk: tempId, tipe: tempTipe, warna: tempWarna},
				cache:false,
				success:function(html){
					$('#loadCar').html(html);
				}
			});
		}
    });
	
	// cek inputan harus angka
	var message = $('#message');
    var tr = $('#tableKhusus').find('tr');
    tr.bind('click', function(event) {
        var values = '';
        tr.removeClass('row-highlight');
        var tds = $(this).addClass('row-highlight').find('td');
        
        $.each(tds, function(index, item) {
            //alert($(this).find(".spk_num").html());
        });
        
        //$.each(tds, function(index, item) {
        //    values = values + 'td' + (index + 1) + ':' + item.innerHTML + '<br/>';
        //});
        message.html(values);
    });
</script>                                                                                                                                                                                                                                                                                                                      
                                                                                                                                                                                                                                                                                                                                  