<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
 <title>Cards</title>
 <link rel="stylesheet" href="dr_css/cards.css">
</head>

<body>

<?php
$sql = "SELECT * FROM driver";
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
echo '<a href="book_now.php" class="button">Book Now</a>';
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
