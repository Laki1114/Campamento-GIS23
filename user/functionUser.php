<?php
	function save_user($firstName,$lastName,$gender,$phoneNo,$nicNo,$email,$psw){
		include('../database/linklinkz.php');
		$sql = "INSERT INTO user (FirstName,LastName,Gender,PhoneNo,NICNo,Email,Password,Status) VALUES('$firstName','$lastName','$gender','$phoneNo','$nicNo','$email','$psw','1')";
		$result=mysqli_query($linkz,$sql); 


		if($result ){
			echo "<script> alert('Records Deleted successfully!!')</script>";
			header("location:../login/login.php");
		}
		else {
			echo "<script>alert('Error: Could not able to execute the query.')</script>";
		}
		




	}


	
?>