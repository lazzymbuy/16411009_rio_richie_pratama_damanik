<div id="clockDisplay" class="clockStyle"></div>
<script type="text/javascript" language="javascript">
function renderTime(){
 var currentTime = new Date();
 var h = currentTime.getHours();
 var m = currentTime.getMinutes();
 var s = currentTime.getSeconds();
 if (h == 0){
  h = 24;
   }
   if (h < 10){
    h = "0" + h;
    }
    if (m < 10){
    m = "0" + m;
    }
    if (s < 10){
    s = "0" + s;
    }
 var myClock = document.getElementById('clockDisplay');
 myClock.textContent = h + ":" + m + ":" + s + "";    
 setTimeout ('renderTime()',1000);
 }
 renderTime();
</script>
					


<?php
echo "
	<form id=formID name=formInput method=post action=proses.php>
	  <input type=hidden name=proses id=proses value=$_GET[kode] />";
//form data barang
	if ($_GET['kode']=="parkir_masuk"){

		
	echo "<div class='row-fluid sortable'>
				<div class='box span5'>
					<div class='box-header' data-original-title>
						<h2><i class='halflings-icon edit'></i><span class='break'></span>Form input Kendaraan Masuk</h2>
						<div class='box-icon'>
							<a href='#' class='btn-setting'><i class='halflings-icon wrench'></i></a>
							<a href='#' class='btn-minimize'><i class='halflings-icon chevron-up'></i></a>
							<a href='#' class='btn-close'><i class='halflings-icon remove'></i></a>
						</div>
					</div>
					<div class='box-content'>
						<form class='form-horizontal'>
						  <fieldset>
						  <input type=hidden name=inc id=inc value=$inc />
						  
							<div class='control-group'>
							<label class='control-label' for='typeahead'>jenis_kendaraan </label>
							<div class='controls'>
							 <select name='id_jenis_kendaraan' id='input'>";
                   
						$jenis_kendaraan="SELECT * FROM jenis_kendaraan ORDER BY jenis_kendaraan_id ASC";
						$qjenis_kendaraan=mysql_query($jenis_kendaraan);
						while($x=mysql_fetch_array($qjenis_kendaraan))
						{
							echo "<option value='$x[inc]'>$x[jenis_kendaraan_nama]</option>";
						}
					
    				echo"</select>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>plat_motor</label>
							<div class='controls'>
							<input type='text' name='plat_motor' class='span6 typeahead' id='typeahead'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>merk</label>
							<div class='controls'>
							<input type='text' name='merk' class='span6 typeahead' id='typeahead'>
							</div>
							
													
							<div class='form-actions'>
							<input type=submit class='btn btn-primary' name=SimpanBar value=Simpan />
							<input type=reset name=BatalBar class='btn' value=Batal />
							 
							</div>
						  </fieldset>
						</form>   

					</div>
				</div>";	
?><!--/span-->


		
<div class="box span7">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Form Data Parkir Masuk</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
					
					
						<table class="table table-bordered table-striped table-condensed">
							  <thead>
								  <tr>
									  <th>Tanggal</th>
									  <th>Jam</th>
									  <th>Plat No</th>
									  <th>Nama</th>
									  <th>kode parkir</th>
									  <th>Status</th>
									  </tr>
							  </thead>   
							  <tbody>
							  <?php
			  	$out="SELECT * FROM parkir_masuk where status='Masuk' ORDER BY id_parkir_masuk ASC LIMIT 15";
				$qout=mysql_query($out);
				while($x=mysql_fetch_array($qout))
				{
			  ?>
				<?php echo"<tr>
                <td>$x[tanggal]</td>
                <td>$x[waktu_parkir]</td>
                <td>$x[plat_motor]</td>
                <td>$x[merk]</td>
                <td>$x[id_parkir_masuk]</td>
                <td>"; if($x['status']=='Masuk'){echo"<a href='kartu_parkir.php?id=$x[id_parkir_masuk]' class='btn btn-small btn-danger'>Masuk</a>";}
                else {echo"<a href='kartu_parkir.php?id=$x[id_parkir_masuk]' class='btn btn-small btn-success'>Keluar</a>";}
                echo"</td>
                </tr>";
				} ?>
			    
              <tr>
                <td style="color:#FFF; background-color:#2D89EF; border:none" colspan="2" align="right">Total Kendaraan Parkir</td>
                <td style="color:#FFF; background-color:#2D89EF; border:none" align="right">
					<?php
						$data = mysql_num_rows(mysql_query("SELECT * FROM parkir_masuk where status='Masuk'"));
						echo"$data Kendaraan";
					?>
                </td>
                <td style="color:#FFF; background-color:#2D89EF; border:none">&nbsp;</td>
                <td style="color:#FFF; background-color:#2D89EF; border:none">&nbsp;</td>
                <td style="color:#FFF; background-color:#2D89EF; border:none">&nbsp;</td>

  
              </tr>
								                                  
							  </tbody>
						 </table> 


						
					</div>
				</div><!--/span-->	
				
			</div><!--/row-->
	
<?php
}
?>

