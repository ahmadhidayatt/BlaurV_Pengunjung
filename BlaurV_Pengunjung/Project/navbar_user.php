<div class="header-top" style="display:none;">
    <div class="container">
        <div class="header-top-left1 animated wow slideInLeft" data-wow-delay=".7s">
            <h1>Contact Us<span class="glyphicon glyphicon-earphone" aria-hidden="true">082114074983</span></h1>
        </div>	
        <div class="header-top-right">
            <div id="loginContainer login"><a href="#" id="loginButton">Hallo, <span><?php echo $nama; ?></span></a>
                <div id="loginBox">                
                    <form id="loginForm" action="../proses/logout.php">
                        <fieldset id="body">
                            <input type="submit" id="login" value="Logout">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
	
</div>
<div class="header-nav">
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="logo animated wow zoomIn" data-wow-delay=".1s">
                  <a class="navbar-brand" href="#">BLAUR VACATION<span>TRIP TO SERIBU ISLAND</span></a>
                </div>
            </div>
	

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li ><a href="hal_pengunjung.php">Home</a></li>
					 <li ><a href="data_list_trip.php">List Trip</a></li> <!-- Data Pertandingan-->
                    <li><a href="hal_user_bookinglist.php">My Booking List</a></li> <!--hal_user_bookinglist.php -->
					<li><a href="konfirmasi_pembayaran.php">Payment</a></li> <!--hal_user_bookinglist.php -->
					 <li><a href="hal_cetak_etiket.php">E-Ticket Trip</a></li> <!--hal_cetak_tiket.php -->
                </ul>
            </div><!-- /.navbar-collapse -->	
        </nav>
    </div>
</div>