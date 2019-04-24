	<?php
	include "config/koneksi.php";

	if($_GET['id_tiket'])
	{
 	$id_tiket			= $_GET['id_tiket'];
	$query				= mysqli_query($connect,"delete from tb_paket_gunung where id_gunung='$id_tiket'");
	header('location:data_paket_gunung.php');
	}
	?>