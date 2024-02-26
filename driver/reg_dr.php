<?php
include 'config.php';
 
if(isset($_POST['regbtn'])){
	$f=$_POST['firstname'];
	$l=$_POST['lastname'];
	$g=$_POST['gender'];
	$p=$_POST['phone'];
	$a=$_POST['address'];
    $v=$_POST['vehicleDes'];
    $e=$_POST['experience'];
	$n=$_POST['nic'];
	$ema=$_POST['email'];
	$ps=$_POST['psw'];
	$psw=$_POST['psw_r'];
    $lo=$_POST['location'];
    $q=$_POST['qualification'];

	if ($ps != $psw) {
		echo "<script> alert(' Please enter same passwords ') </script>";
	}


	//code for image uploading
  $targetDir = "pic/";  // Specify the directory where you want to save the uploaded images
  $targetDirr = "license/";
  $targetDire = "vehicle/";

  // Handle the first image
  $targetFile1 = $targetDir . basename($_FILES["picture"]["name"]);
  move_uploaded_file($_FILES["picture"]["tmp_name"], $targetFile1);

  $targetFile2 = $targetDire . basename($_FILES["vehicle"]["name"]);
  move_uploaded_file($_FILES["vehicle"]["tmp_name"], $targetFile2);
  // Handle the second image
  $targetFile3 = $targetDirr . basename($_FILES["license"]["name"]);
  move_uploaded_file($_FILES["license"]["tmp_name"], $targetFile3);
 
 
  //$password = md5($ps);

  $i="insert into driver(firstname, lastname, gender, phone, address,veh_des, vehicle, picture, experience, nic, email, password, location, license, qualification)values ('$f','$l','$g','$p','$a','$v','$targetFile2','$targetFile1','$e', '$n','$ema','$ps','$lo','$targetFile3', '$q')";
  if(mysqli_query($con, $i)){
	$msg = "Account created";
	header("Location: ../home?warning=" . urlencode($msg));
	exit();
  }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/Driver/registerUser.css">
</head>
<body>


<div class="bg-img">
  
  <form method="post" enctype="multipart/form-data" class="container">
  <br><br><h1>Register as Driver</h1><br>
    <br><br>
    <p><center>Please fill in this form to create an account.</center></p><br>
  <table>
        <tr> 
            <td width="300px">
            <div class="container-left">

    <label for="firstName"><b>First Name </b></label><br>
    <input type="text" placeholder="First Name" name="firstname" id="firstName" required><br>
                  
    <label for="lastName"><b>Last Name </b></label><br>
    <input type="text" placeholder="Last Name" name="lastname" id="lastName" required><br>

    <label for="gender"><b>Gender</b></label><br>
     <select id="gender" name="gender" required>
     <option value="" disabled selected>Select Gender</option>
    <option>Male</option>
      <option>Female</option>
      <option>Other</option>
     </select><br>
    

     <label for="phoneNo"><b>Phone No </b></label><br>
      <input type="text" placeholder="Phone No" name="phone" id="phone" required><br>

      <label for="address"><b>Address </b></label><br>
      <input type="text" placeholder="Address" name="address" required><br>

      <label for="photo"><b>Picture </b></label><br><br>
      <input type="file" name="picture" id="pic"><br><br>

      <label for="vehicle-des"><b>Vehicle Description </b></label><br>
       <input type="text" placeholder="Vehicle des" name="vehicleDes" required><br>

      <label for="Vehicle"><b>Vehicle Pictures </b></label><br><br>
      <input type="file" name="vehicle" id="vehicle">

</div>
      </td>

<!--start right panel-->

<td width="300px">
<div class="container-right">
<br><br>
<label for="phoneNo"><b>NIC No </b></label><br>
 <input type="text" placeholder="NIC No" name="nic" id="nic" required><br>

  <label for="email"><b>Email</b></label><br>
   <input type="text" placeholder="Enter Email" name="email" id="email" required><br>
                
   <label for="psw"><b>Password</b></label><br>
   <input type="password" placeholder="Password" id="psw" name="psw"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>
                
   <label for="psw-repeat"><b>Repeat Password</b></label><br>
  <input type="password" placeholder="Repeat Password" name="psw_r"  required><br>
                     
   <label for="location"><b>Location </b></label><br>
   <input type="text" placeholder="Location" name="location" id="location" required><br>

   <label for="license"><b>License(pdf/photo) </b></label><br><br>
   <input type="file" name="license" id="license">
                    <br><br>

   <label for="qualification"><b>Qualifications</b></label><br>
   <input type="text" placeholder="Enter Qualifications" name="qualification" id="qualification" required><br>

   <label for="experience"><b>Experience </b></label><br>
   <input type="text" placeholder="Experience" name="experience" required><br>
    

                    <br>           
</div>
     </td>
     </table>             
                    
     <b> &nbsp;&nbsp;By creating an account you agree to our <a href="#">Terms & Privacy</a>.</b>
    <br><br>

    <input type="submit" name="regbtn" value="Register"> <br>


        <br><br>
      

       

  </form>

  
</div>

</body>
</html>
