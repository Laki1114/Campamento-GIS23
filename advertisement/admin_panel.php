<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <style>
        .card {
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 10px;
            padding: 10px;
            margin: 10px 0;
        }
        .card-title {
            font-weight: bold;
            font-size:20px;
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
            border: none;
            outline: none;
            padding: 12px 16px;
            color: white;
            background-color: #327028;
            cursor: pointer;
            border-radius: 10px;
        }
        .rejectbtn  {
            border: none;
            outline: none;
            padding: 12px 16px;
            color: white;
            background-color: #327028;
            cursor: pointer;
            border-radius: 10px;
        }
        .card-images img {
            width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h2>All advertisements</h2>
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
                    echo "<form action='admin_panel.php' method='post'>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo "<button type='submit' name='action' value='accept'>Accept</button>";
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;";
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
