<?php

include "config/koneksi.php";

$id_customer = $_POST['id_customer'];
$id_admin = $_POST['id_admin'];
$nama_lengkap = $_POST['nama_lengkap'];
$hp = $_POST['hp'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = 'Customer';

$query = ("INSERT INTO tb_customer (id_customer, id_admin, nama_lengkap, hp, email, username, password, level)"
        . "VALUES ('$id_customer', "
        . "'$id_admin', "
        . "'$nama_lengkap', "
        . "'$hp', "
		. "'$email', "
        . "'$username', "
        . "'$password', "
		. "'$level')");
$result = mysqli_query($connect, $query)or die(mysqli_error());
if ($query) {
    echo "<script>alert('Data Customer Berhasil didaftarkan'); window.location = 'form_customer.php'</script>";
} else {
    echo "<script>alert('Data Customer Gagal didaftarkan'); window.location = 'form_customer.php'</script>";
}



	
	




?>