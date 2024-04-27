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
$name = $contact = $email = $adult = $children = $specificInterests = "";

// Payment amount and advance payment variables
$amount = $advancePayment = 0;


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
   $distance= $_SESSION['distance'];
  
?>

<!-- Displaying data in the summary page -->
<div class="text">

    <h2>Booking Summary</h2><br>
<?php 
    // Set check-in/out date and time based on booking type

    
    if(isset($_SESSION['g_id'])) {
    
        $guide_id = $_SESSION['g_id']; 
        $sql = "SELECT Vehicle_type, Model FROM driver WHERE d_id = '$guide_id'";
    $result = $con->query($sql);
    
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc(); 
                $vehicle_type = $row['Vehicle_type'];
    
                // Calculate payment based on vehicle type
                switch ($vehicle_type) {
                    case 'Car/ Mini SUV(3-4)':
                        $amount = 125;
                        break;
                    case 'Mini Car(2-3)':
                        $amount = 125;
                        break;
                    case 'Standard size Car(3-4)':
                        $amount = 135;
                        break;
                    case 'People Carrier(6-7)':
                        $amount = 190;
                        break;
                    case 'Large People Carrier(8-9)':
                        $amount = 200;
                        break;
                    default:
                        $amount = 0;
                        break;
                }
            }
    
            $final = $distance * $amount;
        // Calculate the 30% advance payment
        $advancePayment = $final * 0.3;
     // Retrieve form data from session
     
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

    <br><p><b>Total Payment: LKR<?php echo  $final ?></b></p><br>
        <p><b>Advance Payment (30%): LKR <?php echo $advancePayment ?></b></p><br>
    
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
        
        var data = "name=<?php echo $name; ?>&contact=<?php echo $contact; ?>&email=<?php echo $email; ?>>&pickup=<?php echo $pickup; ?>&dropoff=<?php echo $dropoff; ?>&time=<?php echo $time; ?>&adult=<?php echo $adult; ?>&children=<?php echo $children; ?>&specificInterests=<?php echo $specificInterests; ?>&referenceNumber=<?php echo $referenceNumber; ?>&user_id=<?php echo $user_id; ?>&driver_id=<?php echo $guide_id; ?>&date=<?php echo $checkInDate; ?>&advance=<?php echo $advancePayment; ?> &amount=<?php echo $final; ?>  ";
        
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