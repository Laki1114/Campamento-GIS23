<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>glm1</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="glm_css_files/glm_dashboard.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>




   

</head>


<body>

    <!------sidebar---->
    <div id="sidebar">
        <?php
        include("DB_sidebar.php");
        ?>
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

        <!------sites---->


        <div class="grid">

            <div class="title">
                <h1>Year Summary</h1>
            </div>
        <!--line chart-->
        <div id="myPlot" style="width:100%;max-width:700px"></div>

<script>
// Define X-axis values for 12 months
const xArray = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
const yArray = [7, 9, 11, 19, 15, 13, 10, 20, 22, 24, 27];

// Define Data
const data = [{
  x: xArray,
  y: yArray,
  mode: "lines"
}];

// Define Layout
const layout = {
  xaxis: { title: "Months" }, // Remove range to automatically adjust based on data
  yaxis: { title: "Bookings", range: [0, 30] }
};

// Define Configurations
const config = {
  displayModeBar: false // Disable display mode bar
};

// Display using Plotly
Plotly.newPlot("myPlot", data, layout, config);
</script>



        </div>

        <div class="container1">
            <div class="title">
                <h1></h1>
            </div>
   <!--pie chart--->         
 <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>
const xValues = ["Check-In", "Check-Out", "Booked"];
const yValues = [55, 30, 15];
const barColors = [
  "#222",
  "#999",
  "#555"
  
];

new Chart("myChart", {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      
    }
  }
});
</script>



 </div>




    </div>

</body>

</html>
