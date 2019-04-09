<?php
include "../../proses/koneksi.php";
$status = $_GET['kd'];

$query = ("UPDATE `tb_mitralapangan` SET `status` = 'Approve' WHERE `tb_mitralapangan`.`id_mitra` = '$status'");
$result = mysqli_query($connect, $query)or die(mysqli_error());
if ($query){
	echo "<script>alert('Data Berhasil di update!'); window.location = './hal_admin.php'</script>";	
} else {
	echo "<script>alert('Data Gagal update!'); window.location = 'index.php'</script>";	
}
?>