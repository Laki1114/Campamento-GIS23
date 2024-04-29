<!DOCTYPE html>
<html>
<head>
    <title>Transaction Count</title>
    <!-- Add your CSS styling here if needed -->
</head>
<body>

<h2>Transaction Count</h2>

<?php
// Include database connection file
include 'db.php';

// Query to fetch data from the transactions table
$sql = "SELECT * FROM transactions";
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    echo '<table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Customer Email</th>
                    <th>Item Name</th>
                    <th>Item Number</th>
                    <th>Item Price</th>
                    <th>Item Price Currency</th>
                    <th>Paid Amount</th>
                    <th>Paid Amount Currency</th>
                    <th>Transaction ID</th>
                    <th>Payment Status</th>
                    <th>Stripe Checkout Session ID</th>
                    <th>Created</th>
                    <th>Modified</th>
                </tr>
            </thead>
            <tbody>';

    // Loop through each row of data
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['customer_name'] . '</td>
                <td>' . $row['customer_email'] . '</td>
                <td>' . $row['item_name'] . '</td>
                <td>' . $row['item_number'] . '</td>
                <td>$' . $row['item_price'] . '</td>
                <td>' . $row['item_price_currency'] . '</td>
                <td>$' . $row['paid_amount'] . '</td>
                <td>' . $row['paid_amount_currency'] . '</td>
                <td>' . $row['txn_id'] . '</td>
                <td>' . $row['payment_status'] . '</td>
                <td>' . $row['stripe_checkout_session_id'] . '</td>
                <td>' . $row['created'] . '</td>
                <td>' . $row['modified'] . '</td>
              </tr>';
    }

    echo '</tbody></table>';
} else {
    // If no rows found
    echo '<p>No transactions found.</p>';
}

// Close database connection
$conn->close();
?>

</body>
</html>
