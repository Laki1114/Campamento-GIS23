<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/registerUser.css">
</head>
<body>


<div class="bg-img">
  
  <form action="/action_page.php" class="container">
  <h1>Register as a User</h1> <br>
    
    <p>Please fill in this form to create an account.</p><br>
  <table>
        <tr> 
            <td width="300px">
    

    <label for="firstName"><b>First Name </b></label><br>
    <input type="text" placeholder="First Name" name="firstName" id="firstName" required><br>
                  
    <label for="lastName"><b>Last Name </b></label><br>
    <input type="text" placeholder="Last Name" name="lastName" id="lastName" required><br>

    <label for="gender"><b>Gender</b></label><br>
     <select id="gender" name="gender" required>
     <option value="" disabled selected>Select Gender</option>
    <option>Male</option>
      <option>Female</option>
      <option>Other</option>
     </select><br>
    

     <label for="phoneNo"><b>Phone No </b></label><br>
      <input type="text" placeholder="Phone No" name="phoneNo" id="phoneNo" required><br>

      </td>

<!--start right panel-->

<td width="300px">

<label for="phoneNo"><b>NIC No </b></label><br>
 <input type="text" placeholder="NIC No" name="nicNo" id="nicNo" required><br>

  <label for="email"><b>Email</b></label><br>
   <input type="text" placeholder="Enter Email" name="email" id="email" required><br>
                
   <label for="psw"><b>Password</b></label><br>
   <input type="password" placeholder="Password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>
                
                   
    <label for="psw-repeat"><b>Repeat Password</b></label><br>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required><br>
     </td>
     </table>             
                    
     <b> &nbsp;&nbsp;By creating an account you agree to our <a href="#">Terms & Privacy</a>.</b>
    <br>

    <input type="submit" value="Register"> <br>


        <br><br>
      

       

  </form>

  
</div>

</body>
</html>