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
    <title> Admin Dashboard </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../css/Guide/admin.css">
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
    background-color:#4caf50; /* Different color when unavailable */
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
.calendar-day.disabled {
    pointer-events: none; /* Disable click events */
    opacity: 0.5; /* Optionally reduce opacity for visual indication */
    /* Add any additional styling as needed */
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

    <div id="availabilityForm" style="display: none;">
        <label for="availabilityInput">Update Availability:</label>
        <select id="availabilityInput">
            <option value="available">Available</option>
            <option value="unavailable">Unavailable</option>
        </select>
        <button id="updateAvailabilityBtn">Update</button>
    </div>
</div>
<script>
   
document.addEventListener('DOMContentLoaded', function () {
    const calendarGrid = document.getElementById('calendarGrid');
    const prevMonthBtn = document.getElementById('prevMonthBtn');
    const nextMonthBtn = document.getElementById('nextMonthBtn');
    const currentMonthElement = document.getElementById('currentMonth');
    const availabilityForm = document.getElementById('availabilityForm');
    const availabilityInput = document.getElementById('availabilityInput');
    const updateAvailabilityBtn = document.getElementById('updateAvailabilityBtn');

    const today = new Date();
    let currentMonth = today.getMonth();
    let currentYear = today.getFullYear();
    const availabilityStatus = []; 

    renderCalendar(currentYear, currentMonth);

    prevMonthBtn.addEventListener('click', function () {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        renderCalendar(currentYear, currentMonth);
    });

    nextMonthBtn.addEventListener('click', function () {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        renderCalendar(currentYear, currentMonth);
    });
    updateAvailabilityBtn.addEventListener('click', function () {
    const selectedDay = document.querySelector('.selected');
    const selectedDate = selectedDay ? selectedDay.textContent : null;

    if (selectedDate) {
        const selectedOption = availabilityInput.value;
        const dayIndex = parseInt(selectedDate, 10);

        // Update the availability status in the array
        availabilityStatus[dayIndex] = selectedOption;

        // Update the UI based on the selected availability
        if (selectedOption === 'unavailable') {
            selectedDay.classList.add('unavailable');
        } else {
            selectedDay.classList.remove('unavailable');
        }

        alert(`Updating availability for ${selectedDate} to ${selectedOption}`);
    } else {
        alert('Please select a day before updating availability.');
    }
});

    function renderCalendar(year, month) {
        calendarGrid.innerHTML = '';
        const firstDay = new Date(year, month, 1);
        const lastDay = new Date(year, month + 1, 0);
        const daysInMonth = lastDay.getDate();

        currentMonthElement.textContent = `${getMonthName(month)} ${year}`;

        const dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

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

        // Set the default availability for each day to 'available'
        availabilityStatus[day] = 'available';

        if (date.toDateString() === today.toDateString()) {
            dayElement.classList.add('today');
        }

        // Disable click event for days before today
        if (date < today) {
            dayElement.classList.add('disabled');
        } else {
            dayElement.addEventListener('click', function () {
                const selectedDay = document.querySelector('.selected');
                if (selectedDay) {
                    selectedDay.classList.remove('selected');
                }
                this.classList.add('selected');
                availabilityForm.style.display = 'block';
            });
        }

        calendarGrid.appendChild(dayElement);
    }

    }

    function createDayElement(content, type) {
        const dayElement = document.createElement('div');
        dayElement.classList.add('calendar-day', type);
        dayElement.textContent = content;

        return dayElement;
    }

    function getMonthName(month) {
        const monthNames = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];
        return monthNames[month];
    }
});

</script>
           

                <!-- ================= New Customers ================ -->
   
            </div>
        </div>
    </div>



    <!-- ====== ionicons ======= -->
</body>

</html>