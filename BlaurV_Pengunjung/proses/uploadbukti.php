<?php

include './koneksi.php';
if ($_POST['upload']) {
    $ekstensi_diperbolehkan = array('png', 'jpg', 'pdf');
    $nama = $_FILES['file']['name'];
    $status = "Sedang di cek";
    $id = $_POST['id'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 1044070) {
            move_uploaded_file($file_tmp, '../file/' . $nama);
            $query = ("UPDATE tb_pemesanan SET status='$status', bukti='$nama'
 WHERE id_trans='$id'");
            $result = mysqli_query($connect, $query)or die(mysqli_error());
            if ($query) {
                echo "<script>alert('Gambar Berhasil Diupload!');  window.history.back();</script>";
            } else {
                echo 'GAGAL MENGUPLOAD GAMBAR';
            }
        } else {
            echo 'UKURAN FILE TERLALU BESAR';
        }
    } else {
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    }
}
?>