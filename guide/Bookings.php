<?php
      require 'config.php';

        if(!isset($_SESSION['email'])){
            header('location: ../login/login.php');
        }

        $email = $_SESSION['email'];
        $sql = "SELECT id FROM guide WHERE email = '$email'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $Id = $row['id']; 
         } else {
                // If user is not found, return an error message
                $response = array('status' => 'error', 'message' => 'User not found.');
                echo json_encode($response);
                exit(); // Stop script execution
            }
// Sample function to get bookings related to a specific driver
function getBookingsForDriver($Id) {
    // Database connection
    require 'config.php';
    // SQL query to fetch bookings for the driver
    $sq = "SELECT * FROM booking_guide WHERE guide_id = $Id";
    // Execute query
    $reslt = mysqli_query($con, $sq);

    // Check if there are any results
   
    if (mysqli_num_rows($reslt) > 0) {
        // Return the result set
        return $reslt;
    } else {
        // If no bookings found, return null or an empty array as per your requirement
        return null;
    }

    // Close connection
    mysqli_close($con);
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Bookings</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 
    <style>
        .ad{
            margin-left:50px;
            margin-top: 30px;
        }
        .button-container {
      display: flex;
      gap: 10px;
    }

    .accept-button, .cancel-button, .confirmed-button, .completed-button, .cancelled-button{
      padding: 5px 10px;
      border: none;
      cursor: pointer;
      border-radius: 5px;
      font-size: 14px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
    }

    .accept-button {
      background-color: #4caf50;
      color: white;
    }
    .confirmed-button{
        background-color: #4caf50;
        color: white;
    }
    .cancel-button {
      background-color: #f44336;
      color: white;
    }
    .completed-button{
        background-color:  #446a9c;
      color: white;
    }
    .cancelled-button{
        background-color: #f44336;
      color: white;
    }
    .details .recentOrders {
  position: relative;
  display: grid;
  min-height: 200px;
  background: var(--white);
  padding: 20px;
  box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
  border-radius: 20px;
}
.modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: #BFCC7C;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 40%;
        font-size: 18px;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
    #bookingDetails {
    text-align: left;
} 
#cancelModal{
    margin-left: 400px;
}
    .details {
  position: relative;
  width: 90%;
  padding: 5px;
  display: grid;
  grid-template-columns: 2fr 1fr;
  grid-gap: 30px;
  margin-top: 60px;
  /* margin-top: 10px; */
}

