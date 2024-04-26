<?php 
      require 'config.php';
  
        if(!isset($_SESSION['email'])){
            header('location: ../login/login.php');
        }
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Guide</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../css/Driver/admin.css">
<style>
      .btn {
    border: 2px solid black;
    background-color: white;
    color: black;
    padding: 5px 10px;
    font-size: 16px;
    cursor: pointer;
  }
  /* Blue */
  .info {
    border-color: #52f321;
    color: rgb(7, 83, 68);
  }
  
  .info:hover {
    background: #11b044;
    color: white;
  }


h2,h3 {
    text-align:center;
    line-height:30px;
}

table {
  margin-top: 0px;
  width: 70%; 
  border: none;height
}

.move-content{
  margin-left:40px;
}

/* =========================wrapping profile pic and table=====================*/
.containerr {
  display: flex; /* Use flexbox to arrange elements horizontally */
  align-items: center; /* Vertically center-align elements */
  margin-left: 70px;
  margin-top:0px;

}


.profile {
    flex: 1;
    display: flex;
    align-items: center;
    margin-left: 300px; /* Adjust margin as needed */
}
.profile-info {
  flex: 3; 
 
  /* Let the profile information take 3/4 of the available space */
}

.edit-button {
  display: block;
  margin-top: 10px;
  padding: 3px 8px;
   background-color: #0f3411;
  color: white;
  border: none;
 border-radius: 4px;
 cursor: pointer;
        }

.edit-button:hover {
  background-color: #45a049;
}

.edit-v {
    position: relative;
    top: 10px; /* Adjust top position as needed */
    right: 10px; /* Adjust right position as needed */
    padding: 4px 8px;
    background-color: #0f3411; /* Adjust the background color as needed */
    color: #fff; /* Adjust the text color as needed */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-left:800px;
}

.edit-v:hover {
    background-color: #45a049; /* Adjust the hover background color as needed */
}
.v-desc{
  margin-left:50px;
}

.calendar {
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
    max-width: 400px;
    width: 100%;
}

.calendar-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #68a75a;
    color: #fff;
    padding: 10px;
}

.calendar-header button {
    background: none;
    border: none;
    font-size: 18px;
    color: #fff;
    cursor: pointer;
}

.calendar-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 8px;
    padding: 10px;
}

.calendar-day {
    text-align: center;
    padding: 8px;
    cursor: pointer;
    border-radius: 50%;
    transition: background-color 0.3s ease;
}

.day-name {
    font-weight: bold;
}

.available {
    background-color: #4caf50;
    color: #fff;
}

.unavailable {
    background-color: #ff0000; /* Change to red color */
    color: #fff;
}
.today {
    font-weight: bold;
    border: 2px solid #4caf50;
}

.selected {
    background-color: #4caf50;
    color: #fff;
}

.empty {
    visibility: hidden;
}

#availabilityForm {
    display: none;
    margin-top: 20px;
    padding: 10px;
    background-color: #eee;
    border-radius: 8px;
}

#availabilityForm label {
    display: block;
    margin-bottom: 8px;
}

#availabilityInput {
    padding: 8px;
    margin-bottom: 8px;
}

#updateAvailabilityBtn {
    padding: 8px 16px;
    background-color: #4caf50;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

#updateAvailabilityBtn:hover {
    background-color: #45a049;
}

        /* Add the new CSS for disabled dates */
        .disabled {
            background-color: #f0f0f0; /* Lighter color for disabled dates */
            color: #bbb; /* Adjust text color for better visibility */
            cursor: not-allowed; /* Change cursor to not-allowed for disabled dates */
        }

        .image-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      grid-gap: 10px;
    }

    .image-container {
      position: relative;
      width: 100%;
      overflow: hidden;
      border: 1px solid #ccc;
    }

    .image-container img {
      display: block;
      width: 100%;
      height: auto;
    }

    .change-button {
      display: block;
      width: 60%;
      background-color: #333;
      color: #fff;
      padding: 5px 10px;
      border: none;
      border-radius: 0;
      cursor: pointer;
      margin-left:10px;
    }

    input[type="file"] {
      display: block;
      width: calc(100% - 20px);
      margin: 10px;
    }
    .add-button {
    background-color:#0e2b09;
    color: white;
    padding: 6px 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 3px;
  }
  .change-image-form {
    display: flex;
    flex-direction: column;
}
</style>

