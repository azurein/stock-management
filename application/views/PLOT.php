 <div class="grid_12">
    <div class="box round first fullpage">
        <h2>Plot</h2>
        <div id="kiri2">
            <div class="block ">
                <form>
                <table class="form" cellspacing="0">
                    <tr>
                        <td colspan="2" style="width: 600px; padding-left: 20px;">
                            <div style="padding: 10px 0px 0px 0px;">
                                <table>
                                    <tr>
                                        <td>
                                            <div class="label">
                                                <label id="label_spk">No. SPK</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="textf">
                                                <input type="text" onfocus="cekKosong('label_spk','spk','error_spk'),cekLima('label_spk','spk','error_spk2')" onkeyup="cekKosong('label_spk','spk','error_spk'),cekLima('label_spk','spk','error_spk2'); " id="spk" name="spk" placeholder="Masukkan No SPK" size="50" value="" />
                                                <p class="line_error" id="error_spk"></p>
                                                <p class="line_error" id="error_spk2"></p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="label">
                                                <label>Status SPK</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="textf">
                                                <label>a</label>
                                            </div>
                                        </td>
                                    </tr>
                                </table>   
                            </div>
                        </td>
                    </tr>

                    <!--Detail Mobil Mulai!-->
                    <tr>
                        <td colspan="2" style="width: 600px;">
                            <fieldset class="formGroupBox">
                                <legend>&nbsp;&nbsp;&nbsp;&nbsp;Mobil</legend>
                                <table>
                                    <tr>
                                        <td style="width: 600px;">
                                            <div class="jarak">
                                                <div class="label" style="margin-left: 25px;">
                                                    <label>Nama</label>
                                                </div>
                                                <div class="textf">
                                                    <label id="nama">a</label>
                                                </div>
                                            </div>
                                            
                                            <div class="jarak">
                                                <div class="label" style="margin-left: 25px;">
                                                    <label>No. Rangka</label>
                                                </div>
                                                <div class="textf">
                                                    <label id="no_rangka">a</label>
                                                </div>
                                            </div>
                                            <div class="jarak">  
                                                <div class="label" style="margin-left: 25px;">
                                                    <label>No. Mesin</label>
                                                </div>
                                                <div class="textf">
                                                    <label id="no_mesin">a</label>
                                                </div>
                                            </div>
                                            <div class="jarak">
                                                <div class="label" style="margin-left: 25px;">
                                                    <label>Tipe</label>
                                                </div>
                                                <div class="textf">
                                                    <label id="tipe">a</label>
                                                </div>
                                            </div>
                                            <div class="jarak">
                                                <div class="label" style="margin-left: 25px;">
                                                    <label>Kode Mobil</label>
                                                </div>
                                                <div class="textf">
                                                    <label id="kode_mobil">a</label>
                                                </div>
                                            </div>
                                            <div class="jarak">
                                                <div class="label" style="margin-left: 25px;">
                                                    <label>Warna</label>
                                                </div>
                                                <div class="textf">
                                                    <label id="warna">a</label>
                                                </div>
                                            </div>
                                            <div class="jarak">
                                                <div class="label" style="margin-left: 25px;">
                                                    <label>Status</label>
                                                </div>
                                                <div class="textf">
                                                    <label id="status">Ready/ Not Ready</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>   
                            </fieldset>
                        </td>
                        <td></td>
                    </tr>
                    <!--Detail Mobil Selesai!-->
                    
                    <!--Button mulai-->
                    <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
                    <tr>
                        <td style="width: 600px; padding-left: 20px;">
                            <button class="btn btn-blue" type="submit" value="Submit">Submit Plot</button>&nbsp;&nbsp;&nbsp;&nbsp;
                            <button class="btn btn-blue" type="reset" value="Reset">Kosongkan seluruh field</button>
                        </td>
                    </tr>
                    <!--Button Selesai-->
                </table>
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
