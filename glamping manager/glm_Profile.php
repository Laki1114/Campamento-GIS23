<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>glm1</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="glm_css_files/glm_profile.css">

   
</head>

<body>

    <!------sidebar---->
    <div id="sidebar">
        <?php
        include("DB_sidebar.php");
        ?>
    </div>

    <!-- ========================= Main ==================== -->
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>  
        </div>

<div class="container1">
    <div class="title">
        <h3>Profile Details</h3>
    </div>
     
</div>



<div class="container2">
    <div class="title">
        <h3>Added Sites</h3>
    </div>
<div id="site">
        <?php
        include("glm_profile2.php");
        ?>
    </div>
</div>
      
    
        
        
    </div>
</body>

</html>
