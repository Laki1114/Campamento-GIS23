<?php
// Include the database connection or any necessary configuration file
include 'config.php';
if (!isset($_SESSION['customer'])) {
    // If user is not logged in, return an error message
    $response = array('status' => 'error', 'message' => 'User is not logged in.');
    echo json_encode($response);
    exit(); // Stop script execution
} 

// Store form data in cookies
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['form'] == 'form1') {

        $driver_id = $_GET['id'];
        function generateReferenceNumber() {
            return 'DR' . time() . rand(100, 99);
        }
   
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['contact'] = $_POST['contact'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['pickup'] = $_POST['pickup'];
    $_SESSION['dropoff'] = $_POST['dropoff'];
    $_SESSION['time'] = $_POST['time'];
    $_SESSION['adult'] = $_POST['adult'];
    $_SESSION['children'] = $_POST['children'];
    $_SESSION['specificInterests'] = $_POST['specificInterests'];
    $_SESSION['referenceNumber'] = $_POST['referenceNumber'];

    // Connect to your databas

    $em = $_SESSION['email'];
    $sql = "SELECT UserId FROM user WHERE Email = '$em'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row['UserId'];
        $_SESSION['user_id'] = $user_id;
    } 

    $_SESSION['referenceNumber'] = generateReferenceNumber();
    
   
    }    header('Location: third_step.php');
    exit();
}
?>



 <!DOCTYPE html>
<html>

<head>
    <title>Booking Form</title>
    <link rel="stylesheet" type="text/css" href="glm_css_files/book.css" />
    <link rel="stylesheet" type="text/css" href="glm_css_files/form_deatails.css" />
    <link rel="stylesheet" type="text/css" href="glm_css_files/wizard.css" />
    <style>
        input[type="radio"],
        label {
            vertical-align: middle;
        }

        .rad {
            display: inline-flex;
            align-items: center;
            margin-bottom: 10px;
        }

        input[type="time"] {
            box-sizing: border-box;
            width: 100px;
            height: initial;
            padding: 8px 5px;
            border: 1px solid #9a9a9a;
            border-radius: 4px;
        }

        #afternoonTime {
            display: none;
        }

        #checkInOutHalfDay,
        #checkInOutFullDay {
            display: none;
        }
        .calendar {
        max-width: 400px;
        margin: 0 auto;
    }

    .calendar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .calendar-header button {
        background-color: transparent;
        border: none;
        cursor: pointer;
        font-size: 1.5em;
    }

    .calendar-header button:hover {
        color: #007bff;
    }

    .calendar-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 5px;
    }

    .calendar-day {
        text-align: center;
        padding: 10px;
        border: 1px solid #ccc;
        cursor: pointer;
    }

    .day-name {
        font-weight: bold;
        text-transform: uppercase;
    }

    .empty {
        visibility: hidden;
    }

    .normal:hover {
        background-color: #f0f0f0;
    }

    .unavailable {
        pointer-events: none;
        background-color: #f72b2b !important;
        color: #000000;
    }

 
    .selected {
        background-color: #007bff;
        color: #fff;
    }

    #availabilityForm {
        margin-top: 20px;
    }

    #availabilityForm label {
        display: block;
        margin-bottom: 5px;
    }

    #availabilityForm select {
        width: 100%;
        padding: 5px;
        margin-bottom: 10px;
    }

    #updateAvailabilityBtn {
        padding: 5px 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        cursor: pointer;
    } .calendar {
        font-family: Arial, sans-serif;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0px 0px 5px 0px #ccc;
        width: 340px;
        background-color: #3b673b;
        z-index: 9999;
        position: absolute;
    }

    .calendar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 5px 10px;
        background-color: #89b882;
    }

    .calendar-header button {
        background: none;
        border: none;
        cursor: pointer;
        outline: none;
        font-size: 18px;
        padding: 0;
        margin: 0;
    }

    .calendar-header h2 {
        margin: 0;
    }

    .calendar-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 1px;
        border-top: 1px solid #ccc;
        border-left: 1px solid #ccc;
    }

    .calendar-day {
        padding: 5px;
        text-align: center;
        cursor: pointer;
        border-bottom: 1px solid #ccc;
        border-right: 1px solid #ccc;
    }

    .calendar-day:hover {
        background-color: #f3f3f3;
    }
    .disabled {
        color: #ccc;
    }
    .calendar-day.disabled {
        color: #ccc;
    }

    .calendar-day.past-date {
        color: #888 !important;
        pointer-events: none;
    }

    .calendar-day.unavailable {
        background-color: #f72b2b !important;
        color: #000000;
    }
    #calendarIcon {
    font-size: 10px;
}
    </style>
    <!-- Add jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="phppot-container">
        <h1>Make Your Reservation !</h1>

        <form method="POST" id="checkout-form" onSubmit="return validateCheckout()">
            <div class="wizard-flow-chart">
                <span class="fill">1</span>
                <span class="fill">2</span>
                <span>3</span>
                <span>4</span>
            </div>
            <?php if (isset($message)) { ?>
            <div class="message <?php echo $type; ?>"><?php echo $message; ?></div>
            <?php } ?>
            <!-- Wizard section 1 -->
            <section id="billing-section" style="display: none;">
            <h3>Check Availability</h3>
