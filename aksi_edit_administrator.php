
<?php

include "config/koneksi.php";
// update data Pegawai
	if(isset($_POST['update_administrator']))
	{
	$id_admin = $_POST['id_admin'];
	$nama = $_POST['nama'];
	$hp = $_POST['hp'];
	$jk = $_POST['jk'];
		
	$query = mysqli_query($connect,"update tb_pegawai set id_pegawai='$id_admin', username='$nama', password='$hp', level='$jk' where id_pegawai='$id_admin'");
	header('location:data_administrator.php');
	}
	?>