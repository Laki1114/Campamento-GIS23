<?php  ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> glm_dashboard_side_bar </title>

    <!-- ======= Styles ====== -->
    
<style>

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

.container {
  position: relative;
  width: 100%;
}

    /* =============== Navigation ================ */
.navigation {
  position: fixed;
  width: 270px;
  height: 100%;
  background: var(--green);
  border-left: 1px solid var(--green);
  transition: 0.5s;
  overflow: hidden;
}
.navigation.active {
  width: 80px;
}

.navigation ul {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
}

.navigation ul li {
  position: relative;
  width: 100%;
  list-style: none;
  border-top-left-radius: 30px;
  border-bottom-left-radius: 30px;
}

.navigation ul li:hover,
.navigation ul li.hovered {
  background-color: #BFCC7C;
}

.navigation ul li:nth-child(1) {
  margin-bottom: 40px;
  pointer-events: none;
}

.navigation ul li a {
  position: relative;
  display: block;
  width: 100%;
  display: flex;
  text-decoration: none;
  color: var(--white);
}
.navigation ul li:hover a,
.navigation ul li.hovered a {
  color: var(--green);
}

.navigation ul li a .icon {
  position: relative;
  display: block;
  min-width: 10px;
  height: 60px;
  line-height: 60px;
  text-align: center;
}

.navigation ul li a .icon ion-icon {
  font-size: 2rem;
}

.navigation ul li a .as{
  position: relative;
  display: block;
  padding: 0 0px;
  height: 100px;
  width: 250px;
  line-height:50px;
  text-align: start;
  white-space: nowrap;
  background-color: #BFCC7C;
}

.navigation ul li a .as img{
  display: block;
  margin-left: auto;
  margin-right: auto;
  margin-top: 10px;
  width: 70%;
}

.navigation ul li a .title {
  position: relative;
  display: block;
  padding: 0 10px;
  height: 60px;
  line-height: 60px;
  text-align: start;
  white-space: nowrap;
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
                    <a href="glm_dashboard.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <br><br>

                <li>
                    <a href="">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Customer</span>
                    </a>
                </li>
                <br><br>

                <li>
                    <a href="">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Schedule</span>
                    </a>
                </li>
                <br><br>

                <li>
                    <a href="">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Activity</span>
                    </a>
                </li>
                <br><br>
                
                <li>
                    <a href="">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Earnings</span>
                    </a>
                </li>
                <br><br>
                <li>
                    <a href="">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>

                

                
</body>
</html>               

        