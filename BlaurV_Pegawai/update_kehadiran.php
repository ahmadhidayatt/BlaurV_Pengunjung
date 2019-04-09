<?php
include"config/koneksi.php";



if($_GET['id_pembelian'])
{
 	$id_pembelian			= $_GET['id_pembelian'];
	$query		= mysqli_query($connect,"UPDATE `tb_transaksi` SET `status_pembelian` = 'MASUK' WHERE `id_pembelian` = '$id_pembelian'");
	
	if ($query)
{
	echo "<script>alert('Data Berhasil di Update'); window.location = 'data_kehadiran.php'</script>";	
} 
	else 
{
	echo "<script>alert('Data Gagal di Update'); window.location = 'data_kehadiran.php'</script>";	
}
	header('location:data_pembayaran.php');
}

?>