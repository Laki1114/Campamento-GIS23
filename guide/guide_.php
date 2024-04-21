<?php require 'config.php';  ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Guide </title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="trending_sites.css">
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
                    <input type="text" id="gfg" placeholder="Search here">    
                    <ion-icon name="search-outline"></ion-icon>
                </label>
            </div>

         
        </div>
   <!-- Filters for districts and expertise areas -->
   <div class="filter-container">

                <label for="district-filter"><b>Filter : </b> Location</label>
                <select id="district-filter" name="district">
                    <option value="">All</option>
                    <!-- Add options dynamically based on data from the database -->
                    <?php
                    // Assume $con is your database connection
                    $district_query = "SELECT DISTINCT district FROM guide";
                    $district_result = $con->query($district_query);
                    if ($district_result->num_rows > 0) {
                        while ($row = $district_result->fetch_assoc()) {
                            echo "<option value='" . $row['district'] . "'>" . $row['district'] . "</option>";
                        }
                    }
                    ?>
                </select>

                <label for="expertise-filter">Expertise Area:</label>
                <select id="expertise-filter" name="expertise">
                    <option value="">All</option>
                    <!-- Add options dynamically based on data from the database -->
                    <?php
                    $expertise_query = "SELECT DISTINCT expertise FROM guide";
                    $expertise_result = $con->query($expertise_query);
                    if ($expertise_result->num_rows > 0) {
                        while ($row = $expertise_result->fetch_assoc()) {
                            // Split the expertise areas into individual items
                            $expertise_areas = explode(',', $row['expertise']);
                            foreach ($expertise_areas as $area) {
                                echo "<option value='" . $area . "'>" . $area . "</option>";
                            }
                        }
                    }
                    ?>
                </select>
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
    </div>

    <script>
    $(document).ready(function () {
        // Function to update guide cards based on search input and filters
        function updateGuideCards() {
            var searchValue = $('#gfg').val().toLowerCase(); // Get the search input value
            var district = $('#district-filter').val(); // Get the selected district
            var expertise = $('#expertise-filter').val(); // Get the selected expertise area
            // Send AJAX request to fetch filtered guides
            $.ajax({
                url: 'cards.php',
                type: 'GET',
                data: { search: searchValue, district: district, expertise: expertise },
                success: function(data) {
                    $('#drivers-container').html(data);
                }
            });
        }

        // Call updateGuideCards on keyup event in the search input
        $('#gfg').on('keyup', updateGuideCards);

        // Call updateGuideCards when district or expertise filter changes
        $('#district-filter, #expertise-filter').change(updateGuideCards);
    });
</script>
</body>
</html>
