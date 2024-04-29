<?php
// PHP code to generate Glamping Sites list
session_start(); // Start the session

// Check if the user is not logged in
if (!isset($_SESSION['email'])) {
    // If user is not logged in, return an error message in JSON format
    $response = array('status' => 'error', 'message' => 'User is not logged in.');
    echo json_encode($response);
    exit(); // Stop script execution
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Profile</title>
    <style>
        /* CSS styles for the Glamping Sites list */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .sidebar {
            width: 20%;
            background-color: #f0f0f0;
        }

        .glamping-container {
            list-style-type: none;
            margin: 20px;
            padding: 0;
            border-collapse: collapse;
            width: 90%; /* Adjust as needed */
        }

        .glamping-container li {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .glamping-container li:nth-child(even) {
            background-color: #f2f2f2;
        }

        .glamping-container li:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <?php include 'manager_sidebar.php'; ?>
    </div>
    <ul class="glamping-container">
        <?php
        // PHP code to generate Glamping Sites list
        // Connect to the database
        $conn = mysqli_connect("localhost", "root", "", "campamento");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $email = $_SESSION['email'];
        $sqll = "SELECT glm_id FROM glamping_manager_registration WHERE email='$email'";
        $result = mysqli_query($conn, $sqll);
        if (mysqli_num_rows($result) > 0) {
            // Loop through each row of data
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['glm_id'];
            }
        } else {
            // If no sites found, initialize $id variable
            $id = 0;
        }

        // Query to fetch glamping site details
        $sql = "SELECT site_id, site_name FROM sites WHERE gl_id='$id'";
        $result = mysqli_query($conn, $sql);

        // Check if there are any rows returned
        if (mysqli_num_rows($result) > 0) {
            // Loop through each row of data
            while ($row = mysqli_fetch_assoc($result)) {
                // Display glamping site name and provide delete/update options
                echo "<li>";
                echo "Site Name: " . $row['site_name'];
                // Add delete/update options here if needed
                echo "</li>";
            }
        } else {
            echo "<li>No glamping sites found.</li>";
        }

        // Close database connection
        mysqli_close($conn);
        ?>
    </ul>
</body>
</html>
