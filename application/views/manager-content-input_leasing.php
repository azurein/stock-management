 <div class="grid_12">
 	<div id="information">
		<?php echo $this->session->flashdata('info'); ?>
 	</div>	
    <div class="box round first fullpage">
        <h2>Input Leasing</h2>
        <?php echo form_open("index.php/manager_site/insertLeasing"); ?>
        <div class="block ">            
            <!--Customer Detail Mulai!-->
                 <fieldset class="formGroupBox">
                    <legend class="formTitleMenu">Leasing</legend>
                    <div class="formMenu">
                        <table width="800">
                            <tr>
                                <td>
                                    <label>No. SIUP</label>
                                </td>
                                <td>
                                    <input type="text" id="siup" name="siup" placeholder="Masukan No. SIUP" size="50"/>
                                	<div class="line_error"><?php echo form_error('siup'); ?></div>
                                </td>
                            </tr>
                            <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                            <tr>
                                <td>
                                    <label>Nama Leasing</label>
                                </td>
                                <td>
                                    <input type="text" id="nama_leasing" name="nama_leasing" placeholder="Masukan Nama Leasing" size="50"/>
                                	<div class="line_error" id="error_custname"><?php echo form_error('nama_leasing'); ?></div>
                                </td>
                            </tr>
                            <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                            <tr>
                                <td>
                                    <label>Nomor Telepon Leasing</label>
                                </td>
                                <td>
                                    <input type="text" id="leasing_telp" name="leasing_telp" placeholder="Masukkan Nomor Telepon" size="50"/>
                                	<div class="line_error" id="error_telp"><?php echo form_error('leasing_telp'); ?></div>
                                </td>
                            </tr>
                            <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                            <tr>
                                <td style="vertical-align: top;">
                                    <label>Alamat Leasing</label>
                                </td>
                                <td>
                                    <textarea rows="4" cols="38" id="leasing_alamat" name="leasing_alamat" style="resize: none;" placeholder="Masukan Alamat Leasing"></textarea>
                                	<div class="line_error" id="error_address"><?php echo form_error('leasing_alamat'); ?></div>
                                </td>
                            </tr>
                            <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                            <tr>
                                <td>
                                    <label>Kode Pos</label>
                                </td>
                                <td>
                                    <input type="text" id="leasing_zipcode" name="leasing_zipcode" placeholder="Masukan Kode Pos" size="50"/>
                                    <div class="line_error" id="error_zip"><?php echo form_error('leasing_zipcode'); ?></div>
                                </td>
                            </tr>
                        </table>
                    </div>
                 </fieldset>
            <!--Custoner Detail Selesai!-->
  
            <div class="formButton">
                <button class="btn btn-blue" type="submit" id="submit_btn" value="Submit">Submit Leasing</button>&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn btn-blue" type="reset" value="Reset">Kosongkan seluruh field</button>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>