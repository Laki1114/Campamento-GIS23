<?php
// Include the database connection or any necessary configuration file
include 'config.php';
if (!isset($_SESSION['customer'])) {
    // If user is not logged in, return an error message
    $response = array('status' => 'error', 'message' => 'User is not logged in.');
    echo json_encode($response);
    exit(); // Stop script execution
} 

// Define variables and initialize with empty values
$name = $contact = $email = $adult = $children = $languagePreference = $specificInterests = "";

// Payment amount and advance payment variables
$amount = $advancePayment = 0;

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_SESSION['bookingType'])) {
    $bookingType = $_SESSION['bookingType'];
    $name = $_SESSION['name'];
    $contact = $_SESSION['contact'];
    $email = $_SESSION['email'];
    $adult = $_SESSION['adult'];
    $children = $_SESSION['children'];
    $languagePreference = $_SESSION['languagePreference'];
    $specificInterests = $_SESSION['specificInterests'];
    $referenceNumber = $_SESSION['referenceNumber'];
    $user_id = $_SESSION['user_id'];
    $bookingType = $_SESSION['bookingType'];
    $checkInDate = $checkOutDate = $time = "";
    
    $checkInDate = $checkOutDate = $time = $endTime = '';

    // Set check-in/out date and time based on booking type
    if($bookingType == 'full_day' || $bookingType == 'Hourly' || $bookingType == 'half_day') {
        $checkInDate = isset($_SESSION['checkInDate']) ? $_SESSION['checkInDate'] : '';
    }
    if($bookingType == 'full_day') {
        $checkOutDate = isset($_SESSION['checkOutDate']) ? $_SESSION['checkOutDate'] : '';
    }
    if($bookingType == 'Hourly') {
        $time = isset($_SESSION['time']) ? $_SESSION['time'] : '';
        $endTime = isset($_SESSION['endTime']) ? $_SESSION['endTime'] : '';
    }

    
}
if(isset($_SESSION['g_id'])) {
    // Retrieve guide_id from session
    $guide_id = $_SESSION['g_id'];}
    // Calculate the 30% advance payment
    $advancePayment = $final * 0.3;
    $booking_status = 0; 
    // Insertion into the database
    $sql = "INSERT INTO booking_guide (name, contact, email, adults, children, langPref, specInt, reference_number, userId, guide_id, amount, advancePayment, bookingType, checkIn, checkOut, startTime, endTime, booking_status)
            VALUES ('$name', '$contact', '$email', '$adult', '$children', '$languagePreference', '$specificInterests', '$referenceNumber', '$user_id', '$guide_id', '$amount', '$advancePayment', '$bookingType', '$checkInDate', '$checkOutDate', '$time', '$endTime', '$booking_status')";

if ($con->query($sql) === TRUE) {
    echo "Booking success!";
} else {
    echo "Error storing booking details: " . $con->error;
}
$con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="glm_css_files/third_step.css">
    <link rel="stylesheet" type="text/css" href="glm_css_files/book.css" />
    <link rel="stylesheet" type="text/css" href="glm_css_files/form_deatails.css" />
    <link rel="stylesheet" type="text/css" href="glm_css_files/wizard.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="phppot-container">
<section id="discoun-section">
<div class="wizard-flow-chart">
                <span class="fill">1</span>
                <span class="fill">2</span>
                <span class="fill">3</span>
                <span>4</span>
            </div>
<div class="containerrr">

                <div id="confirmpage">
<?php
// Retrieve data from cookies
$name = $_SESSION['name'];
    $contact = $_SESSION['contact'];
    $email = $_SESSION['email'];
    $adult = $_SESSION['adult'];
    $children = $_SESSION['children'];
    $languagePreference = $_SESSION['languagePreference'];
    $specificInterests = $_SESSION['specificInterests'];
    $referenceNumber = $_SESSION['referenceNumber'];
    $user_id = $_SESSION['user_id'];


?>

<!-- Displaying data in the summary page -->
<div class="text">

    <h2>Booking Summary</h2><br>
