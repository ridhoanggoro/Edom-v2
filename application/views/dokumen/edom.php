<html>
<head>
<title></title>
<style>
body { font-family: 'ctimes';
    font-size: 12pt;
}
p {    margin: 0pt;
}
td { vertical-align: top; }
.items td {
    border-top: 0.1mm solid #000000;
    border-left: 0.1mm solid #000000;
    border-right: 0.1mm solid #000000;
    border-bottom: 0.1mm solid #000000; 
}
table thead td { background-color: #EEEEEE;
    text-align: left;
    border: 0.1mm solid #000000;

}
</style>
</head>

<body>
<table class="items" width="100%" style="border-collapse: collapse;" cellpadding="1">
    <tr bgcolor="#FFFFFF">
        <td colspan="8" align="right" style="border:none;vertical-align:middle;font-size: 8pt"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
        <td colspan="2" rowspan="3" align="center" style="vertical-align:middle"><img src="<?php echo base_url(); ?>assets/images/logo_up_small.PNG" width="100" alt="" />
            <br />
            <br />
        </td>
        <td height="23" colspan="5" align="center" style="vertical-align:middle;font-size: 12pt"><strong>FAKULTAS TEKNIK UNIVERSITAS PANCASILA</strong>
            <br />
        </td>
        <td rowspan="3" align="center" style="vertical-align:middle"><img src="<?php echo base_url(); ?>assets/images/up_kebanggaan.PNG" width="100" alt="" /></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="22" colspan="5" align="center" style="vertical-align:middle;font-size: 12pt"><strong>SATUAN JAMINAN MUTU</strong></td>
    </tr>
    <tr bgcolor="#FFFFFF">
        <td height="49" colspan="5" align="center" style="vertical-align:middle;font-size: 14pt"><strong>HASIL PENGUKURAN EVALUASI KINERJA DOSEN (EKD) PRODI <?php echo strtoupper($nama_prodi); ?></strong><p><align="center" style="vertical-align:middle;font-size: 12pt"><strong>SEMESTER <?php echo strtoupper($semester); ?></strong></p></td>
    </tr>
   
    
    
</table>
<hr>
<table class="items" width="100%" style="border-collapse: collapse;" cellpadding="1">
  <tbody>
    <tr>
      <td rowspan="2" align="center" style="vertical-align:middle">No</td>
      <td rowspan="2" align="center" style="vertical-align:middle">Nama Dosen</td>
      <td rowspan="2" align="center" style="vertical-align:middle">Mata Kuliah yang diampu</td>
      <td colspan="10" align="center" style="vertical-align:middle">Kinerja Dosen Berdasarkan Kompetensi EDOM</td>
      <td rowspan="2" align="center" style="vertical-align:middle">Nilai Akhir EKD Total</td>
    </tr>
    <tr>
      <td align="center">Pertanyaan 1</td>
      <td align="center">Pertanyaan 2</td>
      <td align="center">Pertanyaan 3</td>
      <td align="center">Pertanyaan 4</td>
      <td align="center">Pertanyaan 5</td>
      <td align="center">Pertanyaan 6</td>
      <td align="center">Pertanyaan 7</td>
      <td align="center">Pertanyaan 8</td>
      <td align="center">Pertanyaan 9</td>
      <td align="center">Pertanyaan 10</td>
    </tr>
    <?php $no = 1; foreach ($hasil->result() as $row) { ?>
    <tr>
      <td align="center"><?php echo $no++; ?></td>
      <td><?php echo $row->nama; ?></td>
      <td><?php echo $row->nama_matkul; ?></td>
      <td align="center"><?php echo number_format($row->jawaban1,2,'.',','); ?></td>
      <td align="center"><?php echo number_format($row->jawaban2,2,'.',','); ?></td>
      <td align="center"><?php echo number_format($row->jawaban3,2,'.',','); ?></td>
      <td align="center"><?php echo number_format($row->jawaban4,2,'.',','); ?></td>
      <td align="center"><?php echo number_format($row->jawaban5,2,'.',','); ?></td>
      <td align="center"><?php echo number_format($row->jawaban6,2,'.',','); ?></td>
      <td align="center"><?php echo number_format($row->jawaban7,2,'.',','); ?></td>
      <td align="center"><?php echo number_format($row->jawaban8,2,'.',','); ?></td>
      <td align="center"><?php echo number_format($row->jawaban9,2,'.',','); ?></td>
      <td align="center"><?php echo number_format($row->jawaban10,2,'.',','); ?></td>
      <td align="center"><?php echo number_format($row->total,2,'.',','); ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<p>&nbsp;</p>

<table class="items" width="15%" style="border-collapse: collapse; vertical-align:middle;font-size: 8pt" cellpadding="1">
  <tbody>
    <tr>
      <td>Range</td>
      <td>Keterangan</td>
    </tr>
    <tr>
      <td><= 1.50</td>
      <td>Kurang Baik</td>
    </tr>
    <tr>
      <td>1.51 - 2.00</td>
      <td>Cukup Baik</td>
    </tr>
    <tr>
      <td>2.01 - 3.49</td>
      <td>Baik</td>
    </tr>
    <tr>
      <td>3.50 - 4.00</td>
      <td>Sangat Baik</td>
    </tr>
  </tbody>
</table>
</body>

</html>