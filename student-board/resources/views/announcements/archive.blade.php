@extends('layouts.app')

@section('title', 'Archived Announcements')

@section('content')
<div class="max-w-5xl mx-auto py-10">
    <h1 class="text-3xl font-bold text-center mb-6">📜 Archived Announcements</h1>

    <!-- Search -->
    <form method="GET" action="{{ route('announcements.archive') }}" class="mb-6 flex justify-center">
        <input type="text" name="search" value="{{ request('search') }}" 
               placeholder="Search announcements..."
               class="px-4 py-2 border rounded-l-lg w-1/2">
        <button type="submit" 
                class="bg-orange-500 text-white px-4 py-2 rounded-r-lg hover:bg-orange-600">
            🔍 Search
        </button>
    </form>

    @if($announcements->count())
        <div class="space-y-6">
            @foreach($announcements as $announcement)
                <div class="bg-white rounded-lg shadow p-6 hover:shadow-md transition">
                    <h2 class="text-xl font-semibold mb-2">
                        <a href="{{ route('announcements.show', $announcement) }}" 
                           class="hover:underline">
                            {{ $announcement->title }}
                        </a>
                    </h2>
                    <p class="text-gray-600 text-sm mb-2">
                        Posted {{ $announcement->created_at->diffForHumans() }}
                    </p>
                    <p class="text-gray-700">{{ Str::limit($announcement->body, 120) }}</p>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $announcements->links() }}
        </div>
    @else
        <p class="text-center text-gray-600">❌ No archived announcements found.</p>
    @endif
</div>
@endsection
