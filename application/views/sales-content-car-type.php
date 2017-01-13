 <div class="grid_12">
    <div class="box round first fullpage">
        <h2>Daftar mobil</h2>
        <div class="block">
	        <table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nama Mobil</th>
						<th>Periode</th>
						<th>Gambar Depan</th>
						<th>Tipe Mobil</th>
						<th>Model 3D</th>
						<th>Ubah Katalog</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach ($catalog as $row) 
					{
						echo
						'<tr class="odd gradeX" style="text-transform:uppercase;">
							<td style="vertical-align:middle">'.$row->id_katalog.'</td>
							<td style="vertical-align:middle"><img src="../../'.$row->gambar_logo.'" alt="'.$row->nama_mobil.'" width="200px" height="50px" /></td>
							<td style="vertical-align:middle">'.$row->periode.'</td>
							<td style="vertical-align:middle"><img src="../../'.$row->gambar_depan.'" alt="none" width="200px" height="100px" /></td>
							<td style="vertical-align:middle"><a href="car_type">Lihat Disini</a></td>
							<td style="vertical-align:middle"><a href="">car_3d</a></td>
							<td style="vertical-align:middle"><a href="update_car">Klik Disini</a></td>
						</tr>'
					?>	
							
					<?php
						;
					}
					?>
				</tbody>
			</table>	
			<a href="insert_car">Masukkan katalog mobil baru.<a/>
		</div>
    </div>
</div>