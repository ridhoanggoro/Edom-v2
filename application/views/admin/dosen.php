<div class="card shadow">
	<div class="card-header">	  
	  <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><i class="fas fa-user-plus"></i> Tambah Dosen</a></div>
	</div>
	<div class="card-body">
	  <div class="table-responsive">
		<table class="table table-striped table-bordered" id="mydata" width="100%" cellspacing="0">
		<thead>
			<tr>
    			<th>No</th>
          <th>NIDN</th>
    			<th>Nama</th>
    			<th>Nama Lengkap</th>
    			<th>Role</th>
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
			<h5 class="modal-title" id="exampleModalLabel">Form Tambah Dosen</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
				<div class="form-row">
				  <div class="form-group col-md-4">
					<label for="nidn">NIDN</label>
					<input type="text" class="form-control" id="no_induk" name="no_induk">
				  </div> 
                  <div class="form-group col-md-8">
                    <label for="role">Role</label>
                    <select class="custom-select mr-sm-2" id="role" name="role">
                        <option selected>Pilih Role...</option>                               
                        <option value="DOSEN" selected="selected">DOSEN</option>
                        <option value="ADMIN">ADMIN</option>
                    </select>
                  </div> 
				</div>
				<div class="form-row">
				  <div class="form-group col-md-8">
					<label for="nama">Nama </label>
					<input type="text" class="form-control" id="nama" name="nama">
				  </div>
				</div>
				<div class="form-row">
				  <div class="form-group col-md-12">
					<label for="nama_lengkap">Nama Lengkap</label>
					<input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
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
            <h5 class="modal-title" id="exampleModalLabel">Edit Data Dosen</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <div class="form-row">
                
                    <input type="text" hidden="" class="form-control" id="seq_id" name="seq_id">
                   
                  <div class="form-group col-md-4">
                    <label for="nidn">No. Induk</label>
                    <input type="text" class="form-control" id="no_induk_edit" name="no_induk_edit" readonly>
                  </div> 
                  <div class="form-group col-md-8">
                    <label for="role">Role</label>
                    <select class="custom-select mr-sm-2" id="role_edit" name="role_edit" >
                        <option selected>Pilih Role...</option>
                        <option value="KARYAWAN">KARYAWAN</option>            
                        <option value="DOSEN">DOSEN</option>
                        <option value="ADMIN">ADMIN</option>
                    </select>
                  </div> 
                </div>
                <div class="form-row">
                  <div class="form-group col-md-8">
                    <label for="nama">Nama </label>
                    <input type="text" class="form-control" id="nama_edit" name="nama_edit">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_lengkap_edit" name="nama_lengkap_edit">
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
                url   : '<?php echo site_url('admin/master/list_dosen')?>',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=1; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+i+'</td>'+
                                '<td>'+data[i].kd_dosen+'</td>'+
                                '<td>'+data[i].nama+'</td>'+
                                '<td>'+data[i].nama_lengkap+'</td>'+
                                '<td>'+data[i].role+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-info btn-circle btn-sm item_edit" data-seq_id="'+data[i].seq_id+'" data-kd_dosen="'+data[i].kd_dosen+'" data-nama="'+data[i].nama+'"data-nama_lengkap="'+data[i].nama_lengkap+'"data-role="'+data[i].role+'"><i class="fas fa-search"></i></a>'+' '+
                                    '<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger btn-circle btn-sm item_delete" data-seq_id="'+data[i].seq_id+'"><i class="fas fa-trash"></i></a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#tampil_data').html(html);
                }
 
            });
        }
 
        //Save Data
        $('#btn_save').on('click',function(){
            var no_induk        = $('#no_induk').val();
            var role            = $('#role').val();
            var nama            = $('#nama').val();
            var nama_lengkap    = $('#nama_lengkap').val();            

            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('admin/master/save_dosen')?>",
                dataType : "JSON",
                data : {no_induk:no_induk, role:role, nama:nama, nama_lengkap:nama_lengkap},
                success: function(data){
                    $('[name="no_induk"]').val("");
                    $('[name="role"]').val("");
                    $('[name="nama"]').val("");
                    $('[name="nama_lengkap"]').val("");                   
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
            var seq_id          = $(this).data('seq_id');
            var no_induk        = $(this).data('kd_dosen');
            var role            = $(this).data('role');
            var nama            = $(this).data('nama');
            var nama_lengkap    = $(this).data('nama_lengkap');           
             
            $('#Modal_Edit').modal('show');
            $('[name="seq_id"]').val(seq_id);
            $('[name="no_induk_edit"]').val(no_induk);
            $('[name="role_edit"]').val(role);
            $('[name="nama_edit"]').val(nama);
            $('[name="nama_lengkap_edit"]').val(nama_lengkap);           
        });
 
        //update record to database
         $('#btn_update').on('click',function(){
            var seq_id          = $('#seq_id').val();    
            var no_induk        = $('#no_induk_edit').val();
            var role            = $('#role_edit').val();
            var nama            = $('#nama_edit').val();
            var nama_lengkap    = $('#nama_lengkap_edit').val();          

            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('admin/master/update_dosen')?>",
                dataType : "JSON",
                data : {seq_id:seq_id, no_induk:no_induk, role:role, nama:nama, nama_lengkap:nama_lengkap},
                success: function(data){
                    $('[name="no_induk_edit"]').val(no_induk);
                    $('[name="role_edit"]').val(role);
                    $('[name="nama_edit"]').val(nama);
                    $('[name="nama_lengkap_edit"]').val(nama_lengkap);
                    $('#Modal_Edit').modal('hide');
					
					$.alert({						
						title: 'Sukses!',
						content: 'Data Dosen Berhasil Di Update!',
					}); 
					
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
                url  : "<?php echo site_url('admin/master/delete_dosen')?>",
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