(function ($) {
    "use strict";


    /****************************** App Calendar ****************************/
// Sidebar calendar
    $('#calendar-month').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true,
        beforeShowDay: function (date) {

            // add leading zero to single digit date
            var day = date.getDate();
            console.log(day);
            return [true, (day < 10 ? 'zero' : '')];
        }
    });




    var calendarEl = document.getElementById('calendar');
    if (calendarEl) {
        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
            height: 'parent',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            defaultView: 'dayGridMonth',
            defaultDate: '2019-08-12',
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
                {
                    title: 'All Day Event',
                    start: '2019-08-01',
                    color: '#6c757d'
                },
                {
                    title: 'Long Event',
                    start: '2019-08-07',
                    end: '2019-08-10',
                    color: '#28a745'
                },
                {
                    groupId: 999,
                    title: 'Repeating Event',
                    start: '2019-08-09T16:00:00',
                    color: '#dc3545'
                },
                {
                    groupId: 999,
                    title: 'Repeating Event',
                    start: '2019-08-16T16:00:00',
                    color: '#ffc107'
                },
                {
                    title: 'Conference',
                    start: '2019-08-11',
                    end: '2019-08-13',
                    color: '#17a2b8'
                },
                {
                    title: 'Meeting',
                    start: '2019-08-12T10:30:00',
                    end: '2019-08-12T12:30:00'
                },
                {
                    title: 'Lunch',
                    start: '2019-08-12T12:00:00'
                },
                {
                    title: 'Meeting',
                    start: '2019-08-12T14:30:00'
                },
                {
                    title: 'Happy Hour',
                    start: '2019-08-12T17:30:00'
                },
                {
                    title: 'Dinner',
                    start: '2019-08-12T20:00:00'
                },
                {
                    title: 'Birthday Party',
                    start: '2019-08-13T07:00:00'
                },
                {
                    title: 'Click for Google',
                    url: 'http://google.com/',
                    start: '2019-08-28'
                }
            ]
        });

        calendar.render();
    }
})(jQuery);
