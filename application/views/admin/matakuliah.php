<p class="mb-4">Daftar Matakuliah</p>

<!-- DataTales Example -->
<div class="card shadow">
	<div class="card-header">	  
	  <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><i class="fas fa-user-plus"></i> Tambah Matakuliah</a></div>
	</div>
	<div class="card-body">
	  <div class="table-responsive">
		<table class="table table-striped table-bordered" id="mydata" width="100%" cellspacing="0">
		<thead>
			<tr>
    			<th>ID</th>
          <th>Kode Matakuliah</th>
    			<th>Nama</th>
    			<th>SKS</th>
    			<th>Prodi</th>
    			<th style="text-align: right;">Menu</th>
			</tr>
		</thead>
		<tbody id="tampil_data">
		</tbody>
		</table>
	  </div>
	</div>
</div>

<!-- MODAL ADD -->
<form>
	<div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Form Tambah Matakuliah</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
				<div class="form-row">
				  <div class="form-group col-md-4">
					<label for="kd_matkul">Kode Matakuliah</label>
					<input type="text" class="form-control" id="kd_matkul" name="kd_matkul">
				  </div> 
                 </div>
				<div class="form-row">
				  <div class="form-group col-md-8">
					<label for="nama_matkul">Nama </label>
					<input type="text" class="form-control" id="nama_matkul" name="nama_matkul">
				  </div>
				</div>
				<div class="form-row">
				  <div class="form-group col-md-12">
					<label for="sks">SKS</label>
					 <select id="single" class="form-control form-control-chosen" data-placeholder="Please select...">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>       
            </select>
				  </div>
          </div>
           <div class="form-row">
             <div class="form-group col-md-12">
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
				</div>							
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
			<button type="button" type="submit" id="btn_save" class="btn btn-primary">Simpan</button>
		  </div>
		</div>
	  </div>
	</div>
</form>
<!--END MODAL ADD-->

<!-- MODAL EDIT -->
<form>
    <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Matakuliah</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <div class="form-row">
                
                    <input type="text" hidden="" class="form-control" id="seq_id" name="seq_id">
                   
                  <div class="form-group col-md-4">
                    <label for="kd_matkul">Kode Matakuliah</label>
                    <input type="text" class="form-control" id="kd_matkul_edit" name="kd_matkul_edit">
                 
                </div>
                <div class="form-row">
                  <div class="form-group col-md-8">
                    <label for="nama_matkul">Nama </label>
                    <input type="text" class="form-control" id="nama_matkul_edit" name="nama_matkul_edit">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="sks">SKS</label>
                    <select id="single" name="sks_edit" name="sks_edit" class="form-control form-control-chosen" data-placeholder="Please select...">
                      <option value=""></option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>       
                    </select>
                  </div>
                  </div>
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="prodi">Prodi</label>
                    <select id="prodi_edit" name="prodi_edit" class="form-control form-control-chosen" data-placeholder="Please select...">
                        <option></option>
                        <?php foreach ($daftar_prodi->result() as $value) { ?>
                        <option value="<?php echo $value->kd_prodi; ?>">
                            <?php echo $value->jenjang.'-'.$value->nama_prodi; ?>
                        </option>
                        <?php } ?>
                    </select>
                  </div>
                </div>                
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
          </div>
        </div>
      </div>
    </div>
</form>
<!--END MODAL EDIT-->

<!--MODAL DELETE-->
<form>
    <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
               Anda yakin ingin menghapus data ini? Data yang sudah dihapus tidak dapat dikembalikan!
          </div>
          <div class="modal-footer">
            <input type="hidden" name="seq_id_delete" id="seq_id_delete" class="form-control">
            <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
            <button type="button" type="submit" id="btn_delete" class="btn btn-danger">Hapus</button>
          </div>
        </div>
      </div>
    </div>
</form>
<!--END MODAL DELETE-->

