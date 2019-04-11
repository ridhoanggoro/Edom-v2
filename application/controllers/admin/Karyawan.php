<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	function __construct(){
        parent::__construct();
        $this->load->model('model_penting');
    }
	
	public function tambah_karyawan()
	{
		$isi['title'] 	='Form Input Karyawan';
		$isi['content']	= 'admin/tambah_karyawan';
		$this->load->view('overview', $isi);
	}
	
	public function tampil_karyawan()
	{		
		$isi['title'] 		= 'Daftar Karyawan';
		$isi['content']		= 'admin/tampil_karyawan';
		$isi['daftar_bank'] =  $this->model_penting->ambil_daftar_bank();
		$this->load->view('overview', $isi);
	}
	public function tambah_matakuliah()
	{
		$isi['title'] 	='Form Input Matakuliah';
		$isi['content']	= 'admin/tambah_matakuliah';
		$this->load->view('overview', $isi);
	}
	

	public function tampil_matakuliah()
	{		
		$isi['title'] 		= 'Daftar Matakuliah';
		$isi['content']		= 'admin/tampil_matakuliah';
				$this->load->view('overview', $isi);
	}
	
	public function ganti_password()
	{
		$isi['title'] 	= 'Rubah Password';
		$isi['content']	= 'admin/ganti_password';
		$this->load->view('overview', $isi);
	}

	public function proses_password()
	{
		$key = $this->session->userdata('no_induk');
		$data = array('pwd' => md5($this->input->post('p1',TRUE)));
		$this->model_penting->update_password($key, $data);

		$this->session->set_flashdata('msg','<div class="alert alert-info">
												<button type="button" class="close" data-dismiss="alert">
													<i class="ace-icon fa fa-times"></i>
												</button>
												<span class="label label-success arrowed">Success</span>
												Password anda berhasil dirubah.
												<br />
											</div>');

	    redirect('admin/karyawan/ganti_password');
	}

	// SAVE~UPDATE~DELETE KARYAWAN //

	function list_karyawan(){
        $data=$this->model_penting->list_karyawan();
        echo json_encode($data);
    }
 
    function save(){
        $data=$this->model_penting->save_karyawan();
        echo json_encode($data);
    }
 
    function update(){
        $data=$this->model_penting->update_karyawan();
        echo json_encode($data);
    }
 
    function delete(){
        $data=$this->model_penting->delete_karyawan();
        echo json_encode($data);
    }

    // ---------------------------------- //
	
	// Get Karyawan by ID
	function detail_karyawan(){
		$id 	= $this->input->post('no_induk');
        $data	= $this->model_penting->detail_karyawan($id);
        echo json_encode($data);
    }
}
