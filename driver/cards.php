<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Cards</title>
    <link rel="stylesheet" href="../css/Driver/cards.css">
</head>

<body>

<?php
// Default SQL query
$sql = "SELECT * FROM driver WHERE 1";

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
        echo '<span class="fa fa-star checked"></span>';
        echo '<span class="fa fa-star checked"></span>';
        echo '<span class="fa fa-star checked"></span>';
        echo '<span class="fa fa-star"></span>';
        echo '<span class="fa fa-star"></span>';
        echo '</div>';

        echo '<div class="des">';
        echo '<p>Location: ' . $row['location'] . '</p>';
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
