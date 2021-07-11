<?php $info = $this->session->flashdata('msg');  if (!empty ($info)) { echo $info;  } ?>
<div class="card shadow">
	<div class="card-header">	  
	  <div class="float-right"><a href="<?php echo base_url(); ?>admin/master/add_edom_form" class="btn btn-primary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-user-plus"></i></span><span class="text">Tambah Form</span></a>
    </div>
	</div>
	<div class="card-body">
	  <div class="table-responsive">
		<table class="table table-striped table-bordered" id="mydata" width="100%" cellspacing="0" id="mydata">
		<thead>
			<tr>
    			<th width="5%">No</th>
                <th width="10%">ID Form</th>
                <th width="40%">Nama Form</th>
    			<th width="10%">Status</th>
    			<th width="20%">Last Edit</th>
    			<th width="5%">UserID</th>
                <th width="10%">Menu</th>
			</tr>
		</thead>
		<tbody id="tampil_data">
		</tbody>
		</table>
	  </div>
	</div>
</div>

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
                url : "<?php echo site_url('admin/master/get_list_edom_form')?>", 
                type: "post",  
                error: function(){
                    $("#mydata").css("display","none");
                }
            }
        }); 
    });
    
</script>