<!DOCTYPE html>
<html lang="en">
<?php 
include"config/koneksi.php";

date_default_timezone_set('Asia/Jakarta'); 
ini_set('display_errors','Off');

header("Content-Type: application/force-download"); 
header("Cache-Control: no-cache, must-revalidate"); 
header("Expires: Sat, 26 Jul 2010 05:00:00 GMT"); 
header("content-disposition: attachment;filename=Laporan_pendakian".".xls");



?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>
	<link rel="shortcut icon" href="../asset/img/icon.png" />
	
</head>

<body>

                            <table border="1" style="border-collapse:collapse" align="center" cellpadding="3" cellspacing="3" width="1200">
								<tr>
									<TD ALIGN="CENTER" colspan="8"><FONT SIZE="4"><b>E_trip </b><BR>
                                        
                                    </TD>
                                </tR>
                                    <tr>
									<td colspan="8" align="center"><h1 align="center">LAPORAN DATA</h1><b>Perjalanan Pada Pulau<i><?php echo $_POST['id_paket'];?></b></td><BR><BR>
								</tr>
								<thead>
											<tr>
												<th>No.</th>
												<th>ID Boking</th>
												<th>ID Gunung</th>
												<th>ID Pengunjung</th>
												<th>ID Pegawai</th>
												<th>Status Pembayaran</th>
												<th>Tanggal Pembayaran</th>
												<th>Total Harga</th>
												
										</td>
											</tr>
										</thead>
										<?php 
										$id_paket	= $_POST['id_paket'];
									$query = mysqli_query($connect,"SELECT * FROM tb_membayar_pendakian where id_gunung = '$id_paket' and status_pembayaran = 'Menunggu Perjalanan'");
									$no =1;
									while($rows = mysqli_fetch_array($query)){ 
									
									?>
										
										<tr class="odd gradeX">
										<td><?php echo $no++;?>.</td>
										<td><?php echo $rows['id_boking']; ?></td>
										<td><?php echo $rows['id_gunung']; ?></td>
										<td><?php echo $rows['id_pengunjung']; ?></td>
										<td><?php echo $rows['id_pegawai']; ?></td>
										<td><?php echo $rows['status_pembayaran']; ?></td>
										<td><?php echo $rows['tgl_pembayaran']; ?></td>
										<td><?php echo $rows['total_harga']; ?></td>
                                       
											</tr>
											<?php }?>
											<tr>
											

											<?php 
											$query = mysqli_query($connect,"SELECT sum(total_harga) as total FROM tb_membayar_pendakian where id_gunung = '$id_paket' and status_pembayaran = 'Menunggu Perjalanan'");
											$rows = mysqli_fetch_array($query);
											 ?>
											 <th></th>
											 <th></th>
											 <th></th>
											 <th></th>
											 <th></th>
											 <th></th>
											 <th></th>
											<th>Total Pendapatan</th>
											</tr>
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td>
												<?php echo $rows['total']; ?>
												</td>
										</tr>
							</table>
</body>

</html>
