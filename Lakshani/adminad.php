<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Manage Advertisement </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="css/admin.css">

    <style>


.contain {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.contain::after {
  content: "";
  clear: both;
  display: table;
}

.contain img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.contain img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}


/* Style the buttons */
.btn {
  border: none;
  outline: none;
  padding: 12px 16px;
  color: white;
  background-color: #327028;
  cursor: pointer;
}

.btn:hover {
  background-color: #ddd;
  color:black;
}

.btn.active {
  background-color: red;
  color: white;
}

.btn.active:hover {
  background-color: black;
  color: white;
}


</style>

</head>
<body>

<div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="home.php">
                        <span class="icon">
                            <ion-icon name="logo-apple"></ion-icon>
                        </span>
                        <span  class="as" ><img src="images/logo.png" alt="" width="150" height="70" ></span>
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
                        <span class="title">Manage user</span>
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

           

                
               

<div class="details2">
<div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Manage Advertisment</h2>
                        
                    </div>
                    



<div class="contain">
  <img src="images/customer01.jpg" alt="Avatar" style="width:100%;">
  <h4>David | 12:00</h4>
  <h3>THE BEST CAMPING ASSESORIES ULTIMATE CHECKLIST</h3>
  <p>Camping is one of the captivating ways to get in touch 
    with outdoor surroundings. Get top recommendations on 
    best camping essentials for a camping trip. </p>
    <p>See more....</p>
  <span class="time-right">
    <button class="btn" > Post </button> 
  <button class="btn active" > Reject</button>
</span>
</div>



<div class="contain">
  <img src="images/customer01.jpg" alt="Avatar" style="width:100%;">
  <h4>David | 12:00</h4>
  <h3>THE BEST CAMPING ASSESORIES ULTIMATE CHECKLIST</h3>
  <p>Camping is one of the captivating ways to get in touch 
    with outdoor surroundings. Get top recommendations on 
    best camping essentials for a camping trip. </p>
    <p>See more....</p>
  <span class="time-right">
  <button class="btn" > Post </button> 
  <button class="btn active" > Reject </button>
  </span>
</div>

<div class="contain">
  <img src="images/customer01.jpg" alt="Avatar" style="width:100%;">
  <h4>David | 12:00</h4>
  <h3>THE BEST CAMPING ASSESORIES ULTIMATE CHECKLIST</h3>
  <p>Camping is one of the captivating ways to get in touch 
    with outdoor surroundings. Get top recommendations on 
    best camping essentials for a camping trip. </p>
    <p>See more....</p>
  <span class="time-right">
    <button class="btn" > Post </button> 
  <button class="btn active" > Reject </button>
</span>
</div>



<div class="contain">
  <img src="images/customer01.jpg" alt="Avatar" style="width:100%;">
  <h4>David | 12:00</h4>
  <h3>THE BEST CAMPING ASSESORIES ULTIMATE CHECKLIST</h3>
  <p>Camping is one of the captivating ways to get in touch 
    with outdoor surroundings. Get top recommendations on 
    best camping essentials for a camping trip. </p>
    <p>See more....</p>
  <span class="time-right">
  <button class="btn" > Post </button> 
  <button class="btn active" > Reject </button>
  </span>
</div>

                </div>
                </div>
            </div>
        


</body>
</html>