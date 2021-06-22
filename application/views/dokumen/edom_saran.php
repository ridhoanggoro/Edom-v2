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
        <td height="49" colspan="5" align="center" style="vertical-align:middle;font-size: 14pt"><strong>HASIL SARAN PENGUKURAN EVALUASI KINERJA DOSEN (EKD) PRODI <?php echo strtoupper($nama_prodi); ?></strong><p><span style="font-size: 11pt;"><strong><strong>SEMESTER <?php echo strtoupper($semester); ?></strong><strong></span></p></td>
    </tr>
   
    
    
</table>
<hr>
<table class="items" width="100%" style="border-collapse: collapse;" cellpadding="1">
  <tbody>
    <tr>
      <td width="5%" align="center" style="vertical-align:middle">No</td>
      <td width="30%" align="center" style="vertical-align:middle">Nama Dosen</td>
      <td width="65%" align="center" style="vertical-align:middle">Saran / Kritik</td>
    </tr>
    <?php $no = 1; foreach ($hasil->result() as $row) { ?>
    <tr>
      <td align="center"><?php echo $no++; ?></td>
      <td>&nbsp;<?php echo $row->nama_lengkap; ?></td>
      <td align="center"><?php echo $row->Saran; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<p>&nbsp;</p>

</body>

</html>