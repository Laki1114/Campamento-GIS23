
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/registerUser.css">
</head>
<body>


<div class="bg-img">
  
  <form class="container" name="user" method="post" enctype="multipart/form-data"  action="edituser.php">
 

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
    <?php /*
   <!--<label for="email"><b>Email</b></label><br>
   <input type="text" placeholder="Enter Email" name="email" id="email" value="<?php  echo $email ?>"  required><br>-->

<!--<label for="nicNo"><b>NIC No </b></label><br>
 <input type="text" placeholder="NIC No" name="nicNo" id="nicNo" value="<?php  echo $nicNo ?>" required>-->*/
  ?>
   
    

     
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
<!--

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


      

-->

  </form>