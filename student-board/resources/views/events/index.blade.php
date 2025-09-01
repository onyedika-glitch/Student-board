@extends('layouts.app')
@section('title', 'Events')

@section('content')
<div class="bg-white rounded shadow p-6">
    <h2 class="text-xl font-semibold mb-4">📅 Upcoming Events</h2>

    @if($events->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($events as $event)
                <div class="p-4 border rounded hover:shadow">
                    <h3 class="font-semibold text-lg">{{ $event->title }}</h3>
                    <p class="text-sm text-gray-600 mt-1">{{ $event->description }}</p>
                    <p class="text-sm mt-2 text-blue-600 font-medium">
                        📆 {{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}
                    </p>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $events->links() }}
        </div>
    @else
        <p class="text-gray-500">No events scheduled.</p>
    @endif
    <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Upcoming Events</h1>
    <a href="{{ route('events.archive') }}" 
       class="px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700">
        View Archive →
    </a>
</div>

</div>
@endsection
