<?php  
include_once('config.php');  
   

$sql = "SELECT * FROM guide WHERE id = '8'";
$result = mysqli_query($con,$sql);

while ($row = mysqli_fetch_assoc($result)){
    $userID=$row["id"];
  $firstName=$row["firstname"];
  $lastName=$row["lastname"];
  $gender=$row["gender"];
  $phoneNo=$row["phone"];
  $nicNo=$row["nic"];
  $email=$row["email"];
  $psw=$row["password"];
}
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="editgui.css">
    <title></title>
</head>
<body>

    <form method="post" action="edit.php?id=<?php echo $userID;?>" enctype="multipart/form-data">
        <fieldset>
         <legend></legend>
    <table>
        <td>
    <div class="container">
    <h1>Edit your Details Here</h1>
    <p>Please update the details where necessary.</p>
    <hr>

    <label for="firstName"><b>First Name </b></label><br>
    <input type="text" value="<?php  echo $firstName ?>" name="firstName"  required><br>

    <label for="lastName"><b>Last Name </b></label><br>
    <input type="text" value="<?php  echo $lastName ?>" name="lastName"  required><br>

    <label for="gender"><b>Gender</b></label><br>
    <select id="gender" value=""name="gender" required>
      <option disabled selected>Select Gender</option>
      <option value="<?php if($gender == "male") echo "male"; ?>">Male</option>
      <option value="<?php if($gender == "female") echo "female"; ?> ">Female</option>
      <option value="<?php if($gender == "other") echo "other"; ?>">Other</option>
    </select><br>

    <label for="phoneNo"><b>Phone No </b></label><br>
    <input type="text" value="<?php  echo $phoneNo ?>" name="phoneNo" required><br>
    <label for="phoneNo"><b>NIC No </b></label><br>
    <input type="text" value="<?php  echo $nicNo ?>" name="nicNo"  required><br>

    <label for="email"><b>Email</b></label><br>
    <input type="text" value="<?php  echo $email ?>" name="email"  required><br>
</td>
</div>
<td class="table-right">
    <h4>Change password</h4><br>
    <label for="psw"><b>Current Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="psw" required><br>
                
    <label for="psw-repeat"><b>New Password</b></label><br>
    <input type="password" placeholder="Repeat Password" name="newPsw"  required><br>
    <label for="psw-repeat"><b>Confirm Password</b></label><br>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required><br>


        <button type="submit" name="edit" class="registerbtn"><b>Update</b></button>
    
</td>
</table>
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
</fieldset>
</form>
</body>
</html>