</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
        <?php include 'driver_sb.php'; ?>
        </div>
        <?php    
 
 $email = $_SESSION['email'] ;
 $query  = mysqli_query($con, "SELECT * FROM guide WHERE email= '$email' ");

 $row = mysqli_fetch_array($query);
 $id= $row['id'];
?>
        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="<?php echo $row['picture']; ?>" alt="">
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            <div >

                <h2>Welcome <?php echo $row['firstname']; ?>!</h2>
                <h3>User ID - <b>G<?php echo $row['id']; ?></b></h3>
                <?php
// Check if the form was submitted
if(isset($_POST['change'])){
    // Check if a file was uploaded without errors
    if(isset($_FILES["new_image"]) && $_FILES["new_image"]["error"] == 0){
        $target_dir = "pic/";
        $target_file = $target_dir . basename($_FILES["new_image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["new_image"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Sorry, only JPG, JPEG & PNG files are allowed.";
            $uploadOk = 0;
        }
    
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["new_image"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["new_image"]["name"])). " has been uploaded.";
                // Now update the database with the new image path
                $new_image_path = $target_dir . basename($_FILES["new_image"]["name"]);

                // SQL to update the picture path
                $sql = "UPDATE guide SET picture='$new_image_path' WHERE id='$id'";
                if ($con->query($sql) === TRUE) {
                  echo "<script>alert('Record updated successfully');</script>";
                  echo "<script>window.setTimeout(function() { window.location = 'd_profile.php'; }, 2000);</script>";
                } else {
                    echo "Error updating record: " . $con->error;
                }
   } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}
?>
                <div class="containerr" >
                <div class="profile">
        <div class="container-image">
            <img src="<?php echo $row['picture']; ?>" alt="profile pic" class="profile-picture" width="200px" height="200px">
        </div>
        <form action="" method="post" enctype="multipart/form-data" class="change-image-form">
            <input type="file" name="new_image" accept="image/*">
            <button type="submit" name="change" class="edit-button" style="width:120px;">Change image</button>
        </form>
    </div>
                </div>
            
  
                <div class="profile-info">
                  <br>
                    <table>
                    <tr>
                        <td>First Name : <?php echo $row['firstname']; ?></td>
                        <td>NIC no :  <?php echo $row['nic']; ?></td>
                    </tr>
                    <tr>
                        <td>Last name :  <?php echo $row['lastname']; ?></td>
                        <td>Email :  <?php echo $row['email']; ?></td>
                    </tr>
                    <tr>
                        <td>Gender : <?php echo $row['gender']; ?> </td>
                        <td>Contact : <?php echo $row['phone']; ?></td>
                    </tr>
                    <tr>
                        <td>Address : <?php echo $row['address']; ?> </td>
                        <td>District : <?php echo $row['district']; ?></td>
                    </tr>
                    <tr>
                    <tr>
                        <td></td>
                        
                        <td><br><button class="btn info"><a href="editUser.php">Edit Your Data</a></button></td>
                    </tr>
                    <tr>
                    <td></td>    
                    <td><br><button class="btn info"><a href="editPass.php">Change password</a></button></td></tr>
              
                    </table>
                
                </div>
  
            </div>
            
             <br><br>
             <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Availability Calendar</h2><br>
                        <div class="calendar">
    <div class="calendar-header">
        <button id="prevMonthBtn">&lt;</button>
        <h2 id="currentMonth">Month Year</h2>
        <button id="nextMonthBtn">&gt;</button>
    </div>
    <div class="calendar-grid" id="calendarGrid"></div>
    <form id="availabilityForm" style="display: none;" method="post" action="update_availability.php">
    <label for="availabilityInput">Update Availability:</label>
    <select id="availabilityInput" name="availabilityInput">
        <option value="unavailable" >Unavailable</option>
    </select>
    <input type="hidden" id="selectedDateInput" name="date" value="">
    <input type="hidden" id="availabilityStatusInput" name="availability" value="">
    <button type="submit" id="updateAvailabilityBtn">Update</button>

