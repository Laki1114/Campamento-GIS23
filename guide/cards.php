<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Cards</title>
    <link rel="stylesheet" href="../css/Guide/cards.css">
</head>
<body>

<?php
// Retrieve filter values
$search = isset($_GET['search']) ? $_GET['search'] : '';
$district = isset($_GET['district']) ? $_GET['district'] : '';
$expertise = isset($_GET['expertise']) ? $_GET['expertise'] : '';

// Construct the base SQL query
$sql = "SELECT * FROM guide WHERE 1";

// Add search condition
if (!empty($search)) {
    $sql .= " AND (firstname LIKE '%$search%' OR location LIKE '%$search%')";
}

// Add district filter condition
if (!empty($district) && $district !== 'All') {
    $sql .= " AND district = '$district'";
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
        $expertiseConditions[] = "FIND_IN_SET('$area', expertise)";
    }
    $sql .= " AND (" . implode(' OR ', $expertiseConditions) . ")";
}

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
            echo '<span class="fa fa-star checked"></span>';
            echo '<span class="fa fa-star checked"></span>';
            echo '<span class="fa fa-star checked"></span>';
            echo '<span class="fa fa-star"></span>';
            echo '<span class="fa fa-star"></span>';
            echo '</div>';
            echo '<div class="des">';
            echo '<p>Location: ' . $row['location'] . '</p>';
            echo '<a href="guide_infor.php?id=' . $row['id'] . '" class="button">More</a>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "No available drivers.";
    }
} else {
    echo "Error executing the query: " . $con->error;
}

$con->close();
?>
</body>
</html>
