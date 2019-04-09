	<?php

include "config/koneksi.php";

	if($_GET['id_admin'])
	{
 	$id_admin			= $_GET['id_admin'];
	$query				= mysqli_query($connect,"delete from tb_pegawai where id_pegawai='$id_admin'");
	header('location:data_administrator.php');
	}
	?>