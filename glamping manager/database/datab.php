
<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Database connection
$con = mysqli_connect("localhost", "root", "", "campamento");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
