<script type="text/javascript">
$(document).ready(function(){
	$('#no_induk').change(function() 
		{
			var no_induk = $(this).val();
			//alert(no_induk);
			$.ajax({				
				type 		: "POST",
                url  		: "<?php echo site_url('admin/karyawan/detail_karyawan')?>",
				async 		: true,
                dataType 	: "JSON",
                data 		: {no_induk:no_induk},								  
				success:function(data)
				{					
					var nama = data[0].nama_lengkap;		                   
					var bank = data[0].nama_bank;
					var rekening = data[0].no_rekening;
										
					$('[name="nama"]').val(nama);
					$('[name="bank"]').val(bank);
					$('[name="rekening"]').val(rekening);
				},
				error: function (jqXHR, textStatus, errorThrown) {
					alert(errorThrown);
					}
		  	});
		});
		
		$('#btn_save').click(function(){
			var no_induk        = $('#no_induk').val();
      var periode         = $('#periode').val();
      var p_gapok         = $('#p_gapok').val();
      var p_struktural    = $('#p_struktural').val();
      var p_fungsional    = $('#p_fungsional').val();
      var p_uang_makan    = $('#p_uang_makan').val();
			var p_transport     = $('#p_transport').val();
      var p_kelangkaan    = $('#p_kelangkaan').val();
      var p_peralihan     = $('#p_peralihan').val();
      var p_lain_lain     = $('#p_lain_lain').val();
      var t_gapok         = $('#t_gapok').val();
      var t_struktural    = $('#t_struktural').val();
			var t_fungsional    = $('#t_fungsional').val();
      var t_uang_makan    = $('#t_uang_makan').val();
      var t_transport     = $('#t_transport').val();
      var t_kelangkaan    = $('#t_kelangkaan').val();
      var t_lain_lain     = $('#t_lain_lain').val();
      var pot_bank        = $('#pot_bank').val();
			var pot_koperasi    = $('#pot_koperasi').val();
      var pot_astek       = $('#pot_astek').val();
      var pot_pajak       = $('#pot_pajak').val();
      var pot_transport   = $('#pot_transport').val();
      var pot_lain_lain   = $('#pot_lain_lain').val();            
			
			$.ajax({
			   url: '<?php echo base_url(); ?>admin/gaji/save',
			   type: 'POST',
			   data: {no_induk: no_induk,
					periode: periode,
					p_gapok: p_gapok,
					p_struktural: p_struktural,
					p_fungsional: p_fungsional,
					p_uang_makan: p_uang_makan,
					p_transport: p_transport,
					p_kelangkaan: p_kelangkaan,
					p_peralihan: p_peralihan,
					p_lain_lain: p_lain_lain,
					t_gapok: t_gapok,
					t_struktural: t_struktural,
					t_fungsional: t_fungsional,
					t_uang_makan: t_uang_makan,
					t_transport: t_transport,
					t_kelangkaan: t_kelangkaan,
					t_lain_lain: t_lain_lain,
					pot_bank: pot_bank,
					pot_koperasi: pot_koperasi,
					pot_astek: pot_astek,
					pot_pajak: pot_pajak,
					pot_transport: pot_transport,
					pot_lain_lain: pot_lain_lain 
				},
			   error: function() {
				  alert('Something is wrong');
			   },
			   success: function(data) {					
					$.alert({						
						title: 'Sukses!',
						content: 'Data Gaji Berhasil Disimpan!',
					}); 
			   }
			});
		});
	});
</script>