.details .recentOrders {
  position: relative;
  display: grid;
  min-height: 200px;
  background: var(--white);
  padding: 15px;
  box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
  border-radius: 20px;
}
.details table {
  width: 90%;
  border-collapse: collapse;
  margin-top: 10px;
}
.details table thead td {
  font-weight: 600;
 
}
.view{
    background-color: #134812;
  color: white;
  padding: 4px 9px;
}
    </style>
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            
        <?php include 'driver_sb.php'; ?>
                
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" id="gfg" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="images/customer01.jpg" alt="">
                </div>
            </div>
           
            <!-- ================ Order Details List ================= -->
           
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Bookings </h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                        
                            <tr>
                                <td>Name</td>
                                <td>Contact</td>
                                <td>Booking Type </td>
                                <td>Check-In</td>
                                <td>Check-Out</td>
                                <td>Start Time</td>
                                <td>End Time</td>
                                <td>View</td>
                                <td>Action</td>
                                
                            </tr>
                        </thead>

                        <tbody id="geeks">
                        <?php
                // Assuming $driverId contains the driver's ID (you need to retrieve this from somewhere)
                // Example ID, replace with actual driver ID
                $bookings = getBookingsForDriver($Id);

                if ($bookings) {
                    while ($row = mysqli_fetch_assoc($bookings)) {
                         
                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['contact'] . "</td>";
                        echo "<td>" . $row['bookingType'] . "</td>";
                        echo "<td>" . $row['checkIn'] . "</td>";
                        echo "<td>" . $row['checkOut'] . "</td>";
                        echo "<td>" . $row['startTime'] . "</td>";
                        echo "<td>" . $row['endTime'] . "</td>";
                        echo "<td><button class='view'  onclick='showDetails( \"" . $row['langPref'] . "\", \"" . $row['specInt'] . "\", \"" . $row['amount'] . "\", \"" . $row['adults'] . "\", \"" . $row['children'] . "\")'>View</button></td>";
 
                        echo "<td>";
                        if ($row['booking_status'] == 0) { // Pending
                            echo "<form id='form_accept_" . $row['id'] . "' action='update_booking.php' method='POST'>";
                            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                            echo "<input type='hidden' name='status' value='1'>"; // Change status to Confirmed
                            echo "<button type='button' id='accept_button_" . $row['id'] . "' class='accept-button' onclick='acceptBooking(" . $row['id'] . ")'>Accept</button>";
                            echo "<button type='button' class='cancel-button' onclick='cancelBooking(" . $row['id'] . ")'>Cancel</button>";
                            echo "</form>";
                        } elseif ($row['booking_status'] == 1) { // Confirmed
                            echo "<button class='confirmed-button' id='confirm_button_" . $row['id'] . "' onclick='markCompleted(" . $row['id'] . ")'>Confirmed</button>";
                            echo "<button type='button' class='cancel-button' onclick='cancelBooking(" . $row['id'] . ")'>Cancel</button>";
                        } elseif ($row['booking_status'] == 2) { // Completed
                            echo "<button class='completed-button' disabled>Completed</button>";
                        } elseif ($row['booking_status'] == 3) { // Cancelled
                            echo "<button class='cancelled-button' disabled>Cancelled</button>";
                        }
                        
                        echo "</td>";
                
                
                        // Add more columns as needed
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No bookings found for this driver.</td></tr>";
                }
                ?>
                        </tbody>
                    </table>
                    <div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="bookingDetails">
            <!-- Booking details will be displayed here -->
        </div>
    </div>
            </div>
<script>
    function showDetails(langPref, specInt, amount, adults, children, status) {
        var modal = document.getElementById("myModal");
        var bookingDetails = document.getElementById("bookingDetails");
        bookingDetails.innerHTML = `
        <h2><b>Details</b></h2><br>
           <p><strong>Languages: </strong>${langPref}</p>
            <p><strong>Specific Interests: </strong>${specInt}</p>
            <p><strong>Payment: </strong>${amount}</p>
            <p><strong>Adults: </strong>${adults}</p>
            <p><strong>Children: </strong>${children}</p>
        `;
        modal.style.display = "block";
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        var modal = document.getElementById("myModal");
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
                    <script>
function acceptBooking(id) {
    if (confirm("Are you sure you want to mark this booking as confirmed?")) {
    $.ajax({
        url: 'update_booking.php',
        method:"POST",
        data: { id: id, status: 1 }, // Change status to 1 (Confirmed)
        dataType:"json",
        success: function(response) {
            if (response.success) {
                // Update the button text and class
                $('#accept_button_' + id).text('Confirmed').removeClass('accept-button').addClass('confirmed-button').prop('onclick', null).off('click');
                $('#cancel_button_' + id).remove(); // Remove the cancel button
                alert('Booking confirmed');
            } else {
                alert('Failed to confirm booking');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error: ' + error);
            alert('An error occurred while confirming booking');
        }
    });
}
}


function markCompleted(id) {
    $.ajax({
        url: 'update_booking.php',
        method:"POST",
        data: { id: id, status: 2 }, // Change status to 2 (Completed)
        dataType:"json",
        success: function(response) {
            if (response.success) {
                $('#booking_' + id + '_button').text('Completed').removeClass('confirmed-button').addClass('completed-button').prop('disabled', true);
                alert('Booking marked as completed');
            } else {
                alert('Failed to mark booking as completed');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error: ' + error);
            alert('An error occurred while marking booking as completed');
        }
    });
}


function cancelBooking(id) {
    if (confirm("Are you sure you want to cancel?")) {
    $.ajax({
        url: 'update_booking.php',
        method:"POST",
        data: { id: id, status: 3 }, // Change status to 3 (Cancelled)
        dataType:"json",
        success: function(response) {
            if (response.success) {
                $('#booking_' + id + '_button').text('Cancelled').removeClass('accept-button').removeClass('confirmed-button').addClass('cancelled-button').prop('disabled', true);
                alert('Booking cancelled');
            } else {
                alert('Failed to cancel booking');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error: ' + error);
            alert('An error occurred while cancelling booking');
        }
    });
}
}
</script>
                </div>
                </div>
</div>
                <script>
        $(document).ready(function () {
            $("#gfg").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#geeks tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <!-- ====== ionicons ======= -->
</body>

</html>