<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Info</h6>
    </div>
    <div class="card-body">
    <form name="f_edom_add" id="f_edom_add" method="POST" action="<?php echo base_url(); ?>admin/master/update_edom_from">
		<div class="form-row">
			<div class="form-group col-md-5">
				<label for="id_form">ID Form</label>
				<input type="text" class="form-control" id="id_form" name="id_form" value="<?php echo $form_header['seq_id']; ?>" readonly>
			</div>     
			<div class="form-group col-md-7">
				<label for="nama_form">Nama Form</label>
				<input type="text" class="form-control" id="nama_form" name="nama_form" value="<?php echo $form_header['nama']; ?>" required>
			</div>         
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<div class="custom-control custom-switch">
				<input type="checkbox" name="status_aktif" <?php if ($form_header['status'] == "1") echo "checked"; ?> class="custom-control-input" id="status_aktif">
				<label class="custom-control-label" for="status_aktif">Status Aktif</label>
				</div>
			</div>
		</div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Pertanyaan</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
            <h2> Buat List Pertanyaan Edom </h2>
            <p><strong>Panduan:</strong> Pilih pertanyaan dari list yang tersedia pada kolom sebelah kiri, tekan CTRL untuk memilih lebih dari satu pilihan</p>
            <hr/>
            </div>
        </div>
        <select multiple="multiple" size="10" name="listpertanyaan[]" title="listpertanyaan[]">
        <?php foreach ($daftar_pertanyaan->result() as $value)  { ?>
        <option value="<?php echo $value->seq_id; ?>" <?php foreach ($form_detail->result_array() as $row ) { if ($value->seq_id == $row['id_pertanyaan']) echo 'selected="selected"'; } ?>><?php echo $value->no.'-'.character_limiter($value->pertanyaan,100); ?></option>
        <?php } ?>
        </select>
        <br>
        <div class="row">
            <div class="col-md-6">
                <a href="<?php echo base_url(); ?>admin/master/edom_form" class="btn btn-info w-100">Batal</a>
            </div>
            <div class="col-md-6">
                <button type="submit" id="btn_save" class="btn btn-success w-100">Update Form</button>
            </div>
        </div>
    </div>
    </form>
</div>

<script>
    var mylist = $('select[name="listpertanyaan[]"]').bootstrapDualListbox({
        nonSelectedListLabel: 'Pertanyaan Tersedia',
        selectedListLabel: 'Pertanyaan Dipilih',
        preserveSelectionOnMove: 'moved',
        moveOnSelect: false,
        moveAllLabel: 'Move all',
        removeAllLabel: 'Remove all'
    });
</script>