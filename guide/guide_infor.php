<?php  
require 'config.php'; 
?>


<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Guide </title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>   

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/Driver/trending_sites.css">
    <link rel="stylesheet" href="../comment/comment.css">
   <style>
    body{
        font-family: 'Trebuchet MS', sans-serif;
    }
    .driver .d p{
        font-size: 40px;
        margin-left: 30px;
        color: #1a360e;
    }
    .d-img img{
            margin-left:150px;
            margin-top:20px;
            width: 600px;
            height: 400px;
            border-radius: 5px;
           
            box-shadow: 2px 2px 20px #052b1b;
        }
   .des{
    margin-top: 20px;
    margin-left: 100px;
   }
   
   .experience-grid {
    margin-left: 50px;
    display: flex;
    overflow-x: auto; /* Enable horizontal scrolling */
    overflow-y: hidden; /* Hide vertical scrollbar */
    white-space: nowrap; /* Prevent images from wrapping */
}

.experience-item {

    flex: 0 0 auto; /* Don't grow or shrink */
    margin-right: 10px; /* Adjust margin between images */
    display: inline-block; /* Display items in a row */
}

.experience-item img {
    max-width: 400px; /* Set maximum width for images */
    height: auto; /* Maintain aspect ratio */
    border: 2px solid #222; /* Add border with a color */
    border-radius: 5px; /* Add rounded corners */
    padding: 5px; /* Add padding to the border */
}

.button {
  background-color: black;
  border: none;
  color: white;
  padding: 15px 90px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  margin-left: 400px;
  border-radius: 7px;
}
table {
  border-collapse: collapse;
  width: 30%;
  margin-left: 800px;
}
th{
    text-align: right; 
    background-color: #022d0b; 
    padding: 10px;
    color: white;
}
td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid black;
}

        .calendar {
            background-color: #fff;
            box-shadow: 2px 2px 20px #052b1b;
            border-radius: 8px;
            overflow: hidden;
            max-width: 380px;
            width: 100%;
            margin-top: 30px;
            flex: 0 1 calc(50% - 20px);
    margin-left: 5px; /* Adjust as needed */
    margin-right: 40px;
    margin-bottom: 40px;
        }
        .calendar-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #0d5c3b;
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
          background-color: #ff0000; /* Red color for unavailable dates */
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
        .disabled {
            background-color: #f0f0f0;
            color: #bbb;
            cursor: not-allowed;
        }
        .driver-info {
            flex: 0 1 calc(50% - 20px);
            max-width: calc(50% - 20px);
        }
        .driver-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .past {
    color: #bbb; /* Light color for past dates */
} 
.do {
    display: flex;
    justify-content: space-between;
    margin: 0 auto;
    background-color: #02130c;
    height: 450px
}
.de{
    margin-top: 20px;
  
}

   </style>
</head>

<body>
 <!------sites----
 <div id="sidebar">
 
            include("sidebar_d.php");
           
        </div> -->

