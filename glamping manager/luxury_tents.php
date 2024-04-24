<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wild Glamping Sites</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>

        /* =========== Google Fonts ============ */
        @import url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap");

/* =============== Globals ============== */
* {
  font-family: "Ubuntu", sans-serif;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

:root {
  --green: #003D25;
  --white: #fff;
  --yellow: #BFCC7C;
  --gray: #f5f5f5;
  --black1: #222;
  --black2: #999;
}

body {
  min-height: 100vh;
  overflow-x: hidden;
  background: var(--yellow);
}


/* ===================== Main ===================== */
.main {
    position: absolute;
    width: calc(100% - 300px);
    left: 300px;
    min-height: 100vh;
    background: var(--yellow);
    transition: 0.5s;
  }
  .main.active {
    width: calc(100% - 80px);
    left: 80px;
  }
  .topbar {
    width: 100%;
    height: 60px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 10px;
  }
  
  .toggle {
    position: relative;
    width: 60px;
    height: 60px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 2.5rem;
    cursor: pointer;
  }
  
  .search {
    position: relative;
    width: 400px;
    margin: 0 10px;
    margin-right: 350px;
  }
  
  .search label {
    position: relative;
    width: 100%;
  }
  
  .search label input {
    width: 100%;
    height: 40px;
    border-radius: 40px;
    padding: 5px 20px;
    padding-left: 35px;
    font-size: 18px;
    outline: none;
    border: 1px solid var(--black2);
  }
  
  .search label ion-icon {
    position: absolute;
    top: 0;
    left: 10px;
    font-size: 1.2rem;
  }
  
  .user {
    position: relative;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    overflow: hidden;
    cursor: pointer;
  }
  
  .user img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  .star-container {
    text-align: center;
    margin-left: 20px;
  }

        
.card {
    margin-bottom: 30px;
            width: 100%;
            box-shadow: 2px 2px 20px #000;
            border-radius: 5px;
}
.card-body{
  height: 500px;
}

.button{
   border: none;
   color: #327028;
   padding: 15px 55px;
   text-align: center;
   text-decoration: none;
   display: inline-block;
   font-size: 18px;
   margin: 2px 2px;
   cursor: pointer;
   background-color: #eef0b9d4;
   border-radius: 25px;
   font-weight: 900;
   font-family: "Ubuntu", sans-serif;
 }
 .button:hover{
     background-color: rgb(250,250,210);
   color: #327028;
   transition: .5s;
   cursor: pointer;
 }
 a {
   text-decoration: none;
   display: inline-block;
   padding: 8px 16px;
   
 }


      
    </style>
</head>
<body>

<!------sites---->
<div id="sidebar">
            <?php
            include("sidebar.php");
            ?>
        </div>

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

                
            </div>




<div class="container">
        
        <div class="row">
            <?php
            // Database connection
            $conn = mysqli_connect("localhost", "root", "", "campamento");

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Query to select wild glamping sites
            $category = "Luxurysite";
            $sql = "SELECT * FROM glmp_sites WHERE site_category = '$category'";
            $result = mysqli_query($conn, $sql);

            // Check if there are any rows returned
            if (mysqli_num_rows($result) > 0) {
                // Loop through each row of data
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="col-md-4">
                        <div class="card">
                        <img src="uploads/<?php echo $row['site_image']; ?>" class="card-img-top" alt="Site Image"> 
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['site_name']; ?></h5>
                                <p class="card-text"><?php echo $row['site_description']; ?></p>
                                <p class="card-text"><?php echo $row['room1_type']; ?>: LKR <?php echo $row['room1_price']; ?></p>
                                
                                <p class="card-text"><?php echo $row['room2_type']; ?> : LKR <?php echo $row['room2_price']; ?></p>
                                <a href="booking_process.php" class="button">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "No Luxury site found.";
            }

            // Close database connection
            mysqli_close($conn);
            ?>
        </div>
    </div>
</div>
   
</body>
</html>





