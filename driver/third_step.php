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

    if(isset($_SESSION['checkInDate'])){
    $checkIn = $_SESSION['checkInDate'];
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

    $checkInDate=$_SESSION['checkInDate'];
    $name = $_SESSION['name'];
    $contact = $_SESSION['contact'];
    $email = $_SESSION['email'];
    $pickup = $_SESSION['pickup'];
    $dropoff = $_SESSION['dropoff'];
    $time = $_SESSION['time'];
    $adult = $_SESSION['adult'];
    $children = $_SESSION['children'];
    $specificInterests = $_SESSION['specificInterests'];
    $referenceNumber = $_SESSION['referenceNumber'];
    $user_id = $_SESSION['user_id'];


?>

<!-- Displaying data in the summary page -->
<div class="text">

    <h2>Booking Summary</h2><br>
<?php 
    // Set check-in/out date and time based on booking type
     // Retrieve form data from session
     if(isset($_SESSION['g_id'])) {
        // Retrieve guide_id from session
        $guide_id = $_SESSION['g_id']; 
        $sql = "SELECT Vehicle_type, Model FROM driver WHERE d_id = '$guide_id'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); 
     }
    }
    ?>
    <p><b>Name:</b> <?php echo $name; ?></p><br>
    <p><b>Contact: </b><?php echo $contact; ?></p><br>
    <p><b>Email:</b> <?php echo $email; ?></p><br>
    <p><b>Date:</b> <?php echo $checkInDate; ?></p><br>
    <p><b>Pick-up Location :</b> <?php echo $pickup; ?></p><br>
    <p><b>Drop-off:</b> <?php echo $dropoff; ?></p><br>
    <p><b>Time:</b> <?php echo $time; ?></p><br>
    <p><b>Number of Children: </b><?php echo $children; ?></p><br>
    <p><b>Number of Adults:</b> <?php echo $adult; ?></p><br>
    <p><b>Additional Information:</b> <?php echo $specificInterests; ?></p><br>
    <p><b>Vehicle Type:</b> <?php echo $row['Vehicle_type']; ?></p><br>
    <p><b>Vehicle Model:</b> <?php echo  $row['Model']; ?></p><br>

    <br><p><b>Total Payment: LKR</b></p><br>
        <p><b>Advance Payment (30%): LKR</b></p><br>
    
</div>
</div>

                <div class="row button-row">
                <button type="button" onClick="prevSection('discoun-section','shipping-section')">Previous</button>
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
        
        var data = "name=<?php echo $name; ?>&contact=<?php echo $contact; ?>&email=<?php echo $email; ?>>&pickup=<?php echo $pickup; ?>&dropoff=<?php echo $dropoff; ?>&time=<?php echo $time; ?>&adult=<?php echo $adult; ?>&children=<?php echo $children; ?>&specificInterests=<?php echo $specificInterests; ?>&referenceNumber=<?php echo $referenceNumber; ?>&user_id=<?php echo $user_id; ?>&guide_id=<?php echo $guide_id; ?>&checkInDate=<?php echo $checkInDate; ?> ";
        
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