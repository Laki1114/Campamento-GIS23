<?php
      require '../../Roshana/linklinkz.php';
      session_start();
        if(!isset($_SESSION['email'])){
            header('location: ./login/login.php');
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


h1,h2 {
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
  margin-left: 280px;
}

.profile-info {
  flex: 1; 
  /* Let the profile information take 3/4 of the available space */
}

.profile-info p{
  margin-left: 70px;
  font-size: 20px;
  /* Let the profile information take 3/4 of the available space */
}
</style>

</head>

<body>
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
        <br>
                <h1>User ID - <b>D<?php echo $row['d_id']; ?></b></h1>
                <br>
                <div class="containerr" >
                    <div class="profile">
                    <div class="container-image">
               <img src="<?php echo $row['picture']; ?>" alt="profile pic" class="profile-picture" style="border: 5px solid #000000; padding:3px; margin: 5px;" width="250px" height="250px">
                 <button style="margin-left:10px;">Change</button>
                  </div>
                    </div>
                </div>
            <br>
  
                <div class="profile-info">
                    <br><br>
                <p><b>First Name : </b>  <?php echo $row['firstname']; ?></p>  <br>
                <p><b>Last name : </b> <?php echo $row['lastname']; ?></p><br>
                <p><b>Email : </b>   <?php echo $row['email']; ?></p><br>
                <p><b>NIC No : </b>  <?php echo $row['nic']; ?></p><br>   
                <p><b>Gender :  </b> <?php echo $row['gender']; ?>  </p><br>
                <p><b>Phone No :   </b> <?php echo $row['phone']; ?></p><br>
         <br>
       
                </div>
  
            </div>

        
        </div>
    </div>



    <!-- ====== ionicons ======= -->
</body>

</html>