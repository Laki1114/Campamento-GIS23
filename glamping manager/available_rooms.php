<?php
// PHP (available_rooms.php)

// Connect to the database
$mysqli = new mysqli("localhost", "root", "", "campamento");

// Check for errors
if ($mysqli->connect_error) {
  die(json_encode(['error' => 'Connection failed: ' . $mysqli->connect_error]));
}

// Check if site ID is provided
if (!isset($_GET['id'])) {
  die(json_encode(['error' => 'Site ID is missing']));
}

// Retrieve data from the request
$checkInDate = $_POST['checkInDate'];
$checkOutDate = $_POST['checkOutDate'];
$siteID = $_GET['id']; // Retrieve site ID

// Prepare the SQL query
$query = "SELECT
              room1_type, max_guests_1, room1_price,
              room2_type, max_guests_2, room2_price
          FROM sites
          WHERE site_id = ?
          AND NOT EXISTS (
              SELECT * FROM customer_bookings
              WHERE sites.site_id = customer_bookings.room_id
              AND (
                  ? < customer_bookings.check_out_date
                  AND
                  ? > customer_bookings.check_in_date
              )
          )";

$stmt = $mysqli->prepare($query);
if (!$stmt) {
  die(json_encode(['error' => 'Prepare statement error: ' . $mysqli->error]));
}

$stmt->bind_param("iss", $siteID, $checkInDate, $checkOutDate);
$stmt->execute();

// Check for SQL errors
if ($stmt->error) {
  die(json_encode(['error' => 'Query execution error: ' . $stmt->error]));
}

// Get the result set
$result = $stmt->get_result();

// Check if there are any rows returned
if ($result->num_rows === 0) {
  die(json_encode(['error' => 'No available rooms found']));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Available Rooms</title>
<style>
  table {
    width: 100%;
    border-collapse: collapse;
  }

  th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  tr:hover {
    background-color: #ddd;
  }

  .selected {
    background-color: #4CAF50;
    color: white;
  }
</style>
</head>
<body>

<table>
  <tr>
    <th>Room Type</th>
    <th>Max Guests</th>
    <th>Price</th>
  </tr>
  <?php while ($row = $result->fetch_assoc()) { ?>
    <tr class="selectable-row">
      <td><?= $row['room1_type'] ?></td>
      <td><?= $row['max_guests_1'] ?></td>
      <td><?= $row['room1_price'] ?></td>
    </tr>
    <tr class="selectable-row">
      <td><?= $row['room2_type'] ?></td>
      <td><?= $row['max_guests_2'] ?></td>
      <td><?= $row['room2_price'] ?></td>
    </tr>
  <?php } ?>
</table>

<script>
  // Add event listener to selectable rows
  document.querySelectorAll('.selectable-row').forEach(row => {
    row.addEventListener('click', () => {
      row.classList.toggle('selected');
      // Redirect to customer_details.php when row is clicked
      window.location.href = 'customer_details_form.php';
    });
  });
</script>

</body>
</html>

<?php
// Close the connection
$stmt->close();
$mysqli->close();
?>
