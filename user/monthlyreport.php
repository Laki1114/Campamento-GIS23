<?php

// Include database connection
include('../database/linklinkz.php');

// Check if user is logged in
if (!isset($_SESSION['customerid']) || empty($_SESSION['customerid'])) {
    header('Location: ../login/login.php');
    exit();
}

// Retrieve user ID from session
$userId = $_SESSION['customerid'];

// Calculate the start and end dates of the current month
$startDate = date('Y-m-01'); // First day of the current month
$endDate = date('Y-m-t'); // Last day of the current month

// Query to retrieve monthly purchases for the user
$sql = "SELECT
            o.id AS order_id,
            o.timestamp AS purchase_date,
            p.product_name,
            oi.quantity,
            oi.productprice,
            (oi.quantity * oi.productprice) AS total_item_price,
            o.totalprice AS total_order_price
        FROM
            orders o
        JOIN
            orderitems oi ON o.id = oi.orderid
        JOIN
            products p ON oi.productid = p.product_id
        WHERE
            o.userid = $userId
            AND DATE(o.timestamp) BETWEEN '$startDate' AND '$endDate'
        ORDER BY
            o.timestamp DESC";

$result = mysqli_query($conn, $sql);

// Check if there are any purchases
if (mysqli_num_rows($result) > 0) {
    $totalAmountSpent = 0; // Initialize total amount spent variable
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Monthly Purchases Report</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css"> <!-- Adjust the path to your CSS file -->
    </head>
    <body>
        <h1>Monthly Purchases Report</h1>
        <table>
            <thead>
                <tr>
                    <th style="padding: 15px;">Order ID</th>
                    <th style="padding: 15px;">Date</th>
                    <th style="padding: 15px;"></th>
                    <th style="padding: 15px;">Product Name</th>
                    <th style="padding: 15px;">Quantity</th>
                    <th style="padding: 15px;">Unit Price</th>
                    <th style="padding: 15px;">Total Item Price</th>
                    <th style="padding: 15px;">Total Order Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop through the results and display each purchase
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['order_id']; ?></td>
                        <td><?php echo $row['purchase_date']; ?></td>
                        <td></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><center><?php echo $row['quantity']; ?></center></td>
                        <td><center><?php echo $row['productprice']; ?></center></td>
                        <td><center><?php echo $row['total_item_price']; ?></center></td>
                        <td><center><?php echo $row['total_order_price']; ?></center></td>
                    </tr>
                    <?php
                    // Add the total_order_price to the total amount spent
                    $totalAmountSpent += $row['total_order_price'];
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7"><strong>Total Amount Spent:</strong></td>
                    <td><strong><?php
// Loop to print &nbsp; 10 times
for ($i = 0; $i < 15; $i++) {
    echo "&nbsp;";
}
?><?php echo $totalAmountSpent; ?></strong></td>
                </tr>
            </tfoot>
        </table>
    </body>
    </html>
    <?php
} else {
    // If no purchases found, display a message
    echo "No purchases found for this month.";
}
?>
