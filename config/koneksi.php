<?php
$server		= "localhost:3306";
$username	= "root";
$password	= "";
$db			= "blaur_vact";

$connect	= new mysqli($server,$username,$password,$db) or die (mysql_error());
?>