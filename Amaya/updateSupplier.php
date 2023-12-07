<?php

require("linklinkz.php");
$IdentityNo=$_GET["id"];
$firstName=$_POST["firstName"];
$lastName=$_POST["lastName"];
$gender=$_POST["gender"];
$phoneNo=$_POST["phoneNo"];
$nicNo=$_POST["nicNo"];
$email=$_POST["email"];


$sql = "UPDATE supplier SET FirstName = '$firstName',lastName = '$lastName',gender = '$gender', phoneNo = '$phoneNo',nicNo = '$nicNo',email= '$email' WHERE SupplierId= '$IdentityNo'";
$result = mysqli_query($linkz,$sql);

if($result){
	echo "<script> alert('Records updated successfully!!')</script>";
	header("location:profileSupplier.php");
}
else {
	echo "<script>alert('Error: Could not able to execute the query.')</script>";
}



?>