<?php
session_start();
include('../database/linklinkz.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = file_get_contents('php://input');
    $formData = json_decode($input);

    if ($formData !== null) {
        $cid = $_SESSION['customerid'];
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

        // Process form data
        $country = $formData->country;
        $fname = $formData->fname;
        $lname = $formData->lname;
        $companyName = $formData->companyname;
        $addr1 = $formData->addr1;
        $addr2 = $formData->addr2;
        $city = $formData->city;
        $Postcode = $formData->postcode;
        $Phone = $formData->phonenumber;
        $total = $formData->price;
        $payment = $formData->paymentMode;

        // Update or insert user data
        $sql = "SELECT * FROM user_data WHERE userid = $cid";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $up_sql = "UPDATE user_data SET firstname='$fname', lastname='$lname', company='$companyName', address1='$addr1', address2='$addr2', city='$city', country='$country', zip='$Postcode', mobile='$Phone' WHERE userid=$cid";
            $Updated = mysqli_query($conn, $up_sql);
        } else {
            $ins_sql = "INSERT INTO user_data (userid, firstname, lastname, company, address1, address2, city, country, zip, mobile) VALUES ('$cid', '$fname', '$lname', '$companyName', '$addr1', '$addr2', '$city', '$country', '$Postcode', '$Phone')";
            $inserted = mysqli_query($conn, $ins_sql);
        }

        // Insert order
        $insertOrder = "INSERT INTO orders (userid, totalprice, orderstatus, paymentmode) VALUES ('$cid', '$total', 'Order Placed', '$payment')";
        $orderInserted = mysqli_query($conn, $insertOrder);

        if ($orderInserted) {
            $orderid = mysqli_insert_id($conn);

            // Insert order items
            foreach ($cart as $key => $value) {
                $sql_cart = "SELECT * FROM products WHERE product_id = $key";
                $result_cart = mysqli_query($conn, $sql_cart);
                $row_cart = mysqli_fetch_assoc($result_cart);

                $price_product = $row_cart["price"];
                $q = $value["quantity"];

                $insertordersItems = "INSERT INTO orderitems (orderid, productid, quantity, productprice) VALUES ('$orderid', '$key', '$q', '$price_product')";
                mysqli_query($conn, $insertordersItems);
            }
            $_SESSION['Payment_Success'] = "Payment Successful";
            unset($_SESSION['cart']);
            if($payment == 'COD'){
                header("Location: orders.php"); // Redirect to index.php after successful order insertion
            }
            exit(); // Ensure script stops execution after redirection
        } else {
            $_SESSION['Payment_Success'] = "Failed to insert order";
            // header("Location: checkout.php"); // Redirect back to checkout page if order insertion fails
            // exit();
        }
    } else {
        $_SESSION['Payment_Success'] = "Invalid Form Data";
        // header("Location: checkout.php"); // Redirect back to checkout page if form data is invalid
        // exit();
    }
} else {
    $_SESSION['Payment_Success'] = "Invalid Request Method";
    // header("Location: checkout.php"); // Redirect back to checkout page if request method is invalid
    // exit();
}
?>