<div class="row" class="display-none">
    <label class="float-left label-width">Check-In</label>
    <div class="input-container" id="calendarInputContainerCheckIn">
        <input type="text" id="input-group-checkin" placeholder=" Check-In">
        <button type="button" id="calendarIconCheckIn">&#128197;</button>
        <div class="calendar" id="calendarCheckIn" style="display: none;">
            <div class="calendar-header">
                <button id="prevMonthBtnCheckIn">&lt;</button>
                <h2 id="currentMonthCheckIn">Month Year</h2>
                <button id="nextMonthBtnCheckIn">&gt;</button>
            </div>
            <div class="calendar-grid" id="calendarGridCheckIn"></div>
        </div>
    </div>
</div>
<div class="row">
    <label class="float-left label-width">Check-Out</label>
    <div class="input-container" id="calendarInputContainerCheckOut">
        <input type="text" id="input-group-checkout" placeholder=" Check-Out">
        <button type="button" id="calendarIconCheckOut">&#128197;</button>
        <div class="calendar" id="calendarCheckOut" style="display: none;">
            <div class="calendar-header">
                <button id="prevMonthBtnCheckOut">&lt;</button>
                <h2 id="currentMonthCheckOut">Month Year</h2>
                <button id="nextMonthBtnCheckOut">&gt;</button>
            </div>
            <div class="calendar-grid" id="calendarGridCheckOut"></div>
        </div>
    </div>
</div>
<div class="row button-row">
    <button type="button" onClick="validate(this)">Check Availability</button>
</div>
<?php
 $driver_id = $_GET['id']; ?>
