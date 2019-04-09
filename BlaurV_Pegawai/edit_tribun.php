<!DOCTYPE html>
<html class="no-js">
        <?php 
date_default_timezone_set('Asia/Jakarta');
include"config/koneksi.php";

		$id_tribun	= $_GET['id_tribun'];
		$query	= mysqli_query($connect,"select * from tb_kategori_tribun where id_tribun='$id_tribun'");
		$rows	= mysqli_fetch_array($query);
		$nama_tribun = $rows['nama_tribun'];
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
                                <div class="muted pull-left">Form Data Kategori Tribun Penonton</div>
                            </div>
							 
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form class="form-horizontal" action="aksi_edit_tribun.php" method="POST" enctype="multipart/form-data">
                                      <fieldset>
                                        <legend>Data Tribun </legend>
                                        <div class="control-group">
                                          <label class="control-label">Kode Tribun</label>
                                          <div class="controls">
                                            <input type="text" class="span6" name="id_tribun" value="<?php echo $rows['id_tribun'];?>" readonly>
                                          </div>
                                        </div>
										 <div class="control-group">
                                          <label class="control-label"></label>
                                          <div class="controls">
										  <img src="img_stadion/Capture.PNG" width="400" height="400"><br/><br/>
                                          </div>
                                        </div>
                                            <input type="hidden" class="span6" name="id_tiket">
										
                                         
										<div class="control-group">
                                          <label class="control-label">Nama Tribun</label>
                                          <div class="controls">
                                            <select type="text" class="span6" name="nama_tribun">
											<option value=""><label>--Pilih Tribun--</label>
											<option <?php
                                                    if ($nama_tribun == 'Tribun Barat') {
                                                        echo "selected";
                                                    }
                                                    ?> value="Tribun Barat"><label>Tribun Barat</label>
											<option <?php
                                                    if ($nama_tribun == 'Tribun Utara') {
                                                        echo "selected";
                                                    }
                                                    ?> value="Tribun Utara"><label>Tribun Utara</label>
											<option <?php
                                                    if ($nama_tribun == 'Tribun Timur') {
                                                        echo "selected";
                                                    }
                                                    ?> value="Tribun Timur"><label>Tribun Timur</label>
											<option <?php
                                                    if ($nama_tribun == 'Tribun Selatan') {
                                                        echo "selected";
                                                    }
                                                    ?> value="Tribun Selatan"><label>Tribun Selatan</label>
											<option <?php
                                                    if ($nama_tribun == 'VIP Tribun Barat') {
                                                        echo "selected";
                                                    }
                                                    ?> value="VIP Tribun Barat"><label>VIP Tribun Barat</label>
											</select>
                                          </div>
                                        </div>
										 
										<div class="control-group">
                                          <label class="control-label">Kuota Tribun</label>
                                          <div class="controls">
                                            <input type="text" class="span6" name="kuota_tribun" value="<?php echo $rows['kuota_tribun'];?>" >
                                          </div>
                                        </div>
										<div class="control-group">
                                          <label class="control-label">Harga</label>
                                          <div class="controls">
                                            <input type="text" class="span6" name="harga" value="<?php echo $rows['harga'];?>">
                                          </div>
                                        </div>
									     
                                        <div class="form-actions">
                                          <button type="submit" name="edit_tribun" class="btn btn-primary">Submit</button>
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
        </script>

