 <div class="grid_12">
 	<div id="information">
		<?php echo $this->session->flashdata('info'); ?>
 	</div>	
    <div class="box round first fullpage">
        <h2>Daftar mobil</h2>
        <div class="block">
	        <table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>ID</th>
						<th>Tipe Mobil</th>
						<th>Detil Harga</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach ($catalog as $row) 
					{
						echo
						'<tr class="odd gradeX" style="text-transform:uppercase;">
							<td style="vertical-align:middle">'.$row->id_katalog.'</td>
							<td style="vertical-align:middle">'.$row->tipe_mobil.'</td>
							<td style="vertical-align:middle"><a href="detilHarga/'.$row->id_katalog.'/'.$row->tipe_mobil.'"><button type="button" class="btn btn-blue">Lihat Disini</button></a></td>
						</tr>';
					}
					?>	
				</tbody>
			</table>	
		</div>
    </div>
</div>