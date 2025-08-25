@extends('layouts.app')
@section('title', 'Timetables')

@section('content')
<div class="bg-white rounded shadow p-6">
    <h2 class="text-xl font-semibold mb-4">📊 Timetable</h2>

    @if($timetables->count())
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 text-left">Course</th>
                        <th class="px-4 py-2 text-left">Day</th>
                        <th class="px-4 py-2 text-left">Time</th>
                        <th class="px-4 py-2 text-left">Venue</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($timetables as $item)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $item->course_name }}</td>
                            <td class="px-4 py-2">{{ $item->day }}</td>
                            <td class="px-4 py-2">{{ $item->time }}</td>
                            <td class="px-4 py-2">{{ $item->venue }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-gray-500">No timetables available.</p>
    @endif
</div>
@endsection
