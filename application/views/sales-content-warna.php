  <div class="grid_12">
 	<div id="information">
		<?php echo $this->session->flashdata('info'); ?>
 	</div>	
    <div class="box round first fullpage">
        <h2>Daftar Warna Mobil : <?php foreach($mobil as $row){ echo str_replace("-", " ", $row->nama_mobil); } ?></h2>
        <div style="padding-top: 20px;padding-left: 10px"><a href="/toyota/index.php/sales_site/insert_warna/<?=$row->nama_mobil?>"><button type="button" class="btn btn-blue">Masukkan warna baru.</button></a></div>
        <div class="block">
	        <table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Nama Mobil</th>
						<th>Nama Warna</th>
						<th>Kode Warna</th>
						<th>Tampilan Warna</th>
						<th>Ubah Data Warna</th>
                        <th>Hapus Data Warna</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach ($warna as $row) 
					{
						$text = $row->nama_warna;
						$find = "metallic";
						$pos = strpos($text, $find);
						if($pos) {
						echo
						'<tr class="odd gradeX" style="text-transform:uppercase;">
							<td style="vertical-align:middle">'.str_replace("-", " ", $row->nama_mobil).'</td>
							<td style="vertical-align:middle">'.str_replace("-", " ", $row->nama_warna).'</td>
							<td style="vertical-align:middle">'.$row->kode_warna.'</td>
							<td style="
							border: solid 1px;
							background-image: linear-gradient(bottom, '.$row->kode_warna.' 33%, rgb(214,214,214) 78%);
							background-image: -o-linear-gradient(bottom, '.$row->kode_warna.' 33%, rgb(214,214,214) 78%);
							background-image: -moz-linear-gradient(bottom, '.$row->kode_warna.' 33%, rgb(214,214,214) 78%);
							background-image: -webkit-linear-gradient(bottom, '.$row->kode_warna.' 33%, rgb(214,214,214) 78%);
							background-image: -ms-linear-gradient(bottom, '.$row->kode_warna.' 33%, rgb(214,214,214) 78%);
							
							background-image: -webkit-gradient(
								linear,
								left bottom,
								left top,
								color-stop(0.33, '.$row->kode_warna.'),
								color-stop(0.78, rgb(214,214,214))
							);
							"></td>
							<td><a href="/toyota/index.php/sales_site/update_warna/'.$row->nama_mobil.'/'.$row->nama_warna.'"><button type="button" class="btn btn-blue">Klik Disini</button></a></td>
	                        <td><a href=/toyota/index.php/sales_site/deleteWarna/'.$row->nama_mobil.'/'.$row->nama_warna.'"><button type="button" class="btn btn-blue">Klik Disini</button></a></td>
                        </tr>';
						}
						else {
						echo 
						'<tr class="odd gradeX" style="text-transform:uppercase;">
							<td style="vertical-align:middle">'.str_replace("-", " ", $row->nama_mobil).'</td>
							<td style="vertical-align:middle">'.str_replace("-", " ", $row->nama_warna).'</td>
							<td style="vertical-align:middle">'.$row->kode_warna.'</td>
							<td style="border: solid 1px; background-color: '.$row->kode_warna.'"></td>
							<td><a href="/toyota/index.php/sales_site/update_warna/'.$row->nama_mobil.'/'.$row->nama_warna.'"><button type="button" class="btn btn-blue">Klik Disini</button></a></td>
						    <td><a href="/toyota/index.php/sales_site/deleteWarna/'.$row->nama_mobil.'/'.$row->nama_warna.'"><button type="button" class="btn btn-blue">Klik Disini</button></a></td>
                        </tr>';
						}
					}
					?>
				</tbody>
			</table>	
		</div>
    </div>
</div>

<script>
	var message = $('#message');
    var tr = $('#colorTable').find('tr');
    tr.bind('click', function(event) {
        var values = '';
        tr.removeClass('row-highlight');
        var tds = $(this).addClass('row-highlight').find('td');
        
        $.each(tds, function(index, item) {
            values = values + item.innerHTML+'-';
        });
        message.html(values);
        var temp = values.split('-');
        var tempNamaMobil = temp[0];
        var tempNamaWarna = temp[1];
        
        $.ajax({
			type:"POST",
			url:"<?php echo site_url('index.php/sales_site/tiga_d');?>",
			data: {model: tempNamaMobil, warna: tempNamaWarna},
			cache:false,
			success:function(html){
				$('#temp_3d_uploader').html(html);
			}
		});	
    });
</script>
