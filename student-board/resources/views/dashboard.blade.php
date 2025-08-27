@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<!-- 🌟 Hero Section -->
<div class="relative bg-gradient-to-r from-orange-500 via-yellow-500 to-red-500 text-white rounded-2xl shadow-lg overflow-hidden mb-8">
    <img src="https://images.unsplash.com/photo-1581090700227-4c4f7c0d47af?auto=format&fit=crop&w=1600&q=80"
         class="absolute inset-0 w-full h-full object-cover opacity-30" alt="Campus">
    <div class="relative z-10 p-10 text-center">
        <h1 class="text-4xl font-extrabold">🎓 Welcome back, {{ Auth::user()->name ?? 'Student' }}!</h1>
        <p class="mt-3 text-lg">Here’s a quick overview of your student portal.</p>
        <a href="{{ route('profile.show') }}" 
           class="mt-5 inline-block px-6 py-3 bg-white text-orange-600 font-semibold rounded-lg shadow hover:bg-gray-100">
            View Profile →
        </a>
    </div>
</div>

<!-- 🔹 Dashboard Cards -->
<div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

    <!-- Announcements -->
    <div class="card bg-gradient-to-r from-pink-500 to-red-500 rounded-2xl shadow-xl p-6 text-white relative overflow-hidden">
        <img src="https://img.icons8.com/color/96/megaphone.png" 
             class="absolute right-3 top-3 w-16 opacity-20" alt="Announcements">
        <h2 class="font-bold text-xl mb-4">📢 Announcements</h2>
        @foreach($announcements->take(3) as $announcement)
            <div class="mb-3">
                <a href="{{ route('announcements.show', $announcement) }}" class="font-semibold hover:underline">
                    {{ $announcement->title }}
                </a>
                <p class="text-sm opacity-80">{{ $announcement->created_at->diffForHumans() }}</p>
            </div>
        @endforeach
        <a href="{{ route('announcements.index') }}" class="text-sm font-semibold hover:underline">View all →</a>
    </div>

    <!-- Events -->
    <div class="card bg-gradient-to-r from-blue-500 to-indigo-500 rounded-2xl shadow-xl p-6 text-white relative overflow-hidden">
        <img src="https://img.icons8.com/color/96/calendar.png" 
             class="absolute right-3 top-3 w-16 opacity-20" alt="Events">
        <h2 class="font-bold text-xl mb-4">📅 Events</h2>
        @foreach($events->take(3) as $event)
            <p class="mb-3">
                <span class="font-semibold">{{ $event->title }}</span>
                <span class="text-sm opacity-80 block">{{ $event->date }}</span>
            </p>
        @endforeach
        <a href="{{ route('events.index') }}" class="text-sm font-semibold hover:underline">View all →</a>
    </div>

    <!-- Timetable -->
    <div class="card bg-gradient-to-r from-green-400 to-emerald-600 rounded-2xl shadow-xl p-6 text-white relative overflow-hidden">
        <img src="https://img.icons8.com/color/96/timetable.png" 
             class="absolute right-3 top-3 w-16 opacity-20" alt="Timetable">
        <h2 class="font-bold text-xl mb-4">📊 Timetable</h2>
        <p class="opacity-80 mb-3">Check your latest timetable here.</p>
        <a href="{{ route('timetables.index') }}" class="text-sm font-semibold hover:underline">View timetable →</a>
    </div>

    <!-- Results -->
    @auth
    <div class="card bg-gradient-to-r from-yellow-400 to-orange-500 rounded-2xl shadow-xl p-6 text-white relative overflow-hidden">
        <img src="https://img.icons8.com/color/96/report-card.png" 
             class="absolute right-3 top-3 w-16 opacity-20" alt="Results">
        <h2 class="font-bold text-xl mb-4">📝 Results</h2>
        <p class="opacity-80 mb-3">Your most recent exam results are available.</p>
        <a href="{{ route('results.index') }}" class="text-sm font-semibold hover:underline">View results →</a>
    </div>
    @endauth

</div>
@endsection
