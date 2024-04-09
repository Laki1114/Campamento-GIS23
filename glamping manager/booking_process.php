<?php
if (!empty($_POST)) {
    require_once __DIR__ . "/glm_lib/DataSource.php";
    $database = new DataSource();
    
    // Store wizard form data to post
    $query = "INSERT INTO tbl_order (billing_name, billing_email, billing_state, billing_city, billing_country, billing_zip, shipping_name, shipping_email, shipping_state, shipping_city, shipping_country, shipping_zip, discount_code, notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $paramType = 'ssssssssssssss';
    $paramValue = array(
        $_POST["customer_billing_name"],
        $_POST["billing_email"],
        $_POST["billing_state"],
        $_POST["billing_city"],
        $_POST["billing_country"],
        $_POST["billing_zipcode"],
        $_POST["customer_shipping_name"],
        $_POST["shipping_email"],
        $_POST["shipping_state"],
        $_POST["shipping_city"],
        $_POST["shipping_country"],
        $_POST["shipping_zipcode"],
        $_POST["discount_coupon"],
        $_POST["notes"],
    );
    $insertId = $database->insert($query, $paramType, $paramValue);
    if (!empty($insertId)) {
        $message = "Thank you for your order! Your checkout details have been successfully submitted.";
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
    <link rel="stylesheet" type="text/css" href="glm_css_files/booking_process1.css" />
    <link rel="stylesheet" type="text/css" href="glm_css_files/form_deatails.css" />
    <link rel="stylesheet" type="text/css" href="glm_css_files/wizard.css" />
</head>

<body>
    <div class="phppot-container">
        <h1>Make Your Reservation !</h1>

        <form method="POST" id="checkout-form" onSubmit="return validateCheckout()">
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
                <div class="row">
                    <label class="float-left label-width">Name</label>
                    <input name="customer_name" type="text">
                </div>
                <div class="row">
                    <label class="float-left label-width">Email</label>
                    <input name="email" type="text">
                </div>
                <div class="row">
                    <label class="float-left label-width">Phone</label>
                    <input name="phone_number" type="tel">
                </div>
                <div class="row">
                    <label class="float-left label-width">NIC</label>
                    <input name="nic" type="text">
                </div>
                
                <div class="row button-row">
                    <button type="button" onClick="validate(this)">Next</button>
                </div>
            </section>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="glm_js_files/wizard.js"></script>
</body>

</html>