<script>
    
    document.addEventListener('DOMContentLoaded', function () {
        const calendarIconCheckIn = document.getElementById('calendarIconCheckIn');
        const calendarIconCheckOut = document.getElementById('calendarIconCheckOut');
        const calendarCheckIn = document.getElementById('calendarCheckIn');
        const calendarCheckOut = document.getElementById('calendarCheckOut');
        const inputGroupCheckIn = document.getElementById('input-group-checkin');
        const inputGroupCheckOut = document.getElementById('input-group-checkout');
        const currentMonthElementCheckIn = document.getElementById('currentMonthCheckIn');
        const currentMonthElementCheckOut = document.getElementById('currentMonthCheckOut');
        const bookingForm = document.getElementById('shipping-section'); // Corrected ID
        const today = new Date();
        let currentYearCheckIn = today.getFullYear();
        let currentMonthCheckIn = today.getMonth();
        let currentYearCheckOut = today.getFullYear();
        let currentMonthCheckOut = today.getMonth();
        let unavailableDates = []; // Store unavailable dates globally

        // Fetch unavailable dates from the database
        fetchUnavailableDates().then(data => {
            unavailableDates = data.unavailableDates; // Store fetched unavailable dates globally
            renderCalendar(currentYearCheckIn, currentMonthCheckIn, 'CheckIn');
            renderCalendar(currentYearCheckOut, currentMonthCheckOut, 'CheckOut');
        });

        // Function to render the calendar for a specific year and month
       // Fetch unavailable dates from the database
fetchUnavailableDates().then(data => {
    unavailableDates = data.unavailableDates; // Store fetched unavailable dates globally
    renderCalendar(currentYearCheckIn, currentMonthCheckIn, 'CheckIn');
    renderCalendar(currentYearCheckOut, currentMonthCheckOut, 'CheckOut', inputGroupCheckIn.value);
});

// Function to render the calendar for a specific year and month
// Function to render the calendar for a specific year and month
function renderCalendar(year, month, type, checkInDate) {
    const calendarGridId = type === 'CheckIn' ? 'calendarGridCheckIn' : 'calendarGridCheckOut';
    const currentMonthElement = type === 'CheckIn' ? currentMonthElementCheckIn : currentMonthElementCheckOut;
    const calendarGrid = document.getElementById(calendarGridId);
    calendarGrid.innerHTML = '';
    const firstDay = new Date(year, month, 1);
    const lastDay = new Date(year, month + 1, 0);
    const daysInMonth = lastDay.getDate();
    const today = new Date(); // Current date

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
        if (date < today && !isSameDay(date, today)){
            dayElement.classList.add('disabled');
            dayElement.classList.add('past-date'); // Add past-date class
        } else {
            // Check if the date is unavailable and mark it accordingly
            if (unavailableDates.includes(formatDate(date))) {
                dayElement.classList.add('unavailable');
                dayElement.classList.add('disabled');
                dayElement.style.backgroundColor = '#FF0000'; // Red color
                dayElement.style.color = '#FFFFFF'; // White text
            } else {
                // Attach click event listener only for future dates
                if (type === 'CheckOut' && checkInDate) {
                    if (date < new Date(checkInDate)) {
                        dayElement.classList.add('disabled');
                        dayElement.classList.add('past-date'); 
                    }
                }
                dayElement.addEventListener('click', function () {
                    if (type === 'CheckIn') {
                        inputGroupCheckIn.value = formatDate(date);
                        calendarCheckIn.style.display = 'none';
                        renderCalendar(currentYearCheckOut, currentMonthCheckOut, 'CheckOut', date); // Update check-out calendar
                    } else {
                        inputGroupCheckOut.value = formatDate(date);
                        calendarCheckOut.style.display = 'none';
                    }
                });
            }
        }

        calendarGrid.appendChild(dayElement);
    }
}

        function isSameDay(date1, date2) {
            return date1.getFullYear() === date2.getFullYear() &&
                date1.getMonth() === date2.getMonth() &&
                date1.getDate() === date2.getDate();
        }

        // Event listener for clicking the previous month button for Check-In
        document.getElementById('prevMonthBtnCheckIn').addEventListener('click', function () {
            currentMonthCheckIn--;
            if (currentMonthCheckIn < 0) {
                currentMonthCheckIn = 11;
                currentYearCheckIn--;
            }
            renderCalendar(currentYearCheckIn, currentMonthCheckIn, 'CheckIn');
        });

        // Event listener for clicking the next month button for Check-In
        document.getElementById('nextMonthBtnCheckIn').addEventListener('click', function () {
            currentMonthCheckIn++;
            if (currentMonthCheckIn > 11) {
                currentMonthCheckIn = 0;
                currentYearCheckIn++;
            }
            renderCalendar(currentYearCheckIn, currentMonthCheckIn, 'CheckIn');
        });

        // Event listener for clicking the previous month button for Check-Out
        document.getElementById('prevMonthBtnCheckOut').addEventListener('click', function () {
            currentMonthCheckOut--;
            if (currentMonthCheckOut < 0) {
                currentMonthCheckOut = 11;
                currentYearCheckOut--;
            }
            renderCalendar(currentYearCheckOut, currentMonthCheckOut, 'CheckOut');
        });

        // Event listener for clicking the next month button for Check-Out
        document.getElementById('nextMonthBtnCheckOut').addEventListener('click', function () {
            currentMonthCheckOut++;
            if (currentMonthCheckOut > 11) {
                currentMonthCheckOut = 0;
                currentYearCheckOut++;
            }
            renderCalendar(currentYearCheckOut, currentMonthCheckOut, 'CheckOut');
        });

        // Event listener for clicking the calendar icon for Check-In
        calendarIconCheckIn.addEventListener('click', function () {
            const rect = inputGroupCheckIn.getBoundingClientRect();
            calendarCheckIn.style.top = rect.bottom + 'px';
            calendarCheckIn.style.left = rect.left + 'px';
            calendarCheckIn.style.display = 'block';
        });

        // Event listener for clicking on the input field for Check-In
        inputGroupCheckIn.addEventListener('click', function () {
            const rect = inputGroupCheckIn.getBoundingClientRect();
            calendarCheckIn.style.top = rect.bottom + 'px';
            calendarCheckIn.style.left = rect.left + 'px';
            calendarCheckIn.style.display = 'block';
        });

        // Event listener for clicking the calendar icon for Check-Out
        calendarIconCheckOut.addEventListener('click', function () {
            const rect = inputGroupCheckOut.getBoundingClientRect();
            calendarCheckOut.style.top = rect.bottom + 'px';
            calendarCheckOut.style.left = rect.left + 'px';
            calendarCheckOut.style.display = 'block';
        });

        // Event listener for clicking on the input field for Check-Out
        inputGroupCheckOut.addEventListener('click', function () {
            const rect = inputGroupCheckOut.getBoundingClientRect();
            calendarCheckOut.style.top = rect.bottom + 'px';
            calendarCheckOut.style.left = rect.left + 'px';
            calendarCheckOut.style.display = 'block';
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
                const response = await fetch('fetch_unavailable_dates.php?id=<?php echo $driver_id; ?>'); // Replace 'fetch_unavailable_dates.php' with the actual endpoint
                if (!response.ok) {
                    throw new Error('Failed to fetch unavailable dates');
                }
                const data = await response.json();
                return data;
            } catch (error) {
                console.error(error);
            }
        }

        // Function to get month name from month number
        function getMonthName(month) {
            const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            return monthNames[month];
        }
    });
