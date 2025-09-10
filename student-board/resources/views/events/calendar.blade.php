@extends('layouts.app')

@section('title', 'Event Calendar')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl md:text-3xl font-bold mb-6 text-center">📅 Event Calendar</h1>

    <!-- 📌 Upcoming Events (Mobile Only) -->
    <div id="upcoming-events" class="sm:hidden mb-6 bg-white shadow-md rounded-lg p-4">
        <h2 class="text-lg font-semibold mb-3">📌 Upcoming Events</h2>
        <ul id="upcoming-list" class="space-y-2 text-sm text-gray-700">
            <li class="text-gray-500 italic">Loading events...</li>
        </ul>
    </div>

    <!-- 📅 Full Calendar -->
    <div id="calendar" class="bg-white shadow-lg rounded-lg p-4"></div>
</div>

{{-- FullCalendar CDN --}}
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

<style>
    /* ✅ Make the calendar scroll horizontally on mobile */
    #calendar {
        max-width: 100%;
        overflow-x: auto;
    }

    /* ✅ Adjust header for small screens */
    @media (max-width: 640px) {
        .fc .fc-toolbar.fc-header-toolbar {
            flex-direction: column;
            gap: 8px;
        }
        .fc-toolbar-chunk {
            text-align: center;
        }
        .fc-event {
            font-size: 0.75rem;
            padding: 2px 4px;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    let calendarEl = document.getElementById('calendar');
    let upcomingList = document.getElementById('upcoming-list');

    let calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: window.innerWidth < 640 ? 'listWeek' : 'dayGridMonth',
        timeZone: 'local',
        locale: 'en-gb',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: window.innerWidth < 640 ? '' : 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        events: "{{ secure_url('/events/feed') }}",

        eventDidMount: function(info) {
            console.log("Loaded event:", info.event.title, info.event.startStr);
        },

        eventClick: function(info) {
            alert("📌 Event: " + info.event.title + "\n🕒 Starts: " + info.event.start.toLocaleString());
        },

        eventsSet: function(events) {
            // ✅ Populate upcoming events for mobile list
            if (upcomingList) {
                upcomingList.innerHTML = ""; // clear existing
                let upcoming = events
                    .filter(e => new Date(e.start) >= new Date())
                    .sort((a, b) => new Date(a.start) - new Date(b.start))
                    .slice(0, 5); // first 5 events

                if (upcoming.length === 0) {
                    upcomingList.innerHTML = `<li class="text-gray-500 italic">No upcoming events</li>`;
                } else {
                    upcoming.forEach(event => {
                        let li = document.createElement("li");
                        li.innerHTML = `
                            <span class="font-semibold text-orange-600">${event.title}</span>
                            <br>
                            <span class="text-xs text-gray-500">${new Date(event.start).toLocaleString()}</span>
                        `;
                        upcomingList.appendChild(li);
                    });
                }
            }
        }
    });

    calendar.render();

    // ✅ Switch automatically on resize
    window.addEventListener('resize', function () {
        if (window.innerWidth < 640 && calendar.view.type !== 'listWeek') {
            calendar.changeView('listWeek');
        } else if (window.innerWidth >= 640 && calendar.view.type === 'listWeek') {
            calendar.changeView('dayGridMonth');
        }
    });
});
</script>
@endsection
