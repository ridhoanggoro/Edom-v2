<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Penting');
	}
	 
	function index()
	{
		$this->load->view('login');
	}
	 
	function auth()
	{
		$userid    = $this->input->post('userid',TRUE);
		$password = md5($this->input->post('password',TRUE));
		$validate = $this->Model_Penting->validate($userid, $password);
		if($validate->num_rows() > 0){
			$data  			= $validate->row_array();
			$nama  			= $data['nama'];
			$userid 		= $data['userid'];
			$no_induk 		= $data['no_induk'];
			$nama_lengkap 	= $data['nama_lengkap'];
			$role 			= $data['role'];
			$sesdata = array(
				'nama'  	=> $nama,
				'nama_lengkap' => $nama_lengkap,
				'userid'    => $userid,
				'no_induk'  => $no_induk,
				'role'		=> $role,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($sesdata);			
			redirect('home');	 			
		}else{
			echo $this->session->set_flashdata('msg','USERID atau PASSWORD salah');
			redirect('login');
		}
	}
	 
	function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

}
