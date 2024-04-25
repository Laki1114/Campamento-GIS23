
<header class="header">



   
      <div class="flex">
         
         <a href="home.php"><img src="../resource/logo.png" alt="" width="130" height="60"></a>

         <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="home.php#about">About Us</a>
            <a href="home.php#service">Services</a>
            <a href="../blog/blog.html">blog</a>
            <a href="home.php#contact">Contact Us</a>
         </nav>
         

        

        <div>
        
        <button ><a href="../login/login.php" style= "color:#BFCC7C;">LOGIN</a></button> &nbsp|&nbsp
         <div class="dropdown">
         
        <button>REGISTER</button>
        <div class="content">
        <a href="../user/registerUser.php" class="w3-button w3-round-xlarge w3-theme-l1 w3-border link" target="_blank">Register as a User</a>
        <a href="../Amaya/index.php" class="w3-button w3-round-xlarge w3-theme-l1 w3-border link" target="_blank">Register as a Glamping Manager</a>
        <a href="../Amaya/registerSupplier.html" class="w3-button w3-round-xlarge w3-theme-l1 w3-border link" target="_blank">Register as a Tool Supplier</a>
        <a href="../guide/reg_gu.php" class="w3-button w3-round-xlarge w3-theme-l1 w3-border link" target="_blank">Register as a Guide</a>
        <a href="../driver/reg_dr.php" class="w3-button w3-round-xlarge w3-theme-l1 w3-border link" target="_blank">Register as a Driver</a>
      
        </div>
        </div>
        
</div>

         <div class="flex2">
            <a href="home.php" ><img src="../resource/search.png" alt="" width="25" height="25"></a>
            <a href="register.php">  <img src="../resource/profile.png" alt="" width="25" height="25"> </a>
            <a href="../Faheema/cart.php">  <img src="../resource/cart.png" alt="" width="25" height="25"> </a>
            <a href="notification.php" ><img src="../resource/bell.png" alt="" width="25" height="25"></a>
         </div>
         
    </div>
         
      </div>
  

</header>

<style>
.dropdown{
    display: inline-block;
    
}
.flex button{
    background-color: #327028;
    color: #BFCC7C;
    padding: 10px 27px;
    border: none;
    cursor: pointer;
    margin-top: 0rem;
    border-radius: .5rem;
    display: inline-block;
}

.dropdown button{
    background-color: #327028;
    color: #BFCC7C;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
    margin-top: 0rem;
    border-radius: .5rem;
    display: inline-block;
}

.dropdown a{
    display: block;
    color: black;
    text-decoration: none;
    padding: 10px 15px;
    margin: 2px 0px;
    border-radius: 2rem;
}
.dropdown .content{
   font-size: 1.5rem;
    display: none;
    position: absolute;
    min-width: 260px;
    box-shadow: 2px 2px 5px #333;
    
}
.dropdown:hover .content{
    display: block;
}
.dropdown:hover a{
    background-color:#327028;
    color: #BFCC7C;
}
.dropdown a:hover{
    background-color: #333;
   
}

</style>