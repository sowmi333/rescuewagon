<?php

if(!isset($_SESSION)){
  session_start();
}

if(isset($_SESSION['driverId'])) {
  header("Location: /dash.php");
}
if(isset($_SESSION['userId'])) {
  header("Location: /home.php");
}
else {
  header("Location: /auth.php");
}
?>
