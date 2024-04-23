<?php
if (!empty($_POST)) {
    require_once __DIR__ . "/glm_lib_files/DataSource.php";
    $database = new DataSource();
    
    $query = "INSERT INTO customer_bookings (customer_name, email, phone, NIC, tent_type, num_of_rooms, price) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $paramType = 'sssssid'; // Assuming num_of_rooms is an integer and price is a decimal
    $paramValue = array(
        $_POST["customer_name"],
        $_POST["email"],
        $_POST["phone_number"],
        $_POST["nic"],
        $_POST["tent_type"],
        $_POST["num_of_rooms"],
        $_POST["price"]
    );
    $insertId = $database->insert($query, $paramType, $paramValue);
    if (!empty($insertId)) {
        $message = "Thank you for your booking! Your details have been successfully submitted.";
        $type = "success";
        unset($_POST);
    } else {
        $message = "Problem in insertion. Try Again!";
        $type = "error";
    }
}
?>



<!DOCTYPE html>
<html>

<head>
    <title>Booking Form</title>
    <link rel="stylesheet" type="text/css" href="glm_css_files/book.css" />
    <link rel="stylesheet" type="text/css" href="glm_css_files/form_deatails.css" />
    <link rel="stylesheet" type="text/css" href="glm_css_files/wizard.css" />
</head>

<body>
    <div class="phppot-container">
        <h1>Make Your Reservation !</h1>

        
            <div class="wizard-flow-chart">
                <span class="fill">1</span>
                <span>2</span>
                <span>3</span>
                <span>4</span>
                <span>5</span>
            </div>
            <?php if (isset($message)) { ?>
                <div class="message <?php echo $type; ?>"><?php echo $message; ?></div>
            <?php } ?>
            <!-- Wizard section 1 -->
            <section id="billing-section">
                <h3>Check Availability</h3>
                <div class="row">
                    <label class="float-left label-width">Check-In</label>
                    <input type="date" id="input-group" placeholder=" Check-In">
                </div>
                <div class="row">
                    <label class="float-left label-width">Check-Out</label>
                    <input type="date" id="input-group" placeholder=" Check-Out">
                </div>
                
                <div class="row button-row">
                    <button type="button" onClick="validate(this)">Check Availability</button>
                </div>
            </section>

            <!-- Wizard section 2 -->
            <section id="shipping-section" class="display-none">
                <h3>Available Room Details</h3>

            <div id="detailpage">
            <?php
            include("second_step.php");
            ?>
            </div>
            <div class="row button-row">
                    <button type="button" onClick="showPrevious(this)">Previous</button>
                    <button type="button" onClick="validate(this)">Next</button>
                </div>
            </section>


            <!-- Wizard section 3 -->
            <section id="discount-section" class="display-none">
                <h3>Summary of Booking:</h3>
                <div id="confirmpage">
            <?php
            include("third_step.php");
            ?>
            </div>
                
                <div class="row button-row">
                    
                    <button type="button" onClick="validate(this)">Confirm</button>
                </div>
            </section>

                  

            <!-- Wizard section 4 -->
            <section id="others-section" class="display-none">
            <h3>Customer details</h3>
            <div id="confirmpage">
            <?php
            include("customer_details_form.php");
            ?>
            </div>
                
                
            </section>

<!-- Wizard section 5 -->
<section id="discount-section" class="display-none">
                <h3>Payment</h3>

                
                <div id="confirmpage">
            <?php
            include("payment.php");
            ?>
            </div>
                
                <div class="row button-row">
                    
                    <button type="button" onClick="validate(this)">Pay</button>
                </div>
               
            </section>


        
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="glm_js_files/wizard.js"></script>
</body>

</html>