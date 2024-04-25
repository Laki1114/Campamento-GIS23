<?php 
    session_start();
    include('../database/linklinkz.php');
    $cid =$_SESSION['customerid'];
    $cart = "";
    if(isset($_SESSION['cart'])){
        $cart = $_SESSION['cart'];
        foreach($cart as $key => $value){
        // echo $key ." : ". $value['quantity'] . "<br>";
        
        $sql_cart = "SELECT * FROM products where product_id = $key";
        $result_cart = mysqli_query($conn, $sql_cart);
        $row_cart = mysqli_fetch_assoc($result_cart);
        // $total = $total +  ($row_cart['price'] * $value['quantity']);
        }
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $input = file_get_contents('php://input');
        $formData = json_decode($input);

        if($formData !== null){
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
            
            $sql = "SELECT * FROM user_data where userid = $cid";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);


            if (mysqli_num_rows($result) == 1) {
                
            //   update query
            $up_sql = "UPDATE user_data SET firstname='$fname', lastname='$lname', company='$companyName', address1='$addr1', address2='$addr2', city='$city', country='$country', zip='$Postcode', mobile='$Phone'  WHERE userid=$cid";

            $Updated = mysqli_query($conn, $up_sql);
            if($Updated){

                if(isset($_SESSION['cart'])){
                    $total = 0;
                    foreach($cart as $key => $value){
                    // echo $key ." : ". $value['quantity'] . "<br>";
                    
                    $sql_cart = "SELECT * FROM products where product_id = $key";
                    $result_cart = mysqli_query($conn, $sql_cart);
                    $row_cart = mysqli_fetch_assoc($result_cart);
                    $total = $total +  ($row_cart['price'] * $value['quantity']);
                }
                }


                // echo 'order table and order items - updated';
                // $total_amount = $_SESSION['total'];
                $insertOrder = "INSERT INTO orders (userid, totalprice, orderstatus, paymentmode )
                VALUES ('$cid', '$total', 'Order Placed', '$payment')";  

                if(mysqli_query($conn, $insertOrder)){
                
                    $orderid = mysqli_insert_id($conn); 
                    if(isset($_SESSION['cart'])){
                        foreach($cart as $key => $value){ 
                            $sql_cart = "SELECT * FROM products where product_id = $key";
                        $result_cart = mysqli_query($conn, $sql_cart);
                        $row_cart = mysqli_fetch_assoc($result_cart); 
                            $price_product = $row_cart["price"];
                            $q  = $value["quantity"];
                        $insertordersItems = "INSERT INTO orderitems (orderid, productid, quantity, productprice) 
                            VALUES ('$orderid', '$key', '$q', '$price_product')";
                        
                        if(mysqli_query($conn, $insertordersItems)){
                            //    echo 'inserted on both table orders and ordersItems';
                            unset($_SESSION['cart']);
                            // header("location:myaccount.php");
                            // echo '<script>window.location.href = "orders.php";</script>';
                
                        
                        }
                
                
                    }
                    }

                

                }
            }
            } else {
            // insert 
            


            $ins_sql = "INSERT INTO user_data (userid, firstname, lastname, company, address1, address2, city, country, zip, mobile)
            VALUES ('$cid', '$fname', '$lname', '$companyName', '$addr1', '$addr2', '$city', '$country', '$Postcode', '$Phone')"; 
            $inserted = mysqli_query($conn, $ins_sql);
            if($inserted){
                // echo 'order table and order items - inserted';
                
                if(isset($_SESSION['cart'])){
                    $total = 0;
                    foreach($cart as $key => $value){
                    // echo $key ." : ". $value['quantity'] . "<br>";
                    
                    $sql_cart = "SELECT * FROM products where product_id = $key";
                    $result_cart = mysqli_query($conn, $sql_cart);
                    $row_cart = mysqli_fetch_assoc($result_cart);
                    $total = $total +  ($row_cart['price'] * $value['quantity']);
                }
                }

                
                // echo 'order table and order items - updated';
                // $total_amount = $_SESSION['total'];

                $insertOrder = "INSERT INTO orders (userid, totalprice, orderstatus, paymentmode )
                VALUES ('$cid', '$total', 'Order Placed', '$payment')";  

                if(mysqli_query($conn, $insertOrder)){
                
                    $orderid = mysqli_insert_id($conn); 
                    foreach($cart as $key => $value){ 
                        $sql_cart = "SELECT * FROM products where product_id = $key";
                    $result_cart = mysqli_query($conn, $sql_cart);
                    $row_cart = mysqli_fetch_assoc($result_cart); 
                        $price_product = $row_cart["price"];
                        $q  = $value["quantity"];
                    $insertordersItems = "INSERT INTO orderitems (orderid, productid, quantity, productprice) 
                        VALUES ('$orderid', '$key', '$q', '$price_product')";
                    
                    if(mysqli_query($conn, $insertordersItems)){
                        //    echo 'inserted on both table orders and ordersItems';
                        unset($_SESSION['cart']);
                        // header("location:myaccount.php");
                        // echo '<script>window.location.href = "orders.php";</script>';

                    
                    }


                }

                

                }
            }
            
        }
    }
        else{
            echo json_encode("Empty Form");
        }

    }else{
        echo json_encode("Invalid Request");
    }
?>