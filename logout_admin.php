<?php
  session_start();
  session_destroy();
  header('location:../GoTicket_user/Project/login.php');
?>