<?php 
if(isset($_SESSION['bookingType'])) {
    // Retrieve form data from session

    $bookingType = $_SESSION['bookingType'];
     echo "<b>Booking Type:</b>  $bookingType <br><br>";
    $checkInDate = $checkOutDate = $time = $endTime = '';
    
    $final = 0; // Initialize $final
    $advancePayment = 0;
    
    // Set check-in/out date and time based on booking type
     // Retrieve form data from session
     if(isset($_SESSION['g_id'])) {
        // Retrieve guide_id from session
        $guide_id = $_SESSION['g_id']; 
    if($bookingType == 'full_day') {
        $checkInDate = isset($_SESSION['checkInDate']) ? $_SESSION['checkInDate'] : '';
        $checkOutDate = isset($_SESSION['checkOutDate']) ? $_SESSION['checkOutDate'] : '';
        $checkIn = strtotime($checkInDate);
    $checkOut = strtotime($checkOutDate);
    
    if ($checkInDate != $checkOutDate) { // If check-in and check-out dates are not the same
        $difference = abs($checkOut - $checkIn);
        $days = floor($difference / (60 * 60 * 24));
        $sql = "SELECT full_day FROM guide WHERE id = '$guide_id'";
        $result = $con->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row) {
                $amount = $row['full_day'];
                $t = $amount + $amount * 0.2;
                $final = $t * $days; // Calculate $final
            }
        }
    } else { // If check-in and check-out dates are the same, consider it as a one-day booking
        $days = 1;
        $sql = "SELECT full_day FROM guide WHERE id = '$guide_id'";
        $result = $con->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row) {
                $amount = $row['full_day'];
                $final = $amount + $amount * 0.2;// Calculate $final
            }
        }
    }
        
      
    }
    if($bookingType == 'half_day_morning'|| $bookingType == 'half_day_morning') {
        $checkInDate = isset($_SESSION['checkInDate']) ? $_SESSION['checkInDate'] : '';
        $sql = "SELECT half_day FROM guide WHERE id = '$guide_id'";
        $result = $con->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row) {
                $amount = $row['half_day'];
                $final = $amount + $amount * 0.2; // Calculate $final
            }
        }
    }
    if($bookingType == 'Hourly') {
        $checkInDate = isset($_SESSION['checkInDate']) ? $_SESSION['checkInDate'] : '';
        $time = isset($_SESSION['time']) ? $_SESSION['time'] : '';
        $endTime = isset($_SESSION['endTime']) ? $_SESSION['endTime'] : '';
        $start = strtotime($time);
        $end = strtotime($endTime);
        $hours = ($end - $start) / (60 * 60);
        $sql = "SELECT hourly FROM guide WHERE id = '$guide_id'";
        $result = $con->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row) {
                $amount = $row['hourly'];
                $t = $amount + $amount * 0.2;
                $final = $t * $hours; // Calculate $final
            }
        }
    }
    
$advancePayment = $final * 0.3;
     }
    if($bookingType == 'full_day' || $bookingType == 'Hourly' || $bookingType == 'half_day_morning'|| $bookingType == 'half_day_morning') {
        echo "<p><b>Check-In Date:</b> $checkInDate</p><br>";
    }
    if($bookingType == 'full_day'  || $bookingType == 'half_day') {
        echo "<p><b>Check-Out Date:</b> $checkOutDate</p><br>";
    }
    if($bookingType == 'Hourly') {
        echo "<p><b>Start Time: </b>$time</p><br>";
        echo "<p><b>End Time:</b> $endTime</p><br>";
    }


}
  ?>
   
    <p><b>Name:</b> <?php echo $name; ?></p><br>
    <p><b>Contact: </b><?php echo $contact; ?></p><br>
    <p><b>Email:</b> <?php echo $email; ?></p><br>
    <p><b>Adults:</b> <?php echo $adult; ?></p><br>
    <p><b>Children: </b><?php echo $children; ?></p><br>
    <p><b>Language Preference:</b> <?php echo $languagePreference; ?></p><br>
    <p><b>Specific Interests:</b> <?php echo $specificInterests; ?></p><br>

    <br><p><b>Total Payment: LKR <?php echo   $final; ?></b></p><br>
        <p><b>Advance Payment (30%): LKR <?php echo $advancePayment; ?></b></p><br>
</div>
</div>

                <div class="row button-row">
                               <button type="submit" id="confirmButton">Confirm</button>
</div>

<script>
    document.getElementById("confirmButton").addEventListener("click", function() {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "insert_booking.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText);
            }
        };
        
        var data = "name=<?php echo $name; ?>&contact=<?php echo $contact; ?>&email=<?php echo $email; ?>&adult=<?php echo $adult; ?>&children=<?php echo $children; ?>&languagePreference=<?php echo $languagePreference; ?>&specificInterests=<?php echo $specificInterests; ?>&referenceNumber=<?php echo $referenceNumber; ?>&user_id=<?php echo $user_id; ?>&guide_id=<?php echo $guide_id; ?>&bookingType=<?php echo $bookingType; ?>&checkInDate=<?php echo $checkInDate; ?>&checkOutDate=<?php echo $checkOutDate; ?>&time=<?php echo $time; ?>&endTime=<?php echo $endTime; ?>&totalPayment=<?php echo $final; ?>&advancePayment=<?php echo $advancePayment; ?>";
        
        xhr.send(data);
    });
</script>
</div>
</section>
<section id="discount-section" class="display-none">
    
<div class="wizard-flow-chart">
                <span class="fill">1</span>
                <span class="fill">2</span>
                <span class="fill">3</span>
                <span class="fill">4</span>
            </div>
                <h3>Payment</h3>
                <div id="confirmpage">
                    <?php include("payment.php"); ?>
                </div>

                <div class="row button-row">
                
                    <button type="button" onClick="validate(this)">Pay</button>
                </div>
            </section>
            <script src="glm_js_files/wizard.js"></script>
</body>
</html>