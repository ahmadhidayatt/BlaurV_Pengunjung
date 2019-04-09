<?php
session_start();

//cek level user

    include "../proses/koneksi.php";
    $username = $_SESSION['username'];
	$id=$_SESSION['idcust'];
    $counter = 1;
    ?>
    <html>
        <head>
            <title>GoTICKET| STADION BENTENG TANGERANG</title>
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
									$query = mysqli_query($connect,"SELECT tb_transaksi.id_pembelian, tb_transaksi.id_tiket, tb_transaksi.id_customer, tb_transaksi.id_tribun, tb_transaksi.nama_pemesan, tb_transaksi.no_ktp_pemesan, tb_transaksi.no_hp, tb_transaksi.email, tb_transaksi.jumlah_beli, tb_transaksi.nama_penonton1, tb_transaksi.nama_penonton2, tb_transaksi.nama_penonton3, tb_transaksi.nama_penonton4, tb_transaksi.harga, tb_transaksi.jumlah_harga, tb_transaksi.status_pembelian, tb_tiket.id_tiket, tb_tiket.tgl_pertandingan, tb_tiket.jam_pertandingan, tb_tiket.tim_tuanrumah, tb_tiket.tim_tamu, tb_tiket.lokasi_pertandingan, tb_kategori_tribun.id_tribun, tb_kategori_tribun.id_tiket, tb_kategori_tribun.nama_tribun, tb_customer.id_customer, tb_customer.nama_lengkap, tb_customer.username, tb_pembayaran.id_pembayaran, tb_pembayaran.id_pembelian, tb_pembayaran.tgl_transfer, tb_pembayaran.nama_bank, tb_pembayaran.nama_pemilik_bank, tb_pembayaran.jumlah_tf, tb_pembayaran.foto_struk FROM tb_transaksi, tb_tiket, tb_kategori_tribun, tb_customer, tb_pembayaran WHERE tb_transaksi.id_tiket=tb_tiket.id_tiket AND tb_kategori_tribun.id_tribun=tb_transaksi.id_tribun AND tb_customer.id_customer= tb_transaksi.id_customer AND tb_transaksi.id_pembelian = tb_pembayaran.id_pembelian AND tb_transaksi.status_pembelian='MASUK' AND tb_transaksi.id_customer = '$id'");
									$no =1;
									 
									 if (mysqli_num_rows($query) > 0) { 
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
										
										
										
									</tr>
									<?php }
									   } else { 
                          echo '<script language="javascript">';
							echo 'alert("No Result")';
							echo '</script>';
							echo ("<script>location.href='hal_user_bookinglist.php'</script>");

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