<?php



require("linklinkz.php");


$AID = 1;
$sql = "SELECT * FROM admin WHERE AdminId = '$AID'";
$result = mysqli_query($linkz,$sql);

while ($row = mysqli_fetch_assoc($result)){
  $adminID=$row["AdminId"];
  $firstName=$row["FirstName"];
  $lastName=$row["LastName"];
  $gender=$row["Gender"];
  $phoneNo=$row["PhoneNo"];
  $nicNo=$row["NICNo"];
  $email=$row["Email"];
  $psw=$row["Password"];
}

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Profile </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="css/admin.css">
<style>
      .btn {
    border: 2px solid black;
    background-color: white;
    color: black;
    padding: 5px 10px;
    font-size: 16px;
    cursor: pointer;
    border-radius:10px
  }
  /* Blue */
  .info {
    border-color: #327028;
    color: black;
  }
  
  .info:hover {
    background: #327028;
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

th, td {
    padding: 8px;
    
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
  flex: 2; /* Let the profile picture take 1/4 of the available space */
  text-align: center;
}

.profile-info {
  flex: 2; 
  
  /* Let the profile information take 3/4 of the available space */
}
</style>

</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        
    <div class="navigation">
            
            <?php include 'adminsidebar.php'; ?>
                    
            </div>


        <!-- ========================= Main ==================== -->
        <div class="main">
            

            <!-- ======================= Cards ================== -->
            <div >
                <br><br>
                <h2>Welcome <?php  echo $firstName ?>!</h2>
                <h3>Admin ID - A01</h3>
                <br><br>
                <div class="containerr" >
                    <div class="profile">
                        <div class="container-image">
                        <img src="images/customer02.jpg" alt="profile pic" class="profile-picture" width="300px" height="300px">
                        </div>
                    </div>
                
            
  
                    <div class="profile-info">
                        <table>
                        <tr>
                            <td>First Name : <?php  echo $firstName ?></td>
                        </tr>
                        <tr>
                            <td>NIC no : <?php  echo $nicNo ?></td>
                        </tr>
                        <tr>
                            <td>Last name : <?php  echo $lastName ?></td>
                        </tr>
                        <tr>
                            <td>Email : <?php  echo $email ?></td>
                        </tr>
                        <tr>
                            <td>Gender : <?php  echo $gender ?></td>
                        </tr>
                        <tr>
                            <td>Phone no : <?php  echo $phoneNo ?></td>
                        </tr>
                        <tr>
                            <td><a href='./editAdmin.php?id=1'><button class="btn info">Edit Your Data</button></a></td>
                        </tr>
                    </table>
                
                </div>
  
            </div>

            <br>

            <div class="details2">
                <div class="admincustomer">
                    <div class="cusdet">
                        <h2 >Recent Activities</h2>
                    </div>

                    <table>
                        <thead>
                        <tr>
                                <td>Activity</td>
                                <td>Revenue</td>
                                <td>Payment</td>
                                <td>Status</td>
                            </tr>
                        </thead>

                        <tbody>
                        <tr>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td><span class="status delivered">Delivered</span></td>
                                <td><button class="btn active" > Remove</button></td>
                            </tr>

                            
                            

                            
                        </tbody>
                    </table>
                </div>
            </div></div>

                </div>
            </div>
        </div>
    </div>




    <!-- ====== ionicons ======= -->
</body>

</html>