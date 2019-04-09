	<?php

include "config/koneksi.php";

	if($_GET['id_tribun'])
	{
 	$id_tribun			= $_GET['id_tribun'];
	$query				= mysqli_query($connect,"delete from tb_kategori_tribun where id_tribun='$id_tribun'");
	header('location:data_tribun.php');
	}
	?>