<?php
include"config/koneksi.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/autoload.php';

  
 $tgl_baru = mysqli_real_escape_string($connect, $_POST["tgl_baru"]);
 $id_paket = mysqli_real_escape_string($connect, $_POST["id_paket"]);

$query = ("UPDATE tb_paket_gunung SET  `tgl_akhir` = '$tgl_baru' WHERE id_gunung = '$id_paket' ");

$result2 = mysqli_query($connect, $query)or die(mysqli_error());
if ($result2){


    $result  = mysqli_query($connect,"SELECT tb_membayar_pendakian.id_pengunjung, tb_pengunjung.nama, tb_pengunjung.email, tb_paket_gunung.tgl_akhir, tb_paket_gunung.nama_paket FROM tb_paket_gunung,tb_membayar_pendakian, tb_pengunjung WHERE tb_pengunjung.id_pengunjung = tb_membayar_pendakian.id_pengunjung AND tb_membayar_pendakian.id_gunung = tb_paket_gunung.id_gunung AND tb_paket_gunung.id_gunung = '$id_paket'") or die(mysqli_error($connect));
    $row2 = mysqli_fetch_array($result);
    $tanggal = $row2['tgl_akhir']; 
    $nama_paket = $row2['nama_paket']; 
$subject = "Perubahan Jadwal Pemeriksaan";
    $content = '<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <meta name="format-detection" content="telephone=no"/>

 

    <style>
/* Reset styles */ 
body { margin: 0; padding: 0; min-width: 100%; width: 100% !important; height: 100% !important;}
body, table, td, div, p, a { -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%; }
table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse !important; border-spacing: 0; }
img { border: 0; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
#outlook a { padding: 0; }
.ReadMsgBody { width: 100%; } .ExternalClass { width: 100%; }
.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }

/* Rounded corners for advanced mail clients only */ 
@media all and (min-width: 560px) {
    .container { border-radius: 8px; -webkit-border-radius: 8px; -moz-border-radius: 8px; -khtml-border-radius: 8px; }
}

/* Set color for auto links (addresses, dates, etc.) */ 
a, a:hover {
    color: #FFFFFF;
}
.footer a, .footer a:hover {
    color: #828999;
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

    <!-- SUPHEADER -->
    <!-- Set text color and font family ("sans-serif" or "Georgia, serif") -->
    <tr>
        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 14px; font-weight: 400; line-height: 150%; letter-spacing: 2px;
            padding-top: 27px;
            padding-bottom: 0;
            color: #FFFFFF;
            font-family: sans-serif;" class="supheader">
                Hallo Para Traveller '.$nama_paket .'
        </td>
    </tr>

    <!-- HEADER -->
    <!-- Set text color and font family ("sans-serif" or "Georgia, serif") -->
    <tr>
        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;  padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%;
            padding-top: 5px;
            color: #FFFFFF;
            font-family: sans-serif;" class="header">
                Mohon Maaf Ada Perubahan Jadwal Perjalanan
        </td>
    </tr>

    <!-- PARAGRAPH -->
    <!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
    <tr>
        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
            padding-top: 15px; 
            color: #FFFFFF;
            font-family: sans-serif;" class="paragraph">
            <h1></h1>
            Dikarenakan Kondisi Di Pulau tsb Sedang Tidak Memungkinkan Untuk Di Huni Kami Mengusulkan Untuk Merubah Jadwal Pada Tanggal : '.$tgl_baru .'
        </td>
    </tr>

    <!-- BUTTON -->
    <!-- Set button background color at TD, link/text color at A and TD, font family ("sans-serif" or "Georgia, serif") at TD. For verification codes add "letter-spacing: 5px;". Link format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Button-Name}}&utm_campaign={{Campaign-Name}} -->
    <tr>
        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
            padding-top: 25px;
            padding-bottom: 5px;" class="button"><a
            href="http://localhost/Aplikasi_Towing/project/hal_login.php" target="_blank" style="text-decoration: underline;">
                <table border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 240px; min-width: 120px; border-collapse: collapse; border-spacing: 0; padding: 0;"><tr><td align="center" valign="middle" style="padding: 12px 24px; margin: 0; text-decoration: underline; border-collapse: collapse; border-spacing: 0; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; -khtml-border-radius: 4px;"
                    bgcolor="#E9703E">
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

$mail = new PHPMailer;
//Server settings
$mail->SMTPDebug = 0;                                 // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'angga.reno99@gmail.com';                 // SMTP username
$mail->Password = 'reno1996';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587; // or 587

$mail->SetFrom("scnd.anggareno@gmail.com", "Admin Blaur Vacation");
    $mail->AddReplyTo("scnd.anggareno@gmail.com", "Admin Blaur Vacation");  
    $mail->Subject = $subject;
    $mail->MsgHTML($content);
    $mail->IsHTML(true);


foreach ($result as $row) {
    $mail->addAddress($row['email'], $row['nama']);
    if (!$mail->send()) {
        echo "Mailer Error (" . str_replace("@", "&#64;", $row["email"]) . ') ' . $mail->ErrorInfo . '<br />';
        break; //Abandon sending
    } else {
        echo "Message sent to :" . $row['nama'] . ' (' . str_replace("@", "&#64;", $row['email']) . ')<br />';
        //Mark it as sent in the DB
        echo "<script>alert('Data Berhasil di edit!'); window.location = 'data_paket_gunung.php'</script>";	
    }
    // Clear all addresses and attachments for next loop
    $mail->clearAddresses();
    $mail->clearAttachments();
}
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = '../hal_admin_list_kasir.php'</script>";	
}
?>