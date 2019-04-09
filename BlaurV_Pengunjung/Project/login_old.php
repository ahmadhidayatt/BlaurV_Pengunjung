<!DOCTYPE html>
<?php
                                    include "../proses/koneksi.php";
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
        <script src="js/jquery-1.11.1.min.js"></script>
        <!-- //js -->
        <!-- login-pop-up -->
        <script src="js/menu_jquery.js"></script>
        <!-- //login-pop-up -->
        <!-- animation-effect -->
        <link href="css/animate.min.css" rel="stylesheet"> 
        <link href="css/login.css" rel="stylesheet"> 
        <script src="js/wow.min.js"></script>
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
                                <div class="col-xs-6">
                                    <a href="#" class="active" id="login-form-link">Login</a>
                                </div>
                                <div class="col-xs-6">
                                    <a href="#" id="register-form-link">Register</a>
                                </div>
                            </div>
                            <hr>
                        </div>
						
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="login-form" action="../proses/proseslogin.php" method="post" role="form" style="display: block;">
                                        <div class="form-group">
                                            <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="ID " value="">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="form-group text-center">
                                            <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                            <label for="remember"> Remember Me</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                   <?php
									$hasil = mysqli_query($connect,"SELECT max(id_pengunjung) as idMaks FROM tb_pengunjung");
									$data  = mysqli_fetch_array($hasil);
									$idMax = $data['idMaks'];
									$noUrut = (int) substr($idMax, 6, 8);
									$noUrut++;
									$format = "CS";
									$newID = $format . sprintf("%05s", $noUrut);
									?>
                                    <form id="register-form" action="../proses/aksi_register.php" method="post" role="form" style="display: none;">
                                        <div class="form-group">
                                            <input type="text" id="id" name="id_pengunjung"  tabindex="1" class="form-control" value="<?php echo $newID;?>" placeholder="" readonly>
                                        </div>
										<input type="hidden" id="id" name="id_pegawai">
                                        <div class="form-group">
                                            <input type="text" name="nama" id="nama" tabindex="1" class="form-control" placeholder="Nama Lengkap" value="" required>
                                        </div>
										 <div class="form-group">
                                            <input type="telp" name="hp" onkeypress="return isNumberKey(event)" tabindex="1" class="form-control" placeholder="No Handphone" required value="">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="" required>
                                        </div> 
                                        <div class="form-group">
                                            <input type="no_ktp" name="no_ktp" onkeypress="return isNumberKey(event)" id="" tabindex="1" class="form-control" placeholder="no_ktp" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <textarea type="text" name="alamat" id="" tabindex="1" class="form-control" placeholder="alamat" value="" required></textarea> 
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="password" name="password" id="pass1" tabindex="2" class="form-control" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="confirm-pass" id="pass2" onkeyup="checkPass();
                                                    return false;" required tabindex="2" class="form-control" placeholder="Repassword">
                                            <span id="confirmMessage" class="confirmMessage"></span>
                                        </div>
										 <div class="form-group">
                                            <input type="hidden" name="level" id="level" tabindex="1" class="form-control" placeholder="level" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
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

        <!-- //for bootstrap working -->
    </body>
</html>