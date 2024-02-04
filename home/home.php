<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Campamento-home</title>

   
   
   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/homestyle.css">
   
   
</head>
<body>
   
<?php include 'header.php'; ?>



<section class="home" style="background-image: url('../resource/home.png'); ">

   <div class="content" >
  
      <h3>Explore, Unwind, Connect...</h3>
      <p>Welcome to the CAMPAMENTO.</p>
      <a href="dashboard.php" class="white-btn">Discover More</a>
      <a href="register.php" class="white-btn">Register</a>
   </div>

</section>

<br><br><br>
<section class="about" id="#C4">

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
         <a href="dashboard.php" class="btn">Discover More</a>
      </div>

      <div class="image">
         <img src="../resource/about2.jpg" alt="">
      </div>

   </div>

</section>

<section>
<?php include 'cards.php'; ?>
</section>


<section class="home-contact">

   <div class="content">
      <h3>have any questions?</h3>
      <p>
      Our friendly and knowledgeable staff are ready to assist you with any inquiries you may have. 
      Whether you're interested in reservations, specific camping site details, activities, 
      or anything else related to your camping experience at Campamento, don't hesitate to get in touch. 
      We're here to help you plan your perfect outdoor adventure.
      </p>
      <a href="contactus.php" class="white-btn">contact us</a>
   </div>

</section>


<?php include 'footer.php'; ?>



</body>
</html>