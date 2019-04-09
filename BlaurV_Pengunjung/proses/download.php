<?php

// Tentukan folder file yang boleh di download
include './koneksi.php';
$folder = "../file/";
$namafile = $_GET['file'];

if (!file_exists($folder . $namafile)) {
    echo "<h1>Access forbidden!</h1>
      <p> Anda tidak diperbolehkan mendownload file ini.</p>;
      <p> $namafile </p>";
    exit;
}

// Apabila mendownload file di folder files
else {
    $contenttype = "application/force-download";
    header("Content-Type: " . $contenttype);
    header("Content-Disposition: attachment; filename=\"" . basename($namafile) . "\";");
    readfile($folder . $namafile);
    exit();
}
?>