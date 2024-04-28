<?php
      require 'config.php';

        if(!isset($_SESSION['email'])){
            header('location: ../login/login.php');
        }

?>
<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messege </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>


.contain {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
  margin-left: 40px;
  width: 800px;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.contain::after {
  content: "";
  clear: both;
  display: table;
}

.contain img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.contain img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}

/* Button used to open the chat form - fixed at the bottom of the page */
.open-button {
  background-color: #327028;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 200px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: #327028;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>

</head>
<body>

<div class="container">
        <div class="navigation">
        <?php include 'driver_sb.php'; ?>
        </div>


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
                </div><?php    
 
 $email = $_SESSION['email'] ;
 $query  = mysqli_query($con, "SELECT * FROM driver WHERE email= '$email' ");

 $row = mysqli_fetch_array($query);
 $id= $row['d_id'];
?>
                <div class="user">
                <img src="<?php echo 'pic/' . $row['picture']; ?>" alt="Profile Picture">

                </div>
            </div>

            <div class="details3">
                

                <!-- ================= chat ================ -->
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
                </div>

                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Reviews</h2>
                        
                    </div>
                    
                    <?php
                    $em = $_SESSION['email'];

                    $query  = mysqli_query($con, "SELECT * FROM driver WHERE email= '$email' ");
                    
                    $row = mysqli_fetch_array($query); 
    // Fetch reviews from the database
    $id = $row['d_id'];
    $reviews_query = mysqli_query($con, "SELECT * FROM bookings WHERE d_id='$id'");

    // Check if there are any reviews
    if (mysqli_num_rows($reviews_query) > 0) {
        // Loop through each review
        while ($review = mysqli_fetch_assoc($reviews_query)) {
            $reviewer_name = $review['name'];
            $review_content = $review['review'];
            $review = $review['star_rating'];

            // Decide whether to show on the left or right based on who is the reviewer
            $review_class = ($reviewer_name == 'Driver') ? "contain darker" : "contain";
            $side = ($reviewer_name == 'Driver') ? "right" : "left";

            // Output the review HTML
            echo '<div class="contain">';
           
            echo '<p>Review: ' . $review_content . '</p>';
            echo '<p>Rating: ' . $review . '</p>';
          
            echo '</div>';
        }
    } else {
        echo '<p>No reviews available.</p>';
    }
    ?>

<div class="chat-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    
    <textarea placeholder="Type message.." name="msg" required></textarea>

    <button type="submit" class="btn">Send</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
                    
                </div>
            </div>
        


</body>
</html>