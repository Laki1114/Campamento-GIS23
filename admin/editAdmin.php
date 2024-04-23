<?php
require("linklinkz.php");

// Check if Admin ID is provided in the URL
if(isset($_GET['id'])) {
    $adminID = $_GET['id'];

    // Retrieve admin data from the database
    $sql = "SELECT * FROM admin WHERE AdminId = '$adminID'";
    $result = mysqli_query($linkz, $sql);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $firstName = $row["FirstName"];
        $lastName = $row["LastName"];
        $gender = $row["Gender"];
        $phoneNo = $row["PhoneNo"];
        $nicNo = $row["NICNo"];
        $email = $row["Email"];
        $psw = $row["Password"];
    } else {
        echo "Admin not found.";
        exit;
    }
} else {
    echo "Admin ID not provided.";
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve and sanitize form data
  $firstName = mysqli_real_escape_string($linkz, $_POST['firstName']);
  $lastName = mysqli_real_escape_string($linkz, $_POST['lastName']);
  $gender = mysqli_real_escape_string($linkz, $_POST['gender']);
  $phoneNo = mysqli_real_escape_string($linkz, $_POST['phoneNo']);
  $nicNo = mysqli_real_escape_string($linkz, $_POST['nicNo']);
  $email = mysqli_real_escape_string($linkz, $_POST['email']);

  // Update admin information in the database
  $updateSql = "UPDATE admin SET FirstName='$firstName', LastName='$lastName', Gender='$gender', PhoneNo='$phoneNo', NICNo='$nicNo', Email='$email' WHERE AdminId='$adminID'";
  if (mysqli_query($linkz, $updateSql)) {
    header("Location: adminprofile.php?id=$adminID");
  } else {
      echo "Error updating admin information: " . mysqli_error($linkz);
  }




}
?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/editAdmin.css">
</head>
<body>


<div class="bg-img">
  
  <form class="container" name="user" method="post" action="">
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

<label for="nicNo"><b>NIC No </b></label><br>
 <input type="text" placeholder="NIC No" name="nicNo" id="nicNo" value="<?php  echo $nicNo ?>" required>

</td>

   <td width="300px">
    
   <label for="email"><b>Email</b></label><br>
   <input type="text" placeholder="Enter Email" name="email" id="email" value="<?php  echo $email ?>"  required><br>


  
    <label for="gender"><b>Gender</b></label><br>
     <select id="gender" name="gender" required>
     <option value="" disabled selected>Select Gender</option>
     <option  <?php if($gender == "male") echo "SELECTED"; ?> >Male</option>
    <option  <?php if($gender == "female") echo "SELECTED"; ?> >Female</option>
      <option  <?php if($gender == "other") echo "SELECTED"; ?>>Other</option>
    </select>
    

     
      </td>
   </table> 
   <hr>   
   <br>
          
     

    <input type="submit" value="Update"> <br>


      

       

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