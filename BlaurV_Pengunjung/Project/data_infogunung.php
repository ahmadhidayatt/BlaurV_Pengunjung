<?php
include '../../E_mounttrip_Pegawai/config/koneksi.php';
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
		 <?php 
				$query = mysqli_query($connect,"SELECT * FROM tb_paket_gunung");
				$no =1;
				while($results = mysqli_fetch_array($query)){	?>
        <div style="margin-top: 10px;" class="banner">

            <div class="banner-pos banner1">
                <center><h1>Informasi Trip</h1></center>
                <div class="container" style="padding-top: 50px;">
                  <div class="popular-grids">
				<div class="col-md-4 popular-grid animated wow slideInUp" data-wow-delay=".5s">
					<img src="<?php echo "../../E_mounttrip_Pegawai/images/tiket/" . $results['gambar_gunung']; ?>" width="300" height="300" alt=" " class="img-circle" />
					 <br/> <br/>
					 
					 <center><h1><b></b></h1>
				</div>
				<div class="col-md-4 popular-grid animated wow slideInUp" data-wow-delay=".5s">
					<div class="popular-grid1">
					
						<h1><b><?php echo $results['nama_paket']?></b></h1>
					
						<div class="popular-grid1-pos animated wow slideInUp" data-wow-delay=".5s">
						<br/><br/>
						
						</div>
						</div>
						<center><h3><br>Tanggal Awal Perjalanan : <?php echo $results['tgl_awal']?><br/> <br/></center>
						<center><h3>Tanggal Akhir Perjalanan : <?php echo $results['tgl_akhir']?></h3><br/> <br/></center>
                        
                        <center><h3>Include : <?php echo $results['include']?></h3> <br/></center>
                        <center><h3><b> <i>Harga : <?php echo $results['harga']?></i></b></h3></center>
						<center><h3><b>	<i>Jumlah Kuota : <?php echo $results['status_kuota']?></i></b></h3></center>

					
				</div>
			
				<div class="clearfix">
                    <b>Informasi Gunung : <?php echo $results['informasi_gunung']?></b>
                </div>
				<b><hr/><br/>
				<center><button href="login.php" type="button"  class="btn btn-large btn-block btn-primary" onclick="window.location.href='login.php'">Trip Now</button>
                                        </div>
			</div>
			<hr/>
			
		</div>
		<?php }
				?>
	</div>
                    <!---/End-date-piker---->
                  
                    <div class="clearfix"> </div>
                </div>
               
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