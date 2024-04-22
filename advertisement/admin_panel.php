<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-title {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .card-description {
            margin-bottom: 5px;
        }
        .card-category {
            color: #666;
            margin-bottom: 5px;
        }
        .card-status {
            font-weight: bold;
        }
        .card-actions {
            margin-top: 10px;
        }
        .card-actions button {
            margin-right: 5px;
            cursor: pointer;
        }
        .card-images img {
            width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h2>Admin Panel</h2>
    <div class="cards-container">
        <?php
        include 'db.php';

        $sql = "SELECT * FROM advertisements";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='card'>";
                echo "<div class='card-category'>" . $row['created_at'] . "</div>";
                echo "<div class='card-images'>";
                // Display images if available
                $images = explode(",", $row['images']);
                foreach ($images as $image) {
                    echo "<img src='uploads/" . $image . "' alt='Image'>";
                }
                echo "</div>";
                echo "<div class='card-title'>" . $row['title'] . "</div>";
                echo "<div class='card-description'>" . $row['description'] . "</div>";
                echo "<div class='card-category'>" . $row['category'] . "</div>";
                echo "<div class='card-status'>" . $row['status'] . "</div>";
                echo "<div class='card-actions'>";
                
                // Display accept and reject buttons if status is pending
                if ($row['status'] == 'pending') {
                    echo "<form action='admin_actions.php' method='post'>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo "<button type='submit' name='action' value='accept'>Accept</button>";
                    echo "<button type='submit' name='action' value='reject'>Reject</button>";
                    echo "</form>";
                }
                
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<div>No advertisements found</div>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
