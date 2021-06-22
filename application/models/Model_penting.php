<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_penting extends CI_model {
	
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
	function save_edom()
    {              
        $data = array(
                'semester'       => $this->input->post('semester'), 
                'prodi'          => $this->input->post('prodi'), 
                'dosen'          => $this->input->post('dosen'),
                'matkul'         => $this->input->post('matkul'),
                'sks'            => $this->input->post('sks'),
                'jawaban1'       => $this->input->post('no_1'), 
                'jawaban2'       => $this->input->post('no_2'), 
                'jawaban3'       => $this->input->post('no_3'),
                'jawaban4'       => $this->input->post('no_4'), 
                'jawaban5'       => $this->input->post('no_5'),  
                'jawaban6'       => $this->input->post('no_6'), 
                'jawaban7'       => $this->input->post('no_7'),  
                'jawaban8'       => $this->input->post('no_8'), 
                'jawaban9'       => $this->input->post('no_9'), 
                'jawaban10'      => $this->input->post('no_10'),
                'saran'          => $this->input->post('saran'),
                'user_update'    => $this->session->userdata('userid')               
            );
        $result=$this->db->insert('evaluasi',$data);
        return $result;
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