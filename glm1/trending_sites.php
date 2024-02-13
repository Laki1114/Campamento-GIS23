<?php  ?>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> glm1 </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="glm_css_files/trending_sites.css">

    
    

</head>


<body>

 <!------sites---->
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
 <div id="cards">
            <?php
            include("cards.php");
            ?>
        </div>
        
</body>
</html>    