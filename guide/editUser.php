<?php require 'config.php';

$email = $_SESSION['email'] ;
$query  = mysqli_query($con, "SELECT * FROM guide WHERE email= '$email' ");

$row = mysqli_fetch_array($query);
if(isset($_POST['edit'])){

   $update_fname = mysqli_real_escape_string($con, $_POST['firstName']);
   $update_lname = mysqli_real_escape_string($con, $_POST['lastName']);
   //$update_gender = mysqli_real_escape_string($linkz, $_POST['gender']);
   $update_phone = mysqli_real_escape_string($con, $_POST['phoneNo']);
   $update_nic = mysqli_real_escape_string($con, $_POST['nicNo']);
   $update_address = mysqli_real_escape_string($con, $_POST['address']);
   $update_location = mysqli_real_escape_string($con, $_POST['location']);

   if(!preg_match('/^\d{10}$/',$update_phone)) {
    $message[] = "Invalid phone number format";
}

// NIC validation
if(!preg_match('/^[0-9]{9}[vVxX]|[0-9]{12}$/',$update_nic)) {
    $message[] = "Invalid NIC format";
} 

   mysqli_query($con, "UPDATE guide SET firstname = '$update_fname', lastname = '$update_lname', phone = '$update_phone', nic = '$update_nic', address =  '$update_address' WHERE email = '$email'") or die(mysqli_error($con));
                $message[] = 'Profile updated successfully';
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/Guide/registerUser.css">
<style>
       body{
    background-image: url("../resource/login.jpg");
  }
    .bg-img {
    /* The image used */
    background-image:  linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
    min-height: 620px;
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;

  }
</style>
</head>
<body>

<?php
      $select = mysqli_query($con, "SELECT * FROM guide WHERE email = '$email'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);

      }
   ?>

<div class="bg-img">
  
  <form class="container" name="user" method="post" action="">
  <h1>Edit Your Data Here</h1> <br>
    
    <p>Please fill in this form to Edit your account details.</p>
  <table>
        <tr> 
            <td width="300px">
 
    <label for="firstName"><b>First Name </b></label><br>
    <input type="text" placeholder="First Name" name="firstName" id="firstName" value="<?php  echo  $fetch['firstname']; ?>"><br>
             
    
    <label for="phoneNo"><b>Phone No </b></label><br>
      <input type="text" placeholder="Phone No" name="phoneNo" id="phoneNo" value="<?php  echo  $fetch['phone']; ?>" >

      </td>

<!--start right panel-->

<td width="300px">

<label for="lastName"><b>Last Name </b></label><br>
    <input type="text" placeholder="Last Name" name="lastName" id="lastName" value="<?php  echo  $fetch['lastname']; ?>" ><br>

<label for="nicNo"><b>NIC No </b></label><br>
 <input type="text" placeholder="NIC No" name="nicNo" id="nicNo" value="<?php  echo  $fetch['nic'];?>" readonly>

</td>

   <td width="300px">
    
   <label for="location"><b>Location</b></label><br>
   <input type="text" placeholder="Enter Location" name="location" id="location" value="<?php  echo  $fetch['location']; ?>" ><br>

   <label for="address"><b>Address</b></label><br>
   <input type="text" placeholder="Enter Address" name="address" id="address" value="<?php  echo  $fetch['address']; ?>" >

      </td>
   </table> 
   <button type="submit" name="edit"> Update</button><br>
      
   <br>
      

  </form>

  
</div>


</body>
</html>