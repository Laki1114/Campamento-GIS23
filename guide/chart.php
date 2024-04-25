<?php
require_once('tcpdf/tcpdf.php');
include 'config.php';

// Fetch guide's id from the session

$guide_email = $_SESSION['email'];

// Retrieve the guide's id from the guides table
$sql_guide = "SELECT id FROM guide WHERE email = '$guide_email'";
$result_guide = $con->query($sql_guide);
$row_guide = $result_guide->fetch_assoc();
$guide_id = $row_guide['id'];

// Fetch data from the database for the specific guide
$sql = "SELECT MONTH(checkIn) AS month, COUNT(*) AS total_bookings 
        FROM booking_guide 
        WHERE guide_id = '$guide_id' AND checkIn BETWEEN '2024-01-01' AND '2024-12-31'
        GROUP BY MONTH(checkIn)";
$result = $con->query($sql);

// Initialize an array to store booking counts for each month
$booking_counts = array_fill(1, 12, 0); // Initialize all months with 0 bookings

// Fetch and store each month's booking count
while($row = $result->fetch_assoc()) {
    $month = $row['month'];
    $booking_counts[$month] = $row['total_bookings'];
}

// Generate chart data
$chart_data = "['Month', 'Bookings'],";
for ($i = 1; $i <= 12; $i++) {
    $chart_data .= "[$i, {$booking_counts[$i]}],";
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

echo "<div id=\"monthly_booking_chart\" style=\"width: 700px; height: 500px;\"></div>";
?>
