<?php

include './koneksi.php';
if ($_POST['upload']) {
    $status = "Request";
    $id = $_POST['id_mitera'];
    $namalap = $_POST['nama'];
    $harga = $_POST['harga'];
    $alamat = $_POST['alamat'];
    $alamatemail = $_POST['email'];
    $jabatan = "Mitra";

    $query = ("INSERT INTO tb_mitralapangan (id_mitra, nama, harga, email, lokasi, status, jabatan)"
            . "VALUES ('$id', "
            . "'$namalap', "
            . "'$harga', "
            . "'$alamatemail', "
            . "'$alamat', "
            . "'$status', "
            . "'$jabatan')");
    $result = mysqli_query($connect, $query)or die(mysqli_error());
    if ($query) {
        echo "<script>alert('Data Berhasil Dikirim, terima kasih atas partisipasinya silahkan tunggu respond dari kami');  window.history.back();</script>";
    } else {
        echo 'GAGAL MENGUPLOAD GAMBAR';
    }
}
?>