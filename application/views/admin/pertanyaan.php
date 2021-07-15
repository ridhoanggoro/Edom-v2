<div class="card shadow">
	<div class="card-header">	  
	  <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><i class="fas fa-user-plus"></i> Tambah Pertanyaan</a></div>
	</div>
	<div class="card-body">
	  <div class="table-responsive">
		<table class="table table-striped table-bordered" id="mydata" width="100%" cellspacing="0" id="mydata">
		<thead>
			<tr>
    			<th width="5%">No</th>
                <th width="10%">No Urut</th>
    			<th width="45%">Pertanyaan</th>
                <th width="10%">Kategori</th>
    			<th width="20%">Last Edit</th>
    			<th width="10%">Menu</th>
			</tr>
		</thead>
		<tbody id="tampil_data">
		</tbody>
		</table>
	  </div>
	</div>
</div>

<!-- MODAL ADD -->
<div class="modal fade" id="Modal_Add" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Pertanyaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="f_pertanyaan_add" id="f_pertanyaan_add" onsubmit="return pertanyaan_add();">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="no">Nomor Urut Pertanyaan</label>
                            <select class="custom-select mr-sm-2" id="no" name="no" required>
                                <option value="" selected>Pilih...</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                            </select>
                        </div>                
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="pertanyaan">Edom Pertanyaan</label>
                            <textarea class="form-control" id="pertanyaan" name="pertanyaan" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="kategori">Kategori</label>
                            <select class="form-control form-control-chosen" name="kategori" id="kategori" required>
                            <option value="">-- Pilih --</option>
                            <option value="1. Reliability">Reliability</option>
                            <option value="2. Responsive">Responsive</option>
                            <option value="3. Assurance">Assurance</option>
                            <option value="4. Empathy">Empathy</option>
                            <option value="5. Tangible">Tangible</option>
                            <option value="-">-</option>
                            </select>
                        </div>
                    </div>
				</div>
				<div class="modal-footer bg-whitesmoke">
					<button class="btn btn-secondary btn-shadow" data-dismiss="modal">Batalkan</button>
					<button id="btnAddPertanyaan" class="btn btn-primary btn-shadow">Simpan</button>
				</div>
            </div>
		</div>
	</div>   
</form>
<!--END MODAL ADD-->

<!-- MODAL EDIT -->
<div class="modal fade" id="Modal_Edit" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Pertanyaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="f_pertanyaan" id="f_pertanyaan" onsubmit="return pertanyaan_update();">
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="id_edit">ID Pertanyaan</label>
                            <input type="text" class="form-control" id="id_edit" name="id_edit" readonly>
                        </div>  
                        <div class="form-group col-md-3">
                            <label for="no_edit">Nomor Urut Pertanyaan</label>
                            <input type="text" class="form-control" id="no_edit" name="no_edit" required>
                        </div>                
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="pertanyaan_edit">Edom Pertanyaan</label>
                            <textarea class="form-control" id="pertanyaan_edit" name="pertanyaan_edit" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="kategori_edit">Kategori</label>
                            <select class="form-control form-control-chosen" name="kategori_edit" id="kategori_edit" required>
                                <option value="">-- Pilih --</option>
                                <option value="1. Reliability">Reliability</option>
                                <option value="2. Responsive">Responsive</option>
                                <option value="3. Assurance">Assurance</option>
                                <option value="4. Empathy">Empathy</option>
                                <option value="5. Tangible">Tangible</option>
                                <option value="-">-</option>
                            </select>
                        </div>
                    </div>
				</div>
				<div class="modal-footer bg-whitesmoke">
					<button class="btn btn-secondary btn-shadow" data-dismiss="modal">Batalkan Perubahan</button>
					<button id="btnUpdPertanyaan" class="btn btn-primary btn-shadow">Update</button>
				</div>
            </div>
		</div>
	</div>   
</form>
<!--END MODAL EDIT-->

<!--MODAL DELETE-->
<form>
    <div class="modal fade" id="Modal_Delete" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        $('#mydata').DataTable({
            "language": {
                "url": "<?php echo site_url('assets/datatables/Indonesian.json'); ?>"
            },
            "ordering": false,
            "columnDefs": [],
            "bProcessing": true,
            "serverSide": true,
            "bDestroy" : true,
            "pageLength": 10,
            "ajax":{
                url : "<?php echo site_url('admin/master/get_list_pertanyaan')?>", 
                type: "post",  
                error: function(){
                    $("#mydata").css("display","none");
                }
            }
        }); 
    });
    
</script>