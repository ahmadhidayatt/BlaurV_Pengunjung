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
                                <div class="muted pull-left">Data Daftar Perjalanan</div>
                            </div><br/>
							  &nbsp &nbsp <div class="btn-group">
                                        
                                      </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    
  									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
										<thead>
											<tr>
												<th>No.</th>
												<th>ID Pengunjung</th>
												<th>Nama Pemesan</th>
												<th>ID Gunung</th>
												<th>ID Boking</th>
												<th>Pengunjung 1</th>
												<th>Pengunjung 2</th>
												<th>Pengunjung 3</th>
												<th>Pengunjung 4</th>
												<th>Tanggal Perjalanan</th>
												
										</td>
											</tr>
										</thead>
										<?php 
										$id_tiket		= $_GET['id_tiket'];
									$query = mysqli_query($connect,"SELECT tb_pengunjung.id_pengunjung, tb_pengunjung.nama, tb_paket_gunung.id_gunung, tb_membayar_pendakian.pendaki1,tb_membayar_pendakian.pendaki2,tb_membayar_pendakian.pendaki3,tb_membayar_pendakian.pendaki4, tb_membayar_pendakian.id_boking, tb_paket_gunung.tgl_akhir FROM tb_pengunjung, tb_paket_gunung, tb_membayar_pendakian WHERE tb_pengunjung.id_pengunjung = tb_membayar_pendakian.id_pengunjung AND tb_paket_gunung.id_gunung = tb_membayar_pendakian.id_gunung and tb_paket_gunung.id_gunung ='$id_tiket'");
									$no =1;
									while($rows = mysqli_fetch_array($query)){ 
									
									?>
										
										<tr class="odd gradeX">
										<td><?php echo $no++;?>.</td>
										<td><?php echo $rows['id_pengunjung']; ?></td>
										<td><?php echo $rows['nama']; ?></td>
										<td><?php echo $rows['id_gunung']; ?></td>
										<td><?php echo $rows['id_boking']; ?></td>
										<td><?php echo $rows['pendaki1']; ?></td>
										<td><?php echo $rows['pendaki2']; ?></td>
										<td><?php echo $rows['pendaki3']; ?></td>
										<td><?php echo $rows['pendaki4']; ?></td>
										<td><?php echo $rows['tgl_akhir']; ?></td>
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