
<?php

include "config/koneksi.php";
// update data Pegawai
	if(isset($_POST['edit_tribun']))
	{
	$id_tribun			= $_POST['id_tribun'];
	$id_tiket			= $_POST['id_tiket'];
	$nama_tribun	   	= $_POST['nama_tribun'];
	$kuota_tribun  		= $_POST['kuota_tribun'];
	$harga   			= $_POST['harga'];
	
		
	$query = mysqli_query($connect,"update tb_kategori_tribun set id_tribun='$id_tribun', id_tiket='$id_tiket', nama_tribun='$nama_tribun', kuota_tribun='$kuota_tribun', harga='$harga' where id_tribun='$id_tribun'");
	header('location:data_tribun.php');
	}
	?>