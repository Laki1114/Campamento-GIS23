<?php require 'config.php';

$email = $_SESSION['email'] ;
$query  = mysqli_query($con, "SELECT * FROM driver WHERE email= '$email' ");

$row = mysqli_fetch_array($query);
if(isset($_POST['edit'])){

   $update_type = mysqli_real_escape_string($con, $_POST['type']);
   $update_model = mysqli_real_escape_string($con, $_POST['model']);
   //$update_gender = mysqli_real_escape_string($linkz, $_POST['gender']);
   $update_ac = mysqli_real_escape_string($con, $_POST['ac']);
   $update_des = mysqli_real_escape_string($con, $_POST['des']);
   $update_exp = mysqli_real_escape_string($con, $_POST['exp']);

   mysqli_query($con, "UPDATE driver SET Vehicle_type = '$update_type', Model = '$update_model', AC = '$update_ac', veh_des = '$update_des', experience =  '$update_exp' WHERE email = '$email'") or die(mysqli_error($con));
                $message[] = 'Profile updated successfully';
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/Driver/registerUser.css">
<style>
    .bg-img {
    /* The image used */
    background-image:  linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
    min-height: 620px;
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;

  }
  .container {
    position: absolute;
    border-radius: 10px;
    height: 500px;
    margin: 50px 300px;
    margin-top: 100px;
    max-width: 700px;
    padding: 16px;
    background-color: #BFCC7C;
  }
  table{
    margin-left: 40px; 
    margin-right: auto;
    width:600px;
    height:170px;
    
  }
  input[type=text] {
    width: 90%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border-radius: 5px;
    border: none;
    background: white;

  }
  button{
    margin-left: 500px;
  }
</style>
</head>
<body>

<?php
      $select = mysqli_query($con, "SELECT * FROM driver WHERE email = '$email'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);

      }
   ?>

<div class="bg-img">
  
  <form class="container" name="user" method="post" action="">
  <h1>Edit Your Data Here</h1> <br><br>
    
    <p>Please fill in this form to Edit your account details.</p><br><br>
  <table>
        <tr> 
            <td width="200px">
           
     <label for="vehicle-des"><b>Vehicle Description </b></label><br>
       <input type="text" placeholder="Vehicle description" name="des" value="<?php  echo  $fetch['veh_des']; ?>" ><br>

     <label for="model"><b>Vehicle Model</b></label><br>
   <input type="text" placeholder="Enter model" name="model" value="<?php  echo  $fetch['Model']; ?>" id="model" ><br>
   
    
    <label for="experience"><b>Experience </b></label><br>
    <input type="text" placeholder="Experience" name="exp" value="<?php  echo  $fetch['experience']; ?>" ><br>
 
   
    
       </td>

<!--start right panel-->

<td width="200px">

<label for="nonac"><b>A/C or Non A/C</b></label><br>
    <select id="nonac" name="ac" required>
    <option value="<?php  echo  $fetch['veh_des']; ?>" selected>Select</option>
    <option>A/C</option>
    <option>Non A/C</option>
    </select><br>

    <label for="type"><b>Vehicle Type</b></label><br>
     <select id="type" name="type" >
     <option value="<?php  echo  $fetch['Vehicle_type']; ?>" >Select</option>
    <option>Car/ Mini SUV(3-4)</option>
      <option>Mini Van(6-7)</option>
      <option>Van(8-9)</option>
     </select><br>
</td>

   
   </table> 
   <button type="submit" name="edit"> Update</button><br>
      
   <br>
      

  </form>

  
</div>


</body>
</html>