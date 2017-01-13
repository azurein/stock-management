 <div class="grid_12">
    <div class="box round first fullpage">
        <h2>Penerimaan Pembayaran</h2>
        <div id="kiri2">
            <div class="block ">
                <form>
                <table class="form" cellspacing="0">
                
                    <!--Penerimaan Pembayaran Mulai!-->
                    <tr>
                        <td style="width: 600px; padding-left: 20px;">
                            <div class="jarak">
                                <div class="label">
                                    <label>No. Penerimaan Pembayaran</label>
                                </div>
                            	<div class="textf">
                                    <label id="penerimaan_pembayaran">a</label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 600px; padding-left: 20px;">
                            <div class="jarak">
                                <div class="label">
                                    <label>Tgl. Penerimaan Pembayaran</label>
                                </div>
                            	<div class="textf">
                                    <label id="tgl_penerimaan_pembayaran">a</label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="width: 600px;">
                            <fieldset class="formGroupBox">
                                <div style="padding: 10px 0px 0px 0px;">
                                    <table>
                                        <tr>
                                            <td>
                                                <div class="label" style="margin-left: 25px;">
                                                    <label id="label_spk">No. SPK</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="textf">
                                                    <input type="text" onfocus="cekKosong('label_spk','spk','error_spk2'),cekLima('label_spk','spk','error_spk')" onkeyup="cekKosong('label_spk','spk','error_spk2'),cekLima('label_spk','spk','error_spk'); " id="spk" name="spk" placeholder="Masukkan SPK" size="50" value="" />
                                                    <p class="line_error" id="error_spk"></p>
                                                    <p class="line_error" id="error_spk2"></p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="label" style="margin-left: 25px;">
                                                    <label id="label_kwitansi">No. Kwitansi</label>
                                                </div>  
                                            </td>
                                            <td>
                                                <div class="textf">
                                                    <input type="text" onfocus="cekKosong('label_kwitansi','kwitansi','error_kwit')" onkeyup="cekKosong('label_kwitansi','kwitansi','error_kwit')" id="kwitansi" name="kwitansi" placeholder="Masukkan Kwitansi" size="50" value="" /><br/>
                                                    <p class="line_error" id="error_kwit"></p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="label" style="margin-left: 25px;">
                                                    <label id="label_uang">Nilai Uang</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="textf">
                                                    <input type="text" onfocus="cekKosong('label_uang','uang','error_uang'), cekAngka('uang','error_uang2')" onkeyup="cekKosong('label_uang','uang','error_uang'), cekAngka('uang','error_uang2')" id="uang" name="uang" placeholder="Masukkan Uang" size="50" value="" /><br/>
                                                    <p class="line_error" id="error_uang"></p>
                                                    <p class="line_error" id="error_uang2"></p>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>   
                                </div>
                                
                            </fieldset>
                        </td>
                        <td></td>
                    </tr>
                    <!--Penerimaan Pembayaran Selesai!-->
                    
                    <!--Button Mulai!-->
                    <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
                    <tr>
                        <td style="width: 600px; padding-left: 20px;">
                            <button class="btn btn-blue" type="submit" value="Submit">Submit Penerimaan</button>&nbsp;&nbsp;&nbsp;&nbsp;
                            <button class="btn btn-blue" type="reset" value="Re set">Kosongkan seluruh field</button>
                        </td>
                    </tr>
                    <!--Button Selesai!-->
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

