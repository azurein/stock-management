 <div class="grid_12">
    <div class="box round first fullpage">
        <h2>Laporan Administrasi Gudang</h2>
        <div id="kiri2">
            <div class="block ">            
                <!--Periode mulai-->
                <div class="formMenu">
                    <table width="800" >
                        <tr><td colspan="2" style="width: 600px;">&nbsp;</td></tr>
                        <tr>
                            <td>
                                <label>Berdasarkan Model</label>
                            </td>
                            <td>
                                <select id="nama_model" name="nama_model" style="width: 200px;">
                                    <option value="all">Semua Model</option>
                                    <?php
                                    foreach ($model as $row) {
                                    	echo '<option value="'.$row->nama_mobil.'">'.$row->nama_mobil.'</option>';
                                    }
                                    ?>	
                                </select>
                                &nbsp;&nbsp;<button type="button" id="searchReport">Cari Laporan</button>
                            </td>
                        </tr>
                        <tr><td colspan="2" style="width: 600px;">&nbsp;</td></tr>
                        <tr><td colspan="2" style="width: 600px;">&nbsp;</td></tr>       
                        <tr>                                                                                                                                                                                                                                                                                                          
	                        <td colspan="2" style="width: 600px;">                                                                                                                                                                                                                                                                    
	                            <fieldset class="formGroupBox" style="width: 1100px;">                                                                                                                                                                                                                                                
	                                <legend>&nbsp;&nbsp;&nbsp;&nbsp;Mobil</legend>
	                            	<div class="block" style="padding: 20px 20px 0px 20px;">
							        	<table class="table-css" style="width: 1000px">                                                                                                                                                                                                                                       
											<thead>                                                                                                                                                                                                                                                                                   
												<tr>
													<th rowspan="2" style="vertical-align: middle">Nama Mobil / Tipe Mobil</th>
				                                    <th colspan = "5">Status</th>
												</tr>
												<tr>
				                                    <th>Belum Datang</th>
				                                    <th>Siap Jual</th>
				                                    <th>Telah Dipesan</th>
				                                    <th>Terjual</th>
				                                    <th>Cacat Fisik</th>
												</tr>                                                                                                                                                                                                                                                                                      
											</thead>                                                                                                                                                                                                                                                                                  
											<tbody id="loadReport"></tbody>                                                                                                                                                                                                                                                                                  
										</table>                                                                                                                                                                                                                                                                                      
							        </div>
	                            </fieldset>                                                                                                                                                                                                                                                                                           
	                        </td>                                                                                                                                                                                                                                                                                                     
                    	</tr>            
                    </table> 
                </div>
                <!--Periode Selesai!-->      
        	</div>
    	</div>      
    </div>
</div>

<script>
	// cek inputan harus angka
	$(document).ready(function () {
        $('#searchReport').click(function(){        	
			$.ajax({
				type:"POST",
				url:"<?php echo site_url('index.php/admin_site/loadAdmReport');?>",
				data:'namaModel='+$('#nama_model').val(),
				cache:false,
				success:function(html){
					$('#loadReport').html(html);
				}
			});
		});
    });
	
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
    
    function test1(test)
    {

        if(test.tag[0].checked==false)
        {
            alert(test)
        }
    }
    
</script>
