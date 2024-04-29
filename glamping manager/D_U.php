<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .sidebar {
            width: 18.3%;
            background-color: #f0f0f0;
            
        }

        .glamping-container {
            list-style-type: none;
            margin: 20px;
            padding: 0;
            border-collapse: collapse;
            width: 100%;

            
        }

        .glamping-container li {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            margin-bottom: 10px;
            position: relative;
            width: 400px;
            height: 100px;
            background-color: #f0f0f0;
            border-radius: 15px;
        }

       

        .glamping-container li:hover {
            background-color: #ddd;
        }

        .action-buttons {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
        }

        .action-buttons button {
            margin-left: 5px;
            margin-bottom: 5px;
            padding: 8px 12px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            border-radius: 4px;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .action-buttons button:hover {
            background-color: #45a049;
        }

        .action-buttons button.delete-btn {
            background-color: #f44336;
        }

        .action-buttons button.delete-btn:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
<div class="sidebar">
   
            
   <?php include 'manager_sidebar.php'; ?>
           

</div>
    <div>
        <h1>Delete / Update Sites</h1>
        <ul class="glamping-container">
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
                    echo "<div class='action-buttons'>";
                    echo "<form method='post' action='delete_site.php'>";
                    echo "<input type='hidden' name='site_id' value='" . $row['site_id'] . "'>";
                    echo "<button type='submit' class='delete-btn'>Delete</button>";
                    echo "</form>";
                    echo "<form method='get' action='update_site.php'>";
                    echo "<input type='hidden' name='site_id' value='" . $row['site_id'] . "'>";
                    echo "<button type='submit'>Update</button>";
                    echo "</form>";
                    echo "</div>";
                    echo "</li>";
                }
            } else {
                echo "No glamping sites found.";
            }

            // Close database connection
            mysqli_close($conn);
            ?>
        </ul>
    </div>
</body>
</html>
