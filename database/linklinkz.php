<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$linkz =mysqli_connect("localhost","root","","campamento") or die("Sorry Didnot");
$conn =mysqli_connect("localhost","root","","campamento") or die("Sorry Didnot");
?>