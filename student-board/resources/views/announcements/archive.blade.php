@extends('layouts.app')

@section('title', 'Archived Announcements')

@section('content')
<div class="max-w-5xl mx-auto py-10">
    <h1 class="text-3xl font-bold mb-6 text-center">📂 Archived Announcements</h1>

    <!-- Search -->
    <form method="GET" action="{{ route('announcements.archive') }}" class="mb-6 flex justify-center">
        <input type="text"
               name="search"
               value="{{ request('search') }}"
               placeholder="Search past announcements..."
               class="px-4 py-2 border rounded-l-lg w-64">
        <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded-r-lg hover:bg-blue-700">
            Search
        </button>
    </form>

    <!-- Announcements List -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse($announcements as $announcement)
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
                <h2 class="text-xl font-bold mb-2">{{ $announcement->title }}</h2>
                <p class="text-gray-500 text-sm mb-2">
                    {{ \Carbon\Carbon::parse($announcement->start_date)->format('M d, Y') }}
                </p>
                <a href="{{ route('announcements.show', $announcement->id) }}"
                   class="text-blue-600 hover:underline">View Details →</a>
            </div>
        @empty
            <p class="text-gray-600 text-center col-span-2">No archived announcements found.</p>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $announcements->withQueryString()->links() }}
    </div>
</div>
@endsection
