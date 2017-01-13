 <div class="grid_12">
    <div class="box round first fullpage">
        <h2>Daftar mobil</h2>
        <div class="block">
	        <table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Nama Mobil</th>
						<th>Nama Warna</th>
						<th>Kode Warna</th>
						<th>Tampilan Warna</th>
						<th>Model 3D</th>
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
							<td><a href="tiga_d/"'.$row->kode_warna.'/'.str_replace("-", " ", $row->nama_mobil).'">Klik disini</a></td>
						</tr>';
						}
						else {
						echo 
						'<tr class="odd gradeX" style="text-transform:uppercase;">
							<td style="vertical-align:middle">'.str_replace("-", " ", $row->nama_mobil).'</td>
							<td style="vertical-align:middle">'.str_replace("-", " ", $row->nama_warna).'</td>
							<td style="vertical-align:middle">'.$row->kode_warna.'</td>
							<td style="border: solid 1px; background-color: '.$row->kode_warna.'"></td>
							<td><a href="tiga_d/'.$row->kode_warna.'">Klik disini</a></td>
						</tr>';
						}
					?>	
							
					<?php
						;
					}
					?>
				</tbody>
			</table>	
			<a href="insert_catalog">Masukkan katalog mobil baru.<a/>
		</div>
    </div>
</div>