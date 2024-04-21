<?php
include('../database/linklinkz.php');

	function save_user($firstName,$lastName,$gender,$phoneNo,$nicNo,$email,$psw){
		
		$sql = "INSERT INTO Supplier (FirstName,LastName,Gender,PhoneNo,NICNo,Email,Password,Status) VALUES('$firstName','$lastName','$gender','$phoneNo','$nicNo','$email','$psw','1')";
		$result=mysqli_query($linkz,$sql); 


		if($result ){
			echo "<script> alert('Records Deleted successfully!!')</script>";
			header("location:../userdashboard/dashboard.php");
		}
		else {
			echo "<script>alert('Error: Could not able to execute the query.')</script>";
		}
		




	}


	
?>