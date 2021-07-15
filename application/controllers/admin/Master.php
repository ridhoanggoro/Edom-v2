<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Master extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_penting');
    }
    
    public function dosen()
    {
        $isi['title']   = 'Daftar Dosen';
        $isi['content'] = 'admin/dosen';
        $this->load->view('overview', $isi);
    }
    
    function list_dosen()
    {
        $data = $this->model_penting->list_dosen();
        echo json_encode($data);
    }
    
    function save_dosen()
    {
        $data = $this->model_penting->save_dosen();
        echo json_encode($data);
    }
    
    function update_dosen()
    {
        $data = $this->model_penting->update_dosen();
        echo json_encode($data);
    }
    
    function delete_dosen()
    {
        $data = $this->model_penting->delete_dosen();
        echo json_encode($data);
    }
    public function matakuliah()
    {
        $isi['title']        = 'Daftar Matakuliah';
        $isi['content']      = 'admin/matakuliah';
        $isi['daftar_prodi'] = $this->model_penting->getListProdi('ALL');
        $this->load->view('overview', $isi);
    }
    
    function list_matakuliah()
    {
        $data = $this->model_penting->list_matakuliah();
        echo json_encode($data);
    }
    
    function save_matakuliah()
    {
        $data = $this->model_penting->save_matakuliah();
        echo json_encode($data);
    }
    
    function update_matakuliah()
    {
        $data = $this->model_penting->update_matakuliah();
        echo json_encode($data);
    }
    
    function delete_matakuliah()
    {
        $data = $this->model_penting->delete_matakuliah();
        echo json_encode($data);
    }
    function save_edom()
    {
        $p = json_decode(file_get_contents('php://input'));
        $q = $this->model_penting->save_edom($p);
        echo json_encode($q);
    }
    
    function get_matkul_prodi()
    {
        $data = $this->model_penting->list_matakuliah('FILTERED');
        echo json_encode($data);
    }
    
    public function pertanyaan()
    {
        $isi['title']   = 'Daftar Pertanyaan';
        $isi['content'] = 'admin/pertanyaan';
        // $isi['daftar_prodi']  = $this->model_penting->getListProdi('ALL'); 
        $this->load->view('overview', $isi);
    }
    
    public function get_list_pertanyaan()
    {
        $start  = $this->input->post('start');
        $length = $this->input->post('length');
        $draw   = $this->input->post('draw');
        $search = $this->input->post('search');
        
        $data = $this->model_penting->list_pertanyaan($start, $length, $draw, $search);
        echo json_encode($data);
    }
    
    function pertanyaan_detail()
    {
        $uri3 = $this->uri->segment(4);
        $a    = $this->db->query("SELECT * FROM pertanyaan WHERE seq_id = '$uri3'")->row();
        echo json_encode($a);
    }
    
    function pertanyaan_update()
    {
        $p = json_decode(file_get_contents('php://input'));
        $q = $this->model_penting->pertanyaan_update($p);
        echo json_encode($q);
    }
    
    function pertanyaan_add()
    {
        $p = json_decode(file_get_contents('php://input'));
        $q = $this->model_penting->pertanyaan_add($p);
        echo json_encode($q);
    }
    
    function pertanyaan_delete()
    {
        $data = $this->model_penting->pertanyaan_delete();
        echo json_encode($data);
    }
    
    function edom_form()
    {
        $isi['title']   = 'Daftar Form Pertanyaan Edom';
        $isi['content'] = 'admin/edom_form';
        $this->load->view('overview', $isi);
    }
    
    public function get_list_edom_form()
    {
        $start  = $this->input->post('start');
        $length = $this->input->post('length');
        $draw   = $this->input->post('draw');
        $search = $this->input->post('search');
        
        $data = $this->model_penting->list_edom_form($start, $length, $draw, $search);
        echo json_encode($data);
    }
    
    function add_edom_form()
    {
        $isi['title']             = 'Daftar Form Pertanyaan Edom';
        $isi['content']           = 'admin/add_edom_form';
        $isi['daftar_pertanyaan'] = $this->model_penting->getListPertanyaan('ALL');
        $this->load->view('overview', $isi);
    }
    
    function view_edom_form()
    {
        $id                       = $this->uri->segment(4);
        $isi['title']             = 'Daftar Form Pertanyaan Edom';
        $isi['content']           = 'admin/view_edom_form';
        $isi['daftar_pertanyaan'] = $this->model_penting->getListPertanyaan('ALL');
        $isi['form_header']       = $this->model_penting->get_form_header($id)->row_array();
        $isi['form_detail']       = $this->model_penting->get_form_details($id);
        $this->load->view('overview', $isi);
    }
    
    function save_edom_from()
    {
        $status  = ($this->input->post('status_aktif') == "on") ? 1 : 0;
        $datanya = array(
            'seq_id' => $this->input->post('id_form'),
            'nama' => $this->input->post('nama_form'),
            'status' => $status,
            'last_update' => date('Y-m-d h:i:s A'),
            'userid' => $this->session->userdata('userid')
        );
        
        $detailnya = array(
            'list_pertanyaan' => $this->input->post('listpertanyaan')
        );
        $gas       = $this->model_penting->save_edom_from($datanya, $detailnya);
    }
    
    function update_edom_from()
    {
        $status  = ($this->input->post('status_aktif') == "on") ? 1 : 0;
        $key     = $this->input->post('id_form');
        $datanya = array(
            'nama' => $this->input->post('nama_form'),
            'status' => $status,
            'last_update' => date('Y-m-d h:i:s A'),
            'userid' => $this->session->userdata('userid')
        );
        
        $detailnya = array(
            'list_pertanyaan' => $this->input->post('listpertanyaan')
        );
        $gas       = $this->model_penting->update_edom_from($key, $datanya, $detailnya);
    }
    
    public function pengisian_edom()
    {
        $isi['title']           = 'Input EDOM';
        $isi['content']         = 'admin/input_edom';
        $isi['daftar_matkul']   = $this->model_penting->getListMatkul('ALL');
        $isi['daftar_prodi']    = $this->model_penting->getListProdi('ALL');
        $isi['daftar_dosen']    = $this->model_penting->getListDosen('ALL');
        $isi['list_pertanyaan'] = $this->model_penting->getListPertanyaan();
        $isi['id_form']         = $this->model_penting->getAktifEdomForm();
        $this->load->view('overview', $isi);
    }
    
    function get_sks()
    {
        $value = $this->input->post('value');
        $data  = $this->model_penting->getSks($value);
        if ($data->num_rows() > 0) {
            $row = $data->row_array();
            echo $row['sks'];
        }
    }
    
    public function slip_gaji()
    {
        $isi['title']           = 'Cetak Slip Gaji';
        $isi['content']         = 'cetak_slip';
        $isi['daftar_karyawan'] = $this->model_penting->list_karyawan();
        $this->load->view('overview', $isi);
    }
    
    public function laporan()
    {
        $isi['title']        = 'GRAFIK EDOM';
        $isi['content']      = 'admin/laporan';
        $isi['thn_akademik'] = $this->model_penting->ThnAkademikKuisioner();
        $isi['list_prodi']   = $this->model_penting->ProdiKuisioner();
        
        $this->load->view('overview', $isi);
    }
    
    public function report_edom()
    {
        $isi['title']        = 'Report EDOM';
        $isi['content']      = 'admin/report_edom';
        $isi['thn_akademik'] = $this->model_penting->ThnAkademikKuisioner();
        $isi['list_prodi']   = $this->model_penting->ProdiKuisioner();
        
        $this->load->view('overview', $isi);
    }
    
    public function cetak_report_edom()
    {
        $periode          = $this->input->post('thn_akademik');
        $prodi            = $this->input->post('prodi');
        $semester         = $this->input->post('thn_akademik');
        $jenis            = $this->input->post('jenis');
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
        
        if ($jenis == 1) {
            $data['hasil'] = $this->model_penting->data_report_edom($periode, $prodi);
            $template      = 'dokumen/edom';
            $nama_file     = 'REPORT_EDOM_PENILAIAN';
        } else {
            $data['hasil'] = $this->model_penting->data_report_edom_saran($periode, $prodi);
            $template      = 'dokumen/edom_saran';
            $nama_file     = 'REPORT_EDOM_SARAN';
        }
        
        $this->load->view($template, $data);
        $html = $this->load->view($template, $data, true);
        $pdf->WriteHTML($html);
        $output = $nama_file . '_' . date("Y-m-d H:i:s") . '.pdf';
        $pdf->Output("$output", 'D');
        exit();
    }
    
    public function report_borang()
    {
        $isi['title']        = 'Report Borang';
        $isi['content']      = 'admin/report_borang';
        $isi['thn_akademik'] = $this->model_penting->ThnAkademikKuisioner();
        $isi['list_prodi']   = $this->model_penting->ProdiKuisioner();
        
        $this->load->view('overview', $isi);
    }

    function cetak_report_edom_borang()
    {
        $periode          = $this->input->post('thn_akademik');
        $prodi            = $this->input->post('prodi');
        $data['semester'] = $periode;
        
        $this->load->library('pdf');
        $pdf                   = $this->pdf->load();
        $pdf                   = new mPDF('win-1252', 'A4', '', '', 10, 10, 15, 1, 30, 30);
        $pdf->useOnlyCoreFonts = false;
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
        
        $data['hasil'] = $this->model_penting->data_report_borang($periode, $prodi);
        $template      = 'dokumen/edom_borang';
        $nama_file     = 'REPORT_EDOM_BORANG_PENILAIAN';

        $this->load->view($template, $data);
        $html = $this->load->view($template, $data, true);
        $pdf->WriteHTML($html);
        $output = $nama_file . '_' . date("Y-m-d H:i:s") . '.pdf';
        $pdf->Output("$output", 'D');
        exit();
    }
    
    function get_list_dosen_by_smt($id = '')
    {
        $result = $this->model_penting->getListDosen($id);
        $this->load->helper('form');
        echo form_dropdown('nidn', $result, NULL, 'id="nidn" class="custom-select mr-sm-2" onchange="load_dropdown_content2($(\'#matkul\'), this.value)"');
    }
    
    function get_list_matkul_by_dosen($id = '')
    {
        $result = $this->model_penting->getListMatkul($id);
        $this->load->helper('form');
        echo form_dropdown('matkul', $result, NULL, 'id="matkul" class="custom-select mr-sm-2"');
    }
    
    
    public function getData_grafikEvaluasiDosen()
    {
        $periode = $this->input->post('thn_akademik');
        $dosen   = $this->input->post('nidn');
        $matkul  = $this->input->post('matkul');
        $prodi   = $this->input->post('prodi');
        
        foreach ($this->model_penting->dataevaluasidosen_prodi($periode, $dosen, $matkul, $prodi)->result_array() as $row) {
            
            $data['desc'][] = $row['keterangan'];
            $data['poin'][] = (float) $row['poin'];
        }
        
        echo json_encode($data);
        
    }
    
    // END CONTROl EDOM
    
    public function cetak_laporan()
    {
        $periode = $this->input->post('periode');
        $role    = $this->input->post('role');
        
        $daftar_gaji = $this->model_penting->ambil_data_laporan($periode, $role);
        $this->load->library('PHPExcel');
        $objPHPExcel = new PHPExcel();
        // Set properties
        $objPHPExcel->getProperties()->setCreator("Pulahta, FTUP") //creator
            ->setTitle("Mahasiswa"); //file title
        $objset     = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
        $objget     = $objPHPExcel->getActiveSheet(); //inisiasi get object     
        //table header
        $cols       = array(
            "A",
            "B",
            "C",
            "D",
            "E",
            "F",
            "G"
        );
        $heading    = array(
            'No',
            'No Induk',
            'Nama',
            'Penghasilan Kotor',
            'Total Tambahan Rapel',
            'Total Potongan',
            'Penghasilan Bersih'
        );
        $rowNumberH = 1;
        $colH       = 'A';
        
        foreach ($heading as $h) {
            $objPHPExcel->getActiveSheet()->setCellValue($colH . $rowNumberH, $h);
            $colH++;
        }
        
        $totn   = $daftar_gaji->num_rows();
        $maxrow = $totn + 1;
        $row    = 2;
        $no     = 1;
        
        foreach ($daftar_gaji->result() as $val) {
            $gaji_kotor    = array(
                $val->p_gapok,
                $val->p_struktural,
                $val->p_fungsional,
                $val->p_uang_makan,
                $val->p_transport,
                $val->p_kelangkaan,
                $val->p_peralihan,
                $val->p_lain_lain
            );
            $gaji_tambahan = array(
                $val->t_gapok,
                $val->t_struktural,
                $val->t_fungsional,
                $val->t_uang_makan,
                $val->t_transport,
                $val->t_kelangkaan,
                $val->t_lain_lain
            );
            $potongan      = array(
                $val->pot_bank,
                $val->pot_koperasi,
                $val->pot_astek,
                $val->pot_pajak,
                $val->pot_transport,
                $val->pot_lain_lain
            );
            $a             = array_sum($gaji_kotor);
            $b             = array_sum($gaji_tambahan);
            $c             = array_sum($potongan);
            $gaji_bersih   = ($a + $b) - $c;
            
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $no);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $val->no_induk);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $val->nama_lengkap);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $a);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $b);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $c);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $gaji_bersih);
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
        $objPHPExcel->getActiveSheet()->getStyle('A1:G' . $maxrow)->applyFromArray($styleArray);
        $objPHPExcel->getActiveSheet()->getStyle('D' . $row . ':G' . $maxrow)->getNumberFormat()->setFormatCode('#,##0');
        
        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $periode . '.xlsx"');
        header('Cache-Control: max-age=0');
        
        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 2020 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0
        
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }
}
