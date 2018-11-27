<?php
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";
?>

		
	<!-- end: JavaScript-->
        <script>
            jQuery(document).ready( function() {
                // binds form submission and fields to the validation engine
                jQuery("#formID").validationEngine();
            });
			///
				
        </script>
<script type="text/javascript" src="jquery-1.9.1.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	
	function cari_parkir_masuk_beli(){
		var kode=$("#pilih_parkir_masuk").val();
			if(kode!=""){
				$.ajax({
					type:"post",
					url:"cari_parkir_masuk.php",
					data:"kode="+kode,
					success:function(data){
					$("#plat_no").val(data)
					}
				});
			}
			
		var kode1=$("#pilih_parkir_masuk").val();
			if(kode1!=""){
				$.ajax({
					type:"post",
					url:"cari_parkir_masuk.php",
					data:"kode1="+kode1,
					success:function(data){
					$("#harga2").val(data)
					}
				});
			} 
			
		var kode2=$("#pilih_parkir_masuk").val();
			if(kode2!=""){
				$.ajax({
					type:"post",
					url:"cari_parkir_masuk.php",
					data:"kode2="+kode2,
					success:function(data){
					$("#merk2").val(data)
					}
				});
			} 
						                                   
	} 
	
	$('#pilih_parkir_masuk').change(function() {
		cari_parkir_masuk_beli();
		$("#lama_parkir").focus()	
    });		
		
})		
</script>


<script language=Javascript>
function isNumberKey(evt)
//Membuat validasi hanya untuk input angka menggunakan kode javascript
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))

return false;
return true;
}

function subtotal(lama_parkir){
var hitung = (document.getElementById('harga').value * document.getElementById('lama_parkir').value);
	document.forms.formID.subtotaltxt.value = hitung;
	
	var hitung = (document.getElementById('harga2').value * document.getElementById('lama_parkir2').value);
	document.forms.formID2.subtotaltxt.value = hitung;
}

</script>	

<div class="row-fluid sortable">
					<div class="box span5">
					<div class="box-header">
						<h2><i class="halflings-icon th"></i><span class="break"></span>Select Item</h2>
					</div>
					<div class="box-content">
						<ul class="nav tab-menu nav-tabs" id="myTab">
							<li class="active"><a href="#name">By Plat</a></li>
							<li><a href="#custom">By No Parkir</a></li>
						</ul>
						 
						<div id="myTabContent" class="tab-content">
							<div class="tab-pane active" id="name">
							
					<div class="box-content">
		<form id="formID"  name="form2" method="post" action="proses.php">
		<input type=hidden name=proses id=proses value='parkir_keluar'>
		<table class="table table-bordered table-striped table-condensed">
            <tr><input name="inc" type="hidden" value="<?php echo "$inc"; ?>" />
              <td id="noborder">Plat Nomer</td>
              <td id="noborder">:</td>
              <td id="noborder">
			  <?php     
