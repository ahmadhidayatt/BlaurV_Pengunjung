<!DOCTYPE html>
<html class="no-js">
        <?php 
date_default_timezone_set('Asia/Jakarta');
include"config/koneksi.php";

		$id_tiket		= $_GET['id_tiket'];
		$query	= mysqli_query($connect,"select * from tb_paket_gunung where id_gunung='$id_tiket'");
		$rows	= mysqli_fetch_array($query);
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
                                <div class="muted pull-left">Form Data Paket Gunung</div>
                            </div>
							  
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form class="form-horizontal" action="aksi_tiket.php" method="POST" enctype="multipart/form-data">
                                      <fieldset>
                                        <legend>Data Paket Gunung</legend>
                                        <div class="control-group">
                                          <label class="control-label">ID Gunung </label>
                                          <div class="controls">
                                            <input type="text" class="span6" name="id_tiket" value="<?php echo $rows['id_gunung'];?>" readonly>
                                          </div>
                                        </div>
										  <div class="control-group">
                                          <label class="control-label" for="date01">Nama Paket</label>
                                          <div class="controls">
                                            <input type="text" class="input-xlarge datepicker" name="tgl_pertandingan" id="date01" placeholder="Klik Disini" value="<?php echo $rows['nama_paket'];?>">
                                           
                                          </div>
                                        </div>
										<div class="control-group">
                                          <label class="control-label" for="date01">Harga</label>
                                          <div class="controls">
                                            <input type="text" class="input-xlarge " name="harga"  placeholder="Klik Disini" value="<?php echo $rows['harga'];?>">
                                           
                                          </div>
                                        </div>
										<div class="control-group">
                                          <label class="control-label">Status Kuota</label> 
                                          <div class="controls">
                                            <input type="text" class="span6" name="jam_pertandingan" value="<?php echo $rows['status_kuota'];?>">
                                          </div>
                                        </div>
										<div class="control-group">
                                          <label class="control-label">Tanggal Awal Pendafataran</label>
                                          <div class="controls">
                                            <input type="date" class="span6" name="tgl_awal"  value="<?php echo $rows['tgl_awal'];?>" >
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label">Tanggal Akhir Pendafataran</label>
                                          <div class="controls">
                                            <input type="date" class="span6" name="tgl_akhir"  value="<?php echo $rows['tgl_akhir'];?>" >
                                          </div>
                                        </div>
										 <div class="control-group">
                                          <label class="control-label">Gambar Gunung</label>
                                          <div class="controls">
											<img src="images/tiket/<?php echo $rows['gambar_gunung'];?>" width="120" height="120"><br/><br/>
                                            <input type="file" name="logo_tuanrumah" id="logo_tuanrumah" value="<?php echo $rows['gambar_gunung'];?>" class="input-file uniform_on">
                                          </div>
                                        </div>
										
									
									 <div class="control-group">
                                          <label class="control-label">Informasi Gunung</label>
                                          <div class="controls">
                                            <textarea type="text" class="span6" name="lokasi_pertandingan" value=""><?php echo $rows['informasi_gunung'];?>
                                            </textarea>
                                          </div>
                                        </div>
                                        	<div class="control-group">
                                          <label class="control-label">Include</label>
                                          <div class="controls">
                                         <textarea type="text" class="span6" name="include" ><?php echo $rows['include'];?></textarea>
                                          </div>
                                        </div>
									     
                                        <div class="form-actions">
                                          <button type="submit" name="update_tiket" class="btn btn-primary">Submit</button>
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