</form>


    </div>
</div>
<script>document.addEventListener('DOMContentLoaded', function () {
    const calendarGrid = document.getElementById('calendarGrid');
    const availabilityForm = document.getElementById('availabilityForm');
    const currentMonthElement = document.getElementById('currentMonth');
    let today = new Date();
    let currentYear = today.getFullYear();
    let currentMonth = today.getMonth();
    let unavailableDates = []; // Store unavailable dates globally

    // Fetch unavailable dates from the database
    fetchUnavailableDates().then(data => {
        unavailableDates = data.unavailableDates; // Store fetched unavailable dates globally
        renderCalendar(currentYear, currentMonth);
    });

    // Function to render the calendar for a specific year and month
    function renderCalendar(year, month) {
        calendarGrid.innerHTML = '';
        const firstDay = new Date(year, month, 1);
        const lastDay = new Date(year, month + 1, 0);
        const daysInMonth = lastDay.getDate();

        const dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

        // Update the current month element with the displayed month and year
        currentMonthElement.textContent = `${getMonthName(month)} ${year}`;

        for (let i = 0; i < dayNames.length; i++) {
            const dayNameElement = createDayElement(dayNames[i], 'day-name');
            calendarGrid.appendChild(dayNameElement);
        }

        for (let i = 0; i < firstDay.getDay(); i++) {
            const emptyDay = createDayElement('', 'empty');
            calendarGrid.appendChild(emptyDay);
        }

        for (let day = 1; day <= daysInMonth; day++) {
            const date = new Date(year, month, day);
            const dayElement = createDayElement(day, 'normal');

            // Check if the date is in the past
        // Check if the date is in the past and not in unavailable dates
if (date < today && !unavailableDates.includes(formatDate(date))) {
    dayElement.classList.add('disabled');
} else {
    // Attach click event listener only for future dates
    dayElement.addEventListener('click', function () {
        if (!dayElement.classList.contains('unavailable')) {
            const selectedDay = document.querySelector('.selected');
            if (selectedDay) {
                selectedDay.classList.remove('selected');
            }
            this.classList.add('selected');
            availabilityForm.style.display = 'block';
            document.getElementById('selectedDateInput').value = formatDate(date);
        }
    });

    // Check if the date is unavailable and mark it accordingly
    if (unavailableDates.includes(formatDate(date))) {
        dayElement.classList.add('unavailable');
        dayElement.classList.add('disabled');
        dayElement.style.backgroundColor = '#FF0000'; // Red color
        dayElement.style.color = '#FFFFFF'; // White text
    }
    // Check if the date is today
    if (formatDate(date) === formatDate(today)) {
        dayElement.classList.remove('disabled');
    }
}

            calendarGrid.appendChild(dayElement);
        }
    }

    // Event listener for clicking the previous month button
    document.getElementById('prevMonthBtn').addEventListener('click', function () {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        renderCalendar(currentYear, currentMonth);
    });

    // Event listener for clicking the next month button
    document.getElementById('nextMonthBtn').addEventListener('click', function () {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        renderCalendar(currentYear, currentMonth);
    });

    // Function to create a day element
    function createDayElement(content, type) {
        const dayElement = document.createElement('div');
        dayElement.classList.add('calendar-day', type);
        dayElement.textContent = content;
        return dayElement;
    }

    // Function to format date as YYYY-MM-DD
    function formatDate(date) {
        const year = date.getFullYear();
        const month = (date.getMonth() + 1).toString().padStart(2, '0');
        const day = date.getDate().toString().padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    // Function to fetch unavailable dates from the database
    async function fetchUnavailableDates() {
        try {
            const response = await fetch('fetch_unavailable_dates.php?id=<?php echo $id; ?>'); // Replace 'fetch_unavailable_dates.php' with the actual endpoint
            if (!response.ok) {
                throw new Error('Failed to fetch unavailable dates');
            }
            const data = await response.json();
            return data;
        } catch (error) {
            console.error(error);
            return { unavailableDates: [] }; // Return an empty array if there's an error
        }
    }

    // Function to get the month name
    function getMonthName(month) {
        const monthNames = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];
        return monthNames[month];
    }
});
</script>

