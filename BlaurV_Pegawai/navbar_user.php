<!DOCTYPE html>
<html class="no-js">
    <?php 
date_default_timezone_set('Asia/Jakarta');
include"config/koneksi.php";

session_start();
?>
    <head>
        <title>Admin Home Page</title>
        <!-- Bootstrap -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="../vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="../assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="../vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">Admin Panel</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="../GoTicket_user/proses/logout.php" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <?php echo $_SESSION['username']; ?><i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="#">Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="../E_mounttrip_Pengunjung/proses/logout.php">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li class="active">
                                <a href="#">Dashboard</a>
                            </li>
                            
                                
                           
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li class="active">
                            <a href="dashboard_admin.php"><i class="icon-home"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="data_administrator.php"><i class="icon-tasks"></i> Data Pegawai</a>
                        </li>
                        <li>
                            <a href="data_customer.php"><i class="icon-user"></i> Data Pengunjung</a>
                        </li>
                        <li>
                            <a href="data_paket_gunung.php"><i class="icon- icon-file"></i> Data Paket Pulau</a>
                        </li>
                       
                        <li>
                            <a href="data_transaksi.php"><i class="icon-edit"></i> Data Laporan Transaksi</a>
                        </li>
                        <li>
                            <a href="data_pembayaran.php"><i class="icon-book"></i> Verifikasi Data Pembayaran</a>
                        </li>
                       
                    </ul>
                </div>
				
                
                <!--/span-->
                
			
				
				<script src="../vendors/jquery-1.9.1.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="../assets/scripts.js"></script>
        <script>
        $(function() {
            // Easy pie charts
            $('.chart').easyPieChart({animate: 1000});
        });
        </script>
		</body>