<?php 
 
include 'config.php';
$locations_query = "SELECT DISTINCT district FROM driver";
$locations_result = mysqli_query($con, $locations_query);

// Fetch unique vehicle types from the database
$vehicle_types_query = "SELECT DISTINCT Vehicle_type FROM driver";
$vehicle_types_result = mysqli_query($con, $vehicle_types_query);  ?>
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
    <style>
        .filter-container {
    margin-bottom: 20px;
}

.filter-container label {
    margin-right: 10px;

}

.filter-container select {
    padding: 5px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.filter-container input[type="text"] {
    padding: 5px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.filter-container input[type="submit"] {
    padding: 5px 10px;
    border-radius: 5px;
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
}
    </style>
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
                        <input type="text" id="gfg"  placeholder="Search here">    
                        <ion-icon name="search-outline"></ion-icon>
                        
                    </label>
                    </div>
        
                    <div id="contentContainer">
                    <script>


    </script>
       
</div>    
            </div>
            <div class="filter-container">
                <label for="location">Location:</label>
                <select id="location">
                    <option value="">All</option>
                    <?php while ($row = mysqli_fetch_array($locations_result)) { ?>
                        <option value="<?php echo $row['district']; ?>"><?php echo $row['district']; ?></option>
                    <?php } ?>
                </select>

                <label for="vehicle_type">Vehicle Type:</label>
                <select id="vehicle_type">
                    <option value="">All</option>
                    <?php while ($row = mysqli_fetch_array($vehicle_types_result)) { ?>
                        <option value="<?php echo $row['Vehicle_type']; ?>"><?php echo $row['Vehicle_type']; ?></option>
                    <?php } ?>
                </select>

                <input type="submit" id="filter" value="Filter">
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
        setInterval(updateDrivers, 10000); // Update every 5 seconds (adjust as needed)
    });
    </script>
        </div>
        <script>
         $(document).ready(function () {
                        // Function to update guide cards based on search input and filters
                        function updateGuideCards() {
                            var searchValue = $('#gfg').val().toLowerCase(); // Get the search input value
                            var location = $('#location').val(); // Get the selected district
                            var vehicleType = $('#vehicle_type').val(); // Get the selected vehicle type
                            // Send AJAX request to fetch filtered guides
                            $.ajax({
                                url: 'cards.php',
                                type: 'GET',
                                data: { search: searchValue, location: location, vehicleType: vehicleType },
                                success: function(data) {
                                    $('#drivers-container').html(data);
                                }
                            });
                        }

                        // Call updateGuideCards on keyup event in the search input
                        $('#gfg').on('keyup', updateGuideCards);

                        // Call updateGuideCards when district or vehicle type filter changes
                        $('#location, #vehicle_type').change(updateGuideCards);
                    });
</script>
</body>
</html>    