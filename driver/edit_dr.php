<?php
      require '../../Roshana/linklinkz.php';
      session_start();
$email = $_SESSION['email'] ;
$query  = mysqli_query($linkz, "SELECT * FROM driver WHERE email= '$email' ");

$row = mysqli_fetch_array($query);
if(isset($_POST['edit'])){

   $update_fname = mysqli_real_escape_string($linkz, $_POST['firstName']);
   $update_lname = mysqli_real_escape_string($linkz, $_POST['lastName']);
   //$update_gender = mysqli_real_escape_string($linkz, $_POST['gender']);
   $update_phone = mysqli_real_escape_string($linkz, $_POST['phoneNo']);
   $update_nic = mysqli_real_escape_string($linkz, $_POST['nicNo']);
  // $update_email = mysqli_real_escape_string($linkz, $_POST['email']);

   mysqli_query($linkz, "UPDATE `driver` SET firstname = '$update_fname',phone = '$update_phone', nic = '$update_nic', WHERE email = '$email'") or die('query failed');

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($linkz, md5($_POST['psw']));
   $new_pass = mysqli_real_escape_string($linkz, md5($_POST['psw-repeat']));
   $confirm_pass = mysqli_real_escape_string($linkz, md5($_POST['psw-repeat']));

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
    if($update_pass != $old_pass){
       $message[] = 'old password not matched!';
    }elseif($new_pass != $confirm_pass){
       $message[] = 'confirm password not matched!';
    }else{
       mysqli_query($db, "UPDATE `driver` SET password = '$confirm_pass' WHERE email = '$email'") or die('query failed');
       $message[] = 'password updated successfully!';
    }
 }
   }



?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Profile </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="admin.css">


</head>

<body>
<?php
      $select = mysqli_query($linkz, "SELECT * FROM `driver` WHERE email = '$email'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);

      }
   ?>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
        <?php include 'sidebar.php'; ?>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

            
            </div>

            <!-- ======================= Cards ================== -->
            <div >
            <form method="post" enctype="multipart/form-data">
        <fieldset>
         <legend></legend>
    <table>

   
        <td>

    <div class="containe">
    <h1>Edit your Details Here</h1>
    <p>Please update the details where necessary.</p>
    <hr>

    <label for="firstName"><b>First Name </b></label><br>
    <input type="text" value="<?php echo $fetch['firstname']; ?>" name="firstName" required><br>

    <label for="lastName"><b>Last Name </b></label><br>
    <input type="text" value="<?php echo $fetch['lastname']; ?>" name="lastName"  required><br>

    <label for="phoneNo"><b>Phone No </b></label><br>
    <input type="text" value="<?php echo $fetch['phone']; ?>" name="phoneNo" required><br>

    <label for="phoneNo"><b>NIC No </b></label><br>
    <input type="text" value="<?php echo $fetch['nic']; ?>" name="nicNo"  required><br>

</td>

</div>
<div class="container-right">
<td class="table-right">


    <h4>Change password</h4><br>
    <input type="hidden" name="old_pass" value="">
    <label for="psw"><b>Current Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="psw" ><br>
                
    <label for="psw-repeat"><b>New Password</b></label><br>
    <input type="password" placeholder="Repeat Password" name="psw-repeat"  ><br>
    <label for="psw-repeat"><b>Confirm Password</b></label><br>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" ><br>


        <button type="submit" name="edit" class="registerbtn"><b>Update</b></button>
    
</td>
</table>
</fieldset>
</form>
  
            </div>
            </body>
</html>
             




                        



  