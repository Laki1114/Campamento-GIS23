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
  $type=$_POST['type'];
  $model=$_POST['model'];
  $ac=$_POST['nonac'];
  $district=$_POST['district'];

	if ($ps != $psw) {
		echo "<script> alert(' Please enter same passwords ') </script>";
	}


	//code for image uploading
  $targetDir = "pic/";  // Specify the directory where you want to save the uploaded images
  $targetDirr = "license/";
  

  // Handle the first image
  $targetFile1 = $targetDir . basename($_FILES["picture"]["name"]);
  move_uploaded_file($_FILES["picture"]["tmp_name"], $targetFile1);

  // Handle the second image
  $targetFile3 = $targetDirr . basename($_FILES["license"]["name"]);
  move_uploaded_file($_FILES["license"]["tmp_name"], $targetFile3);
 
 
  //$password = md5($ps);
  $sql = "SELECT * FROM driver WHERE email = '$ema'";
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
      // If the email already exists, return an error message
      $response = array('status' => 'error', 'message' => 'Email already exists. Please use a different email address.');
      echo json_encode($response);
      exit();
  }

  $i="insert into driver(firstname, lastname, gender, phone, address,veh_des, picture, experience, nic, email, password, location, license, Vehicle_type, Model, AC, district)values ('$f','$l','$g','$p','$a','$v' ,'$targetFile1','$e', '$n','$ema','$ps','$lo','$targetFile3', '$type', '$model','$ac','$district')";
  if(mysqli_query($con, $i)){
    // Get the ID of the inserted driver
    $driver_id = mysqli_insert_id($con);
    
    // Handle vehicle images
    $targetDire = "vehicle/";;  // Specify the directory where you want to save the uploaded images

    // Allowed image formats
$allowedFormats = array('jpg', 'jpeg', 'png');

if(count($_FILES["vehicle"]["name"]) != 3) {
  echo "Please upload exactly three vehicle images.";
} else {
// Loop through each uploaded vehicle image
foreach ($_FILES["vehicle"]["tmp_name"] as $key => $tmp_name) {
    // Get the file extension
    $fileExt = strtolower(pathinfo($_FILES["vehicle"]["name"][$key], PATHINFO_EXTENSION));
    
    // Check if the file format is allowed
    if (in_array($fileExt, $allowedFormats)) {
        // Construct the target file path
        $targetFile2 = $targetDire . basename($_FILES["vehicle"]["name"][$key]);
        
        // Move the uploaded image to the target directory
        if (move_uploaded_file($_FILES["vehicle"]["tmp_name"][$key], $targetFile2)) {
            // Get file name and file path
            $fileName = basename($_FILES["vehicle"]["name"][$key]);
            $filePath = mysqli_real_escape_string($con, $targetFile2);
            
            // Insert file name and file path into the 'vehicle_images' table
            $sql = "INSERT INTO v_images (d_id, file_name, path, uploaded_on) 
                    VALUES ('$driver_id', '$fileName', '$filePath', NOW())";
            if(mysqli_query($con, $sql)){
                // Success
            } else {
                echo "Error inserting vehicle image: " . mysqli_error($con);
            }
        } else {
            // Handle upload errors
            echo "Error uploading vehicle image.";
        }
    } else {
        // Invalid image format
        echo "Invalid image format. Only JPG, JPEG, and PNG formats are allowed.";
    }
}

        
	$msg = "Account created";
	header("Location: ../home?warning=" . urlencode($msg));
	exit();
    }
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

      <label for="type"><b>Vehicle Type</b></label><br>
     <select id="type" name="type" required>
     <option value="" disabled selected>Select</option>
    <option>Car/ Mini SUV(3-4)</option>
      <option>Mini Van(6-7)</option>
      <option>Van(8-9)</option>
     </select><br>

      <label for="vehicle-des"><b>Vehicle Description </b></label><br>
       <input type="text" placeholder="Vehicle des" name="vehicleDes" required><br>

      <label for="Vehicle"><b>Vehicle Pictures </b></label><br><br>
      <input type="file" name="vehicle[]" id="vehicle" multiple accept="image/*" onchange="limitFiles(this)">

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

   <label for="model"><b>Vehicle Model</b></label><br>
   <input type="text" placeholder="Enter model" name="model" id="model" required><br>

   <label for="nonac"><b>A/C or Non A/C</b></label><br>
    <select id="nonac" name="nonac" required>
    <option value="" disabled selected>Select</option>
    <option>A/C</option>
    <option>Non A/C</option>
    </select><br>
   
   <label for="experience"><b>Experience </b></label><br>
   <input type="text" placeholder="Experience" name="experience" required><br>
   
   <label for="district">Select your district:</label>
<select id="district" name="district">
  <option value="Ampara">Ampara</option>
  <option value="Anuradhapura">Anuradhapura</option>
  <option value="Badulla">Badulla</option>
  <option value="Batticaloa">Batticaloa</option>
  <option value="Colombo">Colombo</option>
  <option value="Galle">Galle</option>
  <option value="Gampaha">Gampaha</option>
  <option value="Hambantota">Hambantota</option>
  <option value="Jaffna">Jaffna</option>
  <option value="Kalutara">Kalutara</option>
  <option value="Kandy">Kandy</option>
  <option value="Kegalle">Kegalle</option>
  <option value="Kilinochchi">Kilinochchi</option>
  <option value="Kurunegala">Kurunegala</option>
  <option value="Mannar">Mannar</option>
  <option value="Matale">Matale</option>
  <option value="Matara">Matara</option>
  <option value="Monaragala">Monaragala</option>
  <option value="Mullaitivu">Mullaitivu</option>
  <option value="Nuwara Eliya">Nuwara Eliya</option>
  <option value="Polonnaruwa">Polonnaruwa</option>
  <option value="Puttalam">Puttalam</option>
  <option value="Ratnapura">Ratnapura</option>
  <option value="Trincomalee">Trincomalee</option>
  <option value="Vavuniya">Vavuniya</option>
</select>

   </div>
     </td>
     </table>             
                    
     <b> &nbsp;&nbsp;By creating an account you agree to our <a href="#">Terms & Privacy</a>.</b>
    <br><br>

    <input type="submit" name="regbtn" value="Register"> <br>


        <br><br>
      

       

  </form>

  
</div>
<script>
function limitFiles(input) {
    if (input.files.length > 3) {
        alert("You can only upload a maximum of three images.");
        // Clear the selected files
        input.value = '';
    }
}
</script>
s
</body>
</html>
