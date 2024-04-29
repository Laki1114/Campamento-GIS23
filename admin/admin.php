<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['email'])) {
    header("Location: ../login/login.php"); // Redirect to login page
    exit();
}

// Include database connection file
include 'db.php';

$sqlGuide = "SELECT date, COUNT(*) AS guide_bookings FROM booking_guide GROUP BY date";
$resultGuide = mysqli_query($conn, $sqlGuide);

// Fetch data for driver bookings
$sqlDriver = "SELECT booking_date AS date, COUNT(*) AS driver_bookings FROM bookings GROUP BY booking_date";
$resultDriver = mysqli_query($conn, $sqlDriver);

// Initialize arrays to store formatted data
$dates = [];
$guideBookings = [];
$driverBookings = [];

// Format guide bookings data
while ($row = mysqli_fetch_assoc($resultGuide)) {
    $dates[] = $row['date'];
    $guideBookings[] = $row['guide_bookings'];
}

// Format driver bookings data
while ($row = mysqli_fetch_assoc($resultDriver)) {
    // Check if the date already exists in the array
    $index = array_search($row['date'], $dates);
    if ($index !== false) {
        // If date exists, update the corresponding index in the array
        $driverBookings[$index] = $row['driver_bookings'];
    } else {
        // If date doesn't exist, add it to the dates array and add 0 to guide bookings
        $dates[] = $row['date'];
        $guideBookings[] = 0;
        $driverBookings[] = $row['driver_bookings'];
    }
}


$adminData = array(
    'picture' => 'pic/customer02.jpg', // Placeholder for the profile picture path
); // Placeholder for the profile picture path




?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Dashboard </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="css/admin.css">
</head>

<style>
.item1 { grid-area: header; }
.item2 { grid-area: menu; }
.item3 { grid-area: main; }
.item4 { grid-area: right; }
.item5 { grid-area: footer; }

.grid-container {
  display: grid;
  grid-template-areas:
    'header'
    'main  '
    'footer';
  gap: 10px;
  
  padding: 10px;
}

.grid-container > div {
  background-color: #327028;
  text-align: center;
  padding: 20px 0;
  font-size: 30px;
}




.recentOrder .card {
  position: relative;
  background: var(--white);
  padding: 30px;
  border-radius: 20px;
  display: flex;
  justify-content: space-between;
  cursor: pointer;
  box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
  height:210px;
  margin-bottom:20px;
  
}

.recentOrder .card .numbers {
  position: relative;
  font-weight: 500;
  font-size: 4rem;
  color: var(--green);
}

.recentOrder .card .cardName {
  color: var(--black2);
  font-size: 2rem;
  margin-top: 5px;
}

.recentOrder .card .iconBx {
  font-size: 3.5rem;
  color: var(--black2);
}

.recentOrder .card:hover {
  background: var(--green);
}
.recentOrder .card:hover .numbers,
.recentOrder .card:hover .cardName,
.recentOrder .card:hover .iconBx {
  color: var(--white);
}




</style>




<body>
    <!-- =============== Navigation ================ -->
    
    <div class="container">
    <div class="navigation">
            
            <?php include 'adminsidebar.php'; ?>
                    
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

                

                <?php 
                
                
                if (isset($adminData['picture']) && !empty($adminData['picture'])) : ?>
                        <img src="<?php echo $adminData['picture']; ?>" alt="profile pic" class="profile-picture">
                    <?php else : ?>
                        <span>Image not found</span>
                    <?php endif; ?>
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Daily Views</h2>
                        
                    </div>

                    <!-- Display Daily Views Chart -->

                    <canvas id="dailyLoginChart" width="100px" height="50px"></canvas>
                 
                </div>
                

                <div class= "recentOrder">

                               <!--=================== transaction========================-->
                               <?php
// Include database connection file
include 'db.php';

// Query to fetch data from the rooms table
$sql = "SELECT COUNT(*) AS transactionCount FROM transactions";
$result = $conn->query($sql);

// Check if there is a result
if ($result->num_rows > 0) {
    // Fetch the row
    $row = $result->fetch_assoc();
    
    // Get the number of fields
    $transactionCount = $row['transactionCount'];

    // Output HTML for the card
    echo '<div class="card">';
    echo '<div>';
    echo '<div class="numbers">' . $transactionCount . '</div>';
    echo '<div class="cardName">Transactions</div>';
    echo '</div>';
    echo '<div class="iconBx">';
    echo '<ion-icon name="chatbubbles-outline"></ion-icon>';
    echo '</div>';
    echo '</div>';
} else {
    // If no result found
    echo '<p>No fields found in the rooms table.</p>';
}

// Close database connection
$conn->close();
?>
                

                <!--===================glamping reservation========================-->
<?php
// Include database connection file
include 'db.php';

// Query to fetch data from the rooms table
$sql = "SELECT COUNT(*) AS field_count FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'campamento' AND TABLE_NAME = 'rooms'";
$result = $conn->query($sql);

// Check if there is a result
if ($result->num_rows > 0) {
    // Fetch the row
    $row = $result->fetch_assoc();
    
    // Get the number of fields
    $field_count = $row['field_count'];

    // Output HTML for the card
    echo '<div class="card">';
    echo '<div>';
    echo '<div class="numbers">' . $field_count . '</div>';
    echo '<div class="cardName">Glamping Reservation</div>';
    echo '</div>';
    echo '<div class="iconBx">';
    echo '<ion-icon name="chatbubbles-outline"></ion-icon>';
    echo '</div>';
    echo '</div>';
} else {
    // If no result found
    echo '<p>No fields found in the rooms table.</p>';
}

