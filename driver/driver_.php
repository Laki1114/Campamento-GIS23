<?php  ?>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Driver </title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>   

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/Driver/trending_sites.css">
   
</head>


<body>

 <!------sites---->
 <div id="sidebar">
            <?php
            include("sidebar_d.php");
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
                        <input type="text" id="searchInput"  placeholder="Search here">    
                        <ion-icon name="search-outline"></ion-icon>
                        
                    </label>
                    <div id="contentContainer">
                    <script>


    </script>
       </div>
    </div>

   

                
            </div>

           <!------sites---->
 <div id="cards">
 <div id="drivers-container">
            
            </div>
                     <script>
    $(document).ready(function() {
        function updateDrivers() {
            $.ajax({
                url: 'cards.php',
                type: 'GET',
                success: function(data) {
                    $('#drivers-container').html(data);
                }
            });
        }

        // Call updateDrivers initially and set an interval to update every X seconds
        updateDrivers();
        setInterval(updateDrivers, 5000); // Update every 5 seconds (adjust as needed)
    });
    </script>
        </div>
        <script>
        $(document).ready(function () {
            $("#gfg").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#geeks tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>
</html>    