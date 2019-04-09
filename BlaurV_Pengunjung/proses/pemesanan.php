<?php

include "./koneksi.php";
$idttns = $_POST['idtrans'];
$id = $_POST['id'];
$lapangan = $_POST['namalap'];
$harga = $_POST['harga'];
$nama = $_POST['namapemesan'];
$alamat = $_POST['alamat'];
$tlp = $_POST['notelp'];
$status = "Pending";

$query = ("INSERT INTO tb_pemesanan (id_trans, id_mitra, nama_lapangan, harga, nama, alamat, notelp, status)"
        . "VALUES ('$idttns', "
        . "'$id', "
        . "'$lapangan', "
        . "'$harga', "
        . "'$nama', "
        . "'$alamat', "
        . "'$tlp', "
        . "'$status')");
$result = mysqli_query($connect, $query)or die(mysqli_error());
if ($query) {
    echo "<script>alert('Data Penyewa Berhasil dimasukan!'); window.location = '../Project/hal_user.php'</script>";
} else {
    echo "<script>alert('Data Karyawan Gagal dimasukan!'); window.location = '../Project/hal_user.php'</script>";
}
?>