<form method="post" action="<?php echo base_url(); ?>admin/master/cetak_report_edom" >
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Report Penilaian</h6>
  </div>
  <div class="card-body">
    <div class="form-row">
      <div class="form-group col-md-2">
        <label for="bank">Tahun Ajaran</label>
        <select class="form-control form-control-chosen" name="thn_akademik" id="thn_akademik" <?php echo 'onchange="load_dropdown_content($(\'#nidn\'), this.value)"' ?>>
          <option value="-">-- Pilih --</option>
             <?php foreach ($thn_akademik->result() as $value) { ?>
          <option value="<?php echo $value->semester; ?>" ><?php echo $value->semester; ?></option>
        <?php } ?>
        </select>  
      </div>  
      <div class="form-group col-md-3">
        <label for="bank">Program Studi</label>
        <select class="form-control form-control-chosen" name="prodi" id="prodi">
          <option value="-">-- Pilih --</option>
             <?php foreach ($list_prodi->result() as $value) { ?>
          <option value="<?php echo $value->kd_prodi; ?>" ><?php echo $value->nama_prodi; ?></option>
        <?php } ?>
        </select>
      </div>
    </div>
	<div>
		<button type="submit" id="btn_print" class="btn btn-primary">Print Report</button>
	</div>
  </div>
</div>
</form>