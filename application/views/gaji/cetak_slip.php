<script type="text/javascript">
$(document).ready(function(){
	$('#no_induk').change(function() 
		{
			var no_induk = $(this).val();
			//alert(no_induk);
			 $.ajax({				
				type 		: "POST",
                url  	  	: "<?php echo site_url('admin/karyawan/detail_karyawan')?>",
				        async 		: true,
                dataType 	: "JSON",
                data 		 : {no_induk:no_induk},								  
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
				
	});
</script>
<form>
<div class="form-row">
  <div class="form-group col-md-4">
    <label for="no_induk">No. Indukzzzz</label>
    <select id="no_induk" name="no_induk" class="chosen-select mr-sm-2">
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
    <select id="periode" name="periode" class="chosen-select mr-sm-2" required>
      <option selected>Pilih Periode...</option>
      <option value="2019 - JANUARI">2019 - JANUARI</option>
      <option value="2019 - PEBRUARI">2019 - PEBRUARI</option>
    </select>
  </div>
</div>
<div class="form-group row">
  <div class="col-sm-10">
    <button type="submit" class="btn btn-primary">Cetak</button>
  </div>
</div>
</form>
<script type="text/javascript">
  $(function () {
    
    $('.chosen-select').chosen({allow_single_deselect:true});   
    
  })
</script>