<div class="form-row">
  <div class="form-group col-md-4">
    <label for="no_induk">No. Induk</label>
    <select id="no_induk" name="no_induk" class="custom-select mr-sm-2">
		<option selected>Pilih...</option>
		<?php							
			foreach ($daftar_karyawan as $value) {

		  ?>
		<option value="<?php echo $value->no_induk;?>"><?php echo $value->no_induk.' - '.$value->nama; ?></option>			  
		<?php } ?>
    </select>
  </div>
  <div class="form-group col-md-8">
    <label for="bank">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama" readonly>
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-4">
    <label for="bank">Bank</label>
    <input type="text" class="form-control" id="bank" name="bank" readonly>
  </div>
  <div class="form-group col-md-4">
    <label for="inputZip">No. Rekening</label>
    <input type="text" class="form-control" id="rekening" name="rekening" readonly>
  </div>
  <div class="form-group col-md-4">
    <label for="periode">Periode</label>
    <select id="periode" name="periode" class="custom-select mr-sm-2" required>
      <option selected>Pilih Periode...</option>
      <option value="2019 - JANUARI">2019 - JANUARI</option>
      <option value="2019 - PEBRUARI">2019 - PEBRUARI</option>
    </select>
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">PENGHASILAN</h6>
      </div>
      <div class="card-body">
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="bank">Gaji Pokok</label>
            <input type="text" class="form-control text-left" id="p_gapok" name="p_gapok" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': 'Rp ', 'placeholder': '0'" required>
          </div>
          <div class="form-group col-md-3">
            <label for="inputZip">Struktural</label>
            <input type="text" class="form-control text-left" id="p_struktural" name="p_struktural" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': 'Rp ', 'placeholder': '0'">
          </div>
          <div class="form-group col-md-3">
            <label for="inputZip">Fungsional</label>
            <input type="text" class="form-control text-left" id="p_fungsional" name="p_fungsional" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': 'Rp ', 'placeholder': '0'">
          </div>
          <div class="form-group col-md-3">
            <label for="inputZip">Uang Makan</label>
            <input type="text" class="form-control text-left" id="p_uang_makan" name="p_uang_makan" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': 'Rp ', 'placeholder': '0'">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="bank">Transport</label>
            <input type="text" class="form-control text-left" id="p_transport" name="p_transport" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': 'Rp ', 'placeholder': '0'">
          </div>
          <div class="form-group col-md-3">
            <label for="inputZip">Kelangkaan</label>
            <input type="text" class="form-control text-left" id="p_kelangkaan" name="p_kelangkaan" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': 'Rp ', 'placeholder': '0'">
          </div>
          <div class="form-group col-md-3">
            <label for="inputZip">Peralihan</label>
            <input type="text" class="form-control text-left" id="p_peralihan" name="p_peralihan" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': 'Rp ', 'placeholder': '0'">
          </div>
          <div class="form-group col-md-3">
            <label for="inputZip">Lain-Lain</label>
            <input type="text" class="form-control text-left" id="p_lain_lain" name="p_lain_lain" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': 'Rp ', 'placeholder': '0'">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">TAMBAHAN/RAPEL</h6>
      </div>
      <div class="card-body">
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="bank">Gaji Pokok</label>
            <input type="text" class="form-control text-left" id="t_gapok" name="t_gapok" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': 'Rp ', 'placeholder': '0'">
          </div>
          <div class="form-group col-md-3">
            <label for="inputZip">Struktural</label>
            <input type="text" class="form-control text-left" id="t_struktural" name="t_struktural" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': 'Rp ', 'placeholder': '0'">
          </div>
          <div class="form-group col-md-3">
            <label for="inputZip">Fungsional</label>
            <input type="text" class="form-control text-left" id="t_fungsional" name="t_fungsional" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': 'Rp ', 'placeholder': '0'">
          </div>
          <div class="form-group col-md-3">
            <label for="inputZip">Uang Makan</label>
            <input type="text" class="form-control text-left" id="t_uang_makan" name="t_uang_makan" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': 'Rp ', 'placeholder': '0'">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="bank">Transport</label>
            <input type="text" class="form-control text-left" id="t_transport" name="t_transport" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': 'Rp ', 'placeholder': '0'">
          </div>
          <div class="form-group col-md-3">
            <label for="inputZip">Kelangkaan</label>
            <input type="text" class="form-control text-left" id="t_kelangkaan" name="t_kelangkaan" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': 'Rp ', 'placeholder': '0'">
          </div>
          <div class="form-group col-md-3">
            <label for="inputZip">Lain-Lain</label>
            <input type="text" class="form-control text-left" id="t_lain_lain" name="t_lain_lain" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': 'Rp ', 'placeholder': '0'">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">POTONGAN</h6>
      </div>
      <div class="card-body">
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="bank">Bank</label>
            <input type="text" class="form-control text-left" id="pot_bank" name="pot_bank" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': 'Rp ', 'placeholder': '0'">
          </div>
          <div class="form-group col-md-3">
            <label for="inputZip">Koperasi</label>
            <input type="text" class="form-control text-left" id="pot_koperasi" name="pot_koperasi" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': 'Rp ', 'placeholder': '0'">
          </div>
          <div class="form-group col-md-3">
            <label for="inputZip">Astek</label>
            <input type="text" class="form-control text-left" id="pot_astek" name="pot_astek" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': 'Rp ', 'placeholder': '0'">
          </div>
          <div class="form-group col-md-3">
            <label for="inputZip">Pajak</label>
            <input type="text" class="form-control text-left" id="pot_pajak" name="pot_pajak" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': 'Rp ', 'placeholder': '0'">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="bank">Transport</label>
            <input type="text" class="form-control text-left" id="pot_transport" name="pot_transport" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': 'Rp ', 'placeholder': '0'">
          </div>
          <div class="form-group col-md-3">
            <label for="inputZip">Lain-Lain</label>
            <input type="text" class="form-control text-left" id="pot_lain_lain" name="pot_lain_lain" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': 'Rp ', 'placeholder': '0'">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="form-group row">
  <div class="col-sm-10">    
	<button type="submit" id="btn_save" class="btn btn-primary">Simpan</button>
  </div>
</div>