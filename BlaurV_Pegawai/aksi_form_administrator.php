<?php

include "config/koneksi.php";

$id_pegawai = $_POST['id_pegawai'];
$nama = $_POST['nama'];
$password = $_POST['password'];
$level = $_POST['level'];


$query = ("INSERT INTO tb_pegawai (id_pegawai, username, password, level)"
        . "VALUES ('$id_pegawai', "
        . "'$nama', "
        . "'$password', "
		. "'$level')");
$result = mysqli_query($connect, $query)or die(mysqli_error());
if ($query) {
    echo "<script>alert('Data Administrator Berhasil didaftarkan'); window.location = 'data_administrator.php'</script>";
} else {
    echo "<script>alert('Data Administrator Gagal didaftarkan'); window.location = 'data_administrator.php'</script>";
}



	
	




?>