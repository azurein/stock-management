 <div class="grid_12">
 	<div id="information">
		<?php echo $this->session->flashdata('info'); ?>
 	</div>
    <div class="box round first fullpage">
        <h2>Tambah Staff baru dengan ID: <?php foreach($lastid as $row) { echo $row->id+1; } ?></h2>
        <div id="kiri2">
            <div class="block ">
                <?php echo form_open("index.php/admin_site/insertStaff"); ?>
                <table class="form" cellspacing="0">
                    <tr>
                        <td style="width: 180px;">
                            <label>Nama Staff :</label>
                        </td>
                        <td>
                            <input type="text" class="mini" name="name" value="<?php echo set_value('name'); ?>" placeholder="Masukkan nama staff" /><font color="red"><?php echo form_error('name'); ?></font>
                        </td>
                    </tr>
                    <tr><td></td></tr>
                    <tr>
                        <td>
                            <label>E-Mail Staff :</label>
                        </td>
                        <td>
                            <input type="text" class="mini" name="email" value="<?php echo set_value('email'); ?>" placeholder="Masukkan email staff" /><font color="red"><?php echo form_error('email'); ?></font>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Konfirmasi E-Mail Staff :</label>
                        </td>
                        <td>
                            <input type="text" class="mini" name="reemail" value="<?php echo set_value('reemail'); ?>" placeholder="Konfirmasi email staff" /><font color="red"><?php echo form_error('reemail'); ?></font>
                        </td>
                    </tr>
                    <tr><td></td></tr>
                    <tr>
                        <td>
                            <label>Password Staff :</label>
                        </td>
                        <td>
                            <input type="password" class="mini" name="pass" value="<?php echo set_value('pass'); ?>" placeholder="Masukkan password staff" /><font color="red"><?php echo form_error('pass'); ?></font>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Konfirmasi Password Staff :</label>
                        </td>
                        <td>
                            
                            <input type="password" class="mini" name="repass" value="<?php echo set_value('repass'); ?>" placeholder="Konfirmasi password staff" /><font color="red"><?php echo form_error('repass'); ?></font>
                        </td>
                    </tr>
                    <tr><td></td></tr>
                    <tr>
                        <td>
                            <label>Posisi Pekerjaan:</label>
                        </td>
                        
                        <td>
                            <select name="posisi" style="width: 200px;">
                                <option value="administrasi">Administrasi</option>
                                <option value="sales">Sales</option>
                                <option value="kasir">Kasir</option>
                                <option value="manager">Manager</option>
                            </select><font color="red">
                        </td>
                    </tr>
                    <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
                    <tr>
                        <td><button class="btn btn-blue" type="submit" value="Submit">Submit Staff baru</button></td>
                        <td>
                            <button class="btn btn-blue" type="reset" value="Reset">Kosongkan seluruh field</button>
                        </td>
                    </tr>
                </table>
                <?php echo form_close(); ?>
            </div>
        </div>
        <div id="kanan2">
        </div>
    </div>
</div>