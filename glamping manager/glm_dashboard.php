<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>glm1</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="glm_css_files/glmdashboard.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
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
                <img src="../resource/customer01.jpg" alt="">
            </div>
        </div>

        <!------sites---->

        <div class="grid">

            <div class="title">
                <h1>Year Summary</h1>
            </div>

            <div class="container">
                <!-- Bar chart -->
                <canvas id="myBarChart" style="width:100%;max-width:600px"></canvas>

                <script src="glm_js_files/barchart.js"></script>
            </div>

            
        </div>
        
    </div>
</body>

</html>
