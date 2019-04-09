<?php
session_start();
if (!isset($_SESSION['nama'])) {
    die("Anda belum login"); //
    echo "<input class='btn btn-blue' type=button value='ULANGI LAGI' onclick=location.href='login.php'></a></center>";
} elseif (!isset($_SESSION['level']) == 'admin') {
    die("Anda bukan admin"); //
    echo "<input class='btn btn-blue' type=button value='ULANGI LAGI' onclick=location.href='login.php'></a></center>";
}
//cek level user
else {
    include "../../proses/koneksi.php";
    $counter = 1;
?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <!-- Meta, title, CSS, favicons, etc. -->
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>KuyFutsal| Aplikasi Penyewaan Lapangan Futsal</title>

            <!-- Bootstrap -->
            <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
            <!-- Font Awesome -->
            <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
            <!-- NProgress -->
            <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
            <!-- iCheck -->
            <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

            <!-- bootstrap-progressbar -->
            <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
            <!-- JQVMap -->
            <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
            <!-- bootstrap-daterangepicker -->
            <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

            <!-- Custom Theme Style -->
            <link href="../build/css/custom.min.css" rel="stylesheet">

            <script src="js/tanggal.js"></script>
        </head>


        <body class="nav-md">
            <div class="container body">
                <div class="main_container">
                    <!--side nav menu-->
                    <?php include './navmenu_admin.php'; ?>
                    <!--/side nav menu-->

                    <!-- top navigation -->
                    <?php include './navmenu_top.php'; ?>
                    <!-- /top navigation -->
                <?php } ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="col-lg-12">
                        <h1>Halaman <small>Admin</small></h1>
                        <table width="900">
                            <tr>
                                <td width="250"><div class="Tanggal"><h4><script language="JavaScript">document.write(tanggallengkap);</script></div></h4></td> 
                                <td align="left" width="30"> - </td>
                                <td align="left" width="620"> <h4><div id="output" class="jam" ></div></h4></td>
                            </tr>
                        </table>
                        <br />
                        <div style="margin-bottom: 50px;" class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Selamat datang di halaman admin
                        </div>
                    </div>


                    <!-- /top tiles -->
                    <div class="row">
                        <div style="margin-top: 40px;" class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Table Mitra</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <?php
                                    $tampil = ("select * from tb_mitralapangan where status = 'Request'");
                                    $result = mysqli_query($connect, $tampil)or die(mysqli_error());
                                    ?>
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead >
                                            <tr>
                                                <th>No</th>
                                                <th>ID</th>
                                                <th>Nama Mitra</th>
                                                <th>harga</th>
                                                <th>lokasi</th>
                                                <th>status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_array($result)) {
                                                ?> <tr>
                                                    <td><?php echo $counter++ ?></td>
                                                    <td><?php echo $row['id_mitra']; ?></td>
                                                    <td><?php echo $row['nama']; ?></td>
                                                    <td>Rp.<?php echo number_format($row['harga'], 2, ",", "."); ?></td>
                                                    <td><?php echo $row['lokasi']; ?></td>
                                                    <td><?php echo $row['status']; ?></td>
                                                    <td><a class="btn btn-sm btn-primary" href="hal_admin_updatestatus_mitra.php?hal=edit&kd=<?php echo $row['id_mitra']; ?>"><i class="fa fa-edit"></i> Edit</a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /page content -->

                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                        Copyright by <a href="">Melani</a>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>

        <!-- jQuery -->
        <script src="../vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="../vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="../vendors/nprogress/nprogress.js"></script>
        <!-- Datatables -->
        <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
        <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
        <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
        <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
        <script src="../vendors/jszip/dist/jszip.min.js"></script>
        <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
        <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>

    </body>
</html>
