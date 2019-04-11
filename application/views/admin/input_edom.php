<script type="text/javascript">
$(document).ready(function(){
  
  $('#btn_save').click(function(){
      var semester  = $('#semester').val();
      var prodi     = $('#prodi').val();
      var dosen     = $('#dosen').val();
      var matkul    = $('#matkul').val();
      var sks       = $('#sks').val();
      var no_1      = $("input[name='no_1']:checked").val();
      var no_2      = $("input[name='no_2']:checked").val();
      var no_3      = $("input[name='no_3']:checked").val();     
      var no_4      = $("input[name='no_4']:checked").val();
      var no_5      = $("input[name='no_5']:checked").val();
      var no_6      = $("input[name='no_6']:checked").val();   
      var no_7      = $("input[name='no_7']:checked").val();
      var no_8      = $("input[name='no_8']:checked").val();
      var no_9      = $("input[name='no_9']:checked").val();   
      var no_10     = $("input[name='no_10']:checked").val(); 
      var saran     = $('#saran').val();
      $.ajax({
         url: '<?php echo base_url(); ?>admin/master/save_edom',
         type: 'POST',
         data: {semester: semester,
          prodi: prodi,
          dosen: dosen,
          matkul: matkul,
          sks: sks,
          no_1: no_1,
          no_2: no_2,
          no_3: no_3,
          no_4: no_4,
          no_5: no_5,
          no_6: no_6,
          no_7: no_7,
          no_8: no_8,
          no_9: no_9,
          no_10: no_10,
          saran: saran          
        },
         error: function(XMLHttpRequest, textStatus, errorThrown) {
          //alert('Data harus di isi lengkap');
          alert(errorThrown + ' ' + textStatus);
         },
         success: function(data) {          
          $.alert({           
            title: 'Sukses!',
            content: 'Data Input Berhasil Disimpan!',
          }); 
         }
      });
    });
  });
</script>

<div class="row">
  <div class="col-lg-12">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">KUESIONER PENGUKURAN EVALUASI KINERJA DOSEN </h6>
      </div>
      <div class="card-body">
        <div class="form-row">
          <div class="form-group col-md-2">
           <label for="bank">Tahun Ajaran</label>
           <select id="semester" name="semester" class="form-control form-control-chosen" data-placeholder="Please select...">
            <option></option>
            <option>20181</option>
            <option>20182</option>
            <option>20191</option>
            <option>20192</option>        
          </select>
           </div>
       <div class="form-group col-md-3">
            <label for="prodi">Prodi</label>
            <select id="prodi" name="prodi" class="form-control form-control-chosen" data-placeholder="Please select...">
              <option></option>
              <option>S1/Teknik Mesin</option>
              <option>S1/Teknik Elektro</option>
              <option>S1/Teknik Sipil</option>
              <option>S1/Teknik Arsitektur</option>
              <option>S1/Teknik Industri</option>
              <option>S1/Teknik Informatika</option>
              <option>D3/Teknik Mesin</option>
              <option>D3/Teknik Elektro</option>         
            </select>
           </div>
          <div class="form-group col-md-3">
            <label for="matkul">Mata Kuliah</label>
            <input type="text" class="form-control text-left" id="matkul" name="matkul">
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
            <label for="dosen">Dosen</label>
            <input type="text" class="form-control text-left" id="dosen" name="dosen">
          </div>
          <div class="form-group col-md-1">
            <label for="sks">SKS</label>
            <select id="sks" name="sks" class="form-control form-control-chosen" data-placeholder="Please select...">
              <option></option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>7</option>
              <option>8</option>                      
            </select>
          </div>
        </div>
        
          <div class="alert alert-info" role="alert">
  Keterangan: 1= Berarti Sangat Tidak Setuju; 2= Berarti Tidak Setuju;3= Berarti  Setuju; 4= Berarti Sangat Setuju
