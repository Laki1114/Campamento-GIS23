<?php
	function save_supplier($firstName,$lastName,$gender,$phoneNo,$nicNo,$email,$psw){
		require("linklinkz.php");
		$sql = "INSERT INTO supplier (FirstName,LastName,Gender,PhoneNo,NICNo,Email,Password) VALUES('$firstName','$lastName','$gender','$phoneNo','$nicNo','$email','$psw')";
		$result=mysqli_query($linkz,$sql); 

		if($result ){
			echo "<script> alert('Records Deleted successfully!!')</script>";
			header("location:../Amaya/tspage.php");
		}
		else {
			echo "<script>alert('Error: Could not able to execute the query.')</script>";
		}
		
	}


	
?>