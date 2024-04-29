<?php
include 'db.php';

// Query to fetch all orders
$sql = "SELECT * FROM orders";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User ID</th>
                    <th>Total Price</th>
                    <th>Order Status</th>
                    <th>Payment Mode</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>';

    // Loop through each row of data
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['userid'] . '</td>
                <td>' . $row['totalprice'] . '</td>
                <td>' . $row['orderstatus'] . '</td>
                <td>' . $row['paymentmode'] . '</td>
                <td>' . $row['timestamp'] . '</td>
              </tr>';
    }

    echo '</tbody></table>';
} else {
    // If no orders found
    echo '<p>No orders found.</p>';
}

$conn->close();
?>
