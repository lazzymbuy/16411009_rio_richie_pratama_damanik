<div id="sidebar-left" class="span2">
<div class="nav-collapse sidebar-nav">
<?php  
// cek level user apakah admin atau bukan
if ($_SESSION['level'] == "admin")
{ 
	echo"
	<ul class='nav nav-tabs nav-stacked main-menu'>
<li><a href='index.php?halaman=data_jenis_kendaraan'><i class='icon-calendar'></i><span class='hidden-tablet'> Jenis Kendaraan</span></a></li>
<li><a href='index.php?halaman=form_parkir_masuk&kode=parkir_masuk'><i class='icon-calendar'></i><span class='hidden-tablet'> Parkir Masuk</span></a></li>
<li><a href='index.php?halaman=form_parkir_keluar'><i class='icon-calendar'></i><span class='hidden-tablet'> Parkir Keluar</span></a></li>
<li><a href='index.php?halaman=data_akun'><i class='icon-user'></i><span class='hidden-tablet'> Data Akun</span></a></li>
<li><a href='logout.php'><i class='icon-off'></i><span class='hidden-tablet'> Logout</span></a></li>					
</ul>";
}

else
{
	echo"
	<ul class='nav nav-tabs nav-stacked main-menu'>
<li><a href='index.php?halaman=data_jenis_kendaraan'><i class='icon-calendar'></i><span class='hidden-tablet'> Jenis Kendaraan</span></a></li>
<li><a href='index.php?halaman=form_parkir_masuk&kode=parkir_masuk'><i class='icon-calendar'></i><span class='hidden-tablet'> Parkir Masuk</span></a></li>
<li><a href='index.php?halaman=form_parkir_keluar'><i class='icon-calendar'></i><span class='hidden-tablet'> Parkir Keluar</span></a></li>
<li><a href='logout.php'><i class='icon-off'></i><span class='hidden-tablet'> Logout</span></a></li>					
</ul>";
}
?>
</div>
</div>