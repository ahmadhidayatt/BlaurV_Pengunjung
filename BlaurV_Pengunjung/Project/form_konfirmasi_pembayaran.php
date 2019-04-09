<?php
session_start();

//cek level user

    include "../proses/koneksi.php";
    $nama = $_SESSION['nama'];
    $id = $_SESSION['username'];
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
                        <div class="container-fluid">
                <!-- Start Page Content -->
                 <?php
                    $id_pembelian = $_GET['id_pembelian'];
					$min_length = 1;
					if (strlen($id_pembelian) >= $min_length) {
					$id_pembelian = htmlspecialchars($id_pembelian);
                    $raw_results = mysqli_query($connect, "SELECT tb_pengunjung.nama, tb_pengunjung.id_pengunjung, tb_pengunjung.email, tb_membayar_pendakian.id_boking, tb_paket_gunung.nama_paket,tb_paket_gunung.id_gunung, tb_paket_gunung.tgl_akhir,tb_membayar_pendakian.total_harga, tb_membayar_pendakian.pendaki1, tb_membayar_pendakian.pendaki2,tb_membayar_pendakian.pendaki3,tb_membayar_pendakian.pendaki4, tb_membayar_pendakian.status_pembayaran, tb_membayar_pendakian.jumlah_pendaki FROM tb_pengunjung, tb_paket_gunung, tb_membayar_pendakian WHERE tb_pengunjung.id_pengunjung = tb_membayar_pendakian.id_pengunjung AND tb_paket_gunung.id_gunung = tb_membayar_pendakian.id_gunung and tb_pengunjung.id_pengunjung='$id' and tb_membayar_pendakian.id_boking = '$id_pembelian' and tb_membayar_pendakian.status_pembayaran = 'Belum Diverifikasi'") or die(mysql_error());
                    if (mysqli_num_rows($raw_results) > 0) { 
                    while ($results = mysqli_fetch_array($raw_results)) {
                    ?>
                <div class="col-lg-12">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Form Konfirmasi Pembayaran</h3><br/>
                                 
                               <form action="../proses/proses_pembayaran.php" method="POST" enctype="multipart/form-data"> 
                                    <table class="table table-bordered">
									
										<tr>
                                            <td><h4 for="no_rek">Data Pesanan Tiket Anda</h4></td>
                                            <td></td>
                                        </tr>
                                       
                                        <tr>
                                            <td><label for="nama_kar">Nama Pemesan</label></td>
                                            <td><input name="nama_pemesan" type="text" class="form-control" id="nama"  value="<?php echo $results['nama'] ?>" placeholder="Nama" required readonly /></td>
                                        </tr>
                                        
                                        <tr>
                                            <td><label for="nama_kar">Kode Gunug</label></td>
                                            <td><input name="id_gunung" type="text" class="form-control" id="nama"  value="<?php echo $results['id_gunung'] ?>" placeholder="Nama" required readonly /></td>
                                        </tr>
                                        <tr>
                                            <td><label for="nama_kar">Jumlah Pengunjung</label></td>
                                            <td><input name="jml_pendaki" type="text" class="form-control" id="nama"  value="<?php echo $results['jumlah_pendaki'] ?>" placeholder="Nama" required readonly /></td>
                                        </tr>
                                       
											 <tr>
                                            <td><label for="no_rek">Nama Paket</label></td>
                                            <td><input name="telpon" type="text" class="form-control" id="no_rek" value="<?php echo $results['nama_paket'] ?>" placeholder="Telpon" required readonly /></td>
										<tr/>	
											
											 <tr>
                                            <td><label for="no_rek">Jumlah Harga</label></td>
                                            <td><input name="jml_beli_tiket" type="text" class="form-control" id="no_rek" value="<?php echo $results['total_harga'] ?>" placeholder="Telpon" required readonly /></td>
										
                                     <form action="../proses/proses_pembayaran.php" method="POST" enctype="multipart/form-data"> 
                                        <tr>
                                            <td><h4>Isilah data Pembayaran dibawah Ini</h4></td>
                                            <td></td>
                                        </tr>
                                        
                                        <tr>
                                            <td><label for="tgl_transfer">Kode Pemesanan</label></td>
                                            <td><input type="text" name="id_pembelian" class="form-control" value="<?php echo $results['id_boking'] ?>" readonly/></td>
                                            </tr>
											
											
                                        <tr>
                                            <td><label for="tgl_transfer">Upload Foto Bukti Pengiriman (struk)</label></td>
                                            <td><input name="foto_struk" type="file" class="form-control"/></td>
                                              </tr>
                                              <tr>
                                            <td><label for="tgl_transfer">Upload Surat Dokter (keterangan sehat)</label></td>
                                            <td><input name="surat_dokter" type="file" class="form-control"/></td>
                                              </tr>
                                       
                                        <tr>
                                            <td> <input type="submit" value="Simpan Data" name="submit" class="btn btn-sm btn-primary"/>&nbsp;<a href="konfirmasi_pembayaran.php" class="btn btn-sm btn-primary">Kembali</a></td>
                                       </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                       </div>
					<?php
                            }
                        } else { // if there is no matching rows do following
                            echo "No results";
                        }
                    } else { // if query length is less than minimum
                        echo "Masukan Kode Pemesanan";
                    }
                    ?>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            
            <!-- End footer -->
        </div>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

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