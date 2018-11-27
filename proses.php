<?php
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";
$proses=$_POST['proses'];
$hapus=$_GET['proses'];
$url="";
//fungsi insert
	function insert($nama_tabel,$values)
	{
		$sql="INSERT INTO ".$nama_tabel." VALUES(".$values.")";
		mysql_query($sql);	
	}
//fungsi update
	function update($nama_tabel,$values,$kondisi)
	{
		$sql="UPDATE ".$nama_tabel." SET ".$values." WHERE ".$kondisi;
		mysql_query($sql);
	}
//fungsi delete
	function delete($nama_tabel,$kondisi)
	{
		$sql="DELETE FROM ".$nama_tabel." WHERE ".$kondisi;
		mysql_query($sql);
	}
//pilih fungsi
	switch($proses){
		//pemilihan fungsi insert
		case "akun_insert":
		{
			$nama_tabel="account";
			$username=md5($_POST["username"]);
			$password=md5($_POST["password"]);
			$values="'$username', '$password', '$_POST[nama]', '$_POST[level]'";
			$hal="data_akun";
			insert($nama_tabel,$values);
			break;
		}
		
		case "parkir_masuk":
		{	
			function createRandomNo() {
	$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 5) {
		$num = rand() % 33;
		$tmp = substr($chars, $num, 1);
		$pass = $pass . $tmp;
		$i++;
	}
	return $pass;
}

 $data['no_parkir'] = createRandomNo();	  		

			$sekarang = date("d/m/Y"); /*Hasil 2013-09-26*/
			$jam_skrg = date("H:i:s");  
			$z=mysql_fetch_array(mysql_query("select * from jenis_kendaraan where inc='$_POST[id_jenis_kendaraan]'"));
			//insert ke tabel parkir_masuk
			$parkir_masuk="INSERT INTO parkir_masuk(id_parkir_masuk,id_jenis_kendaraan, plat_motor, merk, tanggal, waktu_parkir,harga)
			VALUES('$data[no_parkir]','$_POST[id_jenis_kendaraan]', '$_POST[plat_motor]', '$_POST[merk]', '$sekarang', '$jam_skrg','$z[harga_parkir]')";
			mysql_query($parkir_masuk);
			//$hal="form_parkir_masuk&kode=parkir_masuk";
			$hal="kartu_parkir&id=$data[no_parkir]";
			break;
		}
		
		case "parkir_keluar":
		{	$sekarang = date("d/m/Y"); /*Hasil 2013-09-26*/
			$jam_skrg = date("H:i:s");  
			//insert ke tabel parkir_masuk
			$parkir_masuk="INSERT INTO parkir_keluar(id_parkir_masuk,lama_parkir,total_parkir,tanggal_keluar,jam_keluar)
			VALUES('$_POST[pilih_parkir_masuk]', '$_POST[lama_parkir]', '$_POST[subtotaltxt]', '$sekarang', '$jam_skrg')";
			mysql_query($parkir_masuk);

			mysql_query("UPDATE parkir_masuk SET status='keluar' Where id_parkir_masuk='$_POST[pilih_parkir_masuk]'");

			$hal="form_parkir_keluar";
			break;
		}
		
		
		//pemilihan fungsi update
		case "jenis_kendaraan_update":
			{
				$sql="UPDATE jenis_kendaraan SET harga_parkir='$_POST[harga_parkir]' WHERE inc='$_POST[inc]'";
				mysql_query($sql);
				$hal="data_jenis_kendaraan";
				break;
			}	
		
		
		case "ubah_akun":
		{
			$sql="UPDATE account SET password='$_POST[password]', nama='$_POST[nama]', level='$_POST[level]' WHERE username='$_POST[username]'";
			mysql_query($sql);
			$hal="data_akun";
			break;
		}
	}//end switch
	
switch($hapus){
	
	
	case "hapus_akun":
	{
		$sql="DELETE FROM account WHERE username='$_GET[id]'";
		mysql_query($sql);
		$hal="data_akun";
		break;
	}
}
	if ($url=="transaksi")
	{
		lompat_ke($hal);
	}
	else
	{
		lompat_ke("index.php?halaman=".$hal);
	}
?>