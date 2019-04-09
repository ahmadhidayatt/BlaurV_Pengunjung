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
		<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
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
                                <div class="muted pull-left">Data Pegawai</div>
                            </div><br/>
							  &nbsp &nbsp <div class="btn-group">
                                        <a href="form_administrator.php"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    
  									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
										<thead>
											<tr>
												<th>No.</th>
												<th>ID</th>
												<th>Username</th>
												<th>Level</th>
												<th>Aksi</th>
												
											</tr>
										</thead>
										<?php 
									$query = mysqli_query($connect,"SELECT * FROM tb_pegawai order by id_pegawai");
									$no =1;
									while($rows = mysqli_fetch_array($query)){ 
									
									?>
										
										<tr class="odd gradeX">
										<td><?php echo $no++;?>.</td>
										<td><?php echo $rows['id_pegawai']; ?></td>
                                        <td><?php echo $rows['username']; ?> </td>
										<td><?php echo $rows['level']; ?> </td>
										<td> <a class="btn btn-sm btn-primary" href="edit_admin.php?id_admin=<?php echo $rows['id_pegawai']; ?>"><i class="fa fa-edit"></i> Edit</a>
										<a class="btn btn-sm btn-primary" href="delete_admin.php?id_admin=<?php echo $rows['id_pegawai']; ?>" onclick ="return confirm('Anda yakin ingin menghapus ?');" title="Delete"><i class="fa fa-search"</i> Delete</a>
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
		<script type="text/javascript" src="DataTables/datatables.min.js"></script>
        <script>
        $(function() {
            
        });
        </script>
		</body>
		</html>