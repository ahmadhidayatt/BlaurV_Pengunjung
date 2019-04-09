<?php
include '../proses/koneksi.php';
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
                       
                    </div>
                </div>
            </div>	
        </div>
        <div class="blog">
            <div class="container">
                <h2 class="animated wow zoomIn" data-wow-delay=".5s">Data Tujuan Mudik</h2>
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
                                            <div class="red-mre">
                                                <a href="login.php">Booking sekarang </a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                            }
                        } else { // if there is no matching rows do following
                            echo "No results";
                        }
                    } else { // if query length is less than minimum
                        echo "Masukan kota tujuan mudik";
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


        <div id="map"></div>

        

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