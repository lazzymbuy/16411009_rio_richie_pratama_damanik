<?php
error_reporting(0);
include "library/koneksi.php";
$p=mysql_fetch_array(mysql_query("select * from parkir_masuk where id_parkir_masuk ='$_GET[id]'"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan Transaksi</title>
<link rel="stylesheet" href="css/style_doc.css">
</head>

<?php
if($_GET['halaman'] !=='kartu_parkir'){echo"<body onload='window.print();''>";}
?>



<center>
<table width="444" border="1">
  <tr>
    <th style="color:#FFF; background-color:#FFC40D;"><h2>Nomor</h2></th>
    <th style="color:#FFF; background-color:#FFC40D;" colspan="2"><h2><?php echo"$p[id_parkir_masuk]"; ?></h2></th>
  </tr>
  
  <tr>
    <td style="uppercase; font-size: 19pt;" align=center colspan="3"><b><b><?php echo"$p[plat_motor]"; ?></b></td>
  </tr>
  <tr>
    <td style="color:#FFF; text-transform: uppercase; font-size: 12pt; background-color:#00A300;" align=center colspan="3"><b><?php echo"$p[merk]"; ?></b></td>
  </tr>
  <tr>
    <td width="171">Tanggal</td>
    <td width="16">:</td>
    <td><?php echo"$p[tanggal]"; ?></td>
  </tr>
  <tr>
    <td>Jam Masuk</td>
    <td>:</td>
    <td><?php echo"$p[waktu_parkir]"; ?></td>
  </tr>
  
  
  <tr>
    <td colspan='3' style="color:#FFF; background-color:#FFC40D;" align='center'>**Berlaku sekali masuk</td>
    
  </tr>
</table>
<br/>
<?php
if($_GET['halaman']=='kartu_parkir'){echo"<a href='kartu_parkir.php?id=$_GET[id]' class='btn btn-small btn-info'>Print</a>";}
?>

</html>

