<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
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
        <?php include './navbar_admin.php'; ?>
        <!-- //header -->
        <!-- banner -->
        <div style="margin-top: 20px;" class="banner">
            <div class="banner-pos banner1">
                <div class="container">
                   <div class="banner-info animated wow slideInUp" data-wow-delay=".5s">
                        <h1 style="color: #c46d1b">
                            Selamat datang di Blaur Vacation  <span><br/><br><i>Perjalanan ke Pulau Seribu</i </span>
                        </h1>
                        <p style="color: #91918b">Booking Menjadi Cepat dan Gampang!</p>
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