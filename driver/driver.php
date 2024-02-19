<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="driver.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Driver</title>
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
      <a href="drvr_pro.php">  <img src="../../Lakshani/images/profile.png" alt="" width="25" height="25"> </a>
      <a href="../../Faheema/cart.php">  <img src="../../Lakshani/images/cart.png" alt="" width="25" height="25"> </a>
      <a href="../../Lakshani/notification.php" ><img src="../../Lakshani/images/bell.png" alt="" width="25" height="25"></a>
   </div>
   
   
</div>


</header><br><br><br><br><br><br><br>

<section class="body">
    <div class="container">
        
        <div class="d-bg">
    
          <div class="driver-image">
                    <img src="drvr 1.webp" alt="Driver Image">
                </div>
            <div class="driver-details">
                <p style="font-size: 40px; color: rgb(218, 217, 166);font-family:'Times New Roman', Times, serif;"> Hi! I am</p>
                <p style="font-size: 50px; color: rgb(217, 217, 177);font-family:'Times New Roman', Times, serif;"><b>Driver Name</b></p>
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
                <li>Light vehicle license</li>
                <li>Certified</li>
                <li>3 Years of experience</li>
           
            </ul>
        </div>
        </div>

        <div class="experience">
            <h2>Vehicle Description</h2>
            <ul>
                <li>Nissan Car</li>
                <li>A/C or Non A/C</li>
                <li>3 to 4 passengers</li>
           
            </ul>
            <br>
            <div class="experience-grid">
                <div class="vehicle-item">
                    <img src="cr 1.jpg" alt="veh 1">
                </div>
                <div class="vehicle-item">
                    <img src="cr 2.jpg" alt="veh 2">
                 
                </div>
                <div class="vehicle-itemm">
                   
               </div>
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
    <a href="book_dr.php" class="button">Book Now</a>
</div>
<div class="experience">
    <h2>Experience</h2>
    <p>A driver with an experience of 3 years and familiar to the places in Western province. Also experienced in driving around Sri Lanka.
        Strong customer service skills, including effective communication, patience, and courtesy. Ensuring the safety and security of passengers is a top priority. 
        Major exerience in some of the places like Kosgoda Beach Camping Site, Negombo Beach Camping Site, Sandy Beach Camping - Mount Lavinia and Waters Edge.
    </p>
    <br>
    <br>
    <div class="experience-grid">
        <div class="experience-item">
            <img src="ex 1.jpg" alt="Experience 1">
        </div>
        <div class="experience-item">
            <img src="ex 2.jpg" alt="Experience 2">
        </div>
        <div class="experience-item">
            <img src="ex 3.jpg" alt="Experience 3">
         </div>
    </div>
</div>

    </div>
    </section>

    <script>
        $(document).ready(function() {
            $("#checkin, #checkout").datepicker();
        });
    </script>
</body>
</html>
