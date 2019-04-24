<!DOCTYPE html>
<html class="no-js">
        <?php 
date_default_timezone_set('Asia/Jakarta');
include"config/koneksi.php";
?>
    <head>
        <title>Admin Home page</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">

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
                                <div class="muted pull-left">Form Data Paket</div>
                            </div>
							  <?php
								$hasil = mysqli_query($connect,"SELECT max(id_gunung) as idMaks FROM tb_paket_gunung");
								$data  = mysqli_fetch_array($hasil);
								$idMax = $data['idMaks'];
								$noUrut = (int) substr($idMax, 2, 6);
								$noUrut++;
								$format = "G";
								$newID = $format . sprintf("%03s", $noUrut);
							?>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form class="form-horizontal" action="aksi_tiket.php" method="POST" enctype="multipart/form-data">
                                      <fieldset>
                                        <legend>Data Paket</legend>
                                        <div class="control-group">
                                          <label class="control-label">ID Paket pulau </label>
                                          <div class="controls">
                                            <input type="text" class="span6" name="id_tiket" value="<?php echo $newID;?>" readonly>
                                          </div>
                                        </div>
										 <div class="control-group">
                                          <label class="control-label" for="date01">Tanggal Awal Pendaftaran</label>
                                          <div class="controls">
                                            <input type="text" class="input-xlarge datepicker" name="tgl_pertandingan" id="date01" placeholder="Klik Disini">
                                           
                                          </div>
                                        </div>
										<div class="control-group">
                                          <label class="control-label" for="date01">Tanggal Akhir Pendaftaran</label>
                                          <div class="controls">
                                            <input type="text" class="input-xlarge datepicker" name="tgl_setelah_pertandingan" id="date01" placeholder="Klik Disini">
                                           
                                          </div>
                                        </div>
										<div class="control-group">
                                          <label class="control-label">Nama Paket</label> 
                                          <div class="controls">
                                            <input type="text" class="span6" name="Nama">
                                          </div>
                                        </div>
										<div class="control-group">
                                          <label class="control-label">Harga</label>
                                          <div class="controls">
                                            <input type="text" class="span6" name="Harga" >
                                          </div>
                                        </div>
										 <div class="control-group">
                                          <label class="control-label">Status Kuota</label>
                                          <div class="controls">
                                            <input type="text" name="status_kuota" id="" class="input-file uniform_on" >
                                          </div>
                                        </div>
										<div class="control-group">
                                          <label class="control-label">Informasi pulau</label>
                                          <div class="controls">
                                            <textarea type="text" class="span6" name="Informasi"></textarea>
                                          </div>
                                        </div>
										 <div class="control-group">
                                          <label class="control-label">Gambar pulau</label>
                                          <div class="controls">
                                            <input type="file" name="logo_tuanrumah"  class="input-file uniform_on" >
                                          </div>
                                        </div>
									
										<div class="control-group">
                                          <label class="control-label">Include</label>
                                          <div class="controls">
                                          <textarea type="text" class="span6" name="include"></textarea> 
                                          </div>
                                        </div>
										
									     
                                        <div class="form-actions">
                                          <button type="submit" name="insert_tiket" class="btn btn-primary">Submit</button>
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
            $(".datepicker").datepicker({ dateFormat: 'yy-mm-dd' });

        });
        </script>

