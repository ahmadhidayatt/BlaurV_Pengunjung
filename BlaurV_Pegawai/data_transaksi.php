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
                                        <div class="btn-group">
                                            <form class="booking-form" action="laporan_pendakian.php" method="post" role="form" enctype="multipart/form-data">
                                             <?php
                         $query = ("SELECT * from tb_paket_gunung ");
                                     $result = mysqli_query($connect, $query)or die(mysqli_error());
                                     
                                  $jsArray = "var jp = new Array();\n";
                                     echo '<select class="form-control mt-20" name="id_paket" onchange="changeValue(this.value)" required>';
                                    echo '<option value="" > -- Pilih Tanggal Paket --</option>';
                                  while ($row = mysqli_fetch_array($result)) {
                                                   
                                     echo '<option value="' . $row['id_gunung'] . '">'. $row['nama_paket'] . ' - ' . $row['tgl_akhir'] . ''.'</option>';
                                      $jsArray .= "jp['" . $row[''] . "'] = {name:'" . addslashes($row['']) . "' };\n";
                                            }

                                            echo '</select>';
                                        ?> 
                                        <a style="margin-left: 10px;" href=""><button class="btn btn-success">Export <i class=""></i></button></a>
                                    </form>
                                      </div>
                                      </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    
  									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
										<thead>
											<tr>
												<th>No.</th>
												<th>ID Boking</th>
												<th>ID pulau</th>
												<th>ID Pengunjung</th>
												<th>ID Pegawai</th>
												<th>Status Pembayaran</th>
												<th>Tanggal Pembayaran</th>
												<th>Total Harga</th>
												
										</td>
											</tr>
										</thead>
										<?php 
									$query = mysqli_query($connect,"SELECT * FROM tb_membayar_pendakian order by id_boking desc");
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