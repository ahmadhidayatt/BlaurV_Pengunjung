<!DOCTYPE html>
<html class="no-js">
        <?php 
date_default_timezone_set('Asia/Jakarta');
include"config/koneksi.php";
?>
    <head>
        <title>Admin Home Page</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
        <?php 
		include "navbar_user.php";
	?>
	<div class="span9" id="content">
                      <!-- morris stacked chart -->
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Form Data Pegawai</div>
                            </div>
							  <?php
								$hasil = mysqli_query($connect,"SELECT max(id_pegawai) as idMaks FROM tb_pegawai");
								$data  = mysqli_fetch_array($hasil);
								$idMax = $data['idMaks'];
								$noUrut = (int) substr($idMax, 2, 6);
								$noUrut++;
								$format = "P";
								$newID = $format . sprintf("%03s", $noUrut);
							?>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form class="form-horizontal" action="aksi_form_administrator.php" method="POST">
                                      <fieldset>
                                        <legend>Data Pegawai</legend>
                                        <div class="control-group">
                                          <label class="control-label">ID Pegawai </label>
                                          <div class="controls">
                                            <input type="text" class="span6" name="id_pegawai" value="<?php echo $newID;?>" readonly>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <label class="control-label">Username</label>
                                          <div class="controls">
                                            <input type="text" class="span6" name="nama">
                                          </div>
                                        </div>
										<div class="control-group">
                                          <label class="control-label">Password</label>
                                          <div class="controls">
                                            <input type="text"  maxlength="13" class="span6" name="password" >
                                          </div>
                                        </div>
										<div class="control-group">
                                          <label class="control-label">Level</label>
                                          <div class="controls">
                                            <select type="text" class="span6" name="level">
											<option value=""><label>--Jenis Level--</label>
											<option value="pegawai"><label>Pegawai</label>
												<option value="Admin Komunitas"><label>Admin Komunitas</label>
											</select>
                                          </div>
                                       
                                       
                                        <div class="form-actions">
                                          <button type="submit" name="insert_administrator" class="btn btn-primary">Save changes</button>
                                          <button type="reset" class="btn">Cancel</button>
                                        </div>
                                      </fieldset>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					 <link href="vendors/datepicker.css" rel="stylesheet" media="screen">
        <link href="vendors/uniform.default.css" rel="stylesheet" media="screen">
        <link href="vendors/chosen.min.css" rel="stylesheet" media="screen">

        <link href="vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">

        <script src="vendors/jquery-1.9.1.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/jquery.uniform.min.js"></script>
        <script src="vendors/chosen.jquery.min.js"></script>
        <script src="vendors/bootstrap-datepicker.js"></script>

        <script src="vendors/wysiwyg/wysihtml5-0.3.0.js"></script>
        <script src="vendors/wysiwyg/bootstrap-wysihtml5.js"></script>

        <script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

	<script type="text/javascript" src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
	<script src="assets/form-validation.js"></script>
        
	<script src="assets/scripts.js"></script>
        <script>

	jQuery(document).ready(function() {   
	   FormValidation.init();
	});
	

        $(function() {
            $(".datepicker").datepicker();
            $(".uniform_on").uniform();
            $(".chzn-select").chosen();
            $('.textarea').wysihtml5();

            $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                $('#rootwizard').find('.bar').css({width:$percent+'%'});
                // If it's the last tab then hide the last button and show the finish instead
                if($current >= $total) {
                    $('#rootwizard').find('.pager .next').hide();
                    $('#rootwizard').find('.pager .finish').show();
                    $('#rootwizard').find('.pager .finish').removeClass('disabled');
                } else {
                    $('#rootwizard').find('.pager .next').show();
                    $('#rootwizard').find('.pager .finish').hide();
                }
            }});
            $('#rootwizard .finish').click(function() {
                alert('Finished!, Starting over!');
                $('#rootwizard').find("a[href*='tab1']").trigger('click');
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

