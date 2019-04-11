<form method="post" action="<?php echo base_url();?>admin/gaji/cetak_laporan">
<div class="form-row">
  <div class="form-group col-md-3">
    <label for="periode">Periode</label>
    <select id="periode" name="periode" class="custom-select mr-sm-5" required>
      <option selected>Pilih Periode...</option>
      <option value="2019 - JANUARI">2019 - JANUARI</option>
      <option value="2019 - PEBRUARI">2019 - PEBRUARI</option>
    </select>
  </div>
  <div class="form-group col-md-3">
    <label for="role">Role</label>
    <select id="role" name="role" class="chosen-select mr-sm-5" required>
      <option selected>Pilih Role...</option>
      <option value="DOSEN">DOSEN</option>
      <option value="KARYAWAN">KARYAWAN</option>
    </select>
  </div>  
</div>
<div class="form-group row">
  <div class="col-sm-10">
    <button type="submit" class="btn btn-primary">Cetak</button>
  </div>
</div>
</form>