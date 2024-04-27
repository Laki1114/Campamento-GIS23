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
  <h1>Room Booking</h1>
  <form id="bookingForm">
    <label for="checkInDate">Check-in Date:</label>
    <input type="date" id="checkInDate" name="checkInDate" required>

    <label for="checkOutDate">Check-out Date:</label>
    <input type="date" id="checkOutDate" name="checkOutDate" required>

    <button type="submit">Check Availability</button>
  </form>

  <!-- Available Rooms Display -->
  <div id="availableRooms"></div>
</div>

<script>
// JavaScript to handle form submission and fetch available rooms
document.getElementById('bookingForm').addEventListener('submit', function(event) {
  event.preventDefault();
  var checkInDate = document.getElementById('checkInDate').value;
  var checkOutDate = document.getElementById('checkOutDate').value;

  // Fetch available rooms from the server
  fetch('available_rooms.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({ checkInDate: checkInDate, checkOutDate: checkOutDate })
  })
  .then(response => response.json())
  .then(rooms => {
    // Display the available rooms as a selectable row table
    var tableHtml = "<table><thead><tr><th>Tent Type</th><th>Max No of Guests</th><th>Price</th></tr></thead><tbody>";
    rooms.forEach(room => {
      tableHtml += `<tr data-room-name1="${room.room1_type}" data-room-max-guests1="${room.max_guests_1}" data-room-price1="${room.room1_price}"><td>${room.room1_type}</td><td>${room.max_guests_1}</td><td>${room.room1_price}</td></tr>`;
      tableHtml += `<tr data-room-name2="${room.room2_type}" data-room-max-guests2="${room.max_guests_2}" data-room-price2="${room.room2_price}"><td>${room.room2_type}</td><td>${room.max_guests_2}</td><td>${room.room2_price}</td></tr>`;
    });
    tableHtml += "</tbody></table>";
    document.getElementById('availableRooms').innerHTML = tableHtml;

    // Add click event listener to each row for selection and redirection
    var rows = document.querySelectorAll('#availableRooms table tbody tr');
    rows.forEach(row => {
      row.addEventListener('click', function() {
        // Deselect all other rows
        rows.forEach(row => {
          row.classList.remove('selected');
        });
        // Select this row
        this.classList.add('selected');
        
        // Get room details from the selected row
        var roomName = this.getAttribute('data-room-name');
        var maxGuests = this.getAttribute('data-room-max-guests');
        var roomPrice = this.getAttribute('data-room-price');
        
        // Redirect to another page with room details as URL parameters
        var queryParams = new URLSearchParams();
        queryParams.append('roomName', roomName);
        queryParams.append('maxGuests', maxGuests);
        queryParams.append('roomPrice', roomPrice);
        queryParams.append('checkInDate', checkInDate);
        queryParams.append('checkOutDate', checkOutDate);
        window.location.href = 'customer_details_form.php?' + queryParams.toString();
      });
    });
  })
  .catch(error => console.error('Error:', error));
});
</script>

</body>
</html>
