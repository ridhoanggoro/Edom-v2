<script type = "text/javascript" >
    $(document).ready(function() {

        $('select[name="matkul"]').on('change', function() {
            $.ajax({
                type: "POST",
                data: "value=" + $(this).val(),
                url: "<?php echo base_url(); ?>admin/master/get_sks",
                success: function(msg) {
                    $('#sks').val(msg);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {                    
                    $.alert({
                        title: 'Gagal!',
                        content: errorThrown,
                    });
                }
            });
        });

        $('select[name="prodi"]').on('change', function() {            
            var id_prodi = $(this).val();

            // AJAX request
            $.ajax({
                url:'<?php echo base_url(); ?>admin/master/get_matkul_prodi',
                method: 'post',
                data: {id_prodi: id_prodi},
                dataType: 'json',
                success: function(response){

                // Remove options 
                $('#matkul').find('option').not(':first').remove();               

                // Add options
                $.each(response,function(index,data){
                    $('#matkul').append('<option value="'+data['kd_matkul']+'">'+data['nama_matkul']+'</option>');
                });

                $("#matkul").trigger("chosen:updated");
                $("#matkul").trigger("liszt:updated");
                }
            });
        });

        $('#btn_save').click(function() {
            var semester = $('#semester').val();
            var prodi = $('#prodi').val();
            var dosen = $('#dosen').val();
            var matkul = $('#matkul').val();
            var sks = $('#sks').val();
            var no_1 = $("input[name='no_1']:checked").val();
            var no_2 = $("input[name='no_2']:checked").val();
            var no_3 = $("input[name='no_3']:checked").val();
            var no_4 = $("input[name='no_4']:checked").val();
            var no_5 = $("input[name='no_5']:checked").val();
            var no_6 = $("input[name='no_6']:checked").val();
            var no_7 = $("input[name='no_7']:checked").val();
            var no_8 = $("input[name='no_8']:checked").val();
            var no_9 = $("input[name='no_9']:checked").val();
            var no_10 = $("input[name='no_10']:checked").val();
            var saran = $('#saran').val();
            $.ajax({
                url: '<?php echo base_url(); ?>admin/master/save_edom',
                type: 'POST',
                data: {
                    semester: semester,
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
                    $.alert({
                        title: 'Gagal!',
                        content: 'Data Belum Lengkap!',
                    });
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
                            <option>GASAL.2018-2019</option>
                            <option>GENAP.2018-2019</option>
                            <option>GASAL.2019-2020</option>
                            <option>GENAP.2019-2020</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="prodi">Prodi</label>
                        <select id="prodi" name="prodi" class="form-control form-control-chosen" data-placeholder="Please select...">
                            <option></option>
                            <?php foreach ($daftar_prodi->result() as $value) { ?>
                                <option value="<?php echo $value->kd_prodi; ?>">
                                    <?php echo $value->jenjang.'-'.$value->nama_prodi; ?>
                                </option>
                                <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="matkul">Mata Kuliah</label>
                        <select id="matkul" name="matkul" class="form-control form-control-chosen" data-placeholder="Please select...">
                            <option value="-">-- Pilih --</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="dosen">Dosen</label>
                        <select id="dosen" name="dosen" class="form-control form-control-chosen" data-placeholder="Please select...">
                            <option value="-">-- Pilih --</option>
                            <?php foreach ($daftar_dosen->result() as $value) { ?>
                                <option value="<?php echo $value->kd_dosen; ?>">
                                    <?php echo $value->nama; ?>
                                </option>
                                <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="sks">SKS</label>
                        <input type="text" readonly="" class="form-control" id="sks" name="sks">
                    </div>
                </div>

                <div class="alert alert-info" role="alert">
                    Keterangan: 1= Berarti Sangat Tidak Setuju; 2= Berarti Tidak Setuju;3= Berarti Setuju; 4= Berarti Sangat Setuju
                </div>
                <br/>
                               
                <?php $i=1; foreach ($list_pertanyaan->result() as $v) { 
                    echo "<div class='card shadow mb-2'>
                    <div class='card-header bg-gradient-primary py-3 text-center'>
                    <h6 class='m-0 font-weight-bold text-white'>".$v->kategori."</h6>
                    </div>
                            <div class='card-body'>
                            
                            <div class='form-group'>
                                <label for='no_".$i."'><span class='badge badge-primary'>$i</span> ".$v->pertanyaan."</label><br/>";
                                for ($j=1; $j <= 4 ; $j++) { 
                        echo "<div class='custom-control custom-radio custom-control-inline'>
                                <input type='radio' id='no_".$i."_".$j."' name='no_".$i."' class='custom-control-input' value='".$j."'>
                                <label class='custom-control-label' for='no_".$i."_".$j."'>".$j."</label>
                            </div>";
                    }
                    echo "</div>
                    </div></div>"; $i++;
                } ?>
                
                <div class="form-group">
                    <label for="saran">Saran</label>
                    <textarea class="form-control" id="saran" name="saran" rows="3"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-10">
        <button type="submit" id="btn_save" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-check"></i>
            </span>
            <span class="text">Simpan</span>
        </button>
    </div>
</div>