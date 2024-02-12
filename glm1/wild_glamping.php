<?php  ?>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> glm1 </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- ======= Styles ====== -->
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
  
}

.container {
  position: relative;
  width: 100%;
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

 /*card css*/
  .grid{
     width: 28%;
     display: inline-block;
     box-shadow: 2px 2px 20px black;
     border-radius: 5px; 
     margin: 2.3%;
     margin-top: 90px;
     background:#fff ;
     
    }

.image img{
  width: 100%;
  border-top-right-radius: 5px;
  border-top-left-radius: 5px;
 }

 .imaged img{
  width: 100%;
  height : 200px;
  border-top-right-radius: 5px;
  border-top-left-radius: 5px;
 }

.title{
 
  text-align: center;
  padding: 10px;
  
  
 }

h1{
  font-size: 18px;
  color:#327028;
 }
h2{
  font-size: 20px;
  color:#327028;
}
h6{
  font-size: 15px;
  color:#327028;
}
p{
    color:rgb(128,128,128);
}


.des{
  padding: 3px;
  text-align: center;
 
  padding-top: 10px;
        border-bottom-right-radius: 5px;
  border-bottom-left-radius: 5px;
}
.button{
  border: none;
  color: #327028;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 18px;
  margin: 4px 2px;
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

.posbutton{
  float:right;
}

a {
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
  
}

a:hover {
  background-color: #eef0b9d4;
  color: black;
}

.checked {
  color: #FDCC0D;
}

.star-container {
  text-align: center;
}


    </style>

</head>


<body>

 <!------sidebar---->
 <div id="sidebar">
            <?php
            include("sidebar.php");
            ?>
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

                
            </div>

           <!------sites---->
<div class="grid">

<div class="imaged">
<img src="images/wild1.jpeg">
</div>
<div class="title">
 <h1>Leopard Nest - Yala</h1>
</div>
<div class="star-container">
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star"></span>
  <span class="fa fa-star"></span>
</div>
<div class="des">
 <p>Located near the prestigious Gal Oya National Park, which has been unblemished for centuries, Wild Glamping Gal Oya is stationed in "Rathugala," a majestic mountain-locked village inhabited by the Veddas — the aboriginal inhabitants of Sri Lanka.</p>
 <a href="book_now.php" class="button">Book Now</a>
</div>
</div>


<div class="grid">

<div class="imaged">
   <img src="images/wild2.jpg">
</div>
<div class="title">
 <h1>Thamarawila Wilpattu</h1>
</div>
<div class="star-container">
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star"></span>
  <span class="fa fa-star"></span>
  <span class="fa fa-star"></span>
</div>
<div class="des">
 <p>Located near the prestigious Gal Oya National Park, which has been unblemished for centuries, Wild Glamping Gal Oya is stationed in "Rathugala," a majestic mountain-locked village inhabited by the Veddas — the aboriginal inhabitants of Sri Lanka.</p>
 <a href="book_now.php" class="button">Book Now</a>
</div>
</div>


<div class="grid">

<div class="imaged">
   <img src="images/wild4.jpg">
</div>
<div class="title">
 <h1>Makulu Safari - Udawalawa</h1>
</div>
<div class="star-container">
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star"></span>
  <span class="fa fa-star"></span>
</div>
<div class="des">
 <p>Located near the prestigious Gal Oya National Park, which has been unblemished for centuries, Wild Glamping Gal Oya is stationed in "Rathugala," a majestic mountain-locked village inhabited by the Veddas — the aboriginal inhabitants of Sri Lanka.</p>
 <a href="book_now.php" class="button">Book Now</a>
</div>
</div>


<div class="grid">

<div class="imaged">
<img src="images/kumana1.jpg">
</div>
<div class="title">
 <h1>Kumana Wild Glamping</h1>
</div>
<div class="star-container">
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star"></span>
  <span class="fa fa-star"></span>
</div>
<div class="des">
 <p>Located near the prestigious Gal Oya National Park, which has been unblemished for centuries, Wild Glamping Gal Oya is stationed in "Rathugala," a majestic mountain-locked village inhabited by the Veddas — the aboriginal inhabitants of Sri Lanka.</p>
 <a href="book_now.php" class="button">Book Now</a>
</div>
</div>




<div class="grid">

<div class="imaged">
   <img src="images/wild5.jpg">
</div>
<div class="title">
 <h1>Eco-Wild glamping - Bambarakanda </h1>
</div>
<div class="star-container">
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star"></span>
  <span class="fa fa-star"></span>
</div>
<div class="des">
 <p>Located near the prestigious Gal Oya National Park, which has been unblemished for centuries, Wild Glamping Gal Oya is stationed in "Rathugala," a majestic mountain-locked village inhabited by the Veddas — the aboriginal inhabitants of Sri Lanka.</p>
 <a href="book_now.php" class="button">Book Now</a>
</div>
</div>

<div class="grid">

<div class="imaged">
   <img src="images/wild3.jpeg">
</div>
<div class="title">
 <h1>Rainforest Eco lodge - Sinharaja</h1>
</div>
<div class="star-container">
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star checked"></span>
  <span class="fa fa-star"></span>
  <span class="fa fa-star"></span>
</div>
<div class="des">
 <p>Located near the prestigious Gal Oya National Park, which has been unblemished for centuries, Wild Glamping Gal Oya is stationed in "Rathugala," a majestic mountain-locked village inhabited by the Veddas — the aboriginal inhabitants of Sri Lanka.</p>
 <a href="book_now.php" class="button">Book Now</a>
</div>
</div>


















</div>
        
</body>
</html>    