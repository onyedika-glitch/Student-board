@extends('layouts.app')
@section('title', 'Admin Dashboard')

@section('content')
<div class="container mx-auto py-10 px-6">
    <!-- Header -->
    <h1 class="text-4xl font-extrabold mb-10 text-center text-gray-800">
        👩‍💻 Admin Dashboard
    </h1>

    <!-- Stats Section -->
<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
    <!-- Students -->
    <div class="flex items-center bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition">
        <img src="https://img.icons8.com/fluency/96/student-male.png" alt="Students" class="w-16 h-16 mr-4">
        <div>
            <h2 class="text-xl font-bold text-gray-800">{{ $studentCount }}</h2>
            <p class="text-gray-500 text-sm">Total Students</p>
        </div>
    </div>

    <!-- Announcements -->
    <div class="flex items-center bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition">
        <img src="https://img.icons8.com/fluency/96/megaphone.png" alt="Announcements" class="w-16 h-16 mr-4">
        <div>
            <h2 class="text-xl font-bold text-gray-800">{{ $announcementCount }}</h2>
            <p class="text-gray-500 text-sm">Announcements</p>
        </div>
    </div>

    <!-- Events -->
    <div class="flex items-center bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition">
        <img src="https://img.icons8.com/fluency/96/calendar.png" alt="Events" class="w-16 h-16 mr-4">
        <div>
            <h2 class="text-xl font-bold text-gray-800">{{ $eventCount }}</h2>
            <p class="text-gray-500 text-sm">Events Scheduled</p>
        </div>
    </div>

    <!-- Timetables -->
    <div class="flex items-center bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition">
        <img src="https://img.icons8.com/fluency/96/timetable.png" alt="Timetables" class="w-16 h-16 mr-4">
        <div>
            <h2 class="text-xl font-bold text-gray-800">{{ $timetableCount }}</h2>
            <p class="text-gray-500 text-sm">Timetables</p>
        </div>
    </div>
</div>

    <!-- Action Cards -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <!-- Announcements -->
        <a href="{{ route('admin.announcements.create') }}" 
           class="group relative p-6 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-2xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300">
            <div class="text-4xl mb-4">📢</div>
            <h2 class="text-xl font-semibold mb-2">Post Announcement</h2>
            <p class="text-sm opacity-80">Create and share updates with students.</p>
            <div class="absolute bottom-4 right-4 text-white opacity-60 group-hover:opacity-100 transition">➜</div>
        </a>

        <!-- Events -->
        <a href="{{ route('admin.events.create') }}" 
           class="group relative p-6 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-2xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300">
            <div class="text-4xl mb-4">📅</div>
            <h2 class="text-xl font-semibold mb-2">Create Event</h2>
            <p class="text-sm opacity-80">Schedule and manage upcoming events.</p>
            <div class="absolute bottom-4 right-4 text-white opacity-60 group-hover:opacity-100 transition">➜</div>
        </a>

        <!-- Timetables -->
        <a href="{{ route('admin.timetables.create') }}" 
           class="group relative p-6 bg-gradient-to-r from-purple-500 to-purple-600 text-white rounded-2xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300">
            <div class="text-4xl mb-4">📊</div>
            <h2 class="text-xl font-semibold mb-2">Upload Timetable</h2>
            <p class="text-sm opacity-80">Upload academic timetables easily.</p>
            <div class="absolute bottom-4 right-4 text-white opacity-60 group-hover:opacity-100 transition">➜</div>
        </a>

        <!-- Results -->
        <a href="{{ route('admin.results.index') }}" 
           class="group relative p-6 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-2xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300">
            <div class="text-4xl mb-4">📝</div>
            <h2 class="text-xl font-semibold mb-2">Manage Results</h2>
            <p class="text-sm opacity-80">Upload and manage student results.</p>
            <div class="absolute bottom-4 right-4 text-white opacity-60 group-hover:opacity-100 transition">➜</div>
        </a>
    </div>
</div>
@endsection
