<?php 
      require '../database/linklinkz.php';
  
        if(!isset($_SESSION['email'])){
            header('location: ../login/login.php');
        }
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Profile </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../css/Driver/admin.css">
<style>
      .btn {
    border: 2px solid black;
    background-color: white;
    color: black;
    padding: 5px 10px;
    font-size: 16px;
    cursor: pointer;
  }
  /* Blue */
  .info {
    border-color: #52f321;
    color: rgb(7, 83, 68);
  }
  
  .info:hover {
    background: #11b044;
    color: white;
  }


h2,h3 {
    text-align:center;
    line-height:30px;
}

table {
  margin-top: 0px;
  width: 100%; 
  border: none;height
}

.move-content{
  margin-left:40px;
}

/* =========================wrapping profile pic and table=====================*/
.containerr {
  display: flex; /* Use flexbox to arrange elements horizontally */
  align-items: center; /* Vertically center-align elements */
  margin-left: 70px;
  margin-top:0px;

}

.profile {
  flex: 1; /* Let the profile picture take 1/4 of the available space */
  margin-left: 320px;
}

.profile-info {
  flex: 3; 
  /* Let the profile information take 3/4 of the available space */
}

.edit-button {
  display: block;
            margin-top: 10px;
            padding: 3px 8px;
            background-color: #0f3411;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

   
        .edit-button:hover {
            background-color: #45a049;
        }
        .experience-grid {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

.experience-item {
  flex: 0 1 calc(33.333% - 20px);
  box-sizing: border-box;
  margin-right: 20px;
  margin-bottom: 20px;
  background-color: #fff;
  padding: 10px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
}

.experience-item img {
  max-width: 100%;
  height: auto;
  border-radius: 2px;
}

.edit-v {
    position: relative;
    top: 10px; /* Adjust top position as needed */
    right: 10px; /* Adjust right position as needed */
    padding: 4px 8px;
    background-color: #0f3411; /* Adjust the background color as needed */
    color: #fff; /* Adjust the text color as needed */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-left:800px;
}

.edit-v:hover {
    background-color: #45a049; /* Adjust the hover background color as needed */
}
.v-desc{
  margin-left:50px;
}
</style>

</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
        <?php include 'driver_sb.php'; ?>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="images/customer01.jpg" alt="">
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            <div >
            <?php    
 
 $email = $_SESSION['email'] ;
 $query  = mysqli_query($linkz, "SELECT * FROM driver WHERE email= '$email' ");

 $row = mysqli_fetch_array($query);

?>
                <h2>Welcome <?php echo $row['firstname']; ?>!</h2>
                <h3>User ID - <b>D<?php echo $row['d_id']; ?></b></h3>
                <div class="containerr" >
                    <div class="profile">
                    <div class="container-image">
                    <img src="<?php echo $row['picture']; ?>" alt="profile pic" class="profile-picture" width="200px" height="200px">
                    </div>
                    </div>
                </div>
            
  
                <div class="profile-info">
                  <br>
                    <table>
                    <tr>
                        <td>First Name : <?php echo $row['firstname']; ?></td>
                        <td>NIC no :  <?php echo $row['nic']; ?></td>
                    </tr>
                    <tr>
                        <td>Last name :  <?php echo $row['lastname']; ?></td>
                        <td>Email :  <?php echo $row['email']; ?></td>
                    </tr>
                    <tr>
                        <td>Gender : <?php echo $row['gender']; ?> </td>
                        <td>Phone no : <?php echo $row['phone']; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        
                        <td><br><button class="btn info">Edit Your Data</button></td>
                    </tr>
                    </table>
                
                </div>
  
            </div>

             

            <!-- ================ Order Details List ================= -->
        <br><br>
       <h2><b>Vehicle Pictures</b></h2>
       <br>
       <div class="experience-grid">
      <div class="experience-item">
          <img src="../resource/ex 1.jpg" alt="Experience 1">
          <button class="edit-button" onclick="editImage(1)">Edit</button>
      </div>
      <div class="experience-item">
          <img src="../resource/ex 2.jpg" alt="Experience 2">
          <button class="edit-button" onclick="editImage(2)">Edit</button>
      </div>
      <div class="experience-item">
          <img src="../resource/ex 3.jpg" alt="Experience 3">
          <button class="edit-button" onclick="editImage(3)">Edit</button>
     </div>
  </div>

<!--script for image edit -->
  <script>
    function editImage(imageNumber) {
        // Add your edit functionality here
        alert("Editing Image " + imageNumber);
    }
    
</script>
<div class="v-desc">
    <h2><b>Vehicle Description</b></h2><br>
   <p> Vehicle Name/Model: <br>

Make and model of the vehicle (e.g., Toyota Camry, Ford Explorer).
Vehicle Type: <br>

Categorization based on size or purpose (e.g., sedan, SUV, convertible). <br>
Capacity:

Number of passengers the vehicle can accommodate. <br>




Type of transmission (automatic or manual).
Features: <br>

Highlight notable features like air conditioning, navigation system, Bluetooth connectivity, sunroof, etc.
Fuel Efficiency: <br>


Any restrictions or allowances on the distance the vehicle can be driven. <br>
Pickup/Drop-off Location: <br>

</p>
<button class="edit-v">Edit</button>
</div>
<br><br>
       <h2><b>Experience</b></h2>
       <br>
       <div class="experience-grid">
      <div class="experience-item">
          <img src="ex 1.jpg" alt="Experience 1">
          <button class="edit-button" onclick="editImage(1)">Edit</button>
      </div>
      <div class="experience-item">
          <img src="ex 2.jpg" alt="Experience 2">
          <button class="edit-button" onclick="editImage(2)">Edit</button>
      </div>
      <div class="experience-item">
          <img src="ex 3.jpg" alt="Experience 3">
          <button class="edit-button" onclick="editImage(3)">Edit</button>
     </div>
  </div>

  <div class="v-desc">
 
   <p> Knuckles Mountain Range:
   <br>
A picturesque mountain range offering camping opportunities with stunning views, lush forests, and diverse wildlife.<br>
Horton Plains National Park:
<br>
Known for its highland plateau, this national park provides a unique camping experience surrounded by grasslands and beautiful landscapes. The World's End viewpoint is a must-visit.<br>
Gal Oya National Park:
<br>
A less-explored national park with camping options. Visitors can enjoy boat safaris and experience the natural beauty and wildlife, including elephants and birds.
Riverston Campsite:
<br>
Located in the Matale District, Riverston offers a serene camping experience with panoramic views, waterfalls, and hiking trails.<br>


</p>
<button class="edit-v">Edit</button>
</div>
    <!-- ====== ionicons ======= -->
</body>

</html>
            <!-- ======================= Cards ================== -->
           