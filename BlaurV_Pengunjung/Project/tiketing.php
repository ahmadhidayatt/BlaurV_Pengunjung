<?php
session_start();

//cek level user

   include "../proses/koneksi.php";
    $username = $_SESSION['username'];
    $nama = $_SESSION['nama'];
	
    $counter = 1;
	?>
	
    <html>
        <head>
            <title>E-TRIP | OPEN TRIP PENDAKIAN GUNUNG</title>
            <link rel="shortcut icon" href="images/logo.png">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
                function hideURLbar(){ window.scrollTo(0,1); } </script>
            <!-- //for-mobile-apps -->
            <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
            <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
            <!-- js -->
            <script src="js/jquery-1.11.1.min.js"></script>
            <!-- //js -->
            <!-- login-pop-up -->
            <script src="js/menu_jquery.js"></script>
            <!-- //login-pop-up -->
            <!-- animation-effect -->
            <link href="css/animate.min.css" rel="stylesheet"> 
            <script src="js/wow.min.js"></script>
            <script src="js/maps_search.js"></script>
            <script>
                new WOW().init();
            </script>
            <!-- //animation-effect -->
            <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
            <link href='//fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
        </head>


        <body class="nav-md">
            <div class="container body">
                <div class="main_container">
                    <!--side nav menu-->

                    <!-- /top navigation -->
               
                <!-- page content -->
                <div class="right_col" role="main">


                    <!-- /top tiles -->
                    <div class="row">
                        <div style="margin-top: 40px;" class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <TABLE WIDTH="100%">
                                    <TR>
									<?php
													$id_pembelian= $_GET['id_pembelian'];
                                                    $query = ("SELECT tb_pengunjung.nama, tb_pengunjung.id_pengunjung, tb_pengunjung.email, tb_pengunjung.no_ktp, tb_membayar_pendakian.id_boking, tb_paket_gunung.nama_paket,tb_paket_gunung.id_gunung, tb_paket_gunung.tgl_akhir,tb_membayar_pendakian.total_harga, tb_membayar_pendakian.pendaki1,tb_membayar_pendakian.jumlah_pendaki, tb_membayar_pendakian.pendaki2,tb_membayar_pendakian.pendaki3,tb_membayar_pendakian.pendaki4, tb_membayar_pendakian.status_pembayaran FROM tb_pengunjung, tb_paket_gunung, tb_membayar_pendakian WHERE tb_pengunjung.id_pengunjung = tb_membayar_pendakian.id_pengunjung AND tb_paket_gunung.id_gunung = tb_membayar_pendakian.id_gunung and tb_membayar_pendakian.id_boking='$id_pembelian'");
                                                    $result = mysqli_query($connect, $query)or die(mysqli_error());
                                                    $data = mysqli_fetch_array($result);
                                                    ?>
									<TD ALIGN="CENTER" WIDTH="20%"></TD>
									
                                       
                                        <TD ALIGN="CENTER" WIDTH="60%"><FONT SIZE="4"><b>TIKET <?php echo $data['nama_paket']; ?> </b><BR><br/>
                                            
                                            <FONT SIZE="4"><B><HR>
                                                <FONT SIZE="5"><B>Tanggal :<?php echo $data['tgl_akhir']; ?>
                                                    </TD>
													<TD ALIGN="CENTER" WIDTH="20%"></TD>
                                                    <TD ALIGN="CENTER" WIDTH="20%"></TD>
                                                    </TR>
                                                    </TABLE>
                                                   
													<br/>
                                                    <form action="proses/.php" method="post">
                                                        <table class="table table-condensed">
                                                            <tr>
                                                                <td><h4><label for="kode_kar">Kode Pemesan</label> : <?php echo $data['id_boking']; ?></h4></td>
                                                               
                                                            </tr>

                                                        </table><hr>
                                                        <div class="text-left" style="margin-left: 7px;">
                                                            
                                                            <h4><label for="kode_kar">Lokasi </label> : <?php echo $data['nama_paket']; ?></h4><br/>
															 <h4><label for="kode_kar">Nama Pemesan </label> : <?php echo $data['nama']; ?></h4><br/>
															 <h4><label for="kode_kar">No Identitas </label> : <?php echo $data['no_ktp']; ?></h4>
                                                        </div>
                                                        <hr>
                                                        <table id="datatable" class="table table-striped table-bordered">
                                                            <thead >
                                                                <tr>
                                                                   
											<th>Jumlah Pengunjung</th>
											<th>Nama Pengunjung</th>
											
										
											
											
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                               
													<tr>
										
										
										<td><?php echo $data['jumlah_pendaki']; ?> Orang</td>
										<td><?php echo $data['pendaki1']; ?> <br/><br/><?php echo $data['pendaki2']; ?> <br/><br/><?php echo $data['pendaki3']; ?></br><br/> <?php echo $data['pendaki4']; ?></td>
										
										
										<!--<td><a class="btn btn-sm btn-primary" href="fungsi_download.php?file=<?php echo $rows['photo_KTP']; ?>"><i class="fa fa-download"></i> Download</a></td>
                                       	<td><a class="btn btn-sm btn-primary" href="fungsi_download.php?file=<?php echo $rows['photo_SIMC']; ?>"><i class="fa fa-download"></i> Download</a></td>
										<td><a class="btn btn-sm btn-primary" href="fungsi_download.php?file=<?php echo $rows['photo_KK']; ?>"><i class="fa fa-download"></i> Download</a></td>-->
										
										
                                                                    </tr>
                                                                    <?php
                                                                
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                      
                                                       <!-- <div class="text-Left">
                                                           
															<br />
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Menyetujui
                                                            <br />
                                                            <br />
                                                            
                                                            <br />
                                                            <p style="margin-left: 50px">
                                                                Pengelola Stadion Benteng TANGERANG
                                                               </p>                                             
                                                        </div>-->

                                                        <br>
                                                        <br>
                                                        <div class="text-right">
                                                            <a href="#" onclick="  window.print();
                                                return true"  hidden id="tombol" class="btn btn-sm btn-primary" target="_blank">Print  <i class="fa fa-print"></i></a>
                                                            <a href="hal_cetak_etiket.php"   hidden id="tombol" class="btn btn-sm btn-primary">Kembali  <i class="fa fa-backward"></i></a>
                                                        </div>
                                                    </form>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    </div>



                                                    <!-- footer content -->
                                                    <!-- /footer content -->
                                                    </div>
                                                    </div>

                                                    <!-- jQuery -->
                                                    <script src="../vendors/jquery/dist/jquery.min.js"></script>
                                                    <!-- Bootstrap -->
                                                    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                                                    <!-- FastClick -->
                                                    <script src="../vendors/fastclick/lib/fastclick.js"></script>
                                                    <!-- NProgress -->
                                                    <script src="../vendors/nprogress/nprogress.js"></script>
                                                    <!-- iCheck -->
                                                    <script src="../vendors/iCheck/icheck.min.js"></script>
                                                    <!-- Custom Theme Scripts -->
                                                    <script src="../build/js/custom.min.js"></script>
													
                                                    <style>
                                                        @media print{
                                                            #tombol{
                                                                display:none;
                                                            }
                                                        }</style>
                                                    </body>
                                                    </html>
