document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: [
            {
                title: 'Event 1',
                start: '2022-04-13'
            },
            {
                title: 'Event 2',
                start: '2022-04-15'
            }
            // Add more events as needed
        ]
    });

    calendar.render();
});