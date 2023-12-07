<?php  ?>
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
  text-align: center;
}

.profile-info {
  flex: 3; 
  /* Let the profile information take 3/4 of the available space */
}
</style>

</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="home.php">
                        <span class="icon">
                            <ion-icon name="logo-apple"></ion-icon>
                        </span>
                        <span  class="as"><img src="images/logo.png" alt="" width="150" height="70"></span>
                    </a>
                </li>

                <li>
                    <a href="home.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Home</span>
                    </a>
                </li>

                <li>
                    <a href="admin.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="admincustomer.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Manage User</span>
                    </a>
                </li>
                

                <li>
                    <a href="adminad.php">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Advertisement</span>
                    </a>
                </li>

                <li>
                    <a href="adminmessege.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Messages</span>
                    </a>
                </li>

                <li>
                    <a href="adminhelp.php">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Help</span>
                    </a>
                </li>


                <li>
                    <a href="adminprofile.php">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <span class="title">Profile</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
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
                <h2>Welcome John!</h2>
                <h3>User ID - U102</h3>
                <div class="containerr" >
                    <div class="profile">
                    <div class="container-image">
                    <img src="images/customer02.jpg" alt="profile pic" class="profile-picture" width="200px" height="200px">
                    </div>
                    </div>
                </div>
            
  
                <div class="profile-info">
                    <table>
                    <tr>
                        <td>First Name : John</td>
                        <td>NIC no : 200036785469</td>
                    </tr>
                    <tr>
                        <td>Last name : Fernando</td>
                        <td>Email : johnfernando12@gmail.com</td>
                    </tr>
                    <tr>
                        <td>Gender : Male</td>
                        <td>Phone no : 0715428778</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button class="btn info">Edit Your Data</button></td>
                    </tr>
                    </table>
                
                </div>
  
            </div>

             

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Admin Details</h2>
                        <a href="admindetails.php" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Admin ID</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Telephone</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>A001</td>
                                <td>John</td>
                                <td>john123@gmail.com</td>
                                <td>0719747670</span></td>
                            </tr>

                            <tr>
                                <td>A001</td>
                                <td>John</td>
                                <td>john123@gmail.com</td>
                                <td>0719747670</span></td>
                            </tr>

                            <tr>
                                <td>A001</td>
                                <td>John</td>
                                <td>john123@gmail.com</td>
                                <td>0719747670</span></td>
                            </tr>

                            <tr>
                                <td>A001</td>
                                <td>John</td>
                                <td>john123@gmail.com</td>
                                <td>0719747670</span></td>
                            </tr>

                            <tr>
                                <td>A001</td>
                                <td>John</td>
                                <td>john123@gmail.com</td>
                                <td>0719747670</span></td>
                            </tr>

                            <tr>
                                <td>A001</td>
                                <td>John</td>
                                <td>john123@gmail.com</td>
                                <td>0719747670</span></td>
                            </tr>

                            <tr>
                                <td>A001</td>
                                <td>John</td>
                                <td>john123@gmail.com</td>
                                <td>0719747670</span></td>
                            </tr>

                            <tr>
                                <td>A001</td>
                                <td>John</td>
                                <td>john123@gmail.com</td>
                                <td>0719747670</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Admins</h2>
                    </div>

                    <table>
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="images/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Sri Lanka | 12:00 </span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="images/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>Sri Lanka | 12:00</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="images/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Sri Lanka | 12:00</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="images/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>Sri Lanka | 12:00</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="images/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Sri Lanka | 12:00</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="images/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>Sri Lanka | 12:00</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="images/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Sri Lanka | 12:00</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="images/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>Sri Lanka | 12:00</span></h4>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <!-- ====== ionicons ======= -->
</body>

</html>