<?php

include "config/koneksi.php";

$id_tribun = $_POST['id_tribun'];
$id_tiket = $_POST['id_tiket'];
$nama_tribun = $_POST['nama_tribun'];
$kuota_tribun = $_POST['kuota_tribun'];
$harga = $_POST['harga'];

$query = ("INSERT INTO tb_kategori_tribun (id_tribun, id_tiket, nama_tribun, kuota_tribun, harga)"
        . "VALUES ('$id_tribun', "
        . "'$id_tiket', "
        . "'$nama_tribun', "
        . "'$kuota_tribun', "
		. "'$harga')");
$result = mysqli_query($connect, $query)or die(mysqli_error());
if ($query) {
    echo "<script>alert('Data Tribun Berhasil ditambahkan'); window.location = 'data_tribun.php'</script>";
} else {
    echo "<script>alert('Data Tribun Berhasil ditambahkan'); window.location = 'data_tribun.php'</script>";
}





	
	




?>