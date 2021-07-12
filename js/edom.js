"use strict";

function get_form_data($form){
    let unindexed_array = $form.serializeArray();
    let indexed_array = {};
    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });
    return indexed_array;
  }

function unique_ID(){
    var dt = new Date().getTime();
    var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
        var r = (dt + Math.random()*16)%16 | 0;
        dt = Math.floor(dt/16);
        return (c=='x' ? r :(r&0x3|0x8)).toString(16);
    });
    return uuid;
}

/**
 *
 * Page level JS Function
 *
*/

$(document).ready(function(){
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
            url  : base_url+"admin/master/pertanyaan_delete/",
            dataType : "JSON",
            data : { seq_id:seq_id },
            success: function(data){
                $('[name="seq_id_delete"]').val("");
                $('#Modal_Delete').modal('hide');
                console.log('ok');
                window.location.assign(base_url+"admin/master/pertanyaan"); 
            }
        });
        return false;
    });

});

function pertanyaan_view(id){
    $("#Modal_Edit").modal('show');
    $.ajax({
        type: "GET",
        url: base_url+"admin/master/pertanyaan_detail/"+id,
        dataType: 'json',
        success: function(data) {
            $("#id_edit").val(data.seq_id);
            $("#no_edit").val(data.no);
            $("#pertanyaan_edit").val(data.pertanyaan);
            $("#kategori_edit").val(data.kategori).trigger("chosen:updated");;
            $("#pertanyaan_edit").focus();
        }
    });
    return false;
}

function pertanyaan_update() {
    var f_asal  = $("#f_pertanyaan");
    var form    = get_form_data(f_asal);
    $.ajax({        
        type: "POST",
        url: base_url+"admin/master/pertanyaan_update",
        data: JSON.stringify(form),
        dataType: 'json',
        contentType: 'application/json; charset=utf-8',
        beforeSend: function(){$('#btnUpdPertanyaan').addClass("btn btn-primary btn-shadow btn-progress");}
    }).done(function(response) {
        if (response.status == "ok") {
            $('#btnUpdPertanyaan').removeClass("btn-progress"); 
            console.log('ok');
            window.location.assign(base_url+"admin/master/pertanyaan"); 
        } else {
            console.log('gagal');
            $('#btnUpdPertanyaan').removeClass("btn-progress"); 
        }
    });
    return false;
}

function pertanyaan_add() {
    var f_asal  = $("#f_pertanyaan_add");
    var form    = get_form_data(f_asal);
    $.ajax({        
        type: "POST",
        url: base_url+"admin/master/pertanyaan_add",
        data: JSON.stringify(form),
        dataType: 'json',
        contentType: 'application/json; charset=utf-8',
        beforeSend: function(){$('#btnAddPertanyaan').addClass("btn btn-primary btn-shadow btn-progress");}
    }).done(function(response) {
        if (response.status == "ok") {
            $('#btnAddPertanyaan').removeClass("btn-progress"); 
            console.log('ok');
            window.location.assign(base_url+"admin/master/pertanyaan"); 
        } else {
            console.log('gagal');
            $('#btnAddPertanyaan').removeClass("btn-progress"); 
        }
    });
    return false;
}