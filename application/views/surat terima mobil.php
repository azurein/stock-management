 <!--jQuery Date Picker Mulai-->
    <script src="<?php echo base_url(); ?>staff_site_files/js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>staff_site_files/js/jquery-ui/jquery.ui.datepicker.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>staff_site_files/js/jquery-ui/jquery.ui.progressbar.min.js" type="text/javascript"></script>

     <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setupProgressbar('progress-bar');
            setDatePicker('date-picker');
            setupDialogBox('dialog', 'opener');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
<!--jQuery Date Picker Selesai-->
 
 <div class="grid_12">
    <div class="box round first fullpage">
        <h2>Surat Terima Mobil</h2>
        <div id="kiri2">
            <div class="block ">
                <form>
                   
                <!--Surat Terima Mobil Mulai!-->
                <div class="formMenu">
                    <table width="800">
                        <tr>
                            <td>
                                <label id="label_emp">ID Employee</label>
                            </td>
                            <td>
                                <input type="text" onfocus="cekKosong('label_emp','emp','error_emp'),cekLima('label_emp','emp','error_emp2')" onkeyup="cekKosong('label_emp','emp','error_emp'),cekLima('label_emp','emp','error_emp2'); " id="emp" name="emp" placeholder="ID Employee" size="50"/>
                                <p class="line_error" id="error_emp"></p>
                                <p class="line_error" id="error_emp2"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label id="label_stm">No. Surat Terima Mobil</label>
                            </td>
                            <td>
                                <input type="text" onfocus="cekKosong('label_stm','stm','error_stm'),cekLima('label_stm','stm','error_stm2')" onkeyup="cekKosong('label_stm','stm','error_stm'),cekLima('label_stm','stm','error_stm2'); " id="stm" name="stm" placeholder="No. Surat Terima Mobil" size="50"/>
                                <p class="line_error" id="error_stm"></p>
                                <p class="line_error" id="error_stm2"></p>
                            </td>
                        </tr>
                        
                        <tr><td>&nbsp;</td></tr>
                        
                        <tr>
                            <td>
                                <label id="label_date">Tanggal Inspeksi</label>
                            </td>
                            <td>
                                <input type="text" onfocus="cekKosong('label_date','date-picker','error_date')" onkeyup="cekKosong('label_date','date-picker','error_date')" id="date-picker" name="date-picker" placeholder="Klik [...]"/>  
                                <p class="line_error" id="error_date"></p>
                            </td>
                        </tr>
                        
                        <tr><td>&nbsp;</td></tr>
                        
                        <tr>
                            <td>
                                <label id="label_inspeksi">No. Inspeksi</label>
                            </td>
                            <td>
                                <input type="text" onfocus="cekKosong('label_inspeksi','inspeksi','error_ins'),cekLima('label_inspeksi','inspeksi','error_ins2')" onkeyup="cekKosong('label_inspeksi','inspeksi','error_ins'),cekLima('label_inspeksi','inspeksi','error_ins2')" id="inspeksi" name="inspeksi" placeholder="No. Inspeksi" size="50"/>
                                <p class="line_error" id="error_ins"></p>
                                <p class="line_error" id="error_ins2"></p>
                            </td>
                        </tr>
                    </table> 
                </div>
                <!--Surat Terima Mobil Selesai!-->            
                
                <!--Mobil Detail Mulai!-->
                <fieldset class="formGroupBox">
                        <legend class="formTitleMenu">Mobil Detail</legend>
                        <div class="formMenu">
                            <table width="800">
                                <tr>
                                    <td width="150">
                                        <label id="label_mobil">Kode Mobil</label>
                                    </td>
                                    <td>
                                        <input type="text" onfocus="cekKosong('label_mobil','mobil','error_mobil'),cekLima('label_mobil','mobil','error_mobil2')" onkeyup="cekKosong('label_mobil','mobil','error_mobil'),cekLima('label_mobil','mobil','error_mobil2')" id="mobil" name="mobil" placeholder="Kode Mobil" size="50"/>
                                        <p class="line_error" id="error_mobil"></p>
                                        <p class="line_error" id="error_mobil2"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label id="label_rangka">No. Rangka</label>
                                    </td>
                                    <td>
                                        <input type="text" onfocus="cekKosong('label_rangka','rangka','error_rangka'),cekLima('label_rangka','rangka','error_rangka2')" onkeyup="cekKosong('label_rangka','rangka','error_rangka'),cekLima('label_rangka','rangka','error_rangka2')" id="rangka" name="rangka" placeholder="No. Rangka Mobil" size="50"/>
                                        <p class="line_error" id="error_rangka"></p>
                                        <p class="line_error" id="error_rangka2"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label id="label_mesin">No. Mesin</label>
                                    </td>
                                    <td>
                                        <input type="text" onfocus="cekKosong('label_mesin','mesin','error_mesin'),cekLima('label_mesin','mesin','error_mesin2')" onkeyup="cekKosong('label_mesin','mesin','error_mesin'),cekLima('label_mesin','mesin','error_mesin2')" id="mesin" name="mesin" placeholder="No. Mesin Mobil" size="50"/>
                                        <p class="line_error" id="error_mesin"></p>
                                        <p class="line_error" id="error_mesin2"></p>
                                    </td>
                                </tr>

                            </table>
                        </div>
                </fieldset>
                <!--Mobil Detail Selesai!-->
                        
                        <div class="formButton">
                        <button class="btn btn-blue" type="submit" value="Submit">Submit Surat Terima Mobil</button>&nbsp;&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-blue" type="reset" value="Reset">Kosongkan seluruh field</button>
                        </div>
                        
                </form>
            </div>
        </div>
        <div id="kanan2">
        </div>
    </div>
</div>

<script>
	// cek inputan harus angka
	function cekAngka(idInput, idError)
	{
		document.getElementById(idError).innerHTML = "";
		var a = document.getElementById(idInput).value;
		if(isNaN(a)) {
			document.getElementById(idError).innerHTML = "Inputan harus angka";
		};
	}
	
    function cekKosong(label, tes, error_tes)
    {
        document.getElementById(error_tes).innerHTML = "";
        var b = document.getElementById(label).innerHTML;
        var a = document.getElementById(tes).value;
        if(a == "")
        {
            document.getElementById(error_tes).innerHTML = b+" Harus Diisi!";
        }
    }
    
    function cekLima(label2,idInput2, idError2 )
    {
        document.getElementById(idError2).innerHTML = "";
        var a = document.getElementById(idInput2).value;
        var b = document.getElementById(label2).innerHTML;
        if(a.length<5||a.length>5){
            document.getElementById(idError2).innerHTML = b+" Harus 5 Digit!";
        }
    }
    
</script> 
