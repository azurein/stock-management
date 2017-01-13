 <div class="grid_12">
    <div class="box round first fullpage">
        <h2>Daftar mobil</h2>
        <div class="block">
	        <table class="data display datatable" id="colorTable">
				<thead>
					<tr>
						<th>Nama Mobil</th>
						<th>Nama Warna</th>
						<th>Kode Warna</th>
						<th>Tampilan Warna</th>
						<th>Klik Untuk Update</th>
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
							<td>Klik disini</td>
						</tr>';
						}
						else {
						echo 
						'<tr class="odd gradeX" style="text-transform:uppercase;">
							<td style="vertical-align:middle">'.str_replace("-", " ", $row->nama_mobil).'</td>
							<td style="vertical-align:middle">'.str_replace("-", " ", $row->nama_warna).'</td>
							<td style="vertical-align:middle">'.$row->kode_warna.'</td>
							<td style="border: solid 1px; background-color: '.$row->kode_warna.'"></td>
							<td>Klik disini</td>
						</tr>';
						}
					}
					?>
				</tbody>
			</table>	
			<div id="message"></div>
			<div id="temp_3d_uploader"></div>
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
