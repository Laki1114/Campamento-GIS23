<?php
// index.php
$siteID = isset($_GET['id']) ? $_GET['id'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Room Booking</title>
<style>
/* Global styles */
body {
  font-family: Arial, sans-serif;
  background-color: #d6d4cb;
  margin: 0;
  padding: 0;
}

.container {
  max-width: 800px;
  margin: 20px auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

h1 {
  text-align: center;
  margin-bottom: 20px;
}

form {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 10px;
}

input[type="date"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
}

button[type="submit"] {
  display: block;
  width: 100%;
  padding: 10px;
  border: none;
  background-color: #003D25;
  color: #fff;
  font-size: 16px;
  font-weight: bold;
  border-radius: 5px;
  cursor: pointer;
  margin-left: 10px;
}

button[type="submit"]:hover {
  background-color: #003D25;
}

/* Table styles */
table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
}

th, td {
  padding: 10px;
  text-align: left;
}

th {
  background-color: #f2f2f2;
  font-weight: bold;
}

tr:nth-child(even) {
  background-color: #f9f9f9;
}

tr:hover {
  background-color: #e0e0e0;
}

.selected {
  background-color: #cce5ff; /* Light blue */
}
</style>
</head>
<body>

<!-- Booking Form -->
<div class="container">
  <h1>Tent Booking</h1>
  <form id="bookingForm" method="post" action="available_rooms.php?id=<?php echo $siteID; ?>">
    <label for="checkInDate">Check-in Date:</label>
    <input type="date" id="checkInDate" name="checkInDate" min="<?php echo date('Y-m-d'); ?>" required>

    <label for="checkOutDate">Check-out Date:</label>
    <input type="date" id="checkOutDate" name="checkOutDate" min="<?php echo date('Y-m-d'); ?>"  required>

    <button type="submit">Check Availability</button>
  </form>

  <!-- Available Rooms Display -->
  <div id="availableRooms">
    <?php
      // If available rooms are posted, display them
      if(isset($_POST['availableRooms'])) {
        echo $_POST['availableRooms'];
      }
    ?>
  </div>
</div>

</body>
</html>
