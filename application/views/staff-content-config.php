 <div class="grid_12">
 	<div id="information">
		<?php echo $this->session->flashdata('info'); ?>
 	</div>	
    <div class="box round first fullpage">
        <h2>Pengaturan Akun Anda</h2>
        <div class="block ">
            <?php echo form_open("index.php/admin_site/changeProfile"); ?>
            <style>
            	p{
            		text-indent: 140px;
            	}
            </style>
            <table class="form" cellspacing="0">
            	<tr>
                    <td>
                    	<label style="padding-right: 73px">Email baru:</label>
                        <input type="text" class="mini" name="email" placeholder="Masukkan email baru" value="<?php echo set_value('email'); ?>" /><font color="red"><?php echo form_error('email'); ?></font>
                    </td>
                </tr>
                <tr>
                    <td>
                    	<label style="padding-right: 37px">Ulang email baru:</label>
                        <input type="text" class="mini" name="reemail" placeholder="Ketik ulang email baru" value="<?php echo set_value('reemail'); ?>" /><font color="red"><?php echo form_error('reemail'); ?></font>
                    </td>
                </tr>
             	<tr><td></td></tr>
             	<tr>
                    <td>
                    	<label style="padding-right: 48px">Password lama:</label>
                        <input type="password" class="mini" name="oldpass" placeholder="Masukkan password lama" value="<?php echo set_value('oldpass'); ?>" /><font color="red"><?php echo form_error('oldpass'); ?></font>
                    	<p><font color="red"><?php echo $this->session->flashdata('error'); ?></font></p>
                    </td>
                </tr>
            	<tr>
                    <td>
                    	<label style="padding-right: 50px">Password baru:</label>
                        <input type="password" class="mini" name="pass" placeholder="Masukkan password baru" value="<?php echo set_value('pass'); ?>" /><font color="red"><?php echo form_error('pass'); ?></font>
                    </td>
                </tr>
                <tr>
                    <td>
                    	<label style="padding-right: 16px">Ulang password baru:</label>
                        <input type="password" class="mini" name="repass" placeholder="Ketik ulang password baru" value="<?php echo set_value('repass'); ?>" /><font color="red"><?php echo form_error('repass'); ?></font>
                    </td>
                </tr>
                <tr><td></td></tr><tr><td></td></tr> 
                <tr><td>
                	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                	<button class="btn btn-blue" type="submit" value="Submit">Perbaharui data</button>
                </td></tr>
            </table>
            </form>
        </div>
    </div>
</div>