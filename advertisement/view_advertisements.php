<!DOCTYPE html>
<html>
<head>
    <title>View Advertisements</title>
    <style>
        .advertisement-container {
            width: 600px;
            margin: 0 auto;
        }
        .advertisement-details {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
        }
        .advertisement-images img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="advertisement-container">
        <h2>All Advertisements</h2>
        <?php
        include 'db.php';

        // Prepare and execute SQL query to fetch all advertisements
        $sql = "SELECT * FROM advertisements";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='advertisement-details'>";
                echo "<p>" . $row['created_at'] . "</p>";
                echo "<h3>" . $row['title'] . "</h3>";
                echo "<p><strong>Description:</strong> " . $row['description'] . "</p>";
                echo "<p><strong>Category:</strong> " . $row['category'] . "</p>";
                echo "<p><strong>Status:</strong> " . $row['status'] . "</p>";
                echo "<div class='advertisement-images'>";
                // Display images if available
                $images = explode(",", $row['images']);
                foreach ($images as $image) {
                    echo "<img src='uploads/" . $image . "' alt='Image'>";
                }
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p>No advertisements found.</p>";
        }

        $conn->close(); // Close the database connection
        ?>
    </div>
</body>
</html>
