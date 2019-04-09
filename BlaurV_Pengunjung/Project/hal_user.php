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
    $norekmed = $_SESSION['nama'];
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
                <div class="banner-posit animated wow zoomIn" data-wow-delay=".5s">
                    <h2><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Cari Lapangan</h2>
                    <div class="reservation">
                        <form action="hal_userl_cari_lapangan.php" method="GET">
                            <h5>Pilih Lokasi</h5>
                            <div class="book_date">
                                <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                                <input id="autocomplete" name="carilapangan" class="controls" type="text" placeholder="cari lapangan">
                            </div>	
                            <h5>Pilih Tanggal</h5>
                            <div class="book_date">
                                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                <input class="date" id="datepicker" name="tanggal" type="text"  onfocus="this.value = '';" onblur="if (this.value == '') {
                                            this.value = '19/10/2015';
                                        }" required="">
                            </div>	
                            <h5>Pilih jam</h5>
                            <!----------start section_room----------->
                            <div class="section_room">
                                <select id="country" onchange="change_country(this.value)" class="frm-field required">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span><option value="null">08.00 AM</option>
                                    <option value="09.00">09.00 AM</option>         
                                    <option value="10.00">10.00 AM</option>
                                    <option value="11.00">11.00 AM</option>         
                                    <option value="12.00">12.00 AM</option>
                                    <option value="13.00">01.00 PM</option>         
                                    <option value="14.00">02.00 PM</option>         
                                    <option value="15.00">03.00 PM</option>         
                                    <option value="16.00">04.00 PM</option>         
                                    <option value="17.00">05.00 PM</option>         
                                    <option value="18.00">06.00 PM</option>         
                                    <option value="19.00">07.00 PM</option>         
                                    <option value="20.00">08.00 PM</option>         
                                    <option value="21.00">09.00 PM</option>         
                                    <option value="22.00">10.00 PM</option>         
                                    <option value="23.00">11.00 PM</option>         
                                    <option value="24.00">12.00 PM</option>         
                                </select>
                            </div>
                            <br>
                            <div class="section_room" style="margin-bottom: 10px;">
                                <button class="btn btn-block" type="submit">Temukan lapangan <span class="glyphicon glyphicon-search" aria-hidden="true"> </span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>	
        </div>
        
        <!---strat-date-piker---->
        <link rel="stylesheet" href="css/jquery-ui.css" />
        <script src="js/jquery-ui.js"></script>
        <script>
                                    $(function () {
                                        $("#datepicker,#datepicker1").datepicker();
                                    });
        </script>
        <!---/End-date-piker---->



        <div id="map"></div>

        <div class="popular">
            <div class="container">
                <h3 class="animated wow zoomIn" data-wow-delay=".5s">Popular Event</h3><br/>
                <div class="blog-grid1 animated wow slideInLeft" data-wow-delay=".5s">
                    <a href="single.html"><img src="images/favicon.png" alt=" " class="img-responsive" /></a>
                    <div class="blog-grid1-info">
                        <div class="soluta">
                            <a href="single.html">Main Bareng Cr</a> 
                            <span>October 29,2015.</span>
                        </div>
                        <p>Jumpa pers cristiano....</p>
                        <div class="red-mre">
                            <a href="single.html">Read More</a> 
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
        <!-- //for bootstrap working -->
        <script>
                                    function initAutocomplete() {
                                        new google.maps.places.Autocomplete(
                                                (document.getElementById('autocomplete')), {
                                            types: ['geocode']
                                        });
                                    }

                                    $(document).on("click", "#test-element", function () {
                                        alert("click bound to document listening for #test-element");
                                    });
                                    $("#test-element").on("click", function () {
                                        alert("click bound directly to #test-element");
                                    });

        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkb3evn0c1byn5cBUJKzblusK9nORufkY&libraries=places&callback=initAutocomplete"async defer></script>


    </body>
</html>