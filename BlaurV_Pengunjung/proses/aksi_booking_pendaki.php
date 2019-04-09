<?php
include "../proses/koneksi.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/autoload.php';



//input data Pegawai
if(isset($_POST['register-booking']))
{
	$id_pembeli			    = $_POST['id_pembelian'];
	$id_paket				= $_POST['id_paket'];
	$id_pengunjung			= $_POST['id_pengunjung'];
	$tgl_pendaftaran			= $_POST['tgl_pendaftaran'];
	$no_ktp	   		= $_POST['no_ktp'];
	$no_telp   				= $_POST['no_telp'];
	$email	    			= $_POST['email'];
	$jumlah_beli	    	= $_POST['jumlah_pendaki'];
	$nama_penonton1	    	= $_POST['nama_penonton1'];
	$nama_penonton2	 		= $_POST['nama_penonton2'];
	$nama_penonton3			= $_POST['nama_penonton3'];
	$nama_penonton4	 		= $_POST['nama_penonton4'];
	$harga          		= $_POST['harga'];
	$jumlah_harga	        = $harga * $jumlah_beli;
	$status       = $_POST['status'];

$seed = str_split('123456789'); // and any other characters
    shuffle($seed); // probably optional since array_is randomized; this may be redundant
    $rand = '';
    foreach (array_rand($seed, 3) as $k) $rand .= $seed[$k];
 
    echo $rand;
     $new = substr($jumlah_harga, 0, -3) . $rand;

  

    
    $query = mysqli_query($connect, "INSERT INTO `tb_membayar_pendakian` (`id_boking`, `id_gunung`, `id_pengunjung`, `id_pegawai`, `status_pembayaran`, `tgl_pembayaran`, `total_harga`, `jumlah_pendaki`, `pendaki1`, `pendaki2`, `pendaki3`, `pendaki4`, `bukti_transfer`) VALUES ('$id_pembeli','$id_paket','$id_pengunjung','P0001','$status','$tgl_pendaftaran','$jumlah_harga','$jumlah_beli', '$nama_penonton1','$nama_penonton2','$nama_penonton3','$nama_penonton4', 'none.jpg')");

//email 
  
	$res  = mysqli_query($connect,"SELECT tb_pengunjung.nama, tb_pengunjung.id_pengunjung, tb_pengunjung.email, tb_membayar_pendakian.id_boking, tb_paket_gunung.nama_paket,tb_paket_gunung.id_gunung, tb_paket_gunung.tgl_akhir FROM tb_pengunjung, tb_paket_gunung, tb_membayar_pendakian WHERE tb_pengunjung.id_pengunjung = tb_membayar_pendakian.id_pengunjung AND tb_paket_gunung.id_gunung = tb_membayar_pendakian.id_gunung and tb_membayar_pendakian.id_boking='$id_pembeli' ") or die(mysqli_error($connect));

    
 
    echo $rand;

	if($res && mysqli_num_rows($res)>0)
	{
    $data = mysqli_fetch_assoc($res);
    $userEmail				= $data['email']; // now this is your email id variable for user's email address.
  	$nama 					= $data['nama'];	
    $id_pembelian           = $data['id_boking'];
    $id_gunung               = $data['id_gunung'];
    $id_customer            = $data['id_pengunjung'];
    $nama_paket           = $data['nama_paket'];
    $tgl_akhir           = $data['tgl_akhir'];
   
	

   
  
   ob_start(); //STARTS THE OUTPUT BUFFER
include('some_page.php');  //INCLUDES YOUR PHP PAGE AND EXECUTES THE PHP IN THE FILE
$some_page_contents = ob_get_contents() ;  //PUT THE CONTENTS INTO A VARIABLE
ob_clean();  //CLEAN OUT THE OUTPUT BUFFER

    $mail = new PHPMailer(true);
	try {
    $subject = "Yo Ayoo! Segera Lakukan Pembayaran";
	$content = '
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <meta name="format-detection" content="telephone=no"/>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"></link>


    <style type="text/css">
        [data-toggle="collapse"]:after {
display: inline-block;
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  content: "\f054";
  transform: rotate(90deg) ;
  transition: all linear 0.25s;
  float: right;
  }   
[data-toggle="collapse"].collapsed:after {
  transform: rotate(0deg) ;
}

    </style>

    <!-- MESSAGE SUBJECT -->
    <title>Responsive HTML email templates</title>

</head>

<!-- BODY -->
<!-- Set message background color (twice) and text color (twice) -->
<body topmargin="0" rightmargin="0" bottommargin="0" leftmargin="0" marginwidth="0" marginheight="0" width="100%" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
    background-color: #2D3445;
    color: #FFFFFF;"
    bgcolor="#2D3445"
    text="#FFFFFF">




<!-- SECTION / BACKGROUND -->
<!-- Set message background color one again -->
<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;" class="background"><tr><td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;"
    bgcolor="#2D3445">

<!-- WRAPPER -->
<!-- Set wrapper width (twice) -->
<table border="0" cellpadding="0" cellspacing="0" align="center"
    width="500" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
    max-width: 500px;" class="wrapper">

    <tr>
        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
            padding-top: 20px;
            padding-bottom: 20px;">

            <!-- PREHEADER -->
            <!-- Set text color to background color -->
            <div style="display: none; visibility: hidden; overflow: hidden; opacity: 0; font-size: 1px; line-height: 1px; height: 0; max-height: 0; max-width: 0;
                color: #2D3445;" class="preheader">
                </div>

            
            <a target="_blank" style="text-decoration: none;"
                href="https://github.com/konsav/email-templates/"><img border="0" vspace="0" hspace="0"
                src="https://lh3.googleusercontent.com/zKT8drX_la_mqWgm7mUrerP378OzxwHbe-mfgKVQ9WcXDNGqgrqTFIE1YCkLEFo_KwozCg=s170"
                width="100" height="30"
                alt="Logo" title="Logo" style="
                color: #FFFFFF;
                font-size: 10px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;" /></a>

        </td>
    </tr>

    <!-- HERO IMAGE -->
    <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 (wrapper x2). Do not set height for flexible images (including "auto"). URL format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Ìmage-Name}}&utm_campaign={{Campaign-Name}} -->
    <tr>
        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;
            padding-top: 0px;" class="hero"><a target="_blank" style="text-decoration: none;"
            href="https://github.com/konsav/email-templates/"><img border="0" vspace="0" hspace="0"
            src="https://raw.githubusercontent.com/konsav/email-templates/master/images/hero-block.png"
            alt="Please enable images to view this content" title="Hero Image"
            width="340" style="
            width: 87.5%;
            max-width: 340px;
            color: #FFFFFF; font-size: 13px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;"/></a></td>
    </tr>

    <tr>
        
    </tr>

    <!-- SUPHEADER -->
    <!-- Set text color and font family ("sans-serif" or "Georgia, serif") -->
    <tr>
        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 14px; font-weight: 400; line-height: 150%; letter-spacing: 2px;
            padding-top: 27px;
            padding-bottom: 0;
            color: #FFFFFF;
            font-family: sans-serif;" class="supheader">
                Hallo '. $nama .' 
        </td>
    </tr>

    <!-- HEADER -->
    <!-- Set text color and font family ("sans-serif" or "Georgia, serif") -->
    <tr>
        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;  padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%;
            padding-top: 5px;
            color: #FFFFFF;
            font-family: sans-serif;" class="header">
                Segera Lakukan Pembayaran
        </td>
    </tr>

    <!-- PARAGRAPH -->
    <!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
    <tr>
        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
            padding-top: 15px; 
            color: #FFFFFF;
            font-family: sans-serif;" class="paragraph">
                Ke Nomer Rekening : 25051995 (BANK MANDIRI)
                
        </td>


    </tr>

     <tr>
        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;
            padding-top: 0px;" class="hero">
                
                <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->




            </td>
    </tr>

    <tr>
        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
            padding-top: 15px; 
            color: #FFFFFF;
            font-family: sans-serif;" class="paragraph">
                Dengan Jumlah Pembayaran : Rp.'.$new.'
        </td>
    </tr>

    <tr>
        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
            padding-top: 15px; 
            color: #FFFFFF;
            font-family: sans-serif;" class="paragraph">
                Atas Nama : Muhammad Fadhil
        </td>
    </tr>
    <br/>
    <br/>
    
    
    <!-- HEADER -->
    <!-- Set text color and font family ("sans-serif" or "Georgia, serif") -->
    <tr>
        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;  padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%;
            padding-top: 5px;
            color: #FFFFFF;
            font-family: sans-serif;" class="header">
                Data Pesanan Anda
        </td>
    </tr>
    
    <tr>
        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
            padding-top: 15px; 
            color: #FFFFFF;
            font-family: sans-serif;" class="paragraph">
                Nama Pemesan : '.$nama.'
        </td>
    </tr>
    
    <tr>
        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
            padding-top: 15px; 
            color: #FFFFFF;
            font-family: sans-serif;" class="paragraph">
                Kode Booking : '.$id_pembelian.'
        </td>
    </tr>
    
    <tr>
        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
            padding-top: 15px; 
            color: #FFFFFF;
            font-family: sans-serif;" class="paragraph">
                Jumlah Pengunjung : '.$jumlah_beli.' Pengunjung
        </td>
    </tr>
    
    <tr>
        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
            padding-top: 15px; 
            color: #FFFFFF;
            font-family: sans-serif;" class="paragraph">
                Nama Paket Trip Anda : '.$nama_paket.' 
        </td>
    </tr>
    
    
    <tr>
        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
            padding-top: 15px; 
            color: #FFFFFF;
            font-family: sans-serif;" class="paragraph">
                Tanggal Perjalanan : '.$tgl_akhir.' 
        </td>
    </tr>
   

    <!-- BUTTON -->
    <!-- Set button background color at TD, link/text color at A and TD, font family ("sans-serif" or "Georgia, serif") at TD. For verification codes add "letter-spacing: 5px;". Link format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Button-Name}}&utm_campaign={{Campaign-Name}} -->
    <tr>
        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
            padding-top: 25px;
            padding-bottom: 5px;" class="button"><a
            http://localhost/GoTicket_user/Project/konfirmasi_pembayaran.php" target="_blank" style="text-decoration: underline;">
                <table border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 240px; min-width: 120px; border-collapse: collapse; border-spacing: 0; padding: 0;"><tr><td align="center" valign="middle" style="padding: 12px 24px; margin: 0; text-decoration: underline; border-collapse: collapse; border-spacing: 0; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; -khtml-border-radius: 4px;"
                    bgcolor="#E9703E"><a target="_blank" style="text-decoration: underline;
                    color: #FFFFFF; font-family: sans-serif; font-size: 17px; font-weight: 400; line-height: 120%;"
                    http://localhost/GoTicket_user/Project/konfirmasi_pembayaran.php">
                        TERIMA KASIH
                    </a>
            </td></tr></table></a>
        </td>
    </tr>

    <!-- LINE -->
    <!-- Set line color -->
    <tr>
        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
            padding-top: 30px;" class="line"><hr
            color="#565F73" align="center" width="100%" size="1" noshade style="margin: 0; padding: 0;" />
        </td>
    </tr>

    <!-- FOOTER -->
    <!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
    <tr>
        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 13px; font-weight: 400; line-height: 150%;
            padding-top: 10px;
            padding-bottom: 20px;
            color: #828999;
            font-family: sans-serif;" class="footer">

                This email template was sent to&nbsp;you becouse we&nbsp;want to&nbsp;make the&nbsp;world a&nbsp;better place. You&nbsp;could change your <a href="https://github.com/konsav/email-templates/" target="_blank" style="text-decoration: underline; color: #828999; font-family: sans-serif; font-size: 13px; font-weight: 400; line-height: 150%;">subscription settings</a> anytime.

                <!-- ANALYTICS -->
                <!-- https://www.google-analytics.com/collect?v=1&tid={{UA-Tracking-ID}}&cid={{Client-ID}}&t=event&ec=email&ea=open&cs={{Campaign-Source}}&cm=email&cn={{Campaign-Name}} -->
                <img width="1" height="1" border="0" vspace="0" hspace="0" style="margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;"
                src="https://raw.githubusercontent.com/konsav/email-templates/master/images/tracker.png" />

        </td>
    </tr>

<!-- End of WRAPPER -->
</table>


<!-- End of SECTION / BACKGROUND -->
</td></tr></table>



</body>
</html>';

    

     //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'hermawanandry29@gmail.com';                 // SMTP username
    $mail->Password = 'andry077';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587; // or 587


    $mail->SetFrom("scnd.hermawanandry29@gmail.com", "Admin E-Trip");
    $mail->AddReplyTo("scnd.hermawanandry29@gmail.com", "Admin E-Trip");
    $mail->AddAddress($userEmail); // you can't pass php variables in single goutes like '$userEmail'. 
    $mail->Subject = $subject;
    $mail->MsgHTML($content);
    $mail->IsHTML(true);
	if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
    echo 'Message has been sent to '; 
    echo $userEmail;
    echo "<br/>";
   echo "<script>alert('Data Booking berhasil'); window.location = '../Project/hal_user_bookinglist.php'</script>";	
	}
	} catch (Exception $e) {
	    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
	}
}
   


	
 }






 ?>