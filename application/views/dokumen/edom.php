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
    vertical-align:middle;
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
<table class="items" width="100%" style="border-collapse: collapse; " cellpadding="1">
    <tr bgcolor="#FFFFFF">
        <td colspan="8" align="right" style="border:none;vertical-align:middle;font-size: 8pt"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
        <td colspan="2" rowspan="3" align="center" ><img src="<?php echo base_url(); ?>assets/images/logo_up_small.PNG" width="100" alt="" />
            <br />
            <br />
        </td>
        <td height="23" colspan="5" align="center" style="vertical-align:middle;font-size: 12pt"><strong>FAKULTAS TEKNIK UNIVERSITAS PANCASILA</strong>
            <br />
        </td>
        <td rowspan="3" align="center" ><img src="<?php echo base_url(); ?>assets/images/up_kebanggaan.PNG" width="100" alt="" /></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="22" colspan="5" align="center" style="vertical-align:middle;font-size: 12pt"><strong>SATUAN JAMINAN MUTU</strong></td>
    </tr>
    <tr bgcolor="#FFFFFF">
        <td height="49" colspan="5" align="center" style="vertical-align:middle;font-size: 14pt"><strong>HASIL PENGUKURAN EVALUASI KINERJA DOSEN (EKD) PRODI <?php echo strtoupper($nama_prodi); ?><p><span style="font-size: 11pt;"><strong><strong>SEMESTER <?php echo strtoupper($semester); ?></strong><strong></span></p></td>
    </tr>
   
    
    
</table>
<hr>
<table class="items" width="100%" style="border-collapse: collapse;" cellpadding="1">
  <tbody>
    <tr>
      <td width="5%" rowspan="3" align="center" >No</td>
      <td width="20%" rowspan="3" align="center" >Nama Dosen</td>
      <td width="20%" rowspan="3" align="center" >Mata Kuliah yang diampu</td>
      <td width="60%" colspan="15" align="center" >Kinerja Dosen Berdasarkan Kompetensi EDOM</td>
      <td width="5%" rowspan="3" align="center" >Nilai Akhir EKD Total</td>
    </tr>
    <tr>
      <td colspan="15" align="center" >Pertanyaan</td>
    </tr>
    <tr>
      <td align="center">1</td>
      <td align="center">2</td>
      <td align="center">3</td>
      <td align="center">4</td>
      <td align="center">5</td>
      <td align="center">6</td>
      <td align="center">7</td>
      <td align="center">8</td>
      <td align="center">9</td>
      <td align="center">10</td>
      <td align="center">11</td>
      <td align="center">12</td>
      <td align="center">13</td>
      <td align="center">14</td>
      <td align="center">15</td>
    </tr>
    <?php $no = 1; foreach ($hasil->result() as $row) { $total = $row->jawaban1 + $row->jawaban2 + $row->jawaban3 + $row->jawaban4 + $row->jawaban5 + $row->jawaban6 + $row->jawaban7 + $row->jawaban8 + $row->jawaban9 + $row->jawaban10 + $row->jawaban11 + $row->jawaban12 + $row->jawaban13 + $row->jawaban14 + $row->jawaban15; ?>
    <tr>
      <td align="center" ><?php echo $no++; ?></td>
      <td><?php echo $row->nama; ?></td>
      <td><?php echo $row->nama_matkul; ?></td>
      <td align="center" ><?php echo number_format($row->jawaban1,2,'.',','); ?></td>
      <td align="center" ><?php echo number_format($row->jawaban2,2,'.',','); ?></td>
      <td align="center" ><?php echo number_format($row->jawaban3,2,'.',','); ?></td>
      <td align="center"><?php echo number_format($row->jawaban4,2,'.',','); ?></td>
      <td align="center"><?php echo number_format($row->jawaban5,2,'.',','); ?></td>
      <td align="center"><?php echo number_format($row->jawaban6,2,'.',','); ?></td>
      <td align="center"><?php echo number_format($row->jawaban7,2,'.',','); ?></td>
      <td align="center"><?php echo number_format($row->jawaban8,2,'.',','); ?></td>
      <td align="center"><?php echo number_format($row->jawaban9,2,'.',','); ?></td>
      <td align="center"><?php echo number_format($row->jawaban10,2,'.',','); ?></td>
      <td align="center"><?php echo number_format($row->jawaban11,2,'.',','); ?></td>
      <td align="center"><?php echo number_format($row->jawaban12,2,'.',','); ?></td>
      <td align="center"><?php echo number_format($row->jawaban13,2,'.',','); ?></td>
      <td align="center"><?php echo number_format($row->jawaban14,2,'.',','); ?></td>
      <td align="center"><?php echo number_format($row->jawaban15,2,'.',','); ?></td>
      <td align="center"><?php echo number_format($total/15,2,'.',','); ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<p>&nbsp;</p>

<table class="items" width="15%" style="border-collapse: collapse; vertical-align:middle;font-size: 0.5em" cellpadding="1">
  <tbody>
    <tr>
      <td>&nbsp;Range</td>
      <td>&nbsp;Keterangan</td>
    </tr>
    <tr>
      <td>&nbsp;<= 1.50</td>
      <td>&nbsp;Kurang Baik</td>
    </tr>
    <tr>
      <td>&nbsp;1.51 - 2.00</td>
      <td>&nbsp;Cukup Baik</td>
    </tr>
    <tr>
      <td>&nbsp;2.01 - 3.49</td>
      <td>&nbsp;Baik</td>
    </tr>
    <tr>
      <td>&nbsp;3.50 - 4.00</td>
      <td>&nbsp;Sangat Baik</td>
    </tr>
  </tbody>
</table>
</body>

</html>