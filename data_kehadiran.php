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
												<th>Tgl_Pertandingan</th>
												<th>Tgl_Selesai</th>
												<th>Jam_Pertandingan</th>
												<th>Tim_Tuan_Rumah</th>
												<th>Tim_Tamu</th>
												<th>Lokasi_Pertandingan</th>
												<th>Status Tiket</th>
												<th>Aksi</th>
												
										</td>
											</tr>
										</thead>
										<?php 
									$query = mysqli_query($connect,"SELECT * FROM tb_tiket order by id_tiket desc");
									$no =1;
									while($rows = mysqli_fetch_array($query)){ 
									
									?>
										
										<tr class="odd gradeX">
										<td><?php echo $no++;?>.</td>
										<td><?php echo $rows['id_tiket']; ?></td>
										<td><?php echo $rows['tgl_pertandingan']; ?></td>
										<td><?php echo $rows['tgl_setelah_pertandingan']; ?></td>
										<td><?php echo $rows['jam_pertandingan']; ?></td>
                                        <td align="center"><img src="images/tiket/<?php echo $rows['logo_tuanrumah'];?>"  width="100" height="120"> <br/>
										<?php echo $rows['tim_tuanrumah']; ?></td>
										<td align="center"><img src="images/tiket/<?php echo $rows['logo_tamu'];?>"  width="80" height="120" class="img-circle"/> <br/>
										<?php echo $rows['tim_tamu']; ?> </td>
										<td><?php echo $rows['lokasi_pertandingan']; ?> </td>
										<td><?php echo $rows['status_tiket']; ?></td>
										<td>
										<a class="btn btn-sm btn-primary" href="detail_kehadiran.php?id_tiket=<?php echo $rows['id_tiket']; ?>"><i class="fa fa-edit"></i> Data Kehadiran</a>
										</td>
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