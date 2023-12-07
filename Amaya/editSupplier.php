<?php

require("linklinkz.php");


$SID = 0;
$sql = "SELECT * FROM supplier WHERE SupplierId = '$SID'";
$result = mysqli_query($linkz,$sql);

while ($row = mysqli_fetch_assoc($result)){
  $supplierID=$row["SupplierId"];
  $firstName=$row["FirstName"];
  $lastName=$row["LastName"];
  $gender=$row["Gender"];
  $phoneNo=$row["PhoneNo"];
  $nicNo=$row["NICNo"];
  $email=$row["Email"];
  $psw=$row["Password"];
}
?>



<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
    <link rel="stylesheet" href="editSupplier.css">
    <link rel="stylesheet" href="passwordvalid.css">
    <title></title>
</head>
<body>

<form method="post" action="./updateSupplier.php?id=<?php echo $supplierID;?>" >	
    <table>
        <tr> 
            <td>
                <!--start left panel-->
               
                    <div class="container">
                      <h1>Edit Your Data Here</h1>
                      <p>Please fill in this form to Edit your account details.</p>
                      <hr>
                  
                      <label for="firstName"><b>First Name </b></label><br>
                      <input type="text" placeholder="First Name" name="firstName" id="firstName" value="<?php  echo $firstName ?>" required><br>
                  
                      <label for="lastName"><b>Last Name </b></label><br>
                      <input type="text" placeholder="Last Name" name="lastName" id="lastName"  value="<?php  echo $lastName ?>" required><br>

            
                      <label for="gender"><b>Gender</b></label><br>
                      <select id="gender" name="gender" required>
                        
                        <option  <?php if($gender == "Male") echo "SELECTED"; ?> >Male</option>
                        <option  <?php if($gender == "Female") echo "SELECTED"; ?> >Female</option>
                        <option  <?php if($gender == "Other") echo "SELECTED"; ?>>Other</option>
                      </select><br>
                  
                      <label for="phoneNo"><b>Phone No </b></label><br>
                      <input type="text" placeholder="Phone No" name="phoneNo" id="phoneNo"  value="<?php  echo $phoneNo ?>" required><br>
                    </div>
                      
            </td>

            <!--start right panel-->

            <td width="450px">
                
                <div class="container-right">
                    <label for="NICNo"><b>NIC No </b></label><br>
                    <input type="text" placeholder="NIC No" name="nicNo" id="nicNo"  value="<?php  echo $nicNo ?>" required><br>

                    <label for="email"><b>Email</b></label><br>
                    <input type="text" placeholder="Enter Email" name="email" id="email" value="<?php  echo $email ?>"  required><br>
                
                   </div> 
                  
            </td>
            
        </tr>
         <!--second row-->
        <tr><td colspan="2"><hr/></td><td></td></tr>
        <!--third row-->
        <tr>
            
            <td>
                
                <div class="container">
                <h2>Change password</h2><br>
            <label for="psw"><b>Current Password</b></label><br>
            <input type="password" placeholder="Enter Password" name="psw" id="psw" ><br>
                    
            <label for="newPsw"><b>New Password</b></label><br>
            <input type="password" id="newPsw" name="newPsw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" ><br>

                
                   
                    <label for="psw-repeat"><b>Repeat Password</b></label><br>
                    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" >
                </div>
            
          
            </td>
            <td>
                
            <div id="message">
              <h3>Password must contain the following:</h3>
              <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
              <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
              <p id="number" class="invalid">A <b>number</b></p>
              <p id="length" class="invalid">Minimum <b>8 characters</b></p>
            </div>
        </div>
        </td>
          <!--fourth row-->
        </tr>
        <tr><td colspan="2">
            <hr>
            
                  
                   <div class="latter">
                    <button type="submit" class="registerbtn"><b>Update</b></button>
                </div>
                  </div>
        </td>

        <td></td>
    </tr>
    
</form>

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
    </body></html>               