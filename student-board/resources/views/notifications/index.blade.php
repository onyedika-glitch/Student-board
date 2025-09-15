@extends('layouts.app')

@section('title', 'Notifications')

@section('content')
<div class="max-w-4xl mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">🔔 Notifications</h1>

    <!-- Filter -->
    <form method="GET" action="{{ route('notifications.index') }}" class="mb-4">
        <select name="type" onchange="this.form.submit()" class="px-3 py-2 border rounded">
            <option value="">All Types</option>
            <option value="announcement" {{ request('type')=='announcement' ? 'selected' : '' }}>Announcements</option>
            <option value="event" {{ request('type')=='event' ? 'selected' : '' }}>Events</option>
        </select>
    </form>

    @if($notifications->count())
        <ul class="space-y-4">
            @foreach($notifications as $notification)
                <li class="p-4 rounded-lg shadow bg-white flex justify-between items-center">
                    <div>
                        <p class="{{ $notification->status == 'unread' ? 'font-bold' : 'text-gray-600' }}">
                            {{ $notification->message }}
                        </p>
                        <span class="text-sm text-gray-500">
                            {{ $notification->created_at->diffForHumans() }} | {{ ucfirst($notification->type) }}
                        </span>
                    </div>
                    <div class="flex space-x-2">
                        @if($notification->status == 'unread')
                            <form method="POST" action="{{ route('notifications.read', $notification) }}">
                                @csrf
                                <button class="px-3 py-1 bg-green-500 text-white rounded">Mark Read</button>
                            </form>
                        @endif
                        <form method="POST" action="{{ route('notifications.archive', $notification) }}">
                            @csrf @method('DELETE')
                            <button class="px-3 py-1 bg-red-500 text-white rounded">Archive</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>

        <div class="mt-6">{{ $notifications->links() }}</div>
    @else
        <p class="text-gray-600">❌ No notifications yet.</p>
    @endif
</div>
@endsection
