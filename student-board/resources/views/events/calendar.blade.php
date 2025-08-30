@extends('layouts.app')

@section('title', 'Event Calendar')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6 text-center">📅 Event Calendar</h1>

    <div id="calendar" class="bg-white shadow-lg rounded-lg p-4"></div>
</div>

{{-- FullCalendar CDN --}}
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    let calendarEl = document.getElementById('calendar');

    let calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        events: '{{ route("events.feed") }}', // JSON feed
        eventClick: function(info) {
            alert("Event: " + info.event.title + "\nStarts: " + info.event.start);
        }
    });

    calendar.render();
});
</script>
@endsection
