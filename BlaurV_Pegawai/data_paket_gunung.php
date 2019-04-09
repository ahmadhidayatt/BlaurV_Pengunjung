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
                                <div class="muted pull-left">Data Paket Gunung</div>
                            </div><br/>
							  &nbsp &nbsp <div class="btn-group">
                                        <a href="form_tiket.php"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div> <div class="btn-group">
                                        <a href="form_tiket.php"><button data-toggle="modal" data-target="#exampleModal" class="btn btn-warning">Change Schedule <i class="icon-reload icon-white"></i></button></a>
                                      </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    
  									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
										<thead>
											<tr>
												<th>No.</th>
												<th>ID</th>
												<th>Nama Paket</th>
												<th>Harga</th>
												<th>Status Kuota</th>
												<th>Tanggal Awal Pemesanan</th>
												<th>Tanggal Akhir Pemesanan</th>
												<th>Gambar</th>
												<th>Aksi</th>
												
										</td>
											</tr>
										</thead>
										<?php 
									$query = mysqli_query($connect,"SELECT * FROM tb_paket_gunung order by id_gunung");
									$no =1;
									while($rows = mysqli_fetch_array($query)){ 
									
									?>
										
										<tr class="odd gradeX">
										<td><?php echo $no++;?>.</td>
										<td><?php echo $rows['id_gunung']; ?></td>
										<td><?php echo $rows['nama_paket']; ?></td>
										<td><?php echo $rows['harga']; ?></td>
										<td><?php echo $rows['status_kuota']; ?></td>
										<td><?php echo $rows['tgl_awal']; ?></td>
										<td><?php echo $rows['tgl_akhir']; ?></td>
                                        <td align="center"><img src="images/tiket/<?php echo $rows['gambar_gunung'];?>"  width="100" height="120"> <br/>
										<td>  <a class="btn btn-sm btn-primary" href="data_pembayaran_tolak.php?id_tiket=<?php echo $rows['id_gunung']; ?>"><i class="fa fa-edit"></i> Details</a>
											<a class="btn btn-sm btn-primary" href="edit_tiket.php?id_tiket=<?php echo $rows['id_gunung']; ?>"><i class="fa fa-edit"></i> Edit</a>
										<a class="btn btn-sm btn-primary" href="delete_tiket.php?id_tiket=<?php echo $rows['id_gunung']; ?>" onclick ="return confirm('Anda yakin ingin menghapus ?');" title="Delete"><i class="fa fa-search"</i> Delete</a>
										</td>
											</tr>
											<?php }?>
											
										
									</table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Perubahan Jadwal Perjalanan</h5>
        
      </div>
      <div class="modal-body">  
      	  <form class="booking-form" action="aksi_edit_jadwal.php" method="post" role="form" enctype="multipart/form-data">
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
                                        ?>  &nbsp;
                                         <div class="md-form mb-4">
       
          <input type="date" id="defaultForm-pass" name="tgl_baru" class="form-control validate">
        
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
	  <button class="mb-xs mt-xs mr-xs btn btn-primary" type="submit" name="submit">Simpan<span class="lnr lnr-arrow-right"></span></button>
      </div>
        </div>

    </form>
        </div>
       

       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
                    
           
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