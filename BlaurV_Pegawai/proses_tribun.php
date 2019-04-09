
<?php

include "config/koneksi.php";
// update data Pegawai
	if(isset($_POST['update_administrator']))
	{
	$id_admin			= $_POST['id_admin'];
	$nama				= $_POST['nama'];
	$hp	    	  		= $_POST['hp'];
	$email    			= $_POST['email'];
	$jk	   				= $_POST['jk'];
	$status	 	    	= $_POST['status'];
	$username           = $_POST['username'];
    $password           = $_POST['password'];
	$level           	= $_POST['level'];
		
	$query = mysqli_query($connect,"update tb_admin set id_admin='$id_admin', nama='$nama', hp='$hp', email='$email', jk='$jk', status='$status', username='$username', password='$password', level='$level' where id_admin='$id_admin'");
	header('location:data_administrator.php');
	}
	?>