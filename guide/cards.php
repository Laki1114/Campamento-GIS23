<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Cards</title>
    <link rel="stylesheet" href="cards.css">
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
// Retrieve filter values
$search = isset($_GET['search']) ? $_GET['search'] : '';
$district = isset($_GET['district']) ? $_GET['district'] : '';
$expertise = isset($_GET['expertise']) ? $_GET['expertise'] : '';

// Construct the base SQL query
$sql = "SELECT g.*, AVG(br.star_rating) AS avg_rating, COUNT(br.star_rating) AS rating_count
        FROM guide g
        LEFT JOIN booking_guide br ON g.id = br.guide_id
        WHERE 1";

// Add search condition
if (!empty($search)) {
    $sql .= " AND (g.firstname LIKE '%$search%' OR g.location LIKE '%$search%')";
}

// Add district filter condition
if (!empty($district) && $district !== 'All') {
    $sql .= " AND g.district = '$district'";
}

// Add expertise filter condition
if (!empty($expertise)) {
    // Ensure $expertise is an array
    if (!is_array($expertise)) {
        $expertise = array($expertise);
    }
    // Construct expertise filter condition
    $expertiseConditions = array();
    foreach ($expertise as $area) {
        $expertiseConditions[] = "FIND_IN_SET('$area', g.expertise)";
    }
    $sql .= " AND (" . implode(' OR ', $expertiseConditions) . ")";
}

$sql .= " GROUP BY g.id";

// Execute the SQL query
$result = $con->query($sql);

if ($result) {
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
                    echo '<span class="fa fa-star checked"></span>';
                }
                for($i = 0; $i < (5 - $rating); $i++) {
                    echo '<span class="fa fa-star"></span>';
                }
                echo '<span>(' . number_format($row['avg_rating'], 1) . ')</span>';
            }
            else {
                echo '<div class="no-rating">';
                for($i = 0; $i < 5; $i++) {
                    echo '<span class="fa fa-star"></span>';
                }
                echo '<span>(0.0)</span>';
                echo '</div>';
            }
            echo '</div>';
            echo '<div class="des">';
            echo '<p>Location: ' . $row['location'] . '</p>';
            echo '<a href="guide_infor.php?id=' . $row['id'] . '" class="button">More</a>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "No available guides.";
    }
} else {
    echo "Error executing the query: " . $con->error;
}

$con->close();
?>
</body>
</html>
