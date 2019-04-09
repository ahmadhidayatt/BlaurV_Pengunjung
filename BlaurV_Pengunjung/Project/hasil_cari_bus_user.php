<?php
session_start();

//cek level user

    include "../proses/koneksi.php";
    $nama = $_SESSION['nama'];
    $counter = 1;
    ?>
    <html>
        <head>
             <title>MUDIK GRATIS| PT. JASA RAHARJA</title>
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
       <!-- <div style="margin-top: 10px;" class="banner">
            <div class="banner-pos banner1">
                <div class="container">
                   
                </div>
            </div>	
        </div>-->
        <div class="blog" id="listofstuff">
            <div class="container">
                <h2 class="animated wow zoomIn" data-wow-delay=".5s">Tujuan Bus Pemudik</h2>
                <div class="blog-grids">
                    <!---/End-date-piker---->
                   <?php
                    $tujuan = $_GET['caribus'];
					$min_length = 1;
					if (strlen($tujuan) >= $min_length) {
					$tujuan = htmlspecialchars($tujuan);
                    $raw_results = mysqli_query($connect, "SELECT * FROM tb_bus WHERE (`tujuan` LIKE '" . $tujuan . "') AND kursi > 0") or die(mysql_error());
                    if (mysqli_num_rows($raw_results) > 0) { 
                    while ($results = mysqli_fetch_array($raw_results)) {
                    ?>
                                 <div class="col-md-3 blog-grid">
                                    <div class="blog-grid1 animated wow slideInUp" data-wow-delay=".5s">
                                        <a href="single.html"><img src="<?php echo "../../mudik_jr/img/bus/" . $results['photo']; ?>" alt=" " class="img-responsive" /></a>
                                        <div class="blog-grid1-info">
                                            <div class="soluta">
                                                <a href="#"><?php echo $results['nama_bus'] ?></a> <br/><br/>
												  <a href="#">Jakarta  >> <?php echo $results['tujuan'] ?></a> 
                                                <span>October 29,2015.</span>
                                            </div>
											 <p>BUS <?php echo $results['jenis_bus']?></p>
                                           <p>Available <?php echo $results['kursi']?> Seats</p>
                                           
                                            <br/>
                                            <a  class="btn btn-sm btn-primary" data-bus="<?php echo $results['id_bus']; ?>"  data-tujuan="<?php echo $results['tujuan']; ?>" type="button" data-toggle="modal" data-target="#myModal" id="open-AddBookDialog"><i class="fa fa-upload"></i> BOOKING NOW</a>
                                        </div>
                                    </div>
                                </div>

                                <?php
                            }
                        } else { // if there is no matching rows do following
                            echo "No results";
                        }
                    } else { // if query length is less than minimum
                        echo "Masukan alamat atau nama lapangan";
                    }
                    ?>
                    <div class="clearfix"> </div>
                </div>
                <nav>
                    <ul class="pagination padff animated wow slideInLeft" data-wow-delay=".5s">
                        <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                        <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">2 <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">3 <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">4 <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">5 <span class="sr-only">(current)</span></a></li>
                        <li class="abled"><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog" style="col-sm-10">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Form Pendaftaran</h4>
                    </div>
					<?php
					$hasil = mysqli_query($connect,"SELECT max(id_pemudik) as idMaks FROM tb_pemudik");
					$data  = mysqli_fetch_array($hasil);
					$idMax = $data['idMaks'];
					$noUrut = (int) substr($idMax, 6, 8);
					$noUrut++;
					$format = "PMD";
					$newID = $format . sprintf("%05s", $noUrut);
			?>
                    <div class="modal-body">
						 <?php
                        $tampil = ("select * from tb_user where nama='$nama'");
                        $result = mysqli_query($connect, $tampil)or die(mysqli_error());
                        $row = mysqli_fetch_array($result)
                        ?>
                        <form action="../proses/aksi_daftar_mudik.php" method="post" enctype="multipart/form-data" >
                            <div class="col-lg-4">
                                <label for="exampleInputEmail1">ID Pemudik:</label>
                                <input name="id_pemudik" type="text" value="<?php echo $newID; ?>" class="form-control" readonly>
                            </div>
                            <div class="col-lg-4">
                                <label for="exampleInputEmail1">ID BUS :</label>
                                <input name="id_bus" type="text" class="form-control" id="idbus" readonly>
                            </div>
                           
                            <div class="col-lg-4">
                                <label for="exampleInputEmail1">Tujuan Mudik :</label>
                                <input name="tujuan" type="text" class="form-control" id="tujuanbus" value="" readonly>
                            </div>
							<br/>
							<br/>
							<br/>
							<br/>
							<div class="form-group">
                                <label for="exampleInputEmail1">ID Pemesan :</label>
                                <input name="id"  type="text" value="<?php echo $row['id'] ?>"class="form-control" id="harga_p" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Pemesan :</label>
                                <input name="namapemesan"  type="text" value="<?php echo $row['nama'] ?>"class="form-control" id="harga_p" required>
                            </div>
							 <div class="form-group">
                                <label for="exampleInputEmail1">No Handphone :</label>
                                <input name="namapemesan"  type="text" value="<?php echo $row['no_hp'] ?>"class="form-control" id="harga_p" required>
                            </div>
							 <div class="form-group">
                                <label for="exampleInputEmail1">Email :</label>
                                <input name="namapemesan"  type="text" value="<?php echo $row['email'] ?>"class="form-control" id="harga_p" required>
                            </div>
							 <div class="form-group">
                                <label for="exampleInputEmail1"> Upload Photo KTP :</label>
                                <input name="photo_KTP"  type="file" class="form-control" id="harga_p" required>
                            </div>
							<div class="form-group">
                                <label for="exampleInputEmail1"> Upload Photo SIM C :</label>
                                <input name="photo_SIMC"  type="file" class="form-control" id="harga_p" required>
                            </div>
							<div class="form-group">
                                <label for="exampleInputEmail1"> Upload Photo Kartu Keluarga :</label>
                                <input name="photo_KK"  type="file" class="form-control" id="harga_p" required>
                            </div>
							<div class="form-group">
                                <label for="exampleInputEmail1"> Jumlah Keluarga Mudik :</label>
                                <select name="jumlah_kel_pemudik"  type="text" class="form-control" id="slct">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
								</select>
                            </div>
							<div class="form-group"  id="container">
                                
                            </div>
							<div class="form-group">
                                <label for="exampleInputEmail1"> Alamat Rumah :</label>
                                <textarea name="alamat_rumah"  type="text" class="form-control" required></textarea>
                            </div>
							<input type="hidden" name="tempat_berangkat" value="TAMAN MINI INDONESIA INDAH"class="form-control">
							<input type="hidden" name="jam_berangkat" value="08.00" class="form-control">
                           <div class="form-group">
                                <label for="exampleInputEmail1"> Status :</label>
                                <input name="status"  type="text" class="form-control" value="WAITING LIST" readonly required>
                            </div>
							
			

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="submit" name="register-submit" id="register-submit" class="btn btn-lg btn-primary" value="BOOKING">
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
        </div>



       
        <!-- //popular -->
        <!-- footer -->
        <?php include './footer.php'; ?>
        <!-- //footer -->
        <!-- for bootstrap working -->
		  <script>
                $(document).on("click", "#test-element", function () {
                    alert("click bound to document listening for #test-element");
                });

                $(document).on("click", "#open-AddBookDialog", function () {
				
                    var myBookId = $(this).data('bus');
                    var myBooktujuan = $(this).data('tujuan');
                    $("#idbus").val(myBookId); 
                    $("#tujuanbus").val(myBooktujuan);
                    // As pointed out in comments, 
                    // it is superfluous to have to manually call the modal.
                    // $('#addBookDialog').modal('show');
                });
        </script>
        <script src="js/bootstrap.js"></script>
        <!-- //for bootstrap working -->
      
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkb3evn0c1byn5cBUJKzblusK9nORufkY&libraries=places&callback=initAutocomplete"async defer></script>
        <script src="js/accounting.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function () {

        $('#slct').change(function () {
            var value = $(this).val(); var toAppend = '';
            if (value == 1) {
				
                toAppend = "<label > Nama Pemudik :</label><br/><input name='nama_pemudik1'  type='text' class='form-control' placeholder='Nama Pemudik' required>"; $("#container").html(toAppend); return;
            }
            if (value == 2) {
                toAppend = "<label > Nama Pemudik :</label><br/><input name='nama_pemudik1'  type='text' class='form-control' placeholder='Nama Pemudik 1' required><br/><input name='nama_pemudik2'  type='text' class='form-control' placeholder='Nama Pemudik 2' required>"; $("#container").html(toAppend); return;
            }
            if (value == 3) {
                toAppend = "<label > Nama Pemudik :</label><br/><input name='nama_pemudik1'  type='text' class='form-control' placeholder='Nama Pemudik 1' required><br/><input name='nama_pemudik2'  type='text' class='form-control' placeholder='Nama Pemudik 2' required><br/><input name='nama_pemudik3'  type='text' class='form-control' placeholder='Nama Pemudik 3' required>"; $("#container").html(toAppend); return;

            }
			if (value == 4) {
                toAppend = "<label > Nama Pemudik :</label><br/><input name='nama_pemudik1'  type='text' class='form-control' placeholder='Nama Pemudik 1' required><br/><input name='nama_pemudik2'  type='text' class='form-control' placeholder='Nama Pemudik 2' required><br/><input name='nama_pemudik3'  type='text' class='form-control' placeholder='Nama Pemudik 3' required><br/><input name='nama_pemudik4'  type='text' class='form-control' placeholder='Nama Pemudik 4' required>"; $("#container").html(toAppend); return;
            }

        });

    });
     </script>
    </body>
</html>