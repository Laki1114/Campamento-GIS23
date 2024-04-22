<?php
session_start();
include('../database/linklinkz.php');

if(isset($_GET['id'])){
$UserID = $_GET['id'];

$sql = "UPDATE Supplier
SET Status = '0'
WHERE SupplierID = $UserID";


$result = mysqli_query($linkz,$sql);

if($result ){
	echo "<script> alert('If you proceed ,You will loose you account !!')</script>";
	header("location:../login/logout.php");
}
else {
	echo "<script>alert('Error: Could not able to execute the query.')</script>";
}

}
?>