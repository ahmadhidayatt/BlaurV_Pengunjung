<?php
session_start();
    include "../proses/koneksi.php";
	
	$username = $_SESSION['username'];
    $counter = 1;
     $nama = $_SESSION['nama'];
    ?>

<!DOCTYPE html>
<html>
    <head>
        <title>>BLAUR VACATION | Perjalanan Pulau Seribu <?php echo $_SESSION['username']?></title>
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
		<style>
		img {
  opacity: 0.5;
  filter: alpha(opacity=50); /* For IE8 and earlier */
}

img:hover {
  opacity: 1.0;
  filter: alpha(opacity=100); /* For IE8 and earlier */
}
.image{
    position:relative;
    overflow:hidden;
    padding-bottom:100%;
}
.image img{
    position:absolute;
}
        .back {
            background-color: black;
            opacity: 0.8;
            filter: alpha(opacity=50); /* For IE8 and earlier */
        }
		</style>
    </head>

    <body>
        <!-- header -->
        <div class="header-top">
        
        </div>
		
        <?php include './navbar_user.php'; ?>
        <!-- //header -->
        <!-- banner -->
		 <?php 
				$DATE= date("Y-m-d");
				$query1 = mysqli_query($connect,"SELECT * FROM tb_paket_gunung WHERE status_kuota > 0");
				$no =1;
				$results2 = mysqli_fetch_array($query1)
					
	?>
    <?php
