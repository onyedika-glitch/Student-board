@extends('layouts.app')

@section('title', 'Archived Events')

@section('content')
<div class="max-w-5xl mx-auto py-10">
    <h1 class="text-3xl font-bold mb-6 text-center">📂 Archived Events</h1>

    <!-- Search -->
    <form method="GET" action="{{ route('events.archive') }}" class="mb-6 flex justify-center">
        <input type="text" 
               name="search" 
               value="{{ request('search') }}" 
               placeholder="Search past events..."
               class="px-4 py-2 border rounded-l-lg w-64">
        <button type="submit" 
                class="px-4 py-2 bg-blue-600 text-white rounded-r-lg hover:bg-blue-700">
            Search
        </button>
    </form>

    <!-- Events List -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse($events as $event)
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
                <h2 class="text-xl font-bold mb-2">{{ $event->title }}</h2>
                <p class="text-gray-500 text-sm mb-2">
                    {{ \Carbon\Carbon::parse($event->start_date)->format('M d, Y') }}
                </p>
                <a href="{{ route('events.show', $event) }}" 
                   class="text-blue-600 hover:underline">View Details →</a>
            </div>
        @empty
            <p class="text-gray-600 text-center col-span-2">No archived events found.</p>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $events->withQueryString()->links() }}
    </div>
</div>
@endsection
