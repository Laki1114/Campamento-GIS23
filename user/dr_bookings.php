<?php

include('../database/linklinkz.php');

if(isset($_SESSION['customer'])){
 
  // $email = $_GET['user']; // Retrieve the supplier email from the URL parameter
  $email =$_SESSION['customer'] ;
  $sql = "SELECT UserId FROM user WHERE Email = '$email'";
  $result = $linkz->query($sql);
  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $Id = $row['UserId']; 
 // echo $_SESSION['customer']."<br>";
  //echo $_SESSION['customerid']."<br>";
  function getBookingsForDriver($Id) {
    // Database connection
    require '../database/linklinkz.php';
    // SQL query to fetch bookings for the driver
    $sq = "SELECT * FROM bookings WHERE UserId= $Id";
    // Execute query
    $reslt = mysqli_query($linkz, $sq);

    // Check if there are any results
   
    if (mysqli_num_rows($reslt) > 0) {
        // Return the result set
        return $reslt;
    } else {
        // If no bookings found, return null or an empty array as per your requirement
        return null;
    }

    // Close connection
    mysqli_close($linkz);
}
}
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Profile User </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="../css/User/profileUser.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
  min-height: 100px;
  background: var(--white);
  padding: 20px;
  box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
  border-radius: 20px;
  margin-top: 70px;
  margin-left: 20px;
  width: 880px;
}
.details .recentOrders table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 10px;
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
.status-button {
    border: none;
    color: #fff;
    padding: 8px 12px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: not-allowed;
}

