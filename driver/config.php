
<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$con= mysqli_connect("localhost","root","","campamento");
?>