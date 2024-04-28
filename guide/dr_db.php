<?php
require 'config.php';

if(!isset($_SESSION['email'])){
    header('location: ../login/login.php');
}

$em = $_SESSION['email'];
$sql = "SELECT * FROM guide WHERE email = '$em'";//change Email='email' or Email='$email'
$result = mysqli_query($con,$sql);

while ($row = mysqli_fetch_assoc($result)){
  $id=$row["id"];
}

// Total number of trips
$total_trips_sql = "SELECT COUNT(*) as total_trips FROM booking_guide WHERE guide_id='$id'";
$total_trips_result = $con->query($total_trips_sql);
$total_trips_row = $total_trips_result->fetch_assoc();
$total_trips = $total_trips_row['total_trips'];

// Completed trips
$completed_trips_sql = "SELECT COUNT(*) as completed_trips FROM booking_guide WHERE guide_id='$id' AND booking_status ='Completed'";
$completed_trips_result = $con->query($completed_trips_sql);
$completed_trips_row = $completed_trips_result->fetch_assoc();
$completed_trips = $completed_trips_row['completed_trips'];

// Cancelled trips
$cancelled_trips_sql = "SELECT COUNT(*) as cancelled_trips FROM booking_guide WHERE guide_id='$id' AND booking_status ='Cancelled'";
$cancelled_trips_result = $con->query($cancelled_trips_sql);
$cancelled_trips_row = $cancelled_trips_result->fetch_assoc();
$cancelled_trips = $cancelled_trips_row['cancelled_trips'];

// Overall rating
$overall_rating_sql = "SELECT AVG(star_rating) as overall_rating FROM booking_guide WHERE guide_id='$id'";
$overall_rating_result = $con->query($overall_rating_sql);
$overall_rating_row = $overall_rating_result->fetch_assoc();
$overall_rating = $overall_rating_row['overall_rating'];

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <title> Dashboard </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../css/Driver/admin.css">
    <style>

.calendar {
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
    max-width: 400px;
    width: 100%;
}

.calendar-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #68a75a;
    color: #fff;
    padding: 10px;
}

.calendar-header button {
    background: none;
    border: none;
    font-size: 18px;
    color: #fff;
    cursor: pointer;
}

.calendar-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 8px;
    padding: 10px;
}

.calendar-day {
    text-align: center;
    padding: 8px;
    cursor: pointer;
    border-radius: 50%;
    transition: background-color 0.3s ease;
}

.day-name {
    font-weight: bold;
}

.available {
    background-color: #4caf50;
    color: #fff;
}

.unavailable {
    background-color: #ff0000; /* Change to red color */
    color: #fff;
}

.today {
    font-weight: bold;
    border: 2px solid #4caf50;
}

.selected {
    background-color: #4caf50;
    color: #fff;
}

.empty {
    visibility: hidden;
}

#availabilityForm {
    display: none;
    margin-top: 20px;
    padding: 10px;
    background-color: #eee;
    border-radius: 8px;
}

#availabilityForm label {
    display: block;
    margin-bottom: 8px;
}

#availabilityInput {
    padding: 8px;
    margin-bottom: 8px;
}

#updateAvailabilityBtn {
    padding: 8px 16px;
    background-color: #4caf50;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

#updateAvailabilityBtn:hover {
    background-color: #45a049;
}

        /* Add the new CSS for disabled dates */
        .disabled {
            background-color: #f0f0f0; /* Lighter color for disabled dates */
            color: #bbb; /* Adjust text color for better visibility */
            cursor: not-allowed; /* Change cursor to not-allowed for disabled dates */
        }

    </style>
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            
        <?php include 'driver_sb.php'; ?>
                
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

                <div class="user">
                    <img src="images/customer01.jpg" alt="">
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $total_trips ?></div>
                        <div class="cardName">Total No. of Trips</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $completed_trips ?></div>
                        <div class="cardName">Completed Trips</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $cancelled_trips ?></div>
                        <div class="cardName">Cancelled Trips</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">⭐<?php echo $overall_rating ?></div>
                        <div class="cardName">Rating</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                


           

                <!-- ================= New Customers ================ -->
   
                <?php include 'chart.php'; ?>
           <br><h4>Monthly Report:</h4><br> <a href="monthly_report.php" target="_blank">Download Monthly Report</a>
        </div>
    </div>



    <!-- ====== ionicons ======= -->
</body>

</html>