<?php

include "./koneksi.php";




use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/autoload.php';




$id_peng = $_POST['id_pengunjung'];
$id_peg = $_POST['id_pegawai'];
$nama_lengkap = $_POST['nama'];
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$ktp = $_POST['no_ktp'];
$password = $_POST['password'];
$tgl = date("Y-m-d H:i:s");

$query = ("INSERT INTO tb_pengunjung (id_pengunjung, id_pegawai, nama, no_telp, alamat, no_ktp, email, password, tgl_pendaftaran)"
        . "VALUES ('$id_peng', "
        . "'P0001', "
        . "'$nama_lengkap', "
        . "'$hp', "
        . "'$alamat', "
		. "'$ktp', "
        . "'$email', "
        . "'$password', "
		. "'$tgl')");
$result = mysqli_query($connect, $query)or die(mysqli_error());
 if ($query) {
        echo "<script>alert('Data Berhasil Dikirim, terima kasih atas partisipasinya silahkan tunggu respond dari kami');  window.history.back();</script>";
    } else {
        echo 'GAGAL MENGUPLOAD GAMBAR';
    }


$res  = mysqli_query($connect,"SELECT * FROM tb_pengunjung where id_pengunjung='$id_peng'") or die(mysqli_error($connect));

    
if($res && mysqli_num_rows($res)>0)
{
    $data = mysqli_fetch_assoc($res);
   
$id_pengunjung = $data['id_pengunjung'];
$nama = $data['nama'];
$hp = $data['no_telp'];
$email = $data['email'];
$password = $data['password'];
	

    $mail = new PHPMailer(true);
try {
    $subject = "Registrasi Berhasil";
    $content = "<div class ='main-container'>

<div class='highlight' style='margin-left:0;'>
<h2><b>Hello $nama</b></h2>
	<div class='row'>
  
		
        <img src ='http://davidnaylor.org/temp/thunderbird-logo-200x200.png' /> 
    
        </div>
        <div class='row'>
        <p> <h2>Terima kasih telah melakukan registrasi pada  sistem pemesanan E-Trip. <br/><br/>SIlahkan login untuk melanjutkan proses pemesanan tiket ! 
		</h2></p>
		<h3><br/><a href='http://localhost/GoTicket_user/Project/login.php' class='btn btn-sm btn-primary'>Login now</a></h3>
			<h2><br/><br/>Berikut Data hak akses Anda
		</h2></p>
			
        <p><h3>    username : $id_peng<br/><br/>
                  password : $password<br/><br/> </h2>
       
					
      
        </div>
    </div>
	</div>
</div>
</div>";
    

     //Server settings
    $mail->SMTPDebug = 1;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'hermawanandry29@gmail.com';                 // SMTP username
    $mail->Password = 'andry077';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587; // or 587


    $mail->SetFrom("scnd.hermawanandry29@gmail.com", "Admin E-Trip");
    $mail->AddReplyTo("scnd.hermawanandry29@gmail.com", "Admin E-Trip");
    $mail->AddAddress($email); // you can't pass php variables in single goutes like '$userEmail'. 
    $mail->Subject = $subject;
    $mail->MsgHTML($content);
    $mail->IsHTML(true);
 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo 'Message has been sent to '; 
    echo $email;
    echo "<br/>";
   	header('location:../Project/data_pertandingan_pembeli.php');
 }
	} catch (Exception $e) {
	    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
}
  








?>