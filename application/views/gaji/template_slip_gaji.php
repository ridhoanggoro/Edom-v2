<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cetak Slip Gaji</title>

<style>
body { font-family: 'ctimes';
    font-size: 8pt;
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
<table width="250" border="0">
  <tbody>
    <tr>
      <td colspan="3"><img src="<?php echo base_url('assets/images/UP.png')?>" width="252"></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" style="font-size: 10pt; vertical-align: middle; text-align: center;"><strong><u>TANDA TERIMA GAJI</u></strong></td>
    </tr>
    
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    
    <tr>
      <td>No. Induk</td>
      <td>:</td>
      <td><?php echo $no_induk;?></td>
    </tr>
    <tr>
      <td>Nama</td>
      <td>:</td>
      <td><?php echo $nama_lengkap;?></td>
    </tr>
    <tr>
      <td>Periode</td>
      <td>:</td>
      <td><?php echo $periode;?></td>
    </tr>
    <tr>
      <td>Bank</td>
      <td>:</td>
      <td><?php echo $nama_bank;?></td>
    </tr>
    <tr>
      <td>Rekening</td>
      <td>:</td>
      <td><?php echo $no_rekening;?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
</br>
<table width="250" border="0" style="border-collapse: collapse;">
  <tbody>
    <tr>
      <td colspan="3"><strong>PENGHASILAN:</strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Gaji Pokok</td>
      <td>:</td>
      <td align="right"><?php echo number_format($p_gapok,0,'.',','); ?></td>
    </tr>
    <tr>
      <td>Struktural</td>
      <td>:</td>
      <td align="right"><?php echo number_format($p_struktural,0,'.',','); ?></td>
    </tr>
    <tr>
      <td>Fungsional</td>
      <td>:</td>
      <td align="right"><?php echo number_format($p_fungsional,0,'.',','); ?></td>
    </tr>
    <tr>
      <td>U. Makan</td>
      <td>:</td>
      <td align="right"><?php echo number_format($p_uang_makan,0,'.',','); ?></td>
    </tr>
    <tr>
      <td>Transport</td>
      <td>:</td>
      <td align="right"><?php echo number_format($p_transport,0,'.',','); ?></td>
    </tr>
    <tr>
      <td>Kelangkaan</td>
      <td>:</td>
      <td align="right"><?php echo number_format($p_kelangkaan,0,'.',','); ?></td>
    </tr>
    <tr>
      <td>Peralihan</td>
      <td>:</td>
      <td align="right"><?php echo number_format($p_peralihan,0,'.',','); ?></td>
    </tr>
    <tr>
      <td>Lain-lain</td>
      <td>:</td>
      <td align="right"><?php echo number_format($p_lain_lain,0,'.',','); ?></td>
    </tr>
    <tr>
      <td><span style="font-size: 10pt;"><strong>Penghasilan Kotor</strong></span></td>
      <td>:</td>
      <td align="right"><span style="font-size: 10pt;"><b>
        <?php 
            $gaji_kotor = array($p_gapok, $p_struktural, $p_fungsional, $p_uang_makan, $p_transport, $p_kelangkaan, $p_peralihan, $p_lain_lain);
            echo number_format(array_sum($gaji_kotor),0,'.',','); 
        ?>   
        </b></span>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><strong>TAMBAHAN/RAPEL:</strong></td>
    </tr>
    <tr>
      <td>Gaji Pokok</td>
      <td>:</td>
      <td align="right"><?php echo number_format($t_gapok,0,'.',','); ?></td>
    </tr>
    <tr>
      <td>Struktural</td>
      <td>:</td>
      <td align="right"><?php echo number_format($t_struktural,0,'.',','); ?></td>
    </tr>
    <tr>
      <td>Fungsional</td>
      <td>:</td>
      <td align="right"><?php echo number_format($t_fungsional,0,'.',','); ?></td>
    </tr>
    <tr>
      <td>U. Makan</td>
      <td>:</td>
      <td align="right"><?php echo number_format($t_uang_makan,0,'.',','); ?></td>
    </tr>
    <tr>
      <td>Transport</td>
      <td>:</td>
      <td align="right"><?php echo number_format($t_transport,0,'.',','); ?></td>
    </tr>
    <tr>
      <td>Kelangkaan</td>
      <td>:</td>
      <td align="right"><?php echo number_format($t_kelangkaan,0,'.',','); ?></td>
    </tr>
    <tr>
      <td>Lain-lain</td>
      <td>:</td>
      <td align="right"><?php echo number_format($t_lain_lain,0,'.',','); ?></td>
    </tr>
    <tr>
      <td><span style="font-size: 10pt;"><strong>Total Tambahan/Rapel</strong></span></td>
      <td><span style="font-size: 10pt;">:</span></td>
      <td align="right"><span style="font-size: 10pt;"><strong>
        <?php 
            $gaji_tambahan = array($t_gapok, $t_struktural, $t_fungsional, $t_uang_makan, $t_transport, $t_kelangkaan, $t_lain_lain);
            echo number_format(array_sum($gaji_tambahan),0,'.',','); 
        ?>
          
        </strong></span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><span style="font-size: 10pt;"><strong></strong></span></td>
    </tr>
    <tr>
      <td colspan="3"><strong>POTONGAN</strong></td>
    </tr>
    <tr>
      <td>Bank</td>
      <td>:</td>
      <td align="right"><?php echo number_format($pot_bank,0,'.',','); ?></td>
    </tr>
    <tr>
      <td>Koperasi</td>
      <td>:</td>
      <td align="right"><?php echo number_format($pot_koperasi,0,'.',','); ?></td>
    </tr>
    <tr>
      <td>Astek</td>
      <td>:</td>
      <td align="right"><?php echo number_format($pot_astek,0,'.',','); ?></td>
    </tr>
    <tr>
      <td>Pajak</td>
      <td>:</td>
      <td align="right"><?php echo number_format($pot_pajak,0,'.',','); ?></td>
    </tr>
    <tr>
      <td>Transport</td>
      <td>:</td>
      <td align="right"><?php echo number_format($pot_transport,0,'.',','); ?></td>
    </tr>
    <tr>
      <td>Lain-lain</td>
      <td>:</td>
      <td align="right"><?php echo number_format($pot_lain_lain,0,'.',','); ?></td>
    </tr>
    <tr>
      <td><span style="font-size: 10pt;"><strong>Total Potongan</strong></span></td>
      <td><span style="font-size: 10pt;"><strong>:</strong></span></td>
      <td align="right"><span style="font-size: 10pt;"><strong>
        <?php 
            $total_potongan = array($pot_bank, $pot_koperasi, $pot_astek, $pot_pajak, $pot_transport, $pot_lain_lain);
            echo number_format(array_sum($total_potongan),0,'.',','); 
        ?>
          
        </strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><span style="font-size: 10pt;"><strong>Penghasilan Bersih</strong></span></td>
      <td><span style="font-size: 10pt;">:</span></td>
      <td align="right"><span style="font-size: 10pt;"><strong>
        <?php 
          // $kotor = array($p_gapok, $p_struktural, $p_fungsional, $p_uang_makan, $p_transport, $p_kelangkaan, $p_peralihan, $p_lain_lain);
          // $tambahan = array($t_gapok, $t_struktural, $t_fungsional, $t_uang_makan, $t_transport, $t_kelangkaan, $t_lain_lain);
          // $potongan = array($pot_bank, $pot_koperasi, $pot_astek, $pot_pajak, $pot_transport, $pot_lain_lain);
          $a = array_sum($gaji_kotor);
          $b = array_sum($gaji_tambahan);
          $c = array_sum($potongan);
          $gaji_bersih = ($a + $b) - $c;
          echo number_format($gaji_bersih,0,'.',','); 
        ?>
        </strong></span></td>
    </tr>
    <tr>
      <td>(Penghasilan+Rapel)-Potongan</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" style="vertical-align: middle; text-align: center;">Diterima oleh,</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" style="vertical-align: middle; text-align: center;"><?php echo $nama_lengkap; ?></td>
    </tr>
  </tbody>
</table>
</body>
</html>
