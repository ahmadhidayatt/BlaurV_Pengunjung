<?php
include '../proses/koneksi.php';
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
        <script src="js/bootstrap.js"></script>
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
        <?php include './navbar_admin.php'; ?>
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

        <?php
        $tampil2 = ("select * from tb_mitralapangan where id_mitra='$_GET[kd]'");
        $result2 = mysqli_query($connect, $tampil2)or die(mysqli_error());
        $row2 = mysqli_fetch_array($result2)
        ?>
        <div class="single">
            <div class="container">
                <div class="col-md-8 sing-img-text">
                    <img src="<?php echo "../file/" . $row2['foto']; ?>" alt=" " class="img-responsive animated wow slideInUp" data-wow-delay=".5s" />
                    <div class="sing-img-text1">
                        <h2 class="animated wow slideInUp" data-wow-delay=".5s"><?php echo $row2['nama'] ?></h2>
                        <p class="est animated wow slideInUp" data-wow-delay=".5s"><?php echo $row2['lokasi'] ?></p><br>
                        <p class="est animated wow slideInUp" data-wow-delay=".5s"> </p>
                        <div class="footer-right animated wow slideInUp" data-wow-delay=".5s">
                            <ul>
                                <li><a href="#" class="p"> </a></li>
                                <li><a href="#" class="facebook"> </a></li>
                                <li><a href="#" class="in"> </a></li>
                            </ul>
                        </div>
                        <div class="com">
                            <h3 class="animated wow slideInLeft" data-wow-delay=".5s">Comments</h3>
                            <ul class="media-list">
                                <li class="media animated wow slideInUp" data-wow-delay=".5s">
                                    <div class="media-left">
                                        <a href="#">
                                            <img class="media-object" src="images/17.jpg" alt="" />
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Ating</h4>
                                        Test.
                                        <a href="#">Reply</a>
                                    </div>
                                </li>
                                <li class="media animated wow slideInUp" data-wow-delay=".5s">
                                    <div class="media-left">
                                        <a href="#">
                                            <img class="media-object" src="images/18.jpg" alt="" />
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Agam</h4>
                                        Matoy
                                        <a href="#">Reply</a>
                                    </div>
                                </li>
                                <li class="media animated wow slideInUp" data-wow-delay=".5s">
                                    <div class="media-left">
                                        <a href="#">
                                            <img class="media-object" src="images/19.jpg" alt="" />
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Kiwil</h4>
                                        Kampret.
                                        <a href="#">Reply</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
                <div class="leave-a-comment animated wow slideInUp" data-wow-delay=".5s">
                    <h3>Leave your comment Here</h3> 
                    <form>
                        <input type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {
                                    this.value = 'Name';}" required="">
                        <input type="text" value="Email..." onfocus="this.value = '';" onblur="if (this.value == '') {
                                    this.value = 'Email...';
                                }" required="">
                        <input type="text" value="Phone Number" onfocus="this.value = '';" onblur="if (this.value == '') {
                                    this.value = 'Phone Number';
                                }" required="">
                        <textarea type="text" onfocus="this.value = '';" onblur="if (this.value == '') {
                                    this.value = 'Type Your Comment here...';
                                }" required="">Type Your Comment here...</textarea>
                        <input type="submit" value="Add Comment">
                    </form>
                </div>
            </div>
        </div>
        <!-- //popular -->
        <!-- footer -->
        <?php include './footer.php'; ?>
        <!-- //footer -->
        <!-- for bootstrap working -->

        <!-- //for bootstrap working -->
        <script>
            // This example adds a search box to a map, using the Google Place Autocomplete
            // feature. People can enter geographical searches. The search box will return a
            // pick list containing a mix of places and predicted search terms.

            // This example requires the Places library. Include the libraries=places
            // parameter when you first load the API. For example:
            // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

            function initAutocomplete() {
                new google.maps.places.Autocomplete(
                        (document.getElementById('autocomplete')), {
                    types: ['geocode']
                });
            }

        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkb3evn0c1byn5cBUJKzblusK9nORufkY&libraries=places&callback=initAutocomplete"async defer></script>
        <!---strat-date-piker---->
        <link rel="stylesheet" href="css/jquery-ui.css" />
        <script src="js/jquery-ui.js"></script>
        <script>
            $(function () {
                $("#datepicker,#datepicker1").datepicker();
            });
        </script>

    </body>
</html>