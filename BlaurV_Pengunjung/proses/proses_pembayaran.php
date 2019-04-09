<?php
include "./koneksi.php";
//input data Pegawai
if(isset($_POST['submit']))
{
	$id_pembayaran	= $_POST['id_pembelian'];
	$tgl_transfer	= date('Y-m-d H:i:s');
	$id_gunung		= $_POST['id_gunung'];
	$foto_struk		= $_FILES['foto_struk']['name'];
	$surat_dokter		= $_FILES['surat_dokter']['name'];
	$folder				= "../Bukti TF/";
	
	
	
	if(move_uploaded_file($_FILES['foto_struk']['tmp_name'], $folder.$foto_struk))
	{	
	$query = mysqli_query($connect, "UPDATE `tb_membayar_pendakian` SET `status_pembayaran` = 'Menunggu Konfirmasi', `tgl_pembayaran` = '$tgl_transfer', `bukti_transfer` = '$foto_struk' , `surat_dokter` = '$surat_dokter' WHERE `tb_membayar_pendakian`.`id_boking` = '$id_pembayaran'");

	}else if(move_uploaded_file($_FILES['foto_struk']['surat_dokter'], $folder.$surat_dokter))
	{	
	$query = mysqli_query($connect, "UPDATE `tb_membayar_pendakian` SET `status_pembayaran` = 'Menunggu Konfirmasi', `tgl_pembayaran` = '$tgl_transfer', `bukti_transfer` = '$foto_struk' , `surat_dokter` = '$surat_dokter' WHERE `tb_membayar_pendakian`.`id_boking` = '$id_pembayaran'");

	}


	$sql = mysqli_query($connect, "SELECT * FROM `tb_paket_gunung` WHERE id_gunung = '$id_gunung'");
	$ambil = mysqli_fetch_array($sql);
	$total = $ambil['status_kuota'];
	$proses = $total - ($_POST['jml_pendaki']);
	
	$sql2 = "UPDATE `tb_paket_gunung` SET `status_kuota` = '$proses' WHERE `tb_paket_gunung`.`id_gunung` = '$id_gunung'";
	$query3 = mysqli_query($connect,$sql2);

	 if ($query3) {
        echo "<script>alert('Data Berhasil Dikirim, terima kasih atas partisipasinya silahkan tunggu respond dari kami');  window.history.back();</script>";
    } else {
        echo 'GAGAL MENGUPLOAD GAMBAR';
    }
	
	
 }
?>