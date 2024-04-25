<?php
require("linklinkz.php");

$IdentityNo = $_GET['id'];

$sql = "DELETE FROM blog WHERE blogID= $IdentityNo";
//$sql = "UPDATE blog
//SET Status = '0'
//WHERE blogID= $IdentityNo";
$result = mysqli_query($linkz,$sql);

if($result ){
	echo "<script> alert('Records Deleted successfully!!')</script>";
	header("location:dataBlog.php");
}
else {
	echo "<script>alert('Error: Could not able to execute the query.')</script>";
}


?>