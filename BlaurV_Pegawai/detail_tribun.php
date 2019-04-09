<!DOCTYPE html>
<html class="no-js">
        <?php 
date_default_timezone_set('Asia/Jakarta');
include"config/koneksi.php";




$id_tiket		= $_GET['id_tiket'];
$query = mysqli_query($connect,"SELECT * FROM tb_tiket");
$rows = mysqli_fetch_array($query) 	
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
                                <div class="muted pull-left">Data Kategori Tribun Penonton</div>
                            </div><br/>
							  &nbsp &nbsp <div class="btn-group">
                                        <a href="form_tribun.php?id_tiket=<?php echo $rows['id_tiket']; ?>""><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    
  									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
										<thead>
											<tr>
												<th>No.</th>
												<th>ID</th>
												<th>ID Tiket</th>
												<th>Nama Tribun</th>
												<th>Jumlah Kuota Tribun</th>
												<th>Harga Tiket</th>
												<th>aksi</th>
											</tr>
										</thead>
										<?php
									$id_tiket		= $_GET['id_tiket'];	
									$query = mysqli_query($connect,"SELECT tb_tiket.id_tiket, tb_kategori_tribun.id_tribun, tb_kategori_tribun.id_tiket, tb_kategori_tribun.nama_tribun, tb_kategori_tribun.kuota_tribun,tb_kategori_tribun.harga from tb_tiket, tb_kategori_tribun WHERE tb_tiket.id_tiket = tb_kategori_tribun.id_tiket AND  tb_tiket.id_tiket='$id_tiket' ");
									$no =1;
									while($rows = mysqli_fetch_array($query)){ 
									
									?>
										
										<tr class="odd gradeX">
										<td><?php echo $no++;?>.</td>
										<td><?php echo $rows['id_tribun']; ?></td>
										<td><?php echo $rows['id_tiket']; ?></td>
										<td><?php echo $rows['nama_tribun']; ?></td>
										<td><?php echo number_format("".$rows['kuota_tribun']."",0); ?></td>
										<td>Rp.<?php echo number_format("".$rows['harga']."",0); ?></td>
										<td> <a class="btn btn-sm btn-primary" href="edit_tribun.php?id_tribun=<?php echo $rows['id_tribun']; ?>"><i class="fa fa-edit"></i> Edit</a>
										<a class="btn btn-sm btn-primary" href="delete_tribun.php?id_tribun=<?php echo $rows['id_tribun']; ?>" onclick ="return confirm('Anda yakin ingin menghapus ?');" title="Delete"><i class="fa fa-search"</i> Delete</a>
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