<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['email'])) {
    header("Location: ../login/login.php"); // Redirect to login page
    exit();
}

// Include database connection file
include 'db.php';




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
                    <!-- Add input fields for date selection -->
<label for="startDate">Start Date:</label>
<input type="date" id="startDate" name="startDate">
<label for="endDate">End Date:</label>
<input type="date" id="endDate" name="endDate">
<button onclick="fetchFilteredData()">Apply Filter</button>

<!-- Display Daily Views Chart -->

                    
                    <canvas id="dailyLoginChart" width="400px" height="200px"></canvas>
                    
                </div>
    </div>


            
            <div class="cardBox">
                

                <div class="card">
                    <div>
                        <div class="numbers">80</div>
                        <div class="cardName">Transactions</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>


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




                <div class="card">
                    <div>
                        <div class="numbers">284</div>
                        <div class="cardName">Reservation</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">$7,842</div>
                        <div class="cardName">Earning</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
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
                                <div class="imgBx"><img src="images/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Sri Lanka | 12:00</span></h4>
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
// Function to fetch filtered data based on selected dates
function fetchFilteredData() {
    var startDate = document.getElementById("startDate").value;
    var endDate = document.getElementById("endDate").value;

    // Check if both start date and end date are provided
    if (startDate && endDate) {
        // Send AJAX request to fetch filtered data
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Parse the JSON response
                var filteredData = JSON.parse(xhr.responseText);
                // Update the chart with filtered data
                updateChart(filteredData);
            }
        };
        // Construct URL with parameters
        var url = "fetch_daily_login_data.php?startDate=" + startDate + "&endDate=" + endDate;
        // Send GET request
        xhr.open("GET", url, true);
        xhr.send();
    } else {
        alert("Please select both start date and end date.");
    }
}

// Function to update chart with filtered data
function updateChart(filteredData) {
    // Update the chart data with filtered data
    dailyViewsChart.data.labels = filteredData.labels;
    dailyViewsChart.data.datasets[0].data = filteredData.loginAttempts;
    // Update the chart
    dailyViewsChart.update();
}

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



    <!-- ====== ionicons ======= -->
</body>

</html>