<?php

require("config.php");

$firstName=$_POST["firstName"];
$lastName=$_POST["lastName"];
$gender=$_POST["gender"];
$phoneNo=$_POST["phoneNo"];
$nicNo=$_POST["nicNo"];
$email=$_POST["email"];


$sql = "UPDATE guide SET firstName = '$firstName',lastName = '$lastName',gender = '$gender', phone = '$phoneNo',nic = '$nicNo',email= '$email' WHERE id= '8'";
$result = mysqli_query($con,$sql);

if($result){
	echo "<script> alert('Updated!')</script>";
	header("location:guide_pro.php");
}
else {
	echo "<script>alert('Error!')</script>";
}



?>