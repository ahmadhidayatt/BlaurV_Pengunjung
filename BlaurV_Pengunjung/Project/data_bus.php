<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
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
        <link href="css/login.css" rel="stylesheet"> 
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
        <?php include './navbar_admin.php'; ?>
        <!-- //header -->

        <!---/End-date-piker---->

        <div class="container" style="margin-top: 80px; margin-bottom: 250px;">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-login">
                        <div class="panel-heading">
                            <div class="row">

                                <center><a href="#" class="active" id="register-form-link">Register</a></center>
                            </div>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php
                                    include "../proses/koneksi.php";
                                    $query2 = "SELECT max(id) as maxKode FROM tb_bus  ";
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
                                    $char = "LAP";
                                    $newID = $char . sprintf("%03s", $noUrut);
                                    ?>
                                    <form id="register-form" action="../proses/daftar_mitra.php" method="post" role="form" style="display: block;">
                                        <div class="form-group">
                                            <input type="text" value="<?php echo $newID; ?>"  name="id_mitera"  tabindex="1" class="form-control" placeholder="" readonly>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="nama" tabindex="1" class="form-control" placeholder="Nama Lapangan"  required>
                                        </div>
                                        <div class="form-group">
                                            <input type="tel" name="harga" onkeypress="return isNumberKey(event)" tabindex="1" class="form-control" placeholder="Harga Sewa" required value="">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="alamat" id="autocomplete" class="form-control" placeholder="Alamat Lapangan" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" id="autocomplete" class="form-control" placeholder="Alamat Email" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="upload" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- //popular -->
        <!-- footer -->
        <?php include './footer.php'; ?>
        <!-- //footer -->
        <!-- for bootstrap working -->
        <script src="js/bootstrap.js"></script>
        <script>
                                                $(function () {

                                                    $('#login-form-link').click(function (e) {
                                                        $("#login-form").delay(100).fadeIn(100);
                                                        $("#register-form").fadeOut(100);
                                                        $('#register-form-link').removeClass('active');
                                                        $(this).addClass('active');
                                                        e.preventDefault();
                                                    });
                                                    $('#register-form-link').click(function (e) {
                                                        $("#register-form").delay(100).fadeIn(100);
                                                        $("#login-form").fadeOut(100);
                                                        $('#login-form-link').removeClass('active');
                                                        $(this).addClass('active');
                                                        e.preventDefault();
                                                    });

                                                });

                                                function isNumberKey(evt)
                                                {
                                                    var charCode = (evt.which) ? evt.which : event.keyCode
                                                    if (charCode > 31 && (charCode < 48 || charCode > 57))
                                                        return false;
                                                    return true;
                                                }
                                                ;

                                                jQuery(function ($) {
                                                    $("#npwp").mask("99-999-999-9-999-999");
                                                });

                                                function checkPass()
                                                {
                                                    //Store the password field objects into variables ...
                                                    var pass1 = document.getElementById('pass1');
                                                    var pass2 = document.getElementById('pass2');
                                                    //Store the Confimation Message Object ...
                                                    var message = document.getElementById('confirmMessage');
                                                    //Set the colors we will be using ...
                                                    var goodColor = "#66cc66";
                                                    var badColor = "#ff6666";
                                                    //Compare the values in the password field 
                                                    //and the confirmation field
                                                    if (pass1.value == pass2.value) {
                                                        //The passwords match. 
                                                        //Set the color to the good color and inform
                                                        //the user that they have entered the correct password 
                                                        pass2.style.backgroundColor = goodColor;
                                                        message.style.color = goodColor;
                                                        message.innerHTML = "Passwords sama!"
                                                    } else {
                                                        //The passwords do not match.
                                                        //Set the color to the bad color and
                                                        //notify the user.
                                                        pass2.style.backgroundColor = badColor;
                                                        message.style.color = badColor;
                                                        message.innerHTML = "Passwords tidak sama!"
                                                    }
                                                }
                                                ;

        </script>
        <script>
            function initAutocomplete() {
                new google.maps.places.Autocomplete(
                        (document.getElementById('autocomplete')), {
                    types: ['geocode']
                });
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkb3evn0c1byn5cBUJKzblusK9nORufkY&libraries=places&callback=initAutocomplete"async defer></script>


        <!-- //for bootstrap working -->
    </body>
</html>