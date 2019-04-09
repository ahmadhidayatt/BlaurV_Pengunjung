<?php
$server		= "localhost:3306";
$username	= "root";
$password	= "";
$db			= "db_trip";

$connect	= new mysqli($server,$username,$password,$db) or die (mysql_error());
?>