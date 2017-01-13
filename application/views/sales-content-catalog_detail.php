 <div class="grid_12">
    <div class="box round first fullpage">
        <h2>Tipe mobil dari model <?php foreach($mobil as $row){ echo str_replace("-", " ", $row->nama_mobil); } ?></h2>
        <div class="block">
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Nama Tipe</th>
						<th>Brosur</th>
						<th>Ubah Data Tipe</th>
                        <th>Hapus Data Tipe</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach ($tipe as $row) 
					{
						echo
						'<tr class="odd gradeX" style="text-transform:uppercase;">
							<td style="vertical-align:middle">'.str_replace("-", " ", $row->tipe_mobil).'</td>
							<td style="vertical-align:middle"><a href="'.$row->brosur.'"><button type="button" class="btn btn-blue">Klik Disini</button></a></td>
							<td><a href="update_tipe/'.$row->nama_mobil.'"><button type="button" class="btn btn-blue">Klik Disini</button></a></td>
	                        <td><a href=/toyota/index.php/sales_site/deleteTipe/'.$row->nama_tipe.'"><button type="button" class="btn btn-blue">Klik Disini</button></a></td>
                        </tr>';
					}
					?>
				</tbody>
			</table>	
		</div>
    </div>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
	$(document).ready(function()
	{
		$('#upload1').live('change', function(){ $('#tempUpload1').val($('#upload1').val()); });
		$('#upload2').live('change', function(){ $('#tempUpload2').val($('#upload2').val()); });
		$('#upload3').live('change', function(){ $('#tempUpload3').val($('#upload3').val()); });
		$('#upload4').live('change', function(){ $('#tempUpload4').val($('#upload4').val()); });
		$('#upload5').live('change', function(){ $('#tempUpload5').val($('#upload5').val()); });
		$('#upload6').live('change', function(){ $('#tempUpload6').val($('#upload6').val()); });
		$('#upload7').live('change', function(){ $('#tempUpload7').val($('#upload7').val()); });
		$('#upload8').live('change', function(){ $('#tempUpload8').val($('#upload8').val()); });
		$('#upload9').live('change', function(){ $('#tempUpload9').val($('#upload9').val()); });
		$('#upload10').live('change', function(){ $('#tempUpload10').val($('#upload10').val()); });
		
		var count = $("#row_count").val();
		
		$('#addType').live('click',function(){
		    $(this).val('Delete');
		    $(this).attr('class','del');
		 	var tempWarna = $('#nama_warna').val();
		 	var tempKode = $('#kode_warna').val();
			count++;
		    var append = '<tr><td><label id="label_idInspeksi">Tipe Mobil</label></td><td><input type="text" id="tipe_mobil[]" name="tipe_mobil[]" placeholder="Masukkan salah satu tipe" size="50" value="" /><p class="line_error" id="error_tipe"></p></td></tr><tr><td><label id="label_idInspeksi">Brosur</label></td><td><input type="file" id="upload'+count+'" name="upload'+count+'" /><input type="text" id="tempUpload'+count+'" name="tempUpload'+count+'" /><p class="line_error" id="error_tipe"></p></td></tr><tr><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td></td><td><button class="removeType" name="removeType" type="button">Hapus tipe ini</button></td></tr>';
		    $("tr:last").after(append);
		    $("#row_count").val(count);
		});
		
	    $('.removeType').live('click',function(){
		    $(this).parent().remove();
		    count--;
		    $("#row_count").val(count);
		});
	});

</script>