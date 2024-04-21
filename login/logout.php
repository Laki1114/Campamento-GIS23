<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['customer']);
unset($_SESSION['customerid']);
session_destroy();

header('location:../userdashboard/dashboard.php')

?>