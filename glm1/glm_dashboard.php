<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>glm1</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>


    <!-- ======= Styles ====== -->
    <style>
        /* =========== Google Fonts ============ */
        @import url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap");

        /* =============== Globals ============== */
        * {
            font-family: "Ubuntu", sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --green: #003D25;
            --white: #fff;
            --yellow: #BFCC7C;
            --gray: #f5f5f5;
            --black1: #222;
            --black2: #999;
        }

        body {
            min-height: 100vh;
            overflow-x: hidden;

        }

        .container {
            position: relative;
            width: 100%;
        }

        /* ===================== Main ===================== */
        .main {
            position: absolute;
            width: calc(100% - 300px);
            left: 300px;
            min-height: 100vh;
            background: var(--yellow);
            transition: 0.5s;
        }

        .main.active {
            width: calc(100% - 80px);
            left: 80px;
        }

        .topbar {
            width: 100%;
            height: 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 10px;
        }

        .toggle {
            position: relative;
            width: 60px;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2.5rem;
            cursor: pointer;
        }

        .search {
            position: relative;
            width: 400px;
            margin: 0 10px;

        }

        .search label {
            position: relative;
            width: 100%;
        }

        .search label input {
            width: 100%;
            height: 40px;
            border-radius: 40px;
            padding: 5px 20px;
            padding-left: 35px;
            font-size: 18px;
            outline: none;
            border: 1px solid var(--black2);
        }

        .search label ion-icon {
            position: absolute;
            top: 0;
            left: 10px;
            font-size: 1.2rem;
        }

        .user {
            position: relative;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            cursor: pointer;
        }

        .user img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /*card css*/
        .grid {
            width: 55%; 
            height: 500px;
            display: inline-block;
            box-shadow: 2px 2px 20px black;
            border-radius: 15px;
            margin: 2.3%;
            margin-top: 100px;
            background: #fff;
        }

        .container1 {
            width: 30%;
            height: 270px;
            display: inline-block;
            box-shadow: 2px 2px 20px black;
            border-radius: 15px;
            margin: 2.3%; 
            margin-top: 100px;
            background: #fff;
        }

        
        

        .title {

            text-align: left;
            padding: 10px;


        }

        h1 {
            font-size: 20px;
            color: #327028;
        }

        
    </style>

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
                <h1>Campaign Overview</h1>
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
                <h1>Revenue Stat</h1>
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
