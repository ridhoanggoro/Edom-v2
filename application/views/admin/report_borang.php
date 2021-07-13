<form class="needs-validation" method="post" action="<?php echo base_url(); ?>admin/master/cetak_report_edom_borang" novalidate>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Report Penilaian Borang</h6>
  </div>
  <div class="card-body">
    <div class="form-row">
      <div class="form-group col-md-3">
        <label for="thn_akademik">Tahun Ajaran</label>
        <select class="form-control form-control-chosen" name="thn_akademik" id="thn_akademik" <?php echo 'onchange="load_dropdown_content($(\'#nidn\'), this.value)"' ?> required>
          <option value="">-- Pilih --</option>
             <?php foreach ($thn_akademik->result() as $value) { ?>
          <option value="<?php echo $value->semester; ?>" ><?php echo $value->semester; ?></option>
        <?php } ?>
        </select> 
        <div class="invalid-feedback">Harap Pilih Semester</div> 
      </div>  
      <div class="form-group col-md-4">
        <label for="prodi">Program Studi</label>
        <select class="form-control form-control-chosen" name="prodi" id="prodi" required>
          <option value="">-- Pilih --</option>
             <?php foreach ($list_prodi->result() as $value) { ?>
          <option value="<?php echo $value->kd_prodi; ?>" ><?php echo $value->nama_prodi; ?></option>
        <?php } ?>
        </select>
        <div class="invalid-feedback">Harap Pilih Prodi</div>
      </div>
    </div>
  	<div>
  		<button type="submit" id="btn_print" class="btn btn-primary">Print Report</button>
  	</div>
  </div>
</div>
</form>
<script>
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>