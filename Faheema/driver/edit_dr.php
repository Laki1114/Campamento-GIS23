<?php
include('config.php');

if(isset($_POST['edit'])){

   $update_fname = mysqli_real_escape_string($con, $_POST['firstName']);
   $update_lname = mysqli_real_escape_string($con, $_POST['lastName']);
   $update_gender = mysqli_real_escape_string($con, $_POST['gender']);
   $update_phone = mysqli_real_escape_string($con, $_POST['phoneNo']);
   $update_nic = mysqli_real_escape_string($con, $_POST['nicNo']);
   $update_email = mysqli_real_escape_string($con, $_POST['email']);

   mysqli_query($con, "UPDATE `guide` SET firstname = '$update_fname', gender = '$update_gender',phone = '$update_phone', nic = '$update_nic',email = '$update_email' WHERE id = '8'") or die('query failed');

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($con, md5($_POST['psw']));
   $new_pass = mysqli_real_escape_string($con, md5($_POST['psw-repeat']));
   $confirm_pass = mysqli_real_escape_string($con, md5($_POST['psw-repeat']));

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
    if($update_pass != $old_pass){
       $message[] = 'old password not matched!';
    }elseif($new_pass != $confirm_pass){
       $message[] = 'confirm password not matched!';
    }else{
       mysqli_query($db, "UPDATE `guide` SET password = '$confirm_pass' WHERE id = '7'") or die('query failed');
       $message[] = 'password updated successfully!';
    }
 }
   }



?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="editgui.css">
    <title></title>
</head>
<body>
<?php
      $select = mysqli_query($con, "SELECT * FROM `guide` WHERE id = '7'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);

      }
   ?>
    <form method="post" enctype="multipart/form-data">
        <fieldset>
         <legend></legend>
    <table>
        <td>
    <div class="container">
    <h1>Edit your Details Here</h1>
    <p>Please update the details where necessary.</p>
    <hr>

    <label for="firstName"><b>First Name </b></label><br>
    <input type="text" value="" name="firstName"  required><br>

    <label for="lastName"><b>Last Name </b></label><br>
    <input type="text" value="" name="lastName"  required><br>


    <label for="gender"><b>Gender</b></label><br>
    <select id="gender" value=""name="gender" required>
      <option value="" disabled selected>Select Gender</option>
      <option value="male">Male</option>
      <option value="female">Female</option>
      <option value="other">Other</option>
    </select><br>

    <label for="phoneNo"><b>Phone No </b></label><br>
    <input type="text" value="" name="phoneNo" required><br>
    <label for="phoneNo"><b>NIC No </b></label><br>
    <input type="text" value="" name="nicNo"  required><br>

    <label for="email"><b>Email</b></label><br>
    <input type="text" email="" name="email"  required><br>
</td>
</div>
<td class="table-right">
    <h4>Change password</h4><br>
    <input type="hidden" name="old_pass" value="">
    <label for="psw"><b>Current Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="psw" required><br>
                
    <label for="psw-repeat"><b>New Password</b></label><br>
    <input type="password" placeholder="Repeat Password" name="psw-repeat"  required><br>
    <label for="psw-repeat"><b>Confirm Password</b></label><br>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required><br>


        <button type="submit" name="edit" class="registerbtn"><b>Update</b></button>
    
</td>
</table>
</fieldset>
</form>
</body>
</html>