</div>
<br/>
        <div class="form-group">
        <label for="no_1">1. Dosen menjelaskan rancangan pembelajaran (RPS) dan informasi referensi yang digunakan serta memberikan materi sesuai rancangan pembelajaran (RPS)</label>
        <br/>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline1" name="no_1" class="custom-control-input" value="1">
            <label class="custom-control-label" for="customRadioInline1">1</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline2" name="no_1" class="custom-control-input" value="2">
            <label class="custom-control-label" for="customRadioInline2">2</label>
          </div>
           <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline3" name="no_1" class="custom-control-input" value="3">
            <label class="custom-control-label" for="customRadioInline3">3</label>
          </div>
           <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline4" name="no_1" class="custom-control-input" value="4">
            <label class="custom-control-label" for="customRadioInline4">4</label>
          </div>
                  </div>
        <div class="form-group">
          <label for="no_2">2. Dosen menyampaikan materi kuliah secara sistematis</label>
          <br/>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_2_1" name="no_2" class="custom-control-input" value="1">
            <label class="custom-control-label" for="no_2_1">1</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_2_2" name="no_2" class="custom-control-input" value="2">
            <label class="custom-control-label" for="no_2_2">2</label>
          </div>
           <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_2_3" name="no_2" class="custom-control-input" value="3">
            <label class="custom-control-label" for="no_2_3">3</label>
          </div>
           <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_2_4" name="no_2" class="custom-control-input" value="4">
            <label class="custom-control-label" for="no_2_4">4</label>
          </div>
          
        </div>
        <div class="form-group">
          <label for="no_3">3. Dosen mempunyai/memberikan bahan ajar kepada mahasiswa (diktat ajar, handout, modul ajar, buku ajar)</label>
          <br/>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_3_1" name="no_3" class="custom-control-input" value="1">
            <label class="custom-control-label" for="no_3_1">1</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_3_2" name="no_3" class="custom-control-input" value="2">
            <label class="custom-control-label" for="no_3_2">2</label>
          </div>
           <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_3_3" name="no_3" class="custom-control-input" value="3">
            <label class="custom-control-label" for="no_3_3">3</label>
          </div>
           <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_3_4" name="no_3" class="custom-control-input" value="4">
            <label class="custom-control-label" for="no_3_4">4</label>
          </div>
           
        </div>
        <div class="form-group">
        <label for="no_4">4. Dosen memberikan contoh yang relevan dengan konsep yang diajarkan</label>
        <br/>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_4_1" name="no_4" class="custom-control-input" value="1">
            <label class="custom-control-label" for="no_4_1">1</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_4_2" name="no_4" class="custom-control-input" value="2">
            <label class="custom-control-label" for="no_4_2">2</label>
          </div>
           <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_4_3" name="no_4" class="custom-control-input" value="3">
            <label class="custom-control-label" for="no_4_3">3</label>
          </div>
           <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_4_4" name="no_4" class="custom-control-input" value="4">
            <label class="custom-control-label" for="no_4_4">4</label>
          </div>
          
        </div>
        <div class="form-group">
        <label for="no_5">5. Dosen mengajar tepat waktu </label>
       <br/>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_5_1" name="no_5" class="custom-control-input" value="1">
            <label class="custom-control-label" for="no_5_1">1</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_5_2" name="no_5" class="custom-control-input" value="2">
            <label class="custom-control-label" for="no_5_2">2</label>
          </div>
           <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_5_3" name="no_5" class="custom-control-input" value="3">
            <label class="custom-control-label" for="no_5_3">3</label>
          </div>
           <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_5_4" name="no_5" class="custom-control-input" value="4">
            <label class="custom-control-label" for="no_5_4">4</label>
          </div>
          
          </div>
        <div class="form-group">
        <label for="no_6">6. Dosen mengajar sesuai jadwal ( hari dan waktu mengajar)</label>
        <br/>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_6_1" name="no_6" class="custom-control-input" value="1">
            <label class="custom-control-label" for="no_6_1">1</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_6_2" name="no_6" class="custom-control-input" value="2">
            <label class="custom-control-label" for="no_6_2">2</label>
          </div>
           <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_6_3" name="no_6" class="custom-control-input" value="3">
            <label class="custom-control-label" for="no_6_3">3</label>
          </div>
           <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_6_4" name="no_6" class="custom-control-input" value="4">
            <label class="custom-control-label" for="no_6_4">4</label>
          </div>
          
          </div>
        <div class="form-group">
        <label for="no_7">7. Dosen membangun suasana aktif dengan tanya jawab</label>
        <br/>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_7_1" name="no_7" class="custom-control-input" value="1">
            <label class="custom-control-label" for="no_7_1">1</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_7_2" name="no_7" class="custom-control-input" value="2">
            <label class="custom-control-label" for="no_7_2">2</label>
          </div>
           <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_7_3" name="no_7" class="custom-control-input" value="3">
            <label class="custom-control-label" for="no_7_3">3</label>
          </div>
           <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_7_4" name="no_7" class="custom-control-input" value="4">
            <label class="custom-control-label" for="no_7_4">4</label>
          </div>
          
          </div>
        <div class="form-group">
        <label for="no_8">8. Dosen mengajar dengan memanfaatkan media infocus/LCD</label>
        <br/>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_8_1" name="no_8" class="custom-control-input" value="1">
            <label class="custom-control-label" for="no_8_1">1</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_8_2" name="no_8" class="custom-control-input" value="2">
            <label class="custom-control-label" for="no_8_2">2</label>
          </div>
           <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_8_3" name="no_8" class="custom-control-input" value="3">
            <label class="custom-control-label" for="no_8_3">3</label>
          </div>
           <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_8_4" name="no_8" class="custom-control-input" value="4">
            <label class="custom-control-label" for="no_8_4">4</label>
          </div>
          
          </div>
        <div class="form-group">
        <label for="no_9">9. Dosen menjelaskan kriteria penilaian hasil belajar mahasiswa diawal perkuliahan</label>
        <br/>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_9_1" name="no_9" class="custom-control-input" value="1">
            <label class="custom-control-label" for="no_9_1">1</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_9_2" name="no_9" class="custom-control-input" value="2">
            <label class="custom-control-label" for="no_9_2">2</label>
          </div>
           <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_9_3" name="no_9" class="custom-control-input" value="3">
            <label class="custom-control-label" for="no_9_3">3</label>
          </div>
           <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_9_4" name="no_9" class="custom-control-input" value="4">
            <label class="custom-control-label" for="no_9_4">4</label>
          </div>
          
          </div>
        <div class="form-group">
        <label for="no_10">10. Dosen memberikan soal test/kuis/Tugas/UTS/UAS, yang sesuai dengan materi yang diajarkan</label>
        <br/>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_10_1" name="no_10" class="custom-control-input" value="1">
            <label class="custom-control-label" for="no_10_1">1</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_10_2" name="no_10" class="custom-control-input" value="2">
            <label class="custom-control-label" for="no_10_2">2</label>
          </div>
           <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_10_3" name="no_10" class="custom-control-input" value="3">
            <label class="custom-control-label" for="no_10_3">3</label>
          </div>
           <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="no_10_4" name="no_10" class="custom-control-input" value="4">
            <label class="custom-control-label" for="no_10_4">4</label>
          </div>
         
       
       <div class="form-group">
          <label for="saran">Saran</label>
          <textarea class="form-control" id="saran"  name="saran" rows="3"></textarea>
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