</div>
</div>
            <!-- ================ Order Details List ================= -->
     <br><br>
       <h2><b>Experience</b></h2>
       <br>
       <div class="image-grid">
      <?php 
      $email = $_SESSION['email'] ;
      $query  = mysqli_query($con, "SELECT * FROM guide WHERE email= '$email' ");
     
      $row = mysqli_fetch_array($query);
      $id = $row['id'];
      
      $sqll = "SELECT * FROM exp_images WHERE guide_id = '$id'";

   // Execute the query
   $reslt = mysqli_query($con, $sqll);

   // Check if there are any images
   if (mysqli_num_rows($reslt) > 0) {
   
       while ($ro = mysqli_fetch_assoc($reslt)) {
           // Display each image and edit butto
       echo   "<div class='image-container'>";
      echo "<img src='experience/" . $ro['file_name'] . "' alt='Experience Image'>";
      echo "<div style='margin-top: 10px;'>";
      echo "<form action='change_image.php' method='post' enctype='multipart/form-data' style='margin-top: 10px;'>";
      
      echo "<input type='hidden' name='image_id' value='" . $ro['id'] . "'>";
      echo "<input type='file' name='image' accept='image/*' style='display: block; margin-bottom: 10px;'>";
      echo "<button type='submit' class='change-button'>Change</button>";
      echo "</form>";
   echo  "</div>";
   echo  "</div>";
    
  }}
  ?>
</div>

<!--script for image edit -->
  <script>
    function editImage(imageNumber) {
        // Add your edit functionality here
        alert("Editing Image " + imageNumber);
    }
    
</script>
<br>
<br><div style="text-align: left;">
<p style="font-size:20px;"><b>Add Images:</b></p>
<form action="add_image.php" method="post" enctype="multipart/form-data">
  <input type="file" name="image[]" accept="image/*" multiple>
  <button type="submit" class="add-button">Add Images</button>
</form>
</div>
<div class="v-desc">
<h2><b>Professional Details</b></h2> <br>
<table style="width: 70%; border: 1px solid black;">

      <tr>
        <td style="padding: 10px; text-align: left; border: 1px solid black;">Qualification</td>
         <td style="padding: 10px; text-align: left; border: 1px solid black;"><?php echo $row['qualification']; ?></td>
        </tr>
        <tr>
        <td style="padding: 10px; text-align: left; border: 1px solid black;">Location</td>
        <td style="padding: 10px; text-align: left; border: 1px solid black;"><?php echo $row['location']; ?></td>
        </tr>
        <tr>
        <td style="padding: 10px; text-align: left; border: 1px solid black;">Expertise</td>
        <td style="padding: 10px; text-align: left; border: 1px solid black;"><?php echo $row['expertise']; ?></td>
        </tr>
        <tr>
        <td style="padding: 10px; text-align: left; border: 1px solid black;">Tour types</td>
        <td style="padding: 10px; text-align: left; border: 1px solid black;"><?php echo $row['tour_types']; ?></td>
        </tr>
       
        </table>
        
</div>

  
<button class="edit-v"><a href="editVeh.php">Edit Details</a></button>
<br><br>

<?
if(isset($_POST['delete'])) {
   mysqli_query($con, "UPDATE guide SET Status = '0' WHERE email = '$email'") or die(mysqli_error($con));
   session_unset();
   session_destroy();
   header("Location: ../login/login.php");
   exit;
} ?>
<p style="font-size:20px;"><b>License</b></p> 
<img src="<?php echo $row['license']; ?>" alt="pic" class="profile-picture" width="250px" height="250px">
<br><br>  

<div style="text-align: left;">
<p style="font-size:20px;"><b>Delete Account:</b></p>
<button type="submit" class="add-button" name="delete" onclick="return confirm('Are you sure you want to delete your account?')">Delete Account</button>
<br>
<br><br>
</div>
</div>

</div> <!-- ====== ionicons ======= -->
</body>

</html>
            <!-- ======================= Cards ================== -->
           