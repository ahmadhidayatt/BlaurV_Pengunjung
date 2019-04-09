<?php
include "../proses/koneksi.php";

//input data Pegawai
if(isset($_POST['register-submit']))
{
	$id_pemudik			= $_POST['id_pemudik'];
	$id_bus				= $_POST['id_bus'];
	$id					= $_POST['id'];
	$photo_KTP			= $_FILES['photo_KTP']['name'];
	$folder				= "../Project/gambarpeserta/";
	$photo_SIMC			= $_FILES['photo_SIMC']['name'];
	$folder				= "../Project/gambarpeserta/";
	$photo_KK			= $_FILES['photo_KK']['name'];
	$folder				= "../Project/gambarpeserta/";
	$jumlah_kel_pemudik	= $_POST['jumlah_kel_pemudik'];
	$nama_pemudik1	   	= $_POST['nama_pemudik1'];
	$nama_pemudik2   	= $_POST['nama_pemudik2'];
	$nama_pemudik3	    = $_POST['nama_pemudik3'];
	$nama_pemudik4	    = $_POST['nama_pemudik4'];
	$alamat_rumah	 	= $_POST['alamat_rumah'];
	$tempat_berangkat	= $_POST['tempat_berangkat'];
	$jam_berangkat	 	= $_POST['jam_berangkat'];
	$status          	= $_POST['status'];
	
	if(move_uploaded_file($_FILES['photo_KTP']['tmp_name'], $folder.$photo_KTP))
	{
	$query = mysqli_query($koneksi, "insert into tb_pemudik values('$id_pemudik','$id_bus','$id','$photo_KTP','$photo_SIMC','$photo_KK','$jumlah_kel_pemudik','$nama_pemudik1','$nama_pemudik2','$nama_pemudik3','$nama_pemudik4','$alamat_rumah','TAMAN MINI INDONESIA INDAH','08.00,'$status')");
	header('location:../Project/hal_user_mudik.php');
	}
	
	if(move_uploaded_file($_FILES['photo_SIMC']['tmp_name'], $folder.$photo_SIMC))
	{
	$query = mysqli_query($koneksi, "insert into tb_pemudik values('$id_pemudik','$id_bus','$id','$photo_KTP','$photo_SIMC','$photo_KK','$jumlah_kel_pemudik','$nama_pemudik1','$nama_pemudik2','$nama_pemudik3','$nama_pemudik4','$alamat_rumah','TAMAN MINI INDONESIA INDAH','08.00','$status')");
	header('location:../Project/hal_user_mudik.php');
	}
	
	if(move_uploaded_file($_FILES['photo_KK']['tmp_name'], $folder.$photo_KK))
	{
	$query = mysqli_query($koneksi, "insert into tb_pemudik values('$id_pemudik','$id_bus','$id','$photo_KTP','$photo_SIMC','$photo_KK','$jumlah_kel_pemudik','$nama_pemudik1','$nama_pemudik2','$nama_pemudik3','$nama_pemudik4','$alamat_rumah','TAMAN MINI INDONESIA INDAH','08.00','$status')");
	header('location:../Project/hal_user_mudik.php');
	}
	
	
	
	$sql = mysqli_query($connect, "SELECT * FROM tb_bus WHERE id_bus='$id_bus'");
	$ambil = mysqli_fetch_array($sql);
	$total = $ambil['kursi'];
	$proses = $total - ($_POST['jumlah_kel_pemudik']);
	
	$query = mysqli_query($connect, "insert into tb_pemudik values('$id_pemudik','$id_bus','$id','$photo_KTP','$photo_SIMC','$photo_KK','$jumlah_kel_pemudik','$nama_pemudik1','$nama_pemudik2','$nama_pemudik3','$nama_pemudik4','$alamat_rumah','TAMAN MINI INDONESIA INDAH','08.00','$status')");
	
	
	$sql2 = "UPDATE tb_bus set kursi='$proses' WHERE id_bus='$id_bus'";
	$query3 = mysqli_query($connect,$sql2);
	
	header('location:../Project/hal_user_mudik.php');
	
 }
 ?>