function CekPendaftaran($todays_date,$start_date,$end_date)
{
   $start_date = strtotime($start_date); //buka main
   $end_date = strtotime($end_date); //selesai
   $todays_date = strtotime($todays_date); 
   if ($todays_date >= $start_date && $todays_date <= $end_date) 
   { 
      return 0;//BUKA
   } 
   else 
   { 
      if($todays_date < $start_date)
      {
         return 1; //BELUM
      }
      else
      {
         return 2; //LEWAT
      }
   }
}
//Cara memanggilnya
$DATE_NOW= date("Y-m-d");
$START_DATE= $results2['tgl_awal'];
$END_DATE= $results2['tgl_akhir'];
$CekStatus=CekPendaftaran($DATE_NOW,$START_DATE,$END_DATE);
//Sekarang $CekStatus memiliki nilai array yang terdiri dari 3 (0 atau 1 atau 2)
if($CekStatus==1) //1 BELUM BUKA
{
	?>
	
	<div style="margin-top: 10px;" class="banner">
            <div class="banner-pos banner1">
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                <div class="container">
                  <div class="popular-grids">
				
				<center><h1 style=""><font color="red">Opentrip Belum Tersedia</font></h1></center>
			</div>
			<hr/>
			
		</div>
	
	<?php
} 
elseif($CekStatus==2) //2 SUDAH TUTUP
{
	?>
	<div style="margin-top: 10px;" class="banner">
            <div class="banner-pos banner02">
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                <div class="container">
                  <div class="popular-grids">
				
				<center><h1 style=""><font color="red">Pendaftaran Trip sudah berakhir, nantikan opentrip selanjutnya</font></h1></center>
			</div>
			<hr/>
			
		</div>
		<?php
   //Tuliskan pesan jika sudah ditutup
} 
elseif($CekStatus==0) //0 SEDANG BUKA
{
					
	?>
	 <?php 
                $query = mysqli_query($connect,"SELECT * FROM tb_paket_gunung");
                $no =1;
                while($results = mysqli_fetch_array($query)){   ?>
        <div style="margin-top: 10px;" class="banner">

            <div class="banner-pos  back">
                <center><h1>Informasi Trip</h1></center>
                <div class="container" style="padding-top: 50px;">
                  <div class="popular-grids">
                <div class="col-md-4 popular-grid animated wow slideInUp" data-wow-delay=".5s">
				<div class="image">
                    <img src="<?php echo "../../BlaurV_pegawai/images/tiket/" . $results['gambar_gunung']; ?>" width="300" height="300" alt=" " class="img img-responsive full-width hover-shadow" onclick="openModal();currentSlide(<?php echo  $results['id_gunung'] ?>)" />
                     <br/>
                     </div>
                     <center><h1><b></b></h1>
                </div>
                <div class="col-md-4 popular-grid animated wow slideInUp" data-wow-delay=".5s">
                    <div class="popular-grid1">
                    
                        <h1><b><?php echo $results['nama_paket']?></b></h1>
                    
                        <div class="popular-grid1-pos animated wow slideInUp" data-wow-delay=".5s">
                        <br/><br/>
                        
                        </div>
                        </div>
                        <center><h3><br><b>Tanggal Awal Pendaftaran : <?php echo $results['tgl_awal']?></b><br/> <br/></center>
                        <center><h3><b>Tanggal Akhir Pendaftaran : <?php echo $results['tgl_akhir']?></b></h3><br/> <br/></center>
                        
                        <center><h3><b>Include : <?php echo $results['include']?></b></h3> <br/></center>
                        <center><h3><b> <i>Harga : <?php echo $results['harga']?></i></b></h3></center>
                        <center><h3><b> <i>Jumlah Kuota : 20</i></b></h3></center>
                        <center><h3><b> <i>Sisa Kuota : <?php echo $results['status_kuota']?></i></b></h3></center>

                    
                </div>
            
                <div class="clearfix">
                    <b>Informasi Gunung : <?php echo $results['informasi_gunung']?></b>
                </div>
                <b><hr/><br/>
                
                <center><a class="btn btn-large btn-block btn-primary" type="button"  data-tiket="<?php echo $results['id_gunung']; ?>" data-harga="<?php echo $results['harga']; ?>" data-tgl="<?php echo $results['tgl_awal']; ?>" data-pendaki1="<?php echo $nama; ?>" type="button" data-toggle="modal" data-target="#myModal" id="open-AddBookDialog"><i class="fa fa-upload"></i> BOOKING NOW</a>
                                        </div>
            </div>
            <hr/>
            
        </div>
		<?php
									}
}
?>
				<div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog" style="col-lg-12">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Form Transaksi Pembayaran</h4>
                    </div>
					<?php
					$hasil = mysqli_query($connect,"SELECT max(id_boking) as idMaks FROM tb_membayar_pendakian");
					$data  = mysqli_fetch_array($hasil);
					$idMax = $data['idMaks'];
					$noUrut = (int) substr($idMax, 6, 8);
					$noUrut++;
					$format = "TRS";
					$newID = $format . sprintf("%05s", $noUrut);
			?>
                    <div class="modal-body">
						 <?php
                        $tampil = ("select * from tb_pengunjung where id_pengunjung='$username'");
                        $result = mysqli_query($connect, $tampil)or die(mysqli_error());
                        $row = mysqli_fetch_array($result)
                        ?>
                        <form action="../proses/aksi_booking_pendaki.php" method="post" enctype="multipart/form-data" >
                            <div class="col-lg-4">
                                <label for="exampleInputEmail1">ID Booking:</label>
                                <input name="id_pembelian" type="text" value="<?php echo $newID; ?>" class="form-control" readonly>
                            </div>
                            <div class="col-lg-4">
                                <label for="exampleInputEmail1">ID Paket :</label>
                                <input name="id_paket" type="text" class="form-control" id="id_tiket" readonly>
                            </div>
                           
                            <div class="col-lg-4">
                                <label for="exampleInputEmail1">Tgl Pendaftaran :</label>
                                <input name="tgl_pendaftaran" type="text" class="form-control" id="tgl_pertandingan" value="" readonly>
                            </div>
							<br/>
							<br/>
							<br/>
							<br/>
							<div class="form-group">
                                <label for="exampleInputEmail1">ID Pengunjung :</label>
                                <input name="id_pengunjung"  type="text" value="<?php echo $row['id_pengunjung'] ?>"class="form-control" id="harga_p" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Pemesan :</label>
                                <input name="nama"  type="text" value="<?php echo $row['nama'] ?>"class="form-control" id="harga_p" required>
                            </div>
							 <div class="form-group">
                                <label for="exampleInputEmail1">No KTP Pemesan :</label>
                                <input name="no_ktp" value="<?php echo $row['no_ktp'] ?>"class=" onkeypress="return isNumberKey(event)" maxlength="16" type="text" class="form-control" id="harga_p" placeholder="No KTP Pemesan" required>
                            </div>
							 <div class="form-group">
                                <label for="exampleInputEmail1">No Handphone :</label>
                                <input name="no_telp"  type="text" value="<?php echo $row['no_telp'] ?>"class="form-control" id="harga_p" required>
                            </div>
							 <div class="form-group">
                                <label for="exampleInputEmail1">Email :</label>
                                <input name="email"  type="text" value="<?php echo $row['email'] ?>"class="form-control" id="harga_p" required>
                            </div>
							
								
							<div class="form-group">
                                <label for="exampleInputEmail1">Harga</label>
                                <input name="harga"  type="text" class="form-control" readonly=""  id="harga"  required>
                            </div>
							
							<div class="form-group">
                                <label for="exampleInputEmail1"> Jumlah Pengunjung :</label>
                                <select name="jumlah_pendaki"  type="text" class="form-control" id="slct" onchange="sum();">
                                            <option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
								</select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Pengunjung 1</label>
                                <input name="nama_penonton1"  type="text" class="form-control"  id="pendaki1"  required>
                            </div>
							 <div class="form-group"  id="container">
							 </div>
							 
							
							<div class="form-group">
							 <label for="exampleInputEmail1">Total Harga</label>
                                <input name="jumlah_harga"  type="text" class="form-control" id="txt3" readonly required>
                          </div>
                          
                                <input name="status"  type="hidden" class="form-control" value="Belum Diverifikasi" readonly required>
                            
							
			

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="submit" name="register-booking" id="register-submit" class="btn btn-lg btn-primary" value="BOOKING">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
		<!-- The Modal/Lightbox -->
