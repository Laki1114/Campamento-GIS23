<?php
include 'config.php';
 
if(isset($_POST['registerbttn'])){
	$f=$_POST['firstname'];
	$l=$_POST['lastname'];
	$g=$_POST['gender'];
	$p=$_POST['phone'];
	$a=$_POST['address'];
    $e=$_POST['experience'];
	$n=$_POST['nic'];
	$ema=$_POST['email'];
	$ps=$_POST['password_1'];
	$psw=$_POST['password_2'];
    $lo=$_POST['location'];
    $q=$_POST['qualification'];

	if ($ps != $psw) {
		echo "<script> alert(' Please enter same passwords ') </script>";
	}


	//code for image uploading
  $targetDir = "pic/";  // Specify the directory where you want to save the uploaded images
  $targetDirr = "license/";

  // Handle the first image
  $targetFile1 = $targetDir . basename($_FILES["pic"]["name"]);
  move_uploaded_file($_FILES["pic"]["tmp_name"], $targetFile1);

  // Handle the second image
  $targetFile2 = $targetDirr . basename($_FILES["exp"]["name"]);
  move_uploaded_file($_FILES["exp"]["tmp_name"], $targetFile2);
 
 
  $password = md5($ps);

  $i="insert into guide(firstname, lastname, gender, phone, address, picture, experience, nic, email, password, location, license, qualification)values ('$f','$l','$g','$p','$a','$targetFile1','$e', '$n','$ema','$password','$lo','$targetFile2', '$q')";
  if(mysqli_query($con, $i)){
	$msg = "Account created";
	header("Location: signup.php?warning=" . urlencode($msg));
	exit();
  }
}
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="registrg.css">
    <title></title>
</head>
<body>

    <form method="post" enctype="multipart/form-data">
 
    <table>
        <tr> 
            <td>
                <!--start left panel-->
               
                    <div class="container">
                      <h1>Register as a Guide</h1>
                      <p>Please fill in this form to create an account.</p>
                      <hr>
                  
                      <label for="firstName"><b>First Name </b></label><br>
                      <input type="text" placeholder="First Name" name="firstname"  required><br>
                  
                      <label for="lastName"><b>Last Name </b></label><br>
                      <input type="text" placeholder="Last Name" name="lastname" required><br>

            
                      <label for="gender"><b>Gender</b></label><br>
                      <select id="gender" name="gender" required>
                        <option value="" disabled selected>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                      </select><br>
                  
                      <label for="phoneNo"><b>Phone No </b></label><br>
                      <input type="text" placeholder="Phone No" name="phone"  required><br>

                      <label for="address"><b>Address </b></label><br>
                      <input type="text" placeholder="Address" name="address"  required><br>

                      <label for="photo"><b>Picture </b></label><br><br>
                      <input type="file" name="pic" ><br><br>
                      
                      <label for="photo"><b>License </b></label><br><br>
                      <input type="file" name="exp"><br>
            </td>

            <!--start right panel-->

            <td width="450px">
                
                <div class="container-right">
                    <br><br><label for="phoneNo"><b>NIC No </b></label><br>
                    <input type="text" placeholder="NIC No" name="nic"  required><br>

                    <label for="email"><b>Email</b></label><br>
                    <input type="text" placeholder="Enter Email" name="email"  required><br>
                
                    <label for="psw"><b>Password</b></label><br>
                    <input type="password" placeholder="Enter Password" name="password_1"  required><br>
                
                    <label for="psw-repeat"><b>Repeat Password</b></label><br>
                    <input type="password" placeholder="Repeat Password" name="password_2"  required><br>
                     
                    <label for="location"><b>Location </b></label><br>
                    <input type="text" placeholder="Location" name="location"  required><br>

                    <label for="photo"><b>Experience </b></label><br>
                    <input type="text" placeholder="Experience" name="experience" required><br>
                    
                    <label for="qualification"><b>Qualifications</b></label><br>
                    <input type="text" placeholder="Enter Qualifications" name="qualification" required><br>
            </td>

        </tr>
        <tr><td colspan="2">
            <hr>
            
                   <b> &nbsp;&nbsp;&nbsp;By creating an account you agree to our <a href="#">Terms & Privacy</a>.</b>
                   <div class="latter">
                    <button type="submit" class="registerbttn" name="registerbttn"><b>Register</b></button>
                </div>
                  </div>
        </td>
        <td></td></tr>
    </table>
</form>
</body>
</html>