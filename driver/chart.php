<?php
require_once('tcpdf/tcpdf.php');
include 'config.php';

// Fetch driver's id from the session
$driver_email = $_SESSION['email'];

// Retrieve the driver's id from the drivers table
$sql_driver = "SELECT d_id FROM driver WHERE email = '$driver_email'";
$result_driver = $con->query($sql_driver);
$row_driver = $result_driver->fetch_assoc();
$driver_id = $row_driver['d_id'];

// Fetch data from the database for the specific driver
$sql = "SELECT MONTH(booking_date) AS month, COUNT(*) AS total_bookings 
        FROM bookings
        WHERE d_id = '$driver_id' AND booking_date BETWEEN '2024-01-01' AND '2024-12-31'
        GROUP BY MONTH(booking_date)";
$result = $con->query($sql);

// Initialize an array to store booking counts for each month
$booking_counts = array_fill(1, 12, 0); // Initialize all months with 0 bookings

// Fetch and store each month's booking count
while($row = $result->fetch_assoc()) {
    $month = $row['month'];
    $booking_counts[$month] = $row['total_bookings'];
}

// Month names
$month_names = array(
    1 => 'January',
    2 => 'February',
    3 => 'March',
    4 => 'April',
    5 => 'May',
    6 => 'June',
    7 => 'July',
    8 => 'August',
    9 => 'September',
    10 => 'October',
    11 => 'November',
    12 => 'December'
);

// Generate chart data
$chart_data = "['Month', 'Bookings'],";
for ($i = 1; $i <= 12; $i++) {
    $chart_data .= "['{$month_names[$i]}', {$booking_counts[$i]}],";
}

// JSON data for the chart
$chart_json_data = json_encode($booking_counts);

// Include the Google Charts library
echo "<script type=\"text/javascript\" src=\"https://www.gstatic.com/charts/loader.js\"></script>";
echo "<script type=\"text/javascript\">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            $chart_data
        ]);

        var options = {
            title: 'Monthly Bookings',
            hAxis: {title: 'Month', titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('monthly_booking_chart'));
        chart.draw(data, options);
    }
</script>";

echo "<div id=\"monthly_booking_chart\" style=\"width: 800px; height: 500px;\"></div>";
?>