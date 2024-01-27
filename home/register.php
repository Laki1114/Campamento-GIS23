<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-pink.css">    
<link rel="stylesheet" href="css/style.css">
<title>Register</title>
<script src="https://unpkg.com/feather-icons"></script>
<style>
body {
  background-color: #d6d4cb
}

.container {
  width: 100%;
  height: 100%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
  
}

.links-container {
  display: flex;
  flex-direction: column;
  jusify-content: center;
  align-items: center;
  border color : #BFCC7C;
  
  
}

.links-container a {
  width: 90%;
  height:50px;
  text:middle;
  color:#fffefe;
}

.w3-theme-l1 {
  background-color: #327028 !important;
}

.w3-theme-l1:hover {
  background-color: #333 !important;
 
}

.margin-top-2 {
  margin-top: 32px;
}


@media (min-width: 768px) {
  .link {
    width: 100%;
  }
}
@media (min-width: 576px) {
  .container {
    max-width: 540px;
  }
}
</style>
  </head>
  <body>
  <?php include 'header.php'; ?>
    <!-- Content container -->
    <div class="container">

      <!-- Links section 1. Replace the # inside of the "" with your links. -->
      
      <div class="links-container">
       <br><br><br><br><br>
       <br><br><br><br><br>
        <a href="../Roshana/registerUser.html" class="w3-button w3-round-xlarge w3-theme-l1 w3-border link" target="_blank">Register as a User</a>
        <br>
        <a href="../Amaya/index.php" class="w3-button w3-round-xlarge w3-theme-l1 w3-border link" target="_blank">Register as a Glamping Manager</a>
        <br>
        <a href="../Amaya/registerSupplier.html" class="w3-button w3-round-xlarge w3-theme-l1 w3-border link" target="_blank">Register as a Tool Supplier</a>
        <br>
        <a href="../Faheema/Guide/signup.php" class="w3-button w3-round-xlarge w3-theme-l1 w3-border link" target="_blank">Register as a Guide</a>
        <br>
        <a href="../Faheema/Driver/reg_dr.php" class="w3-button w3-round-xlarge w3-theme-l1 w3-border link" target="_blank">Register as a Driver</a>
      </div>      

    </div>
    <br><br><br><br><br>
       <br><br>
    <?php include 'footer.php'; ?>
  </body>  
</html>