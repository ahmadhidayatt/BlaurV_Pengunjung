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
                                <div class="muted pull-left">Data Customer Verifikasi</div>
                            </div><br/>
							  &nbsp &nbsp <div class="btn-group">
                                        
                                      </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    
  									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
										<thead>
											<tr>
												<th>No.</th>
												<th>ID</th>
												<th>Kode Pemesanan</th>
												<th>Tanggal Transfer</th>
												<th>Nama Bank</th>
												<th>Nama Pemilik</th>
												<th>Jumlah Transfer</th>
												<th>Bukti Pembayaran</th>
												<th>Status Pembayaran</th>
												
												
												
												
												
											</tr>
										</thead>
										<?php 
									$id_tiket		= $_GET['id_tiket'];
									$query = mysqli_query($connect,"SELECT tb_tiket.id_tiket, tb_tiket.tgl_pertandingan, tb_tiket.jam_pertandingan, tb_tiket.tim_tuanrumah, tb_tiket.tim_tamu, tb_tiket.lokasi_pertandingan, tb_transaksi.id_pembelian, tb_transaksi.id_tiket, tb_transaksi.id_customer, tb_transaksi.id_tribun, tb_transaksi.nama_pemesan, tb_transaksi.no_ktp_pemesan, tb_transaksi.no_hp, tb_transaksi.email, tb_transaksi.jumlah_beli, tb_transaksi.nama_penonton1, tb_transaksi.nama_penonton2, tb_transaksi.nama_penonton3, tb_transaksi.nama_penonton4, tb_transaksi.harga, tb_transaksi.jumlah_harga, tb_transaksi.status_pembelian, tb_pembayaran.id_pembayaran, tb_pembayaran.id_pembelian, tb_pembayaran.tgl_transfer, tb_pembayaran.nama_bank, tb_pembayaran.nama_pemilik_bank, tb_pembayaran.jumlah_tf, tb_pembayaran.foto_struk FROM tb_transaksi, tb_tiket, tb_pembayaran WHERE tb_transaksi.id_tiket=tb_tiket.id_tiket AND tb_pembayaran.id_pembelian=tb_transaksi.id_pembelian AND tb_tiket.id_tiket='$id_tiket' AND tb_transaksi.status_pembelian != 'Belum Diverifikasi'");
									$no =1;
									while($rows = mysqli_fetch_array($query)){ 
									
									?>
										
										<tr class="odd gradeX">
										<td><?php echo $no++;?>.</td>
										<td><?php echo $rows['id_pembayaran']; ?></td>
										<td><?php echo $rows['id_pembelian']; ?></td>
										<td><?php echo $rows['tgl_transfer']; ?></td>
										<td><?php echo $rows['nama_bank']; ?></td>
                                        <td><?php echo $rows['nama_pemilik_bank']; ?> </td>
										<td><?php echo $rows['jumlah_tf']; ?> </td>
										<td><?php echo $rows['status_pembelian']; ?> </td>
										<td align="center"><img src="../GoTicket_user/Bukti TF/<?php echo $rows['foto_struk'];?>"  width="100" height="120">
									
										
										</td>
											</tr>
											<?php }?>
											
										
									</table>

									<?php 
									$id_tiket		= $_GET['id_tiket'];
									$query2 = mysqli_query($connect,"SELECT tb_tiket.id_tiket, tb_tiket.tgl_pertandingan, tb_tiket.jam_pertandingan, tb_tiket.tim_tuanrumah, tb_tiket.tim_tamu, tb_tiket.lokasi_pertandingan, tb_transaksi.id_pembelian, tb_transaksi.id_tiket, tb_transaksi.id_customer, tb_transaksi.id_tribun, tb_transaksi.nama_pemesan, tb_transaksi.no_ktp_pemesan, tb_transaksi.no_hp, tb_transaksi.email, tb_transaksi.jumlah_beli, tb_transaksi.nama_penonton1, tb_transaksi.nama_penonton2, tb_transaksi.nama_penonton3, tb_transaksi.nama_penonton4, tb_transaksi.harga, sum(tb_transaksi.jumlah_harga)as total, tb_transaksi.jumlah_harga, tb_transaksi.status_pembelian, tb_pembayaran.id_pembayaran, tb_pembayaran.id_pembelian, tb_pembayaran.tgl_transfer, tb_pembayaran.nama_bank, tb_pembayaran.nama_pemilik_bank, tb_pembayaran.jumlah_tf, tb_pembayaran.foto_struk FROM tb_transaksi, tb_tiket, tb_pembayaran WHERE tb_transaksi.id_tiket=tb_tiket.id_tiket AND tb_pembayaran.id_pembelian=tb_transaksi.id_pembelian AND tb_tiket.id_tiket='$id_tiket' AND tb_transaksi.status_pembelian != 'Belum Diverifikasi'");
									$rows2 = mysqli_fetch_array($query2)
									?>
									</table>
									  <div class="text-right" style="margin-right: 30px; margin-top: 20px;">
                                        <h2><label for="kode_kar">Total</label>: Rp.<?php echo number_format($rows2['total'], 2, ",", "."); ?></h2>
                                    </div> 
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