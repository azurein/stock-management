 <div class="grid_12">
    <div class="box round first fullpage">
        <h2>Bukti Serah Terima Barang</h2>
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
                                                <label id="label_nama">Nama Mobil</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="textf">
                                                <input type="text" onfocus="cekKosong('label_nama','nama','error_nama')" onkeyup="cekKosong('label_nama','nama','error_nama')" id="nama" name="nama" placeholder="Masukkan Nama Mobil" size="50" value="" />
                                                <p class="line_error" id="error_nama"></p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="label">
                                                <label id="label_tipe">Tipe Mobil</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="textf">
                                                <input type="text" onfocus="cekKosong('label_tipe','tipe','error_tipe')" onkeyup="cekKosong('label_tipe','tipe','error_tipe'" id="tipe" name="tipe" placeholder="Masukkan Tipe Mobil" size="50" value="" />
                                                <p class="line_error" id="error_tipe"></p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="label">
                                                <label id="label_warna">Warna Mobil</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="textf">
                                                <input type="text" onfocus="cekKosong('label_warna','warna','error_warna')" onkeyup="cekKosong('label_warna','warna','error_warna')" id="warna" name="warna" placeholder="Masukkan Warna Mobil" size="50" value="" />
                                                <p class="line_error" id="error_warna"></p>
                                            </div>
                                        </td>
                                    </tr>
                                </table>   
                            </div>
                        </td>
                    </tr>
                    
                    <!--Detail Customer Mulai!-->
                    <tr>
                        <td colspan="2" style="width: 600px;">
                            <fieldset class="formGroupBox">
                                <legend>&nbsp;&nbsp;&nbsp;&nbsp;Status</legend>
                                <table>
                                    <tr>
                                        <td style="width: 600px;">
                                            <div class="jarak">
                                                <div class="label" style="margin-left: 25px;">
                                                    <label>Status</label>
                                                </div>
                                                <div class="textf">
                                                    <label id="status">a</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 600px;">
                                            <div class="jarak">
                                                <div class="label" style="margin-left: 25px;">
                                                    <label>Tanggal indent</label>
                                                </div>
                                                <div class="textf">
                                                    <label id="tgl">a</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>   
                            </fieldset>
                        </td>
                        <td></td>
                    </tr>
                    
                    <!--Button mulai-->
                    <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
                    <tr>
                        <td style="width: 600px; padding-left: 20px;">
                            <button class="btn btn-blue" type="submit" value="Submit">Submit BSTB</button>&nbsp;&nbsp;&nbsp;&nbsp;
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
