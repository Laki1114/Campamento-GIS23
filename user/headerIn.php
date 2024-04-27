<header class="header">


      <div class="flex">
      <a href="../home/home.php"><img src="../resource/logo.png" alt="" width="130" height="60"></a>

        <!-- <nav class="navbar">
            <a href="../home/home.php">Home</a>
            <a href="home.php">About Us</a>
            <a href="home.php">Services</a>
            <a href="../blog/blog.html">blog</a>
            <a href="contactus.php">Contact Us</a>
         </nav>-->

         <?php  
            if(isset($_SESSION['customer']) && !empty($_SESSION['customer'])) {
                echo '<div class="flex2">';
                echo '<a href="profileUser.php"><img src="../resource/profile.png" alt="" width="25" height="25"></a>';
                echo '</div>';
            }
        ?>
         
      </div>
  

</header>