<style type="text/css">
td{
	border:none;
}

#input{
	height:20px;
	border:1px solid #c0d3e2;
}
</style>
<?php
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";

	echo "
	<form id=formUbahData name=formUbahData method=post action=proses.php>
	<input type=hidden name=proses id=proses value=$_GET[kode] />";
	if($_GET['kode']=="jenis_kendaraan_update"){
		$pesan="SELECT * FROM jenis_kendaraan WHERE inc='$_GET[id]'";
		$query=mysql_query($pesan);
		$data=mysql_fetch_array($query);
		
		
		
	echo "<div class='row-fluid sortable'>
				<div class='box span12'>
					<div class='box-header' data-original-title>
						<h2><i class='halflings-icon edit'></i><span class='break'></span>Form ubah data jenis_kendaraan</h2>
						<div class='box-icon'>
							<a href='#' class='btn-setting'><i class='halflings-icon wrench'></i></a>
							<a href='#' class='btn-minimize'><i class='halflings-icon chevron-up'></i></a>
							<a href='#' class='btn-close'><i class='halflings-icon remove'></i></a>
						</div>
					</div>
					<div class='box-content'>
						<form class='form-horizontal'>
						  <fieldset>
						  <input type=hidden name=inc id=inc value=$data[inc] />
						  
							
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Nama Barang </label>
							<div class='controls'>
							
							<input type='text' name=nmBarang class='span6 typeahead' id='typeahead' readonly='true' value='".$data[jenis_kendaraan_nama]."'/>
							</div>
							
						
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Harga Parkir </label>
							<div class='controls'>
							<input type='text' name=harga_parkir class='span6 typeahead' id='typeahead' value='".$data[harga_parkir]."'>
							</div>
							
							<div class='form-actions'>
							<input type=submit class='btn btn-primary' name=SimpanBar value=Simpan />
							<input type=reset name=BatalBar class='btn' value=Batal />
							 
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->";	
	}	
	echo "</form>";
?>