<?php
// admin_logout.php

// Start the session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page
header("location: ../login/login.php");
exit; // Ensure script stops executing after redirection
?>