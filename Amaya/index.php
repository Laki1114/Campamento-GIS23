<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Glamping Sites</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" href="gl_style.css">
        <link rel="stylesheet" href="../Lakshani/css/style.css">
    </head>
    <body>
   
    <header class="header">

   
<div class="flex">
<a href="home.php"><img src="../Lakshani/images/logo.png" alt="" width="130" height="60"></a>

   <nav class="navbar">
      <a href="../Lakshani/home.php">Home</a>
      <a href="../Lakshani/home.php">About Us</a>
      <a href="../Lakshani/home.php">Services</a>
      <a href="../Roshana/blog.html">blog</a>
      <a href="../Lakshani/contactus.php">Contact Us</a>
   </nav>

   

   <div class="flex2">
      <a href="../Lakshani/home.php" ><img src="../Lakshani/images/search.png" alt="" width="25" height="25"></a>
      <a href="glpro.php">  <img src="../Lakshani/images/profile.png" alt="" width="25" height="25"> </a>
      <a href="Faheema/cart.php">  <img src="../Lakshani/images/cart.png" alt="" width="25" height="25"> </a>
      <a href="../Lakshani/notification.php" ><img src="../Lakshani/images/bell.png" alt="" width="25" height="25"></a>
   </div>
   
   
</div>


</header>

    <div id="headers">
            <div class="container">

                <div id="navbar">
                    
                </div>
    


                <div class="header-text">
                    <p>Enjoy your Life in</p>
                    <h1> <span>Marvelous Glamping Sites</span>  </h1>
                </div>
            </div>

        </div>
    
        
        <!------sites---->
        <div id="sites">
            <?php
            include("sites.php");
            ?>
        </div>
        <!----footer--->
        <div id="footer">
            <?php
            include("footer.php");
            ?>
        </div>
        
        
          
        


    </body>

</html>