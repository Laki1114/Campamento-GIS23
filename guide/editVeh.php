<?php require 'config.php';

$email = $_SESSION['email'];
$query  = mysqli_query($con, "SELECT * FROM guide WHERE email= '$email' ");
$row = mysqli_fetch_array($query);

if(isset($_POST['edit'])){

   $update_qualification = mysqli_real_escape_string($con, $_POST['qualification']);
   $update_location = mysqli_real_escape_string($con, $_POST['location']);
   $update_expertise = implode(',', $_POST['expertise']);
   $update_tour_type = implode(',', $_POST['tour_type']);
 

   mysqli_query($con, "UPDATE guide SET qualification = '$update_qualification', location = '$update_location', expertise = '$update_expertise', tour_types = '$update_tour_type' WHERE email = '$email'") or die(mysqli_error($con));
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
    height: 550px;
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
$select = mysqli_query($con, "SELECT * FROM guide WHERE email = '$email'") or die('query failed');
if(mysqli_num_rows($select) > 0){
   $fetch = mysqli_fetch_assoc($select);
   $expertise = explode(',', $fetch['expertise']);
   $tour_type = explode(',', $fetch['tour_types']);
}
?>

<div class="bg-img">
  
  <form class="container" name="user" method="post" action="">
  <h1>Edit Your Data Here</h1> <br><br>
    
    <p>Please fill in this form to Edit your account details.</p><br><br>
  <table>
        <tr> 
            <td width="200px">
           
<label for="qualification"><b>Qualifications</b></label><br>
<input type="text" placeholder="Enter Qualifications" name="qualification" value="<?php  echo  $fetch['qualification']; ?>"><br>

   <label for="location"><b>Areas you operate </b></label><br>
   <input type="text" placeholder="Location" name="location" id="location" value="<?php  echo  $fetch['location']; ?>" ><br>

   <label for="expertise"><b>Expertise Areas:</b></label><br><br>
          <select id="expertise" name="expertise[]" multiple>
            <option value="Hiking and Backpacking" <?php if(in_array("Hiking and Backpacking", $expertise)) echo 'selected'; ?>>Hiking and Backpacking</option>
            <option value="Campsite Setup and Gear" <?php if(in_array("Campsite Setup and Gear", $expertise)) echo 'selected'; ?>>Campsite Setup and Gear</option>
            <option value="Wildlife Identification" <?php if(in_array("Wildlife Identification", $expertise)) echo 'selected'; ?>>Wildlife Identification</option>
            <option value="Outdoor Cooking and Food Safety" <?php if(in_array("Outdoor Cooking and Food Safety", $expertise)) echo 'selected'; ?>>Outdoor Cooking and Food Safety</option>
            <option value="Navigation and Map Reading" <?php if(in_array("Navigation and Map Reading", $expertise)) echo 'selected'; ?>>Navigation and Map Reading</option>
            <option value="Environmental Education and Conservation" <?php if(in_array("Environmental Education and Conservation", $expertise)) echo 'selected'; ?>>Environmental Education</option>
            <option value="Rock Climbing and Mountaineering" <?php if(in_array("Rock Climbing and Mountaineering", $expertise)) echo 'selected'; ?>>Rock Climbing and Mountaineering</option>
            <option value="Water Sports and Boating" <?php if(in_array("Water Sports and Boating", $expertise)) echo 'selected'; ?>>Water Sports and Boating</option>
            <option value="Photography and Nature Observation" <?php if(in_array("Photography and Nature Observation", $expertise)) echo 'selected'; ?>>Photography and Nature</option>
            <option value="Outdoor Fitness and Wellness" <?php if(in_array("Outdoor Fitness and Wellness", $expertise)) echo 'selected'; ?>>Outdoor Fitness and Wellness</option>
            <option value="Bushcraft and Survival Skills" <?php if(in_array("Bushcraft and Survival Skills", $expertise)) echo 'selected'; ?>>Bushcraft and Survival Skills</option>
            <option value="Cultural and Historical Interpretation" <?php if(in_array("Cultural and Historical Interpretation", $expertise)) echo 'selected'; ?>>Cultural and Historical</option>
            <option value="Birdwatching and Ornithology" <?php if(in_array("Birdwatching and Ornithology", $expertise)) echo 'selected'; ?>>Birdwatching and Ornithology</option>
            <option value="Winter Camping and Snow Sports" <?php if(in_array("Winter Camping and Snow Sports", $expertise)) echo 'selected'; ?>>Winter Camping and Snow Sports</option>
            <option value="Family-Friendly Adventures" <?php if(in_array("Family-Friendly Adventures", $expertise)) echo 'selected'; ?>>Family-Friendly Adventures</option>
          </select><br>

       </td>

<!--start right panel-->

<td width="200px">

<legend><b>Type of Tours:</b></legend>
          <input type="checkbox" id="historical" name="tour_type[]" value="Historical Tours" <?php if(in_array("Historical Tours", $tour_type)) echo 'checked'; ?>>
          <label for="historical">Historical Tours</label><br>
          <input type="checkbox" id="cultural" name="tour_type[]" value="Cultural Tours" <?php if(in_array("Cultural Tours", $tour_type)) echo 'checked'; ?>>
          <label for="cultural">Cultural Tours</label><br>
          <input type="checkbox" id="adventure" name="tour_type[]" value="Adventure Tours" <?php if(in_array("Adventure Tours", $tour_type)) echo 'checked'; ?>>
          <label for="adventure">Adventure Tours</label><br>
          <input type="checkbox" id="nature" name="tour_type[]" value="Nature Tours" <?php if(in_array("Nature Tours", $tour_type)) echo 'checked'; ?>>
          <label for="nature">Nature Tours</label><br>
          <input type="checkbox" id="food" name="tour_type[]" value="Food Tours" <?php if(in_array("Food Tours", $tour_type)) echo 'checked'; ?>>
          <label for="food">Food Tours</label><br>
          <input type="checkbox" id="architecture" name="tour_type[]" value="Architecture Tours" <?php if(in_array("Architecture Tours", $tour_type)) echo 'checked'; ?>>
          <label for="architecture">Architecture Tours</label><br>
          <input type="checkbox" id="art" name="tour_type[]" value="Art Tours" <?php if(in_array("Art Tours", $tour_type)) echo 'checked'; ?>>
          <label for="art">Art Tours</label><br>
          <input type="checkbox" id="photography" name="tour_type[]" value="Photography Tours" <?php if(in_array("Photography Tours", $tour_type)) echo 'checked'; ?>>
          <label for="photography">Photography Tours</label><br>
          <input type="checkbox" id="wellness" name="tour_type[]" value="Wellness Tours" <?php if(in_array("Wellness Tours", $tour_type)) echo 'checked'; ?>>
          <label for="wellness">Wellness Tours</label><br>
          <br>
          <label for="specialty_other"><b>Specialty Tours (Please specify):</b></label><br>
          <input type="text" id="specialty_other" name="specialty_other" placeholder="Tour" value=""><br>
          <br>
</td>

   
   </table> 
   <button type="submit" name="edit"> Update</button><br>
      
   <br>
      

  </form>

  
</div>


</body>
</html>