<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Cards</title>
    <link rel="stylesheet" href="dr_css/cards.css">
    <style>
        .star-container {
            color: #FFD700;
            margin-bottom: 5px;
        }
        .star-container .fa-star {
            font-size: 20px;
        }
        .no-rating .fa-star {
            color: #ddd;
        }
    </style>
</head>

<body>

<?php
// Default SQL query
$sql = "SELECT d.*, AVG(bg.star_rating) AS avg_rating 
        FROM driver d
        LEFT JOIN bookings bg ON d.d_id = bg.d_id
        WHERE 1 ";


// Check if location filter is set
if (isset($_GET['location']) && !empty($_GET['location'])) {
    $location = $_GET['location'];
    $sql .= " AND location = '$location'";
}

// Check if vehicle type filter is set
if (isset($_GET['vehicleType']) && !empty($_GET['vehicleType'])) {
    $vehicleType = $_GET['vehicleType'];
    $sql .= " AND Vehicle_type = '$vehicleType'";
}

// Check if search keyword is set
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
    $sql .= " AND (firstname LIKE '%$search%' OR location LIKE '%$search%' OR Vehicle_type LIKE '%$search%')";
}
$sql .= " GROUP BY d.d_id";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="grid">';
        echo '<div class="imaged">';
        echo '<img src="' . $row['picture'] . '" alt="profile pic">';
        echo '</div>';
        echo '<div class="title">';
        echo '<h2>' . $row['firstname'] . '</h2>';
        echo '</div>';
        echo '<div class="star-container">';
        if($row['avg_rating']) {
            $rating = round($row['avg_rating']);
            for($i = 0; $i < $rating; $i++) {
               
            }
            for($i = 0; $i < (5 - $rating); $i++) {
               
            }
            echo 'Rating: <span>' . number_format($row['avg_rating'], 1) . '</span>';
        }
        else {
            echo '<div class="no-rating">';
            for($i = 0; $i < 5; $i++) {
                
            }
            echo 'Rating: <span>(0.0)</span>';
            echo '</div>';
        }
        echo '</div>';

        echo '<div class="des">';
        echo '<p style="color:black;">Location: ' . $row['location'] . '</p>';
        echo '<a href="driver_info.php?id=' . $row['d_id'] . '" class="button">More</a>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "No available drivers.";
}

$con->close();
?>
</body>
</html>
