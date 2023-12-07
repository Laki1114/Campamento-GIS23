<?php  ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Dashboard </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="css/admin.css">
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


            <!-- ================ Order Details List ================= -->
            <div class="details2">
                <div class="admincustomer">
                    <div class="cusdet">
                        <h2>User Details</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>User ID</td>
                                <td>Name</td>
                                <td>User type</td>
                                <td>E-mail</td>
                                <td>E-mail</td>
                                <td>E-mail</td>
                                <td>E-mail</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>U001</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>U002</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                
            </div>


            <div class="details2">
                <div class="admincustomer">
                    <div class="cusdet">
                        <h2>Glamping Site Manager Details</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>User ID</td>
                                <td>Name</td>
                                <td>User type</td>
                                <td>E-mail</td>
                                <td>E-mail</td>
                                <td>E-mail</td>
                                <td>E-mail</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>U001</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>U002</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="details2">
                <div class="admincustomer">
                    <div class="cusdet">
                        <h2>Guide Details</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>User ID</td>
                                <td>Name</td>
                                <td>User type</td>
                                <td>E-mail</td>
                                <td>E-mail</td>
                                <td>E-mail</td>
                                <td>E-mail</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>U001</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>U002</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>



            <div class="details2">
                <div class="admincustomer">
                    <div class="cusdet">
                        <h2>Tool Supplier Details</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>User ID</td>
                                <td>Name</td>
                                <td>User type</td>
                                <td>E-mail</td>
                                <td>E-mail</td>
                                <td>E-mail</td>
                                <td>E-mail</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>U001</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>U002</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                
            </div>




            <div class="details2">
                <div class="admincustomer">
                    <div class="cusdet">
                        <h2>Driver Details</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>User ID</td>
                                <td>Name</td>
                                <td>User type</td>
                                <td>E-mail</td>
                                <td>E-mail</td>
                                <td>E-mail</td>
                                <td>E-mail</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>U001</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>U002</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>

                            <tr>
                            <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td>Paid</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                
            </div>


        </div>
    </div>



    <!-- ====== ionicons ======= -->
</body>

</html>