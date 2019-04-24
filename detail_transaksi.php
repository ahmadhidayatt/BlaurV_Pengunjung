<!DOCTYPE html>
<html class="no-js">
        <?php 
date_default_timezone_set('Asia/Jakarta');
include"config/koneksi.php";




?>
    <head>
        <title>Admin Home Page</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
        <?php 
		include "navbar_user.php";
	?>
	<div class="span9" id="content">
	  <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Data Transaksi</div>
                            </div><br/>
							  &nbsp &nbsp <div class="btn-group">
                                        
                                      </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    
  									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
										<thead>
											<tr>
											<th>No</th>
                                            <th>Kode Pemesanan</th>
											<th>Nama Pemesan</th>
											<th>Jumlah Tiket</th>
                                            <th>Nama Penonton</th>
											<th>Tim Bertanding</th>
											<th>Lokasi Pertandingan</th>
											<th>Tanggal Pertandingan</th>
											<th>Jam Pertandingan</th>
											<th>Nama Tribun</th>
                                            <th>Jumlah Harga </th>
											<th>Status Pemesanan</th>
												
											</tr>
										</thead>
										<?php 
									$id_tiket		= $_GET['id_tiket'];
									$query = mysqli_query($connect,"SELECT tb_transaksi.id_pembelian, tb_transaksi.id_tiket, tb_transaksi.id_customer, tb_transaksi.id_tribun, tb_transaksi.nama_pemesan, tb_transaksi.no_ktp_pemesan, tb_transaksi.no_hp, tb_transaksi.email, tb_transaksi.jumlah_beli, tb_transaksi.nama_penonton1, tb_transaksi.nama_penonton2, tb_transaksi.nama_penonton3, tb_transaksi.nama_penonton4, tb_transaksi.harga, tb_transaksi.jumlah_harga, tb_transaksi.status_pembelian, tb_tiket.id_tiket, tb_tiket.tgl_pertandingan, tb_tiket.jam_pertandingan, tb_tiket.tim_tuanrumah, tb_tiket.tim_tamu, tb_tiket.lokasi_pertandingan, tb_kategori_tribun.id_tribun, tb_kategori_tribun.id_tiket, tb_kategori_tribun.nama_tribun FROM tb_transaksi, tb_tiket, tb_kategori_tribun WHERE tb_transaksi.id_tiket=tb_tiket.id_tiket AND tb_kategori_tribun.id_tribun=tb_transaksi.id_tribun AND tb_transaksi.id_tiket='$id_tiket' GROUP by tb_transaksi.id_pembelian DESC");
									$no =1;
									while($rows = mysqli_fetch_array($query)){ 
									
									?>
										
										<tr>
										<td><?php echo $no++;?>.</td>
										<td><?php echo $rows['id_pembelian']; ?></td>
										<td><?php echo $rows['nama_pemesan']; ?></td>
										<td><?php echo $rows['jumlah_beli']; ?></td>
										<td><?php echo $rows['nama_penonton1']; ?><br/><?php echo $rows['nama_penonton2']; ?><br/><?php echo $rows['nama_penonton3']; ?><br/><?php echo $rows['nama_penonton4']; ?></td>
										<td><?php echo $rows['tim_tuanrumah']; ?> VS <?php echo $rows['tim_tamu']; ?></td></td>
										<td><?php echo $rows['lokasi_pertandingan']; ?></td>
										<td><?php echo $rows['tgl_pertandingan']; ?></td>
										<td><?php echo $rows['jam_pertandingan']; ?></td>
										<td><?php echo $rows['nama_tribun']; ?></td>
										<td><?php echo number_format("".$rows['jumlah_harga']."",0); ?></td>
										<td><?php echo $rows['status_pembelian']; ?></td>
										 <?php }?>
										
										
									</tr>
										
									</table>
									 
                                   
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    
           
            <hr>
            <footer>
                <p>&copy; Vincent Gabriel 2013</p>
            </footer>
        </div>
        
        <script src="vendors/jquery-1.9.1.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>
        <script src="assets/scripts.js"></script>
        <script src="assets/DT_bootstrap.js"></script>
        <script>
        $(function() {
            
        });
        </script>
		</body>
		</html>