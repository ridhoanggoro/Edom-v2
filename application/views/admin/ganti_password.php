<form action="<?php echo base_url();?>admin/karyawan/proses_password" method="POST"
      oninput='p2.setCustomValidity(p2.value != p1.value ? "Passwords do not match." : "")'>
  <p>
<?php 
  $info = $this->session->flashdata('msg');
  if (!empty ($info)) {
    echo $info;
  }
?>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationCustom01">Password Baru</label>
      <input type="text" class="form-control" name="p1" id="p1" placeholder="Password Baru" required>
      <div class="valid-feedback">
        Password yang bagus!
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationCustom01">Ulangi Password</label>
      <input type="text" class="form-control" name="p2" id="p2" placeholder="Password Baru" required>
      <div class="valid-feedback">
        Password yang bagus!
      </div>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Proses</button>
</form>