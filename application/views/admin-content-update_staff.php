 <div class="grid_12">
    <div class="box round first fullpage">
        <h2>Ubah Status Staff</h2>
        <div class="block ">
           	<table class="data display datatable" id="example">
				<thead style="cursor: pointer">
					<tr>
						<th>Nama User</th>
						<th>Posisi User</th>
						<th>Status</th>
						<th>Non-aktifkan</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach ($employee as $row) 
					{
						echo
						'<tr class="odd gradeX" style="text-transform:uppercase">
							<td class="center">'.$row->namaEmp.'</td>
							<td class="center">'.$row->posisiEmp.'</td>
							<td class="center" id="status">'.$row->statusEmp.'</td>
							<td class="center">
							<a href="" id="activate"></a>'
					?>	
								<script>
									if(document.getElementById.innerHTML == "AKTIF")
									{
										document.getElementById("activate").innerHTML = "AKTIFKAN";
									}
									else
									{
										document.getElementById("activate").innerHTML = "NON-AKTIFKAN";
									}
								</script>
					<?php
							'</td>
						</tr>';
					}
					?>
				</tbody>
			</table>
			<br /><br /><br />
        </div>
    </div>
</div>