</script>

            </section>

            <!-- Wizard section 2 -->
            <section id="shipping-section">
                <div id="detailpage">
                <?php
    $em = $_SESSION['customer'];
    $sql = "SELECT FirstName, PhoneNo, Email FROM user WHERE Email = '$em'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); 
    
?>
                    <form method="post" action="" enctype="multipart/form-data" class="container" id="booking-form">
                        <table>
                            <tr>
                                <td width="700px">
                                    <div class="container-left">
                                        <h2> Booking Details</h2><br><br><br>
                                        <input type="hidden" name="form" value="form1">
    
    <label for="name"><b>Name </b></label>
    <input type="text"  value="<?php echo $row['FirstName']?>" name="name" id="name" required><br><br>

    <label for="contact"><b>Contact </b></label>
    <input type="text"  name="contact" value="<?php echo $row['PhoneNo']?>" id="contact" pattern="\d{10}" title="Contact number must be 10 digits" required><br><br>

    <label for="email"><b>Email</b></label>
    <input type="email" name="email" value="<?php echo $row['Email']?>" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Invalid email" required><br><br>
 

    <label for="pickup"><b>Pick Up Location</b></label>
    <input type="text" placeholder="pickup" name="pickup" id="pickup" ><br><br>

    <label for="dropoff"><b>Drop Off Location</b></label>
    <input type="text" placeholder="dropoff" name="dropoff" id="dropoff" ><br><br>

    <label for="time"><b>Time </b></label><br>
      <input type="time" placeholder="Time" name="time" required><br><br>

    <label for="adult"><b>Number of Adults(13+)</b></label>
    <input type="text" placeholder="Adult" name="adult" id="adult" ><br><br>

    <label for="children"><b>Number of children(6 to 12)</b></label>
    <input type="text" placeholder="Children" name="children" id="children" ><br><br>

    <label for="specificInterests"><b>Additional information(if any):</b></label>
    <textarea id="specificInterests" name="specificInterests" rows="4"></textarea><br><br>

