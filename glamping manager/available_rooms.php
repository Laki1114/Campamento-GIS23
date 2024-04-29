<?php
// PHP (available_rooms.php)
header('Content-Type: application/json');

// Connect to the database
$mysqli = new mysqli("localhost", "root", "", "campamento");

// Check for errors
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}



// Retrieve data from the request
$data = json_decode(file_get_contents('php://input'), true);
$checkInDate = $data['checkInDate'];
$checkOutDate = $data['checkOutDate'];

// Prepare the SQL query
$query = "SELECT 
              room1_type, max_guests_1, room1_price,
              room2_type, max_guests_2, room2_price
          FROM sites
          WHERE site_id = '$siteID' 
          AND NOT EXISTS (
              SELECT * FROM customer_bookings 
              WHERE sites.room1_id = customer_bookings.room_id 
              AND (
                  ? < customer_bookings.check_out_date 
                  AND 
                  ? > customer_bookings.check_in_date
              ) 
          )";

$stmt = $mysqli->prepare($query);
$stmt->bind_param("ss", $checkInDate, $checkOutDate);
$stmt->execute();

// Fetch the available rooms
$result = $stmt->get_result();
$rooms = [];
while ($row = $result->fetch_assoc()) {
  // Prepare data for each room
  $roomData = [
    'room1_type' => $row['room1_type'],
    'max_guests_1' => $row['max_guests_1'],
    'room1_price' => $row['room1_price'],
    'room2_type' => $row['room2_type'],
    'max_guests_2' => $row['max_guests_2'],
    'room2_price' => $row['room2_price']
  ];
  // Add room data to the array
  $rooms[] = $roomData;
}

// Close the connection
$stmt->close();
$mysqli->close();

// Return the available rooms as JSON
echo json_encode($rooms);
?>
