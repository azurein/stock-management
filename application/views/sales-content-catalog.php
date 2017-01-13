 <div class="grid_12">
 	<div id="information">
		<?php echo $this->session->flashdata('info'); ?>
 	</div>	
    <div class="box round first fullpage">
        <h2>Daftar mobil</h2>
        <div style="padding-top: 20px;padding-left: 10px"><a href="insert_catalog"><button type="button" class="btn btn-blue">Masukkan katalog mobil baru.</button><a/></div>
        <div class="block">
	        <table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nama Mobil</th>
						<th>Periode</th>
						<th>Gambar Depan</th>
						<th>Warna</th>
						<th>Ubah Katalog</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach ($catalog as $row) 
					{
						if($row->status == "ditampilkan") {
							echo
							'<tr class="odd gradeX" style="text-transform:uppercase;">
								<td style="vertical-align:middle">'.$row->id_katalog.'</td>
								<td class="namamobil" style="vertical-align:middle"><img src="../../'.$row->gambar_logo.'" alt="'.$row->nama_mobil.'" width="200px" height="50px" />'.$row->nama_mobil.'</td>
								<td style="vertical-align:middle">'.$row->periode.'</td>
								<td style="vertical-align:middle"><img src="../../'.$row->gambar_depan.'" alt="none" width="300px" height="150px" /></td>
								<td style="vertical-align:middle"><a href="warna/'.$row->nama_mobil.'"><button type="button" class="btn btn-blue">Lihat Disini</button></a></td>
								<td style="vertical-align:middle"><a href="update_catalog/'.$row->nama_mobil.'"><button type="button" class="btn btn-blue">Klik Disini</button></a></td>
								<td style="vertical-align:middle"><a href="hide_catalog/'.$row->id_katalog.'"><button type="button" class="btn btn-blue">Sembunyikan</button></a></td>
							</tr>';
						}
						else if($row->status == "disembunyikan") {
							echo
							'<tr class="odd gradeX" style="text-transform:uppercase;">
								<td class="hidden" style="vertical-align:middle">'.$row->id_katalog.'</td>
								<td class="namamobil" style="vertical-align:middle"><img src="../../'.$row->gambar_logo.'" alt="'.$row->nama_mobil.'" width="200px" height="50px" />'.$row->nama_mobil.'</td>
								<td style="vertical-align:middle">'.$row->periode.'</td>
								<td style="vertical-align:middle"><img src="../../'.$row->gambar_depan.'" alt="none" width="300px" height="150px" /></td>
								<td style="vertical-align:middle"><a href="warna/'.$row->nama_mobil.'"><button type="button" class="btn btn-blue">Lihat Disini</button></a></td>
								<td style="vertical-align:middle"><a href="update_catalog/'.$row->nama_mobil.'"><button type="button" class="btn btn-blue">Klik Disini</button></a></td>
								<td style="vertical-align:middle"><a href="show_catalog/'.$row->id_katalog.'"><button type="button" class="btn btn-blue">Tampilkan</button></a></td>
							</tr>';
						}
						
					?>	
							
					<?php
						;
					}
					?>
				</tbody>
			</table>	
		</div>
    </div>
</div>

<script>
	
	
	
</script>