$result = mysql_query("select * from parkir_masuk where status !='Keluar'");  
$jsArray = "var prdName = new Array();\n";  
$jsArray2 = "var prdID = new Array();\n";  
$jsArray3 = "var Merk = new Array();\n";  
echo '<select data-placeholder="Your Favorite Football Team" id="selectError2" data-rel="chosen" name="pilih_parkir_masuk" 
onchange="document.getElementById(\'harga\').value = prdName[this.value], 
          document.getElementById(\'kodeparkir_masuk\').value = prdID[this.value], 
          document.getElementById(\'merk\').value = Merk[this.value]">';  
echo '<option>-------</option>';  
while ($row = mysql_fetch_array($result)) { 
 
    echo '<option value="' . $row['id_parkir_masuk'] . '">' . $row['plat_motor'] . '</option>'; 
    $jsArray .= "prdName['" . $row['id_parkir_masuk'] . "'] = '" . addslashes($row['harga']) . "';\n";  
    $jsArray2 .= "prdID['" . $row['id_parkir_masuk'] . "'] = '" . addslashes($row['id_parkir_masuk']) . "';\n";  
    $jsArray3 .= "Merk['" . $row['id_parkir_masuk'] . "'] = '" . addslashes($row['merk']) . "';\n";  
	
}  
echo '</select>';  

?>
			  </td>
            </tr>
			
			 <tr>
              <td id="noborder">Kode parkir_masuk</td>
              <td id="noborder">:</td>
              <td id="noborder"><input name="kodeparkir_masuk" type="text" id="kodeparkir_masuk" size="35" maxlength="50" readonly="readonly" />
			  <script type='text/javascript'>    
    <?php echo $jsArray2; ?>  
    </script>
			  </td>
            </tr>
			 <tr>
              <td id="noborder">Merk</td>
              <td id="noborder">:</td>
              <td id="noborder"><input name="merk" type="text" id="merk" size="35" maxlength="50" readonly="readonly" />
			  <script type='text/javascript'>    
    <?php echo $jsArray3; ?>  
    </script>
			  </td>
            </tr>
            <tr>
              <td id="noborder">Harga</td>
              <td id="noborder">:</td>
              <td id="noborder"><input name="harga" type="text" id="harga" size="5" maxlength="15" readonly="readonly" />
			  <script type='text/javascript'>    
    <?php echo $jsArray; ?>  
    </script>
			  </td>
            </tr> 
			<tr>
              <td id="noborder">Lama Parkir</td>
              <td id="noborder">:</td>
              <td id="noborder"><input name="lama_parkir" type="text" id="lama_parkir" size="5" maxlength="15" onkeyup="subtotal(this.value,getElementById('lama_parkir').value);" onkeypress="return isNumberKey(event)" /></td>
            </tr>
			<tr>
              <td id="noborder">Subtotal</td>
              <td id="noborder">:</td>
              <td id="noborder"><input name="subtotaltxt" type="text" id="subtotaltxt" size="5" maxlength="15" readonly="readonly"/></td>
            </tr>
			 
          </table>
		  <tr>
			
			 <td id="noborder"><input type="submit" name="add" class="btn btn-large btn-success" value="Add" /></td>
              
            </tr>
	  </form>  
					</div>
							</div>
							<div class="tab-pane" id="custom">
							<div class="box-content">
					<form id="formID2" name="form2" method="post" action="proses.php">
        <input name="run" type="hidden" value="form2" />
		<input type=hidden name=proses id=proses value='parkir_keluar'>
		
		<table class="table table-bordered table-striped table-condensed">
            <tr><input name="inc" type="hidden" value="<?php echo "$inc"; ?>" />
              <td id="noborder">Kode parkir_masuk</td>
              <td id="noborder">:</td>
              <td id="noborder"><input type="text" name="pilih_parkir_masuk" id="pilih_parkir_masuk" class="validate[required]" size="3"/></td>
            </tr>
			
			 <tr>
              <td id="noborder">Plat no</td>
              <td id="noborder">:</td>
              <td id="noborder"><input name="plat_no" type="text" id="plat_no" size="35" maxlength="50" readonly="readonly" /></td>
            </tr>
			 <tr>
              <td id="noborder">Merk</td>
              <td id="noborder">:</td>
              <td id="noborder"><input name="merk" type="text" id="merk2" size="35" maxlength="50" readonly="readonly" /></td>
            </tr>
            <tr>
              <td id="noborder">Harga</td>
              <td id="noborder">:</td>
              <td id="noborder"><input name="harga" type="text" id="harga2" size="5" maxlength="15" readonly="readonly" /></td>
            </tr> 
			<tr>
              <td id="noborder">lama_parkir</td>
              <td id="noborder">:</td>
              <td id="noborder"><input name="lama_parkir" type="text" id="lama_parkir2" size="5" maxlength="15" onkeyup="subtotal(this.value,getElementById('lama_parkir').value);" onkeypress="return isNumberKey(event)" /></td>
            </tr>
			<tr>
              <td id="noborder">Subtotal</td>
              <td id="noborder">:</td>
              <td id="noborder"><input name="subtotaltxt" type="text" id="subtotaltxt" size="5" maxlength="15" readonly="readonly"/></td>
            </tr>
			 
          </table>
		  <tr>
			
			 <td id="noborder"><input type="submit" name="add" class="btn btn-large btn-success" value="add" /></td>
              
            </tr>
	  </form>  
					</div>
							</div>
							
						</div>
					</div>
				</div><!--/span-->
			
<div class="box span7">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Form Data Parkir Keluar</h2>
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
									  <th>Lama</th>
									  <th>Total</th>
									  <th>Status</th>
									  </tr>
							  </thead>   
							  <tbody>
							  <?php
			  	$out="SELECT * FROM parkir_keluar ORDER BY id_parkir_keluar ASC LIMIT 15";
				$qout=mysql_query($out);
				while($x=mysql_fetch_array($qout))
				{
				$z=mysql_fetch_array(mysql_query("select * from parkir_masuk where id_parkir_masuk='$x[id_parkir_masuk]'"));
			  ?>
				<?php echo"<tr>
                <td>$x[tanggal_keluar]</td>
                <td>$x[jam_keluar]</td>
                <td>$z[plat_motor]</td>
                <td>$x[lama_parkir]</td>
                <td>$x[total_parkir]</td>
                <td><a href='kartu_parkir.php?id=$x[id_parkir_masuk]' class='btn btn-small btn-success'>Keluar</a></td>
                </tr>";
				} ?>
			    
              <tr>
                <td style="color:#FFF; background-color:#2D89EF; border:none" colspan="4" align="right">Grand Total :</td>
                <td style="color:#FFF; background-color:#2D89EF; border:none" align="right">
					<?php
						$sum="SELECT SUM(total_parkir)AS total FROM parkir_keluar";
						$qsum=mysql_query($sum);
						$dsum=mysql_fetch_array($qsum);
						echo"Rp.";
						echo digit($dsum['total']);
					?>
                </td>
                <td style="color:#FFF; background-color:#2D89EF; border:none">&nbsp;</td>
              </tr>
								                                  
							  </tbody>
						 </table> 


						
					</div>
				</div><!--/span-->				
			
			</div><!--/row-->

