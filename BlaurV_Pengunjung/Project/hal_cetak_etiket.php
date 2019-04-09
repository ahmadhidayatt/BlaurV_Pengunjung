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
            <title>BLAUR VACATION | Perjalanan Pulau Seribu</title>
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

        <body>
            <!-- header -->
            <div class="header-top">
            </div>
            <?php include './navbar_user.php'; ?>
        <?php  ?>
        <!-- //header -->
        <!-- banner -->
       
        <script src="https://use.fontawesome.com/c560c025cf.js"></script>
         <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
						<!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                            <!--<div class="table-responsive">-->
                                <table class="table table-striped table-hover table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											<th>No</th>
                                            <th>Kode Booking</th>
                                            <th>Nama Pemesan</th>
                                            <th>Nama Pengunjung</th>
                                            <th>Nama Paket</th>
                                            <th>Tanggal Berkumpul</th>
                                            <th>Total Harga </th>
                                            <th>Status Pemesanan</th>
											<th>Cetak</th>
											
											
                                           
                                        </tr>
                                    </thead>
									<?php 
                                    $query = mysqli_query($connect,"SELECT tb_pengunjung.nama, tb_pengunjung.id_pengunjung, tb_pengunjung.email, tb_membayar_pendakian.id_boking, tb_paket_gunung.nama_paket,tb_paket_gunung.id_gunung, tb_paket_gunung.tgl_akhir,tb_membayar_pendakian.total_harga, tb_membayar_pendakian.pendaki1, tb_membayar_pendakian.pendaki2,tb_membayar_pendakian.pendaki3,tb_membayar_pendakian.pendaki4, tb_membayar_pendakian.status_pembayaran FROM tb_pengunjung, tb_paket_gunung, tb_membayar_pendakian WHERE tb_pengunjung.id_pengunjung = tb_membayar_pendakian.id_pengunjung AND tb_paket_gunung.id_gunung = tb_membayar_pendakian.id_gunung and tb_pengunjung.id_pengunjung='$username' AND status_pembayaran = 'Menunggu Perjalanan'");
                                    $no =1;
                                      if (mysqli_num_rows($query) > 0) { 
                                    while($rows = mysqli_fetch_array($query)){ 
                                    
                                    ?>
									<tr>
										<td><?php echo $no++;?>.</td>
                                        <td><?php echo $rows['id_boking']; ?></td>
                                        <td><?php echo $rows['nama']; ?></td>
                                        <td><?php echo $rows['pendaki1']; ?><br/>
                                            <?php echo $rows['pendaki2']; ?><br/>
                                            <?php echo $rows['pendaki3']; ?><br/>
                                            <?php echo $rows['pendaki4']; ?></td>
                                        <td><?php echo $rows['nama_paket']; ?></td></td>
                                        <td><?php echo $rows['tgl_akhir']; ?></td>
                                        <td><?php echo number_format("".$rows['total_harga']."",0); ?></td>
                                        <td><?php echo $rows['status_pembayaran']; ?></td>
										<td><a class="btn btn-sm btn-primary" href="tiketing.php?id_pembelian=<?php echo $rows['id_boking']; ?>"><i class="fa fa-print"></i> Print</a></td>
										
										
									</tr>
									<?php }
									   } else { 
                          echo '<script language="javascript">';
							echo 'alert("No Result")';
							echo '</script>';
							echo ("<script>location.href='data_transaksi_masuk.php'</script>");

							}
									
                        
									?>
									
                    <!-- /.panel -->
                </div>

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Upload bukti transfer</h4>
                    </div>
                    <div class="modal-body">
                        <?php
                        $tampil2 = ("select * from tb_pemesanan where nama='$nama'");
                        $result2 = mysqli_query($connect, $tampil2)or die(mysqli_error());
                        $row2 = mysqli_fetch_array($result2)
                        ?>
                        <form action="../proses/uploadbukti.php" method="post" enctype="multipart/form-data" >
                            <div class="form-group">
                                <label for="exampleInputEmail1">ID Transaksi:</label>
                                <input name="id" type="text"  value="<?php echo $row2['id_trans'] ?>" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Lapangan :</label>
                                <input name="namalap" type="text" value="<?php echo $row2['nama_lapangan'] ?>" class="form-control"  value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Status Pemesan :</label>
                                <input name="status" value="<?php echo $row2['status'] ?>" type="text" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Lama Main :</label>
                                <input name="status" type="number" class="form-control" >
                            </div>
                            <input type="file" name="file" required><br>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="submit" name="upload" id="register-submit" class="btn btn-lg btn-primary" value="Upload">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>-->
        <!-- //popular -->
        <!-- footer -->
        <?php include './footer.php'; ?>
        <!-- //footer -->
        <!-- for bootstrap working -->
        <script src="js/bootstrap.js"></script>
        <!-- //for bootstrap working -->
        <script>
                $(document).on("click", "#test-element", function () {
                    alert("click bound to document listening for #test-element");
                });

                $(document).on("click", "#open-AddBookDialog", function () {
                    var myBookId = $(this).data('mitra');
                    var myBooknama = $(this).data('nama');
                    var myBookharga = $(this).data('harga');
                    $("#idmitra").val(myBookId);
                    $("#nama_p").val(myBooknama);
                    $("#harga_p").val(myBookharga);
                    // As pointed out in comments, 
                    // it is superfluous to have to manually call the modal.
                    // $('#addBookDialog').modal('show');
                });
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkb3evn0c1byn5cBUJKzblusK9nORufkY&libraries=places&callback=initAutocomplete"async defer></script>
        <script src="js/accounting.js"></script>
        <style>
            .quantity {
                float: left;
                margin-right: 15px;
                background-color: #eee;
                position: relative;
                width: 80px;
                overflow: hidden
            }

            .quantity input {
                margin: 0;
                text-align: center;
                width: 15px;
                height: 15px;
                padding: 0;
                float: right;
                color: #000;
                font-size: 20px;
                border: 0;
                outline: 0;
                background-color: #F6F6F6
            }

            .quantity input.qty {
                position: relative;
                border: 0;
                width: 100%;
                height: 40px;
                padding: 10px 25px 10px 10px;
                text-align: center;
                font-weight: 400;
                font-size: 15px;
                border-radius: 0;
                background-clip: padding-box
            }

            .quantity .minus, .quantity .plus {
                line-height: 0;
                background-clip: padding-box;
                -webkit-border-radius: 0;
                -moz-border-radius: 0;
                border-radius: 0;
                -webkit-background-size: 6px 30px;
                -moz-background-size: 6px 30px;
                color: #bbb;
                font-size: 20px;
                position: absolute;
                height: 50%;
                border: 0;
                right: 0;
                padding: 0;
                width: 25px;
                z-index: 3
            }

            .quantity .minus:hover, .quantity .plus:hover {
                background-color: #dad8da
            }

            .quantity .minus {
                bottom: 0
            }
            .shopping-cart {
                margin-top: 20px;
            }
        </style>
    </body>
</html>