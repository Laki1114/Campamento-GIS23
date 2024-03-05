<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/registerUser.css">
</head>
<body>


<div class="bg-img">
  
  <form class="container" name="user" method="post" action="./updateUser.php?id=<?php echo $userID;?>">
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