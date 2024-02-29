<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Campamento-home</title>

   
   
   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/homestyle.css">
   <link rel="stylesheet" href="../css/contactus.css">
   
</head>
<body>
   
<?php include 'header.php'; ?>



<section class="home" style="background-image: url('../resource/home.png'); ">

   <div class="content" >
  
      <h3>Explore, Unwind, Connect...</h3>
      <p>Welcome to the CAMPAMENTO.</p>
      <a href="../userdashboard/dashboard.php" class="white-btn">Discover More</a>
      <a href="register.php" class="white-btn">Register</a>
      
   </div>

</section>

<br><br><br>
<section class="about" id="about">

   <div class="flex">

      <div class="image">
         <img src="../resource/about1.jpg" alt="">
      </div>

      <div class="content">
         <h3>about us</h3>
         <p>Introducing "Campamento" :

Are you ready to embark on a journey into the heart of nature and create unforgettable memories? 
Welcome to "Campamento," where adventure, serenity, and the great outdoors converge to offer you 
an extraordinary camping experience like no other.

Campamento is your gateway to a world of natural beauty. 
Surrounded by lush forests, meandering rivers, and breathtaking vistas, 
our campsite offers an idyllic setting for your outdoor escape.

</p>
      </div>

   </div>

</section>



<section class="about">

   <div class="flex">

      <div class="content">
         <p>Your safety is our utmost concern. 
            Our campsite is equipped with experienced staff and clear safety protocols to ensure a secure 
            and enjoyable camping experience for all.

Discover the magic of the great outdoors, reconnect with nature, and unwind at Campamento. 
Whether you seek thrilling adventures or peaceful solitude, you'll find it all here amidst the natural wonder of camping. 
We eagerly await the opportunity to welcome you to Campamento and make your camping dreams a reality.
         </p>
         <a href="../userdashboard/dashboard.php" class="btn">Discover More</a>
      </div>

      <div class="image">
         <img src="../resource/about2.jpg" alt="">
      </div>

   </div>

</section>

<section id="service">
<?php include 'cards.php'; ?>
</section>




<section class="about" id="contact">

   <div class="flex">

      <div class="image">
         <img src="../resource/contact.jpg" alt="">
      </div>

      <div class="content">
         <h3>Contact Us</h3>
         <p?>leave us a message:</p>


         <?php 
                            $Messege = "";
                            if(isset($_GET['error']))
                            {
                                $Messege = " Please Fill in the Blanks ";
                                echo '<div class="alert alert-danger">'.$Messege.'</div>';
                            }

                            if(isset($_GET['success']))
                            {
                                $Messege = " Your Message Has Been Sent ";
                                echo '<div class="alert alert-success">'.$Messege.'</div>';
                            }
                        
                        ?>



         <form action="contact.php">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Your name..">
        
        <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Your E-mail.." name="email" required>

        <label for="subject">Messege</label>
        <textarea id="subject" name="subject" placeholder="Your Messege" style="height:100px"></textarea>
        
        <input type="submit" value="Submit">
      </form>
      </div>

   </div>

</section>
<br><br>

<?php include 'footer.php'; ?>



</body>
</html>