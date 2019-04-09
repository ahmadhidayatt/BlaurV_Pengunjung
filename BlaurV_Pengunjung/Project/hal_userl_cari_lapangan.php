<?php
session_start();
if (!isset($_SESSION['nama'])) {
    die("Anda belum login"); //
    echo "<input class='btn btn-blue' type=button value='ULANGI LAGI' onclick=location.href='login.php'></a></center>";
} elseif (!isset($_SESSION['level']) != 'admin') {
    die("Anda belum login"); //
    echo "<input class='btn btn-blue' type=button value='ULANGI LAGI' onclick=location.href='login.php'></a></center>";
}
//cek level user
else {
    include "../proses/koneksi.php";
    $nama = $_SESSION['nama'];
    $counter = 1;
    ?>
    <html>
        <head>
            <title>KuyFutsal| Aplikasi Penyewaan Lapangan Futsal</title>
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
        <?php } ?>
        <!-- //header -->
        <!-- banner -->
        <div style="margin-top: 10px;" class="banner">
            <div class="banner-pos banner1">
                <div class="container">
                    <div class="banner-info animated wow slideInUp" data-wow-delay=".5s">
                        <h2>
                            Selamat datang di KuyFutsal <span>Web <br>Penyewaan 
                                lapangan Futsal </span>
                        </h2>
                        <p>Booking Menjadi Cepat dan Gampang!</p>
                    </div>
                </div>
            </div>	
        </div>
        <div class="blog" id="listofstuff">
            <div class="container">
                <h2 class="animated wow zoomIn" data-wow-delay=".5s">Mitra lapangan kami</h2>
                <div class="blog-grids">
                    <!---/End-date-piker---->
                    <?php
                    $lokasi = $_GET['carilapangan'];
                    $tgl = $_GET['tanggal'];
                    // gets value sent over search form

                    $min_length = 1;
                    // you can set minimum length of the query if you want

                    if (strlen($lokasi) >= $min_length) { // if query length is more or equal minimum length then
                        $lokasi = htmlspecialchars($lokasi);
                        // changes characters used in html to their equivalents, for example: < to &gt;
                        // makes sure nobody uses SQL injection

                        $raw_results = mysqli_query($connect, "SELECT * FROM tb_mitralapangan
    WHERE (`lokasi` LIKE '%" . $lokasi . "%') ") or die(mysql_error());

                        // * means that it selects all fields, you can also write: `id`, `title`, `text`
                        // articles is the name of our table
                        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
                        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
                        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'

                        if (mysqli_num_rows($raw_results) > 0) { // if one or more rows are returned do following
                            while ($results = mysqli_fetch_array($raw_results)) {
                                ?>

                                <div class="col-md-3 blog-grid">
                                    <div class="blog-grid1 animated wow slideInUp" data-wow-delay=".5s">
                                        <a href="lihat_detail.php?hal=edit&kd=<?php echo $results['id_mitra']; ?>"><img src="<?php echo "../file/" . $results['foto']; ?>" alt=" " class="img-responsive" /></a>
                                        <div class="blog-grid1-info">
                                            <div class="soluta">
                                                <a href="single.html"><?php echo $results['nama'] ?></a> 
                                                <span><?php echo $results['lokasi'] ?></span>
                                            </div>
                                            <p>Rp. <?php echo number_format($results['harga'], 0, ",", "."); ?></p>
                                            <br/><a href="lihat_detail.php?hal=edit&kd=<?php echo $results['id_mitra']; ?>" class="btn btn-sm btn-primary" ><i class="ff1a fa-upload"></i> Lihat detail</a>
                                            <a  class="btn btn-sm btn-primary" data-mitra="<?php echo $results['id_mitra']; ?>"  data-nama="<?php echo $results['nama']; ?>"  data-harga="<?php echo $results['harga']; ?>" type="button" data-toggle="modal" data-target="#myModal" id="open-AddBookDialog"><i class="fa fa-upload"></i> Booking</a>
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
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Form Booking</h4>
                    </div>
                    <?php
                    $query2 = "SELECT max(id) as maxKode FROM tb_pemesanan";
                    $hasil = mysqli_query($connect, $query2)or die(mysqli_error());
                    $data2 = mysqli_fetch_array($hasil);
                    $kodeBarang = $data2['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
                    $noUrut = ($kodeBarang);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
                    if ($data2['maxKode'] == NULL) {
                        $noUrut++;
                    } else {
                        $noUrut;
                    }

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
                    $char = "TRS";
                    $newID = $char . sprintf("%03s", $noUrut);
                    ?>

                    <div class="modal-body">
                        <?php
                        $tampil = ("select * from user where nama='$nama'");
                        $result = mysqli_query($connect, $tampil)or die(mysqli_error());
                        $row = mysqli_fetch_array($result)
                        ?>
                        <form action="../proses/pemesanan.php" method="post" enctype="multipart/form-data" >
                            <div class="form-group">
                                <label for="exampleInputEmail1">ID Transaksi:</label>
                                <input name="idtrans" type="text" value="<?php echo $newID; ?>" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">ID Lapangan :</label>
                                <input name="id" type="text" class="form-control" id="idmitra" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Lapangan :</label>
                                <input name="namalap" type="text" class="form-control" id="nama_p" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Harga Lapangan :</label>
                                <input name="harga" type="text" class="form-control" id="harga_p" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Pemesan :</label>
                                <input name="namapemesan" value="<?php echo $row['nama'] ?>" type="text" class="form-control" id="harga_p" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat Pemesan :</label>
                                <textarea name="alamat" placeholder="Alamat" value="<?php echo $row['alamat'] ?>" class="form-control" rows="3" required><?php echo $row['alamat'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomer Telp :</label>
                                <input name="notelp" value="<?php echo $row['notlp'] ?>" type="text" class="form-control" id="harga_p" required>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="submit" name="register-submit" id="register-submit" class="btn btn-lg btn-primary" value="Pesan!">
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



        <div id="map"></div>
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

    </body>
</html>