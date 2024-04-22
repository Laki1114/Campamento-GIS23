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
    <title> Dashboard </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../css/Driver/admin.css">
    <style>

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
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="images/customer01.jpg" alt="">
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">30</div>
                        <div class="cardName">Total No. of Trips</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">25</div>
                        <div class="cardName">Completed Trips</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">5</div>
                        <div class="cardName">Cancelled Trips</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">⭐4.5</div>
                        <div class="cardName">Overall Rating</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
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
            if (date < today) {
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
            const response = await fetch('fetch_unavailable_dates.php'); // Replace 'fetch_unavailable_dates.php' with the actual endpoint
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



</script>
           

                <!-- ================= New Customers ================ -->
   
            </div>
        </div>
    </div>



    <!-- ====== ionicons ======= -->
</body>

</html>