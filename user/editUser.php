
<?php
session_start();
include('../database/linklinkz.php');
$email=$_SESSION['customer'];
?>
<?php

if(isset($_POST['submit'])) {

$firstName=$_POST["firstName"];
$lastName=$_POST["lastName"];
$gender=$_POST["gender"];
$phoneNo=$_POST["phoneNo"];


// Check if file is uploaded
if(isset($_FILES['productimage']) && !empty($_FILES['productimage']['name'])) {
	$name = $_FILES['productimage']['name'];
	$size = $_FILES['productimage']['size'];
	$type = $_FILES['productimage']['type'];
	$tmp_name = $_FILES['productimage']['tmp_name']; 
	$max_size = 10000000;
	$extension = pathinfo($name, PATHINFO_EXTENSION); 
	
	// Check file extension and size
	if(($extension == "jpg" || $extension == "jpeg") && $type == "image/jpeg" && $size <= $max_size) {
		$location = "uploads/";
		$filePath = $location . $name;

		// Move uploaded file to destination
		if(move_uploaded_file($tmp_name, $filePath)) {
			$sql2 = "UPDATE user SET FirstName = '$firstName',LastName = '$lastName',Gender = '$gender', PhoneNo = '$phoneNo' ,thumb='$filePath' WHERE Email= '$email'" ;
			
			$res = mysqli_query($conn, $sql2);
			if($res) {
				$message = 'Saved Successfully with image';
				header("location:profileUser.php");
			} else {
				$message = "Failed to Create Product";
				echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
			}
		} else {
			$message = "Failed to Upload File";
		}
	} else {
		$message = "Only JPG files are allowed and should be less than 10MB";
	}
} else {
	// If no image uploaded, update other product details
	$sql_update = "UPDATE user SET FirstName = '$firstName',LastName = '$lastName',Gender = '$gender', PhoneNo = '$phoneNo'  WHERE Email= '$email'" ;
	if (mysqli_query($conn, $sql_update)) {
		$message = 'Saved Successfully without image';

		header("location:profileUser.php");
	} else {
		echo "Error: " . $sql_update . "<br>" . mysqli_error($conn);
	}
}
}


//$sql = "UPDATE user SET FirstName = '$firstName',lastName = '$lastName',gender = '$gender', phoneNo = '$phoneNo' WHERE Email= '$email',thumb='$filePath'";
//$result = mysqli_query($linkz,$sql);

/*if($res){
	echo "<script> alert('Records updated successfully!!')</script>";
	header("location:profileUser.php");
}
else {
	echo "<script>alert('Error: Could not able to execute the query.')</script>";
}

*/

?>
<?php

$sql = "SELECT * FROM user WHERE Email = '$email'";//change Email='email' or Email='$email'
$result = mysqli_query($linkz,$sql);

while ($row = mysqli_fetch_assoc($result)){
  $userID=$row["UserId"];
  $firstName=$row["FirstName"];
  $lastName=$row["LastName"];
  $gender=$row["Gender"];
  $phoneNo=$row["PhoneNo"];
  $nicNo=$row["NICNo"];
  $email=$row["Email"];
  $psw=$row["Password"];
  $thumb=$row["thumb"];

}

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/registerUser.css">
</head>
<body>


<div class="bg-img">
  
  <form class="container" name="user" method="post" enctype="multipart/form-data"  action="edituser.php">
  <h1>Edit Your Data Here</h1> <br>
    
    <p>Please fill in this form to Edit your account details.</p>
  <table>
        <tr> 
            <td width="300px">
 
    <label for="firstName"><b>First Name </b></label><br>
    <input type="text" placeholder="First Name" name="firstName" id="firstName" value="<?php  echo $firstName ?>" required><br>
             

    <label for="phoneNo"><b>Phone No </b></label><br>
      <input type="text" placeholder="Phone No" name="phoneNo" id="phoneNo" value="<?php  echo $phoneNo ?>" required>








      </td>

<!--start right panel-->

<td width="300px">

<label for="lastName"><b>Last Name </b></label><br>
    <input type="text" placeholder="Last Name" name="lastName" id="lastName" value="<?php  echo $lastName ?>" required><br>
  
    <label for="gender"><b>Gender</b></label><br>
     <select id="gender" name="gender" required>
     <option value="" disabled selected>Select Gender</option>
     <option  <?php if($gender == "Male") echo "SELECTED"; ?> >Male</option>
    <option  <?php if($gender == "Female") echo "SELECTED"; ?> >Female</option>
      <option  <?php if($gender == "Other") echo "SELECTED"; ?>>Other</option>
    </select>

</td>

   <td width="300px">
    
   <!--<label for="email"><b>Email</b></label><br>
   <input type="text" placeholder="Enter Email" name="email" id="email" value="<?php  echo $email ?>"  required><br>-->

<!--<label for="nicNo"><b>NIC No </b></label><br>
 <input type="text" placeholder="NIC No" name="nicNo" id="nicNo" value="<?php  echo $nicNo ?>" required>-->
  
   
    

     
      </td>
   </table> 
   <?php if(isset($thumb) && !empty($thumb)): ?>
    <img src="<?php echo $thumb; ?>" alt="" height='150' width='150'><br>
    <a href="deluserimage.php?id=<?php echo $userID; ?>">Delete Image</a><br>
<?php else: ?>
    <div class="form-group">
        <label for="productimage">Product Image</label>
        <input type="file" name="productimage" id="productimage">
        <p class="help-block">Only jpg/png are allowed.</p>
    </div>
<?php endif; ?>


   <hr>   
   <br>
   <table >
   <h1>Change Password</h1> <br>
    <td width="300px" >
   <label for="psw"><b>Current Password</b></label><br>
   <input type="password" placeholder="Password" id="psw" name="psw" ><br>
   
   <label for="newPsw"><b>Password</b></label><br>
   <input type="password" placeholder="Password" id="newPsw" name="newPsw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" ><br>
  </td>  
  <td>
    <label for="psw-repeat"><b>Repeat Password</b></label><br>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" ><br>
    </td>

    </table> 
    

            <div id="message">
              <p>Password must contain the following:</p>
              <li id="letter" class="invalid">A <b>lowercase</b> letter</li>
              <li id="capital" class="invalid">A <b>capital (uppercase)</b> letter</li>
              <li id="number" class="invalid">A <b>number</b></li>
              <li id="length" class="invalid">Minimum <b>8 characters</b></li>
            </div>
            
                 
     

    <input type="submit" name="submit" value="Update"> <br>


      

       

  </form>

  
</div>

<script>
    var myInput = document.getElementById("newPsw");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");
    
    // When the user clicks on the password field, show the message box
    myInput.onfocus = function() {
      document.getElementById("message").style.display = "block";
    }
    
    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function() {
      document.getElementById("message").style.display = "none";
    }
    
    // When the user starts to type something inside the password field
    myInput.onkeyup = function() {
      // Validate lowercase letters
      var lowerCaseLetters = /[a-z]/g;
      if(myInput.value.match(lowerCaseLetters)) {  
        letter.classList.remove("invalid");
        letter.classList.add("valid");
      } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
      }
      
      // Validate capital letters
      var upperCaseLetters = /[A-Z]/g;
      if(myInput.value.match(upperCaseLetters)) {  
        capital.classList.remove("invalid");
        capital.classList.add("valid");
      } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
      }
    
      // Validate numbers
      var numbers = /[0-9]/g;
      if(myInput.value.match(numbers)) {  
        number.classList.remove("invalid");
        number.classList.add("valid");
      } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
      }
      
      // Validate length
      if(myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
      } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
      }
    }
    </script>

</body>
</html>