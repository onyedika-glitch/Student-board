@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
    <!-- Announcements Preview -->
    <div class="card bg-red rounded shadow p-4">
        <h2 class="font-semibold text-lg mb-3">📢 Latest Announcements</h2>
        @foreach($announcements->take(3) as $announcement)
            <div class="mb-2">
                <a href="{{ route('announcements.show', $announcement) }}" class="text-blue-600 hover:underline">
                    {{ $announcement->title }}
                </a>
                <p class="text-sm text-gray-500">{{ $announcement->created_at->diffForHumans() }}</p>
            </div>
        @endforeach
        <a href="{{ route('announcements.index') }}" class="text-sm text-blue-600 hover:underline">View all →</a>
    </div>

    <!-- Events Preview -->
    <div class="card bg-red rounded shadow p-4">
        <h2 class="font-semibold text-lg mb-3">📅 Upcoming Events</h2>
        @foreach($events->take(3) as $event)
            <p class="mb-2">{{ $event->title }} <span class="text-sm text-gray-500">({{ $event->date }})</span></p>
        @endforeach
        <a href="{{ route('events.index') }}" class="text-sm text-blue-600 hover:underline">View all →</a>
    </div>

    <!-- Timetable Preview -->
    <div class="card bg-red rounded shadow p-4">
        <h2 class="font-semibold text-lg mb-3">📊 Timetable</h2>
        <p class="text-gray-500">Check your latest timetable here.</p>
        <a href="{{ route('timetables.index') }}" class="text-sm text-blue-600 hover:underline">View timetable →</a>
    </div>

    <!-- Results Preview -->
    @auth
    <div class=" card bg-red rounded shadow p-4">
        <h2 class="font-semibold text-lg mb-3">📝 Results</h2>
        <p class="text-gray-500">Your most recent exam results are available.</p>
        <a href="{{ route('results.index') }}" class="text-sm text-blue-600 hover:underline">View results →</a>
    </div>
    @endauth
</div>
@endsection
