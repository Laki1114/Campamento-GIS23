<?php
require("functionSupplier.php");
include('../database/linklinkz.php');
$firstName=$_POST["firstName"];
$lastName=$_POST["lastName"];
$gender=$_POST["gender"];
$phoneNo=$_POST["phoneNo"];
$nicNo=$_POST["nicNo"];
$email=$_POST["email"];
$psw=($_POST["password"]);

$sql= "SELECT* FROM Supplier WHERE Email='$email'";
$result=mysqli_query($linkz,$sql); 


if(mysqli_num_rows($result) == 0) {
    // Email doesn't exist, so save the user
    save_user($firstName, $lastName, $gender, $phoneNo, $nicNo, $email, $psw);
}else {
    echo "<script>alert('Email already is registered.')</script>";
    header("location:resigterSupplier.php");
}


?>