// Close database connection
$conn->close();
?>
    

                </div>

            
                </div>

            



            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Booking Details</h2>
                        
                    </div>

                    <!-- Display Daily Views Chart -->

                    <canvas id="bookingChart" width="200px" height="100px"></canvas>
                    
                </div>

                <div class="recentOrder">
                                <!--===================glamping reservation========================-->
<?php
// Include database connection file
include 'db.php';

// Query to fetch data from the rooms table
$sql = "SELECT COUNT(*) AS field_count FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'campamento' AND TABLE_NAME = 'rooms'";
$result = $conn->query($sql);

// Check if there is a result
if ($result->num_rows > 0) {
    // Fetch the row
    $row = $result->fetch_assoc();
    
    // Get the number of fields
    $field_count = $row['field_count'];

    // Output HTML for the card
    echo '<div class="card">';
    echo '<div>';
    echo '<div class="numbers">' . $field_count . '</div>';
    echo '<div class="cardName">Glamping Reservation</div>';
    echo '</div>';
    echo '<div class="iconBx">';
    echo '<ion-icon name="chatbubbles-outline"></ion-icon>';
    echo '</div>';
    echo '</div>';
} else {
    // If no result found
    echo '<p>No fields found in the rooms table.</p>';
}

// Close database connection
$conn->close();
?>
                

                                <!--===================glamping reservation========================-->
<?php
// Include database connection file
include 'db.php';

// Query to fetch data from the rooms table
$sql = "SELECT COUNT(*) AS order_count FROM orders";
$result = $conn->query($sql);

// Check if there is a result
if ($result->num_rows > 0) {
    // Fetch the row
    $row = $result->fetch_assoc();
    
    // Get the number of fields
    $order_count = $row['order_count'];

    // Output HTML for the card
    echo '<div class="card">';
    echo '<div>';
    echo '<div class="numbers">' . $order_count . '</div>';
    echo '<div class="cardName">Order Count</div>';
    echo '</div>';
    echo '<div class="iconBx">';
    echo '<ion-icon name="chatbubbles-outline"></ion-icon>';
    echo '</div>';
    echo '</div>';
} else {
    // If no result found
    echo '<p>No fields found in the rooms table.</p>';
}

// Close database connection
$conn->close();
?>
                
                
                 
                </div>
            </div>
           





            

            



            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Actions</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Price</td>
                                <td>Payment</td>
                                <td>Status</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td><span class="status delivered">Delivered</span></td>
                            </tr>

                            <tr>
                                <td>Advertisement</td>
                                <td>$110</td>
                                <td>Due</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>

                            <tr>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td><span class="status return">Return</span></td>
                            </tr>

                            <tr>
                                <td>Advertisement</td>
                                <td>$620</td>
                                <td>Due</td>
                                <td><span class="status inProgress">In Progress</span></td>
                            </tr>

                            <tr>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td><span class="status delivered">Delivered</span></td>
                            </tr>

                            <tr>
                                <td>Advertisement</td>
                                <td>$110</td>
                                <td>Due</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>

                            <tr>
                                <td>Advertisement</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td><span class="status return">Return</span></td>
                            </tr>

                            <tr>
                                <td>Advertisement</td>
                                <td>$620</td>
                                <td>Due</td>
                                <td><span class="status inProgress">In Progress</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent User</h2>
                    </div>

                    <table>
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="images/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Sri Lanka | 12:00 </span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="images/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>Sri Lanka | 12:00</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="images/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Sri Lanka | 12:00</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="images/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>Sri Lanka | 12:00</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="images/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>Sri Lanka | 12:00</span></h4>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>



        // Function to fetch daily login attempts data from the database
        function fetchDailyLoginData() {
            // Make an AJAX request to fetch data from PHP script
            // Example: fetch data using fetch API or jQuery AJAX
            // Replace the URL with the actual URL of your PHP script
            fetch('fetch_daily_login_data.php')
            .then(response => response.json())
            .then(data => {
                // Call function to update chart with fetched data
                updateChart(data);
            })
            .catch(error => console.error('Error fetching data:', error));
        }

        // Function to update the chart with fetched data
        function updateChart(data) {
            // Get the canvas element and its context
            var ctx = document.getElementById('dailyLoginChart').getContext('2d');

            // Define chart data and options
            var chartData = {
                labels: data.labels,
                datasets: [{
                    label: 'Daily Login Attempts',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1,
                    data: data.loginAttempts
                }]
            };

            // Define chart options
            var chartOptions = {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            };

            // Create new chart instance
            var myChart = new Chart(ctx, {
                type: 'line',
                data: chartData,
                options: chartOptions
            });
        }

        // Call function to fetch daily login data and update the chart
        fetchDailyLoginData();
    </script>


<script>
        var ctx = document.getElementById('bookingChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($dates); ?>,
                datasets: [{
                    label: 'Guide Bookings',
                    data: <?php echo json_encode($guideBookings); ?>,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    fill: false
                }, {
                    label: 'Driver Bookings',
                    data: <?php echo json_encode($driverBookings); ?>,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    fill: false
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>


    <!-- ====== ionicons ======= -->
</body>

</html>