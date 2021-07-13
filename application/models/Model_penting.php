<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Model_penting extends CI_model {

    function __construct() {
	    parent::__construct();
	    $this->db->query("SET time_zone='+7:00'");
	}
	
	// Model EDOM

	function list_dosen()
	{		
        $result = $this->db->get('dosen');
		return $result->result();
    }

    function save_dosen()
    {
        $data = array(
                'kd_dosen'  => $this->input->post('no_induk'), 
                'nama'  => $this->input->post('nama'), 
                'nama_lengkap' => $this->input->post('nama_lengkap'), 
                'role' => $this->input->post('role')                         
            );
        $result=$this->db->insert('dosen',$data);

        // $data_login = array('userid' => $this->input->post('no_induk'),
        // 					'pwd' => md5($this->input->post('no_induk')),
        // 					'no_induk' => $this->input->post('no_induk'),
        // 					'user_update' => $this->session->userdata('userid')
        // 				);
        // $this->db->insert('user_info',$data_login);
        return $result;
    }
 
    function update_dosen()
    {
        $seq_id = $this->input->post('seq_id');
       	
       	$data = array(
                'kd_dosen'  => $this->input->post('no_induk'), 
                'nama'  => $this->input->post('nama'), 
                'nama_lengkap' => $this->input->post('nama_lengkap'), 
                'role' => $this->input->post('role')               
            );
 
        $this->db->where('seq_id', $seq_id);
		$result = $this->db->update('dosen', $data);
        return $result;
    }
 
    function delete_dosen()
    {
        $seq_id = $this->input->post('seq_id');
        $this->db->where('seq_id', $seq_id);
        $result = $this->db->delete('dosen');
        return $result;
    }

    function list_matakuliah($id='')
    {    
        $response = array();   
        if ($id == 'FILTERED')
        {
          $postData = $this->input->post();          
          $this->db->where('prodi', $postData['id_prodi']);
          $this->db->order_by('nama_matkul', 'asc');
          $q = $this->db->get('matakuliah');
          $response = $q->result_array();
          return $response;
        } else {
            
            $this->db->order_by('nama_matkul', 'asc');
            $result = $this->db->get('matakuliah');
            
            return $result->result();
        }
    }

    function save_matakuliah()
    {
        $data = array(
                'kd_matkul'  => $this->input->post('kd_matkul'), 
                'nama_matkul'  => $this->input->post('nama_matkul'), 
                'sks' => $this->input->post('sks'), 
                'prodi' => $this->input->post('prodi')                         
            );
        $result=$this->db->insert('matakuliah',$data);

        // $data_login = array('userid' => $this->input->post('no_induk'),
        //                  'pwd' => md5($this->input->post('no_induk')),
        //                  'no_induk' => $this->input->post('no_induk'),
        //                  'user_update' => $this->session->userdata('userid')
        //              );
        // $this->db->insert('user_info',$data_login);
        return $result;
    }
 
    function update_matakuliah()
    {
        $seq_id = $this->input->post('seq_id');
        
        $data = array(
                'kd_matkul'  => $this->input->post('kd_matkul'), 
                'nama_matkul'  => $this->input->post('nama_matkul'), 
                'sks' => $this->input->post('sks'), 
                'prodi' => $this->input->post('prodi')               
            );
 
        $this->db->where('seq_id', $seq_id);
        $result = $this->db->update('matakuliah', $data);
        return $result;
    }
 
    function delete_matakuliah()
    {
        $seq_id = $this->input->post('seq_id');
        $this->db->where('seq_id', $seq_id);
        $result = $this->db->delete('matakuliah');
        return $result;
    }
	function save_edom($d)
    {     
        $no_1 = (isset($d->no_1)) ? $d->no_1 : null ; 
        $no_2 = (isset($d->no_2)) ? $d->no_2 : null ;
        $no_3 = (isset($d->no_3)) ? $d->no_3 : null ;
        $no_4 = (isset($d->no_4)) ? $d->no_4 : null ;
        $no_5 = (isset($d->no_5)) ? $d->no_5 : null ;
        $no_6 = (isset($d->no_6)) ? $d->no_6 : null ;
        $no_7 = (isset($d->no_7)) ? $d->no_7 : null ;
        $no_8 = (isset($d->no_8)) ? $d->no_8 : null ;
        $no_9 = (isset($d->no_9)) ? $d->no_9 : null ;
        $no_10 = (isset($d->no_10)) ? $d->no_10 : null ;
        $no_11 = (isset($d->no_11)) ? $d->no_11 : null ;
        $no_12 = (isset($d->no_12)) ? $d->no_12 : null ;
        $no_13 = (isset($d->no_13)) ? $d->no_13 : null ;
        $no_14 = (isset($d->no_14)) ? $d->no_14 : null ;
        $no_15 = (isset($d->no_15)) ? $d->no_15 : null ;
        $no_16 = (isset($d->no_16)) ? $d->no_16 : null ;
        $no_17 = (isset($d->no_17)) ? $d->no_17 : null ;
        $no_18 = (isset($d->no_18)) ? $d->no_18 : null ;
        $no_19 = (isset($d->no_19)) ? $d->no_19 : null ;
        $no_20 = (isset($d->no_20)) ? $d->no_20 : null ;
        $no_21 = (isset($d->no_21)) ? $d->no_21 : null ;
        $no_22 = (isset($d->no_22)) ? $d->no_22 : null ;
        $no_23 = (isset($d->no_23)) ? $d->no_23 : null ; 
        $no_24 = (isset($d->no_24)) ? $d->no_24 : null ;
        $no_25 = (isset($d->no_25)) ? $d->no_25 : null ;
        
        $kat_1 = (isset($d->kat_1)) ? $d->kat_1 : null ; 
        $kat_2 = (isset($d->kat_2)) ? $d->kat_2 : null ;
        $kat_3 = (isset($d->kat_3)) ? $d->kat_3 : null ;
        $kat_4 = (isset($d->kat_4)) ? $d->kat_4 : null ;
        $kat_5 = (isset($d->kat_5)) ? $d->kat_5 : null ;
        $kat_6 = (isset($d->kat_6)) ? $d->kat_6 : null ;
        $kat_7 = (isset($d->kat_7)) ? $d->kat_7 : null ;
        $kat_8 = (isset($d->kat_8)) ? $d->kat_8 : null ;
        $kat_9 = (isset($d->kat_9)) ? $d->kat_9 : null ;
        $kat_10 = (isset($d->kat_10)) ? $d->kat_10 : null ;
        $kat_11 = (isset($d->kat_11)) ? $d->kat_11 : null ;
        $kat_12 = (isset($d->kat_12)) ? $d->kat_12 : null ;
        $kat_13 = (isset($d->kat_13)) ? $d->kat_13 : null ;
        $kat_14 = (isset($d->kat_14)) ? $d->kat_14 : null ;
        $kat_15 = (isset($d->kat_15)) ? $d->kat_15 : null ;
        $kat_16 = (isset($d->kat_16)) ? $d->kat_16 : null ;
        $kat_17 = (isset($d->kat_17)) ? $d->kat_17 : null ;
        $kat_18 = (isset($d->kat_18)) ? $d->kat_18 : null ;
        $kat_19 = (isset($d->kat_19)) ? $d->kat_19 : null ;
        $kat_20 = (isset($d->kat_20)) ? $d->kat_20 : null ;
        $kat_21 = (isset($d->kat_21)) ? $d->kat_21 : null ;
        $kat_22 = (isset($d->kat_22)) ? $d->kat_22 : null ;
        $kat_23 = (isset($d->kat_23)) ? $d->kat_23 : null ; 
        $kat_24 = (isset($d->kat_24)) ? $d->kat_24 : null ;
        $kat_25 = (isset($d->kat_25)) ? $d->kat_25 : null ;

        $data = array(
                'semester'       => $d->semester, 
                'prodi'          => $d->prodi, 
                'dosen'          => $d->dosen,
                'matkul'         => $d->matkul,
                'form_id'        => $d->form_id,
                'sks'            => $d->sks,
                'jawaban1'       => $no_1, 
                'jawaban2'       => $no_2, 
                'jawaban3'       => $no_3,
                'jawaban4'       => $no_4, 
                'jawaban5'       => $no_5,  
                'jawaban6'       => $no_6, 
                'jawaban7'       => $no_7,  
                'jawaban8'       => $no_8, 
                'jawaban9'       => $no_9, 
                'jawaban10'      => $no_10,
                'jawaban11'      => $no_11,
                'jawaban12'      => $no_12,
                'jawaban13'      => $no_13,
                'jawaban14'      => $no_14,
                'jawaban15'      => $no_15,
                'jawaban16'      => $no_16,
                'jawaban17'      => $no_17,
                'jawaban18'      => $no_18,
                'jawaban19'      => $no_19,
                'jawaban20'      => $no_20,
                'jawaban21'      => $no_21,
                'jawaban22'      => $no_22,
                'jawaban23'      => $no_23,
                'jawaban24'      => $no_24,
                'jawaban25'      => $no_25,
                'saran'          => $d->saran,
                'last_update'    => date('Y-m-d h:i:s A'),
                'user_update'    => $this->session->userdata('userid')               
            );
        $this->db->insert('evaluasi',$data);

        $q = $this->db->query("SELECT MAX(seq_id) maks FROM evaluasi")->row_array();
        $id_akhir = $q['maks'];

        $j = $d->jml_soal;
        for ($i=0; $i < $j; $i++) { 
            $data_details[] = array(
                'seq_id' => $id_akhir,
                'id_pertanyaan' => '', 
                'kategori' => $kat_.$i,
                'nilai' => $no_.$i
            );
        }

        $this->db->insert_batch('evaluasi_kategori', $data_details);
        
        $ret_val['status'] = "ok";
        $ret_val['msg'] = "Insert data sukses...";
        return $ret_val;
    }
	
	function ThnAkademikKuisioner()
	{
		$this->db->distinct();
		$this->db->select('semester');
		return $this->db->get('evaluasi');		
	}

    function ProdiKuisioner()
    {
        $sql = "SELECT DISTINCT prodi.kd_prodi ,prodi.nama_prodi FROM prodi INNER JOIN evaluasi ON evaluasi.prodi=prodi.kd_prodi";
        return $this->db->query($sql);
    }
	
	function getListDosen($id='')
	{
        if ($id=='ALL')
        {
            $this->db->order_by('nama', 'ASC');
            $this->db->where('role', 'DOSEN');
            $query = $this->db->get('dosen');
            return $query;
        }
        else {
            $sql = "SELECT '' AS kd_dosen, '----PILIH DOSEN----' AS nama, '----PILIH DOSEN----' AS nama_lengkap UNION SELECT DISTINCT dosen.kd_dosen, dosen.nama,dosen.nama_lengkap FROM evaluasi INNER JOIN dosen on dosen.kd_dosen=evaluasi.dosen WHERE evaluasi.semester='$id'";
                    
            $query = $this->db->query($sql);
            $dosen_list = array();
            
            if($query->result()){
                foreach ($query->result() as $dosen) {
                    $dosen_list[$dosen->kd_dosen] = $dosen->nama_lengkap;
                }
                return $dosen_list;
            } 
            else 
            {
                return FALSE;
            }
        }
	}
	
    function getListMatkul($id='')
    {
        if ($id=='ALL')
        {
            $this->db->order_by('nama_matkul', 'ASC');
            $query = $this->db->get('matakuliah');
            return $query;
        }
        else {
            $sql = "SELECT '' AS kd_matkul, '----PILIH MATAKULIAH----' AS nama_matkul UNION SELECT DISTINCT matakuliah.kd_matkul,CONCAT(matakuliah.nama_matkul, ' - ',matakuliah.sks, ' SKS') AS nama_matkul from matakuliah INNER JOIN evaluasi ON evaluasi.matkul=matakuliah.kd_matkul WHERE evaluasi.dosen='$id'";				
            $query = $this->db->query($sql);
            $matkul_list = array();
            
            if($query->result()){
                foreach ($query->result() as $matkul) {
                    $matkul_list[$matkul->kd_matkul] = $matkul->nama_matkul;
                }
                return $matkul_list;
            } 
            else 
            {
                return FALSE;
            }
        }
		
    }

    function getListProdi($id='')
    {
        if ($id=='ALL')
        {
            $this->db->order_by('jenjang', 'ASC');
            $query = $this->db->get('prodi');
            return $query;
        } else {
            $this->db->order_by('nama_prodi', 'ASC');
            $query = $this->db->get('prodi');
            return $query->result();
        }
    }

    function getListPertanyaan($id='')
    {
        if ($id=='ALL')
        {
            $this->db->order_by('seq_id', 'ASC');
            $query = $this->db->get('pertanyaan');
            return $query;
        } else {
            $sql = "SELECT p.* FROM form f INNER JOIN form_detail fd ON fd.form_id=f.seq_id INNER JOIN pertanyaan p ON p.seq_id=fd.id_pertanyaan WHERE f.status=1 ORDER BY p.no";
            $query = $this->db->query($sql);
            return $query;
        }
    }

    function getAktifEdomForm(){
        $this->db->where('status', '1');
        return $this->db->get('form')->row_array();
    }

    function list_pertanyaan($start, $length, $draw, $search)
    {
        $d_total_row = $this->db->query("SELECT * FROM pertanyaan WHERE pertanyaan LIKE '%".$search['value']."%'")->num_rows();

        $q_datanya = $this->db->query("SELECT * FROM pertanyaan WHERE pertanyaan LIKE '%".$search['value']."%' ORDER BY seq_id LIMIT ".$start.", ".$length."")->result_array();

        $data = array();
        $no = ($start+1);
        $id = 0;

        foreach ($q_datanya as $d) {
            $data_ok = array();
            $data_ok[] = $no++;
            $data_ok[] = $d['no'];
            $data_ok[] = $d['pertanyaan'];   
            $data_ok[] = $d['kategori'];  
            $data_ok[] = date("d F Y H:i:s", strtotime($d['last_update']));   

            $data_ok[] = '<a href="#" onclick="return pertanyaan_view('.$d['seq_id'].');" class="btn btn-icon btn-sm btn-info"><i class="fas fa-search"></i></a>
            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger btn-icon btn-sm item_delete" data-seq_id="'.$d['seq_id'].'"><i class="fas fa-trash"></i></a>';
 

            $data[] = $data_ok;
            $id++;
        }

        $json_data = array(
            "draw" => $draw,
            "iTotalRecords" => $d_total_row,
            "iTotalDisplayRecords" => $d_total_row,
            "data" => $data
        );
        return $json_data;
    }

    function pertanyaan_update($d)
    {
        $data = array('no'  => $d->no_edit, 
        'pertanyaan'  => $d->pertanyaan_edit, 
        'kategori' => $d->kategori_edit,
        'last_update' => date('Y-m-d h:i:s A'), 
        'userid' => $this->session->userdata('userid'));
        $this->db->where('seq_id', $d->id_edit);
        $query = $this->db->update('pertanyaan', $data);

        $ret_val['status'] = "ok";
        $ret_val['msg'] = "Update data sukses...";
        return $ret_val;
    }

    function pertanyaan_add($d)
    {
        $data = array('no' => $d->no, 
        'pertanyaan' => $d->pertanyaan, 
        'kategori' => $d->kategori,
        'last_update' => date('Y-m-d h:i:s A'), 
        'userid' => $this->session->userdata('userid'));
        $str = $this->db->insert_string('pertanyaan', $data);
        $this->db->query($str);
        $ret_val['status'] = "ok";
        $ret_val['msg'] = "Insert data sukses...";
        return $ret_val;
    }

    function pertanyaan_delete()
    {
        $seq_id = $this->input->post('seq_id');
        $this->db->where('seq_id', $seq_id);
        $result = $this->db->delete('pertanyaan');
        return $result;
    }

    function list_edom_form($start, $length, $draw, $search)
    {
        $d_total_row = $this->db->query("SELECT * FROM form WHERE nama LIKE '%".$search['value']."%'")->num_rows();

        $q_datanya = $this->db->query("SELECT * FROM form WHERE nama LIKE '%".$search['value']."%' ORDER BY seq_id LIMIT ".$start.", ".$length."")->result_array();

        $data = array();
        $no = ($start+1);
        $id = 0;

        foreach ($q_datanya as $d) {
            $data_ok = array();
            $data_ok[] = $no++;
            $data_ok[] = $d['seq_id'];
            $data_ok[] = $d['nama'];   
            $data_ok[] = '';   
            $data_ok[] = date("d F Y H:i:s", strtotime($d['last_update']));   
            $data_ok[] = $d['userid']; 
            $data_ok[] = '<a href="'.base_url().'admin/master/view_edom_form/'.$d['seq_id'].'" class="btn btn-icon btn-sm btn-info"><i class="fas fa-search"></i></a>';
 
            if ($d['status'] == "1")
            {
                $data_ok[3] .= '<span class="badge badge-primary">Sedang digunakan</span>';
            } else {
                $data_ok[3] .= '<span class="badge badge-danger">Tidak Aktif</span>';
            }
            $data[] = $data_ok;
            $id++;
        }

        $json_data = array(
            "draw" => $draw,
            "iTotalRecords" => $d_total_row,
            "iTotalDisplayRecords" => $d_total_row,
            "data" => $data
        );
        return $json_data;
    }

    function save_edom_from($data, $detail)
    {
        $stat = $data['status'];
        if ($stat == '1') {
            $this->db->query('UPDATE form SET status=0');
        }

        $this->db->insert('form', $data);

        $id = $data['seq_id'];
        $s = sizeof($detail['list_pertanyaan']);
        for ($i=0; $i < $s; $i++) { 
            $data_details[] = array(
                'form_id' => $id, 
                'id_pertanyaan' => $detail['list_pertanyaan'][$i],
                'last_save' => date('Y-m-d h:i:s A'),
                'userid' => $this->session->userdata('userid')
            );
        }
        $this->db->insert_batch('form_detail', $data_details);
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check"></i> EDOM Form <b>'.$data['nama'].'</b> sudah berhasil di tambah!!!</div>');
		redirect('admin/master/edom_form');
    }

    function update_edom_from($key, $data, $detail)
    {
        $stat = $data['status'];
        if ($stat == '1') {
            $this->db->query('UPDATE form SET status=0');
        }

        $this->db->where('seq_id', $key);
        $this->db->update('form', $data);

        $this->db->query("DELETE FROM form_detail WHERE form_id='$key'");

        $s = sizeof($detail['list_pertanyaan']);
        for ($i=0; $i < $s; $i++) { 
            $data_details[] = array(
                'form_id' => $key, 
                'id_pertanyaan' => $detail['list_pertanyaan'][$i],
                'last_save' => date('Y-m-d h:i:s A'),
                'userid' => $this->session->userdata('userid')
            );
        }
        $this->db->insert_batch('form_detail', $data_details);
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check"></i> EDOM Form <b>'.$data['nama'].'</b> sudah berhasil di perbaharui!!!</div>');
		redirect('admin/master/edom_form');
    }

    function get_form_header($id){
        $this->db->where('seq_id', $id);
        return $this->db->get('form');
    }

    function get_form_details($id){
        $this->db->where('form_id', $id);
        return $this->db->get('form_detail');
    }
   
    function getSks($id)
    {
        $this->db->where('kd_matkul', $id);
        return $this->db->get('matakuliah');
    }

    function dataevaluasidosen_prodi($thn_akademik, $dosen, $matkul, $prodi)
    {
        $sql= "SELECT 'No 1' AS keterangan, AVG(jawaban1) AS poin FROM evaluasi WHERE semester='$thn_akademik' AND dosen='$dosen' AND matkul='$matkul' AND prodi='$prodi' UNION
        SELECT 'No 2' AS keterangan, AVG(jawaban2) AS poin FROM evaluasi WHERE semester='$thn_akademik' AND dosen='$dosen' AND matkul='$matkul' AND prodi='$prodi' UNION
        SELECT 'No 3' AS keterangan, AVG(jawaban3) AS poin FROM evaluasi WHERE semester='$thn_akademik' AND dosen='$dosen' AND matkul='$matkul' AND prodi='$prodi' UNION
        SELECT 'No 4' AS keterangan, AVG(jawaban4) AS poin FROM evaluasi WHERE semester='$thn_akademik' AND dosen='$dosen' AND matkul='$matkul' AND prodi='$prodi' UNION
        SELECT 'No 5' AS keterangan, AVG(jawaban5) AS poin FROM evaluasi WHERE semester='$thn_akademik' AND dosen='$dosen' AND matkul='$matkul' AND prodi='$prodi' UNION
        SELECT 'No 6' AS keterangan, AVG(jawaban6) AS poin FROM evaluasi WHERE semester='$thn_akademik' AND dosen='$dosen' AND matkul='$matkul' AND prodi='$prodi' UNION
        SELECT 'No 7' AS keterangan, AVG(jawaban7) AS poin FROM evaluasi WHERE semester='$thn_akademik' AND dosen='$dosen' AND matkul='$matkul' AND prodi='$prodi' UNION
        SELECT 'No 8' AS keterangan, AVG(jawaban8) AS poin FROM evaluasi WHERE semester='$thn_akademik' AND dosen='$dosen' AND matkul='$matkul' AND prodi='$prodi' UNION
        SELECT 'No 9' AS keterangan, AVG(jawaban9) AS poin FROM evaluasi WHERE semester='$thn_akademik' AND dosen='$dosen' AND matkul='$matkul' AND prodi='$prodi' UNION
        SELECT 'No 10' AS keterangan, AVG(jawaban10) AS poin FROM evaluasi WHERE semester='$thn_akademik' AND dosen='$dosen' AND matkul='$matkul' AND prodi='$prodi'";
        return $this->db->query($sql);
    }    
    
    
    function data_report_edom($semester, $prodi)
    {
        $sql = "SELECT AVG(eva.jawaban1) as jawaban1, AVG(eva.jawaban2) as jawaban2, AVG(eva.jawaban3) as jawaban3, AVG(eva.jawaban4) as jawaban4, AVG(eva.jawaban5) as jawaban5, AVG(eva.jawaban6) as jawaban6, AVG(eva.jawaban7) as jawaban7, AVG(eva.jawaban8) as jawaban8, AVG(eva.jawaban9) as jawaban9, AVG(eva.jawaban10) as jawaban10, dos.nama,mk.nama_matkul,(AVG(eva.jawaban1)+AVG(eva.jawaban2)+AVG(eva.jawaban3)+AVG(eva.jawaban4)+AVG(eva.jawaban5)+AVG(eva.jawaban6)+AVG(eva.jawaban7)+AVG(eva.jawaban8)+AVG(eva.jawaban9)+AVG(eva.jawaban10))/10 AS total FROM `evaluasi` eva INNER JOIN dosen dos ON eva.dosen=dos.kd_dosen INNER JOIN prodi pro ON pro.kd_prodi=eva.prodi INNER JOIN matakuliah mk ON mk.kd_matkul=eva.matkul AND mk.prodi='$prodi' WHERE eva.semester='$semester' AND pro.kd_prodi='$prodi' GROUP BY dos.nama, mk.kd_matkul";
        
        return $this->db->query($sql);
    }

    function data_report_edom_saran($semester, $prodi)
    {
        $sql = "SELECT CASE WHEN (group_row_number = 1) THEN dosen ELSE ''
                END AS dosen,
                CASE
                    WHEN (group_row_number = 1)
                    THEN dos.nama_lengkap
                    ELSE ''
                END AS nama_lengkap,
                Saran,
                overall_row_num,
                group_row_number
                FROM
                (SELECT
                    dosen,
                    Saran,
                    @num := IF(@dosen = `dosen`, @num + 1, 1) AS group_row_number,
                    @dosen := `dosen` AS dummy, overall_row_num
                FROM
                    (SELECT
                    dosen,
                    Saran,
                    @rn := @rn + 1 overall_row_num
                    FROM
                    evaluasi,
                    (SELECT
                        @rn := 0) r
                    WHERE Saran <> '' AND semester = '$semester'
                    AND prodi = '$prodi' ) X
                ORDER BY dosen,
                    overall_row_num) X
                INNER JOIN dosen dos
                    ON X.dosen = dos.kd_dosen
                ORDER BY overall_row_num";
        
        return $this->db->query($sql);
    }

    function ambil_nama_prodi($prodi)
    {
        $this->db->where('kd_prodi', $prodi);
        return $this->db->get('prodi');
    }
    // End Model EDOM

	
	function ambil_daftar_bank()
	{
		$this->db->order_by('nama_bank', 'ASC');
		$query = $this->db->get('daftar_bank');
        return $query->result();
	}
	
	// CEK LOGIN
	function validate($userid,$password)
	{			
		$sql = "SELECT user_info.*,dosen.* FROM user_info INNER JOIN dosen on user_info.kd_dosen=dosen.kd_dosen WHERE user_info.userid='$userid' AND user_info.pwd='$password' ";
		$result = $this->db->query($sql);
		return $result;
	}

	// MODEL KARYAWAN //

	function list_karyawan()
	{
		$role 		= $this->session->userdata('role');
		$no_induk 	= $this->session->userdata('userid');

		if ($role == "ADMIN") {
			$sql = "SELECT karyawan.seq_id, karyawan.no_induk, karyawan.nama, karyawan.nama_lengkap, karyawan.role, karyawan.no_rekening,karyawan.bank, daftar_bank.nama_bank, daftar_bank.kode_bank FROM karyawan INNER JOIN daftar_bank ON daftar_bank.seq_id=karyawan.bank";
		} else {
			$sql = "SELECT karyawan.seq_id, karyawan.no_induk, karyawan.nama, karyawan.nama_lengkap, karyawan.role, karyawan.no_rekening,karyawan.bank, daftar_bank.nama_bank, daftar_bank.kode_bank FROM karyawan INNER JOIN daftar_bank ON daftar_bank.seq_id=karyawan.bank WHERE karyawan.no_induk='$no_induk'";
		}
		
        $result = $this->db->query($sql);
		return $result->result();
    }
	
	function detail_karyawan($id)
	{		
		$sql = "SELECT karyawan.seq_id, karyawan.no_induk, karyawan.nama, karyawan.nama_lengkap, karyawan.role, karyawan.no_rekening,karyawan.bank, daftar_bank.nama_bank, daftar_bank.kode_bank FROM karyawan INNER JOIN daftar_bank ON daftar_bank.seq_id=karyawan.bank WHERE karyawan.no_induk='$id'";
        $result = $this->db->query($sql);
		return $result->result();
    }
 
    function save_karyawan()
    {
        $data = array(
                'no_induk'  => $this->input->post('no_induk'), 
                'nama'  => $this->input->post('nama'), 
                'nama_lengkap' => $this->input->post('nama_lengkap'), 
                'role' => $this->input->post('role'), 
                'bank' => $this->input->post('bank'), 
                'no_rekening' => $this->input->post('no_rekening'), 
                'user_update' => $this->session->userdata('userid')           
            );
        $result=$this->db->insert('karyawan',$data);


        $data_login = array('userid' => $this->input->post('no_induk'),
        					'pwd' => md5($this->input->post('no_induk')),
        					'no_induk' => $this->input->post('no_induk'),
        					'user_update' => $this->session->userdata('userid')
        				);
        $this->db->insert('user_info',$data_login);
        return $result;
    }
 
    function update_karyawan()
    {
        $seq_id = $this->input->post('seq_id');
       	
       	$data = array(
                'no_induk'  => $this->input->post('no_induk'), 
                'nama'  => $this->input->post('nama'), 
                'nama_lengkap' => $this->input->post('nama_lengkap'), 
                'role' => $this->input->post('role'), 
                'bank' => $this->input->post('bank'), 
                'no_rekening' => $this->input->post('no_rekening'), 
                'user_update' => $this->session->userdata('userid')
            );
 
        $this->db->where('seq_id', $seq_id);
		$result = $this->db->update('karyawan', $data);
        return $result;
    }
 
    function delete_karyawan()
    {
        $seq_id = $this->input->post('seq_id');
        $this->db->where('seq_id', $seq_id);
        $result = $this->db->delete('karyawan');
        return $result;
    }


    public function update_password($key, $value)
	{
		$this->db->where('userid', $key);
		$this->db->update('user_info', $value);
	}

    // END MODEL KARYAWAN //
	
	
	// MODEL GAJI //
	
	function simpan_gaji()
    {		
		$find = array("Rp ",",");
        $data = array(
                'no_induk'  	=> $this->input->post('no_induk'), 
                'periode'  		=> $this->input->post('periode'), 
				'p_gapok' 		=> str_ireplace($find,'',$this->input->post('p_gapok')), 
                'p_struktural' 	=> str_ireplace($find,'',$this->input->post('p_struktural')), 
                'p_fungsional' 	=> str_ireplace($find,'',$this->input->post('p_fungsional')), 
                'p_uang_makan' 	=> str_ireplace($find,'',$this->input->post('p_uang_makan')), 
                'p_transport' 	=> str_ireplace($find,'',$this->input->post('p_transport')), 
				'p_kelangkaan' 	=> str_ireplace($find,'',$this->input->post('p_kelangkaan')), 
				'p_peralihan' 	=> str_ireplace($find,'',$this->input->post('p_peralihan')), 
				'p_lain_lain' 	=> str_ireplace($find,'',$this->input->post('p_lain_lain')), 
				't_gapok' 		=> str_ireplace($find,'',$this->input->post('t_gapok')), 
				't_struktural' 	=> str_ireplace($find,'',$this->input->post('t_struktural')), 
				't_fungsional' 	=> str_ireplace($find,'',$this->input->post('t_fungsional')), 
				't_uang_makan' 	=> str_ireplace($find,'',$this->input->post('t_uang_makan')), 
				't_transport' 	=> str_ireplace($find,'',$this->input->post('t_transport')), 
				't_kelangkaan' 	=> str_ireplace($find,'',$this->input->post('t_kelangkaan')), 
				't_lain_lain' 	=> str_ireplace($find,'',$this->input->post('t_lain_lain')), 
				'pot_bank' 		=> str_ireplace($find,'',$this->input->post('pot_bank')), 
				'pot_koperasi' 	=> str_ireplace($find,'',$this->input->post('pot_koperasi')), 
				'pot_astek' 	=> str_ireplace($find,'',$this->input->post('pot_astek')), 
				'pot_pajak' 	=> str_ireplace($find,'',$this->input->post('pot_pajak')), 
				'pot_transport' => str_ireplace($find,'',$this->input->post('pot_transport')), 
				'pot_lain_lain' => str_ireplace($find,'',$this->input->post('pot_lain_lain')), 
                'user_update' 	=> $this->session->userdata('userid')           
            );
        $result=$this->db->insert('gaji',$data);
        return $result;
    }
	
	// Cetak Slip Gaji
	function ambil_data_gaji($no_induk, $periode)
	{
		$sql = "SELECT gaji.*, karyawan.nama_lengkap, karyawan.bank, karyawan.no_rekening, daftar_bank.nama_bank FROM `gaji` INNER JOIN karyawan ON gaji.no_induk=karyawan.no_induk INNER JOIN daftar_bank ON daftar_bank.seq_id=karyawan.bank WHERE karyawan.no_induk='$no_induk' AND gaji.periode='$periode'";

		$result = $this->db->query($sql);
		return $result;
	}

	// Data Laporan Gaji
	function ambil_data_laporan($periode, $role)
	{
		$sql = "SELECT gaji.*, karyawan.nama_lengkap, karyawan.bank, karyawan.no_rekening, daftar_bank.nama_bank FROM `gaji` INNER JOIN karyawan ON gaji.no_induk=karyawan.no_induk INNER JOIN daftar_bank ON daftar_bank.seq_id=karyawan.bank WHERE karyawan.role='$role' AND gaji.periode='$periode'";

		$result = $this->db->query($sql);
		return $result;
	}

	// END MODEL GAJI //
}