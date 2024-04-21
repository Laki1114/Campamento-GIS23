<?php
include 'config.php';
 

if(isset($_POST['regbtn'])){
	$f=$_POST['firstname'];
	$l=$_POST['lastname'];
	$g=$_POST['gender'];
	$p=$_POST['phone'];
	$a=$_POST['address'];
  $lang = serialize($_POST['lang']);
  $e=$_POST['exp'];
	$n=$_POST['nic'];
	$ema=$_POST['email'];
	$ps=$_POST['psw'];
	$psw=$_POST['psw_r'];
  $lo=$_POST['location'];
  $q=$_POST['qualification'];
  $paymentPref = implode(',', $_POST['payment']);
  $half = $_POST['half'];
  $full = $_POST['full'];
  $hour =$_POST['hourly'];
  $dis =$_POST['district'];
  $expertise = implode(',', $_POST['expertise']);
  $tour = implode(',', $_POST['tour_type']);

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
  $sql = "SELECT * FROM guide WHERE email = '$ema'";
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
      // If the email already exists, return an error message
      $response = array('status' => 'error', 'message' => 'Email already exists. Please use a different email address.');
      echo json_encode($response);
      exit();
  }

  $i="insert into guide(firstname, lastname, gender, phone, address, language, picture, experience, nic, email, password, location, license, qualification, payment_preference,
   half_day, full_day, hourly, district, expertise, tour_types)values ('$f','$l','$g','$p','$a','$lang' ,'$targetFile1','$e', '$n','$ema','$ps','$lo','$targetFile3','$q','$paymentPref','$half','$full','$hour','$dis', '$expertise','$tour')";
  if(mysqli_query($con, $i)){
    // Get the ID of the inserted driver
    $guide_id = mysqli_insert_id($con);
    
    // Handle vehicle images
    $targetDire = "experience/";;  // Specify the directory where you want to save the uploaded images

    // Allowed image formats
$allowedFormats = array('jpg', 'jpeg', 'png');


// Loop through each uploaded vehicle image
foreach ($_FILES["experience"]["tmp_name"] as $key => $tmp_name) {
    // Get the file extension
    $fileExt = strtolower(pathinfo($_FILES["experience"]["name"][$key], PATHINFO_EXTENSION));
    
    // Check if the file format is allowed
    if (in_array($fileExt, $allowedFormats)) {
        // Construct the target file path
        $targetFile2 = $targetDire . basename($_FILES["experience"]["name"][$key]);
        
        // Move the uploaded image to the target directory
        if (move_uploaded_file($_FILES["experience"]["tmp_name"][$key], $targetFile2)) {
            // Get file name and file path
            $fileName = basename($_FILES["experience"]["name"][$key]);
            $filePath = mysqli_real_escape_string($con, $targetFile2);
            
            // Insert file name and file path into the 'vehicle_images' table
            $sq = "INSERT INTO exp_images(guide_id, file_name, path, uploaded_on) 
                    VALUES ('$guide_id', '$fileName', '$filePath', NOW())";
            if(mysqli_query($con, $sq)){
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

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/Guide/registerUser.css">

<style>
/* Style for select element */
#expertise {
  width: 300px; /* Set the width of the select box */
  height: 130px; /* Set the height of the select box */
}
.container-d{
  margin-left: 10px;
}
</style>
</head>
<body>


<div class="bg-img">
  
  <form method="post" enctype="multipart/form-data" class="container">
  <br><br><h1>Register as a Guide</h1><br>
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
      <input type="file" name="picture" id="pic"><br><br><br>

      <label for="license"><b>License </b></label><br><br>
       <input type="file" name="license"><br><br><br>

       <label for="lang"><b>Languages</b></label><br><br>
     <select id="lang" name="lang[]" multiple required>
     <option value="" disabled selected>Select Language</option>
    <option>English</option>
      <option>Sinhala</option>
      <option>Tamil</option>
      <option>Spanish</option>
<option>French</option>
<option>German</option>
<option>Chinese </option>
<option>Japanese</option>
<option>Korean</option>
<option>Arabic</option>
<option>Russian</option>
<option>Portuguese</option>
<option>Italian</option>
<option>Hindi</option>
<option>Bengali</option>
<option>Urdu</option>
<option>Turkish</option>
<option>Dutch</option>
<option>Thai</option>
<option>Polish</option>
<option>Vietnamese</option>
     </select><br>
     <label for="phoneNo"><b>NIC No </b></label><br>
 <input type="text" placeholder="NIC No" name="nic" id="nic" required><br>

 <label for="district"><b>Select your district:</b></label>
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
</select><br>

<label for="email"><b>Email</b></label><br>
   <input type="text" placeholder="Enter Email" name="email" id="email" required><br>
   <label for="location"><b>Areas you operate </b></label><br>
   <input type="text" placeholder="Location" name="location" id="location" required><br>
   
      
</div>
      </td>



<!--start right panel-->

<td width="300px">
<div class="container-right">
<br>

                
   <label for="psw"><b>Password</b></label><br>
   <input type="password" placeholder="Password" id="psw" name="psw"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>
                
   <label for="psw-repeat"><b>Repeat Password</b></label><br>
   <input type="password" placeholder="Repeat Password" name="psw_r"  required><br>
                     


   <label for="exp"><b>Experience </b></label><br>
   <input type="text" placeholder="Experience" name="exp" required><br>
                   
   <label for="experience"><b>Experience Pictures </b></label><br><br>
  <input type="file" name="experience[]" id="experience" multiple accept="image/*">
<br><br>
<label for="qualification"><b>Qualifications</b></label><br>
<input type="text" placeholder="Enter Qualifications" name="qualification" required><br>

<label for="payment"><b>Payment Preference (in $):</b></label><br><br>
<input type="checkbox" id="half_day" name="payment[]" value="half_day">
<label for="half_day"><b>Half Day</b></label>
<input type="text" id="half_day_amount" name="half" placeholder="Amount"><br>

<input type="checkbox" id="full_day" name="payment[]" value="full_day">
<label for="full_day"><b>Full Day</b></label>
<input type="text" id="full_day_amount" name="full" placeholder="Amount"><br>

<input type="checkbox" id="hourly" name="payment[]" value="hourly">
<label for="hourly"><b>Hourly</b></label>
<input type="text" id="hourly_amount" name="hourly" placeholder="Amount"><br>

<label for="expertise"><b>Expertise Areas:</b></label><br><br>
<select id="expertise" name="expertise[]" multiple>
  <option value="Hiking and Backpacking">Hiking and Backpacking</option>
  <option value="Campsite Setup and Gear">Campsite Setup and Gear</option>
  <option value="Wildlife Identification">Wildlife Identification</option>
  <option value="Outdoor Cooking and Food Safety">Outdoor Cooking and Food Safety</option>
  <option value="Navigation and Map Reading">Navigation and Map Reading</option>
  <option value="Environmental Education and Conservation">Environmental Education</option>
  <option value="Rock Climbing and Mountaineering">Rock Climbing and Mountaineering</option>
  <option value="Water Sports and Boating">Water Sports and Boating</option>
  <option value="Photography and Nature Observation">Photography and Nature</option>
  <option value="Outdoor Fitness and Wellness">Outdoor Fitness and Wellness</option>
  <option value="Bushcraft and Survival Skills">Bushcraft and Survival Skills</option>
  <option value="Cultural and Historical Interpretation">Cultural and Historical </option>
  <option value="Birdwatching and Ornithology">Birdwatching and Ornithology</option>
  <option value="Winter Camping and Snow Sports">Winter Camping and Snow Sports</option>
  <option value="Family-Friendly Adventures">Family-Friendly Adventures</option>
</select>
<br>
<legend><b>Type of Tours:</legend>
      <input type="checkbox" id="historical" name="tour_type[]" value="Historical Tours">
      <label for="historical">Historical Tours</label>
      
      <input type="checkbox" id="cultural" name="tour_type[]" value="Cultural Tours">
      <label for="cultural">Cultural Tours</label><br>
      
      <input type="checkbox" id="adventure" name="tour_type[]" value="Adventure Tours">
      <label for="adventure">Adventure Tours</label>

      <input type="checkbox" id="adventure" name="tour_type[]" value="Adventure Tours">
      <label for="adventure">Nature Tours</label><br>
      <input type="checkbox" id="adventure" name="tour_type[]" value="Adventure Tours">
      <label for="adventure">Food Tours</label>
<input type="checkbox" id="specialty" name="tour_type[]" value="Specialty Tours">
      <label for="specialty">Architecture Tours</label><br>
<input type="checkbox" id="specialty" name="tour_type[]" value="Specialty Tours">
      <label for="specialty">Art Tours</label>
<input type="checkbox" id="specialty" name="tour_type[]" value="Specialty Tours">
      <label for="specialty">Photography Tours</label><br>
<input type="checkbox" id="specialty" name="tour_type[]" value="Specialty Tours">
      <label for="specialty">Wellness Tours</label><br>
      <br>
      <label for="specialty_other">Specialty Tours (Please specify):</b></label><br>
      <input type="text" id="specialty_other" name="specialty_other" placeholder="Tour"><br>
   <br>

   </div>
     </td>
     

      
      
      <!-- Add more checkboxes for other tour types -->
    
      
     </table>             
                    
     <b> &nbsp;&nbsp;By creating an account you agree to our <a href="#">Terms & Privacy</a>.</b>
    <br>(Use ctrl key - select multiple)<br>
<br>
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
