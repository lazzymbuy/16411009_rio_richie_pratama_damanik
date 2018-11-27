<?php
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";

?>
<div class='row-fluid sortable'>		
				<div class='box span12'>
					<div class='box-header' data-original-title>
						<h2><i class='halflings-icon user'></i><span class='break'></span>Data Barang</h2>
						<div class='box-icon'>
							<a href='#' class='btn-setting'><i class='halflings-icon wrench'></i></a>
							<a href='#' class='btn-minimize'><i class='halflings-icon chevron-up'></i></a>
							<a href='#' class='btn-close'><i class='halflings-icon remove'></i></a>
						</div>
					</div>
					<div class='box-content'>
						<table class='table table-striped table-bordered bootstrap-datatable datatable'>
						  <thead>
							  <tr>
								  <th>No</th>
								  <th>Nama Barang</th>
								  <th>Harga Beli</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
							<tr>
							<?php
		$qtmpil_jenis_kendaraan="select * from jenis_kendaraan order by inc asc";						
		$qp_brg=mysql_query($qtmpil_jenis_kendaraan);
		$no=1;
		while($row1=mysql_fetch_array($qp_brg)){ ?>
		
		
		<td><?php echo "$no"; ?></td>
          <td><?php echo "$row1[jenis_kendaraan_nama]"; ?></td>
          
		  <td><?php echo "Rp. $row1[harga_parkir]"; ?></td>
         
          <td><?php echo "<a class='btn btn-info' href=index.php?halaman=form_ubah_data&kode=jenis_kendaraan_update&id=$row1[inc]>"; ?>
          	 <i class='halflings-icon white edit'></i>
			 <?php echo "</a> ";
			 
			
          echo"</td>
		
		
								
							</tr>";
							$no++;}?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->