<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Profile</title>
    <link rel="stylesheet" href="glm_css_files/D_U.css"> 
</head>
<body>
    <h1>Delete / Update Sites</h1>
    

    
    <ul class="glamping-container"> <!-- Apply the "glamping-container" class to the UL element -->
        <?php
        // PHP code to generate Glamping Sites list
        // Connect to the database
        $conn = mysqli_connect("localhost", "root", "", "campamento");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Query to fetch glamping site details
        $sql = "SELECT site_id, site_name FROM sites"; // Modify the query as per your table structure
        $result = mysqli_query($conn, $sql);

        // Check if there are any rows returned
        if (mysqli_num_rows($result) > 0) {
            // Loop through each row of data
            while ($row = mysqli_fetch_assoc($result)) {
                // Display glamping site name and provide delete/update options
                echo "<li>";
                echo "Site Name: " . $row['site_name'];
                echo "<form method='post' action='delete_site.php'>";
                echo "<input type='hidden' name='site_id' value='" . $row['site_id'] . "'>";
                echo "<button type='submit'>Delete</button>";
                echo "</form>";
                echo "<form method='get' action='update_site.php'>";
                echo "<input type='hidden' name='site_id' value='" . $row['site_id'] . "'>";
                echo "<button type='submit'>Update</button>";
                echo "</form>";
                echo "</li>";
            }
        } else {
            echo "No glamping sites found.";
        }

        // Close database connection
        mysqli_close($conn);
        ?>
    </ul>
</body>
</html>
