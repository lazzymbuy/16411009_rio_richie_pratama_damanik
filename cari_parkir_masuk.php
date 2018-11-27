<?php error_reporting(E_ERROR | E_WARNING | E_PARSE); ?>

<?php
include "library/koneksi.php";

$result=mysql_query("SELECT * FROM parkir_masuk where id_parkir_masuk ='$_POST[kode]'");
$found=mysql_num_rows($result);
 
if($found>0){
    $row=mysql_fetch_array($result);{
	echo $row['plat_motor'];
	}
 }else{
    echo "";
 }
 
$result=mysql_query("SELECT * FROM parkir_masuk where id_parkir_masuk ='$_POST[kode1]'");
$found=mysql_num_rows($result);
 
if($found>0){
    $row=mysql_fetch_array($result);{
	echo $row['harga'];
	}
 }else{
    echo "";
 } 
 
$result=mysql_query("SELECT * FROM parkir_masuk where id_parkir_masuk ='$_POST[kode2]'");
$found=mysql_num_rows($result);
 
if($found>0){
    $row=mysql_fetch_array($result);{
	echo $row['merk'];
	}
 }else{
    echo "";
 } 
 
?>