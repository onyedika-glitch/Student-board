@extends('layouts.app')

@section('title', 'Timetable')

@section('content')
<div class="max-w-7xl mx-auto py-10">
    <h1 class="text-3xl font-bold mb-6 text-center">📅 Timetable</h1>

    <!-- Desktop Table -->
    <div class="hidden md:block overflow-x-auto">
        <table class="w-full border border-gray-300 text-sm text-center">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">Days</th>
                    @foreach(['8:30-9:30','9:30-10:30','10:30-11:30','11:30-12:30','12:30-1:30','1:30-2:30','2:30-3:30'] as $slot)
                        <th class="border p-2">{{ $slot }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach(['Monday','Tuesday','Wednesday','Thursday','Friday'] as $day)
                    <tr>
                        <td class="border font-semibold p-2">{{ $day }}</td>
                        @foreach(['8:30-9:30','9:30-10:30','10:30-11:30','11:30-12:30','12:30-1:30','1:30-2:30','2:30-3:30'] as $slot)
                            <td class="border p-2">
                                @php
                                    $course = $courses->where('day',$day)->where('time_slot',$slot)->first();
                                @endphp
                                @if($course)
                                    <div class="font-bold">{{ $course->code }}</div>
                                    <div class="text-xs text-gray-600">{{ $course->venue }}</div>
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Mobile Vertical View -->
    <div class="md:hidden space-y-6">
        @foreach(['Monday','Tuesday','Wednesday','Thursday','Friday'] as $day)
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <h2 class="bg-orange-500 text-white font-bold text-lg px-4 py-2">{{ $day }}</h2>
                <div class="divide-y">
                    @foreach(['8:30-9:30','9:30-10:30','10:30-11:30','11:30-12:30','12:30-1:30','1:30-2:30','2:30-3:30'] as $slot)
                        @php
                            $course = $courses->where('day',$day)->where('time_slot',$slot)->first();
                        @endphp
                        <div class="p-4 flex justify-between items-center">
                            <span class="font-medium text-gray-700">{{ $slot }}</span>
                            @if($course)
                                <div class="text-right">
                                    <p class="font-semibold text-orange-600">{{ $course->code }}</p>
                                    <p class="text-xs text-gray-500">{{ $course->venue }}</p>
                                </div>
                            @else
                                <span class="text-sm text-gray-400">-</span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