<!-- ========================= Main ==================== -->
<?php 
require 'config.php';
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve driver details from the database
    $sql = "SELECT * FROM guide WHERE id = '$id'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
   
    $languageArray = unserialize($row['language']);
       if (is_array($languageArray)) {
        // Implode the language array
        $languages = implode(", ", $languageArray);
        
        // Output other details and H
        // Output other HTML elements as needed
  
       }else{}

       echo '<div class="topbar">';
       echo  '<div class="toggle">';
       echo  '<ion-icon name="menu-outline"></ion-icon>';
       echo   '</div>';
   
       echo  '<div class="search">';
       echo  '<label>';
       echo   '<input type="text" id="searchInput"  placeholder="Search here">';    
       echo   '<ion-icon name="search-outline"></ion-icon>';
       echo '</label>';
       echo '</div>';
       echo '</div>';                            
   
       echo  '<div class="driver">';
       echo  '<div class="d">';
       echo   '<br>';
       echo '<div style="background-color: white; display: inline-block; padding: 10px;width: 100%"><p><b>Explore with  '. $row['firstname'] .':</b></p></div>';
       echo '</div>';
       echo '<div class="do">';
       echo '<div class="d-img">';
       echo   '<img src="' . $row['picture'] . '" alt="pic">';
       echo '</div>';
      
       echo '<div class="calendar">';
       echo '<div class="calendar-header">';
       echo '<button id="prevMonthBtn">&lt;</button>';
       echo '<h2 id="currentMonth">Month Year</h2>';
       echo '<button id="nextMonthBtn">&gt;</button>';
      echo '</div>';
      echo '<div class="calendar-grid" id="calendarGrid"></div>';
      echo '</div>';
   echo '</div>';
   echo '</div>';
   echo '</div>';
   echo  '</div>';
       echo    '<div class="des">';
       echo '<h1>Hello I am '. $row['firstname'] .', Travel with me!</h1>';
       echo '<br><p>I speak:  ' . $languages . ' </p>';
       echo '<br><p>'. $row['qualification'] .'</p>';
       echo '<table>';
       echo '<tr>';
       echo '<th>Book Guide</th>';
       echo '<th>Amount</th>';
       echo '</tr>';
       if ($row['hourly'] != 0) {
           echo '<tr>';
           echo '<td>Half Day</td>';
           echo '<td>LKR '. ($row['hourly'] + ($row['hourly'] * 0.2)) .'</td>';
           echo '</tr>';
       }
       if ($row['half_day'] != 0) {
           echo '<tr>';
           echo '<td>Half Day</td>';
           echo '<td>LKR '. ($row['half_day'] + ($row['half_day'] * 0.2)) .'</td>';
           echo '</tr>';
       }
       
       if ($row['full_day'] != 0) {
           echo '<tr>';
           echo '<td>Full Day</td>';
           echo '<td>LKR '. ($row['full_day'] + ($row['full_day'] * 0.2)) .'</td>';
           echo '</tr>';
       }
       
       echo '</table>';
      
   
       echo '<br>';
       echo '<a href="first_step.php?id='.$row['id'].'" class="button">Book</a> <br> <br>';
       echo  '</div>';
       echo    '<div class="des">';
       echo '<br>';
       echo '<h2>Experience</h2><br>';
       echo '<p>';
       echo ''. $row['experience'] .'<br><br><br>';
       echo  '</div>';
       echo    '<div class="de">';
       echo '<table style="width: 70%; border: 1px solid black;margin: 0 auto;">';
       echo '<tr>';
       echo '<td style="padding: 10px; text-align: left; border: 1px solid black;">Qualification</td>';
       echo '<td style="padding: 10px; text-align: left; border: 1px solid black;">' . $row['qualification'] . '</td>';
       echo '</tr>';
       echo '<tr>';
       echo '<td style="padding: 10px; text-align: left; border: 1px solid black;">Location</td>';
       echo '<td style="padding: 10px; text-align: left; border: 1px solid black;">' . $row['location'] . '</td>';
       echo '</tr>';
       echo '<tr>';
       echo '<td style="padding: 10px; text-align: left; border: 1px solid black;">Expertise</td>';
       echo '<td style="padding: 10px; text-align: left; border: 1px solid black;">' . $row['expertise'] . '</td>';
       echo '</tr>';
       echo '<tr>';
       echo '<td style="padding: 10px; text-align: left; border: 1px solid black;">Tour types</td>';
       echo '<td style="padding: 10px; text-align: left; border: 1px solid black;">' . $row['tour_types'] . '</td>';
       echo '</tr>';
       echo '</table>';
       echo '<br>';
       echo '<br>';
       echo '<br>';
      echo '</div>';
      
      echo '</div>';
      echo  '</div>';
     
     
      $sqll = "SELECT * FROM exp_images WHERE guide_id = $id";
   
      // Execute the query
      $reslt = mysqli_query($con, $sqll);
   
      // Check if there are any images
      if (mysqli_num_rows($reslt) > 0) {
          // Loop through each row to fetch images
          echo '<div class="experience-grid">';
          while ($ro = mysqli_fetch_assoc($reslt)) {
              // Display each image and edit button
              
              echo "<div class='experience-item'>";
              echo "<img src='experience/" . $ro['file_name'] . "' alt='Experience'>";
              echo "</div>";
           
          }    echo "</div>";
      } else {
          // If no images found, display a message
          echo "<div>No images found for this user.</div>";
      }
             
      echo '</div>';
      echo "<br>";
      echo "<br>";
      echo '<div style="background-color: white; display: inline-block; padding: 6px;width: 100%"><h2>Reviews</h2></div>';
      echo    '<div class="des">';
      
      
      $sql = "SELECT * FROM booking_guide WHERE guide_id='$id'";
      $result = $con->query($sql);
   
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
           if (!empty($row['review'])) {
              echo "<p style='font-size:17px;'>" . $row['name'] . "</p>";
              echo "<p style='font-size:15px;'>" . $row['review'] . "</p>";
              echo "<p style='font-size:13px;'>" . $row['review_timestamp'] . "</p>";
              echo "<br>";
          }
       }
      } else {
          echo "<p style='font-size:15px;'>No reviews yet.</p>";
      }
      echo '</div>';
      echo '<br>';
      echo '<br>';
               
      echo '</div>';
     echo '<br>';
     echo '<br>';
      echo '<div>';
      include '../comment/comment.php';
      echo '</div>';
     }
   }else {
           echo "Guide not found.";
       }
   
       ?>    
       
    
<script>
document.addEventListener('DOMContentLoaded', function () {
    const calendarGrid = document.getElementById('calendarGrid');
    const currentMonthElement = document.getElementById('currentMonth');
    const today = new Date();
    let currentYear = today.getFullYear();
    let currentMonth = today.getMonth();
    let unavailableDates = []; // Store unavailable dates globally

    // Fetch unavailable dates from the database
    fetchUnavailableDates().then(data => {
        unavailableDates = data.unavailableDates; // Store fetched unavailable dates globally
        renderCalendar(currentYear, currentMonth);
    });

    // Function to render the calendar for a specific year and month
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

        // Check if the date is today
        const isToday = date.getDate() === today.getDate() && date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear();

        // Check if the date is past
        const isPast = date < today;

        // Check if the date is unavailable and mark it accordingly
        if (unavailableDates.includes(formatDate(date))) {
            dayElement.classList.add('unavailable');
            dayElement.classList.add('disabled');
            if (isToday) {
                dayElement.classList.remove('available');
            }
        } else if (isToday && !unavailableDates.includes(formatDate(date))) {
            dayElement.classList.add('available');
        }

        // Mark past dates' numbers as light color
        if (isPast) {
            dayElement.classList.add('past');
        }

        // Attach click event listener only for future dates
        if (!isPast && !isToday) {
            dayElement.addEventListener('click', function () {
                if (!dayElement.classList.contains('unavailable')) {
                    const selectedDay = document.querySelector('.selected');
                    if (selectedDay) {
                        selectedDay.classList.remove('selected');
                    }
                    this.classList.add('selected');
                    document.getElementById('selectedDateInput').value = formatDate(date);
                }
            });
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
            const response = await fetch('fetch_unavailable_dates.php?id=<?php echo $id; ?>'); // Include the driver id in the URL
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


</body>
</html>   