<div id="myModal_picture" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content">
 <?php 
                $query = mysqli_query($connect,"SELECT * FROM tb_paket_gunung");
                $no =1;
                while($results = mysqli_fetch_array($query)){   ?>
				<div class="mySlides">
    
      <img src="<?php echo "../../BlaurV_pegawai/images/tiket/" . $results['gambar_gunung']; ?>" style="width:100%">
    </div>
				<?php
				
				}?>
    

   

    <!-- Next/previous controls -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <!-- Caption text -->
    <div class="caption-container">
      <p id="caption"></p>
    </div>
 <?php 
                $query = mysqli_query($connect,"SELECT * FROM tb_paket_gunung");
                $no =1;
                while($results = mysqli_fetch_array($query)){   ?>
				<div class="mySlides">
      <div class="column">
      <img class="demo" src="<?php echo "../../BlaurV_pegawai/images/tiket/" . $results['gambar_gunung']; ?>" onclick="currentSlide(<?php echo $results['id_gunung']?>)" alt="Nature">
    </div>
      <img src="<?php echo "../../BlaurV_pegawai/images/tiket/" . $results['gambar_gunung']; ?>" style="width:100%">
    </div>
				<?php
				
				}?>
    <!-- Thumbnail image controls -->
  

    
</div>
	</div>
                    <!---/End-date-piker---->
                  
                    
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



        <div id="map"></div>

        <div class="popular">
            <div class="container">
                <h3 class="animated wow zoomIn" data-wow-delay=".5s"></h3><br/>
               
            </div>
        </div>

        <!-- //popular -->
        <!-- footer -->
        <?php include './footer.php'; ?>
		 <script>
                $(document).on("click", "#test-element", function () {
                    alert("click bound to document listening for #test-element");
                });

                $(document).on("click", "#open-AddBookDialog", function () {
				
                    var myBookTiket = $(this).data('tiket');
                    var myBookTanggal = $(this).data('tgl');
                    var myBookharga = $(this).data('harga');
                    var myBoopendaki1 = $(this).data('pendaki1');
                    $("#id_tiket").val(myBookTiket); 
                    $("#tgl_pertandingan").val(myBookTanggal);
                     $("#harga").val(myBookharga);
                     $("#pendaki1").val(myBoopendaki1);
                    // As pointed out in comments, 
                    // it is superfluous to have to manually call the modal.
                    // $('#addBookDialog').modal('show');
                });
        </script>
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

		<script type="text/javascript">
    $(document).ready(function () {

        $('#slct').change(function () {
            var value = $(this).val(); var toAppend = '';
            if (value == 2) {
				
                toAppend = "<label > Nama Pengunjung :</label><br/><input name='nama_penonton2'  type='text' class='form-control' placeholder='Nama Pengunjung 2 Sesuai KTP' required>"; $("#container").html(toAppend); return;
            }
            if (value == 3) {
                toAppend = "<label > Nama Pengunjung :</label><br/><input name='nama_penonton2' id='pendaki1'  type='text' class='form-control' placeholder='Nama Pengunjung 2 Sesuai KTP' required><br/><input name='nama_penonton3'  type='text' class='form-control' placeholder='Nama Pengunjung 3 Sesuai KTP' required>"; $("#container").html(toAppend); return;
            }
            if (value == 4) {
                toAppend = "<label > Nama Pengunjung :</label><br/><input name='nama_penonton2' id='pendaki1' type='text' class='form-control' placeholder='Nama Pengunjung 2 Sesuai KTP' required><br/><input name='nama_penonton3'  type='text' class='form-control' placeholder='Nama Pengunjung 3 Sesuai KTP' required><br/><input name='nama_penonton4'  type='text' class='form-control' placeholder='Pengunjung Pendaki 4 Sesuai KTP' required>"; $("#container").html(toAppend); return;
            }
            if (value == 1) {
                toAppend = ""; $("#container").html(toAppend); return;
            }
        });

    });
     </script>
	 <script>
	 function sum() {
       var txtFirstNumberValue = document.getElementById('slct').value;
       var txtSecondNumberValue = document.getElementById('harga').value;
       if (txtFirstNumberValue == "")
           txtFirstNumberValue = 0;
       if (txtSecondNumberValue == "")
           txtSecondNumberValue = 0;

       var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
       if (!isNaN(result)) {
           document.getElementById('txt3').value = result;
       }
   }
	 </script>
	 
	  <script type="text/javascript">
<?php echo $jsArray; ?>
            function changeValue(id) {
//                alert(id);
                document.getElementById('harga').value = nama_tribun[id].name2;
                document.getElementById('id').value = nama_tribun[id].name;
            }
            ;

        </script>
		<script>
		function isNumberKey(evt)
                                                {
                                                    var charCode = (evt.which) ? evt.which : event.keyCode
                                                    if (charCode > 31 && (charCode < 48 || charCode > 57))
                                                        return false;
                                                    return true;
                                                };
												</script>
    </body>
</html>