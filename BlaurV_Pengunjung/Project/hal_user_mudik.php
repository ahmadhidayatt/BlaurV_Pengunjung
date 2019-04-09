<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
session_start();
if (!isset($_SESSION['username'])) {
    die("Anda belum login"); //
    echo "<input class='btn btn-blue' type=button value='ULANGI LAGI' onclick=location.href='login.php'></a></center>";
} 
//cek level user
else {
    include "../proses/koneksi.php";
  
    $counter = 1;
    ?>

<!DOCTYPE html>
<html>
    <head>
        <title>GoTICKET | STADION BENTENG TANGERANG</title>
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
            <!--            <div class="container">
                            <div class="header-top-left animated wow slideInLeft" data-wow-delay=".5s">
                            </div>
                            <div class="header-top-left1 animated wow slideInLeft" data-wow-delay=".7s">
                                <h1>Admin KuyFutsal <span class="glyphicon glyphicon-earphone" aria-hidden="true">081212048360</span></h1>
                            </div>
                            <div class="header-top-right">
                                <div id="loginContainer login"><a href="#" id="loginButton"><span>Login</span></a>
                                    <div id="loginBox">                
                                        <form id="loginForm">
                                            <fieldset id="body">
                                                <fieldset>
                                                    <label for="email">Email Address</label>
                                                    <input type="text" name="email" id="email">
                                                </fieldset>
                                                <fieldset>
                                                    <label for="password">Password</label>
                                                    <input type="password" name="password" id="password">
                                                </fieldset>
                                                <input type="submit" id="login" value="Sign in">
                                                <label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember me</i></label>
                                            </fieldset>
                                            <span><a href="#">Forgot your password?</a></span>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>-->
        </div>
		<?php }
		?>
        <?php include './navbar_user.php'; ?>
        <!-- //header -->
        <!-- banner -->
        <div style="margin-top: 10px;" class="banner">
            <div class="banner-pos banner1">
                <div class="container">
                   
                </div>
				
                <div class="banner-posit animated wow zoomIn" data-wow-delay=".5s">
                    <h2><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Cari Tujuan Mudik</h2>
                    <div class="reservation">
                        <form action="hasil_cari_bus_user.php" method="GET">
                            <h5>Pilih Lokasi Tujuan</h5>
                            <div class="book_date">
                                
								<select class="form-control" name="caribus" >
								<option>-- PILIH TUJUAN MUDIK --</option>
								<?php 
											$query = mysqli_query($connect,"select * from tb_bus where kursi > 0");
											while ($rows= mysqli_fetch_array($query)){
										?>
										
										<option value="<?php echo $rows['tujuan'];?>"><?php echo $rows['tujuan'];?> &nbsp </option>
										<?php }?>
								</select>
                            </div>	
                            
                            <br>
                            <div class="section_room" style="margin-bottom: 10px;">
                                <button class="btn btn-block" type="submit">Temukan BUS <span class="glyphicon glyphicon-search" aria-hidden="true"> </span></button>
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
                <h3 class="animated wow zoomIn" data-wow-delay=".5s"></h3><br/>
               
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

        </script>
         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkb3evn0c1byn5cBUJKzblusK9nORufkY&libraries=places&callback=initAutocomplete"async defer></script>


    </body>
</html>