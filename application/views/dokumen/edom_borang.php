<html>
<head>
<title></title>
<style>
body { font-family: 'helvetica';
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
    font-weight: bold;
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
        <td rowspan="3" align="right" style="vertical-align:middle"><img src="<?php echo base_url(); ?>assets/images/up_kebanggaan.PNG" width="100" alt="" /></td>
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
  <thead>
    <tr>
        <td width="5%" align="center" style="vertical-align:middle">No</td>
        <td width="35%" align="center" style="vertical-align:middle">Kategori</td>
        <td width="15%" align="center" style="vertical-align:middle">Sangat Baik<br>%</td>
        <td width="15%" align="center" style="vertical-align:middle">Baik<br>%</td>
        <td width="15%" align="center" style="vertical-align:middle">Cukup<br>%</td>
        <td width="15%" align="center" style="vertical-align:middle">Kurang<br>%</td>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; foreach ($hasil->result() as $row) { $total = $row->sangat_baik+$row->baik+$row->cukup+$row->kurang; 
        $sangat_baik = ($row->sangat_baik/$total)*100;
        $baik = ($row->baik/$total)*100;
        $cukup = ($row->cukup/$total)*100;
        $kurang = ($row->kurang/$total)*100;
    ?>
    <tr>
      <td align="center"><?php echo $no++; ?></td>
      <td>&nbsp;<?php echo $row->kategori; ?></td>
      <td align="center"><?php echo number_format($sangat_baik,2,'.',','); ?></td>
      <td align="center"><?php echo number_format($baik,2,'.',','); ?></td>
      <td align="center"><?php echo number_format($cukup,2,'.',','); ?></td>
      <td align="center"><?php echo number_format($kurang,2,'.',','); ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

</body>

</html>