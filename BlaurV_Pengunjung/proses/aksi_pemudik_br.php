<?php
include "../proses/koneksi.php";

//input data Pegawai
if(isset($_POST['register-submit']))
{
	$id_pemudik			= $_POST['id_pemudik'];
	$id_bus				= $_POST['id_bus'];
	$ekstensi_diperbolehkan = array('png', 'jpg', 'pdf');
	$id					= $_POST['id'];
	$photo_KTP			= $_FILES['photo_KTP']['name'];
	$folder				= "../Project/gambarpeserta/";
	$photo_SIMC			= $_FILES['photo_SIMC']['name'];
	$photo_KK			= $_FILES['photo_KK']['name'];
	$jumlah_kel_pemudik	= $_POST['jumlah_kel_pemudik'];
	$nama_pemudik1	   	= $_POST['nama_pemudik1'];
	$nama_pemudik2   	= $_POST['nama_pemudik2'];
	$nama_pemudik3	    = $_POST['nama_pemudik3'];
	$nama_pemudik4	    = $_POST['nama_pemudik4'];
	$alamat_rumah	 	= $_POST['alamat_rumah'];
	$status          	= $_POST['status'];
	
	$x = explode('.', $photo_KTP);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['photo_KTP']['size'];
    $file_tmp = $_FILES['photo_KTP']['tmp_name'];
    
	
	if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 1044070) {
            move_uploaded_file($file_tmp, $folder . $photo_KTP);
	$query = mysqli_query($connect, "insert into tb_pemudik values('$id_pemudik','$id_bus','$id','$photo_KTP','$photo_SIMC','$photo_KK','$jumlah_kel_pemudik','$nama_pemudik1','$nama_pemudik2','$nama_pemudik3','$nama_pemudik4','$alamat_rumah','$status')")or die(mysqli_error());
            if ($query) {
              echo "<script>alert('Daftar Mudik Berhasil');  window.location = '../Project/hal_user_mudik.php'</script>";
            } else {
                echo 'GAGAL Melakukan Pendaftaran';
            }
        } 
		else {
            echo 'UKURAN FILE TERLALU BESAR';
        }
    } else {
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    }
	
	$x = explode('.', $photo_SIMC);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['photo_SIMC']['size'];
    $file_tmp = $_FILES['photo_SIMC']['tmp_name'];
	
	if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 1044070) {
            move_uploaded_file($file_tmp, $folder . $photo_SIMC);
	$query = mysqli_query($connect, "insert into tb_pemudik values('$id_pemudik','$id_bus','$id','$photo_KTP','$photo_SIMC','$photo_KK','$jumlah_kel_pemudik','$nama_pemudik1','$nama_pemudik2','$nama_pemudik3','$nama_pemudik4','$alamat_rumah','$status')")or die(mysqli_error());
            if ($query) {
              echo "<script>alert('Daftar Mudik Berhasil');  window.location = '../Project/hal_user_mudik.php'</script>";
            } else {
                echo 'GAGAL Melakukan Pendaftaran';
            }
        } 
		else {
            echo 'UKURAN FILE TERLALU BESAR';
        }
    } else {
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    }
	
	
	$x = explode('.', $photo_KK);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['photo_KK']['size'];
    $file_tmp = $_FILES['photo_KK']['tmp_name'];
	
	if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 1044070) {
            move_uploaded_file($file_tmp, $folder . $photo_KK);
	$query = mysqli_query($connect, "insert into tb_pemudik values('$id_pemudik','$id_bus','$id','$photo_KTP','$photo_SIMC','$photo_KK','$jumlah_kel_pemudik','$nama_pemudik1','$nama_pemudik2','$nama_pemudik3','$nama_pemudik4','$alamat_rumah','$status')")or die(mysqli_error());
            if ($query) {
              echo "<script>alert('Daftar Mudik Berhasil');  window.location = '../Project/hal_user_mudik.php'</script>";
            } else {
                echo 'GAGAL Melakukan Pendaftaran';
            }
        } 
		else {
            echo 'UKURAN FILE TERLALU BESAR';
        }
    } else {
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    }
	
	$sql = mysqli_query($connect, "SELECT * FROM tb_bus WHERE id_bus='$id_bus'");
	$ambil = mysqli_fetch_array($sql);
	$total = $ambil['kursi'];
	$proses = $total - ($_POST['jumlah_kel_pemudik']);
	
	$query = mysqli_query($connect, "insert into tb_pemudik values('$id_pemudik','$id_bus','$id','$photo_KTP','$photo_SIMC','$photo_KK','$jumlah_kel_pemudik','$nama_pemudik1','$nama_pemudik2','$nama_pemudik3','$nama_pemudik4','$alamat_rumah','$status')");
	
	
	$sql2 = "UPDATE tb_bus set kursi='$proses' WHERE id_bus='$id_bus'";
	$query3 = mysqli_query($connect,$sql2);
	
	header('location:../Project/hal_user_mudik.php');
	
 }
 ?>