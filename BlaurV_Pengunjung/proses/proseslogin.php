<?php

include "../proses/koneksi.php";

$username = $_POST['username'];
$pass = $_POST['password'];

$login = mysqli_query($connect, "SELECT * FROM tb_pengunjung WHERE id_pengunjung = '$username' AND password='$pass'");
if (mysqli_num_rows($login) == 0) {
    $login = mysqli_query($connect, "SELECT * FROM tb_pegawai WHERE username = '$username' AND password='$pass'");
}
$ketemu = mysqli_num_rows($login);
$row = mysqli_fetch_array($login);
if ($ketemu > 0) {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $pass;
    $_SESSION['level'] = $row['level'];
	$_SESSION['idpeng'] = $row['id_pengunjung'];
    $username = $_SESSION['username'];
    $level = $_SESSION['level'];
    if ($row['level'] == "pegawai") {
        header('location: ../../BlaurV_Pegawai/hal_pegawai.php');
    }
	else{
        $_SESSION['nama'] = $row['nama'];
	header('location: ../Project/hal_pengunjung.php');
	}
} else {
    echo "<center><br><br><br><br><br><br><b>LOGIN GAGAL! </b><br>
        Username atau Password Anda tidak benar.<br>";
    echo "<br>";
    echo "<input class='btn btn-blue' type=button value='ULANGI LAGI' onclick=location.href='../Project/login.php'></a></center>";
}
?>