<script type="text/javascript">
    $(document).ready(function(){
        show_data(); //call function show all data   
        $('#mydata').dataTable();
          
        //function show all data
        function show_data(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo site_url('admin/master/list_matakuliah')?>',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].seq_id+'</td>'+
                                '<td>'+data[i].kd_matkul+'</td>'+
                                '<td>'+data[i].nama_matkul+'</td>'+
                                '<td>'+data[i].sks+'</td>'+
                                '<td>'+data[i].prodi+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-seq_id="'+data[i].seq_id+'" data-kd_matkul="'+data[i].kd_matkul+'" data-nama_matkul="'+data[i].nama_matkul+'"data-sks="'+data[i].sks+'"data-prodi="'+data[i].prodi+'">Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-seq_id="'+data[i].seq_id+'">Delete</a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#tampil_data').html(html);
                }
 
            });
        }
 
        //Save Data
        $('#btn_save').on('click',function(){
            var kd_matkul        = $('#kd_matkul').val();
            var nama_matkul      = $('#nama_matkul').val();
            var sks              = $('#sks').val();
            var prodi            = $('#prodi').val();            

            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('admin/master/save_matakuliah')?>",
                dataType : "JSON",
                data : {kd_matkul:kd_matkul, nama_matkul:nama_matkul, sks:sks, prodi:prodi},
                success: function(data){
                    $('[name="kd_matkul"]').val("");
                    $('[name="nama_matkul"]').val("");
                    $('[name="sks"]').val("");
                    $('[name="prodi"]').val("");                   
                    $('#Modal_Add').modal('hide');
                 
                   $.alert({            
            title: 'Sukses!',
            content: 'Data Dosen Berhasil Disimpan!',
          }); 
          
                    show_data();
                }

            });
            return false;
        });
 
        //get data for update record
        $('#tampil_data').on('click','.item_edit',function(){
            var seq_id         = $(this).data('seq_id');
            var kd_matkul      = $(this).data('kd_matkul');
            var nama_matkul    = $(this).data('nama_matkul');
            var sks            = $(this).data('sks');
            var prodi          = $(this).data('prodi');           
             
            $('#Modal_Edit').modal('show');
            $('[name="seq_id"]').val(seq_id);
            $('[name="kd_matkul_edit"]').val(kd_matkul);
            $('[name="nama_matkul_edit"]').val(nama_matkul);
            $('[name="sks_edit"]').val(sks);
            $('[name="prodi_edit"]').val(prodi);           
        });
 
        //update record to database
         $('#btn_update').on('click',function(){
            var seq_id         = $('#seq_id').val();    
            var kd_matkul      = $('#kd_matkul_edit').val();
            var nama_matkul    = $('#nama_matkul_edit').val();
            var sks            = $('#sks_edit').val();
            var prodi          = $('#prodi_edit').val();          

            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('admin/master/update_matakuliah')?>",
                dataType : "JSON",
                data : {seq_id:seq_id, kd_matkul:kd_matkul, nama_matkul:nama_matkul, sks:sks, prodi:prodi},
                success: function(data){
                    $('[name="kd_matkul_edit"]').val(kd_matkul);
                    $('[name="nama_matkul_edit"]').val(nama_matkul);
                    $('[name="sks_edit"]').val(sks);
                    $('[name="prodi_lengkap_edit"]').val(prodi);
                    $('#Modal_Edit').modal('hide');
                    show_data();
                }
            });
            return false;
        });
 
        //get data for delete record
        $('#tampil_data').on('click','.item_delete',function(){
            var seq_id = $(this).data('seq_id');             
            $('#Modal_Delete').modal('show');
            $('[name="seq_id_delete"]').val(seq_id);
        });
 
        //delete record to database
         $('#btn_delete').on('click',function(){
            var seq_id = $('#seq_id_delete').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('admin/master/delete_matakuliah')?>",
                dataType : "JSON",
                data : {seq_id:seq_id},
                success: function(data){
                    $('[name="seq_id_delete"]').val("");
                    $('#Modal_Delete').modal('hide');
                    show_data();
                }
            });
            return false;
        });
    });
 
</script>