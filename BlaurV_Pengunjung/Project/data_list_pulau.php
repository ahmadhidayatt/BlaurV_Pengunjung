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
$DATE_NOW= date("Y-m-d H:m:s");
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
				
      <div class="col-lg-4 col-sm-4 col-xs-6"><a title="Image 1" href="#"><img class="thumbnail img-responsive" src="<?php echo "../../E_mounttrip_Pegawai/images/tiket/" . $results['gambar_gunung']; ?>"></a></div>
        
		<?php
									}
}
?>


<div tabindex="-1" class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
		<button class="close" type="button" data-dismiss="modal">×</button>
		<h3 class="modal-title">Heading</h3>
	</div>
	<div class="modal-body">
		
	</div>
	<div class="modal-footer">
		<button class="btn btn-default" data-dismiss="modal">Close</button>
	</div>
   </div>
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