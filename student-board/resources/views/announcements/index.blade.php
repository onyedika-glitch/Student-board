@extends('layouts.app')
@section('title', 'Announcements')

@section('content')
<div class="bg-white rounded shadow p-6">
    <h2 class="text-xl font-semibold mb-4">📢 Department Announcements</h2>

    @if($announcements->count())
        <ul class="divide-y divide-gray-200">
            @foreach($announcements as $announcement)
                <li class="py-3">
                    <a href="{{ route('announcements.show', $announcement) }}" 
                       class="text-lg text-blue-600 font-medium hover:underline">
                        {{ $announcement->title }}
                    </a>
                    <p class="text-gray-600 text-sm mt-1">
                        {{ Str::limit($announcement->body, 120) }}
                    </p>
                    <span class="text-xs text-gray-500">Posted {{ $announcement->created_at->diffForHumans() }}</span>
                </li>
            @endforeach
        </ul>

        <div class="mt-4">
            {{ $announcements->links() }}
        </div>
    @else
        <p class="text-gray-500">No announcements available.</p>
    @endif
    
 <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">View Announcements</h1>
    <a href="{{ route('announcements.archive') }}" 
       class="px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700">
        View Archive →
    </a>
</div>

</div>
@endsection
