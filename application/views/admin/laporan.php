<!-- Area Chart -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Grafik Penilaian</h6>
  </div>
  <div class="card-body">
    <div class="form-row">
      <div class="form-group col-md-2">
        <label for="bank">Tahun Ajaran</label>
        <select class="form-control form-control-chosen" name="thn_akademik" id="thn_akademik" <?php echo 'onchange="load_dropdown_content($(\'#nidn\'), this.value)"' ?>>
          <option value="-">-- Pilih --</option>
             <?php                                        
              foreach ($thn_akademik->result() as $value) {                             

              ?>
          <option value="<?php echo $value->semester; ?>" ><?php echo $value->semester; ?></option>
        <?php } ?>
        </select>  
      </div>  
      <div class="form-group col-md-3">
        <label for="bank">Program Studi</label>
        <select class="form-control form-control-chosen" name="prodi" id="prodi">
          <option value="-">-- Pilih --</option>
             <?php                                        
              foreach ($list_prodi->result() as $value) {                             

              ?>
          <option value="<?php echo $value->kd_prodi; ?>" ><?php echo $value->nama_prodi; ?></option>
        <?php } ?>
        </select>  
      </div> 
      <div class="form-group col-md-3">
        <label for="nidn">Dosen</label>     
        <?php echo form_dropdown('nidn', array('0' => '......'), NULL, 'id="nidn" class="custom-select" onchange="load_dropdown_content2($(\'#matkul\'), this.value)"');?>
        <script type="text/javascript">
        function load_dropdown_content(field_dropdown, selected_value){
          var result = $.ajax({
            'url' : '<?php echo site_url('admin/master/get_list_dosen_by_smt'); ?>/' + selected_value,
            'async' : false
          }).responseText;
          field_dropdown.replaceWith(result); }
        </script>
      </div>
      <div class="form-group col-md-4">
        <label for="matkul">Mata Kuliah</label>
        <div id="wrap">
          <?php echo form_dropdown('matkul', array('0' => '......'), NULL, 'id="matkul" class="custom-select"');?>  
            <script type="text/javascript">
            function load_dropdown_content2(field_dropdown, selected_value){
              var result = $.ajax({
                'url' : '<?php echo site_url('admin/master/get_list_matkul_by_dosen'); ?>/' + selected_value,
                'async' : false
              }).responseText;
              field_dropdown.replaceWith(result);
            }
          </script> 
        </div>
      </div>
    </div>
    <div class="chart-area">
      <canvas id="myAreaChart"></canvas>
    </div>
    <hr>
    <code>Catatan : grafik ini berisikan informasi input dari mahasiswa. </code
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    var chartype    = 'line';
    var chartTitle    = 'Angket Penilaian Dosen';  
    var chartCategories = '';
    var chartData   = '';

    $('#wrap').on('change', '#matkul', function() {
      //alert('tes');
          var id = $(this).val();
          var prodi = $('#prodi').val();
          var periode = $('#thn_akademik').val(); 
          var dosen = $('#nidn').val();
          $.ajax({
          type:"POST",       
          data: { nidn: dosen, thn_akademik: periode, matkul: id, prodi: prodi },
          url:"<?php echo base_url(); ?>admin/master/getData_grafikEvaluasiDosen",  
          dataType: 'json',      
          success:function(data)
          {          
              //console.log(data.matkul_per_prodi);  
              // chartCategories = data.pernyataan;
              poin = data.poin;
              chartCategories = data.desc;   
              setDynamicChart(chartype, chartTitle, chartCategories, poin);            
            }
          });
      });
  });
</script>