.pending { background-color: #ffc107; }
.confirmed { background-color: #28a745; }
.completed { background-color: #007bff; }
.cancelled { background-color: #dc3545; }

.view{
    background-color: #134812;
  color: white;
  padding: 4px 9px;
}

textarea, select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        .rating {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            margin: 8px 0;
        }

        .rating input {
            display: none;
        }

        .rating label {
            cursor: pointer;
            font-size: 30px;
            color: #6a6a6a;
        }

        .rating label:hover,
        .rating label:hover ~ label,
        .rating input:checked ~ label {
            color: #dbaf00;
        }

    </style>

</head>


<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
            <div class="navigation">
            

                    
            </div>
            <?php include 'userSidebar.php'; ?>
        <!-- ========================= Main ==================== -->
        <div class="main">
        <a href="../home/home.php">home</a>
        <div class="upper-section"><center>
        <div class="details">
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Bookings </h2>
                          
                            <a href="#" class="btn">View All</a>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <td>Driver Name</td>
                                    <td>Reference No</td>
                                    <td>Date</td>
                                    <td>Time</td>
                                    <td>Pick-up</td>
                                    <td>Drop-off </td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody id="geeks">
                                <?php
                                    $bookings = getBookingsForDriver($Id);
                                    if ($bookings) {
                                        while ($row = mysqli_fetch_assoc($bookings)) {
                                            $dId = $row['d_id'];
                                            $query  = mysqli_query($linkz, "SELECT * FROM driver WHERE d_id = '$dId' ");

                                            $ro = mysqli_fetch_array($query);
                                            echo "<tr>";
                                            echo "<td>" . $ro['firstname'] . "</td>";
                                            echo "<td>" . $row['reference_number'] . "</td>";
                                            echo "<td>" . $row['booking_date'] . "</td>";
                                            echo "<td>" . $row['booking_time'] . "</td>";
                                            echo "<td>" . $row['pickup_location'] . "</td>";
                                            echo "<td>" . $row['dropoff_location'] . "</td>";
                                        
                                            echo "<td>";

                                            $button_id = 'status_button_' . $row['booking_id'];
                                            if ($row['booking_status'] == 0) { // Pending
                                                echo '<button id="' . $button_id . '" class="status-button pending" disabled>Pending</button>';
                                                echo "<form id='form_accept_" . $row['booking_id'] . "' action='update_booking.php' method='POST'>";
                                                echo "<input type='hidden' name='id' value='" . $row['booking_id'] . "'>";
                                                echo "<input type='hidden' name='status' value='1'>"; // Change status to Confirmed
                                                echo "<button type='button' class='cancel-button' onclick='cancelBooking(" . $row['booking_id'] . ")'>Cancel</button>";
                                                echo "</form>";
                                            } elseif ($row['booking_status'] == 1) { // Confirmed
                                                echo '<button id="' . $button_id . '" class="status-button confirmed" disabled>Confirmed</button>';
                                                echo "<form id='form_accept_" . $row['booking_id'] . "' action='update_booking.php' method='POST'>";
                                                echo "<input type='hidden' name='id' value='" . $row['booking_id'] . "'>";
                                                echo "<input type='hidden' name='status' value='1'>"; // Change status to Confirmed
                                                echo "<button type='button' class='cancel-button' onclick='cancelBooking(" . $row['booking_id'] . ")'>Cancel</button>";
                                                echo "</form>";
                                            } elseif ($row['booking_status'] == 2) { // Completed
                                                echo '<button id="' . $button_id . '" class="status-button completed" disabled>Completed</button>';
                                            } elseif ($row['booking_status'] == 3) { // Cancelled
                                                echo '<button id="' . $button_id . '" class="status-button cancelled" disabled>Cancelled</button>';
                                            }

                                            echo "</td>";
                                            echo "<td>";
                                            echo "<button class='view' onclick='showDetails( \"" . $ro['Vehicle_type'] . "\", \"" . $ro['Model'] . "\",\"" . $row['amount'] . "\",\"" . $row['advancepay'] . "\",\"" . $ro['AC'] . "\", \"" . $row['adults'] . "\", \"" . $row['children'] . "\", \"" . $row['info'] . "\", \"" . $row['created_at'] . "\", \"" . $row['booking_id'] . "\")'>View</button>";
                                            
                                            echo "<div class='action'>";
                                            if ($row['booking_status'] == 2) {  
                                                echo "<button class='view' onclick='showReviewForm(". $row['booking_id'] .")'>Review</button>";
                                            }
                                            echo "</div>";
                                            
                                            echo "</td>";
                                            
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='5'>No bookings found.</td></tr>";
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
</div>
                </div>
<script>
    function showDetails(vehType, model, amount, advance, ac,  adults, children, info,on, booking_id) {
        var modal = document.getElementById("myModal");
        var bookingDetails = document.getElementById("bookingDetails");
        bookingDetails.innerHTML = `
            <p><b>More Details</b></p><br>
            <p><strong>Vehicle Type: </strong>${vehType}</p>
            <p><strong>Model: </strong>${model}</p>
            <p><strong>Amount paid: </strong>${advance}</p>
            <p><strong>Adults: </strong>${adults}</p>
            <p><strong>Children: </strong>${children}</p>
            <p><strong>A/C or Non A/C: </strong>${ac}</p>
            <p><strong>Booked on: </strong>${on}</p>
            <p><strong>More Information: </strong>${info}</p>
            <p><strong>Total amount: </strong>${amount}</p>
        `;
        modal.style.display = "block";
        
    }

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

    function cancelBooking(id) {
        if (confirm("Are you sure you want to cancel this booking?")) {
            $.ajax({
                url: 'update_booking.php',
                method:"POST",
                data: { id: id, status: 3 }, // Change status to 3 (Cancelled)
                dataType:"json",
                success: function(response) {
                    if (response.success) {  
                        $('#status_button_' + id).removeClass('pending').removeClass('confirmed').removeClass('completed').addClass('cancelled').text('Cancelled');
                        updateStatusOnUserPage(id, 3); 
                        alert('Booking cancelled successfully');
                        location.reload();
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
    // Function to update status dynamically on user's profile
function updateStatusOnUserPage(id, status) {
    var button = $('#status_button_' + id);
    button.removeClass('pending confirmed completed cancelled');
    if (status == 0) {
        button.addClass('pending').text('Pending');
    } else if (status == 1) {
        button.addClass('confirmed').text('Confirmed');
    } else if (status == 2) {
        button.addClass('completed').text('Completed');
    } else if (status == 3) {
        button.addClass('cancelled').text('Cancelled');
    }
}
function showReviewForm(id) {
        var reviewForm = `
            <form id="review_form_${id}">
                <input type="hidden" name="booking_id" value="${id}">
                <label for="review"><b>Review:</b></label><br>
                <textarea id="review" style="width:450px;" name="review" rows="4" cols="50"></textarea><br>
                <label for="star_rating"><b>Star Rating:</b></label>
                <div class="rating">
                    <input type="radio" id="star5" name="star_rating" value="5">
                    <label for="star5">&#9733;</label>
                    <input type="radio" id="star4" name="star_rating" value="4">
                    <label for="star4">&#9733;</label>
                    <input type="radio" id="star3" name="star_rating" value="3">
                    <label for="star3">&#9733;</label>
                    <input type="radio" id="star2" name="star_rating" value="2">
                    <label for="star2">&#9733;</label>
                    <input type="radio" id="star1" name="star_rating" value="1">
                    <label for="star1">&#9733;</label>
                </div>
                <button type="button" class="view" onclick="submitReview(${id})">Submit Review</button>
            </form>
        `;
        var modal = document.getElementById("myModal");
        var bookingDetails = document.getElementById("bookingDetails");
        bookingDetails.innerHTML = reviewForm;
        modal.style.display = "block";
    }

    function submitReview(id) {
        var review = document.getElementById("review").value;
        var starRating = document.querySelector('input[name="star_rating"]:checked').value;
        $.ajax({
            url: 'submit_dreview.php',
            method: "POST",
            data: {
                booking_id: id,
                review: review,
                star_rating: starRating
            },
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    alert('Review submitted successfully');
                    location.reload();
                } else {
                    alert('Failed to submit review');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error: ' + error);
                alert('An error occurred while submitting review');
            }
        });
    }

</script>

        
               
            </div>
            <!-- ====== ionicons ======= -->
        </div>
    </div>
</body>

</html>
