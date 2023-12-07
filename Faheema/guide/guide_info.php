<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="guide.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Guide Description</title>
    <style>
    .booking-bar {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #cecea0;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        height: 80px;
    }

    .datepicker-container {
        display: flex;
        align-items: center;
    }

    .datepicker {
        width: 180px;
        margin: 0 10px;
    }

    .check-availability {
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 3px;
        padding: 10px 15px;
        cursor: pointer;
    }

    /* Style the date picker input */
    input[type="date"],
        select {
            padding: 10px;
            margin: 5px 0;
            margin-left: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
</style>
</head>
<body>
<header class="header">

   
<div class="flex">
<a href="../../Lakshani/home.php"><img src="../../Lakshani/images/logo.png" alt="" width="130" height="60"></a>

   <nav class="navbar">
      <a href="../../Lakshani/home.php">Home</a>
      <a href="../../Lakshani/home.php">About Us</a>
      <a href="../../Lakshani/home.php">Services</a>
      <a href="../../Roshana/blog.html">Blog</a>
      <a href="../../Lakshani/contactus.php">Contact Us</a>
   </nav>

   

   <div class="flex2">
      <a href="../../Lakshani/home.php" ><img src="../../Lakshani/images/search.png" alt="" width="25" height="25"></a>
      <a href="guide_pro.php">  <img src="../../Lakshani/images/profile.png" alt="" width="25" height="25"> </a>
      <a href="../../Faheema/cart.php">  <img src="../../Lakshani/images/cart.png" alt="" width="25" height="25"> </a>
      <a href="../../Lakshani/notification.php" ><img src="../../Lakshani/images/bell.png" alt="" width="25" height="25"></a>
   </div>
   
   
</div>


</header><br>
<br>
<br>
<br>

<section class="body">
    <div class="container">
        
        <div class="d-bg">
    
          <div class="driver-image">
                    <img src="gui.jpg" alt="Driver Image">
                </div>
            <div class="driver-details">
                <p style="font-size: 40px; color: rgb(21, 21, 15);font-family:'Times New Roman', Times, serif;"> Hi! I am</p>
                <p style="font-size: 50px; color: rgb(21, 21, 15);font-family:'Times New Roman', Times, serif;"><b>Guide Name</b></p>
                <p style="font-size: 30px; color: rgb(10, 10, 8);">★★★★☆<br> Location</p>
                
                </div>
                <div class="availability">
                    <button class="availability-button">Available</button>
            </div>
            
        </div>

    <div class="driver-info">
        <div class="qualifications">
            <h2>Qualifications</h2>
            <ul>
                <li>Qualified Tour guide - Licensed</li>
                <li>Certified Tour guide - Training program</li>
                <li>Language proficiency: English, Sinhala & Tamil</li>
                <li>Experience of 5 years </li>
                <li>Knowledge about destinations around Kandy and Familiarity with the routes and locations </li>
                <li>Knowledge of first-aid</li>
                <li>Effective time management</li>
            
            </ul>
        </div>
        </div>
        <br>
        <br>
        <div class="booking-bar">
            <div class="datepicker-container">
                <div class="datepicker">
                    <label for="checkin"><i class="fa fa-calendar"></i>Check-In</label>
                    <input type="date" id="checkin" class="datepicker-input">
                </div>
                <div class="datepicker">
                    <label for="checkout"><i class="fa fa-calendar"></i>Check-Out</label>
                    <input type="date" id="checkout" class="datepicker-input">
                </div>
                <button class="check-availability">Check Availability</button>
            </div>
        </div>
<div class="book-now-button">
    <a href="book_g.php" class="button">Book Now</a>
</div>
<div class="experience">
    <h2>Experience</h2>
    <p>The experienced tour guide, recently embarked on a camping adventure in Kandy, Sri Lanka. Kandy, known for its stunning natural landscapes and rich cultural heritage.
        Lush rainforests, mountain views, explored serene rivers, and marveled at the tea plantations that seemed to stretch on forever. Canig ad tours upto now with
        the customers has been all fun and joy. Evening camping fires were most memorable. Inalways followe eco-friendly practices leaving no trace of
        their presence and respect the environment. Recently visited sites are; Hantana Range, Pallekele Forest Reserve, Knuckles Mountain Range, Victoria Reservoir - Victoria Park Campsite.
    </p>
    <br>
    <div class="experience-grid">
        <div class="experience-item">
            <img src="exp 1.jpg" alt="Experience 1">
        </div>
        <div class="experience-item">
            <img src="exp 2.jpg" alt="Experience 2">
        </div>
        <div class="experience-item">
            <img src="exp 3.jpg" alt="Experience 3">
       </div>
    </div>
</div>

<!-- ... (remaining code) ... -->


    </div>
    </section>

    <script>
        $(document).ready(function() {
            $("#checkin, #checkout").datepicker();
        });
    </script>
</body>
</html>