<?php } ?>
</div>
                                </td>
                            </tr>
                        </table>
                    </form> 
                   
                    <div class="row button-row">
                        <button type="button" onClick="showPrevious(this)">Previous</button>
                        <button type="submit" onclick="validateAndNext()">Next</button>
                    </div>
                </div>
  
                <script>
    function validateAndNext() {
        // Perform form validation
        if (validateForm()) {
            // Store form data in cookies
            var formData = new FormData(); // Create a new FormData object
            var form = document.getElementById('booking-form'); // Get the form element

            // Iterate through the form elements and append them to the FormData object
            for (var i = 0; i < form.elements.length; i++) {
                var field = form.elements[i];
                if (field.type !== 'button' && field.type !== 'submit') {
                    formData.append(field.name, field.value);
                }
            }

            // Convert the FormData object to a URL-encoded string
            var encodedFormData = new URLSearchParams(formData).toString();

            // Store the encoded form data in cookies
            document.cookie = encodedFormData + ";path=/";

            // Move to the next section
            nextSection('shipping-section', 'discount-section');
        }
    }

    function nextSection(currentSectionId, nextSectionId) {
        // Hide current section
        document.getElementById(currentSectionId).classList.add('display-none');

        // Show next section
        document.getElementById(nextSectionId).classList.remove('display-none');
    }

    function validateForm() {
        // Get form input values
        var email = document.getElementById('email').value;
        var contact = document.getElementById('contact').value;

        // Validate email format
        var emailFormat = /\S+@\S+\.\S+/;
        if (!emailFormat.test(email)) {
            alert('Please enter a valid email address.');
            return false;
        }

        // Validate contact number
        var contactFormat = /^\d{10}$/;
        if (!contactFormat.test(contact)) {
            alert('Contact number must be 10 digits.');
            return false;
        }

        // Form is valid
        return true;
    }
</script>

            </section>

            <!-- Wizard section 3 -->
            <section id="discoun-section" class="display-none">
                <h3>Summary of Booking:</h3>
                <div id="confirmpage">
                    <?php include("third_step.php"); ?>
                </div>
                <button type="button" onClick="prevSection('discoun-section','shipping-section')">Previous</button>
                <div class="row button-row">
               
                    <button type="button" onClick="validate(this)">Confirm</button>
                </div>
                <script>
  function prevSection(currentSectionId, prevSectionId) {
   // Prevent default form submission behavior
    
    // Hide current section
    document.getElementById(currentSectionId).classList.add('display-none');
    
    // Show next section
    document.getElementById(prevSectionId).classList.remove('display-none');
    $(".wizard-flow-chart span.fill").next("span").addClass("fill");
     // Add this line to prevent form submission and page reload
}

</script>
            </section>

            <!-- Wizard section 5 -->
            <section id="discount-section" class="display-none">
                <h3>Payment</h3>
                <div id="confirmpage">
                    <?php include("payment.php"); ?>
                </div>

                <div class="row button-row">
                
                    <button type="button" onClick="validate(this)">Pay</button>
                </div>
            </section>

        </form>
    </div>

    <script src="glm_js_files/wizard.js"></script>



</body>

</html>
