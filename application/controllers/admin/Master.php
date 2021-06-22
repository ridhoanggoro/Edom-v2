<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

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
	
	public function dosen()
	{
		$isi['title'] 			= 'Daftar Dosen';
		$isi['content']			= 'admin/dosen';
		$this->load->view('overview', $isi);
	}
	
	function list_dosen(){
    $data=$this->model_penting->list_dosen();
    echo json_encode($data);
  }

  function save_dosen(){
		$data=$this->model_penting->save_dosen();
		echo json_encode($data);
  }
 
  function update_dosen(){
		$data=$this->model_penting->update_dosen();
		echo json_encode($data);
  }
 
  function delete_dosen(){
		$data=$this->model_penting->delete_dosen();
		echo json_encode($data);
  }
  public function matakuliah()
  {
    $isi['title']       = 'Daftar Matakuliah';
    $isi['content']     = 'admin/matakuliah';
    $isi['daftar_prodi']  = $this->model_penting->getListProdi('ALL'); 
    $this->load->view('overview', $isi);
  }
  
  function list_matakuliah(){
    $data=$this->model_penting->list_matakuliah();
    echo json_encode($data);
  }

  function save_matakuliah(){
    $data=$this->model_penting->save_matakuliah();
    echo json_encode($data);
  }
 
  function update_matakuliah(){
    $data=$this->model_penting->update_matakuliah();
    echo json_encode($data);
  }
 
  function delete_matakuliah(){
    $data=$this->model_penting->delete_matakuliah();
    echo json_encode($data);
  }
  function save_edom(){
		$data=$this->model_penting->save_edom();
		echo json_encode($data);
  }
  
  function get_matkul_prodi(){
    $data=$this->model_penting->list_matakuliah('FILTERED');
    echo json_encode($data);
  }


  public function pengisian_edom()
  {
    $isi['title']         = 'Input EDOM';
    $isi['content']       = 'admin/input_edom';
    $isi['daftar_matkul'] = $this->model_penting->getListMatkul('ALL');
    $isi['daftar_prodi']  = $this->model_penting->getListProdi('ALL'); 
    $isi['daftar_dosen']  = $this->model_penting->getListDosen('ALL'); 
    $this->load->view('overview', $isi);
  }

  function get_sks(){
    $value = $this->input->post('value');
    $data  = $this->model_penting->getSks($value);
    if ($data->num_rows() > 0)
		{
		   $row = $data->row_array(); 				  
		   echo $row['sks'];
		}		
	}
	
   public function slip_gaji()
	{
		$isi['title'] 			= 'Cetak Slip Gaji';
		$isi['content']			= 'cetak_slip';
		$isi['daftar_karyawan']	= $this->model_penting->list_karyawan();
		$this->load->view('overview', $isi);
  }
  
  public function laporan()
  {
    $isi['title']         = 'GRAFIK EDOM';
    $isi['content']       = 'admin/laporan';
    $isi['thn_akademik'] = $this->model_penting->ThnAkademikKuisioner();
    	$isi['list_prodi']= $this->model_penting->ProdiKuisioner();
    	
    $this->load->view('overview', $isi);
  }
  public function report_edom()
  {
    $isi['title']         = 'Report EDOM';
    $isi['content']       = 'admin/report_edom';
    $isi['thn_akademik'] = $this->model_penting->ThnAkademikKuisioner();
    	$isi['list_prodi']= $this->model_penting->ProdiKuisioner();
    	
    $this->load->view('overview', $isi);
  }

  public function cetak_report_edom()
{
    $periode = $this->input->post('thn_akademik');
    $prodi  = $this->input->post('prodi');
    $semester= $this->input->post('thn_akademik');
    $jenis= $this->input->post('jenis');
    $data['semester'] = $semester;

    $this->load->library('pdf');
    $pdf                   = $this->pdf->load();
    $pdf                   = new mPDF('win-1252', 'A4-L', '', '', 10, 10, 15, 1, 30, 30);
    $pdf->useOnlyCoreFonts = false; // false is default
    // $pdf->SetProtection(array(
    //     'print'
    // ));
    $pdf->SetTitle("EDOM");
    $pdf->SetAuthor("Universitas Pancasila");
    
    $pdf->SetDisplayMode('fullpage');
    
    ini_set('memory_limit', '256M');

    $daftar_prodi = $this->model_penting->ambil_nama_prodi($prodi);
    if ($daftar_prodi->num_rows() > 0) {
      foreach ($daftar_prodi->result() as $row) {
        $data['nama_prodi'] = $row->nama_prodi;
      }
    }

    if ($jenis==1) {
        $data['hasil'] = $this->model_penting->data_report_edom($periode, $prodi);
        $template = 'dokumen/edom';
        $nama_file = 'REPORT_EDOM_PENILAIAN';
    } else {
      $data['hasil'] = $this->model_penting->data_report_edom_saran($periode, $prodi);
      $template = 'dokumen/edom_saran';
      $nama_file = 'REPORT_EDOM_SARAN';
    }

    $this->load->view($template, $data);
	$html = $this->load->view($template, $data, true);
    $pdf->WriteHTML($html);
    $output = $nama_file.'_'.date("Y-m-d H:i:s").'.pdf';
    $pdf->Output("$output", 'D'); 
    exit();
 }
  
   function get_list_dosen_by_smt($id='')
    {            	
        $result = $this->model_penting->getListDosen($id);   
        $this->load->helper('form');
        echo form_dropdown('nidn', $result, NULL, 'id="nidn" class="custom-select mr-sm-2" onchange="load_dropdown_content2($(\'#matkul\'), this.value)"');
    }
	
	function get_list_matkul_by_dosen($id='')
  {            	
      $result = $this->model_penting->getListMatkul($id);   
      $this->load->helper('form');
      echo form_dropdown('matkul', $result, NULL, 'id="matkul" class="custom-select mr-sm-2"');
  }


  public function getData_grafikEvaluasiDosen()
  {
    $periode = $this->input->post('thn_akademik');
    $dosen = $this->input->post('nidn');
    $matkul = $this->input->post('matkul');
    $prodi = $this->input->post('prodi');

    foreach ($this->model_penting->dataevaluasidosen_prodi($periode, $dosen, $matkul, $prodi)->result_array() as $row) {   

      $data['desc'][]=$row['keterangan']; 
      $data['poin'][]=(float)$row['poin'];
    }

    echo json_encode($data);

  }
  
  // END CONTROl EDOM

  public function cetak_laporan()
  {
    $periode  = $this->input->post('periode');
    $role     = $this->input->post('role');  

    $daftar_gaji = $this->model_penting->ambil_data_laporan($periode, $role);
    $this->load->library('PHPExcel');
    $objPHPExcel = new PHPExcel();
    // Set properties
    $objPHPExcel->getProperties()
            ->setCreator("Pulahta, FTUP") //creator
            ->setTitle("Mahasiswa");      //file title
    $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
    $objget = $objPHPExcel->getActiveSheet();       //inisiasi get object     
    //table header
    $cols = array("A","B","C","D","E","F","G");
    $heading = array('No','No Induk','Nama','Penghasilan Kotor','Total Tambahan Rapel','Total Potongan', 'Penghasilan Bersih');          
    $rowNumberH = 1;
    $colH = 'A';

    foreach($heading as $h)
    {
      $objPHPExcel->getActiveSheet()->setCellValue($colH.$rowNumberH,$h);
      $colH++;    
    }

    $totn     = $daftar_gaji->num_rows();
    $maxrow   = $totn+1;
    $row      = 2;
    $no       = 1;

    foreach ($daftar_gaji->result() as $val) 
    {
      $gaji_kotor = array($val->p_gapok, $val->p_struktural, $val->p_fungsional, $val->p_uang_makan, $val->p_transport, $val->p_kelangkaan, $val->p_peralihan, $val->p_lain_lain);
      $gaji_tambahan = array($val->t_gapok, $val->t_struktural, $val->t_fungsional, $val->t_uang_makan, $val->t_transport, $val->t_kelangkaan, $val->t_lain_lain);
      $potongan = array($val->pot_bank, $val->pot_koperasi, $val->pot_astek, $val->pot_pajak, $val->pot_transport, $val->pot_lain_lain);
      $a = array_sum($gaji_kotor);
      $b = array_sum($gaji_tambahan);
      $c = array_sum($potongan);
      $gaji_bersih = ($a + $b) - $c;

      $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $no);
      $objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $val->no_induk);
      $objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $val->nama_lengkap);
      $objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $a);
      $objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $b);
      $objPHPExcel->getActiveSheet()->setCellValue('F'.$row, $c);
      $objPHPExcel->getActiveSheet()->setCellValue('G'.$row, $gaji_bersih);
      $row++;
      $no++;
    }

    //Freeze pane
    $objPHPExcel->getActiveSheet()->freezePane('A2');
    //Cell Style
    $styleArray = array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        )
    );  
    $objPHPExcel->getActiveSheet()->getStyle('A1:G'.$maxrow)->applyFromArray($styleArray);          
    $objPHPExcel->getActiveSheet()->getStyle('D'.$row.':G'.$maxrow)->getNumberFormat()->setFormatCode('#,##0');

    // Redirect output to a client’s web browser (Excel2007)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="'.$periode.'.xlsx"');
    header('Cache-Control: max-age=0');

    // If you're serving to IE over SSL, then the following may be needed
    header ('Expires: Mon, 26 Jul 2020 05:00:00 GMT'); // Date in the past
    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header ('Pragma: public'); // HTTP/1.0

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
  }
}
